<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>controleur moyennes</title>
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/css_visualisation.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-OgVRvuATP1z7JjHLkuOU0HhX2c0wX26z6VjVQQBw5ElmDwN6YDi1WHM6dG3mzDRl" crossorigin="anonymous">

  <link rel="stylesheet" href="css/tableaux.css">

</head>

<body>

  <header class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="images/logo_ferti.png" alt="Logo Ferti" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('accueil_controleur') }}">Accueil</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="menuAcide" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Acide
              </a>
              <ul class="dropdown-menu" aria-labelledby="menuAcide">
                <a class="dropdown-item" href="{{ route('AfficherAcidecont') }}">Afficher acides</a>
                <a class="dropdown-item" href="{{ route('AfficherMoyacidecont') }}">Afficher moyennes acides</a>
                <a class="dropdown-item" href="{{ route('chartacidecont') }}">Afficher courbe Acide</a>
        </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="menuTSP" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                TSP
              </a>
              <ul class="dropdown-menu" aria-labelledby="menuTSP">
                <li><a class="dropdown-item" href="{{ route('toutes-heurestspcont') }}">Toutes les TSP</a></li>
                <li><a class="dropdown-item" href="{{ route('toutes-moyennestspcont') }}">Moyenne TSP</a></li>
                <li><a class="dropdown-item" href="{{ route('chartTspcont') }}">Courbes TSP</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="menuProduits" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Produits
              </a>
              <ul class="dropdown-menu" aria-labelledby="menuProduits">
                <li><a class="dropdown-item" href="{{ route('toutes-heuresproduitcont') }}">Toutes les Produits</a></li>
                <li><a class="dropdown-item" href="{{ route('toutes-moyennescont') }}">Moyennes</a></li>
                <li><a class="dropdown-item" href="{{ route('chartcont') }}">Courbes</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                  role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-search"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                  <form method="GET" class="p-12">
                      <div class="mb-5">
                          <label for="search-date" class="form-label">Date de saisie :</label>
                          <input type="date" id="search-date" name="search_date" class="form-control">
                      </div>
                      <div class="mb-5">
                          <label for="nom_lign" class="form-label">Nom de la ligne :</label>
                          <select name="nom_lign" id="nom_lign" class="form-select">
                              <option value="#">choisir une ligne</option>
                              <option value="07A">07A</option>
                              <option value="07B">07B</option>
                              <option value="07C">07C</option>
                              <option value="07D">07D</option>
                          </select>
                      </div>
                      <button type="submit" class="btn btn-primary mb-5">Rechercher</button>
                  </form>
              </div>
          </li>
            <li class="nav-item">
              <a class="nav-link" href="#foot">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('log_out') }}">Deconnexion</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>


  <!-- afficher moyennes -->

  <div class="container" id="marg">

    @if(session()->has('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
    @endif

    @if(isset($resultatproduits))
    @if(isset($_GET['search_date']) && isset($_GET['nom_lign']))
    @foreach($resultatproduits as $resultatproduit)
    @if($resultatproduit['date_saisi'] == $_GET['search_date'] && $resultatproduit['nom_ligne'] == $_GET['nom_lign'])
    <table class="table table-striped">
      <thead>
        <tr class="border">
          <th colspan="3" class="border">Saiseur : {{ $resultatproduit['saiseur'] }}</th>
          <th colspan="3" class="border">Nom d'unite : {{ $resultatproduit['nom_ligne'] }}</th>
          <th colspan="3" class="border">Nom produit : {{ $resultatproduit['nom_produit'] }}</th>
          <th colspan="5" class="border">date de saisi : {{ $resultatproduit['date_saisi'] }}</th>
        </tr>
        <tr>
          <th class="border">Ammonical</th>
          <th class="border">P2O5</th>
          <th class="border">P2O5 tot</th>
          <th class="border">P2O5 SE/C</th>
          <th class="border">H2O</th>
          <th class="border">Zn</th>
          <th class="border">S</th>
          <th class="border">Sup 5</th>
          <th class="border">Sup 4.75</th>
          <th class="border">Sup 4</th>
          <th class="border">Sup 3.15</th>
          <th class="border">Sup 2.5</th>
          <th class="border">Sup 2</th>
          <th class="border">Sup 1</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border">

          <td class="border">{{ $resultatproduit['ammonical'] }}</td>
          <td class="border">{{ $resultatproduit['p2o5'] }}</td>
          <td class="border">{{ $resultatproduit['p2o5_tot'] }}</td>
          <td class="border">{{ $resultatproduit['p2o5_SE_C'] }}</td>
          <td class="border">{{ $resultatproduit['h2o'] }}</td>
          <td class="border">{{ $resultatproduit['zn'] }}</td>
          <td class="border">{{ $resultatproduit['s'] }}</td>
          <td class="border">{{ $resultatproduit['sup_5'] }}</td>
          <td class="border">{{ $resultatproduit['sup_4_75'] }}</td>
          <td class="border">{{ $resultatproduit['sup_4'] }}</td>
          <td class="border">{{ $resultatproduit['sup_3_15'] }}</td>
          <td class="border">{{ $resultatproduit['sup_2_5'] }}</td>
          <td class="border">{{ $resultatproduit['sup_2'] }}</td>
          <td class="border">{{ $resultatproduit['sup_1'] }}</td>
        </tr>
      </tbody>
    </table>
    @endif
    @endforeach
    @else
    @foreach($resultatproduits as $resultatproduit)
    <div class="top">
      <table class="table table-striped">
        <thead>
          <tr class="border">
            <th colspan="3" class="border">Saiseur : {{ $resultatproduit['saiseur'] }}</th>
            <th colspan="3" class="border">Nom d'unite : {{ $resultatproduit['nom_ligne'] }}</th>
            <th colspan="3" class="border">Nom produit : {{ $resultatproduit['nom_produit'] }}</th>
            <th colspan="5" class="border">date de saisi : {{ $resultatproduit['date_saisi'] }}</th>
          </tr>
          <tr>
            <th class="border">Ammonical</th>
            <th class="border">P2O5</th>
            <th class="border">P2O5 tot</th>
            <th class="border">P2O5 SE/C</th>
            <th class="border">H2O</th>
            <th class="border">Zn</th>
            <th class="border">S</th>
            <th class="border">Sup 5</th>
            <th class="border">Sup 4.75</th>
            <th class="border">Sup 4</th>
            <th class="border">Sup 3.15</th>
            <th class="border">Sup 2.5</th>
            <th class="border">Sup 2</th>
            <th class="border">Sup 1</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border">

            <td class="border">{{ $resultatproduit['ammonical'] }}</td>
            <td class="border">{{ $resultatproduit['p2o5'] }}</td>
            <td class="border">{{ $resultatproduit['p2o5_tot'] }}</td>
            <td class="border">{{ $resultatproduit['p2o5_SE_C'] }}</td>
            <td class="border">{{ $resultatproduit['h2o'] }}</td>
            <td class="border">{{ $resultatproduit['zn'] }}</td>
            <td class="border">{{ $resultatproduit['s'] }}</td>
            <td class="border">{{ $resultatproduit['sup_5'] }}</td>
            <td class="border">{{ $resultatproduit['sup_4_75'] }}</td>
            <td class="border">{{ $resultatproduit['sup_4'] }}</td>
            <td class="border">{{ $resultatproduit['sup_3_15'] }}</td>
            <td class="border">{{ $resultatproduit['sup_2_5'] }}</td>
            <td class="border">{{ $resultatproduit['sup_2'] }}</td>
            <td class="border">{{ $resultatproduit['sup_1'] }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    @endforeach
    @endif
    @endif
  </div>


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