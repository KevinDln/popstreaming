<nav class="flex backgourd-rgba menu">
    <a class="logo" href=""><img src="../Public/img/logo-pop-streaming.png" alt=""></a>
    <div class="flex wrap container-nav">
        <div class="recherche">
            <form action="../php/Recherche.php" method="POST">
                <input class="barre-de-recherche" type="search" name="film" placeholder="Rechercher un film, une série..." alt="recherche">
                <button class="btn-recherche" type="submit"><img class="btn-search" src="../Public/img/btn-search.png" alt=""></button>
            </form>
        </div>
        <div class="nav-actions">
            <a href="#">
                <img src="../Public/img/bell.svg" alt="Notifications">
            </a>
        </div>
        <div class="nav-actions">
            <div class="langue">
                <button class="langue-selection btn-FR">FR</button>
                <ul class="language-affichage ">
                    <li><a class="btn-FR1" href="#">FR</a></li>
                    <li><a class="btn-FR1" href="#">EN</a></li>
                    <li><a class="btn-FR1" href="#">ES</a></li>
                </ul>
            </div>
        </div>
        <div class="nav-actions">
            <a href="../php/profils.php" class="profile-link">
                <img class="photo-profils profile-image" src="../Public/img/defaut_profil.jpeg" alt="Photo de profil">
                <ul class="options-affichage">
                    <li> <a class="p" href="../php/modif_profils.php"> Mon compte</a> </li>
                    <li> <a class="p" href="../php/deconnexion.php"> Se déconnecter </a> </li>
                </ul>
            </a>
        </div>
    </div>
</nav>