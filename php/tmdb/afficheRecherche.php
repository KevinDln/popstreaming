<?php
// Page pour afficher les résultats de la recherche

// On utilise la fonction de recherche et on renvoie sur la page les contenus retrouvés

$end = false;
?>


<!DOCTYPE html>
<html>
<head>
    <title> Films </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

</head>

<?php require "header.php";  ?>
<body>

<?php require "nav.php"; // On inclut la barre de navigation ?>

<div class="contenu" id="contenu" name="contenu">
    <?php
    
    ?>
    <?php if (isset($_GET['page']) && $_GET['page'] > 0): ?>
        <a href="<?php echo $urlPrecedent?>"> Page précedente </a>
    <?php endif; ?>
    <?php if (!$end): ?>
        <a href="<?php echo $urlSuivant?>"> Page suivante </a>
    <?php endif; ?>
</div>

</body>

</html>
