<?php
require_once "connectdb.php"; // Connexion a la base de données
// Fonctions de recherches selon les informations passés


// PLUS TARD, VA DEVOIR RAJOUTER LE CONTROLE PARENTALE SI ON LE FAIT, PAS LA PRIORITÉ ATM

function selectByGenreMovie($genre,$conn){
    /* Fonction permettant de récuperer TOUTES les informations selon le genre passé en argument
    @args : $genre => $string : le genre du contenu a rechercher
     return array contenant les images des films ainsi que l'id du film;
    */

    $result = [];
    $sql = $conn->prepare("SELECT id_movie, poster_path FROM films WHERE genre = (?) ORDER BY title");
    if ($sql) {
        $sql->bind_param("s", $genre);
        $sql->execute();
        $res = $sql->get_result();
        $num = $res->num_rows;
    }
    if ($num > 0) {
        foreach($res as $film){
            $result[] = [
                'id' => $film['id_movie'], // Ajoute l'id du film
                'poster_path' => $film['poster_path'], // Ajoute le chemin de l'image du film;
                'type' => 'film'
            ];
        }
    }
    return $result;
}

function selectByGenreShows($genre,$conn){
    /* Fonction permettant de récuperer TOUTES les informations selon le genre passé en argument
    @args : $genre => $string : le genre du contenu a rechercher
     return array;
    */

    $result = [];
    $sql = $conn->prepare("SELECT id_shows,poster_path FROM series WHERE genre = (?) ORDER BY title");
    if ($sql) {
        $sql->bind_param("s", $genre);
        $sql->execute();
        $res = $sql->get_result();
        $num = $res->num_rows;
    }
    if ($num > 0) {
        foreach($res as $film){
            $result[] = [
                'id' => $film['id_shows'], // Ajoute l'id de la série
                'poster_path' => $film['poster_path'], // Ajoute le chemin de l'image de la série
                'type' => 'show' // Indique que c'est une série
                ];
        }
    }
    return $result;
}

function selectByType($type,$conn) {
    /* Fonction permettant de retourner soit des films ou des séries (qui seront affiché sur
    la page dès que l'on arrive sur la page film ou série
     * @args : $type => string : le type de contenue que l'on veut récuperer
     *
     * return array (contient la liste des img a afficher)
     */

    // Faire une liste de 50 chiffre randoms pour l'affichage
    $tableau = [];
    $i = 0;
    $resfinal = []; // Tableau stockant toutes les images des contenus

    $table = ($type === "films") ? "films" : "series"; 
    $MinMax = $conn->query("SELECT MIN(idPK) as min, MAX(idPK) as max FROM $table");
    $range = $MinMax->fetch_assoc();
    $minId = (int)$range['min'];
    $maxId = (int)$range['max'];

    while ($i < 60) {
        $val = rand($minId, $maxId); // Min et Max selon la table et selon le type 
        if (!in_array($val, $tableau)) {
            $tableau[] =$val; // Ajoute la valeur dans le table
            $i++;
        }
    }


    if ($type == "films") {
        // On veut retrouver les films
        $sql = $conn->prepare("SELECT id_movie,poster_path FROM films WHERE idPK = (?)");
        foreach ($tableau as $id) {
            $sql->bind_param("i", $id);
            $sql->execute();
            $result = $sql->get_result();
            foreach ($result as $film) {
                $resfinal[] = [
                'id' => $film['id_movie'], // Ajoute l'id du film
                'poster_path' => $film['poster_path'], // Ajoute le chemin de l'image du film;
                'type' => 'film'];
            }
        }

    }
    if ($type == "shows") {
        // On veut retrouver les films
        $sql = $conn->prepare("SELECT id_shows, poster_path FROM series WHERE idPK = (?)");
        foreach ($tableau as $id) {
            $sql->bind_param("i", $id);
            $sql->execute();
            $result = $sql->get_result();
            foreach ($result as $film) {
                $resfinal[] = [
                'id' => $film['id_shows'], // Ajoute l'id de la série
                'poster_path' => $film['poster_path'], // Ajoute le chemin de l'image de la série
                'type' => 'show' // Indique que c'est une série];
            ];
            }
        }

    }

    return $resfinal;

}

