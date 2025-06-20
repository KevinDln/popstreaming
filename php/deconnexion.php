<?php session_start();
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <title> Déconnexion </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">

        <link rel="stylesheet" href="../Public/css/nav_accueil.css">
        <link rel="stylesheet" href="../Public/css/nav.css">
        <link rel="stylesheet" href="../Public/css/styles.css">
        <link rel="stylesheet" href="../Public/css/variables.css">
        <link rel="stylesheet" href="../Public/css/font.css">
        <link rel="stylesheet" href="../Public/css/deconnexion.css">
        <link rel="stylesheet" href="../Public/css/footer.css">
    </head>


    <body>
    <?php require "nav_accueil.php"; ?>
        <br>
        <a href="../php/pre_accueil.php">
            <input class="chevron" type="image" src="../Public/img/btn-retour.png"/>
        </a> <br>
    <?php require "nav.php"; ?>


    <div class="centrer">
        <h2> Se déconnecter </h2>
        <p class="p1"> Déconnectez-vous de votre compte Pop Streaming </p>
        <form action="accueil.php">
            <button class="btn-primary input" type="submit" formaction="logout.php"> Déconnexion </button>
            <button class="btn-secondary input" type="submit" > Rester connecter </button>
        </form>
    </div>


    <?php require "footer.php"; ?>
    </body>
</html>