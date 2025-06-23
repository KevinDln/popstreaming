<?php
require 'connectdb.php';
function ControleParental($id, $mdp, $conn) {
    if (empty($id) || !is_numeric($id) || $id <= 0 || empty($mdp)) {
        return false;
    }
    try {
        $stmt = $conn->prepare("SELECT mdp FROM utilisateur WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            if (password_verify($mdp, $row ['mdp'])){
                header('Location: controleparental.php');
                exit;
            }
        } else {
            return false;
        }

    } catch (Exception $e) {
        error_log("erreur de contrôle parental : " . $e->getMessage());
        return false;
    }
}

?>