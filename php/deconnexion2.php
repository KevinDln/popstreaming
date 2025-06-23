<!DOCTYPE html>
<html lang="fr">

<head>
    <title> Déconnexion2 </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <link rel="stylesheet" href="../Public/css/nav_accueil.css">
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
        </a>
        <br>

        <div class="centrer">
            <h2> Se déconnecter </h2>
            <p class="p1"> Déconnectez-vous de votre compte Pop Streaming </p>
            <form action="../php/accueil.php">
                <button class="btn-primary input" type="submit" formaction="logout.php"> Déconnexion </button>
                <button class="btn-secondary input" type="submit" > Rester connecter </button>
            </form>
        </div>
        <?php require "footer.php"; ?>
        <script src="../JS/header.js"></script>
        <script src="../JS/langues.js"></script>
        <script src="../JS/profil.js"></script>
        <script src="../JS/rechercher.js"></script>
    </body>

</html>

