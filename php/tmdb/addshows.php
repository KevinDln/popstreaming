<?php
require_once('classes/showsAPI.php');
require_once '../connectdb.php'; // Connexion a la base de données

ini_set('max_execution_time', 0);

$categoriesTV = [
    'Comédie' => 35,
    'Action & Aventure' => 10759,
    'Animation' => 16,
    'Sci-Fi & Fantasie' => 10765,
    'Drame' => 18,
    'Enfants' => 10762,
    'Mystère' => 9648,
    'News' => 10763,
    'Realité' => 10764,
    'Soap' => 10766,
    'Talk' => 10767,
    'Politique' => 10768,
];

$showsApi = ShowsAPI::getInstance();

// Parcours de la base de données TMDB pour récuperer 10 films par genres et par années

$year = 2025;
$genreShows = [];
$tab_acteur_series = [];
while ($year >= 1970) { // On va chercher le contenu jusqu'au années 1970
    foreach ($categoriesTV as $name => $genreId) {
        // Recupere toutes les informations de la série
        $genreShows[$name] = $showsApi->getSeriesByGenreAndYear($genreId, $year, 5);

        // Ajout dans la base de données les informations nécessaires
        // original_language, release_year = $year,$name = genre, 
        // poster_path = chemin d'acces pour l'image
        foreach ($genreShows[$name] as $shows) {

            // Vérifie si le film comporte bien une image et un trailer 
            if (isset($shows['poster_path'])) { // Si une image est présente
                // Pour Récuperer la key du film (youtube)
                $json = $showsApi->getShowsKey($shows['id']); 
                $decode = json_decode($json,true); // Format tableau

                // Si un résultat est retourné, considère que les infos sont présentes
                if (!empty($decode['results'])){ // Peut ajouter infos dans la bd

                    $sql = $conn->prepare("INSERT INTO series (title,genre,original_language,
                    overview,release_year,poster_path,trailer,rating,id_shows,backdrop_path,adult
                    ,popularity,nb_vote) 
                        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");


                    // Chemin d'acces pour l'image du film
                    $chemin = 'https://image.tmdb.org/t/p/original' . $shows['poster_path'];
                    $video = "https://www.youtube.com/embed/" . $decode['results'][0]['key'];


                    // vote moyen
                    $avg = $shows['vote_average'];
                    $popularity = $shows['popularity'];
                    $backdrop_path = 'https://image.tmdb.org/t/p/original' . $shows['backdrop_path']; // poster de fond
                    $nb_vote = $shows['vote_count'];

                    // Verifie la valeur de adult
                    if ($shows['adult'] == false ) { 
                        $rating = 0; // Contenu non soumis au controle parental
                    } else {
                        $rating = 1; // Contenu soumis au controle parental
                    }

                    $sql->bind_param("ssssissdisidi",$shows['name'],$name, $shows['original_language'],
                    $shows['overview'], $year,$chemin,$video,$avg,$shows['id'],$backdrop_path,
                        $rating,$popularity,$nb_vote);
                    $sql->execute();

                    // PARTIE ACTEURS 

                    // Récupère les 5 premiers acteurs présent dans le film
                    // Partie la plus longue 
                    $casting = $showsApi->getCastingShows($shows['id']); 
                    $sql2 = $conn->prepare("INSERT INTO acteurs (nom,casting_serie,img) VALUES (?,?,?)");

                    foreach($casting as $cast){
                        $name_cast = $cast['name'];
                        if (empty($cast['img'])){
                            $img = "../Public/img/defaut_profil.jpeg";
                        } else {
                            $img = 'https://image.tmdb.org/t/p/original' . $cast['img'];
                        }

                        // Si un acteur n'est pas dans le tab de vérification, on l'ajoute dans la base
                        $key = $name_cast . '|' . $shows['id'];

                        // Vérifie si la combinaison acteur + film a déjà été insérée
                        if (!in_array($key, $tab_acteur_series)) {
                            $sql2->bind_param("sis", $name_cast, $shows['id'], $img);
                            $sql2->execute();

                            // Enregistre la paire pour ne pas la réinsérer
                            $tab_acteur_series[] = $key;
                        }


                    }

                }
            }
        }
        
    }$year--;
}

echo "Base de données séries terminées <br>";
echo "base de données acteurs terminées pour les séries";

?>