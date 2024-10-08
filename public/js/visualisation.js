    // Récupération des boutons
    var btnLast = document.getElementById("btn-last");
    var btnNext = document.getElementById("btn-next");

    // Récupération des conteneurs des graphes
    var graphePN = document.getElementById("graphe-pn");
    var grapheD03 = document.getElementById("graphe-d03");
    var grapheD05 = document.getElementById("graphe-d05");
    var grapheD09 = document.getElementById("graphe-d09");
    var grapheD10 = document.getElementById("graphe-d10");
    var grapheR02 = document.getElementById("graphe-r02");
    var grapheSAG = document.getElementById("graphe-sag");
    var grapheTitre = document.getElementById("graphe-Titre");
    var grapheGranulometre = document.getElementById("graphe-Granulometre");

    // Initialisation de l'indice du graphe affiché
    var indiceGraphe = 0;

    // Fonction pour afficher le graphe correspondant à l'indice
    function afficherGraphe() {
        if (indiceGraphe === 0) {
            graphePN.style.display = "block";
            grapheSAG.style.display = "none";
            grapheD03.style.display = "none";
            grapheD05.style.display = "none";
            grapheD09.style.display = "none";
            grapheD10.style.display = "none";
            grapheR02.style.display = "none";
            grapheTitre.style.display = "none";
            grapheGranulometre.style.display = "none";
        } else if (indiceGraphe === 1) {
            graphePN.style.display = "none";
            grapheSAG.style.display = "block";
            grapheD03.style.display = "none";
            grapheD05.style.display = "none";
            grapheD09.style.display = "none";
            grapheD10.style.display = "none";
            grapheR02.style.display = "none";
            grapheTitre.style.display = "none";
            grapheGranulometre.style.display = "none";
        }else if (indiceGraphe === 2) {
            graphePN.style.display = "none";
            grapheSAG.style.display = "none";
            grapheD03.style.display = "block";
            grapheD05.style.display = "none";
            grapheD09.style.display = "none";
            grapheD10.style.display = "none";
            grapheR02.style.display = "none";
            grapheTitre.style.display = "none";
            grapheGranulometre.style.display = "none";
        }  else if (indiceGraphe === 3){
            graphePN.style.display = "none";
            grapheSAG.style.display = "none";
            grapheD03.style.display = "none";
            grapheD05.style.display = "block";
            grapheD09.style.display = "none";
            grapheD10.style.display = "none";
            grapheR02.style.display = "none";
            grapheTitre.style.display = "none";
            grapheGranulometre.style.display = "none";
        }else if (indiceGraphe === 4){
            graphePN.style.display = "none";
            grapheSAG.style.display = "none";
            grapheD03.style.display = "none";
            grapheD05.style.display = "none";
            grapheD09.style.display = "block";
            grapheD10.style.display = "none";
            grapheR02.style.display = "none";
            grapheTitre.style.display = "none";
            grapheGranulometre.style.display = "none";
        }else if (indiceGraphe === 5){
            graphePN.style.display = "none";
            grapheSAG.style.display = "none";
            grapheD03.style.display = "none";
            grapheD05.style.display = "none";
            grapheD09.style.display = "none";
            grapheD10.style.display = "block";
            grapheR02.style.display = "none";
            grapheTitre.style.display = "none";
            grapheGranulometre.style.display = "none";
        }else if (indiceGraphe === 6){
            graphePN.style.display = "none";
            grapheSAG.style.display = "none";
            grapheD03.style.display = "none";
            grapheD05.style.display = "none";
            grapheD09.style.display = "none";
            grapheD10.style.display = "none";
            grapheR02.style.display = "block";
            grapheTitre.style.display = "none";
            grapheGranulometre.style.display = "none";
        }else if (indiceGraphe === 7){
            graphePN.style.display = "none";
            grapheSAG.style.display = "none";
            grapheD03.style.display = "none";
            grapheD05.style.display = "none";
            grapheD09.style.display = "none";
            grapheD10.style.display = "none";
            grapheR02.style.display = "none";
            grapheTitre.style.display = "block";
            grapheGranulometre.style.display = "none";
        }else {
            graphePN.style.display = "none";
            grapheSAG.style.display = "none";
            grapheD03.style.display = "none";
            grapheD05.style.display = "none";
            grapheD09.style.display = "none";
            grapheD10.style.display = "none";
            grapheR02.style.display = "none";
            grapheTitre.style.display = "none";
            grapheGranulometre.style.display = "block";
        }
    }

    // Gestionnaire d'événement pour le bouton "last"
    btnLast.addEventListener("click", function() {
        indiceGraphe--;
        if (indiceGraphe < 0) {
            indiceGraphe = 8;
        }
        afficherGraphe();
    });

    // Gestionnaire d'événement pour le bouton "next"
    btnNext.addEventListener("click", function() {
        indiceGraphe++;
        if (indiceGraphe > 8) {
            indiceGraphe = 0;
        }
        afficherGraphe();
    });