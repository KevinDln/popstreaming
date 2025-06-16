<?php
require "connectdb.php";
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$mdp = password_hash($_POST['mdp']);
$date = $_POST['date_naissance'];
$stmt = $conn->prepare("INSERT INTO clients (nom, prenom, email, mdp, date_naissance) VALUES (?, ?, ?, ?, ?)");
    if ($stmt){
        $stmt->bind_param("sssss", $nom, $prenom, $dataemail, $mdp, $date);
        $stmt->execute();
    } else {

    }
?>