function selectByDecadeMovies($year,$conn) {
    /*
    Fonction permettant de récuperer une liste de film selon la décennie passé en argument
    @args : $year => int : Corresponds à la décennie a rechercher, plus précisement la première année

    return array : les img, l'id et le type de contenu

    */

    $tableau = [];
    $i = 2025;


    if ($year >= 2020 && $year<=2025) { // Décennie ne sera pas de 10 ans
        $reste = $year % 10 ; // Va renvoyer le dernier chiffre de la décennie passé
        if ($reste != 0 ) { // Si l'année n'est pas le début de la décennie)
            $year -= $reste ;
        }

        while ($year <= $i) {
            $sql = $conn->prepare("SELECT id_movie, poster_path FROM films WHERE release_year = (?)");
            $sql->bind_param("i", $year);
            $sql->execute();
            $result = $sql->get_result();
            foreach ($result as $res) {
                $tableau[] = [
                'id' => $res['id_movie'], // Ajoute l'id de la série
                'poster_path' => $res['poster_path'], // Ajoute le chemin de l'image de la série
                'type' => 'movie' // Indique que c'est une série
                ];
            }
            $year++;
        }
    }
    elseif ($year>=1970) { // Début de la base de données a 1970, valeurs inférieur non présente
        $reste = $year % 10 ; // Va renvoyer le dernier chiffre de la décennie passé
        if ($reste != 0 ) { // Si l'année n'est pas le début de la décennie)
            $year -= $reste ;
        }

        $max = $year + 9; // derniere année de la décennie
        while ($year <= $max) {
            $sql = $conn->prepare("SELECT id_movie, poster_path FROM films WHERE release_year = (?)");
            $sql->bind_param("i", $year);
            $sql->execute();
            $result = $sql->get_result();
            foreach ($result as $res) {
                $tableau[] = [
                'id' => $res['id_movie'], // Ajoute l'id de la série
                'poster_path' => $res['poster_path'], // Ajoute le chemin de l'image de la série
                'type' => 'movie' // Indique que c'est une série
                ]; // On veut afficher que les images pour le moment
            }
            $year++;
        }
    }
    return $tableau;
}


function selectByDecadeShows($year,$conn) {
    /*
    Fonction permettant de récuperer une liste de film selon la décennie passé en argument
    @args : $year => int : Corresponds à la décennie a rechercher, plus précisement la première année

    return array : la liste des img des films de la décennie recherché

    */

    $tableau = [];
    $i = 2025;


    if ($year >= 2020 && $year<=2025) { // Décennie ne sera pas de 10 ans
        $reste = $year % 10 ; // Va renvoyer le dernier chiffre de la décennie passé
        if ($reste != 0 ) { // Si l'année n'est pas le début de la décennie)
            $year -= $reste ;
        }

        while ($year <= $i) {
            $sql = $conn->prepare("SELECT id_shows, poster_path FROM series WHERE release_year = (?) ORDER BY title");
            $sql->bind_param("i", $year);
            $sql->execute();
            $result = $sql->get_result();
            foreach ($result as $res) {
                $tableau[] = [
                'id' => $res['id_shows'], // Ajoute l'id de la série
                'poster_path' => $res['poster_path'], // Ajoute le chemin de l'image de la série
                'type' => 'shows' // Indique que c'est une série
                ];
            }
            $year++;
        }
    }
    elseif ($year>=1970) { // Début de la base de données a 1970, valeurs inférieur non présente
        $reste = $year % 10 ; // Va renvoyer le dernier chiffre de la décennie passé
        if ($reste != 0 ) { // Si l'année n'est pas le début de la décennie)
            $year -= $reste ;
        }

        $max = $year + 9; // derniere année de la décennie
        while ($year <= $max) {
            $sql = $conn->prepare("SELECT id_shows, poster_path FROM series WHERE release_year = (?) ORDER BY title");
            $sql->bind_param("i", $year);
            $sql->execute();
            $result = $sql->get_result();
            foreach ($result as $res) {
                $tableau[] = [
                'id' => $res['id_shows'], // Ajoute l'id de la série
                'poster_path' => $res['poster_path'], // Ajoute le chemin de l'image de la série
                'type' => 'shows' // Indique que c'est une série
                ];
            }
            $year++;
        }
    }
    return $tableau;

}

function getTendances($conn) {
    /*
    Fonction permettant de récuperer les tendances du moment
    @args : $conn => mysqli : la connexion a la base de données
    return array : la liste des img des films ET des series
    */

    $tableau = [];
    $sql = $conn->prepare("SELECT id_movie, poster_path FROM films ORDER BY popularity DESC LIMIT 5");
    $sql2 = $conn->prepare("SELECT id_shows, poster_path FROM series ORDER BY popularity DESC LIMIT 5");
   
    if ($sql) { 
        $sql->execute();
        $result = $sql->get_result();
        foreach ($result as $res) {
            $tableau[] = [
                'id' => $res['id_movie'], // Ajoute l'id de la série
                'poster_path' => $res['poster_path'], // Ajoute le chemin de l'image de la série
                'type' => 'film' // Indique que c'est une série
                ];
        }
        $sql->close(); 
    }
    
    if ($sql2) { 
        $sql2->execute();
        $result2 = $sql2->get_result();
        foreach ($result2 as $res) {
            $tableau[] = [
                'id' => $res['id_shows'], // Ajoute l'id de la série
                'poster_path' => $res['poster_path'], // Ajoute le chemin de l'image de la série
                'type' => 'shows' // Indique que c'est une série
                ];
        }
        $sql2->close();
    }

    return $tableau;
}


