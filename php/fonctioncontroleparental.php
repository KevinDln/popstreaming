<?php
function controleparental($id, $mdp, $profilid, $conn) {
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
                $stmt2 = $conn -> prepare("SELECT controle_parental FROM profils WHERE id = ?");
                $stmt2 -> bind_param("i", $profilid);
                $stmt2->execute();
                $result2 = $stmt2->get_result();
                $profil = $result2->fetch_assoc();
                    if ($profil['controle_parental'] == 1) {
                        $stmt2 = $conn -> prepare("UPDATE profils SET controle_parental = 0 WHERE id = ?");
                        $stmt2 -> bind_param("i", $profilid);
                        $stmt2->execute();
                        header("Location: profils.php");
                    } elseif ($profil['controle_parental'] == 0) {
                        $stmt2 = $conn -> prepare("UPDATE profils SET controle_parental = 1 WHERE id = ?");
                        $stmt2 -> bind_param("i", $profilid);
                        $stmt2->execute();
                        header('Location: controleparental.php');
                        exit;
                    } else {
                        echo "erreur le profil n'existe pas ou ne correspond pas";
                    }
            } else {
                echo "mdp incorrecte";
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

