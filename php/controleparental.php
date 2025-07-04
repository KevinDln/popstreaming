<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle Parental</title>
</head>
<body>
<?php
include 'header.php';
include 'nav.php';
include 'footer.php';
?>
<h1> Contrôle Parental</h1>
<p>Entrez le mot de passe de votre compte pour gérer les paramètres de contrôle parental.</p>
    <form method="post" action="fonctioncontroleparental.php">
        <label for="mdp">Mot de passe:</label> <input type="password" id="mdp" name="mdp" required>
        <br>
        <input type="submit" id="submit" name="submit" value="Valider">
        <input type="submit" formaction="parametres.php" id="cancel" name=cancel" value="Annuler">
    </form>

</body>
</html>