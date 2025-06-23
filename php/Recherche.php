<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../Public/css/nav_accueil.css">
    <link rel="stylesheet" href="../Public/css/nav.css">
    <link rel="stylesheet" href="../Public/css/styles.css">
    <link rel="stylesheet" href="../Public/css/variables.css">
    <link rel="stylesheet" href="../Public/css/font.css">
    <link rel="stylesheet" href="../Public/css/mentionslegales.css">
    <link rel="stylesheet" href="../Public/css/deconnexion.css">
    <link rel="stylesheet" href="../Public/css/footer.css">
    <title>Recherche</title>
</head>


<body>

<?php require "nav_accueil.php";  ?><br>
<a href="../php/pre_accueil.php">
    <input class="chevron" type="image" src="../Public/img/btn-retour.png" alt="<"/></a> <br>

<div class="flex">
    <?php require "nav.php"; ?>

               <form method="POST" action="RechercheTraitement.php" placeholder="Rechercher un film, une série..." >
                <div class="flex">  <p>Rechercher</p>
                <label for="film">Recherche </label>
                    <div class="div2">
                        <input class="btn-secondary" type="text" id="film" name="film" required>
                        <img class="input6" src="../Public/img/btn-search.png" width="30" height="20" alt="search">
                    </div>
                </div>
            </form>

        <div class="flex">
            <p>Trier par</p>
            <label for="film">Trier par </label>
            <select class="input1 btn-secondary" name="Trier par">
                <option value="Trier par">Trier par</option>
                <option value="Top 10">Adultes</option>
                <option value="Film">Adolescents</option>
                <option value="Série">Jeunesse</option>
            </select>
        </div>

</div>
    <script src="../JS/langues.js"></script>
    <script src="../JS/profil.js"></script>
    <script src="../JS/rechercher.js"></script>

    <?php require "footer.php";  ?>
</body>
</html>