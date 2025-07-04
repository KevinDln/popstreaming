<?php
require "fonctions.php";
require "connectdb.php";
require "fonctionParentales.php";



session_start();
if (!isset($_SESSION["controle"])) $_SESSION["controle"] = 1; // Par défaut le controle est activé

if (isset($_GET['id'])) {
    $_SESSION['profil'] = $_GET['id']; // On récupère l'id du profil
}


if (!isset($_SESSION['connected']) || $_SESSION['connected'] != true) {
    header("Location: pre_accueil.php");
    exit();
}


// on veut 5 tendances actuelles, 3 films d'action,
// 3 fantastiques, 3 comédies, 3 drames, 3 séries d'animation et 3 documentaires
// Mise en forme a faire dans le css
// Pour changer les images, on peut les changer dans le javascript loadContent.js


if ($_SESSION['controle'] == 0) { // pas de controle parentale
    $tendances = getTendances($conn); // Récupération des tendances
    $_SESSION['content'] = [
        "Action" => selectByGenreMovie("Action",$conn), // Récupération des films d'action
        "Fantastique" => selectByGenreMovie("Fantastique",$conn), // Récupération des films fantastiques
        "Comedie" => selectByGenreMovie("Comédie",$conn), // Récupération des films comédies
        "Drame" => selectByGenreShows("Drame",$conn), // Récupération des séries drames
        "Animation" => selectByGenreShows("Animation",$conn), // Récupération des séries d'animation
        "Mystere" => selectByGenreShows("Mystère",$conn), // Récupération des séries documentaires
    ];
    $affiche = getAffiche($conn); // Récupération de l'affiche

} else {
    $tendances = getTendancesParent($conn); // Récupération des tendances
    $_SESSION['content'] = [
        "Action" => selectByGenreMovieParent("Action",$conn), // Récupération des films d'action
        "Fantastique" => selectByGenreMovieParent("Fantastique",$conn), // Récupération des films fantastiques
        "Comedie" => selectByGenreMovieParent("Comédie",$conn), // Récupération des films comédies
        "Drame" => selectByGenreShowsParent("Drame",$conn), // Récupération des séries drames
        "Animation" => selectByGenreShowsParent("Animation",$conn), // Récupération des séries d'animation
        "Mystere" => selectByGenreShowsParent("Mystère",$conn), // Récupération des séries documentaires
    ];
    $affiche = getAfficheParent($conn); // Récupération de l'affiche
}

?>


<!DOCTYPE html>
<html>
<head>
    <title> Accueil </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script src="../JS/loadContent.js"></script>
    <link rel="stylesheet" href="../Public/css/menu_burger.css">
    <link rel="stylesheet" href="../Public/css/nav.css">
    <link rel="stylesheet" href="../Public/css/nav_accueil.css">
    <link rel="stylesheet" href="../Public/css/styles.css">
    <link rel="stylesheet" href="../Public/css/variables.css">
    <link rel="stylesheet" href="../Public/css/font.css">
    <link rel="stylesheet" href="../Public/css/pre_accueil.css">
    <link rel="stylesheet" href="../Public/css/footer.css">
</head>

<body>

<?php require "nav_accueil.php"; // On inclut l'entête de la page ?>
<?php require "nav.php"; // On inclut la barre de navigation ?>

<a href="#" class="btn-retour">
    <img src="../Public/img/btn-retour.png" alt="">
</a>

<header class="affiche" id="affiche" name="affiche">
    <!--- Div de stockage de l'affiche --->
    <?php $urlaffiche = "strat_video.php?id=".$affiche[0]['id']."&type=films"; ?>
    <a class="dov" href="<?php echo $urlaffiche; ?>">
        <img class="img-header" src="<?php echo $affiche[0]['backdrop_path']; ?>" alt="Affiche du film">
    </a>
</header>

<div class="center contenu" id="contenu" name="contenu">
    <!--- Div de stockage du contenu, attendre css pour mise en forme --->
    <h2> Tendance actuelles </h2>

    <div class="tendances" id="tendances" name="tendances">

        <?php
        $init = 0;
        for ($i=0; $i <5 ; $i++) { // Les lignes
            if (isset($tendances[$init])) {
                $img = $tendances[$init]['poster_path'];
                $url2 = "strat_video.php?id=".$tendances[$init]['id']."&type=films";
                echo "<a href=\"$url2\"> <img src='$img' width='250' height='200'> </a>" ;
            }
            $init++;
        }
        ?>

    </div>


    <h2> Films d'action </h2>

    <div class="action" id="action-container" name="action">
    </div>
    <a  href="#" id="action-prev" onclick="loadPrev('Action', event)" style="display:none;"><img class="btn-left" src="../Public/img/btn-left.png" alt=""></a>
    <a class="block" href="#" id="action-next" onclick="loadNext('Action',event)"><img class="btn-left" src="../Public/img/btn-right.png" alt=""></a>

    <h2> Fantastique </h2>

    <div class="fantastique" id="fantastique-container" name="fantastique">
    </div>

    <a class="block" href="#" id="fantastique-prev" onclick="loadPrev('Fantastique', event)" style="display:none;"><img class="btn-left" src="../Public/img/btn-left.png" alt=""></a>
    <a class="block" href="#" id="fantastique-next" onclick="loadNext('Fantastique',event)"><img class="btn-left" src="../Public/img/btn-right.png" alt=""></a>

    <h2> Comédies </h2>
    <div class="comedie" id="comedie-container" name="comedie">
    </div>

    <a class="block" href="#" id="comedie-prev" onclick="loadPrev('Comedie', event)" style="display:none;"><img class="btn-left" src="../Public/img/btn-left.png" alt=""></a>
    <a class="block" href="#" id="comedie-next" onclick="loadNext('Comedie',event)"><img class="btn-left" src="../Public/img/btn-right.png" alt=""></a>

    <h2> Drames </h2>
    <div class="drame" id="drame-container" name="drame">
    </div>
    <a class="block" href="#" id="drame-prev" onclick="loadPrev('Drame', event)" style="display:none;"><img class="btn-left" src="../Public/img/btn-left.png" alt=""></a>
    <a class="block" href="#" id="drame-next" onclick="loadNext('Drame',event)"><img class="btn-left" src="../Public/img/btn-right.png" alt=""></a>

    <h2> Série d'animation </h2>

    <div class="animation" id="animation-container" name="animation">
    </div>
    <a class="block" href="#" id="animation-prev" onclick="loadPrev('Animation', event)" style="display:none;"><img class="btn-left" src="../Public/img/btn-left.png" alt=""></a>
    <a class="block" href="#" id="animation-next" onclick="loadNext('Animation',event)"><img class="btn-left" src="../Public/img/btn-right.png" alt=""></a>

    <h2> Mystere </h2>

    <div class="mystere" id="mystere-container" name="documentaire">
    </div>
    <a class="block" href="#" id="mystere-prev" onclick="loadPrev('Mystere', event)" style="display:none;"><img class="btn-left" src="../Public/img/btn-left.png" alt=""></a>
    <a class="block" href="#" id="mystere-next" onclick="loadNext('Mystere',event)"><img class="btn-left" src="../Public/img/btn-right.png" alt=""></a>




</div>
<?php require "footer.php" ?>
</body>

</html>