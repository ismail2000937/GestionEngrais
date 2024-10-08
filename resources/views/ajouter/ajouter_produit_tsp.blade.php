<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tsp_css.css">
    @include('boots')
    <title>Tableau_TSP</title>
   
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
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ajouter
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('ajouter_lign') }}">Ajouter Tableau</a>       
                            <a class="dropdown-item" href="{{ route('ajouter_tsp') }}">Ajouter Tableau Tsp</a>
                            <a class="dropdown-item" href="{{ route('ajouter_moyenne_tsp') }}">Ajouter Moyenne Tsp</a>
                            <a class="dropdown-item" href="{{ route('ajouter_acide') }}">Ajouter Acide </a>
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
                <td colspan="2"> <img src="images/ocp.png"></td>
            </tr>
            <tr class="border">
                <td colspan="4">Prestations de prélèvement et d’analyse de pilotage de l’entité Engrais de l’OCP Jorf
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

        <div class="c1">
            <form method="POST" action="{{ route('ajouter_tsp_produit') }}" id="my-form">


            @if ($errors->has('champs_requis'))
            <div class="alert alert-danger">
                {{ $errors->first('champs_requis') }}
            </div>
            @endif

                @csrf
                @method('POST')
                <div class="taille">
                    <table class="table table-striped">
                        <tr id="prob1">
                            <th colspan="2" class="border"><em>Echantillons</em></th>
                        </tr>
                        <tr id="prob1">
                            <td colspan="2" class="border"><em class="em1">Bouillie (Cuve D'attaque)</em></td>
                        </tr>
                        <tr>
                            <th class="border">
                                <p class="ths" id="prob">densite</p>
                            </th>
                            <td class="border"><input type="text" class="inp1" name="densite" value="{{ old('densite') }}"></td>
                        </tr>

                        <tr>
                            <th class="border">
                                <p class="ths" id="prob">A.L</p>
                            </th>
                            <td class="border"><input type="text" class="inp1" name="AL_B" value="{{ old('AL_B') }}"></td>
                        </tr>

                        <tr>
                            <th class="border">
                                <p class="ths" id="prob">P2O5(S.E)</p>
                            </th>
                            <td class="border"><input type="text" class="inp1" name="P2O5_SE_B" value="{{ old('P2O5_SE_B') }}"></td>
                        </tr>

                        <tr id="prob1">
                            <td colspan="2" class="border"><em em class="em1">sortie granulateur</em></td>
                        </tr>
                        <tr>
                            <th class="border">
                                <p class="ths" id="prob">A.L</p>
                            </th>
                            <td class="border"><input type="text" class="inp1" name="AL" value="{{ old('AL') }}"></td>
                        </tr>
                        <tr>
                            <th class="border">
                                <p class="ths" id="prob">p2o5_SE</p>
                            </th>
                            <td class="border"><input type="text" class="inp1" name="P2O5_SE" value="{{ old('P2O5_SE') }}"></td>
                        </tr>
                        <tr>
                            <th class="border">
                                <p class="ths" id="prob">H2O</p>
                            </th>
                            <td class="border"><input type="text" class="inp1" name="H2O" value="{{ old('H2O') }}"></td>
                        </tr>
                    </table>


                    <table class="table table-striped">
                        <tr id="prob1">
                            <th colspan="2" class="border"><em>Les Titres_TSP</em></th>
                        </tr>
                        <tr>
                            <th class="border">
                                <p class="ths" id="prob">H2O</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="H2O" value="{{ old('H2O') }}"></td>
                        </tr>

                        <tr>
                            <th class="border">
                                <p class="ths" id="prob">A.L</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="AL_T" value="{{ old('AL_T') }}"></td>
                        </tr>

                        <tr>
                            <th class="border">
                                <p class="ths" id="prob">P2O5(S.E)</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="P2O5_SE_T" value="{{ old('P2O5_SE_T') }}"></td>
                        </tr>

                        <tr>
                            <th class="border">
                                <p class="ths" id="prob">P2O5(S.E+cit)</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="P2O5_SE_CIT" value="{{ old('P2O5_SE_CIT') }}"></td>
                        </tr>

                        <tr>
                            <th class="border">
                                <p class="ths" id="prob">Tot</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="TOT" value="{{ old('TOT') }}"></td>
                        </tr>

                        <tr>
                            <th class="border">
                                <p class="ths" id="prob">h2O_T</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="h2O_T" value="{{ old('h2O_T') }}"></td>
                        </tr>

                        <tr>
                            <th class="border">
                                <p class="ths" id="prob">H2O_B</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="H2O_B" value="{{ old('H2O_B') }}"></td>
                        </tr>
                    </table>

                    <table class="table table-striped">
                        <tr id="prob1">
                            <th colspan="2" class="border"><em>Les Granulometrie_TSP</em></th>
                        </tr>
                        <tr class="border">
                            <th class="border">
                                <p class="tds" id="prob"> > 6.3</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="sup_6_3" value="{{ old('sup_6_3') }}"></td>
                        </tr>

                        <tr class="border">
                            <th class="border">
                                <p class="tds" id="prob"> > 5</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="sup_5" value="{{ old('sup_5') }}"></td>
                        </tr>

                        <tr class="border">
                            <th class="border">
                                <p class="tds" id="prob"> > 4</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="sup_4" value="{{ old('sup_4') }}"></td>
                        </tr>

                        <tr class="border">
                            <th class="border">
                                <p class="tds" id="prob"> > 3.15</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="sup_3_15" value="{{ old('sup_3_15') }}"></td>
                        </tr>

                        <tr class="border">
                            <th class="border">
                                <p class="tds" id="prob"> > 2.5</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="sup_2_5" value="{{ old('sup_2_5') }}"></td>
                        </tr>

                        <tr class="border">
                            <th class="border">
                                <p class="tds" id="prob"> > 2</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="sup_2" value="{{ old('sup_2') }}"></td>
                        </tr>

                        <tr class="border">
                            <th class="border">
                                <p class="tds" id="prob"> > 1</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="sup_1" value="{{ old('sup_1') }}"></td>
                        </tr>
                    </table>
                </div>
                <input type="submit" value="valider et passer a l'heure suivant" name="submit" class="btn btn-success" id="submit-btn">
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