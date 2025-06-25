<?php

require "connectdb.php";
require "fonctions.php";
require "fonctionParentales.php";

$tendances = getTendancesParent($conn); // Récupération des tendances
$img = $tendances[0]['poster_path'];
$img1 = $tendances[1]['poster_path'];
$img2 = $tendances[2]['poster_path'];
$img3 = $tendances[3]['poster_path'];
$img4 = $tendances[4]['poster_path'];
$img5 = $tendances[5]['poster_path'];
$img6 = $tendances[6]['poster_path'];
$img7 = $tendances[7]['poster_path'];
$img8 = $tendances[8]['poster_path'];
$img9 = $tendances[9]['poster_path'];

$affiche = getAffiche($conn);

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="icon" href="../Public/img/icon-pop-streaming.png" type="image/png">
    <title>Pop Streaming</title>
    <link rel="stylesheet" href="../Public/css/menu_burger.css">
    <link rel="stylesheet" href="../Public/css/styles.css">
    <link rel="stylesheet" href="../Public/css/variables.css">
    <link rel="stylesheet" href="../Public/css/font.css">
    <link rel="stylesheet" href="../Public/css/pre_accueil.css">
    <link rel="stylesheet" href="../Public/css/footer.css">
</head>
<body>
<?php
include "nav_pre_accueil.php";
?>
<header>

    <div class="center flex container-header">
        <div class="affiche" id="affiche" name="affiche">
            <!--- Div de stockage de l'affiche --->

                <img class="img-header" src="<?php echo $affiche[0]['backdrop_path']; ?>" alt="Affiche du film" width="80%" height="50%">
        </div>
        <h1>Films et séries en illimité, et bien plus</h1>
        <p>A partir de 7.99€. Annulable à tout moment.
            Prêt à regarder Pop streaming ? Saisissez votre adresse e-mail pour vous abonner ou réactiver votre abonnement.</p>
    </div>
</header>

<main>
    <section class="center tendances-actuelles">
        <h2>Tendances actuelles</h2>
        <div class="slider-container">
            <div class="flex slider film-list">

                <div class="flex films-tendances">
                    <span class="numerotation-tendances">1</span>
                    <div class="card-film">
                        <img src="<?php echo $img ?>" alt="affiche">

                    </div>
                </div>

                <div class="flex films-tendances">
                    <span class="numerotation-tendances">2</span>
                    <div class="card-film">
                        <img src="<?php echo $img1 ?>" alt="">
                    </div>
                </div>

                <div class="flex films-tendances">
                    <span class="numerotation-tendances">3</span>
                    <div class="card-film">
                        <img src="<?php echo $img2 ?>" alt="">

                    </div>
                </div>

                <div class="flex films-tendances">
                    <span class="numerotation-tendances">4</span>
                    <div class="card-film">
                        <img src="<?php echo $img4 ?>" alt="">

                    </div>
                </div>

                <div class="flex films-tendances">
                    <span class="numerotation-tendances">5</span>
                    <div class="card-film">
                        <img src="<?php echo $img5 ?>" alt="">

                    </div>
                </div>




            </div>

        </div>
    </section>

    <section class="flex catalogue">
        <div class="btn-catalogue">
            <a class="btn-primary" href="catalogue.php">
                <img class="icon-catalogue" src="../Public/img/btn-catalogue.png" alt="">
                Catalogue
            </a>
        </div>
    </section>
    <section class="faq center">
        <h2>Foire aux questions</h2>
        <div class="faq-item">
            <div class="faq-question">
                <h3>Pop Streaming, c'est quoi ?</h3>
                <span class="faq-icon">+</span>
            </div>
            <div class="faq-answer">
                <p>Pop Streaming est une plateforme de streaming qui vous permet de regarder vos films et séries préférés en illimité.Pop Streaming est une plateforme de streaming qui vous permet de regarder vos films et séries préférés en illimité.Pop Streaming est une plateforme de streaming qui vous permet de regarder vos films et séries préférés en illimité.Pop Streaming est une plateforme de streaming qui vous permet de regarder vos films et séries préférés en illimité.</p>
            </div>
        </div>
        <div class="faq-item">
            <div class="faq-question">
                <h3>Combien coûte Pop Streaming ?</h3>
                <span class="faq-icon">+</span>
            </div>
            <div class="faq-answer">
                <p>Pop Streaming coûte à partir de 7.99€ par mois.</p>
            </div>
        </div>
    </section>
    <section class="form-start">
        <div class="center">
            <p>Prêt à regarder Pop streaming ? Saisissez votre adresse e-mail pour vous abonner ou réactiver votre abonnement.</p>
            <form action="" method="post">
                <input type="email" name="email" placeholder="Adresse e-mail">
                <input class="btn-primary" type="submit" placeholder="Commencer">

            </form>
        </div>
    </section>
</main>
<?php
include "footer.php"
?>
<!--
<script src="../Public/js/survol_film.js"></script>
<script src="../Public/js/start_video.js"></script>-->
<script src="../Public/js/toggle_faq.js"></script>
<script src="../Public/js/slide.js"></script>



</body>
</html>