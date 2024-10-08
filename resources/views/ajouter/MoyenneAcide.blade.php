<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau Moyenne acides</title>
    <link rel="stylesheet" href="css/moyenne.css">
    @include('boots')
    <style>
        input{
            height: 60px;
        }
    </style>
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
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ajouter
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('ajouter_lign') }}">Ajouter Tableau</a>
                                <a class="dropdown-item" href="{{ route('ajouter_acide') }}">Ajouter Acide </a>
                                <a class="dropdown-item" href="{{ route('ajouter_moyacide') }}">Ajouter Moyenne Acide</a>
                            </div>
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
                            <a class="nav-link" href="{{ route('log_out') }}">Deconnexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="d1">
        <table class="table table-striped">
            <tr class="border">
                <td><img src="images/oubaba.png"></td>
                <td>
                    <h3>Analyses Produit fini et les liquides de lavage Secteur 1 </h3>
                </td>
                <td class="image1"> <img src="images/ocp.png"></td>
            </tr>
            <tr class="border">
                <td colspan="3">Prestations de prélèvement et d’analyse de pilotage de l’entité Engrais de l’OCP Jorf
                    Lasfar (OCP Nord)</td>
            </tr>

            <tr class="border">
                <td class="border">A- Liquides Lavage et Produit Fini:Ponctuel</td>
                <th class="border"> Ligne : {{ session('nom_ligne') }}</th>
                <th class="border">Date : {{ session('date_saisi') }}</th>
            </tr>

            <tr class="border">
                <th class="border">Nom du saiseur : {{ session('saiseur') }} </th>
                <th class="border">Nom du Produit : {{ session('nom_produit') }} </th>
                <th colspan="2" class="border"></th>
            </tr>
        </table>
        <div class="taille">
            <form method="post" action="{{ route('ajouter_moyA') }}">
                <table class="table table-striped">
                    @csrf
                    @method('post')

                    @if ($errors->has('champs_requis'))
                    <div class="alert alert-danger">
                        {{ $errors->first('champs_requis') }}
                    </div>
                    @endif

                    <tr class="border">
                        <th colspan="2" class="moy"><em>Moyenne Acide</em></th>
                    </tr>
                    <tr class="border">
                        <th class="border" id="prb">
                            <p>densite</p>
                        </th>
                        <td class="border"><input type="text" name="densite" value="{{ old('densite') }}"></td>
                    </tr>

                    <tr class="border">
                        <th class="border" id="prb">
                            <p>Tc</p>
                        </th>
                        <td class="border"><input type="text" name="Tc" value="{{ old('Tc') }}"></td>
                    </tr class="border">

                    <tr class="border">

                        <th class="border" id="prb">
                            <p>P2O5 </p>
                        </th>
                        <td class="border"><input type="text" name="p2o5" value="{{ old('p2o5') }}"></td>
                    </tr>

                    <tr class="border">
                        <th class="border" id="prb">
                            <p class="ths">TS%</p>
                        </th>
                        <td class="border"><input type="text" name="TS" value="{{ old('TS') }}"></td>
                    </tr>

                    <tr class="border">
                        <th class="border" id="prb">
                            <p class="ths">SO4--</p>
                        </th>
                        <td class="border"><input type="text" name="SO4" value="{{ old('SO4') }}"></td>
                    </tr>
                </table>
                <input type="submit" value="Valider la Moyenne" name="submit" class="btn btn-success" id="submit-btn">
            </form>
        </div>
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