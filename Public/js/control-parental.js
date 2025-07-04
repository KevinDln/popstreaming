document.addEventListener('DOMContentLoaded', function() {
    const pinDots = document.querySelectorAll('.pin-dot');
    const confirmButton = document.querySelector('.confirm-button');
    let pin = [];

    document.addEventListener('keydown', function(event) {
        if (event.key >= 0 && event.key <= 9) {
            if (pin.length < 6) {
                pin.push(event.key);
                pinDots[pin.length - 1].classList.add('filled');
            }
        } else if (event.key === 'Backspace') {
            if (pin.length > 0) {
                pin.pop();
                pinDots[pin.length].classList.remove('filled');
            }
        }
    });

    confirmButton.addEventListener('click', function() {
        if (pin.length === 6) {
            alert('PIN entered: ' + pin.join(''));
            // Here you can add logic to verify the PIN
        } else {
            alert('Please enter a 6-digit PIN.');
        }
    });
});
