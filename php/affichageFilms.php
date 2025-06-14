<?php
require "connectdb.php"; // Connexion a la base de données
require "fonctions.php";

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
                <a href="affichageFilms.php?genre=Comedie"> Comédie </a>
                <a href="affichageFilms.php?genre=Action"> Action </a>
                <a href="affichageFilms.php?genre=Drame"> Drame </a>
                <a href="affichageFilms.php?genre=Science-fiction"> Science-Fiction </a>
                <a href="affichageFilms.php?genre=Animation"> Animation </a>
                <a href="affichageFilms.php?genre=Aventure"> Aventure </a>
                <a href="affichageFilms.php?genre=Crime"> Crime </a>
                <a href="affichageFilms.php?genre=Fantastique"> Fantastique </a>
                <a href="affichageFilms.php?genre=Thriller"> Thriller </a>
                <a href="affichageFilms.php?genre=Horreur"> Horreur </a>
                <a href="affichageFilms.php?genre=Romance"> Romance </a>
                <a href="affichageFilms.php?genre=Guerre"> Guerre </a>
                <a href="affichageFilms.php?genre=Histoire"> Histoire </a>
                <a href="affichageFilms.php?genre=Musique"> Musique </a>
                <a href="affichageFilms.php?genre=Documentaire"> Documentaire</a>

        </div>

        <div class="contenu" id="contenu" name="contenu">
            <?php

            $init = 0;

            // Partie affichage

            // Vérifier si un GET est passé en parametre
            // Si un get n'est pas défini

            if (!isset($_GET['genre'])) {
                $films = selectByType("films",$conn);



            } else { // Un get a été défini =>
                $films = selectByGenreMovie($_GET['genre'],$conn);
            }
            for ($i=0; $i <=2; $i++) { // Les lignes
                for ($j=0; $j < 5 ; $j++) {
                    $img = $films[$init]['poster_path'];
                    echo "<img src='$img' width='200' height='200'> " ;
                    $init++;
                } echo "<br>";

            }




            ?>

        </div>

    </body>

</html>


