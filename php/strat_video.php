<?php
session_start();
require "connectdb.php";

if (isset($_GET['id']) && isset($_GET['type'])) {
    $userId = $_SESSION['profil']; // id du profil de l'utilisateur connecté
    $id = $_GET['id'];
    $type = $_GET['type'];
    $inFav = false;
    // Récupération des infos film ou série + id

    if ($type == "films" || $type == "film") {
        $sql = $conn->prepare("SELECT * from films WHERE id_movie = ?");
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
        $info = "infoVideo.php?id=".$id."&type=".$type;
        $img = $result[0]['backdrop_path'];


        // Vérifier si le film est dans les favoris

        $checkSql = "SELECT * FROM favoris_films WHERE id_profil = ? AND id_film = ?";
            if ($stmtCheck = $conn->prepare($checkSql)) {
                $stmtCheck->bind_param("ii", $userId, $id);
                $stmtCheck->execute();
                if ($stmtCheck->get_result()->num_rows > 0) {
                    $inFav = true; // Le film est déjà dans les favoris
                } else {
                    $inFav = false; // Le film n'est pas dans les favoris
                }
            }



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
        $info = "infoVideo.php?id=".$id."&type=".$type;
        $img = $result[0]['backdrop_path'];

        $checkSql = "SELECT * FROM favoris_series WHERE id_profil = ? AND id_serie = ?";
            if ($stmtCheck = $conn->prepare($checkSql)) {
                $stmtCheck->bind_param("ii", $userId, $id);
                $stmtCheck->execute();
                if ($stmtCheck->get_result()->num_rows > 0) {
                    echo "Déjà dans les favoris.";
                }
            }

    }

};

if ($type == "shows" || $type == "show" ) $type = "Série";
else $type = "Film";
$fav = "addfavoris.php?id=".$id."&type=".strtolower($type); 
$delFav = "deletefavoris.php?id=".$id."&type=".strtolower($type);


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

    <style> 
        .modal{ /* Redéfinir les valeurs pour permettre a l'image d'etre le fond */
            background: none;
        }
        .modal-content {
            background: none;
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
            width: 40px; 
            height: auto;
            display: block;
        }

        .test {
            background-color:rgba(4, 15, 19, 0.1); 
            padding-left: 20px;
        }

        .boutons-flex{
            display: flex;
            gap: 15px; 
            margin-top: 20px;
        }

        #more-infos{
            background-color:rgba(48, 80, 100, 0.71);
        }
        
        

.already-favoris {
    background: none;
    border: none;
    padding: 0; /* Enlever le padding pour un meilleur contrôle */
    cursor: pointer;
    font-size: 45px; /* Taille du cœur uniquement */
    color: #FFD700;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    line-height: 1; /* Contrôler la hauteur de ligne */
    width: auto;
    height: auto;
    padding-top: 10px;
}

.already-favoris:hover {
    color:rgb(255, 255, 255);
}


#add-favoris {
    background: none;
    border: none;
    padding: 0; /* Enlever le padding pour un meilleur contrôle */
    cursor: pointer;
    font-size: 45px; /* Taille du cœur uniquement */
    color:rgb(255, 255, 255);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    line-height: 1; /* Contrôler la hauteur de ligne */
    width: auto;
    height: auto;
    padding-top: 10px;
}

#add-favoris:hover {
    color: #FFD700;
}
    </style>

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

<div id="infoModal" class="modal" style="background: url('<?php echo $img; ?>') 
no-repeat center center fixed; background-size: cover;">
<a href="accueil.php" id="backButton" onclick="history.back()">
    <img src="../Public/img/btn-retour.png" alt="retour"></a>

    <div class="modal-content" >
        <div class="test">
        <h2><?php echo $result[0]['title'] ?> </h2>

        
        <p> <?php echo $result[0]['overview'];?> </p>
        
        <div class="modal-tags">
            <span class="tag"> <?php echo $type ?> </span>
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
        </div>
    <div class="boutons-flex">
        <a href="<?php echo $lien ?>" class="modal-btn" >Commencer </a>
        <a href="<?php echo $info ?>" class="modal-btn" id="more-infos" >Plus d'infos </a>
        <?php if ($inFav): ?>
            <a href="<?php echo $delFav ?>" class="already-favoris" id="already-favoris">♥</a>
        <?php else: ?>
        <a href="<?php echo $fav ?>" id="add-favoris" >♥</a>
        <?php endif; ?>
    </div>
    </div>
</div>

</body>
</html>
