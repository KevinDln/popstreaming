<?php
require "connectdb.php";
date_default_timezone_set('Europe/Paris');
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) &&
 isset($_POST['mdp']) && isset($_POST['date_naissance'])) { // Si tout a été remplis
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $dateoriginal = $_POST['date_naissance']; // Date au format timestamp
    $date = date('Y/m/d',strtotime($dateoriginal) ) ;
    $date_de_creation = date('Y/m/d');

    // On vérifie que l'utilisateur n'existe pas déjà
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
    }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>


<body>
<header>
    <form method="POST" action="inscription.php" placeholder="Rechercher un film, une série..." >

        <label for="nom">Nom:</label> <input type="text" id="nom" name="nom" required>
        <br>
        <label for="prenom">Prénom:</label> <input type="text" id="prenom" name="prenom" required>
        <br>
        <label for="email">E-mail:</label> <input type="text" id="email" name="email" required>
        <br>
        <label for="mdp">Mot de passe:</label> <input type="password" id="mdp" name="mdp" required>
        <br>
        <label for="mdp">Confirmer Mot de passe:</label> <input type="password" id="mdp" name="mdp" required>
        <br>
        <label for="date_naissance">Date de naissance:</label> <input type="date" id="date_naissance" name="date_naissance" required>
        <br>
        <br>
        <input type="submit" value="Valider">
    </form>
</header>
</body>
</html>