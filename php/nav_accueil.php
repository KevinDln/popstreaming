<nav class="flex backgourd-rgba menu">
    <a class="logo" href=""><img src="../Public/img/logo-pop-streaming.png" alt=""></a>
    <div class="flex wrap container-nav">
        <div class="recherche">
            <form action="../php/Recherche.php" method="POST">
                <input class="btn-recherche" type="search" id="film" name="film" placeholder="Rechercher un film, une série..." alt="recherche">
                <button class="btn-recherche" type="submit">Rechercher</button>
            </form>
        </div>
        <button class="notification">
            <img src="../Public/img/bell.svg" alt="Notifications">
        </button>
        <div class="langue">
            <button class="langue-selection btn-FR">FR</button>
            <ul class="language-affichage ">
                <li><a class="btn-FR1" href="#">FR</a></li>
                <li><a class="btn-FR1" href="#">EN</a></li>
                <li><a class="btn-FR1" href="#">ES</a></li>
            </ul>
        </div>
        <a href="../php/profils.php" class="profile-link">
            <img class="photo-profils" src="../Public/img/defaut_profil.jpeg" alt="Photo de profil" class="profile-image">
            <ul class="options-affichage">
                <li> <a class="p" href="../php/modif_profils.php"> Mon compte</a> </li>
                <li> <a class="p" href="../php/deconnexion.php"> Se déconnecter </a> </li>
            </ul>
        </a>
    </div>
</nav>