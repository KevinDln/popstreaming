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

$user_id = $_SESSION['id']; // A initialiser apres la connexion

// On veut l'affichage des films comme prévu, sans catégories cliqué de base. On veut les 15 premiers films de
// retourné par la fonction selectByType("films"). Quand on cliquera sur la fleche on prendra les 15 suivants etc...
// Afficher les 15 films

$favoris = getMyList($user_id, $conn);

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    
} else {
    $page = 0;
}

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title> Films </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="../Public/css/nav.css">
        <link rel="stylesheet" href="../Public/css/nav_accueil.css">
        <link rel="stylesheet" href="../Public/css/styles.css">
        <link rel="stylesheet" href="../Public/css/variables.css">
        <link rel="stylesheet" href="../Public/css/font.css">
        <link rel="stylesheet" href="../Public/css/footer.css">
        <link rel="stylesheet" href="../Public/css/affichageFavoris.css">
    </head>


<body>
    <?php require "nav_accueil.php";  ?>
    <a href="../php/pre_accueil.php">
        <input class="chevron" type="image" src="../Public/img/btn-retour.png" alt="<"/></a> <br>

<div class="flex">
    <?php require "nav.php"; // On inclut la barre de navigation ?>

            <?php


            $init = (10*$page);

            // Partie affichage

            
            $total = 0;
            if (!$favoris) {
                echo "<p class='center'> Vous n'avez pas de favoris pour le moment </p>";
                exit();
            }
            for ($i=0; $i <=1; $i++) { // Les lignes
                for ($j=0; $j < 5 ; $j++) {
                    if (isset($favoris[$init]['poster_path'])) {
                        $img = $favoris[$init]['poster_path'];
                        if ($favoris[$init]['type'] == 'film' || $favoris[$init]['type'] == 'films')
                            $url2 = "strat_video.php?id=".$favoris[$init]['id']."&type=films";
                        else $url2 = "strat_video.php?id=".$favoris[$init]['id']."&type=shows";
                        echo "<a href=\"$url2\"><img src='$img' width='200' height='200'> </a>" ;
                        $total++;
                    }
                    $init++;
                } echo "<br>";
            }
            $end = ($total == 10 && isset($favoris[$init])) ? false : true; // Si on a pas 10 contenu, on est a la fin de la liste




            ?>
            <?php if (isset($_GET['page']) && $_GET['page'] > 0): ?>
                <a href="<?php echo $urlPrecedent?>"> Page précedente </a> 
            <?php endif; ?>
            <?php if (!$end): ?>
            <a href="<?php echo $urlSuivant?>"> Page suivante </a> 
            <?php endif; ?>
    </div>

    <script src="../JS/header.js"></script>
    <script src="../JS/langues.js"></script>
    <script src="../JS/profil.js"></script>
    <script src="../JS/rechercher.js"></script>
    <script src="../JS/parametres.js"></script>


        <?php require "footer.php" ?>
    </body>

</html>


