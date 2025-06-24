<?php
require "connectdb.php" ;
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") { // Récupération des valeurs contenues dans le formulaire
    if (isset($_POST['nom']) && isset($_POST['mail']) ) {
        $nom = $_POST['nom'];
        $mail = $_POST['mail'];
        $id = $_SESSION['profil'];
        echo "Nom :  ". $_POST['nom'] . " Email :  " . $_POST['mail'];

        $sql = $conn->prepare("UPDATE profils SET nom = '$nom' WHERE id = $id ");
        $sql->execute();
        header("Location: formProfil.php?profil=$id");

    }


}

?>