<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affiche moyenne tsp</title>
    @include('boots')
    <link rel="stylesheet" href="css/moyennesaffiche.css">
</head>

<body>
    <header class="bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="images/logo_ferti.png" alt="Logo Ferti" height="50">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Menu
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('toutes-heurestsp') }}">Afficher produit TSP</a>
                                <a class="dropdown-item" href="{{ route('toutes-heuresproduit') }}">Afficher
                                    produits</a>
                                <a class="dropdown-item" href="{{ route('AfficherAcide') }}">Afficher acide</a>
                                <a class="dropdown-item" href="{{ route('toutes-moyennestsp') }}">Afficher moyenne
                                    TSP</a>
                                <a class="dropdown-item" href="{{ route('toutes-moyennes') }}">Afficher moyennes</a>
                                <a class="dropdown-item" href="{{ route('AfficherMoyacide') }}">Afficher moyenne
                                    acide</a>
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


    <!-- affichage moyenne tsp -->


    <div class="container" id="marg">

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        @if ($errors->has('champs_requis'))
            <div class="alert alert-danger">
                {{ $errors->first('champs_requis') }}
            </div>
        @endif

        @if (isset($resultattsps))
            @if (isset($_GET['search_date']) && isset($_GET['nom_lign']))
                @foreach ($resultattsps as $resultattsps)
                    @if ($resultattsps['date_saisi'] == $_GET['search_date'] && $resultattsps['nom_ligne'] == $_GET['nom_lign'])
                       
                            <table class="table table-striped">
                                <thead>
                                    <tr class="border">
                                        <th colspan="3" class="border">Saiseur : {{ $resultattsp['saiseur'] }}
                                        </th>
                                        <th colspan="3" class="border">Nom D'unite :
                                            {{ $resultattsp['nom_ligne'] }}</th>
                                        <th colspan="3" class="border">Nom de produit :
                                            {{ $resultattsp['nom_produit'] }}</th>
                                        <th colspan="2" class="border">qualite : {{ $resultattsp['qlt'] }}</th>
                                        <th colspan="3" class="border">Date de saisi :
                                            {{ $resultattsp['date_saisi'] }}</th>
                                        <th class="border"></th>
                                    </tr>
                                    <tr>
                                        <th class="border">AL</th>
                                        <th class="border">P2O5_SE</th>
                                        <th class="border">p2O5_SE_C</th>
                                        <th class="border">TOT</th>
                                        <th class="border">H2O_T</th>
                                        <th class="border">H2O_B</th>
                                        <th class="border"> > 6.3</th>
                                        <th class="border"> > 5</th>
                                        <th class="border"> > 4</th>
                                        <th class="border"> > 3.15</th>
                                        <th class="border"> > 2.5</th>
                                        <th class="border"> > 2</th>
                                        <th class="border"> > 1</th>
                                        <th class="border">action1</th>
                                        <th class="border">action2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border">
                                        <td class="border">{{ $resultattsp['AL'] }}</td>
                                        <td class="border">{{ $resultattsp['P2O5_SE'] }}</td>
                                        <td class="border">{{ $resultattsp['p2O5_SE_C'] }}</td>
                                        <td class="border">{{ $resultattsp['TOT'] }}</td>
                                        <td class="border">{{ $resultattsp['H2O_T'] }}</td>
                                        <td class="border">{{ $resultattsp['H2O_B'] }}</td>
                                        <td class="border">{{ $resultattsp['sup_6_3'] }}</td>
                                        <td class="border">{{ $resultattsp['sup_5'] }}</td>
                                        <td class="border">{{ $resultattsp['sup_4'] }}</td>
                                        <td class="border">{{ $resultattsp['sup_3_15'] }}</td>
                                        <td class="border">{{ $resultattsp['sup_2_5'] }}</td>
                                        <td class="border">{{ $resultattsp['sup_2'] }}</td>
                                        <td class="border">{{ $resultattsp['sup_1'] }}</td>
                                        <td class="border">

                                            <form
                                                action="{{ route('delete_resultattsp', $resultattsp['id_moytsp']) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                        <td class="border"><a
                                                href="{{ route('update_moyennestsp', ['id' => $resultattsp['id_moytsp']]) }}"
                                                class="btn btn-success btn-sm">Modifier</a></td>
                                    </tr>
                                </tbody>
                            </table>
                       
                    @endif
                @endforeach
            @else
                @foreach ($resultattsps as $resultattsp)
                <div class="top">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="border">
                                        <th colspan="3" class="border">Saiseur : {{ $resultattsp['saiseur'] }}
                                        </th>
                                        <th colspan="3" class="border">Nom D'unite :
                                            {{ $resultattsp['nom_ligne'] }}</th>
                                        <th colspan="3" class="border">Nom de produit :
                                            {{ $resultattsp['nom_produit'] }}</th>
                                        <th colspan="2" class="border">qualite : {{ $resultattsp['qlt'] }}</th>
                                        <th colspan="3" class="border">Date de saisi :
                                            {{ $resultattsp['date_saisi'] }}</th>
                                        <th class="border"></th>
                                        <th class="border"></th>
                                    </tr>
                                    <tr>
                                        <th class="border">AL</th>
                                        <th class="border">P2O5_SE</th>
                                        <th class="border">p2O5_SE_C</th>
                                        <th class="border">TOT</th>
                                        <th class="border">H2O_T</th>
                                        <th class="border">H2O_B</th>
                                        <th class="border"> > 6.3</th>
                                        <th class="border"> > 5</th>
                                        <th class="border"> > 4</th>
                                        <th class="border"> > 3.15</th>
                                        <th class="border"> > 2.5</th>
                                        <th class="border"> > 2</th>
                                        <th class="border"> > 1</th>
                                        <th class="border">action1</th>
                                        <th class="border">action2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border">
                                        <td class="border">{{ $resultattsp['AL'] }}</td>
                                        <td class="border">{{ $resultattsp['P2O5_SE'] }}</td>
                                        <td class="border">{{ $resultattsp['p2O5_SE_C'] }}</td>
                                        <td class="border">{{ $resultattsp['TOT'] }}</td>
                                        <td class="border">{{ $resultattsp['H2O_T'] }}</td>
                                        <td class="border">{{ $resultattsp['H2O_B'] }}</td>
                                        <td class="border">{{ $resultattsp['sup_6_3'] }}</td>
                                        <td class="border">{{ $resultattsp['sup_5'] }}</td>
                                        <td class="border">{{ $resultattsp['sup_4'] }}</td>
                                        <td class="border">{{ $resultattsp['sup_3_15'] }}</td>
                                        <td class="border">{{ $resultattsp['sup_2_5'] }}</td>
                                        <td class="border">{{ $resultattsp['sup_2'] }}</td>
                                        <td class="border">{{ $resultattsp['sup_1'] }}</td>
                                        <td class="border">

                                            <form
                                                action="{{ route('delete_resultattsp', $resultattsp['id_moytsp']) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                        <td class="border">
                                            <form action="{{ route('update_moyennestsp') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id_moytsp"
                                                    value="{{ $resultattsp['id_moytsp'] }}">
                                                <button type="submit" class="btn btn-success btn-sm">Update</button>
                                            </form>
                                        </td>
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
