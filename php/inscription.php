<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>


<body>
<a href="pre_accueil.php"> retour pre accueil </a>
    <form method="POST" action="InscriptionTraitement.php" placeholder="Rechercher un film, une série..." >

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

</body>
</html>