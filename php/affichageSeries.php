<?php
require "connectdb.php"; // Connexion a la base de données
require "fonctions.php";
require "fonctionParentales.php";
session_start();

/*
if (!isset($_SESSION['connected']) || $_SESSION['connected'] != true) {
    header("Location: pre_accueil.php");
    exit();
}
*/

$ActionAventure = "Action & Aventure";
$urlA = "affichageSeries.php?genre=" . urlencode($ActionAventure);

$test = "Sci-Fi & Fantasie";
$urlB = "affichageSeries.php?genre=" . urlencode($test);


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



$url = "affichageSeries.php?";
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
    <title> Series </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

</head>

<?php require "nav_accueil.php";  ?>
<body>
<div class="genre" id="genre" name="genre">
    <!--- Div de stockage des genres de films --->
    <ul> 
    <li> <a href="affichageSeries.php?genre=Comedie"> Comédie </a> </li>
    <li> <a href="<?php echo $urlA?>"> Action & Aventure </a> </li>
    <li> <a href="affichageSeries.php?genre=Animation"> Animation </a> </li>
    <li> <a href="<?php echo $urlB?>"> Sci-Fi & Fantasie </a> </li>
    <li> <a href="affichageSeries.php?genre=Drame"> Drame </a> </li>
    <li> <a href="affichageSeries.php?genre=Enfants"> Enfants </a> </li>
    <li> <a href="affichageSeries.php?genre=Mystère"> Mystère </a> </li>
    <li> <a href="affichageSeries.php?genre=News"> News </a> </li>
    <li> <a href="affichageSeries.php?genre=Realité"> Realité </a> </li>
    <li> <a href="affichageSeries.php?genre=Soap"> Soap </a> </li>
    <li> <a href="affichageSeries.php?genre=Talk"> Talk </a> </li>
    <li> <a href="affichageSeries.php?genre=Politique"> Politique </a> </li>
    </ul>

</div>

<?php require "nav.php"; // Navigation de la page, pour aller a la page précédente ou suivante ?>
<div class="contenu" id="contenu" name="contenu">
    <?php

    $init = (15*$page);

    // Partie affichage

    // Vérifier si un GET est passé en parametre
    // Si un get n'est pas défini

    if (!isset($_GET['genre']) && $_SESSION['controle'] == 1) {
        $Series = selectByTypeParent("shows",$conn);

    }

    elseif (!isset($_GET['genre']) && $_SESSION['controle'] == 0) {
        $Series = selectByType("shows",$conn);

    }

    elseif (isset($_GET['genre']) && $_SESSION['controle'] == 0) {
        $Series = selectByGenreShows($_GET['genre'],$conn);

    }

    else { // Un get a été défini =>
        $Series = selectByGenreShowsParent($_GET['genre'],$conn);
    }

    $total = 0;
    for ($i=0; $i <=2; $i++) { // Les lignes
        for ($j=0; $j < 5 ; $j++) {
            // Vérifier si l'index existe dans le tableau
            if (isset($Series[$init]['poster_path'])) {
                $img = $Series[$init]['poster_path'];
                echo "<a href=\"\"> <img src='$img' width='200' height='200'> </a>" ;
                $total++;
            }
            $init++;
            
        } echo "<br>";

        $end = ($total == 15 && isset($Series[$init])) ? false : true; // Si on a pas 15 series, on est a la fin de la liste

    }




    ?>

    <?php if (isset($_GET['page']) && $_GET['page'] > 0): ?>
                <a href="<?php echo $urlPrecedent?>"> Page précedente </a> 
            <?php endif; ?>
            <?php if (!$end): ?>
            <a href="<?php echo $urlSuivant?>"> Page suivante </a> 
            <?php endif; ?>

</div>
<?php require "footer.php" ?>
</body>

</html>


