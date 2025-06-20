document.addEventListener('DOMContentLoaded', function () {
    const langueAffichage = document.querySelector('.langue-selection');
    const langues = document.querySelectorAll('.language-affichage a');

    langues.forEach(langue => {
        langue.addEventListener('click', function (e) {
            //e.preventDefault();

            const langId = langue.getAttribute('data-id');

            // Met à jour le texte du bouton (affichage uniquement)
            if (langueAffichage) {
                langueAffichage.textContent = langId;
            }

            let lang;
            if (langId === "FR") {
                lang = "français";
            } else if (langId === "EN") {
                lang = "english";
            } else if (langId === "ES") {
                lang = "español";
            } else {
                lang = "unknown";
            }

            console.log("Langue envoyée :", lang);

            $.ajax({
                url: "ajaxParametres.php",
                method: "POST",
                data: {
                    langue: lang
                },
                success: function (feedback) {
                    console.log("Réponse:", feedback);
                    location.reload(); // Recharge la page pour appliquer la nouvelle langue
                },
                error: function(xhr, status, error) {
                    console.log("Erreur:", error);
                }
            });
        });
    });
});
