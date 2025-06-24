<?php
require "connectdb.php"; // Connexion a la base de données
require "fonctions.php";
require "fonctionParentales.php";



session_start();/*
if (!isset($_SESSION['connected']) || $_SESSION['connected'] != true) {
    header("Location: pre_accueil.php");
    exit();
}
*/


// On veut l'affichage des films comme prévu, sans catégories cliqué de base. On veut les 15 premiers films de
// retourné par la fonction selectByType("films"). Quand on cliquera sur la fleche on prendra les 15 suivants etc...
// Afficher les 15 films

if (isset($_GET['genre'])) {
    $genre = $_GET['genre'];
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];

} else {
    $page = 0;
}

$url = "affichageFilms.php?";
if (isset($_GET['genre'])) {
    $urlSuivant = $url .  "genre=" . urlencode($_GET['genre']) . "&";
    $urlPrecedent = $url . "genre=" . urlencode($_GET['genre']) . "&";
}
else {
    $urlSuivant = $url;
    $urlPrecedent = $url;
}
$urlSuivant .= "page=" . ($page + 1);
$urlPrecedent .= "page=" . ($page - 1);


$end = false;

?>
<!DOCTYPE html>
<html>
<head>
    <title> Films </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="icon" href="../Public/img/icon-pop-streaming.png" type="image/png">
    <link rel="stylesheet" href="../Public/css/nav.css">
    <link rel="stylesheet" href="../Public/css/styles.css">
    <link rel="stylesheet" href="../Public/css/variables.css">
    <link rel="stylesheet" href="../Public/css/font.css">
    <link rel="stylesheet" href="../Public/css/affichageFilms.css">
    <link rel="stylesheet" href="../Public/css/nav_accueil.css">
    <link rel="stylesheet" href="../Public/css/footer.css">
</head>
<body>
<header>
    <?php require "nav_accueil.php";  ?>
</header>
<main>
    <div class="flex">
        <div class="wrap">
            <a href="#" class="btn-retour">
                <img src="../Public/img/btn-retour.png" alt="">
            </a>
            <?php require "nav.php"; // On inclut la barre de navigation ?>
        </div>

        <div class="wrap">
            <div class="flex container-search">
                <div class="search-box">
                    <form action="afficheRecherche.php" method="POST">
                        <label for="film">Recherche </label>
                        <input  class="btn-secondary" type="search" id="film" name="film" placeholder=<?php if (isset($mot)) echo $mot ?> "">
                    </form>
                </div>
                <div class="wrap">
                    <div class="custom-select-container">
                        <label for="film">Année</label>
                        <select class="input1 btn-secondary" name="Type de profils">
                            <option value="Type de profil"></option>
                            <option value="Adultes">Adultes</option>
                            <option value="Adolescents">Adolescents</option>
                            <option value="Jeunesse">Jeunesse</option>
                        </select>
                        <div class="custom-select-icon">
                            <img src="../Public/img/btn-select-option.png" alt="Icon drop">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex">
                <div class="genre" id="genre" name="genre">
                    <!--- Div de stockage des genres de films --->
                    <ul>
                        <li> <a href="affichageFilms.php?genre=Comedie"> Comédie </a> </li>
                        <li> <a href="affichageFilms.php?genre=Action"> Action </a> </li>
                        <li> <a href="affichageFilms.php?genre=Drame"> Drame </a> </li>
                        <li> <a href="affichageFilms.php?genre=Science-fiction"> Science-Fiction </a> </li>
                        <li> <a href="affichageFilms.php?genre=Animation"> Animation </a> </li>
                        <li> <a href="affichageFilms.php?genre=Aventure"> Aventure </a> </li>
                        <li> <a href="affichageFilms.php?genre=Crime"> Crime </a> </li>
                        <li> <a href="affichageFilms.php?genre=Fantastique"> Fantastique </a> </li>
                        <li> <a href="affichageFilms.php?genre=Thriller"> Thriller </a> </li>
                        <li> <a href="affichageFilms.php?genre=Horreur"> Horreur </a> </li>
                        <li> <a href="affichageFilms.php?genre=Romance"> Romance </a> </li>
                        <li> <a href="affichageFilms.php?genre=Guerre"> Guerre </a> </li>
                        <li> <a href="affichageFilms.php?genre=Histoire"> Histoire </a> </li>
                        <li> <a href="affichageFilms.php?genre=Musique"> Musique </a> </li>
                        <li> <a href="affichageFilms.php?genre=Documentaire"> Documentaire </a> </li>
                    </ul>
                </div>

                <div class="contenu" id="contenu" name="contenu">
                    <?php


                    $init = (15*$page);

                    // Partie affichage

                    // Vérifier si un GET est passé en parametre
                    // Si un get n'est pas défini

                    if (!isset($_GET['genre']) && $_SESSION['controle'] == 1) {
                        $films = selectByTypeParent("films",$conn);

                    }

                    elseif (!isset($_GET['genre']) && $_SESSION['controle'] == 0) {
                        $films = selectByType("films",$conn);

                    }

                    elseif (isset($_GET['genre']) && $_SESSION['controle'] == 0) { // Un get a été défini =>
                        $films = selectByGenreMovie($_GET['genre'],$conn);
                    }

                    else {
                        $films = selectByGenreMovieParent($_GET['genre'],$conn);
                    }

                    $total = 0;
                    for ($i=0; $i <=2; $i++) { // Les lignes
                        for ($j=0; $j < 5 ; $j++) {
                            if (isset($films[$init]['poster_path'])) {
                                $img = $films[$init]['poster_path'];
                                echo "<a href=\"\"><img src='$img' width='150' height='150'> </a>" ;
                                $total++;
                            }
                            $init++;
                        } echo "<br>";
                    }
                    $end = ($total == 15 && isset($films[$init])) ? false : true; // Si on a pas 15 films, on est a la fin de la liste




                    ?>
                    <?php if (isset($_GET['page']) && $_GET['page'] > 0): ?>
                        <a href="<?php echo $urlPrecedent?>"> Page précedente </a>
                    <?php endif; ?>
                    <?php if (!$end): ?>
                        <a href="<?php echo $urlSuivant?>"> Page suivante </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require "footer.php" ?>
</body>
</html>


