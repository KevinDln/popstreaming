document.addEventListener("DOMContentLoaded", () => {
    const slider = document.querySelector('.slider');
    const films = Array.from(document.querySelectorAll('.films-tendances'));
    const nextBtn = document.querySelector('.next');

    let index = 0;
    const filmWidth = films[0].offsetWidth + 10; // Largeur d'un film + marge

    nextBtn.addEventListener('click', () => {
        index = (index + 1) % (films.length - 4); // Assurez-vous de ne pas dépasser la fin
        slider.style.transform = `translateX(${-index * filmWidth}px)`;
    });
});
