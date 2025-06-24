<?php

session_start();
require "connectdb.php";
require "fonctions.php";
if (!isset($_SESSION['connected']) || $_SESSION['connected'] != true) {
    header("Location: pre_accueil.php");
    exit();
}

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = $_POST['password'];
        $id = $_SESSION['id'];
        $profile = $_SESSION['profil'];
        controleparental($id,$password,$profile,$conn);
    }
}
        

?>