
document.addEventListener('DOMContentLoaded', function () {
    const langButton = document.querySelector('.langue-selection');


    function getLang() { // Pour retourner dynamiquement la langue dans les parametres

        if (langButton.textContent === "FR") {
            let francais =  "français";
            console.log(langButton.textContent);
            let test = $.ajax({
                url: "../php/parametres.php",
                method: "POST",
                data:
                    {
                        langue: francais
                    },

                success: function (data) {
                    console.log(data.langue);
                },
            });
            console.log(test);
        }
        else if (langButton.textContent === "EN") {
            $.ajax("parametres.php",
                {
                    langue: 'english'
                });
        } else if (langButton.textContent === "ES") {
            $.ajax("parametres.php",
                {
                    langue: 'español'
                });
        }
        else {
            $.ajax({
                method: "POST",
                url: "parametres.php",
                data:
                    {
                        langue: 'TEST'
                    },
                success: function (data) {
                    alert(data.langue);
                },
            });
        }
    }

    getLang();

});

