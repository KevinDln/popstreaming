<?php 

session_start();
$_SESSION['connected'] = false;
header("Location: pre_accueil.php");
exit();

?>