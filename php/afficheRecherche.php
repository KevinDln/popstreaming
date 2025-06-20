<?php
session_start();
require "connectdb.php";
require "fonctions.php";


// Page pour afficher
//les résultats de la recherche

// On utilise la fonction de recherche et on renvoie sur la page les contenus retrouvés



if (isset($_POST['film'] )) { // Première apparition sur la page
    $mot = $_POST['film'];
    $resultat = fonctionRecherche($mot, $conn);
} else if (isset($_GET['search'])) { // Minimum deuxieme apparition sur la page ?
    $mot = $_GET['search'];
    $resultat = fonctionRecherche($mot, $conn);
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];

} else {
    $page = 0;
}


$end = false;
$url = "afficheRecherche.php?";
if (isset($_GET['search'])) {
    $urlSuivant = $url .  "search=" . urlencode($_GET['search']) . "&";
    $urlPrecedent = $url . "search=" . urlencode($_GET['search']) . "&";
} else if (isset($_POST['film'])) {
    $urlSuivant = $url .  "search=" . urlencode($_POST['film']) . "&";
    $urlPrecedent = $url . "search=" . urlencode($_POST['film']) . "&";
}

else {
    $urlSuivant = $url;
    $urlPrecedent = $url;
}
$urlSuivant .= "page=" . ($page + 1);
$urlPrecedent .= "page=" . ($page - 1);


?>


<!DOCTYPE html>
<html>
<head>
    <title> Affiche Recherche </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

</head>

<?php require "header2.php";  ?>
<body>

<?php require "nav.php"; // On inclut la barre de navigation ?>

<div class="contenu" id="contenu" name="contenu">

    <!-- Affichage des contenus retrouvé -->

    <div>
        <form action="afficheRecherche.php" method="POST">
            <input type="search" id="film" name="film" placeholder=<?php if (isset($mot)) echo $mot ?> "Rechercher un film, une série...">
            <button type="submit">Rechercher</button>
        </form>
    </div>

    <?php
        $init = (12*$page);
        $total = 0;

        for ($i=0; $i <=1; $i++) { // 2 lignes
            for ($j=0; $j < 6 ; $j++) {

                if (isset($resultat[$init]['poster_path'])) {
                    $img = $resultat[$init]['poster_path'];
                    echo "<a href=\"\"><img src='$img' width='200' height='200'> </a>" ;
                    $total++;
                }
                $init++;
            } echo "<br>";
        }
        $end = !(($total == 12 && isset($resultat[$init]))); // Si on a pas 12 ou que le suivant n'est pas
                                                                        //défini , on est a la fin de la liste


    
    ?>
    <?php if (isset($_GET['page']) && $_GET['page'] > 0): ?>
        <a href="<?php echo $urlPrecedent?>"> Page précedente </a>
    <?php endif; ?>
    <?php if (!$end): ?>
        <a href="<?php echo $urlSuivant?>"> Page suivante </a>
    <?php endif; ?>
</div>

</body>

</html>
