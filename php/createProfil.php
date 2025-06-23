<?php



?>

<!DOCTYPE html>

<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PopStreaming</title>

        <link rel="stylesheet" href="../Public/css/nav.css">
        <link rel="stylesheet" href="../Public/css/styles.css">
        <link rel="stylesheet" href="../Public/css/variables.css">
        <link rel="stylesheet" href="../Public/css/font.css">
        <link rel="stylesheet" href="../Public/css/profils.css">

    </head>


    <body>
    <div class="create-profil">



        <form >


            <select id="img-profils" required>
                <option style="background-image: url(../Public/img/defaut_profil.jpeg)" value=""> </option>
                <option value="jeunesse">Jeunesse </option>
                <option value="ado"> Adolescent </option>
                <option value="adulte"> Adulte</option>

            </select> <br>
            <p> Ajouter une photo</p> <br> <br>

            <input type="text" placeholder="Pseudo" required> <br>
            <select id="type-profils" required>
                <option value="">Type de profils </option>
                <option value="jeunesse">Jeunesse </option>
                <option value="ado"> Adolescent </option>
                <option value="adulte"> Adulte</option>

            </select> <br> <br>

            <input type="submit" value="Valider">
            <input type="submit" value="Annuler">
        </form>
    </div>

    </body>

</html>