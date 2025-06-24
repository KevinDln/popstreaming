<?php
session_start();
require "connectdb.php";
if (!isset($_SESSION['connected']) || $_SESSION['connected'] != true) {
    header("Location: pre_accueil.php");
    exit();
}

if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];
    // Récupération des infos film ou série + id

    if ($type == "films" || $type == "film") {
        $sql = $conn->prepare("SELECT * from films WHERE id_movie = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $res = $sql->get_result();
        while($row = $res->fetch_assoc()) {
            $result[] = $row;
        }
        $res->free_result();
        $sql->close();

        // Récupération des acteurs
        $sql2 = $conn->prepare("SELECT * from acteurs WHERE casting_film = ?");
        $sql2->bind_param("i", $id);
        $sql2->execute();
        $res2 = $sql2->get_result();
        $result2 = [];

        while($row = $res2->fetch_assoc()) {
            $result2[] = $row;
        } ;
        $sql2->close();
        $lien = "showVideo.php?url=".$result[0]['trailer'];



    } elseif ( $type == "shows" || $type == "show") {
        $sql = $conn->prepare("SELECT * from series WHERE id_shows = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $res = $sql->get_result();
        $result=[];
        while($row = $res->fetch_assoc()) {
            $result[] = $row;
        }
        $res->free_result();
        $sql->close();


        // Récupération des acteurs

        $sql2 = $conn->prepare("SELECT * from acteurs WHERE casting_serie = ?");
        $sql2->bind_param("i", $id);
        $sql2->execute();
        $res2 = $sql2->get_result();
        $result2 = [];

        while($row = $res2->fetch_assoc()) {
            $result2[] = $row;
        } ;
        $sql2->close();
        $lien = "showVideo.php?url=".$result[0]['trailer'];


    }

};

if ($type == "shows") $type = "Série";


?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Pop Streaming</title>
    <link rel="stylesheet" href="../public/css/nav.css">
    <link rel="stylesheet" href="../public/css/styles.css">
    <link rel="stylesheet" href="../public/css/variables.css">
    <link rel="stylesheet" href="../public/css/font.css">
    <link rel="stylesheet" href="../public/css/strat_video.css">
    <link rel="stylesheet" href="../public/css/footer.css">
    <link rel="stylesheet" href="../public/css/modal-info.css">
</head>
<body>
<div class="container">
    <div class="image-container">
    </div>
    <div class="content">
        <div class="size-container">
            <h1><?php echo $result[0]['title'] ?> </h1>
            <p>
                <?php echo $result[0]['overview'] ?>
            </p>
            <div class="flex">
                <button class="btn">Commencer</button>
                <a class="info-icon">
                    <span>i</span>
                    <span class="info-text">Plus d'infos</span>
                </a>
            </div>
        </div>
    </div>
</div>

<div id="infoModal" class="modal">
    
    <div class="modal-content">
        <button class="close" onclick="history.back()">&times;</button>
        <h2><?php echo $result[0]['title'] ?>
        </h2>
        <p> <?php echo $result[0]['overview'];
            ?> </p>
        <div class="modal-tags">
            <span class="tag"> <?php echo "Série"?> </span>
            <span class="tag"><?php echo $result[0]['release_year']?>
            </span>
            <?php
            $init = 0;
            while (isset($result[$init])) {
                $genre = $result[$init]['genre'];
                echo "<span class=\"tag\"> $genre </span> ";
                $init++;
            }

            ?>

        </div>
        <div class="modal-people flex">
            <div class="person flex">
                <?php if (isset($result2[0])) : ?>
                <img src="<?php echo $result2[0]['img']?>" alt="Person 1">
                <div class="wrap">
                    <p><?php echo $result2[0]['nom']?></p>
                </div>
                <?php endif; ?>

            </div>


            <div class="person flex">
                <?php if (isset($result2[1])) : ?>
                <img src="<?php echo $result2[1]['img']?>" alt="Person 2">
                <div class="wrap">
                    <p><?php echo $result2[1]['nom']?></p>
                </div>
                <?php endif; ?>

            </div>


            <div class="person flex">
                <?php if (isset($result2[2])) : ?>
                <img src="<?php if (isset($result2[2])) echo $result2[2]['img']?>" alt="Person 3">

                <div class="wrap">
                    <p><?php echo $result2[2]['nom']?> </p>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <a href="<?php echo $lien ?>" class="modal-btn" >Commencer </a>
    </div>
</div>

</body>
</html>
