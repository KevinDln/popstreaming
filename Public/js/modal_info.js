document.querySelector('.info-icon').addEventListener('click', function() {
    document.getElementById('infoModal').style.display = 'block';
});

document.querySelector('.close').addEventListener('click', function() {
    document.getElementById('infoModal').style.display = 'none';
});

window.addEventListener('click', function(event) {
    if (event.target === document.getElementById('infoModal')) {
        document.getElementById('infoModal').style.display = 'none';
    }
});
