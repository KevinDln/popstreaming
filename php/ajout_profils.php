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
    <link rel="stylesheet" href="../Public/css/ajout_profils.css">
</head>

<body>
<nav>
    <img src="../img/logo_POP_STREAMING.png" height="78" width="180" alt="logo">
</nav>
<br>

<a href="accueil.php"><input class="chevron" type="image" src="../img/chevron-gauche.png" alt="bouton retour accueil"/></a>
<div class="center container-profils">
    <div class="profils ajouter flex">
        <div class="profil cercle">
            <span class="plus">+</span>
            <p class="p1">Nom</p>
        </div>
    </div>
    <div>
        <input class="input1" type="text" name="pseudo" value="Pseudo"/><br><br>
        <select class="input1" name="Type de profils">
            <option value="Type de profil">Type de profil</option>
            <option value="Adultes">Adultes</option>
            <option value="Adolescents">Adolescents</option>
            <option value="Jeunesse">Jeunesse</option>
        </select>
    </div>
    <br><br>

    <div class="flex gap">
        <a class="btn-primary" href="accueil.php">Valider</a>
        <a class="btn-secondary"  href="profils.php">Annuler</a>
    </div>
</div>
</body>
</html>
