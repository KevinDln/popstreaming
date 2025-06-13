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
    <div>

        <img src="../img/logo_POP_STREAMING.png" height="78" width="180" alt="logo">
        <a href="  "><img src="../img/chevron.png"></a>
    </div>
</nav>

<div class="center">
    <h1>Payez en ligne</h1>

    <div class="flex">
        <div class="flex">
            <input type="radio" id="mode" name="mode" value="">
            <img src="../img/logo-cb.jpg" width="41" height="25" alt="CB">
        </div>

        <div class="flex">
             <input type="radio" id="mode" name="mode" value="">
             <img src="../img/Visa.jpg" width="41" height="20" alt="visa">
        </div>

        <div>
            <input type="radio" id="mode" name="mode" value="">
            <img src="../img/MasterCard.png" width="41" height="20" alt="MasterCard">
        </div>
    </div>
        <br>

    <div class="flex">
        <label>

            <div class="flex1">
                <p>Nom de la carte</p>
                <img src="../img/credit-card.png" width="46" height="45">
            </div>

            <input type="nomcarte" id="nomcarte" name="nomcarte" required="">


        <p class="p">Numéro de la carte</p>

        <input type="nomcarte" id="nomcarte" name="nomcarte" value="    ... ... ... ...">
            <br>
    <div class="flex">
        <p>Date d'expiration</p>

        <p>Cryptogramme visuel</p>
    </div>

        <input  type="nomcarte" id="nomcarte" name="nomcarte" value="    MM/AA">

        <input  type="nomcarte" id="nomcarte" name="nomcarte" value="    ...">
    <br>
        <input  type="submit" value="Payer">

        </label>
    </div>
</div>
    <?php
    include "footer.php"
    ?>


</body>
</html>


