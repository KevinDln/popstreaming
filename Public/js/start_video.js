document.querySelectorAll('.film').forEach(film => {
    film.addEventListener('click', () => {
        const videoSrc = film.getAttribute('data-video');
        const videoPlayer = document.getElementById('video-player');
        videoPlayer.src = videoSrc;

        document.querySelector('.video-container').style.display = 'flex';
        videoPlayer.play();
    });
});

document.querySelector('.close').addEventListener('click', () => {
    document.querySelector('.video-container').style.display = 'none';
    document.getElementById('video-player').pause();
});


document.querySelector('.info-icon').addEventListener('click', function() {
    alert('Plus d\'infos: Cette section contient plus d\'informations sur Marius et son aventure.');
});
