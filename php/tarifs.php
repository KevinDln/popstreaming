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
</head>

<?php require "header.php"; // Changer par la bonne version du header ?>
<body>

<a href="pre_accueil.php" class="retour" id="retour"> Retour </a>  <!--- Rajouter l'image de la fleche apres  -->

<h2> Abonnement </h2>
<p> Sélectionner le forfait qui vous convient </p>

<table>
    <thead>
        <tr>
            <td id="vide"> </td>
            <td id="essentiel" class="essentiel"> Essentiel </td>
            <td id="standard" class="standard"> Standard </td>
            <td id="premium" class="premium"> Premium </td>
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
        <td class="essentielcol"> X </td>
        <td class="standardcol"> V </td>
        <td class="premiumcol"> V </td>
    </tr>

    <tr>
        <td id="name"> Ultra HD disponible </td>
        <td class="essentielcol"> X </td>
        <td class="standardcol"> X </td>
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


</body>

</html>



