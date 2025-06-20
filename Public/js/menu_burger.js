document.addEventListener("DOMContentLoaded", function() {
    const burgerIcon = document.querySelector('.burger-icon');
    const menuLinks = document.querySelector('.menu-links');

    burgerIcon.addEventListener('click', function() {
        menuLinks.classList.toggle('active');
    });
});
