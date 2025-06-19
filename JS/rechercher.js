// Partie barre de recherche

document.addEventListener('DOMContentLoaded', function() {
    const profileDropdown = document.querySelector('.options-affichage');
    profileDropdown.style.display = 'none';
    const rechercheDiv = document.querySelector('.recherche');
    const searchButton = rechercheDiv.querySelector('button[type="submit"]');
    const searchInput = rechercheDiv.querySelector('input[type="search"]');


    searchButton.addEventListener('click', function(e) {


        // Si la barre est cachée, on l'affiche et on focus dessus
        if (!rechercheDiv.classList.contains('active')) {
            e.preventDefault();
            rechercheDiv.classList.add('active');
            searchInput.focus();
        } else {
            console.log("Recherche lancée pour:", searchInput.value);
        }
    });

    document.addEventListener('click', function(e) {
        if (!e.target.closest('.recherche')) {
            rechercheDiv.classList.remove('active');
            searchInput.value = '';
        }

        // Fermer menu profil
        if (!e.target.closest('.profile-link')) {
            profileDropdown.style.display = 'none';
        }

    });


});
