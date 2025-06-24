<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="../Public/img/icon-pop-streaming.png" type="image/png">
    <link rel="stylesheet" href="../Public/css/nav.css">
    <link rel="stylesheet" href="../Public/css/styles.css">
    <link rel="stylesheet" href="../Public/css/variables.css">
    <link rel="stylesheet" href="../Public/css/font.css">
    <link rel="stylesheet" href="../Public/css/ajout_profils.css">
    <link rel="stylesheet" href="../Public/css/nav_accueil.css">
</head>

<body>
<header>
    <?php require "nav_vide.php"; ?>
</header>
<br>
<a href="#" class="btn-retour">
    <img src="../Public/img/btn-retour.png" alt="">
</a>
<div class="center container-profils">
    <div class="profils ajouter">
        <div class="profil cercle">
            <span class="plus">+</span>
        </div>
        <span class="add-photo">Ajouter une photo</span>
    </div>
    <div>
        <input class="input1" type="text" name="pseudo" placeholder="Pseudo..."/><br><br>
        <div class="custom-select-container">
            <select class="input1" name="Type de profils">
                <option value="Type de profil">Type de profil</option>
                <option value="Adultes">Adultes</option>
                <option value="Adolescents">Adolescents</option>
                <option value="Jeunesse">Jeunesse</option>
            </select>
            <div class="custom-select-icon">
                <img src="../Public/img/btn-select-option.png" alt="Icon drop">
            </div>
        </div>
    </div>
    <br><br>

    <div class="flex gap">
        <a class="btn-primary" href="..php/accueil.php">Valider</a>
        <a class="btn-secondary"  href="..php/profils.php">Annuler</a>
    </div>
</div>
</body>
</html>
