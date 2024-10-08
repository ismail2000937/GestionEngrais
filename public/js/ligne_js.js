function envoyerFormulaire() {
    var selectProduit = document.getElementsByName('nom_produit')[0],
        selectLigne = document.getElementsByName('nom_ligne')[0],
        dateProduction = document.getElementById("date_production"),
        qltProduit = document.getElementById("qlt_produit"),
        msg=document.getElementById('msg'),
        msg1=document.getElementById('msg1'),
        msg2=document.getElementById('msg2'),
        msg2=document.getElementById('msg3');

     if (selectLigne.value === '#') {
        msg.innerHTML='veuillez choisi une ligne';
        msg.style.color='red';
        event.preventDefault();
    } else {
        msg.innerHTML='';
    }

    if (dateProduction.value === "") {
        msg1.innerHTML='veuillez entrer une date';
        msg1.style.color='red';
        event.preventDefault();
    }
    else{
        msg1.innerHTML='';
    }

    if (selectProduit.value === '#') {
        msg2.innerHTML='veuillez choisi un produit';
        msg2.style.color='red';
        event.preventDefault();
    } else {
        msg2.innerHTML='';
    }

    if (qltProduit.value === '#') {
        msg3.innerHTML='veuillez choisi une qualite';
        msg3.style.color='red';
        event.preventDefault();
    } else {
        msg3.innerHTML='';
    }

    if(selectLigne.value != '#' && selectProduit.value != '#' && dateProduction.value != "" && qltProduction.value != ""){
       document.getElementById('mon_formulaire').submit();
    }
}




//liste des produits
document.addEventListener("DOMContentLoaded", function() {
    const nom_produit = document.querySelector("#nom_produit");
    const qlt_produit = document.querySelector("#qlt_produit");

    nom_produit.addEventListener("change", function() {
        const produit = this.value;
        qlt_produit.innerHTML = "";
        if (produit === "map") {
            const options = [" MAP (11-54) standard", "MAP (11-54) Clair", "MAP Désulfaté/Kiddé", " MAP (11-52) Reach","MAP (11-52) Standard","MAP (11-54) reach","MAP (11-52) Clair","MAP(11-51)","MAP ZAMBIE","MAP MALAWI","MAP (10-50) Cd<30ppm","MAP (11-52) Spécial"
        ];
            options.forEach(function(opt) {
                const option = document.createElement("option");
                option.value = opt;
                option.textContent = opt;
                qlt_produit.appendChild(option);
            });
        } else if (produit === "dap") {
            const options = ["DAP Standard","DAP Chambal","DAP Euro","DAP Noir","DAP Standard foncé","DAP Euro Cd<30ppm","DAP Euro Cd<10ppm","DAP noir Cd<15ppm","DAP spécial dark Kenya (Cd<20ppm, As<20ppm)","DAP EU (Low Cd) inf à 28ppm","DAP Eu 20 mg/Kg","DAP TANZANIE","DAP Brun (essai)"
        ];
            options.forEach(function(opt) {
                const option = document.createElement("option");
                option.value = opt;
                option.textContent = opt;
                qlt_produit.appendChild(option);
            });
        } else if (produit === "tsp") {
            const options = ["TSP"];
            options.forEach(function(opt) {
                const option = document.createElement("option");
                option.value = opt;
                option.textContent = opt;
                qlt_produit.appendChild(option);
            });
        } else if (produit === "asp") {
            const options = ["ASP Standard","ASP (19/38/7S/0,1B)","ASP Chambal","ASP Euro","ASP (18,4-36,8-6,8S-2,2Zn)","ASP (17-35-7S-0,1B-2,2Zn)","NPS (12-46-7S)","NPS (12-46-7S-1Zn)","NPS (12-48-5S)","NPS (16-20-13S)","NPS (12-40-7S-0,5Zn)","NPS (20-20-15S)","NPS (12-40-1Zn)","NPS 12-45-5S-0,2Zn","NPS 12-46-6S-0,5B2O3","NPS (12-45-4,8S-0,6Zn-0,15Cu-0,5B2O3)",
        ];
            options.forEach(function(opt) {
                const option = document.createElement("option");
                option.value = opt;
                option.textContent = opt;
                qlt_produit.appendChild(option);
            });
        } else if (produit === "npk") {
            const options = [
                " NPK (14-28-14)","NPK(15-15-15-10S-B2O3)","NPK(14-18-18-5S-B2O3)","NPK(14-18-18-5S)","NPK (12-30-12-3S-0,1Cu 0,2Zn)","NPK (15-15-15)","NPK(14-23-14)","NPK(12-24-12)","NPK(10-20-10)","NPK(10-20-10-Zn-B2O3)","NPK (15-15-15) SOP","NPK (12-20-18-6S-1B2O3)","NPK (13-17-17-0,5B2O3-0,7Zn)","NPK (11-22-21-5S-1Zn-1B2O3)","NPK (10-26-26)","NPK (12-24-12) Zambia (As<20ppm et Cd<20ppm) ","NPK (11-22-21-5S-0,5B2O3-0,7Zn)","NPK (14-16-10)","NPK T15 EU ","NPK T15 MgSO4","NPK (11-22-16)","NPK (12-32-16)",
            ];
            options.forEach(function(opt) {
                const option = document.createElement("option");
                option.value = opt;
                option.textContent = opt;
                qlt_produit.appendChild(option);
            });
        }
    });
});