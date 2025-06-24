<?php

session_start();
require "connectdb.php";


$profil = $_SESSION['profil'];
$id = $_SESSION['id'];

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

$urlCompte = "modifMdp.php?id=" . $_SESSION['id'];
$urlProfil = "formProfil.php?profil=" . $profil;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['oldmdp']) && isset($_POST['newMdp']) && isset($_POST['newMdpCheck'])) {
        $oldmdp = $_POST['oldmdp'];
        $newmdp = $_POST['newMdp'];
        $newmdpCheck = $_POST['newMdpCheck'];
    }
        $sql = $conn->prepare("SELECT mdp FROM utilisateur WHERE id = ?");
        $sql->bind_param("i", $_SESSION['id']);
        $sql->execute();
        $res = $sql->get_result();
        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            if (password_verify($oldmdp, $row['mdp'])) { // Vérifie d'abord si le mdp est le bon
                if ($newmdp == $newmdpCheck) { // Si le nouveau mdp a bien été mis 2 fois
                    $sql2 = $conn->prepare("UPDATE utilisateur SET mdp = ? WHERE id = $id ");
                    $mdp = password_hash($newmdp, PASSWORD_DEFAULT);
                    $sql2->bind_param("s", $mdp);
                    $sql2->execute();
                    header("Location: $urlProfil");
                }
            }
        }


}
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

    </head>


<body>
    <h1> Modifier le profil </h1>

<div class="image">  <!-- Stocker l'image du profil, valeur a modifier -->
    <img src="<?php echo $tableres[0]['img']?>" alt="profil" width="200" height="200">
    <p> <?php echo  $tableres[0]['nom'] ?> </p>
</div>

<div class="form">

    <form class="formulaire" method="POST" action="<?php echo $urlCompte ?>">

        <label for="mdp">Ancien Mot de passe </label> <br>
        <input id="mdp" type="password" name="oldmdp" required>
        <input type="checkbox" onclick="showPassword()" >
        <br>

        <label for="mdp2">Nouveau Mot de passe </label> <br>
        <input id="mdp2" type="password"  name="newMdp" required>
        <input type="checkbox" onclick="showPassword2()" >
        <br>

        <label for="mdp3">Vérifiez votre mot de passe </label> <br>
        <input id="mdp3" type="password"  name="newMdpCheck" required>
        <input type="checkbox" onclick="showPassword3()">
        <br>

<br> <br>
        <input type="submit" value="Sauvegarder les modifications">
        <a href="<?php echo $urlProfil?>"> Annuler </a>
    </form>


</div>

</body>

</html>

