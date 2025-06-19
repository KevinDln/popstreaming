<?php
require "connectdb.php"; // Connexion a la base de données
require "fonctions.php";


session_start();
/*
if (!isset($_SESSION['connected']) || $_SESSION['connected'] != true) {
    header("Location: pre_accueil.php");
    exit();
}
*/

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Tendances </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">

    </head>

    <?php require "header.php";  ?>
    <body>
        
        <?php require "nav.php"; // On inclut la barre de navigation ?>

        <div class="contenu" id="contenu" name="contenu">
            <?php

            $init = 0;

            // Partie affichage

            $tendances = getTendances($conn); // Récupération des tendances
            $number = 1;
            for ($i=0; $i <=1; $i++) { // Les lignes
                for ($j=0; $j < 5 ; $j++) {
                    // Vérifier si l'index existe dans le tableau
                    if (isset($tendances[$init])) {                        
                        $img = $tendances[$init]['poster_path'];
                        echo "<p> $number </p> <a href=\"\"> <img src='$img' width='200' height='200'> </a>" ;
                        $number++;
                    }
                    $init++;
            
        } echo "<br>";

        
    }





           
            ?>
            
        </div>

    </body>

</html>


