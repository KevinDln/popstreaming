// Partie barre de recherche

document.addEventListener('DOMContentLoaded', function() {
  const rechercheDiv = document.querySelector('.recherche');
  const searchButton = rechercheDiv.querySelector('button[type="submit"]');
  const searchInput = rechercheDiv.querySelector('input[type="search"]');


  searchButton.addEventListener('click', function(e) {
    e.preventDefault();

    // Si la barre est cachée, on l'affiche et on focus dessus
    if (!rechercheDiv.classList.contains('active')) {
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

  const profilDiv = document.querySelector('.profile-link');
  const optionsLinks = document.querySelectorAll('.options-affichage a');
  profilDiv.addEventListener('click', function(e) {
    e.stopPropagation();
    menuaffichage.style.display = (menuaffichage.style.display === 'block') ? 'none' : 'block';
  });



});







