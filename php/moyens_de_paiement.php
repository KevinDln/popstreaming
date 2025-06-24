<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../Public/css/nav.css">
    <link rel="stylesheet" href="../Public/css/styles.css">
    <link rel="stylesheet" href="../Public/css/variables.css">
    <link rel="stylesheet" href="../Public/css/font.css">
    <link rel="stylesheet" href="../Public/css/moyens.css">
    <link rel="stylesheet" href="../Public/css/footer.css">
</head>


<body>
<nav>
    <img src="../Public/img/logo_POP_STREAMING.png" height="78" width="180" alt="logo">

</nav>
<br>

<a href="../php/tarifs_et_avantages.php"><input class="chevron" type="image" src="../Public/img/btn-retour.png"</a> <br>
<div class="center"><h1>Payez en ligne</h1>
</div>

<div class="center">

    <div class="center flex div1">
        <div>
            <input type="radio" id="mode" name="mode" value="">
            <img src="../Public/img/logo-cb.jpg" width="41" height="25" alt="CB">
        </div>

        <div>
            <input type="radio" id="mode" name="mode" value="">
            <img src="../Public/img/Visa.jpg" width="41" height="25" alt="visa">
        </div>

        <div>
            <input type="radio" id="mode" name="mode" value="">
            <img src="../Public/img/MasterCard.png" width="41" height="20" alt="MasterCard">
        </div>
    </div>
    <br>

    <div class="flex">
        <label>
            <div>
                <input class="input" type="text" id="nomcarte" name="nomcarte" value="    Nom de la carte"><br>
                <input class="input2" type="nomcarte" id="nomcarte" name="nomcarte" required="">
            </div><br>

            <div class="div2">
                <input class="input" type="text" id="nomcarte" name="nomcarte" value="              Numéro de la carte">
                <input class="input6" type="image" id="image" alt="carte" src="../Public/img/credit-card.png" width="43" height="43">
            </div><br>
            <input class="input2" type="nomcarte" id="nomcarte" name="nomcarte" value="    ... ... ... ..."><br>


            <div class="div3">
                <input class="input3" type="text" id="nomcarte" name="nomcarte" value="    Date d'expiration">
                <input class="input3" type="text" id="nomcarte" name="nomcarte" value="    Cryptogramme visuel">
            </div>
        </label>
    </div><br>

    <div class="div3">
        <input class="input4" type="nomcarte" id="nomcarte" name="nomcarte" value="    MM / AA">
        <input class="input4" type="nomcarte" id="nomcarte" name="nomcarte" value="    ...">
    </div><br>

    <a class="btn-primary" href="inscription.php">Payer</a> <br>
</div>


<?php
include "footer.php"
?>

</body>
</html>

