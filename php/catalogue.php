<?php
//require "connectdb.php"; // Connexion a la base de données
//require "fonctions.php";
//session_start();
//
//
//// Catalogue des films et séries.
//// On veut prendre plusieurs films aléatoire et plusieurs séries
//// faire un table qui va récuperer les films et ensuite les séries ?
//$table= [];
//$table[] = selectByType("films",$conn);
//$table[] = selectByType("shows",$conn);
//
//// Normalement a reçu 60 séries et 60 films
//
//// Affichage aléatoire en sélectionnant ce qui n'est pas encore affiché
//
//$end = false;
//
//?>


<!DOCTYPE html>
<html>
<head>
    <title>Catalogue</title>
    <link rel="icon" href="../Public/img/icon-pop-streaming.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/nav.css">
    <link rel="stylesheet" href="../Public/css/menu_burger.css">
    <link rel="stylesheet" href="../Public/css/styles.css">
    <link rel="stylesheet" href="../Public/css/variables.css">
    <link rel="stylesheet" href="../Public/css/font.css">
    <link rel="stylesheet" href="../Public/css/pre_accueil.css">
    <link rel="stylesheet" href="../Public/css/strat_video.css">
    <link rel="stylesheet" href="../Public/css/footer.css">
</head>
<body>

<?php require "nav_pre_accueil.php"; ?>
<div class="titre" id="titre">
    <a href="#" class="btn-retour">
        <img src="../Public/img/btn-retour.png" alt="">
    </a>
    <div class="center">
        <h2> Catalogue 2025 </h2>
    </div>
</div>

<div class="contenu" id="contenu" name="contenu">
    <?php
    $dejadedansfilm = []; // Tableau pour savoir si le film est deja montré dans le catalogue
    $dejadedansserie = []; // Tableau pour savoir si le film est deja montré dans le catalogue


    for ($i = 0; $i < 3; $i++) {
        if ($i == 1) { // Ligne 2, on en veut 1 de plus
            for ($j = 0; $j < 9; $j++) {
                $type = rand(0,1); // chiffre entre 0 et 1 pour savoir où récuperer l'image (films ou série)
                $continuer = true;
                while ($continuer) {
                    $content = rand(0,count($table[$type])-1); // Max de contenu dans la table du type
                    if ($type == 0) {
                        // Sera des films
                        if (!in_array($content, $dejadedansfilm)) { // On considere que l'indice est pas deja ajouté
                            // Affichage du contenu
                            $img = $table[$type][$content]['poster_path'];
                            echo "<a href=#> <img src='$img' width='150' height='200'>  </a>" ;
                            $dejadedansfilm[] = $content;
                            $continuer = false;
                        }
                    }
                    if ($type == 1) {
                        // Sera des series
                        if (!in_array($content, $dejadedansserie)) { // On considere que l'indice est pas deja ajouté
                            // Affichage du contenu
                            $img = $table[$type][$content]['poster_path'];
                            echo "<a href=#> <img src='$img' width='150' height='200'>  </a>" ;
                            $dejadedansserie[] = $content;
                            $continuer = false;

                        }
                    }
                }
            } ;

        }
        else {
            for ($j = 0; $j < 8; $j++) {
                $type = rand(0,1); // chiffre entre 0 et 1 pour savoir où récuperer l'image (films ou série)
                $continuer = true;
                while ($continuer) {
                    $content = rand(0,count($table[$type])-1); // Max de contenu dans la table du type
                    if ($type == 0) {
                        // Sera des films
                        if (!in_array($content, $dejadedansfilm)) { // On considere que l'indice est pas deja ajouté
                            // Affichage du contenu
                            $img = $table[$type][$content]['poster_path'];
                            echo "<a href=#> <img src='$img' width='150' height='200'>  </a>" ;
                            $dejadedansfilm[] = $content;
                            $continuer = false;

                        }
                    }
                    if ($type == 1) {
                        // Sera des series
                        if (!in_array($content, $dejadedansserie)) { // On considere que l'indice est pas deja ajouté
                            // Affichage du contenu
                            $img = $table[$type][$content]['poster_path'];
                            echo "<a href=#> <img src='$img' width='150' height='200'>  </a>" ;
                            $dejadedansserie[] = $content;
                            $continuer = false;
                        }
                    }
                }
            }
        }
        echo "<br>";
    }


    ?>

</div>

<!--- On "triche" un peu, on raffraichi juste la page pour un nouvel affichage de film en attendant -->
<a href="catalogue.php"> Page suivante </a>
<a href="catalogue.php"> Page précédente </a>

<?php
include "footer.php"
?>

</body>

</html>


