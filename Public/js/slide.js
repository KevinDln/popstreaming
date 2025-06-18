document.addEventListener("DOMContentLoaded", () => {
    const slider = document.querySelector('.slider');
    const films = Array.from(document.querySelectorAll('.films-tendances'));
    const nextBtn = document.querySelector('.next');

    let index = 0;
    const filmWidth = films[0].offsetWidth + 10; // Largeur d'un film + espace

    // 🔁 Duplique les films pour créer l'effet infini
    films.forEach(film => {
        const clone = film.cloneNode(true);
        slider.appendChild(clone);
    });

    nextBtn.addEventListener('click', () => {
        index++;
        slider.style.transition = "transform 0.5s ease-in-out";
        slider.style.transform = `translateX(${-index * filmWidth}px)`;

        // 🔄 Quand on dépasse la moitié, on remet la position sans transition
        if (index >= films.length) {
            setTimeout(() => {
                slider.style.transition = "none";
                index = 0;
                slider.style.transform = `translateX(0px)`;
            }, 500); // Attendre la fin de l'animation
        }
    });
});



