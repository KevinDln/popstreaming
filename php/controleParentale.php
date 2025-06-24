<?php

session_start();
require "connectdb.php";
if (!isset($_SESSION['connected']) || $_SESSION['connected'] != true) {
    header("Location: pre_accueil.php");
    exit();
}

// Page classique pour formulaire avec mot de passe
// Va rediriger vers une page de traitement, qui va utiliser la fonction définie 
// 

?>

<body>

<form action="traitementParentale.php" method="post">
    <label for="password">Entrez le mot de passe de votre compte pour gérer 
        les parametres de controle parentale</label> <br> <br>
    <input type="password" id="password" name="password" required>
    <br> <br>
    <button type="submit">Valider</button>
    <button type="button" onclick="history.back()">Annuler</button>
</body>

</html>

