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
<html lang="fr">
<head>
    <title> Affiche Recherche </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/nav_accueil.css">
    <link rel="stylesheet" href="../Public/css/nav.css">
    <link rel="stylesheet" href="../Public/css/styles.css">
    <link rel="stylesheet" href="../Public/css/variables.css">
    <link rel="stylesheet" href="../Public/css/font.css">
    <link rel="stylesheet" href="../Public/css/recherche.css">
    <link rel="stylesheet" href="../Public/css/footer.css">
</head>


<body>
<?php require "nav_accueil.php";  ?>
<a href="../php/pre_accueil.php">
    <input class="chevron" type="image" src="../Public/img/btn-retour.png" alt="<"/></a> <br>

<div class="flex">
<?php require "nav.php"; // On inclut la barre de navigation ?>

    <!-- Affichage des contenus retrouvé -->

    <div>
        <form action="afficheRecherche.php" method="POST">
            <p>Rechercher</p>
            <label for="film">Recherche </label>
            <input  class="btn-secondary" type="search" id="film" name="film" placeholder=<?php if (isset($mot)) echo $mot ?> "Rechercher un film, une série...">
        </form>
    </div>


<div>
    <?php
    $init = (12*$page);
    $total = 0;

    for ($i=0; $i <=1; $i++) { // 2 lignes
        for ($j=0; $j < 6 ; $j++) {

            if (isset($resultat[$init]['poster_path'])) {
                $img = $resultat[$init]['poster_path'];
                echo "<a href=\"\"><img src='$img' width='200' height='200' alt=''> </a>" ;
                $total++;
            }
            $init++;
        } echo "<br>";
    }
    $end = !(($total == 12 && isset($resultat[$init]))); // Si on a pas 12 ou que le suivant n'est pas
    //défini , on est a la fin de la liste



    ?>
    <?php if (isset($_GET['page']) && $_GET['page'] > 0): ?>
        <a class href="<?php echo $urlPrecedent?>"> Page précedente </a>
    <?php endif; ?>
    <?php if (!$end): ?>
        <a href="<?php echo $urlSuivant?>"> Page suivante </a>
    <?php endif; ?>

</div>
</div>





<script src="../JS/header.js"></script>
<script src="../JS/langues.js"></script>
<script src="../JS/profil.js"></script>
<script src="../JS/rechercher.js"></script>
<script src="../JS/parametres.js"></script>

<?php
require "footer.php";
?>
</body>

</html>
