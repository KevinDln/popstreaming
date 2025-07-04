<?php session_start();
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <title> Déconnexion </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="icon" href="../Public/img/icon-pop-streaming.png" type="image/png">
        <link rel="stylesheet" href="../Public/css/nav_accueil.css">
        <link rel="stylesheet" href="../Public/css/nav.css">
        <link rel="stylesheet" href="../Public/css/styles.css">
        <link rel="stylesheet" href="../Public/css/variables.css">
        <link rel="stylesheet" href="../Public/css/font.css">
        <link rel="stylesheet" href="../Public/css/menu_burger.css">
        <link rel="stylesheet" href="../Public/css/deconnexion.css">
        <link rel="stylesheet" href="../Public/css/footer.css">
    </head>


    <body>
    <?php require "nav_accueil.php"; ?>
    <br>
    <a href="#" class="btn-retour">
        <img src="../Public/img/btn-retour.png" alt="">
    </a>
    <br>
    <div class="flex">
        <?php require "nav.php"; ?>

        <div class=container-deconnexion>
            <h2> Se déconnecter </h2>
            <p class="p1"> Déconnectez-vous de votre compte Pop Streaming </p>
            <form action="../php/accueil.php">
                <div class="flex gap">
                    <button class="btn-primary input" type="submit" formaction="logout.php"> Déconnexion </button>
                    <button class="btn-secondary input" type="submit" > Rester connecter </button>
                </div>
            </form>
        </div>
    </div>

    <?php require "footer.php"; ?>

    <script src="../JS/langues.js"></script>
    <script src="../JS/header.js"></script>
    <script src="../JS/profil.js"></script>
    <script src="../JS/rechercher.js"></script>
    <script src="../Public/js/menu_burger.js"></script>

    </body>
</html>