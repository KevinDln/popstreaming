const images = [ // Liste des images de profil
    { id: 1, url: '', name: 'Profil 1' },
    { id: 2, url: '', name: 'Profil 2' },
    { id: 3, url: '', name: 'Profil 3' },
    { id: 4, url: '', name: 'Profil 4' },
    { id: 5, url: '', name: 'Profil 5' },
    { id: 6, url: '', name: 'Profil 6' },
    { id: 7, url: '', name: 'Profil 7' },
    { id: 8, url: '', name: 'Profil 8' },
    { id: 9, url: '', name: 'Profil 9' }
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
    const profileImage = document.getElementById('profileImage');
    const selectedImg = document.getElementById('selectedImage');
    const plusIcon = document.getElementById('plusIcon');
    
    // Afficher l'image sélectionnée
    selectedImg.src = selectedImage.url;
    selectedImg.style.display = 'block';
    plusIcon.style.display = 'none';
    profileImage.classList.add('has-image');
    

    document.getElementById('selected_image_id').value = selectedImageId;
    document.getElementById('selected_image_url').value = selectedImage.url;
    
    closeImageModal();
}

function annulerProfil() {
    if (confirm('Êtes-vous sûr de vouloir annuler ?')) {
        // Réinitialiser le formulaire
        document.getElementById('profileForm').reset();
        
        // Réinitialiser l'image
        const profileImage = document.getElementById('profileImage');
        const selectedImg = document.getElementById('selectedImage');
        const plusIcon = document.getElementById('plusIcon');
        
        selectedImg.style.display = 'none';
        plusIcon.style.display = 'block';
        profileImage.classList.remove('has-image');
        selectedImageId = null;
        

        document.getElementById('selected_image_url').value = '';
    }
}

// Partie à corriger dans votre JavaScript - Section validation

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('profileForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            const pseudo = document.getElementById('pseudo').value.trim();
            const profileType = document.getElementById('type-profils').value;
            const imageUrl = document.getElementById('selected_image_url').value;
            
            if (!pseudo) {
                e.preventDefault();
                return false;
            }
            
            if (!profileType) {
                e.preventDefault();
                return false;
            }
            
            if (!imageUrl) {
                e.preventDefault();
                return false;
            }
            
            console.log('Envoi des données vers PHP:', {
                pseudo: pseudo,
                type_profil: profileType,
                image_url: imageUrl
            });
        });
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

