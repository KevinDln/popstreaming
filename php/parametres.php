<?php
session_start();
// Récuperer les informations de langues, de controle parental et verrouillage des profils
// Pas de fonctionnalité pour verrouillage des profils donc on passe a coté
// Récuperer infomationss via js ? ou stocker dans un session la langue ?

if (isset ($_POST['langue'])) {
    echo ($_POST['langue']);
} else {
    echo "Pas défini";
}

?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <title> Parametres </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script src="../JS/parametres.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

</head>

<?php require "header.php"; ?>
<body>

<table class="parametres">
    <tr>
        <td> Langue </td>
        <td class="link"> Modifier </td>
        <td class="barre"> français </td>
    </tr>

    <tr>
        <td> Controle parentale </td>
        <td class="link"> Modifier </td>
        <td class="barre"> Désactivé </td>
    </tr>

    <tr>
        <td> Verrouillage des profils </td>
        <td class="link"> Modifier </td>
        <td class="barre"> Désactiver </td>
    </tr>

    <tr>
        <td> Activités de visionnement </td>
        <td class="link"> Modifier </td>
    </tr>

    <tr>
        <td> Évaluations </td>
        <td class="link"> Modifier </td>
    </tr>

    <tr>
        <td> Apparences des sous titres </td>
        <td class="link"> Modifier </td>
    </tr>

    <tr>
        <td> Parametres de lecture </td>
        <td class="link"> Modifier </td>
    </tr>

    <tr>
        <td> FAQ </td>
        <td class="link"> Voir </td>
    </tr>

    <tr>
        <td> Se déconnecter </td>
        <td class="link"> Déconnecter </td>
    </tr>

    <tr>
        <td> Changer le moyen de paiement </td>
        <td class="link"> Voir </td>
    </tr>

    <tr>
        <td> Accéder aux factures </td>
        <td class="link"> Voir </td>
    </tr>


</table>

</body>

</html>