function getMyList($conn, $userId) {
    /*
    Fonction permettant de récuperer la liste des films et séries d'un utilisateur
    @args : $conn => mysqli : la connexion a la base de données
            $userId => int : l'id de l'utilisateur
    return array : la liste des img des films ET des series favoris
    */

    $tableauFilm = [];
    $tableauSerie = [];
    $sql = $conn->prepare("SELECT id_film FROM favoris_films WHERE id_utilisateur = (?)");
    $sql2 = $conn->prepare("SELECT id_serie FROM favoris_series WHERE id_utilisateur = (?)");

    if ($sql) { 
        $sql->bind_param("i", $userId);
        $sql->execute();
        $result = $sql->get_result();
        foreach ($result as $res) { // Ajoute les id des films dans le tableau
            $tableauFilm[] = $res['id_film'];
        }
        $sql->close(); 
    }
    
    if ($sql2) { 
        $sql2->bind_param("i", $userId);
        $sql2->execute();
        $result2 = $sql2->get_result();
        foreach ($result2 as $res) { // Ajoute les id des séries dans le tableau
            $tableauSerie[] = [
                'id' => $res['id_shows'], // Ajoute l'id de la série
                'poster_path' => $res['poster_path'], // Ajoute le chemin de l'image de la série
                'type' => 'shows' // Indique que c'est une série
                ];
        }
        $sql2->close();
    }

    // Récupération des images des films
    $tableau = [];

    foreach ($tableauFilm as $id) { // Pour chaque id de film
        $sql3 = $conn->prepare("SELECT id_movie, poster_path FROM films WHERE id_movie = (?)");
        if ($sql3) {
            $sql3->bind_param("i", $id);
            $sql3->execute();
            $result = $sql3->get_result();
            foreach ($result as $res) {
                $tableau[] = [
                'id' => $res['id_movie'], // Ajoute l'id du film
                'poster_path' => $res['poster_path'], // Ajoute le chemin de l'image de la série
                'type' => 'film' // Indique que c'est un film
                ];
            }
            $sql3->close();
        }
    }
    foreach ($tableauSerie as $id) { // Pour chaque id de série
        $sql4 = $conn->prepare("SELECT id_shows, poster_path FROM series WHERE id_shows = (?)");
        if ($sql4) {
            $sql4->bind_param("i", $id);
            $sql4->execute();
            $result2 = $sql4->get_result();
            foreach ($result2 as $res) {
                $tableau[] = [
                'id' => $res['id_shows'], // Ajoute l'id de la série
                'poster_path' => $res['poster_path'], // Ajoute le chemin de l'image de la série
                'type' => 'shows' // Indique que c'est une série
                ];
            }
            $sql4->close();
        }
    }


    return $tableau;
}

function getAffiche($conn){
    /*
    Fonction permettant de récuperer l'affiche d'un film'
    @args : $conn => mysqli : la connexion a la base de données
    return string : le chemin de l'affiche du film
    */


    // faire un nombre aléatoire dans la base de données des films
    $table = "films"; 
    $MinMax = $conn->query("SELECT MIN(idPK) as min, MAX(idPK) as max FROM $table");
    $range = $MinMax->fetch_assoc();
    $minId = (int)$range['min'];
    $maxId = (int)$range['max'];

    $val = rand($minId, $maxId); // Min et Max selon la table et selon le type
    $sql = $conn->prepare("SELECT id_movie, poster_path FROM films WHERE idPK = (?)");
    
    if (!$sql) return null;
    
    $affiche = null;
    if ($sql) {
        $sql->bind_param("i", $val);
        $sql->execute();
        $result = $sql->get_result();
        if ($result->num_rows > 0) {
            $res = $result->fetch_assoc();
            $affiche[] = [
            'id' => $res['id_movie'], // Ajoute l'id du film
            'poster_path' => $res['poster_path'], // Ajoute le chemin de l'image de la série
            'type' => 'film' // Indique que c'est un film
            ];
            
        }
        $sql->close();
        return $affiche;
        
    }

  
}


/* TEST


$test = selectByGenreMovie("Comédie",$conn);
var_dump($test);  // Résultat attendue : 12 films : Dog man jusque Monstre & cie GOOD


$test = selectByGenreShows("Comédie",$conn);
var_dump($test); // 41 resultats attendue : murderbot jusque Rick et morty GOOD


$test = selectByType("films",$conn); // Doit retourner des titres de films aléatoires
var_dump($test); // attendu -> 50 films aléatoire -> good

$test = selectByType("shows",$conn); // Doit retourner des titres de séries aléatoires
var_dump($test); // attendu -> 50 séries aléatoire -> good



$test = selectByDecadeMovies(2010,$conn);
var_dump($test); // Doit retourner les films des années 2010 jusqu'a 2019 GOOD



$test = selectByDecadeShows(2010,$conn);
var_dump($test);



$test = getTendances($conn);
echo $test[0] // Doit retourner les tendances du moment GOOD

$test = getAffiche($conn);
echo $test[0]['poster_path']; // Doit retourner une affiche aléatoire d'un film GOOD

*/


?>