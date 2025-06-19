<?php session_start();
?>
<!DOCTYPE html>
<html lang="fr">

    <head>
        <title> Déconnexion </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">

    </head>

    <?php require "header.php"; ?>
    <body>
        <?php require "nav.php"; ?>
        <h2> Se déconnecter </h2>
        <p> Déconnectez-vous de votre compte Pop Streaming </p>
        <form action="accueil.php">
            <button type="submit" formaction="logout.php"> Déconnexion </button>
            <button type="submit" > Rester connecter </button>
        </form>

    </body>

</html>