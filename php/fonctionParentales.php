<?php

function selectByGenreMovieParent($genre,$conn){
    /* Fonction permettant de récuperer TOUTES les informations selon le genre passé en argument
    en prenant en compte le controle parental
    @args : $genre => $string : le genre du contenu a rechercher
     return array contenant les images des films ainsi que l'id du film et le poster de fond ;
    */

    $result = [];
    $sql = $conn->prepare("SELECT DISTINCT id_movie, poster_path, backdrop_path FROM films WHERE genre= ? AND adult = 0 ORDER BY title");
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
                'backdrop_path' => $film['backdrop_path'],
                'poster_path' => $film['poster_path'], // Ajoute le chemin de l'image du film;
                'type' => 'film'
            ];
        }
    }
    return $result;
}

function selectByGenreShowsParent($genre,$conn){
    /* Fonction permettant de récuperer TOUTES les informations selon le genre passé en argument
    en prenant en compte le controle parental
    @args : $genre => $string : le genre du contenu a rechercher
     return array;
    */

    $result = [];
    $sql = $conn->prepare("SELECT DISTINCT id_shows,poster_path , backdrop_path FROM series WHERE genre = (?) AND adult=0 ORDER BY title");
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
                'backdrop_path' => $film['backdrop_path'], // Poster de fon
                'poster_path' => $film['poster_path'], // Ajoute le chemin de l'image de la série
                'type' => 'show' // Indique que c'est une série
            ];
        }
    }
    return $result;
}

function selectByTypeParent($type,$conn) {
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
        $sql = $conn->prepare("SELECT DISTINCT id_movie,poster_path,backdrop_path FROM films WHERE idPK = (?) AND adult=0");
        foreach ($tableau as $id) {
            $sql->bind_param("i", $id);
            $sql->execute();
            $result = $sql->get_result();
            foreach ($result as $film) {
                $resfinal[] = [
                    'id' => $film['id_movie'], // Ajoute l'id du film
                    'backdrop_path' => $film['backdrop_path'],
                    'poster_path' => $film['poster_path'], // Ajoute le chemin de l'image du film;
                    'type' => 'film'];
            }
        }

    }
    if ($type == "shows") {
        // On veut retrouver les films
        $sql = $conn->prepare("SELECT DISTINCT id_shows, poster_path,backdrop_path FROM series WHERE idPK = (?) AND adult=0");
        foreach ($tableau as $id) {
            $sql->bind_param("i", $id);
            $sql->execute();
            $result = $sql->get_result();
            foreach ($result as $film) {
                $resfinal[] = [
                    'id' => $film['id_shows'], // Ajoute l'id de la série
                    'backdrop_path' => $film['backdrop_path'],
                    'poster_path' => $film['poster_path'], // Ajoute le chemin de l'image de la série
                    'type' => 'show' // Indique que c'est une série];
                ];
            }
        }

    }

    return $resfinal;

}

function selectByDecadeMoviesParent($year,$conn) {
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
            $sql = $conn->prepare("SELECT DISTINCT id_movie, poster_path, backdrop_path FROM films WHERE release_year = (?) 
                                                         AND adult = 0");
            $sql->bind_param("i", $year);
            $sql->execute();
            $result = $sql->get_result();
            foreach ($result as $res) {
                $tableau[] = [
                    'id' => $res['id_movie'], // Ajoute l'id de la série
                    'backdrop_path' => $res['backdrop_path'],
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
            $sql = $conn->prepare("SELECT DISTINCT id_movie, poster_path,backdrop_path FROM films WHERE release_year = (?) AND adult = 0 ");
            $sql->bind_param("i", $year);
            $sql->execute();
            $result = $sql->get_result();
            foreach ($result as $res) {
                $tableau[] = [
                    'id' => $res['id_movie'], // Ajoute l'id de la série
                    'backdrop_path' => $res['backdrop_path'],
                    'poster_path' => $res['poster_path'], // Ajoute le chemin de l'image de la série
                    'type' => 'movie' // Indique que c'est une série
                ]; // On veut afficher que les images pour le moment
            }
            $year++;
        }
    }
    return $tableau;
}

function selectByDecadeShowsParent($year,$conn) {
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
            $sql = $conn->prepare("SELECT DISTINCT id_shows, poster_path, backdrop_path FROM series WHERE release_year = (?) 
                                                          AND adult = 0 ORDER BY title");
            $sql->bind_param("i", $year);
            $sql->execute();
            $result = $sql->get_result();
            foreach ($result as $res) {
                $tableau[] = [
                    'id' => $res['id_shows'], // Ajoute l'id de la série
                    'backdrop_path' => $res['backdrop_path'],
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
            $sql = $conn->prepare("SELECT DISTINCT id_shows, poster_path, backdrop_path FROM series WHERE release_year = (?) 
                                                          AND adult = 0 ORDER BY title");
            $sql->bind_param("i", $year);
            $sql->execute();
            $result = $sql->get_result();
            foreach ($result as $res) {
                $tableau[] = [
                    'id' => $res['id_shows'], // Ajoute l'id de la série
                    'backdrop_path' => $res['backdrop_path'],
                    'poster_path' => $res['poster_path'], // Ajoute le chemin de l'image de la série
                    'type' => 'shows' // Indique que c'est une série
                ];
            }
            $year++;
        }
    }
    return $tableau;

}


function getTendancesParent($conn) {
    /*
    Fonction permettant de récuperer les tendances du moment
    @args : $conn => mysqli : la connexion a la base de données
    return array : la liste des img des films ET des series
    */

    $tableau = [];
    $sql = $conn->prepare("SELECT DISTINCT id_movie, poster_path, backdrop_path FROM films WHERE adult = 0 ORDER BY popularity DESC LIMIT 5");
    $sql2 = $conn->prepare("SELECT DISTINCT id_shows, poster_path, backdrop_path FROM series WHERE adult = 0 ORDER BY popularity DESC LIMIT 5");

    if ($sql) {
        $sql->execute();
        $result = $sql->get_result();
        foreach ($result as $res) {
            $tableau[] = [
                'id' => $res['id_movie'], // Ajoute l'id de la série
                'backdrop_path' => $res['backdrop_path'],
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
                'backdrop_path' => $res['backdrop_path'],
                'poster_path' => $res['poster_path'], // Ajoute le chemin de l'image de la série
                'type' => 'shows' // Indique que c'est une série
            ];
        }
        $sql2->close();
    }

    return $tableau;
}


function getAfficheParent($conn){
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
    $sql = $conn->prepare("SELECT DISTINCT id_movie, backdrop_path FROM films WHERE idPK = (?) AND adult = 0");

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
                'backdrop_path' => $res['backdrop_path'], // Ajoute le chemin de l'image de la série
                'type' => 'film' // Indique que c'est un film
            ];

        }
        $sql->close();
        return $affiche;

    }


}

