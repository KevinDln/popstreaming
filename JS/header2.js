// Partie barre de recherche

document.addEventListener('DOMContentLoaded', function() {
  const profileDropdown = document.querySelector('.options-affichage');
  profileDropdown.style.display = 'none';


  document.addEventListener('click', function(e) {

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
