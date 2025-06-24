<?php



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
        <script src="../JS/addProfil.js"></script>


        <style> 
            .image-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 1000;
            backdrop-filter: blur(5px);
        }

        .image-modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image-content {
            background: linear-gradient(135deg, #1a1a2e, #16213e);
            padding: 40px;
            border-radius: 20px;
            max-width: 500px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
        }

        .image-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .image-header h2 {
            color: #f4c430;
            margin-bottom: 10px;
        }

        .image-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .image-option {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 3px solid transparent;
            overflow: hidden;
        }

        

        .image-option.selected {
            border-color: #f4c430;
            box-shadow: 0 0 20px rgba(244, 196, 48, 0.4);
        }

        .image-option img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .modal-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .modal-btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .modal-btn-primary {
            background: #f4c430;
            color: #1a1a2e;
        }

        .modal-btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .modal-btn:hover {
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .image-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .image-content {
                padding: 30px 20px;
            }
        }
        @media (max-width: 480px) {
            .image-content {
                padding: 20px;
                width: 95%;
            }
            
            .image-header h2 {
                font-size: 1.5rem;
            }
            
            .modal-btn {
                padding: 10px 20px;
            }
        }
        </style>

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
                <img id="selectedImage" style="display: none;" alt="Image sélectionnée">
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