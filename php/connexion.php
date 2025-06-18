<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pop Streaming - Identifiez-vous</title>
    <link rel="stylesheet" href="../public/css/connexion.css">
    <link rel="stylesheet" href="../public/css/nav.css">
    <link rel="stylesheet" href="../public/css/styles.css">
    <link rel="stylesheet" href="../public/css/variables.css">
    <link rel="stylesheet" href="../public/css/font.css">
    <link rel="stylesheet" href="../public/css/strat_video.css">
    <link rel="stylesheet" href="../public/css/footer.css">
    <link rel="stylesheet" href="../public/css/modal-info.css">background-color: rgba(0, 0, 0, 0.9);
</head>
<body>
<header>
    <img src="http://localhost/popstreaming/public/img/images/logo-pop-streaming.png" alt="Pop Streaming Logo">
    <div class="language-selector">
        <select id="languageSwitch" onchange="switchLanguage()">
            <option value="fr">FR</option>
            <option value="en">EN</option>
        </select>
    </div>
</header>
<main>
    <div class="login-container">
        <h1>Identifiez-vous</h1>
        <form>
            <input type="email" placeholder="adressemail@gmail.com">
            <input type="password" placeholder="********">
            <button type="submit" class="btn">M'identifier</button>
        </form>
        <div class="divider">OU</div>
        <button class="btn code-btn">Utiliser un code d'identification</button>
        <div class="options">
            <label>
                <input type="checkbox"> Se souvenir de moi
            </label>
            <a href="#">Mot de passe oublié ?</a>
        </div>
        <button class="btn create-account-btn">Créer votre compte</button>
        <p>Première visite sur Pop Streaming ?</p>
    </div>
</main>

</body>
</html>
