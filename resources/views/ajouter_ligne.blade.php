<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/header.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="css/ligne.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-OgVRvuATP1z7JjHLkuOU0HhX2c0wX26z6VjVQQBw5ElmDwN6YDi1WHM6dG3mzDRl" crossorigin="anonymous">
  <link rel="stylesheet" href="css/tableaux.css">
  <title>Ajouter ligne</title>
</head>

<body>
  <header class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('accueil_analyste') }}">
          <img src="images/logo_ferti.png" alt="Logo Ferti" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('accueil_analyste') }}">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('ajouter_lign') }}">Ajouter tableau</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Menu
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{ route('toutes-heurestsp') }}">Afficher produit TSP</a>
                <a class="dropdown-item" href="{{ route('toutes-heuresproduit') }}">Afficher produits</a>
                <a class="dropdown-item" href="{{ route('AfficherAcide') }}">Afficher acide</a>
                <a class="dropdown-item" href="{{ route('toutes-moyennestsp') }}">Afficher moyenne TSP</a>
                <a class="dropdown-item" href="{{ route('toutes-moyennes') }}">Afficher moyennes</a>
                <a class="dropdown-item" href="{{ route('AfficherMoyacide') }}">Afficher moyenne acide</a>
                <a class="dropdown-item" href="{{ route('chartTsp') }}">Afficher courbes TSP</a>
                <a class="dropdown-item" href="{{ route('chart') }}">Afficher courbes</a>
                <a class="dropdown-item" href="{{ route('chartacide') }}">Afficher courbe Acide</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#foot">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}">Deconnexion</a>
            </li>
          </ul>
        </div>
    </nav>
    </div>
    </div>
    </div>
  </header>




  <h1>Ajouter une ligne d'engrais</h1>
  <form action="{{ route('ajouter_heure') }}" method="post" id="mon_formulaire">
    @csrf
    @method('post')

    @if ($errors->has('error'))
            <div class="alert alert-danger">
                {{ $errors->first('error') }}
            </div>
            @endif

    <label for="nom_ligne">Nom de la ligne :</label>
    <select name="nom_ligne" id="nom_ligne">
      <option value="#">choisir une ligne</option>
      <option value="07A">07A</option>
      <option value="07B">07B</option>
      <option value="07C">07C</option>
      <option value="07D">07D</option>
    </select>
    <div id="msg"></div>

    <label for="date_production">Date de production :</label>
    <input type="date" id="date_production" name="date_production"><br>
    <div id="msg1"></div>

    <label for="nom_produit">Nom du produit :</label>
    <select name="nom_produit" id="nom_produit">
      <option value="#">Choisir un produit</option>
      <option value="map">MAP</option>
      <option value="dap">DAP</option>
      <option value="tsp">TSP</option>
      <option value="asp">ASP</option>
      <option value="npk">NPK</option>
    </select>
    <div id="msg2"></div><br>

    <label for="qlt">Qualite du produit :</label>
    <select name="qlt" id="qlt_produit">
      <option value="#">Choisir une qualité</option>
    </select>
    <div id="msg3"></div>
    <br/>
    <button type="submit" onclick="envoyerFormulaire()" id>Ajouter</button>
  </form>



  <script src="js/ligne_js.js"></script>
  <script>
    // Initialiser le menu déroulant Bootstrap
    var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
    var dropdownList = dropdownElementList.map(function(dropdownToggleEl) {
      return new bootstrap.Dropdown(dropdownToggleEl)
    });
  </script>
</body>
<div id="foot">
  @include('footer')
</div>

</html>