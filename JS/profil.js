// Partie barre de recherche

document.addEventListener('DOMContentLoaded', function () {
    const profileDropdown = document.querySelector('.options-affichage');
    profileDropdown.style.display = 'none';

    const profileLink = document.querySelector('.profile-link > a'); // clique uniquement sur l'image de profil

    profileLink.addEventListener('click', function (e) {
        e.preventDefault(); // on bloque seulement le clic sur l’image
        profileDropdown.style.display = profileDropdown.style.display === 'block' ? 'none' : 'block';
    });
});
