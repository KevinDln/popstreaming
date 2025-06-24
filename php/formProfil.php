<?php

session_start();

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
        <script src="../JS/mdp.js"> </script>

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

<a href="profilsmodif.php"> Retour </a>
    <h1> Modifier le profil </h1>



<div class="image">  <!-- Stocker l'image du profil, valeur a modifier -->
    <img src="<?php echo $tableres[0]['img']?>" alt="profil" width="200" height="200">
    <p> <?php echo  $tableres[0]['nom'] ?> </p>
</div>

<div class="form">

    <form class="formulaire" method="POST" action="valideModifs.php">

        <input id="name" type="text" value="<?php echo $tableres[0]['nom'] ?>" name="nom" readOnly>
        <a onclick="changeName()"> modifier </a> <br>

        <input id="mail" type="email" value="<?php echo $tableres2[0]['email']?>" name="mail" readOnly>
        <a onclick="changeEmail()"> modifier </a>

        <br>
        <input id="mdp" type="password" value="zaezeazezae"  name="mdp" readOnly>
        <a href="<?php echo $url?>"> modifier </a>
        <input type="checkbox" onclick="showPassword()">
        <br>

        <input type="text" placeholder="Gérer les profils des utilisateurs" readOnly>
        <input type="submit" formaction="profilsmodif.php" value="Modifier">

<br> <br>
        <input type="submit" value="Sauvegarder les modifications">
        <input type="submit" formaction="#" value="Annuler">
    </form>


</div>

</body>

</html>

