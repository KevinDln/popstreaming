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

    <?php require "nav_accueil.php"; ?>

<a href="#" class="btn-retour" id="retour">
    <img src="../Public/img/btn-retour.png" alt="Retour">
</a>
<div class="flex gap1">
    <?php require "nav.php" ?>
    <div class="space">
        <table class="couleur">
            <tr>
                <td>
                    <div class="flexspace">
                        <div class="langue-info">
                            <div>Langue</div>
                            <div class="jaune"><?php echo $_SESSION['langue']; ?>
                            </div>
                        </div>
                        <div class="langue-action">
                            <a class="couleur" href="#">Modifier</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="flexspace">
                        <div class="langue-info">
                            <div>Contrôle parental</div>
                            <div class="jaune"><?php echo $controle ?>
                            </div>
                        </div>
                        <div class="langue-action">
                            <a class="couleur" href="controleparental.php">Modifier</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="flexspace">
                        <div class="langue-info">
                            <div>Verrouillage des profils</div>
                            <div class="jaune"><?php echo $controle ?>
                            </div>
                        </div>
                        <div class="langue-action">
                            <a class="couleur" href="controleparental.php">Modifier</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="flexspace">
                        <div class="langue-info">
                            <div>Activités de visionnement</div>
                        </div>
                        <div class="langue-action">
                            <a class="couleur" href="controleparental.php">Modifier</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="flexspace">
                        <div class="langue-info">
                            <div>Évaluations</div>
                        </div>
                        <div class="langue-action">
                            <a class="couleur" href="affichageTendances.php">Modifier</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="flexspace">
                        <div class="langue-info">
                            <div>Apparences des sous-titres </div>
                        </div>
                        <div class="langue-action">
                            <a class="couleur" href="affichageTendances.php">Modifier</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="flexspace">
                        <div class="langue-info">
                            <div>Paramètres de lecture </div>
                        </div>
                        <div class="langue-action">
                            <a class="couleur" href="#">Modifier</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="flexspace">
                        <div class="langue-info">
                            <div>FAQ</div>
                        </div>
                        <div class="langue-action">
                            <a class="couleur" href="../php/faq.php">Voir</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="flexspace">
                        <div class="langue-info">
                            <div>Se déconnecter</div>
                        </div>
                        <div class="langue-action">
                            <a class="couleur" href="../php/deconnexion2.php">Déconnecter</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="flexspace">
                        <div class="langue-info">
                            <div>Changer le moyen de paiement</div>
                        </div>
                        <div class="langue-action">
                            <a class="couleur" href="#">Voir</a>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="flexspace">
                        <div class="langue-info">
                            <div>Accéder aux factures</div>
                        </div>
                        <div class="langue-action">
                            <a class="couleur" href="#">Voir</a>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>

<script src="../JS/header.js"></script>
<script src="../JS/langues.js"></script>
<script src="../JS/profil.js"></script>
<script src="../JS/rechercher.js"></script>
<script src="../JS/parametres.js"></script>
<script src="../Public/js/toggle_faq.js"></script>

<?php
require "footer.php";
?>
</body>

</html>
