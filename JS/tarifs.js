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
                essentielCol.style.backgroundColor = "yellow";
            });
            standard.forEach(function (standardCol) {
                standardCol.style.backgroundColor = "white";
            });
            premium.forEach(function (premiumCol) {
                premiumCol.style.backgroundColor = "white";
            });
            tarifEssentiel.style.backgroundColor = "yellow";
            tarifStandard.style.backgroundColor = "white";
            tarifPremium.style.backgroundColor = "white";

        } else if (e.target.closest('.standard')) {
            e.preventDefault();
            essentiel.forEach(function (essentielCol) {
                essentielCol.style.backgroundColor = "white";
            });
            standard.forEach(function (standardCol) {
                standardCol.style.backgroundColor = "yellow";
            });
            premium.forEach(function (premiumCol) {
                premiumCol.style.backgroundColor = "white";
            });
            tarifEssentiel.style.backgroundColor = "white";
            tarifStandard.style.backgroundColor = "yellow";
            tarifPremium.style.backgroundColor = "white";
        } else if (e.target.closest('.premium')) {
            e.preventDefault();
            essentiel.forEach(function (essentielCol) {
                essentielCol.style.backgroundColor = "white";
            });
            standard.forEach(function (standardCol) {
                standardCol.style.backgroundColor = "white";
            });
            premium.forEach(function (premiumCol) {
                premiumCol.style.backgroundColor = "yellow";
            });
            tarifEssentiel.style.backgroundColor = "white";
            tarifStandard.style.backgroundColor = "white";
            tarifPremium.style.backgroundColor = "yellow";
        }

    });

});

function getAbonnement() {
    let url = "moyens_de_paiement.php?abo="
    if (document.querySelector('.essentiel').style.backgroundColor == "yellow") {
        // Pas idéal, serait mieux de faire un let avant pour définir une variable directement
        url += "essentiel";
        window.location.replace(url);
    }
    else if (document.querySelector('.standard').style.backgroundColor == "yellow") {
        url += "standard";
        window.location.replace(url);

    }
    else if (document.querySelector('.premium').style.backgroundColor == "yellow") {
        url += "premium";
        window.location.replace(url);
    }
}


