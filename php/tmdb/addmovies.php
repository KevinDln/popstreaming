<?php
require_once '../connectdb.php'; // Connexion a la base de données
require_once('classes/MovieAPI.php'); // API tmdb

ini_set('max_execution_time', 0);

$categories = [
    'Comédie' => 35,
    'Action' => 28,
    'Drame' => 18,
    'Science-Fiction' => 878,
    'Animation' => 16,
    'Aventure' => 12,
    'Crime' => 80,
    'Fantastique' => 14,
    'Thriller' => 53,
    'Horreur' => 27,
    'Romance' => 10749,
    'Guerre' => 10752,
    'Histoire' => 36,
    'Musique' => 10402,
    'Documentaire' => 99,
];

// On récupére l'instance de MovieAPI
$movieApi = MovieAPI::getInstance();

$year = 2025;

// Parcours de la base de données TMDB pour récuperer 10 films par genres et par années
$genreMovies = [];
$tab_acteur_film = [];

while ($year >= 2000  ) { // On va chercher le contenu jusqu'au années 1970
    foreach ($categories as $name => $genreId) {
        // Recupere toutes les informations du films
        // On prends 10 films par catégorie, 150 films par années
        $genreMovies[$name] = $movieApi->getMoviesByGenreAndYear($genreId, $year, 2);

        /* 
        Ajout dans la base de données les informations nécessaires
        original_language, release_year = $year, $name = genre, 
        runtime = movie_duration (en min), overview = résumé
        poster_path = chemin d'acces pour l'image 
        */

        foreach ($genreMovies[$name] as $movie) {

            // Vérifie si le film comporte bien une image et un trailer 
            if (isset($movie['poster_path'])) { // Si une image est présente
                // Pour Récuperer la key du film (youtube)
                $json = $movieApi->getKeyMovies($movie['id']); 
                $decode = json_decode($json,true); // Format tableau

                // Si un résultat est retourné, considère que les infos sont présentes
                if (!empty($decode['results'])){ // Peut ajouter infos dans la bd

                    $sql = $conn->prepare("INSERT INTO films (title,genre,original_language,
                    overview,release_year,content_duration,poster_path,trailer,rating,id_movie) 
                        VALUES (?,?,?,?,?,?,?,?,?,?)");


                    // Chemin d'acces pour l'image du film
                    $chemin = 'https://image.tmdb.org/t/p/w500' . $movie['poster_path'];
                    $video = "https://www.youtube.com/watch?v=" . $decode['results'][0]['key'];

                    // Verifie la valeur de adult
                    if ($movie['adult'] == false ) { 
                        $rating = 0; // Contenu non soumis au controle parental
                    } else {
                        $rating = 1; // Contenu soumis au controle parental
                    }


                    $sql->bind_param("ssssiissii",$movie['title'],$name, $movie['original_language'],
                    $movie['overview'], $year, $movie['runtime'], $chemin,$video,$rating,$movie['id']);
                    $sql->execute(); // A ajouté les valeurs dans la base de données



                    // PARTIE ACTEURS 

                    // Récupère les 5 premiers acteurs présent dans le film
                    // Partie la plus longue
                    $casting = $movieApi->getCastingMovie($movie['id']); 
                    $sql2 = $conn->prepare("INSERT INTO acteurs (nom,casting_film,img) VALUES (?,?,?)");

                    foreach($casting as $cast){

                        $name_cast = $cast['name'];
                        if (empty($cast['img'])){ //Vérifie si une image est bien récupéré
                            $img = "../../img/default_profil.jpeg";
                        } else {
                            $img = 'https://image.tmdb.org/t/p/w500' . $cast['img'];
                        }

                        #Vérifie si l'acteur a deja été ajouté 
                        // Si un acteur n'est pas dans le tab de vérification, on l'ajoute dans la base
                            $key = $name_cast . '|' . $movie['id'];

                        // Vérifie si la combinaison acteur + film a déjà été insérée
                        if (!isset($tab_acteur_series[$key])) {
                            $sql2->bind_param("sis", $name_cast, $movie['id'], $img);
                            $sql2->execute();

                            // Enregistre la paire pour ne pas la réinsérer
                            $tab_acteur_film[$key] = true;
                        }
                            

                            
                        
                    }
                    
            }

        }
    }


    }
    $year--;
}


echo "Base de données séries terminées <br>";
echo "base de données acteurs terminées pour les films <br>";
?>
