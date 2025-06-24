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

    <style>
  html, body {
    margin: 0;
    padding: 0;
    height: 100%;
  }
  iframe {
    width: 100%;
    height: 100%;
    border: none;
  }


#backButton {
    position: fixed;
    top: 15px;
    left: 15px;
    background: transparent;
    background-color: #EFBD3F;
    padding: 0;
    border-radius: 10px;
    border: none;
    cursor: pointer;
    z-index: 1000;
    top: 8%; /* a modifier si on veut plus bas ou plus haut */
}

#backButton img {
    width: 40px; /* adapte si tu veux plus petit ou plus grand */
    height: auto;
    display: block;
}

/* Pour cacher le bouton si on est en plein écran  */
:fullscreen #backButton,
:-webkit-full-screen #backButton,
:-moz-full-screen #backButton,
:-ms-fullscreen #backButton {
    display: none;
}


</style>


</head>


<body>
<button id="backButton" onclick="history.back()"><img src="../Public/img/btn-retour.png" alt="retour"></button>

<iframe width="100%" height="100%"
src="<?php echo htmlspecialchars($url)?>"
frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
allowfullscreen></iframe>

<script>
        function onFullscreenChange() {
            const btn = document.getElementById('backButton');
            if (
                document.fullscreenElement ||
                document.webkitFullscreenElement ||
                document.mozFullScreenElement ||
                document.msFullscreenElement
            ) {
                btn.style.display = 'none';
            } else {
                btn.style.display = 'block';
            }
        }

        document.addEventListener('fullscreenchange', onFullscreenChange);
        document.addEventListener('webkitfullscreenchange', onFullscreenChange);
        document.addEventListener('mozfullscreenchange', onFullscreenChange);
        document.addEventListener('MSFullscreenChange', onFullscreenChange);
    </script>




</body>

</html>

