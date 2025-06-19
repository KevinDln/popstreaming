<link rel="stylesheet" href="../Public/css/header.css">
<script src="../JS/langues.js"></script>
<script src="../JS/profil.js"></script>
<script src="../JS/rechercher.js"></script>
<header>
   <a href="accueil.php" class="logo">
                <img src="../Public/img/logo-pop-streaming.png" alt="Logo">
            </a>
            
            <div class="recherche">
                <form action="afficheRecherche.php" method="POST">
                    <input type="search" id="film" name="film" placeholder="Rechercher un film, une série...">
                    <button type="submit">Rechercher</button>
                </form>
            </div>
            
            <div class="nav-actions">
                <button class="notification">
                    <img src="" alt="Notifications">
                </button>
                
                <div class="langue">
                    <button class="langue-selection">FR</button>
                    <ul class="language-affichage">
                        <li><a data-id="FR" href="#">FR</a></li>
                        <li><a data-id="EN" href="#">EN</a></li>
                        <li><a data-id="ES" href="#">ES</a></li>
                    </ul>
                </div>
                
                <a href="#" class="profile-link">
                    <img src="" alt="Photo de profil" class="profile-image">
                    <ul class="options-affichage">
                        <li> <a href="#"> Mon compte</a> </li>
                        <li> <a href="#"> Se déconnecter </a> </li>
                    </ul>
                </a>
            </div>
        </nav>


</header>