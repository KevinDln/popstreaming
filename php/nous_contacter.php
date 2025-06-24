<!DOCTYPE html>
<html lang="fr">

<head>
    <title> Déconnexion </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <link rel="stylesheet" href="../Public/css/nav_accueil.css">
    <link rel="stylesheet" href="../Public/css/styles.css">
    <link rel="stylesheet" href="../Public/css/variables.css">
    <link rel="stylesheet" href="../Public/css/font.css">
    <link rel="stylesheet" href="../Public/css/nous_contacter.css">
    <link rel="stylesheet" href="../Public/css/footer.css">

</head>

<body>

<?php
require "nav_accueil.php";
?>
<div class="center">
    <h1> Nous contacter </h1>

    <p class="p"> Dites nous en plus et nous trouverons la meilleure solution pour vous </p>
    <form action="#">
    <textarea class="textarea p1" cols="80" rows="10" placeholder="Décrivez votre problème..." required> </textarea>
    <br><br>
    <button class="btn-primary" type="submit" > Envoyer </button>
    </form><br>

    <p class="p1"> Liens rapides </p>
         <ul>
              <li> <a class="p2" href="profils.php">Réinitialiser le mot de passe </a> </li>
              <li> <a class="p2" href="profils.php"> Mettre à jour l'email </a> </li>
              <li> <a class="p2" href="#">Obtenir de l'aide pour vous identifier </a> </li>
              <li> <a class="p2" href="#"> Mettre a jour la méthode de paiement </a> </li>
              <li> <a class="p2" href="#"> Demander des films ou des séries TV </a> </li>
         </ul>
</div>

<?php
require "footer.php";
?>

<script src="../JS/header.js"></script>
<script src="../JS/langues.js"></script>
<script src="../JS/profil.js"></script>
<script src="../JS/rechercher.js"></script>
<script src="../JS/parametres.js"></script>

</body>
</html>

