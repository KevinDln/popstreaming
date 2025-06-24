<?php
session_start();

if (isset($_GET['url'])) {
    $url = $_GET['url'];
}

<!DOCTYPE html>
<html lang="fr">

<head>
    <title> Parametres </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">


</head>


<body>
<?php require "header.php"; ?>

<a href="accueil.php"> retour </a>
<?php require "nav.php" ?>
<table class="parametres">
    <tr>
        <td> Langue </td>
        <td class="link"> <a href="#"> Modifier </a> </td>
        <td class="barre"> <?php echo $_SESSION['langue'] ?> </td>
    </tr>

    <tr>
        <td> Controle parentale </td>
        <td class="link"> <a href="#"> Modifier </a> </td>
        <td class="barre"> <?php echo $controle ?> </td>
    </tr>

    <tr>
        <td> Verrouillage des profils </td>
        <td class="link"> <a href="#"> Modifier </a> </td>
        <td class="barre"> Désactiver </td>
    </tr>

    <tr>
        <td> Activités de visionnement </td>
        <td class="link"> <a href="#"> Modifier </a></td>
    </tr>

    <tr>
        <td> Évaluations </td>
        <td class="link"> <a href="#">Modifier </a></td>
    </tr>

    <tr>
        <td> Apparences des sous titres </td>
        <td class="link"> <a href="#"> Modifier </a></td>
    </tr>

    <tr>
        <td> Parametres de lecture </td>
        <td class="link"> <a href="#"> Modifier </a></td>
    </tr>

    <tr>
        <td> FAQ </td>
        <td class="link"> <a href="#"> Voir </a></td>
    </tr>

    <tr>
        <td> Se déconnecter </td>
        <td class="link"> <a href="deconnexion2.php"> Déconnecter </a></td>
    </tr>

    <tr>
        <td> Changer le moyen de paiement </td>
        <td class="link"> <a href="#"> Voir </a></td>
    </tr>

    <tr>
        <td> Accéder aux factures </td>
        <td class="link"> <a href="#"> Voir </a></td>
    </tr>


</table>

</body>

</html>

?>