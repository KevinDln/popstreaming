function getLang() { // Pour retourner dynamiquement la langue dans les parametres
    const langButton = document.querySelector('.langue-selection');
    if (langButton.textContent === "FR") {
        let lang =  "francais";
        return $.ajax({
            url: "parametres.php",
            method: "POST",
            dataType : 'json',
            data:
                {
                    langue: lang
                },
            success: function (feedback) {
                console.log(feedback);
            },
        });

    }
    else if (langButton.textContent === "EN") {
        let lang =  "english";
        $.ajax({
            url: "http://localhost:8000/greta/popstreaming/php/parametres.php",
            method: "POST",
            dataType : 'json',
            data:
                {
                    langue: lang
                },
            success: function (feedback) {
                console.log("Langue sélectionné : ", data[0].langue);
            },
        });
    } else if (langButton.textContent === "ES") {
        let lang =  "español";
        $.ajax({
            url: "http://localhost:8000/greta/popstreaming/php/parametres.php",
            method: "POST",
            dataType : 'json',
            data:
                {
                    langue: lang
                },
            success: function (feedback) {
                console.log("Langue sélectionné : ", data[0].langue);
            },
        });
    }
}
document.addEventListener('DOMContentLoaded', function () {

    getLang();

});

