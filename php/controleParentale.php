<?php

session_start();
require "connectdb.php";

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

