<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../Public/css/nav.css">
    <link rel="stylesheet" href="../Public/css/styles.css">
    <link rel="stylesheet" href="../Public/css/variables.css">
    <link rel="stylesheet" href="../Public/css/font.css">
    <link rel="stylesheet" href="../Public/css/modif_profils.css">
</head>
<body>
<nav>
    <img src="../img/logo_POP_STREAMING.png" height="78" width="180" alt="logo">
</nav>
<br>

<a href="accueil.php"><input class="chevron" type="image" src="../img/chevron-gauche.png" alt=""/></a>

<div class="profils ajouter">
    <div class="bloc-gauche">
        <div class="flex center container-modifs">
            <div>
                <div class="profil cercle">
                    <span class="plus">+</span>
                </div>
                <p class="p1">Nom<p>
            </div>
            <div class="bloc-droite flex">
                <input class="input1" type="text" name="pseudo" value="Nom" alt="Nom"/>
                <input class="input1" type="text" name="prenom" value="Prénom" alt="Prénom"/>
                <input class="input1" type="text" name="e-mail" value="E-mail" alt="e-mail"/>
                <input class="input1" type="text" name="mot de passe" value="Mot de passe" alt="mdp"/>
                <input class="input1" type="text" name="gérer" value="Gérer les profils des utilisateurs" alt="gérer les profils utilisateurs"/>
                <div class="center flex gap">
                    <a class="btn-primary"  href="profils.php">Sauvegarder les modifications</a>
                    <a class="input3" href="profils.php">Annuler</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>