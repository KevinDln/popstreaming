<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Pop Streaming</title>
    <link rel="icon" href="../Public/img/icon-pop-streaming.png" type="image/png">
    <link rel="stylesheet" href="../Public/css/nav.css">
    <link rel="stylesheet" href="../Public/css/styles.css">
    <link rel="stylesheet" href="../Public/css/variables.css">
    <link rel="stylesheet" href="../Public/css/font.css">
    <link rel="stylesheet" href="../Public/css/strat_video.css">
    <link rel="stylesheet" href="../Public/css/footer.css">
    <link rel="stylesheet" href="../Public/css/modal-info.css">
</head>
<body>
<div class="container">
    <div class="image-container">
        <img src="http://localhost/popstreaming/public/img/images/video-destination-final.jpg" alt="Background Image">
    </div>
    <div class="content">
        <div class="size-container">
            <h1>MARIUS</h1>
            <p>
                Auto-proclamé "Roi de Marseille", Marius est un guide touristique haut en couleur qui trimballe ses
                clients dans son bus panoramique. Le jour où son véhicule tombe en panne mettant en péril son petit
                business, il fait la rencontre de trois gamins du quartier qui prétendent être sur la piste d'un trésor.
                Marius se retrouve alors engagé dans une dangereuse aventure...
            </p>
            <div class="flex">
                <button class="btn">Commencer</button>
                <a class="info-icon">
                    <span><img src="../Public/img/info.png" alt=""></span>
                    <span class="info-text">Plus d'infos</span>
                </a>
            </div>
        </div>
    </div>
</div>
<?php
include "modal_info.php"
?>
<script src="../Public/js/start_video.js"></script>
<script src="../Public/js/modal_info.js"></script>
</body>
</html>
