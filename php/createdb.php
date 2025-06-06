<?php


// Information de connexion à la base de données
$serveur="localhost";
$user="root";
$password="";
$database="popstreaming"; // Nom de la base de données

$conn =new mysqli($serveur,$user,$password,$database);

// Vérification de la connexion et affiche l'erreur de connexion si nécessaire
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $database";

if ($conn->query($sql) === TRUE) {
    echo "Database créé <br>";
}


require "createtables.php";

?>