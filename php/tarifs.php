<?php

// Remplacer les V et X par les images de croix et validation

$date= date("Y-m-d");
$newdate = date('d/m/Y',strtotime('+1 month',strtotime($date)));

?>
<!DOCTYPE html>
<html>
<head>
    <title> Films </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script src="../JS/tarifs.js"> </script>
    <link rel="icon" href="../Public/img/icon-pop-streaming.png" type="image/png">
    <link rel="stylesheet" href="../Public/css/styles.css">
    <link rel="stylesheet" href="../Public/css/nav_accueil.css">
    <link rel="stylesheet" href="../Public/css/nav.css">
    <link rel="stylesheet" href="../Public/css/variables.css">
    <link rel="stylesheet" href="../Public/css/font.css">
    <link rel="stylesheet" href="../Public/css/tarifs.css">
    <link rel="stylesheet" href="../Public/css/footer.css">
</head>
<body>
    <header>
        <?php require "nav_vide.php"; ?>
    </header>
    <main>
        <a href="#" class="btn-retour" id="retour">
            <img src="../Public/img/btn-retour.png" alt="Retour">
        </a>

        <div class="center">
            <h2> Abonnement </h2>
            <p> Sélectionner le forfait qui vous convient </p>

            <table>
                <thead>
                <tr class="ligne-espace">
                    <td id="vide"> </td>
                    <td id="essentiel" class="essentiel espacement-head"> Essentiel </td>
                    <td id="standard" class="standard espacement-head"> Standard </td>
                    <td id="premium" class="premium espacement-head"> Premium </td>
                </tr>
                </thead>
                <tr>
                    <td id="name"> Tarif mensuel après le mois gratuit qui se termine le <?php echo $newdate ?> </td>
                    <td class="essentielcol"> 7.99 €</td>
                    <td class="standardcol"> 11,99€</td>
                    <td class="premiumcol"> 15,99 €</td>
                </tr>

                <tr>
                    <td id="name"> HD disponible </td>
                    <td class="essentielcol"><img class="x-pointe" src="../Public/img/point-X.png" alt=""></td>
                    <td class="standardcol"> V </td>
                    <td class="premiumcol"> V </td>
                </tr>

                <tr>
                    <td id="name"> Ultra HD disponible </td>
                    <td class="essentielcol"><img class="x-pointe" src="../Public/img/point-X.png" alt=""></td>
                    <td class="standardcol"><img class="x-pointe" src="../Public/img/point-X.png" alt=""></td>
                    <td class="premiumcol"> V </td>
                </tr>
                <tr>
                    <td id="name"> Pop Stream sur votre ordinateur, TV, smartphone et tablette </td>
                    <td class="essentielcol"> V </td>
                    <td class="standardcol"> V </td>
                    <td class="premiumcol"> V </td>
                </tr>
                <tr>
                    <td id="name"> Ecrans disponilbe en simultané </td>
                    <td class="essentielcol"> 1 </td>
                    <td class="standardcol"> 2 </td>
                    <td class="premiumcol"> 4 </td>
                </tr>
                <tr>
                    <td id="name"> Annulable a tout moment </td>
                    <td class="essentielcol"> V </td>
                    <td class="standardcol"> V </td>
                    <td class="premiumcol"> V </td>
                </tr>

            </table>


            <button onclick=getAbonnement()> Valider </button>

        </div>

    </main>

    <?php
    include "footer.php"
    ?>
<script src="../Public/js/menu_burger.js"></script>
<script src="../JS/header.js"></script>
<script src="../JS/parametres.js"></script>
<script src="../JS/langues.js"></script>
<script src="../JS/profil.js"></script>
<script src="../JS/rechercher.js"></script>
</body>

</html>



