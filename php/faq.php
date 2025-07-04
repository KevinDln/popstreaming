<?php
session_start();

$urlprofil = "formProfil.php?profil=" . $_SESSION['profil'];


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="../Public/css/nav_accueil.css">
    <link rel="stylesheet" href="../Public/css/faq.css">
    <link rel="stylesheet" href="../Public/css/styles.css">
    <link rel="stylesheet" href="../Public/css/variables.css">
    <link rel="stylesheet" href="../Public/css/font.css">
    <link rel="stylesheet" href="../Public/css/footer.css">

    <title>Aide - Pop Stream</title>

</head>
<body>
<?php
include "nav_accueil.php";
?>
<a href="../php/pre_accueil.php">
    <input class="chevron" type="image" src="../Public/img/btn-retour.png"/>
</a> <br>
<div class="flex">
    <div class="center container">
        <div class="left-panel">
            <h1>Comment pouvons-nous vous aider ?</h1>

            <div class="search-bar">
                <input type="text" placeholder="Saississez une question, un sujet ou un problème" />
            </div>

            <div class="section">
                <h2>Premier pas</h2>
                <div class="option">Rejoindre Pop Stream <a href="inscription.php">+</a></div>
                <div class="option">Configuration de l’appareil <a href="parametres.php">+</a></div>
            </div>

            <div class="section">
                <h2>Compte et facturation</h2>
                <div class="option">Paramètre du compte <a href="parametres.php">+</a></div>
                <div class="option">Paiement <a href="parametres.php">+</a></div>
            </div>

            <div class="section">
                <h2>Résoudre un problème</h2>
                <div class="option">Problème de compte / Facturation <a href="parametres.php">+</a></div>
                <div class="option">Code d’erreur / Problème de lecture <a href="nous_contacter.php">+</a></div>
            </div>
        </div>

        <!-- RIGHT SIDE -->
        <div class="right-panel">
            <div class="quick-links">
                <h2>Liens rapides</h2>
                <ul>
                    <li><a href="<?php echo $urlprofil ?>">Réinitialiser le mot de passe</a></li>
                    <li><a href="<?php echo $urlprofil ?>">Mettre à jour l’e-mail</a></li>
                    <li><a href="nous_contacter.php">Obtenir de l’aide pour vous identifier</a></li>
                    <li><a href="parametres.php">Mettre à jour le mode de paiement</a></li>
                    <li><a href="nous_contacter.php">Demander des films ou des série TV</a></li>
                </ul>

                <div class="help-box">
                    <p>Besoin d’aide supplémentaire ?</p>
                </div>

                <div class="contact-button">
                    <form action="nous_contacter.php">
                        <button type="submit"> Nous contacter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../JS/langues.js"></script>
<script src="../JS/header.js"></script>
<script src="../JS/profil.js"></script>
<script src="../JS/rechercher.js"></script>

<?php require "footer.php"?>
</body>
</html>