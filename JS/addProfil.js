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


document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('profileForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            const pseudo = document.getElementById('pseudo').value.trim();
            const profileType = document.getElementById('type-profils').value;
            const imageUrl = document.getElementById('selected_image_url').value;
            

            
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

