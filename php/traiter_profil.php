<?php
require "connectdb.php";
session_start();


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: createProfil.php');
    exit;
}

// Récupération et nettoyage des données
if(isset($_POST['pseudo'])) $pseudo = trim($_POST['pseudo']);
if (isset($_POST['type_profil'])) $type_profil =  $_POST['type_profil'] ;
if (isset($_POST['image_url'])) $image_url = $_POST['image_url'];


$erreurs = [];

if (empty($pseudo)) {
    $erreurs[] = "Le pseudo est obligatoire";
}

// Si il y a des erreurs, retourner au formulaire
if (!empty($erreurs)) {
    $_SESSION['erreurs'] = $erreurs;
    $_SESSION['form_data'] = $_POST;
    header('Location: createProfil.php');
    exit;
}

// Faire ajout dans la base de données avec les urls
echo $pseudo . "<br>";
echo $type_profil . "<br>";
echo $image_url . "<br>";
   

?>
