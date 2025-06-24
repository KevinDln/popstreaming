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

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Tendances </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">

    </head>

    <?php
    include "nav_accueil.php"
    ?>
    <body>
        
        <?php require "nav.php"; // On inclut la barre de navigation ?>

        <div class="contenu" id="contenu" name="contenu">
            <?php

            $init = 0;

            // Partie affichage

            if ($_SESSION['controle'] == 0) {
                $tendances = getTendances($conn);

            } // Récupération des tendances sans controle
            else $tendances = getTendancesParent($conn);
            $number = 1;
            for ($i=0; $i <=1; $i++) { // Les lignes
                for ($j=0; $j < 5 ; $j++) {
                    // Vérifier si l'index existe dans le tableau
                    if (isset($tendances[$init])) {                        
                        $img = $tendances[$init]['poster_path'];
                        if ($tendances[$init]['type'] == 'film' || $tendances[$init]['type'] == 'films')
                            $url2 = "strat_video.php?id=".$tendances[$init]['id']."&type=films";
                        else $url2 = "strat_video.php?id=".$tendances[$init]['id']."&type=shows";
                        echo "<p> $number </p> <a href=\"$url2\"> <img src='$img' width='200' height='200'> </a>" ;
                        $number++;
                    }
                    $init++;
            
        } echo "<br>";

        
    }

            ?>
            
        </div>
        <?php require "footer.php" ?>
    </body>

</html>


