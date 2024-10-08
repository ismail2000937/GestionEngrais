<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Chargement des scripts nécessaires pour afficher les graphes -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Visualisation</title>
    <link rel="stylesheet" href="css/css_visualisation.css">
    @include('boots')
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
                            <a class="nav-link" href="{{ route('log_out') }}">Deconnexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <div class="d1">

        <div class="container">
            <div class="row justify-content-center">
            <div class="col-md-18">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Visualisation des données</h1>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Bouton pour afficher le graphe Bouille -->
                                <div class="col-md-2">
                                    <button class="btn btn-primary" id="btn-last">&lt;last</button>
                                </div>
                                <div class="col-md-8">
                                    <div class="row" id="graphe-Bouille">
                                        @if(isset($_GET['search_date']) && isset($_GET['nom_lign']))
                                        @foreach($graphe_par_produit_Bouille as $id_tsp => $graph)
                                        @if($graph['date_production'] == $_GET['search_date'] && $graph['nom_ligne'] == $_GET['nom_lign'])
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">Bouillie/{{ $graph['nom_produit'] }}-{{ $graph['qlt'] }}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                            </div>
                                            @foreach($graph as $graphe)
                                            <div class="col-md-6">
                                                <canvas id="chart_Bouille_{{ $id_tsp }}" width="800" height="400"></canvas>
                                                <script>
                                                    var ctx_Bouille = document.getElementById('chart_Bouille_{{$id_tsp}}').getContext('2d');
                                                    var chart_Bouille = new Chart(ctx_Bouille, {
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
                                        @foreach($graphe_par_produit_Bouille as $id_tsp => $graph)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">Bouillie/{{ $graph['nom_produit'] }}-{{ $graph['qlt'] }}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                            </div>
                                            @foreach($graph as $graphe)
                                            <div class="col-md-6">
                                                <canvas id="chart_Bouille_{{ $id_tsp }}" width="800" height="400"></canvas>
                                                <script>
                                                    var ctx_Bouille = document.getElementById('chart_Bouille_{{$id_tsp}}').getContext('2d');
                                                    var chart_Bouille = new Chart(ctx_Bouille, {
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


                                    <!-- Affichage du graphe SortieGranul-->

                                    <div class="row" id="graphe-SortieGranul" style="display:none">
                                        @if(isset($_GET['search_date']) && isset($_GET['nom_lign']))
                                        @foreach($graphe_par_produit_SortieGranul as $id_tsp => $graph)
                                        @if($graph['date_production'] == $_GET['search_date'] && $graph['nom_ligne'] == $_GET['nom_lign'])
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">SortieGranul/{{ $graph['nom_produit'] }}-{{ $graph['qlt'] }}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                            </div>
                                            @foreach($graph as $graphe)
                                            <div class="col-md-6">
                                                <canvas id="chart_SortieGranul_{{ $id_tsp }}" width="800" height="400"></canvas>
                                                <script>
                                                    var ctx_SortieGranul = document.getElementById('chart_SortieGranul_{{$id_tsp}}').getContext('2d');
                                                    var chart_SortieGranul = new Chart(ctx_SortieGranul, {
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
                                        @foreach($graphe_par_produit_SortieGranul as $id_tsp => $graph)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">SortieGranul/{{ $graph['nom_produit'] }}-{{ $graph['qlt'] }}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                            </div>
                                            @foreach($graph as $graphe)
                                            <div class="col-md-6">
                                                <canvas id="chart_SortieGranul_{{ $id_tsp }}" width="800" height="400"></canvas>
                                                <script>
                                                    var ctx_SortieGranul = document.getElementById('chart_SortieGranul_{{$id_tsp}}').getContext('2d');
                                                    var chart_SortieGranul = new Chart(ctx_SortieGranul, {
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

                                    <!-- Affichage du graphe TitreTsp -->

                                    <div class="row" id="graphe-TitreTsp" style="display:none">
                                        @if(isset($_GET['search_date']) && isset($_GET['nom_lign']))
                                        @foreach($graphe_par_produit_TitreTsp as $id_tsp => $graph)
                                        @if($graph['date_production'] == $_GET['search_date'] && $graph['nom_ligne'] == $_GET['nom_lign'])
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">TitreTsp/{{ $graph['nom_produit'] }}-{{ $graph['qlt'] }}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                            </div>
                                            @foreach($graph as $graphe)
                                            <div class="col-md-6">
                                                <canvas id="chart_TitreTsp_{{ $id_tsp }}" width="800" height="400"></canvas>
                                                <script>
                                                    var ctx_TitreTsp = document.getElementById('chart_TitreTsp_{{$id_tsp}}').getContext('2d');
                                                    var chart_TitreTsp = new Chart(ctx_TitreTsp, {
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
                                        @foreach($graphe_par_produit_TitreTsp as $id_tsp => $graph)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">TitreTsp/{{ $graph['nom_produit'] }}-{{ $graph['qlt'] }}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                            </div>
                                            @foreach($graph as $graphe)
                                            <div class="col-md-6">
                                                <canvas id="chart_TitreTsp_{{ $id_tsp }}" width="800" height="400"></canvas>
                                                <script>
                                                    var ctx_TitreTsp = document.getElementById('chart_TitreTsp_{{$id_tsp}}').getContext('2d');
                                                    var chart_TitreTsp = new Chart(ctx_TitreTsp, {
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

                                    <!-- Affichage du graphe GranulometreTsp -->

                                    <div class="row" id="graphe-GranulometreTsp" style="display:none">
                                        @if(isset($_GET['search_date']) && isset($_GET['nom_lign']))
                                        @foreach($graphe_par_produit_GranulometreTsp as $id_tsp => $graph)
                                        @if($graph['date_production'] == $_GET['search_date'] && $graph['nom_ligne'] == $_GET['nom_lign'])
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">GranulometreTsp/{{ $graph['nom_produit'] }}-{{ $graph['qlt'] }}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                            </div>
                                            @foreach($graph as $graphe)
                                            <div class="col-md-6">
                                                <canvas id="chart_GranulometreTsp_{{ $id_tsp }}" width="800" height="400"></canvas>
                                                <script>
                                                    var ctx_GranulometreTsp = document.getElementById('chart_GranulometreTsp_{{$id_tsp}}').getContext('2d');
                                                    var chart_GranulometreTsp = new Chart(ctx_GranulometreTsp, {
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
                                        @foreach($graphe_par_produit_GranulometreTsp as $id_tsp => $graph)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">GranulometreTsp/{{ $graph['nom_produit'] }}-{{ $graph['qlt'] }}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                            </div>
                                            @foreach($graph as $graphe)
                                            <div class="col-md-6">
                                                <canvas id="chart_GranulometreTsp_{{ $id_tsp }}" width="800" height="400"></canvas>
                                                <script>
                                                    var ctx_GranulometreTsp = document.getElementById('chart_GranulometreTsp_{{$id_tsp}}').getContext('2d');
                                                    var chart_GranulometreTsp = new Chart(ctx_GranulometreTsp, {
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
                                <!-- Bouton pour afficher le graphe next -->
                                <div class="col-md-2">
                                    <button class="btn btn-primary" id="btn-next">Next &gt;</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="js/visualisationtsp.js"></script>

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