// Partie barre de recherche

document.addEventListener('DOMContentLoaded', function() {
    const profileDropdown = document.querySelector('.options-affichage');
    profileDropdown.style.display = 'none';

    // Partie Menu profil

    const profileLink = document.querySelector('.profile-link');
    profileLink.addEventListener('click', function(e) {
        e.preventDefault();
        profileDropdown.style.display = profileDropdown.style.display === 'block' ? 'none' : 'block';
    });

});
