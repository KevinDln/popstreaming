<?php
require "connectdb.php"; // Connexion a la base de données
require "fonctions.php";

$test = "Action & Aventure";
$urlA = "affichageSeries.php?genre=" . urlencode($test);
echo $urlA;

// On veut l'affichage des films comme prévu, sans catégories cliqué de base. On veut les 15 premiers films de
// retourné par la fonction selectByType("films"). Quand on cliquera sur la fleche on prendra les 15 suivants etc...
// Afficher les 15 films


?>
<!DOCTYPE html>
<html>
<head>
    <title> Films </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

</head>


<body>
<div class="genre" id="genre" name="genre">
    <!--- Div de stockage des genres de films --->

    <a href="affichageSeries.php?genre=Comedie"> Comédie </a>
    <a href="<?php echo $urlA?>"> Action & Aventure </a>
    <a href="affichageSeries.php?genre=Animation"> Animation </a>
    <a href="affichageSeries.php?genre=Sci-Fi & Fantasie"> Sci-Fi & Fantasie </a>
    <a href="affichageSeries.php?genre=Drame"> Drame </a>
    <a href="affichageSeries.php?genre=Enfants"> Enfants </a>
    <a href="affichageSeries.php?genre=Mystère"> Mystère </a>
    <a href="affichageSeries.php?genre=News"> News </a>
    <a href="affichageSeries.php?genre=Realité"> Realité </a>
    <a href="affichageSeries.php?genre=Soap"> Soap </a>
    <a href="affichageSeries.php?genre=Talk"> Talk </a>
    <a href="affichageSeries.php?genre=Politique"> Politique </a>

</div>

<div class="contenu" id="contenu" name="contenu">
    <?php

    $init = 0;

    // Partie affichage

    // Vérifier si un GET est passé en parametre
    // Si un get n'est pas défini

    if (!isset($_GET['genre'])) {
        $Series = selectByType("shows",$conn);



    } else { // Un get a été défini =>
        $Series = selectByGenreShows($_GET['genre'],$conn);
    }
    for ($i=0; $i <=2; $i++) { // Les lignes
        for ($j=0; $j < 5 ; $j++) {
            $img = $Series[$init]['poster_path'];
            echo "<img src='$img' width='200' height='200'> " ;
            $init++;
        } echo "<br>";

    }




    ?>

</div>

</body>

</html>


