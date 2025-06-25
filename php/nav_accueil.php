<?php
if (isset($_SESSION['langue'])) {
    $test = $_SESSION['langue'];
    if ($test == "français") {
        $langue = "FR";
    } elseif ($test == "english") {
        $langue = "EN";
    } elseif ($test == "español") {
        $langue = "ES";
    }
} else {
    $_SESSION['langue'] = "français";
    $langue = "FR";
}

?>

<nav class="flex space_between backgourd-rgba menu">
    <a class="logo" href="accueil.php"><img src="../Public/img/logo-pop-streaming.png" alt=""></a>
    <div class="flex wrap container-nav">
        <div class="recherche">
            <form action="../php/afficheRecherche.php" method="POST">
                <input class="barre-de-recherche" type="search" name="film" placeholder="Rechercher un film, une série..." alt="recherche">
                <button class="btn-recherche" type="submit"><img class="btn-search" src="../Public/img/btn-search.png" alt=""></button>
            </form>
        </div>
        <div class="nav-actions">
            <a href="../php/notifications.php">
                <img src="../Public/img/bell.svg" alt="Notifications">
            </a>
        </div>
        <div class="nav-actions">
            <div class="langue">
                <button class="langue-selection btn-FR">FR</button>
                <ul class="language-affichage ">
                    <li><a class="btn-FR1" href="#">FR</a></li>
                    <li><a class="btn-FR1" href="#">EN</a></li>
                    <li><a class="btn-FR1" href="#">ES</a></li>
                </ul>
            </div>
        </div>
        <div class="nav-actions">
            <div class="profile-link">
                <a href="../php/profils.php">
                    <img class="photo-profils profile-image" src="../Public/img/defaut_profil.jpeg" alt="Photo de profil">
                </a>
                <ul class="options-affichage">
                    <li><a class="p" href="../php/modif_profils.php">Mon compte</a></li>
                    <li><a class="p" href="../php/deconnexion.php">Se déconnecter</a></li>
                </ul>
            </div>

        </div>
    </div>
    <script src="../JS/langues.js"></script>
    <script src="../JS/profil.js"></script>
    <script src="../JS/rechercher.js"></script>
    <script src="../JS/header.js"></script
    <script src="../JS/parametres.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 </nav>