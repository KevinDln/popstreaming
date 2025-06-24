<?php
session_start();
require "connectdb.php";

//Page pour selectionner le profil et acceder a l'acceuil

// Récupérer l'id de l'utilisateur connecté
$id = $_SESSION['id']; // recuperation id
$sql = $conn->prepare("SELECT * FROM profils WHERE id_compte = ?"); // récuperes tout les profils du compte
$sql->bind_param("i", $id);
$sql->execute();
$result = $sql->get_result(); // Liste des profils récupéré

$tableres = [];
foreach($result as $row){
    $tableres[] = [
        'id' => $row['id'],
        'nom' => $row['nom'],
        'img' => $row['img'],
    ];
}



?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../Public/css/nav.css">
    <link rel="stylesheet" href="../Public/css/styles.css">
    <link rel="stylesheet" href="../Public/css/variables.css">
    <link rel="stylesheet" href="../Public/css/font.css">
    <link rel="stylesheet" href="../Public/css/profils.css">
</head>

<body>

<nav>
    <img src="../Public/img/logo_POP_STREAMING.png" height="78" width="180" alt="logo">

</nav>
<br>

<a href="../php/accueil.php"><input class="chevron" type="image" src="../Public/img/btn-retour.png" alt="<"</a>

<div class="center">
    <h1>Qui est-ce ?</h1>
    <br>

    <div class="profils">
        <div class="profil">
            <?php if (isset($tableres[0])) : ?>
                <a href="accueil.php">
                    <img src="<?php echo $tableres[0]['img'];?>" alt="NOM"></a><br>
                <p class="p1"><?php echo $tableres[0]['nom']; ?> </p>

            <?php else : ?>

                <a href="selectProfil.php?">
                    <img src="../Public/img/defaut_profil.jpeg" alt="NOM"></a><br>
                <p class="p1"> Nom </p>

            <?php endif; ?>
        </div>

        <div class="profil ajouter">

            <?php if (isset($tableres[1])) : ?>
                <div class="profil">
                    <a href="accueil.php">
                        <img src="<?php echo $tableres[1]['img'];?>" alt="NOM"></a><br>
                    <p class="p1"><?php echo $tableres[1]['nom']; ?> </p>
                </div>
            <?php else : ?>
                <div class="cercle">
                    <a href="selectProfil.php?">
                        <span class="plus">+</span></a><br></a><br>
                </div>
            <?php endif; ?>

        </div>

        <div class="profil ajouter">
            <?php if (isset($tableres[2])) : ?>
                <div class="profil">
                    <a href="accueil.php">
                        <img src="<?php echo $tableres[2]['img'];?>" alt="NOM"></a><br>
                    <p class="p1"><?php echo $tableres[2]['nom']; ?> </p>
                </div>


            <?php else : ?>
                <div class="cercle">
                    <a href="affichageFilms.php">
                        <span class="plus">+</span></a><br></a><br>
                </div>
            <?php endif; ?>

        </div>

        <div class="profil ajouter">
            <?php if (isset($tableres[3])) : ?>
                <div class="profil">
                    <a href="accueil.php">
                        <img src="<?php echo $tableres[3]['img'];?>" alt="NOM"></a><br>
                    <p class="p1"><?php echo $tableres[3]['nom']; ?> </p>
                </div>
            <?php else : ?>
                <div class="cercle">
                    <a href="selectProfil.php?">
                        <span class="plus">+</span></a><br></a><br>
                </div>
            <?php endif; ?>

        </div>

        <div class="profil ajouter">
            <div class="cercle">
                <?php if (isset($tableres[4])) : ?>
                    <div class="profil">
                        <a href="accueil.php">
                            <img src="<?php echo $tableres[4]['img'];?>" alt="NOM"></a><br>
                        <p class="p1"><?php echo $tableres[4]['nom']; ?> </p>
                    </div>
                <?php else : ?>
                    <div class="cercle">
                        <a href="selectProfil.php?">
                            <span class="plus">+</span></a><br></a><br>
                    </div>
                <?php endif; ?>
            </div>
        </div>



        <br> <br>


        <a class="btn-secondary" href="profilsmodif.php">Gérer les profils ?</a>
        <br>


</body>
</html>