document.addEventListener('DOMContentLoaded', function() {


    const tarifEssentiel = document.querySelector('.essentiel');
    const tarifStandard = document.querySelector('.standard');
    const tarifPremium = document.querySelector('.premium');
    const essentiel = document.querySelectorAll('.essentielcol');
    const standard = document.querySelectorAll('.standardcol');
    const premium = document.querySelectorAll('.premiumcol');

    document.addEventListener('click', function (e) {
        if (e.target.closest('.essentiel')) {
            e.preventDefault();
            essentiel.forEach(function (essentielCol) {
                essentielCol.style.backgroundColor = "var(--Nuances-jaune-fonce)";
            });
            standard.forEach(function (standardCol) {
                standardCol.style.backgroundColor = "var(--Nuances-blanc)";
            });
            premium.forEach(function (premiumCol) {
                premiumCol.style.backgroundColor = "var(--Nuances-blanc)";
            });
            tarifEssentiel.style.backgroundColor = "var(--Nuances-jaune-fonce)";
            tarifStandard.style.backgroundColor = "var(--Nuances-blanc)";
            tarifPremium.style.backgroundColor = "var(--Nuances-blanc)";

        } else if (e.target.closest('.standard')) {
            e.preventDefault();
            essentiel.forEach(function (essentielCol) {
                essentielCol.style.backgroundColor = "var(--Nuances-blanc)";
            });
            standard.forEach(function (standardCol) {
                standardCol.style.backgroundColor = "var(--Nuances-jaune-fonce)";
            });
            premium.forEach(function (premiumCol) {
                premiumCol.style.backgroundColor = "var(--Nuances-blanc)";
            });
            tarifEssentiel.style.backgroundColor = "var(--Nuances-blanc)";
            tarifStandard.style.backgroundColor = "var(--Nuances-jaune-fonce)";
            tarifPremium.style.backgroundColor = "var(--Nuances-blanc)";
        } else if (e.target.closest('.premium')) {
            e.preventDefault();
            essentiel.forEach(function (essentielCol) {
                essentielCol.style.backgroundColor = "var(--Nuances-blanc)";
            });
            standard.forEach(function (standardCol) {
                standardCol.style.backgroundColor = "var(--Nuances-blanc)";
            });
            premium.forEach(function (premiumCol) {
                premiumCol.style.backgroundColor = "var(--Nuances-jaune)";
            });
            tarifEssentiel.style.backgroundColor = "var(--Nuances-blanc)";
            tarifStandard.style.backgroundColor = "var(--Nuances-blanc)";
            tarifPremium.style.backgroundColor = "var(--Nuances-jaune-fonce)";
        }

    });

});

function getAbonnement() {
    let url = "moyens_de_paiement.php?abo="
    if (document.querySelector('.essentiel').style.backgroundColor == "var(--Nuances-jaune-fonce)") {
        // Pas idéal, serait mieux de faire un let avant pour définir une variable directement
        url += "essentiel";
        window.location.replace(url);
    }
    else if (document.querySelector('.standard').style.backgroundColor == "var(--Nuances-jaune-fonce)") {
        url += "standard";
        window.location.replace(url);

    }
    else if (document.querySelector('.premium').style.backgroundColor == "var(--Nuances-jaune-fonce)") {
        url += "premium";
        window.location.replace(url);
    }
}


