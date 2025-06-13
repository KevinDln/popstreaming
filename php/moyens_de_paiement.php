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

    </div>
<br>

</nav>

<div class="center">

        <a class="btn-primary" href="  "><img src="../img/chevron.png"></a>
        <h1>Payez en ligne</h1>


    <div class="flex">
        <div class="flex">
            <input type="radio" id="mode" name="mode" value="">
            <img src="../img/logo-cb.jpg" width="41" height="20" alt="CB">
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
                <p class="btn-secondary">Nom de la carte</p>
                <img src="../img/credit-card.png" width="46" height="45">
            </div>
            <input class="input1" type="nomcarte" id="nomcarte" name="nomcarte" required="">


            <p class="btn-secondary">Numéro de la carte</p><br>
            <input class="btn-secondary" type="nomcarte" id="nomcarte" name="nomcarte" value="    ... ... ... ...">
            <br> <br>

            <div class="flex">
                <p class="btn-secondary">Date d'expiration</p>

                <p class="btn-secondary">Cryptogramme visuel</p>
            </div>

        <input class="input1" type="nomcarte" id="nomcarte" name="nomcarte" value="    MM/AA">

        <input class="input1" type="nomcarte" id="nomcarte" name="nomcarte" value="    ...">
    <br> <br>
        <input class="btn-primary"  type="submit" value="Payer">


        </label>
    </div>
</div>
    <?php
    include "footer.php"
    ?>


</body>
</html>


