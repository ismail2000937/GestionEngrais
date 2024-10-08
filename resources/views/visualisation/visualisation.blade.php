<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Chargement des scripts nécessaires pour afficher les graphes -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/css_visualisation.css">
    @include('boots')
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
                                <!-- Affichage du graphe PN -->
                                <div class="col-md-2">
                                    <button class="btn btn-primary" id="btn-last">&lt;last</button>
                                </div>
                                <div class="col-md-8">
                                    <div class="row" id="graphe-pn">
                                        @if(isset($_GET['search_date']) && isset($_GET['nom_lign']))
                                        @foreach($graphe_par_produit_pn as $id_produit => $graph)
                                        @if($graph['date_production'] == $_GET['search_date'] && $graph['nom_ligne'] == $_GET['nom_lign'])
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">pn/{{ $graph['nom_produit'] }}-{{ $graph['qlt'] }}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                            </div>
                                            @foreach($graph as $graphe)
                                            <div class="col-md-6">
                                                <canvas id="chart_pn_{{ $id_produit }}" width="800" height="400"></canvas>
                                                <script>
                                                    var ctx_pn = document.getElementById('chart_pn_{{$id_produit}}').getContext('2d');
                                                    var chart_pn = new Chart(ctx_pn, {
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
                                        @foreach($graphe_par_produit_pn as $id_produit => $graph)
                                        <div class="row">
                                            <div class="col-12">
                                                <h2 class="text-center">pn/{{ $graph['nom_produit'] }}-{{ $graph['qlt']}}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                            </div>
                                            @foreach($graph as $graphe)
                                            <div class="col-md-6">
                                                <canvas id="chart_pn_{{ $id_produit }}" width="800" height="400"></canvas>
                                                <script>
                                                    var ctx_pn = document.getElementById('chart_pn_{{$id_produit}}').getContext('2d');
                                                    var chart_pn = new Chart(ctx_pn, {
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


                                    <!-- Affichage du graphe sag -->

                                    <div class="row" id="graphe-sag" style="display:none">
                                        @if(isset($_GET['search_date']) && isset($_GET['nom_lign']))
                                        @foreach($graphe_par_produit_sag as $id_produit => $graph)
                                        @if($graph['date_production'] == $_GET['search_date'] && $graph['nom_ligne'] == $_GET['nom_lign'])
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">sag/{{ $graph['nom_produit'] }}-{{ $graph['qlt']}}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                            </div>
                                            @foreach($graph as $graphe)
                                            <div class="col-md-6">
                                                <canvas id="chart_sag_{{ $id_produit }}" width="800" height="400"></canvas>
                                                <script>
                                                    var ctx_sag = document.getElementById('chart_sag_{{$id_produit}}').getContext('2d');
                                                    var chart_sag = new Chart(ctx_sag, {
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
                                        @foreach($graphe_par_produit_sag as $id_produit => $graph)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">sag/{{ $graph['nom_produit'] }}-{{ $graph['qlt']}}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                            </div>
                                            @foreach($graph as $graphe)
                                            <div class="col-md-6">
                                                <canvas id="chart_sag_{{ $id_produit }}" width="800" height="400"></canvas>
                                                <script>
                                                    var ctx_sag = document.getElementById('chart_sag_{{$id_produit}}').getContext('2d');
                                                    var chart_sag = new Chart(ctx_sag, {
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

                                    <!-- Affichage du graphe d03 -->

                                    <div class="row" id="graphe-d03" style="display:none">
                                        @if(isset($_GET['search_date']) && isset($_GET['nom_lign']))
                                        @foreach($graphe_par_produit_d03 as $id_produit => $graph)
                                        @if($graph['date_production'] == $_GET['search_date'] && $graph['nom_ligne'] == $_GET['nom_lign'])
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">d03/{{ $graph['nom_produit'] }}-{{ $graph['qlt']}}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                            </div>
                                            @foreach($graph as $graphe)
                                            <div class="col-md-6">
                                                <canvas id="chart_d03_{{ $id_produit }}" width="800" height="400"></canvas>
                                                <script>
                                                    var ctx_d03 = document.getElementById('chart_d03_{{$id_produit}}').getContext('2d');
                                                    var chart_d03 = new Chart(ctx_d03, {
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
                                        @foreach($graphe_par_produit_d03 as $id_produit => $graph)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">d03/{{ $graph['nom_produit'] }}-{{ $graph['qlt']}}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                            </div>
                                            @foreach($graph as $graphe)
                                            <div class="col-md-6">
                                                <canvas id="chart_d03_{{ $id_produit }}" width="800" height="400"></canvas>
                                                <script>
                                                    var ctx_d03 = document.getElementById('chart_d03_{{$id_produit}}').getContext('2d');
                                                    var chart_d03 = new Chart(ctx_d03, {
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

                                    <!-- Affichage du graphe d05 -->

                                    <div class="row" id="graphe-d05" style="display:none">
                                        @if(isset($_GET['search_date']) && isset($_GET['nom_lign']))
                                        @foreach($graphe_par_produit_d05 as $id_produit => $graph)
                                        @if($graph['date_production'] == $_GET['search_date'] && $graph['nom_ligne'] == $_GET['nom_lign'])
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">d05/{{ $graph['nom_produit'] }}-{{ $graph['qlt']}}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                            </div>
                                            @foreach($graph as $graphe)
                                            <div class="col-md-6">
                                                <canvas id="chart_d05_{{ $id_produit }}" width="800" height="400"></canvas>
                                                <script>
                                                    var ctx_d05 = document.getElementById('chart_d05_{{$id_produit}}').getContext('2d');
                                                    var chart_d05 = new Chart(ctx_d05, {
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
                                        @foreach($graphe_par_produit_d05 as $id_produit => $graph)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">d05/{{ $graph['nom_produit'] }}-{{ $graph['qlt']}}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                            </div>
                                            @foreach($graph as $graphe)
                                            <div class="col-md-6">
                                                <canvas id="chart_d05_{{ $id_produit }}" width="800" height="400"></canvas>
                                                <script>
                                                    var ctx_d05 = document.getElementById('chart_d05_{{$id_produit}}').getContext('2d');
                                                    var chart_d05 = new Chart(ctx_d05, {
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

                                    <!-- Affichage du graphe d09 -->

                                    <div class="row" id="graphe-d09" style="display:none">
                                        @if(isset($_GET['search_date']) && isset($_GET['nom_lign']))
                                        @foreach($graphe_par_produit_d09 as $id_produit => $graph)
                                        @if($graph['date_production'] == $_GET['search_date'] && $graph['nom_ligne'] == $_GET['nom_lign'])
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">d09/{{ $graph['nom_produit'] }}-{{ $graph['qlt']}}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                            </div>
                                            @foreach($graph as $graphe)
                                            <div class="col-md-6">
                                                <canvas id="chart_d09_{{ $id_produit }}" width="800" height="400"></canvas>
                                                <script>
                                                    var ctx_d09 = document.getElementById('chart_d09_{{$id_produit}}').getContext('2d');
                                                    var chart_d09 = new Chart(ctx_d09, {
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
                                        @foreach($graphe_par_produit_d09 as $id_produit => $graph)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">d09/{{ $graph['nom_produit'] }}-{{ $graph['qlt']}}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                            </div>
                                            @foreach($graph as $graphe)
                                            <div class="col-md-6">
                                                <canvas id="chart_d09_{{ $id_produit }}" width="800" height="400"></canvas>
                                                <script>
                                                    var ctx_d09 = document.getElementById('chart_d09_{{$id_produit}}').getContext('2d');
                                                    var chart_d09 = new Chart(ctx_d09, {
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

                                    <div class="row" id="graphe-d10" style="display:none">
                                        @if(isset($_GET['search_date']) && isset($_GET['nom_lign']))
                                        @foreach($graphe_par_produit_d10 as $id_produit => $graph)
                                        @if($graph['date_production'] == $_GET['search_date'] && $graph['nom_ligne'] == $_GET['nom_lign'])
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">d10/{{ $graph['nom_produit'] }}-{{ $graph['qlt']}}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                            </div>
                                            @foreach($graph as $graphe)
                                            <div class="col-md-6">
                                                <canvas id="chart_d10_{{ $id_produit }}" width="800" height="400"></canvas>
                                                <script>
                                                    var ctx_d10 = document.getElementById('chart_d10_{{$id_produit}}').getContext('2d');
                                                    var chart_d10 = new Chart(ctx_d10, {
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
                                        @foreach($graphe_par_produit_d10 as $id_produit => $graph)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">d10/{{ $graph['nom_produit'] }}-{{ $graph['qlt']}}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                            </div>
                                            @foreach($graph as $graphe)
                                            <div class="col-md-6">
                                                <canvas id="chart_d10_{{ $id_produit }}" width="800" height="400"></canvas>
                                                <script>
                                                    var ctx_d10 = document.getElementById('chart_d10_{{$id_produit}}').getContext('2d');
                                                    var chart_d10 = new Chart(ctx_d10, {
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

                                    <!-- Affichage du graphe r02 -->

                                    <div class="row" id="graphe-r02" style="display:none">
                                        @if(isset($_GET['search_date']) && isset($_GET['nom_lign']))
                                        @foreach($graphe_par_produit_r02 as $id_produit => $graph)
                                        @if($graph['date_production'] == $_GET['search_date'] && $graph['nom_ligne'] == $_GET['nom_lign'])
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">r02/{{ $graph['nom_produit'] }}-{{ $graph['qlt']}}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                            </div>
                                            @foreach($graph as $graphe)
                                            <div class="col-md-6">
                                                <canvas id="chart_r02_{{ $id_produit }}" width="800" height="400"></canvas>
                                                <script>
                                                    var ctx_r02 = document.getElementById('chart_r02_{{$id_produit}}').getContext('2d');
                                                    var chart_r02 = new Chart(ctx_r02, {
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
                                        @foreach($graphe_par_produit_r02 as $id_produit => $graph)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">r02/{{ $graph['nom_produit'] }}-{{ $graph['qlt']}}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                            </div>
                                            @foreach($graph as $graphe)
                                            <div class="col-md-6">
                                                <canvas id="chart_r02_{{ $id_produit }}" width="800" height="400"></canvas>
                                                <script>
                                                    var ctx_r02 = document.getElementById('chart_r02_{{$id_produit}}').getContext('2d');
                                                    var chart_r02 = new Chart(ctx_r02, {
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

                                    <!-- Affichage du graphe Titre -->

                                    <div class="row" id="graphe-Titre" style="display:none">
                                        @if(isset($_GET['search_date']) && isset($_GET['nom_lign']))
                                        @foreach($graphe_par_produit_Titre as $id_produit => $graph)
                                        @if($graph['date_production'] == $_GET['search_date'] && $graph['nom_ligne'] == $_GET['nom_lign'])
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">Titre/{{ $graph['nom_produit'] }}-{{ $graph['qlt']}}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                            </div>
                                            @foreach($graph as $graphe)
                                            <div class="col-md-6">
                                                <canvas id="chart_Titre_{{ $id_produit }}" width="800" height="400"></canvas>
                                                <script>
                                                    var ctx_Titre = document.getElementById('chart_Titre_{{$id_produit}}').getContext('2d');
                                                    var chart_Titre = new Chart(ctx_Titre, {
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
                                        @foreach($graphe_par_produit_Titre as $id_produit => $graph)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">Titre/{{ $graph['nom_produit'] }}-{{ $graph['qlt']}}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                            </div>
                                            @foreach($graph as $graphe)
                                            <div class="col-md-6">
                                                <canvas id="chart_Titre_{{ $id_produit }}" width="800" height="400"></canvas>
                                                <script>
                                                    var ctx_Titre = document.getElementById('chart_Titre_{{$id_produit}}').getContext('2d');
                                                    var chart_Titre = new Chart(ctx_Titre, {
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

                                    <!-- Affichage du graphe Granulometre -->

                                    <div class="row" id="graphe-Granulometre" style="display:none">
                                        @if(isset($_GET['search_date']) && isset($_GET['nom_lign']))
                                        @foreach($graphe_par_produit_Granulometre as $id_produit => $graph)
                                        @if($graph['date_production'] == $_GET['search_date'] && $graph['nom_ligne'] == $_GET['nom_lign'])
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">Granulometrie/{{ $graph['nom_produit'] }}-{{ $graph['qlt']}}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                            </div>
                                            @foreach($graph as $graphe)
                                            <div class="col-md-6">
                                                <canvas id="chart_Granulometre_{{ $id_produit }}" width="800" height="400"></canvas>
                                                <script>
                                                    var ctx_Granulometre = document.getElementById('chart_Granulometre_{{$id_produit}}').getContext('2d');
                                                    var chart_Granulometre = new Chart(ctx_Granulometre, {
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
                                        @foreach($graphe_par_produit_Granulometre as $id_produit => $graph)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">Granulometrie/{{ $graph['nom_produit'] }}-{{ $graph['qlt']}}-{{ $graph['nom_ligne'] }}-{{ $graph['date_production'] }}</h2>
                                            </div>
                                            @foreach($graph as $graphe)
                                            <div class="col-md-6">
                                                <canvas id="chart_Granulometre_{{ $id_produit }}" width="800" height="400"></canvas>
                                                <script>
                                                    var ctx_Granulometre = document.getElementById('chart_Granulometre_{{$id_produit}}').getContext('2d');
                                                    var chart_Granulometre = new Chart(ctx_Granulometre, {
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