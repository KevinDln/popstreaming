<?php
session_start();
// Valeur du controle parentale
if (!isset($_SESSION['connected']) || $_SESSION['connected'] != true) {
    header("Location: pre_accueil.php");
    exit();
}

if ($_SESSION['controle'] == 1 ) {
    $controle = "Activé";
} elseif ($_SESSION['controle'] == 0 ) {
    $controle = "Désactivé";
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title> Paramètres </title>
    <link rel="icon" href="../Public/img/icon-pop-streaming.png" type="image/png">
    <link rel="icon" href="../Public/img/icon-pop-streaming.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/nav.css">
    <link rel="stylesheet" href="../Public/css/parametres.css">
    <link rel="stylesheet" href="../Public/css/menu_burger.css">
    <link rel="stylesheet" href="../Public/css/styles.css">
    <link rel="stylesheet" href="../Public/css/variables.css">
    <link rel="stylesheet" href="../Public/css/font.css">
    <link rel="stylesheet" href="../Public/css/nav_accueil.css">
    <link rel="stylesheet" href="../Public/css/footer.css">
</head>


<body>
<header>
    <?php require "nav_accueil.php"; ?>

</header>

<main>
    <div class="flex">
        <div class="wrap">
            <a href="#" class="btn-retour">
                <img src="../Public/img/btn-retour.png" alt="">
            </a>
            <?php require "nav.php" ?>
        </div>
        <div class="center">
            <table class="parametres">
                <tr>
                    <td> Langue </td>
                    <td class="link"> <a href="#"> Modifier </a> </td>
                    <td class="barre"> <?php echo $_SESSION['langue'] ?> </td>
                </tr>

                <tr>
                    <td> Controle parentale </td>
                    <td class="link"> <a href="controleParentale.php"> Modifier </a> </td>
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
        </div>
    </div>
</main>

<?php
include "footer.php"
?>
</body>

</html>