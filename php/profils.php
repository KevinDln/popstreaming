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
    <link rel="stylesheet" href="../Public/css/profils.css">
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
    <div class="center">
        <h1>Qui est-ce ?</h1>
        <br>
        <div class="container-profil flex">
            <div class="profils">
                <div class="profil">
                    <a href="ajout_profils.php"><img src="../Public/img/defaut_profil.jpeg" alt="NOM"></a><br>
                    <p class="p1">Speudo</p>
                </div>
                <div class="profil ajouter">
                    <div class="cercle cercle-hover">
                        <a href="ajout_profils.php">
                            <span class="plus">+</span></a><br>
                    </div>
                </div>
                <div class="profil ajouter">
                    <div class="cercle-hover cercle">
                        <a href="ajout_profils.php">
                            <span class="plus">+</span></a><br>
                    </div>
                </div>
                <div class="profil ajouter">
                    <div class="cercle-hover cercle">
                        <a href="ajout_profils.php">
                            <span class="plus">+</span></a><br>
                    </div>
                </div>
                <div class="profil ajouter">
                    <div class="cercle-hover  cercle">
                        <a href="ajout_profils.php">
                            <span class="plus">+</span></a><br>
                    </div>
                </div>
            </div>
        </div>
        <br> <br>
        <a class="btn-secondary" href="../php/modif_profils.php">Gérer les profils ?</a>
</div>

</body>
</html>
