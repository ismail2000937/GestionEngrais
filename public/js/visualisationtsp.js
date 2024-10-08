
  // Variables des boutons
  var btnLast = document.getElementById("btn-last");
  var btnNext = document.getElementById("btn-next");

  // Tableaux des différents graphes
  var graphes = [
    document.getElementById("graphe-Bouille"),
    document.getElementById("graphe-SortieGranul"),
    document.getElementById("graphe-TitreTsp"),
    document.getElementById("graphe-GranulometreTsp"),
  ];

  // Index du graphe actuel
  var indexGrapheActuel = 0;

  // Fonction pour afficher le graphe précédent
  function afficherGraphePrecedent() {
    // Masquer le graphe actuel
    graphes[indexGrapheActuel].style.display = "none";

    // Décrémenter l'index du graphe actuel
    indexGrapheActuel--;

    // Si on est à la première image, on revient à la dernière
    if (indexGrapheActuel < 0) {
      indexGrapheActuel = graphes.length - 1;
    }

    // Afficher le graphe suivant
    graphes[indexGrapheActuel].style.display = "block";
  }

  // Fonction pour afficher le graphe suivant
  function afficherGrapheSuivant() {
    // Masquer le graphe actuel
    graphes[indexGrapheActuel].style.display = "none";

    // Incrémenter l'index du graphe actuel
    indexGrapheActuel++;

    // Si on est à la dernière image, on revient à la première
    if (indexGrapheActuel >= graphes.length) {
      indexGrapheActuel = 0;
    }

    // Afficher le graphe suivant
    graphes[indexGrapheActuel].style.display = "block";
  }

  // Ajouter les événements pour les boutons
  btnLast.addEventListener("click", afficherGraphePrecedent);
  btnNext.addEventListener("click", afficherGrapheSuivant);

  // Initialiser le premier graphe
  graphes[indexGrapheActuel].style.display = "block";

