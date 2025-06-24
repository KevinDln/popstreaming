<?php
session_start();
if (!isset($_SESSION['connected']) || $_SESSION['connected'] != true) {
    header("Location: pre_accueil.php");
    exit();
}

if (isset($_GET['url'])) {
    $url = $_GET['url'];
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <title> Popstreaming </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/variables.css">
    <link rel="stylesheet" href="../Public/css/showVideo.css">
    <script src="../JS/showVideo.js"> </script>
    
</head>


<body>
<button id="backButton" onclick="history.back()"><img src="../Public/img/btn-retour.png" alt="retour"></button>

<iframe width="100%" height="100%"
src="<?php echo htmlspecialchars($url)?>"
frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
allowfullscreen></iframe>


</body>

</html>

