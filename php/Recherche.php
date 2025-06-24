<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Recherche</title>
</head>


<body>

<?php require "nav_accueil.php";  ?><br>



    <?php require "nav.php"; ?>

    <form method="POST" action="RechercheTraitement.php" placeholder="Rechercher un film, une série..." >

            <p>Rechercher</p>
            <label for="film">Recherche </label>
                <img class="input6" src="../Public/img/btn-search.png" width="30" height="20" alt="search">
                <input class="btn-secondary" type="text" id="film" name="film" required>


    </form>


            <p>Trier par</p>
            <label for="film">Trier par </label>
            <select class="input1 btn-secondary" name="Trier par">
                <option value="Trier par">Trier par</option>
                <option value="Top 10">Adultes</option>
                <option value="Film">Adolescents</option>
                <option value="Série">Jeunesse</option>
            </select>




    <?php require "footer.php";  ?>
</body>
</html>