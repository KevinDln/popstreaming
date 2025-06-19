document.querySelectorAll('.faq-question').forEach(item => {
    item.addEventListener('click', () => {
        const answer = item.nextElementSibling;
        answer.style.display = answer.style.display === 'block' ? 'none' : 'block';

        if (answer.style.maxHeight) {
            answer.style.maxHeight = null;
            icon.textContent = '+';
            item.classList.remove('active'); // Supprime la classe active
        } else {
            answer.style.maxHeight = answer.scrollHeight + 'px';
            icon.textContent = '-';
            item.classList.add('active'); // Ajoute la classe active
        }
    });

});
