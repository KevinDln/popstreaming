<?php
// Fonctions de recherches selon les informations passés


// PLUS TARD, VA DEVOIR RAJOUTER LE CONTROLE PARENTALE SI ON LE FAIT, PAS LA PRIORITÉ ATM

function selectByGenreMovie($genre,$conn){
    /* Fonction permettant de récuperer TOUTES les informations selon le genre passé en argument
    @args : $genre => $string : le genre du contenu a rechercher
     return array contenant les images des films;
    */

    $result = [];
    $sql = $conn->prepare("SELECT poster_path FROM films WHERE genre = (?) ORDER BY title");
    if ($sql) {
        $sql->bind_param("s", $genre);
        $sql->execute();
        $res = $sql->get_result();
        $num = $res->num_rows;
    }
    if ($num > 0) {
        foreach($res as $film){
            $result[] = $film;
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
    $sql = $conn->prepare("SELECT poster_path FROM series WHERE genre = (?) ORDER BY title");
    if ($sql) {
        $sql->bind_param("s", $genre);
        $sql->execute();
        $res = $sql->get_result();
        $num = $res->num_rows;
    }
    if ($num > 0) {
        foreach($res as $film){
            $result[] = $film;
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
    while ($i < 50) {
        $val = rand(1, 100); // valeur a changer plus tard avec le nombre max de film
        if (!in_array($val, $tableau)) {
            $tableau[] =$val; // Ajoute la valeur dans le table
            $i++;
        }
    }


    if ($type == "films") {
        // On veut retrouver les films
        $sql = $conn->prepare("SELECT poster_path FROM films WHERE idPK = (?)");
        foreach ($tableau as $id) {
            $sql->bind_param("i", $id);
            $sql->execute();
            $result = $sql->get_result();
            foreach ($result as $film) {
                $resfinal[] = $film;
            }
        }

    }
    if ($type == "shows") {
        // On veut retrouver les films
        $sql = $conn->prepare("SELECT poster_path FROM series WHERE idPK = (?)");
        foreach ($tableau as $id) {
            $sql->bind_param("i", $id);
            $sql->execute();
            $result = $sql->get_result();
            foreach ($result as $film) {
                $resfinal[] = $film;
            }
        }

    }

    return $resfinal;

}

function selectByDecadeMovies($year,$conn) {
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
            $sql = $conn->prepare("SELECT poster_path FROM films WHERE release_year = (?)");
            $sql->bind_param("i", $year);
            $sql->execute();
            $result = $sql->get_result();
            foreach ($result as $res) {
                $tableau[] =  $res['poster_path']; // On veut afficher que les images pour le moment
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
            $sql = $conn->prepare("SELECT poster_path FROM films WHERE release_year = (?)");
            $sql->bind_param("i", $year);
            $sql->execute();
            $result = $sql->get_result();
            foreach ($result as $res) {
                $tableau[] = $res['poster_path']; // On veut afficher que les images pour le moment
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
            $sql = $conn->prepare("SELECT poster_path FROM series WHERE release_year = (?) ORDER BY title");
            $sql->bind_param("i", $year);
            $sql->execute();
            $result = $sql->get_result();
            foreach ($result as $res) {
                $tableau[] = $res['poster_path']; // On veut afficher que les images pour le moment
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
            $sql = $conn->prepare("SELECT poster_path FROM series WHERE release_year = (?) ORDER BY title");
            $sql->bind_param("i", $year);
            $sql->execute();
            $result = $sql->get_result();
            foreach ($result as $res) {
                $tableau[] = $res['poster_path']; // On veut afficher que les images pour le moment

            }
            $year++;
        }
    }
    return $tableau;

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

*/

?>