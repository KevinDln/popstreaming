<?php
require "connectdb.php"; // Connexion a la base de données
require "fonctions.php";
require "fonctionParentales.php";


session_start();

if (!isset($_SESSION['connected']) || $_SESSION['connected'] != true) {
    header("Location: pre_accueil.php");
    exit();
}


$_SESSION['controle'] = 0;

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title> Tendances </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="../Public/css/nav_accueil.css">
        <link rel="stylesheet" href="../Public/css/nav.css">
        <link rel="stylesheet" href="../Public/css/styles.css">
        <link rel="stylesheet" href="../Public/css/variables.css">
        <link rel="stylesheet" href="../Public/css/font.css">
        <link rel="stylesheet" href="../Public/css/affichageTendances.css">
        <link rel="stylesheet" href="../Public/css/footer.css">
    </head>

<body>
<?php require "nav_accueil.php";  ?>
    <a href="../php/pre_accueil.php">
        <input class="chevron" type="image" src="../Public/img/btn-retour.png" alt="<"/>
    </a> <br>

<div class="flex center">
    <?php require "nav.php"; // On inclut la barre de navigation ?>
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
                        echo "
    <div class='image-contain'>
    <p class='format'> $number </p> <a href=''> <img src='$img' width='200' height='200'> </a>
    </div>" ;

                        $number++;
                    }
                    $init++;
            
        } echo "<br>";

    }

            ?>
            
</div>


<script src="../JS/header.js"></script>
<script src="../JS/langues.js"></script>
<script src="../JS/profil.js"></script>
<script src="../JS/rechercher.js"></script>
<script src="../JS/parametres.js"></script>
<?php require "footer.php" ?>
</body>

</html>


