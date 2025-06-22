// Partie barre de recherche

document.addEventListener('DOMContentLoaded', function() {

    // Gestion menu langue
    const langButton = document.querySelector('.langue-selection');
    const langList = document.querySelector('.language-affichage');
    const langLinks = document.querySelectorAll('.language-affichage a');

    langList.style.display="none";

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




});
