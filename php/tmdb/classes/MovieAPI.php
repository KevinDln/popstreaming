<?php
require_once __DIR__ . '/../config/tmdb.php';
require_once __DIR__ . '/../config/api_config.php';
require_once __DIR__ . '/Cache.php';

class MovieAPI
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

    public function getMoviesByGenre($genreId, $limit = 4)
    {
        $data = $this->makeRequest('/discover/movie', [
            'with_genres' => $genreId,
            'page' => 1
        ]);
        $movies = array_slice($data['results'], 0, $limit);
        return array_map([$this, 'enrichMovieData'], $movies);
    }

    public function getMoviesByGenreAndYear($genreId, $year = 2024, $limit = 4)
    {
        try {
            $data = $this->makeRequest('/discover/movie', [
                'with_genres' => $genreId,
                'primary_release_year' => $year,
                'sort_by' => 'vote_average.desc',
                'vote_count.gte' => 100
            ]);

            if (!isset($data['results']) || empty($data['results'])) {
                throw new Exception("Aucun résultat trouvé pour le genre $genreId");
            }

            $movies = is_array($data['results']) ? $data['results'] : [];
            $movies = array_slice($movies, 0, $limit);

            return array_map([$this, 'enrichMovieData'], $movies);
        } catch (Exception $e) {
            error_log("Erreur dans getMoviesByGenreAndYear: " . $e->getMessage());
            return [];
        }
    }

    public function getMoviesByRelease($limit = 20)
    {
        try {
            $data = $this->makeRequest('/movie/now_playing', [
                'page' => 1,
                'region' => 'FR'
            ]);

            if (!isset($data['results']) || empty($data['results'])) {
                throw new Exception('Aucun résultat trouvé dans getMoviesByRelease');
            }

            $movies = is_array($data['results']) ? $data['results'] : [];
            $movies = array_slice($movies, 0, $limit);

            return array_map([$this, 'enrichMovieData'], $movies);
        } catch (Exception $e) {
            error_log("Erreur dans getMoviesByRelease: " . $e->getMessage());
            return [];
        }
    }

    public function getTrendingMovies($limit = 20)
    {
        try {
            $data = $this->makeRequest('/trending/movie/week');

            if (!isset($data['results']) || empty($data['results'])) {
                throw new Exception('Aucun résultat trouvé dans getTrendingMovies');
            }

            $movies = is_array($data['results']) ? $data['results'] : [];
            $movies = array_slice($movies, 0, $limit);

            return array_map([$this, 'enrichMovieData'], $movies);
        } catch (Exception $e) {
            error_log("Erreur dans getTrendingMovies: " . $e->getMessage());
            return []; // Retourne un tableau vide en cas d'erreur
        }
    }

    public function getTrendingFamilyMovies($limit = 4)
    {
        $data = $this->makeRequest('/discover/movie', [
            'certification_country' => 'FR',
            'certification.lte' => '12',
            'sort_by' => 'popularity.desc'
        ]);
        return array_slice($data['results'], 0, $limit);
    }

    public function getMovieDetails($movieId)
    {
        $cacheKey = "movie_full_$movieId";
        $cached = $this->cache->get($cacheKey);

        if (!$cached) {
            $cached = $this->makeRequest("/movie/$movieId", [
                'append_to_response' => 'credits'
            ]);
            $this->cache->set($cacheKey, $cached);
        }

        return $cached;
    }

    private function enrichMovieData($movie)
    {
        if (!isset($movie['runtime'])) {
            $details = $this->getMovieDetails($movie['id']);
            $movie['runtime'] = $details['runtime'];
        }
        return $movie;
    }
    public function getMostPopularMovie2025()
    {
        try {
            $data = $this->makeRequest('/discover/movie', [
                'sort_by' => 'popularity.desc',
                'primary_release_year' => 2025,
                'vote_count.gte' => 100,
                'page' => 1
            ]);

            if (!isset($data['results'][0])) {
                throw new Exception('Aucun film trouvé');
            }

            $movie = $data['results'][0];

            $details = $this->makeRequest("/movie/{$movie['id']}", [
                'append_to_response' => 'credits'
            ]);

            return $details;
        } catch (Exception $e) {
            error_log("Erreur dans getMostPopularMovie2024: " . $e->getMessage());
            return null;
        }
    }
    public function searchMovies($query, $limit = 15)
    {
        try {
            $response = $this->makeRequest('/search/movie', [
                'query' => $query,
                'include_adult' => false
            ]);

            error_log("API Response: " . print_r($response, true)); // Debug

            if (!isset($response['results'])) {
                throw new Exception('No results key in API response');
            }

            return array_slice($response['results'], 0, $limit);
        } catch (Exception $e) {
            error_log("Search error: " . $e->getMessage());
            throw $e;
        }
    }



    // Va chercher a récuperer la KEY necessaire pour l'url de la vidéo 
    public function getKeyMovies($movieId){ 
        /* Fonction permettant de récuperer la clé de l'url de la vidéo pour la série
        Args : $showId (int) : ID de la série

        Returns : 
            json : format json contenant les informations
        */

        $curl = curl_init();
        curl_setopt_array($curl, getCurlOptionsV2("movie","video", $movieId));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        return $response;
        }
    }


    public function getCastingMovie($movieId) {
        /* Fonction permettant de récuperer le casting d'une série, pour un maximum de 
        5 acteurs par séries 
        Args : $showId (int) : ID de la série

        Returns : 
            table : table contenant les castings
        */

        $curl = curl_init();

        curl_setopt_array($curl, getCurlOptionsV2("movie","cast", $movieId));

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
                    $cast[$i]['id_movie'] = $movieId;
                }
            }
            
        return $cast;
        }


    }


}
