<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/tsp_css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU0HhX2c0wX26z6VjVQQBw5ElmDwN6YDi1WHM6dG3mzDRl" crossorigin="anonymous">

    <link rel="stylesheet" href="css/tableaux.css">

    <title>Tableau produit</title>
</head>

<body>

    <header class="bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('accueil_analyste') }}">
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
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ajouter
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('ajouter_lign') }}">Ajouter Tableau</a>
                                <a class="dropdown-item" href="{{ route('ajouter_moyenne') }}">Ajouter Moyenne </a>
                                <a class="dropdown-item" href="{{ route('ajouter_acide') }}">Ajouter Acide </a>
                            </div>
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

        <table class="table table-striped">
            <tr class="border">
                <td><img src="images/oubaba.png"></td>
                <td>
                    <h3>Analyses Produit fini et les liquides de lavage Secteur 1 </h3>
                </td>
                <td colspan="2"> <img src="images/ocp.png"></td>
            </tr>
            <tr class="border">
                <td colspan="4">Prestations de prélèvement et d’analyse de pilotage de l’entité Engrais de l’OCP
                    Jorf
                    Lasfar (OCP Nord)</td>
            </tr>

            <tr class="border">
                <td class="border">A- Liquides Lavage et Produit Fini:Ponctuel</td>
                <th class="border"> Ligne : {{ session('nom_ligne') }}</th>
                <th colspan="2" class="border">Date : {{ session('date_production') }}</th>
            </tr>

            <tr class="border">
                <th class="border">Nom du saiseur : {{ session('saiseur') }} </th>
                <th class="border">Nom du Produit : {{ session('nom_produit') }} </th>
                <th class="border">qualite : {{ session('qlt') }} </th>
                <th class="border">L'heure : {{ session('heure') }}H</th>
            </tr>
        </table>

        <form method="POST" action="{{ route('ajouter_tableau') }}" id="my-form">

            @if ($errors->has('champs_requis'))
                <div class="alert alert-danger">
                    {{ $errors->first('champs_requis') }}
                </div>
            @endif



            @csrf
            @method('POST')


            <div class="taille">

                <table class="table table-striped">
                    <tr class="border">
                        <th colspan="3" class="border"><em>Les echantillons</em></th>
                    </tr>
                    <tr class="border">
                        <th rowspan="2" class="border">
                            <p class="tds">PN</p>
                        </th>
                        <td class="border">
                            <p class="tds"> RM </p>
                        </td>
                        <td class="border"><input type="text" value="{{ old('pn_rm') }}" name="pn_rm"
                                class="inp2"></td>
                    </tr>
                    <tr class="border">
                        <td class="border">
                            <p class="tds">Densite</p>
                        </td>
                        <td class="border"><input type="text" value="{{ old('pn_densite') }}" name="pn_densite"
                                class="inp2"></td>
                    </tr>

                    <tr class="border">
                        <th class="border">
                            <p class="tds">SAG</p>
                        </th>
                        <td class="border">
                            <p class="tds">RM</p>
                        </td>
                        <td class="border"><input type="text" value="{{ old('sag_rm') }}" name="sag_rm"
                                class="inp2"></td>
                    </tr>

                    <tr class="border">
                        <th rowspan="2" class="border">
                            <p class="tds">D09</p>
                        </th>
                        <td class="border">
                            <p class="tds">RM</p>
                        </td>
                        <td class="border"><input type="text" value="{{ old('d09_rm') }}" name="d09_rm"
                                class="inp2"></td>
                    </tr>
                    <tr class="border">
                        <td class="border">
                            <p class="tds">Densite</p>
                        </td>
                        <td class="border"><input type="text" value="{{ old('d09_densite') }}"
                                name="d09_densite" class="inp2"></td>
                    </tr>

                    <tr class="border">
                        <th rowspan="2" class="border">
                            <p class="tds">R02</p>
                        </th>
                        <td class="border">
                            <p class="tds">RM</p>
                        </td>
                        <td class="border"><input type="text" value="{{ old('r02_rm') }}" name="r02_rm"
                                class="inp2"></td>
                    </tr>
                    <tr class="border">
                        <td class="border">
                            <p class="tds">Densite</p>
                        </td>
                        <td class="border"><input type="text" value="{{ old('r02_densite') }}"
                                name="r02_densite" class="inp2"></td>
                    </tr>

                    <tr class="border">
                        <th rowspan="2" class="border">D05</p>
                        </th>
                        <td class="border">
                            <p class="tds">RM</p>
                        </td>
                        <td class="border"><input type="text" value="{{ old('d05_rm') }}" name="d05_rm"
                                class="inp2"></td>
                    </tr>
                    <tr class="border">
                        <td class="border">
                            <p class="tds">Densite</p>
                        </td>
                        <td class="border"><input type="text" value="{{ old('d05_densite') }}"
                                name="d05_densite" class="inp2"></td>
                    </tr>

                    <tr class="border">
                        <th rowspan="2" class="border">
                            <p class="tds">D03</p>
                        </th>
                        <td class="border">
                            <p class="tds">RM</p>
                        </td>
                        <td class="border"><input type="text" value="{{ old('d03_rm') }}" name="d03_rm"
                                class="inp2"></td>
                    </tr>
                    <tr class="border">
                        <td class="border">
                            <p class="tds">Densite</p>
                        </td>
                        <td class="border"><input type="text" value="{{ old('d03_densite') }}"
                                name="d03_densite" class="inp2"></td>
                    </tr>

                    <tr class="border">
                        <th class="border">
                            <p class="tds">D10</p>
                        </th>
                        <td class="border">
                            <p class="tds">PH</p>
                        </td>
                        <td class="border"><input type="text" value="{{ old('d10_ph') }}" name="d10_ph"
                                class="inp2"></td>
                    </tr>
                </table>



                <table class="table table-striped">
                    <tr class="border">
                        <th colspan="2" class="border"><em>Les Titres</em></th>
                    </tr>
                    <tr class="border">
                        <th class="border">
                            <p class="ths">%N Ammoniacal</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" value="{{ old('ammonical') }}"
                                name="ammonical"></td>
                    </tr>

                    <tr class="border">
                        <th class="border">
                            <p class="ths">%P2O5 SE+CIT</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" value="{{ old('p2o5') }}"
                                name="p2o5"></td>
                    </tr>

                    <tr class="border">
                        <th class="border">
                            <p class="ths">%H2O Tel quel</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" value="{{ old('h2o') }}"
                                name="h2o"></td>
                    </tr>

                    <tr class="border">
                        <th class="border">
                            <p class="ths">%Zn</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" value="{{ old('zn') }}"
                                name="zn"></td>
                    </tr>

                    <tr class="border">
                        <th class="border">
                            <p class="ths">%S</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" value="{{ old('s') }}"
                                name="s"></td>
                    </tr>

                    <tr class="border">
                        <th class="border">
                            <p class="ths">Cd(ppm)</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" value="{{ old('cd') }}"
                                name="cd"></td>
                    </tr>

                    <tr class="border">
                        <th class="border">
                            <p class="ths">%P2O5 TOT</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" value="{{ old('p2o5_tot') }}"
                                name="p2o5_tot"></td>
                    </tr>

                    <tr class="border">
                        <th class="border">
                            <p class="ths">Temperature</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" value="{{ old('temperature') }}"
                                name="temperature"></td>
                    </tr>
                </table>



                <table class="table table-striped">
                    <tr class="border">
                        <th colspan="2" class="border"><em>Les Granulometrie</em></th>
                    </tr>
                    <tr class="border">
                        <th class="border">
                            <p class="tds"> > 5</p>
                        </th>
                        <td class="border"><input type="text" class="inp" value="{{ old('sup_5') }}"
                                name="sup_5"></td>
                    </tr>

                    <tr class="border">
                        <th class="border">
                            <p class="tds"> > 4.75</p>
                        </th>
                        <td class="border"><input type="text" class="inp" value="{{ old('sup_4_75') }}"
                                name="sup_4_75"></td>
                    </tr>

                    <tr class="border">
                        <th class="border">
                            <p class="tds"> > 4</p>
                        </th>
                        <td class="border"><input type="text" class="inp" value="{{ old('sup_4') }}"
                                name="sup_4"></td>
                    </tr>

                    <tr class="border">
                        <th class="border">
                            <p class="tds"> > 3.15</p>
                        </th>
                        <td class="border"><input type="text" class="inp" value="{{ old('sup_3_15') }}"
                                name="sup_3_15"></td>
                    </tr>

                    <tr class="border">
                        <th class="border">
                            <p class="tds"> > 2.5</p>
                        </th>
                        <td class="border"><input type="text" class="inp" value="{{ old('sup_2_5') }}"
                                name="sup_2_5"></td>
                    </tr>

                    <tr class="border">
                        <th class="border">
                            <p class="tds"> > 2</p>
                        </th>
                        <td class="border"><input type="text" class="inp" value="{{ old('sup_2') }}"
                                name="sup_2"></td>
                    </tr>

                    <tr class="border">
                        <th class="border">
                            <p class="tds"> > 1</p>
                        </th>
                        <td class="border"><input type="text" class="inp" value="{{ old('sup_1') }}"
                                name="sup_1"></td>
                    </tr>
                </table>
            </div>

            <input type="submit" value="valider et passer a l'heure suivant" name="submit" class="btn btn-success"
                id="submit-btn">
        </form>
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
