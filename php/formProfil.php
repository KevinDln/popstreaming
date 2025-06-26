<?php

session_start();
if (!isset($_SESSION['connected']) || $_SESSION['connected'] != true) {
    header("Location: pre_accueil.php");
    exit();
}

require "connectdb.php";

if (isset($_GET['profil'])) $profil = $_GET['profil'];
else header("Location: profilsmodif.php");
$_SESSION['profil'] = $profil;


$sql = $conn->prepare("SELECT * FROM profils WHERE id = ?");
$sql->bind_param("i", $profil);
$sql->execute();
$result = $sql->get_result();
$tableres = [];
foreach($result as $row){
    $tableres[] = [
        'id_compte' => $row['id_compte'],
        'nom' => $row['nom'],
        'img' => $row['img'],
    ];
}
// Récuperer l'email et le mdp du compte pour l'afficher dans le formulaire

$sql2 = $conn->prepare("SELECT * FROM utilisateur WHERE id = ?");
$sql2->bind_param("i", $tableres[0]['id_compte']);
$sql2->execute();
$result2 = $sql2->get_result();
$tableres2 = [];
foreach($result2 as $row){
    $tableres2[] = [
        'email' => $row['email'],
    ];
}

$url = "modifMdp.php?id=" . $_SESSION['id'];

?>


<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PopStreaming</title>

        <link rel="stylesheet" href="../Public/css/nav.css">
        <link rel="stylesheet" href="../Public/css/styles.css">
        <link rel="stylesheet" href="../Public/css/variables.css">
        <link rel="stylesheet" href="../Public/css/font.css">
        <link rel="stylesheet" href="../Public/css/profils.css">
        <link rel="stylesheet" href="../Public/css/modif_profils.css">
        <script src="../JS/mdp.js"> </script>
        <script src="../JS/modifProfil.js"> </script>
        <link rel="stylesheet" href="../Public/css/afficheprofils.css">

        <script>
            function changeName () {
                const name = document.querySelector('#name');
                if (name.readOnly) {
                    name.readOnly = false;
                } else {
                    name.readOnly = true;
                }
            }

            function changeEmail () {
                const email = document.querySelector('#mail');
                if (email.readOnly) {
                    email.readOnly = false;
                } else {
                    email.readOnly = true;
                }
            }


        </script>
    </head>


<body>

<a href="profilsmodif.php"><input class="chevron" type="image" src="../Public/img/btn-retour.png" alt="<"></a>
    <h1> Modifier le profil </h1>
<form class="profileForm bloc-droite flex" method="POST" action="valideModifs.php">

<div class="profil cercle">
<div class="profile-section">
    <div class="profile-image-container">
        <div class="profil cercle" id="profileImage" onclick="openImage()">
           <div class="image">
            <img src="<?php echo $tableres[0]['img']?>" alt="profil" width="200" height="200">
            <p> <?php echo  $tableres[0]['nom'] ?> </p>
            </div>
        </div>
        <p>Cliquer pour modifier la photo</p><br><br>
    </div>
</div>
</div>


<div class="form">



        <input class="input1" id="name" type="text" value="<?php echo $tableres[0]['nom'] ?>" name="nom" readOnly>
        <a onclick="changeName()"> modifier </a> <br>

        <input class="input1" id="mail" type="email" value="<?php echo $tableres2[0]['email']?>" name="mail" readOnly>
        <a onclick="changeEmail()"> modifier </a>

        <br>
        <input class="input1" id="mdp" type="password" value=""  name="mdp" readOnly>
        <a href="<?php echo $url?>"> modifier </a>
        <input type="checkbox" onclick="showPassword()">
        <br>

        <input type="hidden" id="selected_image_id" name="image_id" value="">
        <input type="hidden" id="selected_image_url" name="image_url" value="">

        <input class="input1" type="text" placeholder="Gérer les profils des utilisateurs" readOnly>
        <input type="submit" formaction="profilsmodif.php" value="Modifier">

<br> <br>
        <input class="btn-primary" type="submit" value="Sauvegarder les modifications">
        <a class="input3" href="profilsmodif.php"> Annuler </a>
    </form>


</div>

<div class="image-modal" id="imageModal">
        <div class="image-content">
            <div class="image-header">
                <h2>Choisir une photo de profil</h2>
                <p>Sélectionnez une image pour votre profil</p>
            </div>
            
            <div class="image-grid" id="imageGrid">
              
            </div>
            
            <div class="modal-buttons">
                <button class="modal-btn modal-btn-primary" onclick="confirmImage()">Confirmer</button>
                <button class="modal-btn modal-btn-secondary" onclick="closeImageModal()">Annuler</button>
            </div>
        </div>
    </div>

</body>

</html>

