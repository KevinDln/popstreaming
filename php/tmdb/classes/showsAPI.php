
<?php
require_once __DIR__ . '/../config/tmdb.php';
require_once __DIR__ . '/../config/api_config.php';
require_once __DIR__ . '/Cache.php';

class ShowsAPI
{
    private static $instance = null;
    private $cache;
    private $tmdbKey;
    private $baseUrl;
    private $imageUrl;

    private function __construct()
    {
        $this->cache = new Cache();
        $this->tmdbKey = TMDB_API_KEY;
        $this->baseUrl = TMDB_BASE_URL;
        $this->imageUrl = TMDB_IMAGE_BASE_URL;
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function makeRequest($endpoint, $params = [])
    {
        $cacheKey = $endpoint . serialize($params);
        $cached = $this->cache->get($cacheKey);

        if ($cached !== null) {
            return $cached;
        }

        $params['api_key'] = $this->tmdbKey;
        $params['language'] = 'fr-FR';

        $url = $this->baseUrl . $endpoint . '?' . http_build_query($params);
        $ch = curl_init();
        curl_setopt_array($ch, getCurlOptions($url));

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new Exception('Erreur cURL : ' . curl_error($ch));
        }

        curl_close($ch);
        $result = json_decode($response, true);
        $this->cache->set($cacheKey, $result);

        return $result;
    }
    public function getSeriesByRelease($limit = 40)
    {
        try {
            $currentDate = date('Y-m-d');
            $oneYearAgo = date('Y-m-d', strtotime('-5 months'));

            $data = $this->makeRequest('/discover/tv', [
                'sort_by' => 'popularity.desc',
                'first_air_date.lte' => $currentDate,
                'first_air_date.gte' => $oneYearAgo,
                'vote_count.gte' => 20,
                'with_original_language' => 'en|fr',
                'page' => 1,
                'per_page' => $limit //
            ]);

            if (!isset($data['results']) || empty($data['results'])) {
                throw new Exception('Aucun résultat trouvé dans getSeriesByRelease');
            }


            $filteredSeries = array_filter($data['results'], function ($s) {
                return !empty($s['poster_path']) && !empty($s['backdrop_path']);
            });

            $series = array_slice($filteredSeries, 0, $limit);

            error_log("Nombre de séries trouvées : " . count($series));

            return array_map([$this, 'enrichSeriesData'], $series);
        } catch (Exception $e) {
            error_log("Erreur dans getSeriesByRelease: " . $e->getMessage());
            return [];
        }
    }
    public function searchShows($query, $limit = 15)
    {
        try {
            $data = $this->makeRequest('/search/tv', [
                'query' => $query,
                'include_adult' => false
            ]);

            return array_slice($data['results'] ?? [], 0, $limit);
        } catch (Exception $e) {
            error_log("Search Shows error: " . $e->getMessage());
            return [];
        }
    }
    public function getShowDetails($showId)
    {
        try {
            $cacheKey = "show_full_$showId";
            $cached = $this->cache->get($cacheKey);

            if (!$cached) {
                $cached = $this->makeRequest("/tv/$showId", [
                    'append_to_response' => 'credits,images,seasons,episode_groups'
                ]);

                if (!$cached) {
                    throw new Exception('Show not found');
                }

                $cached = $this->enrichSeriesData($cached);

                $this->cache->set($cacheKey, $cached);
            }

            return $cached;
        } catch (Exception $e) {
            error_log("Error in getShowDetails: " . $e->getMessage());
            throw $e;
        }
    }

    private function enrichSeriesData($series)
    {
        if (!isset($series['episode_run_time']) || empty($series['episode_run_time'])) {
            if (!isset($series['id'])) {
                return $series;
            }
            $details = $this->getSeriesDetails($series['id']);
            $series['episode_run_time'] = $details['episode_run_time'] ?? [];
        }
        return $series;
    }
    public function getSeriesByGenre($genreId, $limit = 4)
    {
        $data = $this->makeRequest('/discover/tv', [
            'with_genres' => $genreId,
            'page' => 1
        ]);
        $series = array_slice($data['results'], 0, $limit);
        return array_map([$this, 'enrichSeriesData'], $series);
    }

    public function getSeriesByGenreAndYear($genreId, $year = 2024, $limit = 4)
    {
        try {
            $data = $this->makeRequest('/discover/tv', [
                'with_genres' => $genreId,
                'first_air_date_year' => $year,
                'sort_by' => 'popularity.desc',
                'vote_count.gte' => 50,
                'page' => 1
            ]);

            $series = array_slice($data['results'], 0, 8);

            // Filtrer les séries sans poster_path
            $filteredSeries = array_filter($series, function ($s) {
                return !empty($s['poster_path']);
            });

            return array_slice($filteredSeries, 0, $limit);
        } catch (Exception $e) {
            error_log("Erreur dans getSeriesByGenreAndYear: " . $e->getMessage());
            return [];
        }
    }

    public function getTrendingSeries($limit = 20)
    {
        try {
            $data = $this->makeRequest('/trending/tv/week');
            if (!isset($data['results']) || empty($data['results'])) {
                throw new Exception('Aucun résultat trouvé dans getTrendingSeries');
            }
            $series = is_array($data['results']) ? $data['results'] : [];
            $series = array_slice($series, 0, $limit);
            return array_map([$this, 'enrichSeriesData'], $series);
        } catch (Exception $e) {
            error_log("Erreur dans getTrendingSeries: " . $e->getMessage());
            return [];
        }
    }
    public function getSeasonDetails($showId, $seasonNumber)
    {
        $cacheKey = "season_{$showId}_{$seasonNumber}";
        $cached = $this->cache->get($cacheKey);

        if (!$cached) {
            $cached = $this->makeRequest("/tv/$showId/season/$seasonNumber");
            $this->cache->set($cacheKey, $cached);
        }

        return $cached;
    }
    public function getSeriesDetails($seriesId)
    {
        $cacheKey = "series_$seriesId";
        $cached = $this->cache->get($cacheKey);

        if ($cached !== null) {
            return $cached;
        }

        $details = $this->makeRequest("/tv/$seriesId");
        $this->cache->set($cacheKey, $details);
        return $details;
    }

    public function getShowsKey($showsId) {
        /* Fonction permettant de récuperer la clé de l'url de la vidéo pour la série
        Args : $showId (int) : ID de la série

        Returns :
            json : format json contenant les informations
        */

        $curl = curl_init();

        curl_setopt_array($curl, getCurlOptionsV2("shows","video",$showsId));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }


    public function getCastingShows($showId) {
        /* Fonction permettant de récuperer le casting d'une série, pour un maximum de
        5 acteurs par séries
        Args : $showId (int) : ID de la série

        Returns :
            table : table contenant les castings
        */
        $curl = curl_init();

        curl_setopt_array($curl, getCurlOptionsV2("shows","cast",$showId));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $cast =[]; // Initialise un tab de casting
            $result = json_decode($response,true);
            if (!empty($result['cast'])){ // Si on récupère bien le casting 

                $maxActors = (count($result['cast']) > 5) ? 5 : count($result['cast']);

                for ($i=0;$i<$maxActors;$i++) { // On récupère seulement 5 acteurs par films sinon c'est interminable
                    $cast[$i]['name'] = $result['cast'][$i]['name']; // nom de l'acteur / actrice
                    $cast[$i]['img'] = $result['cast'][$i]['profile_path'] ;
                    $cast[$i]['id_movie'] = $showId;
                }
            }

            return $cast;
        }


    }


}
