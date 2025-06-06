<?php
require_once '../connectdb.php'; // Connexion a la base de données
require_once('classes/MovieAPI.php'); // API tmdb

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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    $year = 2025;

    // Parcours de la base de données TMDB pour récuperer 20 films et séries par genres et par années
    $genreMovies = [];
    while ($year >= 2024 ) {
        foreach ($categories as $name => $genreId) {
            // Recupere toutes les informations du films
            $genreMovies[$name] = $movieApi->getMoviesByGenreAndYear($genreId, $year, 2);

            // Ajout dans la base de données les informations nécessaires
            // original_language, release_year = $year,$name = genre, runtime = movie_duration (en min), overview
            foreach ($genreMovies[$name] as $movie) {
                $sql = $conn->prepare("INSERT INTO films (title,genre,original_language,overview,release_year,content_duration) 
                        VALUES (?,?,?,?,?,?)");
                $sql->bind_param("ssssii",$movie['title'],$name, $movie['original_language'],
                    $movie['overview'], $year, $movie['runtime']);
                $sql->execute();

            }


        }
        $year--;
    }
?>
</body>

</html>