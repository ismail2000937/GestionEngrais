<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Chargement des scripts nécessaires pour afficher les graphes -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
  
    <title>Visualisation</title>
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
                            <a class="nav-link" href="{{ route('accueil_analyste') }}">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ajouter_lign') }}">Ajout_Tableau</a>
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
                            <a class="nav-link" href="{{ route('logout') }}">Deconnexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="d1">

        <!-- Affichage du graphe ACIDE -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Visualisation des données</h1>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @if(isset($_GET['search_date']) && isset($_GET['nom_lign']))
                                @foreach($graphe_par_produit_acide as $id_produit => $graph)
                                @if($graph['date_production'] == $_GET['search_date'] && $graph['nom_ligne'] == $_GET['nom_lign'])
                                <div class="row">
                                    <div class="col-md-16">
                                        <h2 class="text-center">Acide/{{ $graph['nom_produit'] }}-{{ $graph['qlt'] }}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                    </div>
                                    @foreach($graph as $graphe)
                                    <div class="col-md-6">
                                        <canvas id="chart_acide_{{ $id_produit }}" width="1100" height="400"></canvas>
                                        <script>
                                            var ctx_acide = document.getElementById('chart_acide_{{$id_produit}}').getContext('2d');
                                            var chart_acide = new Chart(ctx_acide, {
                                                type: 'bar',
                                                data: JSON.parse('{!! addslashes(json_encode($graphe)) !!}'),
                                                options: {
                                                    responsive: false,
                                                }
                                            });
                                        </script>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                                @endforeach

                                @foreach($graphe_par_produit_acide1 as $id_produit => $graph)
                                @if($graph['date_production'] == $_GET['search_date'] && $graph['nom_ligne'] == $_GET['nom_lign'])
                                <div class="row">
                                    <div class="col-md-16">
                                        <h2 class="text-center">Acide/{{ $graph['nom_produit'] }}-{{ $graph['qlt'] }}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                    </div>
                                    @foreach($graph as $graphe)
                                    <div class="col-md-6">
                                        <canvas id="chart_acide_{{ $id_produit }}" width="1100" height="400"></canvas>
                                        <script>
                                            var ctx_acide = document.getElementById('chart_acide_{{$id_produit}}').getContext('2d');
                                            var chart_acide = new Chart(ctx_acide, {
                                                type: 'bar',
                                                data: JSON.parse('{!! addslashes(json_encode($graphe)) !!}'),
                                                options: {
                                                    responsive: false,
                                                }
                                            });
                                        </script>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                                @endforeach

                                @else

                                @php
                                $mergedGraphs = array_merge($graphe_par_produit_acide, $graphe_par_produit_acide1);
                                @endphp

                                @foreach($mergedGraphs as $id => $graph)
                                <div class="row">
                                    <div class="col-md-8">
                                        <h2 class="text-center">acide/{{ $graph['nom_produit'] }}-{{ $graph['qlt'] }}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                    </div>
                                    @foreach($graph as $graphe)
                                    <div class="col-md-6">
                                        <canvas id="chart_acide_{{ $id }}" width="1100" height="400"></canvas>
                                        <script>
                                            var ctx_acide = document.getElementById('chart_acide_{{$id}}').getContext('2d');
                                            var chart_acide = new Chart(ctx_acide, {
                                                type: 'bar',
                                                data: JSON.parse('{!! addslashes(json_encode($graphe)) !!}'),
                                                options: {
                                                    responsive: false,
                                                }
                                            });
                                        </script>
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <script src="js/visualisation.js"></script>


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