<?php

session_start();
require "connectdb.php";
if (!isset($_SESSION['connected']) || $_SESSION['connected'] != true) {
    header("Location: pre_accueil.php");
    exit();
}

if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];
    
    // Ajout aux favoris
    if (isset($_SESSION['profil'])) { // id du profil de l'utilisateur connecté
        $userId = $_SESSION['profil'];
        
        // Préparation a supprimer les favoris
        if ($type == "films" || $type == "film") {
                $sql = "DELETE FROM favoris_films WHERE id_profil = ? AND id_film = ? ";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ii",$userId,$id); 
                $stmt->execute();
                $url2 = "strat_video.php?id=".$id."&type=film";
                header("Location: $url2");

        }

        elseif ($type == "shows" || $type == "show") {
        $sql = "DELETE FROM favoris_series WHERE id_profil = ? AND id_serie = ? ";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ii",$userId,$id); 
                $stmt->execute();
                $url2 = "strat_video.php?id=".$id."&type=shows";
                header("Location: $url2");
        }
                   
    }
}

?>