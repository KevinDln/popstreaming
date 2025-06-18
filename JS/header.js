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




  // Gestion menu langue
  const langButton = document.querySelector('.langue-selection');
  const langList = document.querySelector('.language-affichage');
  const langLinks = document.querySelectorAll('.language-affichage a');

  langButton.addEventListener('click', function(e) {
    e.stopPropagation();
    langList.style.display = (langList.style.display === 'block') ? 'none' : 'block';
  });

  langLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      const selectedLang = this.textContent.trim();
      langButton.textContent = selectedLang;
      langList.style.display = 'none';
    });
  });

  document.addEventListener('click', function(e) {
    if (!e.target.closest('.langue')) {
      langList.style.display = 'none';
    }
  });



  // Partie Menu profil

const profileLink = document.querySelector('.profile-link');
  profileLink.addEventListener('click', function(e) {
        e.preventDefault();
        profileDropdown.style.display = profileDropdown.style.display === 'block' ? 'none' : 'block';
    });



});
