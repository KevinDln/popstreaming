<?php
require "connectdb.php"; // Connexion a la BD
session_start();

$incorrect = false;
// Partie vérification des informations passés dans le formulaire
$message = "Email ou mot de passe incorrect, veuillez réessayer";

if (isset($_POST['email']) && isset($_POST['mdp'] ) ) {
    // MDP et EMAIL reçu
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    // Recherche dans la base de données si l'email est bien dedans
    $sql= $conn->prepare("SELECT id,email,mdp FROM utilisateur WHERE email = ?"); // Récupère l'email et le mdp
    $sql->bind_param("s", $email);
    $sql->execute();
    $res = $sql->get_result();
    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();

        // Mail est dans la base de données donc on peut passer a la vérification du mot de passe
        if (password_verify($mdp,$row['mdp']) ) {
            // Si le mdp est bon, on peut rediriger a l'accueil
            echo "Connexion réussie";
            $_SESSION['connected'] = true;
            $_SESSION['id'] = $row['id'];
            header("Location: accueil.php");
        }
        else {

            echo "Mot de passe incorrect";
            $incorrect = true;
        }
    }
}



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script src="../JS/mdp.js"> </script>
    <title> Connexion </title>
    <link rel="icon" href="../Public/img/icon-pop-streaming.png" type="image/png">
    <link rel="stylesheet" href="../Public/css/styles.css">
    <link rel="stylesheet" href="../Public/css/variables.css">
    <link rel="stylesheet" href="../Public/css/font.css">
    <link rel="stylesheet" href="../Public/css/nav_connexion_inscription.css">
    <link rel="stylesheet" href="../Public/css/connexion.css">
    <link rel="stylesheet" href="../Public/css/footer.css">
</head>
    <body>
    <header>
        <?php
        require "nav_connexion_inscription.php";
        ?>
    </header>
    <main>
        <div class="container flex center">
            <div class="connexion" id="connexion">
                <?php if ($incorrect) : echo $message?>  <!-- Si on a remplis le formulaire avec informations incorrect -->
                <?php else :?> <h1> Identifiez-vous <h1> <!-- Si on a pas remplis le formulaire dans un premier temps -->
                        <?php endif;?>
                        <form method="POST" action="connexion.php">
                            <input class="input-fond-clair" type="email" id="email" name="email" placeholder="Email ou numéro de mobile" required> <br> <br>
                            <input class="input-fond-clair" type="password" id="mdp" name="mdp" placeholder="mot de passe" required>
                            <input class="input-fond-clair" type="checkbox" onclick="showPassword()"> <br> <br>
                            <input class="btn-primary" type="submit" name="identifier" value="M'identifier">
                            <p> OU </p>
                            <input class="btn-primary" type="submit" formaction="codeidentification.php" name="code" value="Utiliser un code d'identification" > <br>

                            <a href="mdpoublie.php"> Mot de passe oublié ? </a> <br>
                            <div class="flex">
                                <input type="checkbox" id="souvenir" name="souvenir">
                                <span>Se souvenir de moi </span>
                            </div>

                            <p> Première visite sur Pop Streaming ? </p>
                            <input class="btn-primary" type="submit" formaction="inscription.php" value="Créer votre compte">
                        </form>
            </div>
        </div>
    </main>

    <script src="../Public/js/menu_burger.js"></script>
    <script src="../JS/header.js"></script>
    <script src="../JS/parametres.js"></script>
    <script src="../JS/langues.js"></script>
    </body>
</html>


