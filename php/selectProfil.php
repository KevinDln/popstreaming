<?php

session_start();
$id_profil = $_GET['profil'];
$_SESSION['profil'] = $id_profil;
header("location: accueil.php");

?>