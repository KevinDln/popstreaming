<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../JS/mdp.js"> </script>
    <title>Inscription</title>
    <link rel="icon" href="../Public/img/icon-pop-streaming.png" type="image/png">
    <link rel="stylesheet" href="../Public/css/styles.css">
    <link rel="stylesheet" href="../Public/css/variables.css">
    <link rel="stylesheet" href="../Public/css/font.css">
    <link rel="stylesheet" href="../Public/css/nav_connexion_inscription.css">
    <link rel="stylesheet" href="../Public/css/connexion.css">
</head>


<body>
<header>
    <?php
        require "nav_connexion_inscription.php";
    ?>
</header>
<main>
    <a href="#" class="btn-retour">
        <img src="../Public/img/btn-retour.png" alt="">
    </a>
    <div class="flex center">
        <form method="POST" action="InscriptionTraitement.php" placeholder="Rechercher un film, une série..." >
            <h1>Incription</h1>
            <input class="input-fond-clair form-element" type="text" id="nom" name="nom" placeholder="Nom" required>
            <br>
            <input class="input-fond-clair form-element" type="text" id="prenom" name="prenom" placeholder="Prénom" required>
            <br>
            <input class="input-fond-clair form-element" type="text" id="email" name="email" placeholder="Email" required>
            <br>
            <input class=" input-fond-clair form-element" type="text" id="date_naissance" name="date_naissance" placeholder="Date de naissance" required>
            <br>
            <div class="password-container form-element">
                <input class="input-fond-clair" type="password" id="mdp" name="mdp" placeholder="Mot de passe" required>
                <img src="../Public/img/eye-close.png" id="togglePassword" class="password-toggle" onclick="showPassword('mdp', 'togglePassword')">
            </div>
            <div class="password-container form-element">
                <input class="input-fond-clair" type="password" id="confirmmdp" name="mdp" placeholder="Mot de passe" required>
                <img src="../Public/img/eye-close.png" id="togglePassword" class="password-toggle" onclick="showPassword('confirmMdp', 'toggleConfirmPassword')">
            </div>
            <br>
            <br>
            <input class="btn-primary width" type="submit" value="Valider">
        </form>
    </div>
</main>

<script src="../Public/js/menu_burger.js"></script>
<script src="../JS/header.js"></script>
<script src="../JS/parametres.js"></script>
<script src="../JS/langues.js"></script>
</body>
</html>