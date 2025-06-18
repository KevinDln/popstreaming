<?php
require "connectdb.php";
date_default_timezone_set('Europe/Paris');
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
$date = $_POST['date_naissance'];
$date_de_creation = date('Y/m/d');

$stmt = $conn->prepare("SELECT id FROM utilisateur WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$res = $stmt->get_result();
$num = $res->num_rows;
    if ($num > 0 ) {
        echo "Un compte avec cet E-mail existe deja.
        <a href = 'connexion.php' >Connextez-vous</a>.";

    } else {
        $stmt2 = $conn->prepare("INSERT INTO utilisateur (nom, prenom, email, mdp, date_naissance, date_creation) VALUES (?, ?, ?, ?, ?,?)");
        if ($stmt2) {
            $stmt2->bind_param("ssssss", $nom, $prenom, $email, $mdp, $date, $date_de_creation);
            $stmt2->execute();
            header("Location: pre_accueil.php");
        }
    }
?>

