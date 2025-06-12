<!DOCTYPE html>
<div lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="mo">
</head>


<div class="body">

<header class="header">
    <img src="images/logo_POP_STREAMING.png" height="78" width="180" alt="logo">
</header>


<h1 class="Titre">Payez en ligne</h1>

        <label>
            <input type="radio" id="mode" name="mode" value="">
        </label>

        <label>
            <img src="images/logo-cb.jpg" width="41" height="25" alt="CB">
        </label>


        <label>
            <input type="radio" id="mode" name="mode" value="">
        </label>

        <label>
            <img src="images/visa.jpg" width="41" height="20" alt="visa">
        </label>

        <label>
            <input type="radio" id="mode" name="mode" value="">
        </label>

        <label>
            <img src="images/MasterCard.png" width="41" height="20" alt="MasterCard">
        </label>

   <br>


<p class="p">Nom de la carte</p>

<input class="input2" type="nomcarte" id="nomcarte" name="nomcarte" required="">


<br>


<img src="images/credit-card.png" width="46" height="45">

<p class="p">Numéro de la carte</p>



<input class="input2" type="nomcarte" id="nomcarte" name="nomcarte" value="    ... ... ... ...">


    <br>


<p>Date d'expiration</p>

 <p>Cryptogramme visuel</p>

    <br>


<input class="input4" type="nomcarte" id="nomcarte" name="nomcarte" value="    MM/AA">

<input class="input4" type="nomcarte" id="nomcarte" name="nomcarte" value="    ...">

<input class="input5" type="submit" value="Payer">


</div>
<footer>
    <?php
    include "footer.php"
    ?>
</footer>

</body>
</html>


