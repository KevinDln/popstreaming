const images = [ // Liste des images de profil
    { id: 1, url: '../Public/img/profil1.jpg', name: 'Profil 1' },
    { id: 2, url: '../Public/img/profil2.jpg', name: 'Profil 2' },
    { id: 3, url: '../Public/img/profil3.jpg', name: 'Profil 3' },
    { id: 4, url: '../Public/img/profil4.jpg', name: 'Profil 4' },
    { id: 5, url: '../Public/img/profil5.jpg', name: 'Profil 5' },
    { id: 6, url: '../Public/img/profil6.jpg', name: 'Profil 6' },
    { id: 7, url: '../Public/img/profil7.jpg', name: 'Profil 7' },
    { id: 8, url: '../Public/img/profil8.jpg', name: 'Profil 8' },
    { id: 9, url: '../Public/img/defaut_profil.jpeg', name: 'Profil 9' }
];

let selectedImageId = null;

function generateImageGrid() {
    const imageGrid = document.getElementById('imageGrid');
    imageGrid.innerHTML = '';
    
    images.forEach(image => {
        const imageDiv = document.createElement('div');
        imageDiv.className = 'image-option';
        imageDiv.onclick = () => selectImage(image.id);
        
        const img = document.createElement('img');
        img.src = image.url;
        img.alt = image.name;
        
        imageDiv.appendChild(img);
        imageGrid.appendChild(imageDiv);
    });
}

function openImage() {
    const modal = document.getElementById('imageModal');
    modal.classList.add('active');
    generateImageGrid();
    document.body.style.overflow = 'hidden';
}

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    modal.classList.remove('active');
    document.body.style.overflow = 'auto';
    selectedImageId = null;
    
    const selected = document.querySelector('.image-option.selected');
    if (selected) {
        selected.classList.remove('selected');
    }
}

function selectImage(imageId) {
    selectedImageId = imageId;
    
    const prevSelected = document.querySelector('.image-option.selected');
    if (prevSelected) {
        prevSelected.classList.remove('selected');
    }
    
    const imageOptions = document.querySelectorAll('.image-option');
    imageOptions[imageId - 1].classList.add('selected');
}

function confirmImage() {
    if (!selectedImageId) {
        alert('Veuillez sélectionner une image');
        return;
    }
    
    const selectedImage = images.find(image => image.id === selectedImageId);
    
    // Mettre à jour l'image affichée dans le profil
    const profileImg = document.querySelector('.image img');
    if (profileImg) {
        profileImg.src = selectedImage.url;
    }
    
    // Créer un input hidden pour envoyer la nouvelle image au serveur
    let hiddenInput = document.getElementById('new_profile_image');
    if (!hiddenInput) {
        hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.id = 'new_profile_image';
        hiddenInput.name = 'new_profile_image';
        document.querySelector('.formulaire').appendChild(hiddenInput);
    }
    hiddenInput.value = selectedImage.url;
    
    closeImageModal();
}

function annulerProfil() {
    if (confirm('Êtes-vous sûr de vouloir annuler ?')) {
        // Réinitialiser le formulaire
        document.getElementById('profileForm').reset();
        
        // Remettre l'image originale
        const profileImg = document.querySelector('.image img');
        const originalSrc = profileImg.getAttribute('data-original-src');
        if (originalSrc && profileImg) {
            profileImg.src = originalSrc;
        }
        
        // Supprimer l'input hidden
        const hiddenInput = document.getElementById('new_profile_image');
        if (hiddenInput) {
            hiddenInput.remove();
        }
        
        selectedImageId = null;
    }
}

// Fonction pour afficher/masquer le mot de passe
function showPassword() {
    const mdpInput = document.getElementById('mdp');
    const checkbox = event.target;
    
    if (checkbox.checked) {
        mdpInput.type = 'text';
    } else {
        mdpInput.type = 'password';
    }
}

// Initialisation
document.addEventListener('DOMContentLoaded', function() {
    // Stocker l'image originale
    const profileImg = document.querySelector('.image img');
    if (profileImg) {
        profileImg.setAttribute('data-original-src', profileImg.src);
    }

    const modal = document.getElementById('imageModal');
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeImageModal();
            }
        });
    }
});