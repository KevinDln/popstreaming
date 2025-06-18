<link rel="stylesheet" href="../Public/css/header.css">
<link rel="stylesheet" href="../Public/css/nav.css">
<link rel="stylesheet" href="../Public/css/styles.css">
<link rel="stylesheet" href="../Public/css/variables.css">
<link rel="stylesheet" href="../Public/css/font.css">

<script src="../JS/header.js"></script>
<nav>

<header class="header flex1">

   <a href="accueil.php" class="logo">
                <img src="../img/logo_POP_STREAMING.png" alt="Logo">
            </a>
       <div class="flex">
            <div class="recherche">
                <form action="recherche.php" method="POST">
                    <input class="btn-recherche" type="search" id="film" name="film" placeholder="Rechercher un film, une série..." alt="recherche">
                    <button class="btn-recherche" type="submit">Rechercher</button>
                </form>
            </div>
            
            <div class="nav-actions">
                <button class="notification">
                    <img src="../img/bell.svg" alt="Notifications">
                </button>
                
                <div class="langue">
                    <button class="langue-selection btn-FR">FR</button>
                    <ul class="language-affichage ">
                        <li><a class="btn-FR1" href="#">FR</a></li>
                        <li><a class="btn-FR1" href="#">EN</a></li>
                        <li><a class="btn-FR1" href="#">ES</a></li>
                    </ul>
                </div>
                
                <a href="profils.php" class="profile-link">
                    <img class="photo-profils" src="../img/defaut_profil.jpeg" alt="Photo de profil" class="profile-image">
                    <ul class="options-affichage">
                        <li> <a class="p" href="modif_profils.php"> Mon compte</a> </li>
                        <li> <a class="p" href="deconnexion.php"> Se déconnecter </a> </li>
                    </ul>
                </a>
            </div>
       </div>

</header>
</nav>