<?php
require "fonctions.php"; 
require "connectdb.php"; 


/*
session_start();
if (!isset($_SESSION['connected']) || $_SESSION['connected'] != true) {
    header("Location: pre_accueil.php");
    exit();
}
*/

// on veut 5 tendances actuelles, 3 films d'action, 
// 3 fantastiques, 3 comédies, 3 drames, 3 séries d'animation et 3 documentaires
// Affichage va changer si on clique sur la fleche ? 
// Ou alors faire un scroll horizontale ? 

$tendances = getTendances($conn); // Récupération des tendances
$action = selectByGenreMovie("Action",$conn); // Récupération des films d'action
$fantastique = selectByGenreMovie("Fantastique",$conn); // Récupération des films fantastiques
$comedie = selectByGenreMovie("Comédie",$conn); // Récupération des films comédies
$drame = selectByGenreShows("Drame",$conn); // Récupération des séries drames
$animation = selectByGenreShows("Animation",$conn); // Récupération des séries d'animation
$mystere = selectByGenreShows("Mystère",$conn); // Récupération des séries documentaires



$affiche = getAffiche($conn); // Récupération de l'affiche

?>


<!DOCTYPE html>
<html>
    <head>
        <title> Accueil </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
    </head>

    <body>
        
        <?php require "nav.php"; // On inclut la barre de navigation ?>
        
        <div class="affiche" id="affiche" name="affiche">
            <!--- Div de stockage de l'affiche, attendre css pour mise en forme --->
            <img src="#">
        </div>

        <div class="contenu" id="contenu" name="contenu">
            <!--- Div de stockage du contenu, attendre css pour mise en forme --->
            <h2> Tendance actuelles </h2>
            
            <?php 
            $init = 0;
            for ($i=0; $i <5 ; $i++) { // Les lignes
                if (isset($tendances[$init])) {
                    $img = $tendances[$init];
                    echo "<img src='$img' width='250' height='200'> " ;
                }
                $init++;
            }
            ?>
            <h2> Films d'action </h2>
            <?php 
            $init = 0;
            for ($i=0; $i <5 ; $i++) { // Les lignes
                if (isset($action[$init])) {
                    $img = $action[$init]['poster_path'];
                    echo "<img src='$img' width='250' height='200'> " ;
                }
                $init++;
            }
            echo "<a href=#> Page suivante </a>";
            ?>

            <h2> Fantastique </h2>

            <?php 
            $init = 0;
            for ($i=0; $i <5 ; $i++) { // Les lignes
                if (isset($fantastique[$init])) {
                    $img = $fantastique[$init]['poster_path'];
                    echo "<img src='$img' width='250' height='200'> " ;
                }
                $init++;
            }
            
            ?>

            <h2> Comédies </h2>
            <?php 
            $init = 0;
            for ($i=0; $i <5 ; $i++) { // Les lignes
                if (isset($comedie[$init])) {
                    $img2 = $comedie[$init]['poster_path'];
                    echo "<img src='$img2' width='250' height='200'> " ;
                }
                $init++;
            }
            ?>

            <h2> Drames </h2>
            <?php 
                $init = 0;
                for ($i=0; $i <5 ; $i++) { // Les lignes
                    if (isset($drame[$init])) {
                        $img2 = $drame[$init]['poster_path'];
                        echo "<img src='$img2' width='250' height='200'> " ;
                    }
                    $init++;
                }
            ?>

            <h2> Série d'animation </h2>

            <?php 
            $init = 0;
            for ($i=0; $i <5 ; $i++) { // Les lignes
                if (isset($animation[$init])) {
                    $img2 = $animation[$init]['poster_path'];
                    echo "<img src='$img2' width='250' height='200'> " ;
                }
                $init++;
            }
            ?>

            <h2> Documentaires </h2>

            <?php 
            $init = 0;
            for ($i=0; $i <5 ; $i++) { // Les lignes
                if (isset($mystere[$init])) {
                    $img2 = $mystere[$init]['poster_path'];
                    echo "<img src='$img2' width='250' height='200'> " ;
                }
                $init++;
            }
            ?>




        </div>

    </body>