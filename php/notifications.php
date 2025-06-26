<?php session_start() ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title> Notifications </title>
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
<a href="../php/accueil.php">
    <input class="chevron" type="image" src="../Public/img/btn-retour.png" alt="<"/></a> <br>

<div class="flex">
    <?php require "nav.php"; // On inclut la barre de navigation ?>
    <p class="center">Vous n'avez pas de nouvelles notifications</p>
</div>

<script src="../JS/header.js"></script>
<script src="../JS/langues.js"></script>
<script src="../JS/profil.js"></script>
<script src="../JS/rechercher.js"></script>
<script src="../JS/parametres.js"></script>


<?php require "footer.php" ?>
</body>

</html>