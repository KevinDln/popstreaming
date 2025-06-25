<?php
require "connectdb.php";

$sql = $conn->prepare("SELECT img FROM profils WHERE id = ?");
$sql->bind_param("i", $_SESSION['profil']);
$sql->execute();
$res = $sql->get_result();
$result = $res->fetch_assoc();

?>


<nav class="flex backgourd-rgba menu">
    <div class="menu-burger">
        <div class="burger-icon">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
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
<nav class="flex space_between backgourd-rgba menu">
    <a class="logo" href=""><img src="../Public/img/logo-pop-streaming.png" height="78" width="180" alt=""></a>
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
                <button class="langue-selection btn-FR">FR <img class="switch-langue" src="../Public/img/drop-down-switch-langue.png" alt=""></i></button>
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