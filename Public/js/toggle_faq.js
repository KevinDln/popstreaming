// Toggle FAQ Item
function toggleFAQ(item) {
    const isActive = item.classList.contains('active');

    // Close all items
    faqItems.forEach(faqItem => {
        faqItem.classList.remove('active');
    });

    // Open clicked item if it wasn't active
    if (!isActive) {
        item.classList.add('active');
    }
}


// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', initFAQ);