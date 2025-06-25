<?php

session_start();
if (!isset($_SESSION['connected']) || $_SESSION['connected'] != true) {
    header("Location: pre_accueil.php");
    exit();
}

require "connectdb.php";
if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];
    
    // Ajout aux favoris
    if (isset($_SESSION['profil'])) { // id du profil de l'utilisateur connecté
        $userId = $_SESSION['profil'];
        
        // Vérifier si l'élément est déjà dans les favoris
        if ($type == "films" || $type == "film") {
            $checkSql = "SELECT * FROM favoris_films WHERE id_profil = ? AND id_film = ?";
            if ($stmtCheck = $conn->prepare($checkSql)) {
                $stmtCheck->bind_param("ii", $userId, $id);
                $stmtCheck->execute();
                if ($stmtCheck->get_result()->num_rows > 0) {
                    echo "Déjà dans les favoris.";
                } else {
                    // Ajouter aux favoris
                    if ($stmtAdd = $conn->prepare("INSERT INTO favoris_films (id_profil, id_film) VALUES (?, ?)")) {
                        $stmtAdd->bind_param("ii", $userId, $id);
                        if ($stmtAdd->execute()) {
                            $url2 = "strat_video.php?id=".$id."&type=film";
                            echo "Ajouté aux favoris.";
                            header("Location: $url2");
                        } else {
                            echo "Erreur lors de l'ajout aux favoris.";
                        }
                        $stmtAdd->close();
                    }
                }
                $stmtCheck->close();
            }
        } 
        elseif ($type == "shows" || $type == "show") {
            $checkSql = "SELECT * FROM favoris_series WHERE id_profil = ? AND id_serie = ?";
            if ($stmtCheck = $conn->prepare($checkSql)) {
                $stmtCheck->bind_param("ii", $userId, $id);
                $stmtCheck->execute();
                if ($stmtCheck->get_result()->num_rows > 0) {
                    echo "Déjà dans les favoris.";
                } else {
                    // Ajouter aux favoris
                    if ($stmtAdd = $conn->prepare("INSERT INTO favoris_films (id_profil, id_serie) VALUES (?, ?)")) {
                        $stmtAdd->bind_param("ii", $userId, $id);
                        if ($stmtAdd->execute()) {
                            echo "Ajouté aux favoris.";
                            $url2 = "strat_video.php?id=".$id."&type=shows";
                            header("Location: $url2");
                        } else {
                            echo "Erreur lors de l'ajout aux favoris.";
                        }
                        $stmtAdd->close();
                    }
                }
                $stmtCheck->close();
            }
        }
    }
}

?>