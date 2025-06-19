
document.addEventListener('DOMContentLoaded', function() {
    const langButton = document.querySelector('.langue-selection');
function getLang() { // Pour retourner dynamiquement la langue dans les parametres
    console.log(langButton.textContent);
    if (langButton.textContent === "FR") {

        $.post({
            type : "POST",
            url: "parametres.php",
            data:
            {
                langue: 'français'
            }});
    }
    else if (langButton.textContent === "EN") {
        $.post("parametres.php",
            {
                langue: 'english'
            });
    }
    else if (langButton.textContent === "ES") {
        $.post("parametres.php",
            {
                langue: 'español'
            });
    }
}



        getLang();
});

