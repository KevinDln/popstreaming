<?php
session_start();
if (!isset($_SESSION['connected']) || $_SESSION['connected'] != true) {
    header("Location: pre_accueil.php");
    exit();
}


?>

<!DOCTYPE html>

<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PopStreaming</title>

        <link rel="stylesheet" href="../Public/css/nav.css">
        <link rel="stylesheet" href="../Public/css/styles.css">
        <link rel="stylesheet" href="../Public/css/variables.css">
        <link rel="stylesheet" href="../Public/css/font.css">
        <link rel="stylesheet" href="../Public/css/profils.css">
        <link rel="stylesheet" href="../Public/css/ajout_profils.css">
        <script src="../JS/addProfil.js"></script>
        <link rel="stylesheet" href="../Public/css/afficheprofils.css">

    </head>


    <body>
    <div class="create-profil">




<form id="profileForm" method="POST" action="traiter_profil.php">
    <div class="profile-section">
        <div class="profile-image-container">
            <div class="profilImage" id="profileImage" onclick="openImage()">
                <svg width="60" height="60" fill="currentColor" viewBox="0 0 24 24" id="plusIcon">
                    <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                </svg>
                <img id="selectedImage" style="display: none; width: 200px; height: 200px;" alt="Image sélectionnée">
            </div>
            <p>Ajouter une photo</p><br><br>
        </div>
    </div>
    

    <input id="pseudo" name="pseudo" type="text" placeholder="Pseudo" required><br>
    
    <select id="type-profils" name="type_profil" required>
        <option value="">Type de profils</option>
        <option value="jeunesse">Jeunesse</option>
        <option value="ado">Adolescent</option>
        <option value="adulte">Adulte</option>
    </select><br><br>
    
    <input type="hidden" id="selected_image_id" name="image_id" value="">
    <input type="hidden" id="selected_image_url" name="image_url" value="">

    <input type="submit" value="Valider">
    <input type="button" value="Annuler" onclick="annulerProfil()">

    </div>
    </form>
    
    <div class="image-modal" id="imageModal">
        <div class="image-content">
            <div class="image-header">
                <h2>Choisir une photo de profil</h2>
                <p>Sélectionnez une image pour votre profil</p>
            </div>
            
            <div class="image-grid" id="imageGrid">
              
            </div>
            
            <div class="modal-buttons">
                <button class="modal-btn modal-btn-primary" onclick="confirmImage()">Confirmer</button>
                <button class="modal-btn modal-btn-secondary" onclick="closeImageModal()">Annuler</button>
            </div>
        </div>
    </div>

    </body>

</html>