<?php
require "connectdb.php" ;
session_start();
if (!isset($_SESSION['connected']) || $_SESSION['connected'] != true) {
    header("Location: pre_accueil.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") { // Récupération des valeurs contenues dans le formulaire
    if (isset($_POST['nom']) && isset($_POST['mail']) ) {
        $nom = $_POST['nom'];
        $mail = $_POST['mail'];
        $id = $_SESSION['profil'];
        $nouvelle_image = $_POST['new_profile_image'] ?? null;
        echo "Nom :  ". $_POST['nom'] . " Email :  " . $_POST['mail'];

        $sql = $conn->prepare("UPDATE profils SET nom = '$nom' WHERE id = $id ");
        $sql->execute();
        $sql->close();
        if ($nouvelle_image !== null){
            $sql2 = $conn->prepare("UPDATE profils SET img = '$nouvelle_image' WHERE id = $id ");
            $sql2->execute();

        }
        header("Location: formProfil.php?profil=$id");

    }


}

?>