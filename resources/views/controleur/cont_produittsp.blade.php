<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>controleur produit tsp</title>
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



        <div class="d1">
               
                <!-- message de success -->
                @if(session()->has('success'))
                <div class="alert alert-success">
                        {{ session()->get('success') }}
                </div>
                @endif

                @if ($errors->has('champs_requis'))
                <div class="alert alert-danger">
                        {{ $errors->first('champs_requis') }}
                </div>
                @endif

                @if(isset($donnees_par_tsp_et_par_heure))
                @if(isset($_GET['search_date']) && isset($_GET['nom_lign']))
                @foreach($donnees_par_tsp_et_par_heure as $id_tsp => $donnees_par_tsp)
                @if($donnees_par_tsp['date_saisi'] == $_GET['search_date'] && $donnees_par_tsp['nom_ligne'] == $_GET['nom_lign'])

                <table class="table table-striped">
                        <tr class="border">
                                <td class="border"><img src="images/oubaba.png"></td>
                                <td class="border">
                                        <h3 class="coleur">Analyses Produit fini et les liquides de lavage Secteur 1 </h3>
                                </td>
                                <td colspan="2" class="image1"> <img src="images/ocp.png"></td>
                        </tr>
                        <tr class="border">
                                <td colspan="3" class="border">Prestations de prélèvement et d’analyse de pilotage de l’entité Engrais de l’OCP Jorf
                                        Lasfar (OCP Nord)</td>
                        </tr>

                        <tr class="border">
                                <th class="border">Nom produit : {{ $donnees_par_tsp['nom_produit'] }}</th>
                                <th class="border">qualite : {{ $donnees_par_tsp['qlt'] }}</th>
                                <th class="border">Nom Ligne : {{ $donnees_par_tsp['nom_ligne'] }}</th>
                                <th class="border">Date : {{ $donnees_par_tsp['date_saisi'] }}</th>
                        </tr>

                </table>

                <table class="table table-striped">
                        <tr>
                                <th class="border">H<br>
                                        e<br>
                                        u<br>
                                </th>
                                <th colspan="3" class="border">Bouillie (Cuve D'attaque)</th>
                                <th colspan="3" class="border">sortie granulateur</th>
                                <th colspan="7" class="border">Titre TSP</th>
                                <th colspan="7" class="border">Granulometre TSP</th>
                                <th class="border">Nom du </th>
                        </tr>

                        <tr>
                                <th class="border">r<br>
                                        e
                                </th>

                                <th class="border">
                                        <p class="ths" id="prob">densite</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">A.L</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">P2O5(S.E)</p>
                                </th>

                                <th class="border">
                                        <p class="ths" id="prob">A.L</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">p2o5_SE</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">H2O</p>
                                </th>

                                <th class="border">
                                        <p class="ths" id="prob">H2O</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">A.L</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">P2O5(S.E)</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">P2O5(S.E+cit)</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">Tot</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">h2O_T</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">h2O_B</p>
                                </th>

                                <th class="border">
                                        <p class="ths" id="prob"> > 6.3</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob"> > 5</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob"> > 4</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob"> > 3.15</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob"> > 2.5</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob"> > 2</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob"> > 1</p>
                                </th>

                                <th class="border">Saiseur</th>

                        </tr>

                        @foreach ($donnees_par_tsp['donnees'] as $heure => $resultats)
                        @if(count($resultats) > 0)

                        @foreach($resultats as $resultat)
                        <tr class="border">
                                <th class="border">{{ $heure }}</th>
                                <td class="border">{{ $resultat->densite }}</td>
                                <td class="border">{{ $resultat->AL_B }}</td>
                                <td class="border">{{ $resultat->P2O5_SE_B }}</td>
                                <td class="border">{{ $resultat->AL }}</td>
                                <td class="border">{{ $resultat->P2O5_SE }}</td>
                                <td class="border">{{ $resultat->H2O }}</td>
                                <td class="border">{{ $resultat->H2O }}</td>
                                <td class="border">{{ $resultat->AL_T }}</td>
                                <td class="border">{{ $resultat->P2O5_SE_T }}</td>
                                <td class="border">{{ $resultat->P2O5_SE_CIT }}</td>
                                <td class="border">{{ $resultat->TOT }}</td>
                                <td class="border">{{ $resultat->h2O_T }}</td>
                                <td class="border">{{ $resultat->H2O_B }}</td>
                                <td class="border">{{ $resultat->sup_6_3 }}</td>
                                <td class="border">{{ $resultat->sup_5 }}</td>
                                <td class="border">{{ $resultat->sup_4 }}</td>
                                <td class="border">{{ $resultat->sup_3_15 }}</td>
                                <td class="border">{{ $resultat->sup_2_5 }}</td>
                                <td class="border">{{ $resultat->sup_2 }}</td>
                                <td class="border">{{ $resultat->sup_1 }}</td>
                                <td class="border">{{ $resultat->saiseur }}</td>
                               
                        </tr>

                        @endforeach
                        @else
                        <p>Pas de résultats pour cette heure.</p>
                        @endif
                        @endforeach
        </div>
        </table>
        @endif
        @endforeach
        @else
        @foreach($donnees_par_tsp_et_par_heure as $id_tsp => $donnees_par_tsp)
        <div class="d">
                <table class="table table-striped">
                        <tr class="border">
                                <td class="border"><img src="images/oubaba.png"></td>
                                <td class="border">
                                        <h3 class="coleur">Analyses Produit fini et les liquides de lavage Secteur 1 </h3>
                                </td>
                                <td colspan="2" class="image1"> <img src="images/ocp.png"></td>
                        </tr>
                        <tr class="border">
                                <td colspan="3" class="border">Prestations de prélèvement et d’analyse de pilotage de l’entité Engrais de l’OCP Jorf
                                        Lasfar (OCP Nord)</td>
                        </tr>

                        <tr class="border">
                                <th class="border">Nom produit : {{ $donnees_par_tsp['nom_produit'] }}</th>
                                <th class="border">qualite : {{ $donnees_par_tsp['qlt'] }}</th>
                                <th class="border">Nom Ligne : {{ $donnees_par_tsp['nom_ligne'] }}</th>
                                <th class="border">Date : {{ $donnees_par_tsp['date_saisi'] }}</th>
                        </tr>

                </table>

                <table class="table table-striped">
                        <tr>
                                <th class="border">H<br>
                                        e<br>
                                        u<br>
                                </th>
                                <th colspan="3" class="border">Bouillie (Cuve D'attaque)</th>
                                <th colspan="3" class="border">sortie granulateur</th>
                                <th colspan="7" class="border">Titre TSP</th>
                                <th colspan="7" class="border">Granulometre TSP</th>
                                <th class="border">Nom du </th>
                        </tr>

                        <tr>
                                <th class="border">r<br>
                                        e
                                </th>
                                
                                <th class="border">
                                        <p class="ths" id="prob">densite</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">A.L</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">P2O5(S.E)</p>
                                </th>

                                <th class="border">
                                        <p class="ths" id="prob">A.L</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">p2o5_SE</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">H2O</p>
                                </th>

                                <th class="border">
                                        <p class="ths" id="prob">H2O</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">A.L</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">P2O5(S.E)</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">P2O5(S.E+cit)</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">Tot</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">h2O_T</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">h2O_B</p>
                                </th>

                                <th class="border">
                                        <p class="ths" id="prob"> > 6.3</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob"> > 5</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob"> > 4</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob"> > 3.15</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob"> > 2.5</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob"> > 2</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob"> > 1</p>
                                </th>

                                <th class="border">Saiseur</th>

                        </tr>
                        @foreach ($donnees_par_tsp['donnees'] as $heure => $resultats)
                        @if(count($resultats) > 0)

                        @foreach($resultats as $resultat)
                        <tr class="border">
                                <th class="border">{{ $heure }}</th>
                                <td class="border">{{ $resultat->densite }}</td>
                                <td class="border">{{ $resultat->AL_B }}</td>
                                <td class="border">{{ $resultat->P2O5_SE_B }}</td>
                                <td class="border">{{ $resultat->AL }}</td>
                                <td class="border">{{ $resultat->P2O5_SE }}</td>
                                <td class="border">{{ $resultat->H2O }}</td>
                                <td class="border">{{ $resultat->H2O }}</td>
                                <td class="border">{{ $resultat->AL_T }}</td>
                                <td class="border">{{ $resultat->P2O5_SE_T }}</td>
                                <td class="border">{{ $resultat->P2O5_SE_CIT }}</td>
                                <td class="border">{{ $resultat->TOT }}</td>
                                <td class="border">{{ $resultat->h2O_T }}</td>
                                <td class="border">{{ $resultat->H2O_B }}</td>
                                <td class="border">{{ $resultat->sup_6_3 }}</td>
                                <td class="border">{{ $resultat->sup_5 }}</td>
                                <td class="border">{{ $resultat->sup_4 }}</td>
                                <td class="border">{{ $resultat->sup_3_15 }}</td>
                                <td class="border">{{ $resultat->sup_2_5 }}</td>
                                <td class="border">{{ $resultat->sup_2 }}</td>
                                <td class="border">{{ $resultat->sup_1 }}</td>
                                <td class="border">{{ $resultat->saiseur }}</td>
                               
                        </tr>
                        @endforeach
                        @else
                        <p>Pas de résultats pour cette heure.</p>
                        @endif
                        @endforeach
        </div>
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