function rechercheParent($mot, $conn){
    if ($mot == "") { // Si on clique sur rechercher sans avoir inscrit d'élément
        return null;
    }
    $intablefilm= [];
    $intableserie = [];

    $tableresult = [ ];
    $titre = "%".$mot."%";
    $stmt = $conn->prepare("SELECT DISTINCT * FROM films WHERE title LIKE ? AND adult = 0 ");
    $stmt->bind_param("s", $titre);
    $stmt->execute();
    $result = $stmt->get_result();
    $nbresults = $result->num_rows;
    if ($nbresults > 0) {
        foreach ($result as $row) {
            $idFilm = $row['id_movie'];
            if (!in_array($idFilm, $intablefilm)) { // Si l'id du film n'est pas encore ajouté
                $tableresult[] = [
                    'id' => $row['id_movie'], // Ajoute l'id du film
                    'poster_path' => $row['poster_path'], // Ajoute le chemin de l'image de la série
                    'type' => 'film' // Indique que c'est un film
                ];
                $intablefilm[] = $idFilm;

            }

        }
    }
    $stmt = $conn->prepare("SELECT DISTINCT * FROM series WHERE title LIKE ? AND adult = 0");
    $stmt->bind_param("s", $titre);
    $stmt->execute();
    $result = $stmt->get_result();
    $nbresults = $result->num_rows;
    if ($nbresults > 0){
        foreach ($result as $row){
            $idSerie = $row['id_shows'];
            if (!in_array($idSerie, $intableserie)) {
                $tableresult[] = [
                    'id' => $row['id_shows'], // Ajoute l'id du film
                    'poster_path' => $row['poster_path'], // Ajoute le chemin de l'image de la série
                    'type' => 'shows' // Indique que c'est un film
                ];
                $intableserie[] = $idSerie;
            }
        }

    }

    return $tableresult;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Controle parentale</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="icon" href="../Public/img/icon-pop-streaming.png" type="image/png">
    <link rel="stylesheet" href="../Public/css/nav_accueil.css">
    <link rel="stylesheet" href="../Public/css/styles.css">
    <link rel="stylesheet" href="../Public/css/variables.css">
    <link rel="stylesheet" href="../Public/css/font.css">
    <link rel="stylesheet" href="../Public/css/menu_burger.css">
    <link rel="stylesheet" href="../Public/css/control-parental.css">
    <link rel="stylesheet" href="../Public/css/footer.css">
</head>
<body>
<header>
    <?php require "nav_accueil.php"; ?>
</header>
<br>
<a href="#" class="btn-retour">
    <img src="../Public/img/btn-retour.png" alt="">
</a>
<br>

<div class="parental-control center">
    <h2>Contrôle parental</h2>
    <p class="p1">Entrez le mot de passe de votre compte pour gérer les paramètres de contrôle parental.</p>
    <form action="/submit-parental-control" method="POST">
        <div class="password-input-container">
            <input type="password" id="parental-password" class="real-password-input" maxlength="6">
            <div class="pin-input-container">
                <div class="pin-dot" data-index="0"></div>
                <div class="pin-dot" data-index="1"></div>
                <div class="pin-dot" data-index="2"></div>
                <div class="pin-dot" data-index="3"></div>
                <div class="pin-dot" data-index="4"></div>
                <div class="pin-dot" data-index="5"></div>
            </div>
        </div>
        <div class="flex gap">
            <button class="btn-primary input" type="submit" formaction="logout.php">Valider</button>
            <button class="btn-secondary input" type="submit" >Annuler</button>
        </div>
    </form>
</div>
<?php require "footer.php"; ?>
<script src="../JS/header.js"></script>
<script src="../JS/langues.js"></script>
<script src="../JS/profil.js"></script>
<script src="../JS/rechercher.js"></script>
</body>

</html>

