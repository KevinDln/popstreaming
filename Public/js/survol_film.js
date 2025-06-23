document.querySelectorAll('.card-film').forEach(card => {
    const video = card.querySelector('.video-hover');

    card.addEventListener('mouseenter', () => {
        video.currentTime = 0; // Réinitialise la vidéo au début
        video.play(); // Lance la vidéo
    });

    card.addEventListener('mouseleave', () => {
        video.pause(); // Met en pause la vidéo
    });
});
