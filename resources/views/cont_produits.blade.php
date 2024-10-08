<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>controleur produit</title>
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
              <a class="nav-link" href="{{ route('logout') }}">Deconnexion</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>



  <!-- affichage des produits -->

  <div class="d1">



    <!-- message de success -->
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

    @if (isset($donnees_par_produit_et_par_heure))
        @if (isset($_GET['search_date']) && isset($_GET['nom_lign']))
            @foreach ($donnees_par_produit_et_par_heure as $id_produit => $donnees_par_produit)
                @if (
                    $donnees_par_produit['date_saisi'] == $_GET['search_date'] &&
                        $donnees_par_produit['nom_ligne'] == $_GET['nom_lign']
                )
                    <div class="top">
                        <table class="table table-striped">
                            <tr class="border">
                                <td class="border"><img src="images/oubaba.png"></td>
                                <td>
                                    <h3 class="coleur">Analyses Produit fini et les liquides de lavage Secteur 1
                                    </h3>
                                </td>
                                <td colspan="2" class="image1"> <img src="images/ocp.png"></td>
                        </tr>
                            <tr class="border">
                                <td colspan="5">Prestations de prélèvement et d’analyse de pilotage de l’entité
                                    Engrais de l’OCP Jorf
                                    Lasfar (OCP Nord)</td>
                            </tr>

                            <tr class="border">
                                <th class="border">Nom produit : {{ $donnees_par_produit['nom_produit'] }}</th>
                                <th class="border">qualite : {{ $donnees_par_produit['qlt'] }}</th>
                                <th class="border">Nom Ligne : {{ $donnees_par_produit['nom_ligne'] }}</th>
                                <th class="border">Date : {{ $donnees_par_produit['date_saisi'] }}</th>
                            </tr>
                        </table>

                        <table class="table table-striped">
                            <div class="contain">
                                <tr class="border">
                                  <th class="border">H<br>
                                    e<br>
                                    u<br>
                            </th>
                                    <th colspan="2" class="border">PN</th>
                                    <th class="border">SAG</th>
                                    <th colspan="2" class="border">D03</th>
                                    <th colspan="2" class="border">D05</th>
                                    <th class="border">D10</th>
                                    <th colspan="2" class="border">D09</th>
                                    <th colspan="2" class="border">R02</th>
                                    <th colspan="8" class="border">Titres</th>
                                    <th colspan="7" class="border">Granulometres</th>
                                    <th class="border">Nom du </th>
                                </tr>

                                <tr class="border">
                                  <th class="border">r<br>
                                    e
                            </th>

                                    <th class="border">Densite</th>
                                    <th class="border">Rm</th>

                                    <th class="border">Rm</th>

                                    <th class="border">Densite</th>
                                    <th class="border">Rm</th>

                                    <th class="border">Densite</th>
                                    <th class="border">Rm</th>

                                    <th class="border">PH</th>

                                    <th class="border">Densite</th>
                                    <th class="border">Rm</th>

                                    <th class="border">Densite</th>
                                    <th class="border">Rm</th>

                                    <th class="border">NH3</th>
                                    <th class="border">P2O5_SE_CIT</th>
                                    <th class="border">H2O</th>
                                    <th class="border">Zn</th>
                                    <th class="border">s</th>
                                    <th class="border">cd</th>
                                    <th class="border">P2O5</th>
                                    <th class="border">T°C</th>

                                    <th class="border"> > 5</th>
                                    <th class="border"> > 4.75</th>
                                    <th class="border"> > 4</th>
                                    <th class="border"> > 3.15</th>
                                    <th class="border"> > 2.5</th>
                                    <th class="border"> > 2</th>
                                    <th class="border"> > 1</th>

                                    <th class="border">Saiseur</th>
                                 
                                </tr>
                                @foreach ($donnees_par_produit['donnees'] as $heure => $resultats)
                                    @if (count($resultats) > 0)
                                        @foreach ($resultats as $resultat)
                                            <tr class="border">

                                                <th class="border">{{ $heure }}</th>
                                                <td class="border">{{ $resultat->pn_rm }}</td>
                                                <td class="border">{{ $resultat->pn_densite }}</td>
                                                <td class="border">{{ $resultat->sag_rm }}</td>
                                                <td class="border">{{ $resultat->d03_rm }}</td>
                                                <td class="border">{{ $resultat->d03_densite }}</td>
                                                <td class="border">{{ $resultat->d05_rm }}</td>
                                                <td class="border">{{ $resultat->d05_densite }}</td>
                                                <td class="border">{{ $resultat->d10_ph }}</td>
                                                <td class="border">{{ $resultat->d09_rm }}</td>
                                                <td class="border">{{ $resultat->d09_densite }}</td>
                                                <td class="border">{{ $resultat->r02_rm }}</td>
                                                <td class="border">{{ $resultat->r02_densite }}</td>
                                                <td class="border">{{ $resultat->p2o5 }}</td>
                                                <td class="border">{{ $resultat->ammonical }}</td>
                                                <td class="border">{{ $resultat->h2o }}</td>
                                                <td class="border">{{ $resultat->zn }}</td>
                                                <td class="border">{{ $resultat->s }}</td>
                                                <td class="border">{{ $resultat->cd }}</td>
                                                <td class="border">{{ $resultat->p2o5_tot }}</td>
                                                <td class="border">{{ $resultat->temperature }}</td>
                                                <td class="border">{{ $resultat->sup_5 }}</td>
                                                <td class="border">{{ $resultat->sup_4_75 }}</td>
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
                @endif
            @endforeach
        @else
            @foreach ($donnees_par_produit_et_par_heure as $id_produit => $donnees_par_produit)
                <div class="top">
                    <table class="table table-striped">
                        <tr class="border">
                            <td class="border"><img src="images/oubaba.png"></td>
                            <td>
                                <h3 class="coleur">Analyses Produit fini et les liquides de lavage Secteur 1 </h3>
                            </td>
                            <td colspan="2" class="image1"> <img src="images/ocp.png"></td>
                        </tr>
                        <tr class="border">
                            <td colspan="3">Prestations de prélèvement et d’analyse de pilotage de l’entité
                                Engrais de l’OCP Jorf
                                Lasfar (OCP Nord)</td>
                        </tr>

                        <tr class="border">
                            <th class="border">Nom produit : {{ $donnees_par_produit['nom_produit'] }}</th>
                            <th class="border">qualite : {{ $donnees_par_produit['qlt'] }}</th>
                            <th class="border">Nom Ligne : {{ $donnees_par_produit['nom_ligne'] }}</th>
                            <th class="border">Date : {{ $donnees_par_produit['date_saisi'] }}</th>
                        </tr>
                    </table>

                    <table class="table table-striped">
                        <div class="contain">
                            <tr class="border">
                              <th class="border">H<br>
                                e<br>
                                u<br>
                        </th>
                                <th colspan="2" class="border">PN</th>
                                <th class="border">SAG</th>
                                <th colspan="2" class="border">D03</th>
                                <th colspan="2" class="border">D05</th>
                                <th class="border">D10</th>
                                <th colspan="2" class="border">D09</th>
                                <th colspan="2" class="border">R02</th>
                                <th colspan="8" class="border">Titres</th>
                                <th colspan="7" class="border">Granulometres</th>
                                <th class="border">Nom du </th>
               
                            </tr>

                            <tr class="border">
                              <th class="border">r<br>
                                e
                        </th>

                                <th class="border">Densite</th>
                                <th class="border">Rm</th>

                                <th class="border">Rm</th>

                                <th class="border">Densite</th>
                                <th class="border">Rm</th>

                                <th class="border">Densite</th>
                                <th class="border">Rm</th>

                                <th class="border">PH</th>

                                <th class="border">Densite</th>
                                <th class="border">Rm</th>

                                <th class="border">Densite</th>
                                <th class="border">Rm</th>

                                <th class="border">NH3</th>
                                <th class="border">P2O5_SE_CIT</th>
                                <th class="border">H2O</th>
                                <th class="border">Zn</th>
                                <th class="border">s</th>
                                <th class="border">cd</th>
                                <th class="border">P2O5</th>
                                <th class="border">T°C</th>

                                <th class="border"> > 5</th>
                                <th class="border"> > 4.75</th>
                                <th class="border"> > 4</th>
                                <th class="border"> > 3.15</th>
                                <th class="border"> > 2.5</th>
                                <th class="border"> > 2</th>
                                <th class="border"> > 1</th>

                                <th class="border">Saiseur</th>
                            </tr>

                            @foreach ($donnees_par_produit['donnees'] as $heure => $resultats)
                                @if (count($resultats) > 0)
                                    @foreach ($resultats as $resultat)
                                        <tr class="border">

                                            <th class="border">{{ $heure }}</th>
                                            <td class="border">{{ $resultat->pn_rm }}</td>
                                            <td class="border">{{ $resultat->pn_densite }}</td>
                                            <td class="border">{{ $resultat->sag_rm }}</td>
                                            <td class="border">{{ $resultat->d03_rm }}</td>
                                            <td class="border">{{ $resultat->d03_densite }}</td>
                                            <td class="border">{{ $resultat->d05_rm }}</td>
                                            <td class="border">{{ $resultat->d05_densite }}</td>
                                            <td class="border">{{ $resultat->d10_ph }}</td>
                                            <td class="border">{{ $resultat->d09_rm }}</td>
                                            <td class="border">{{ $resultat->d09_densite }}</td>
                                            <td class="border">{{ $resultat->r02_rm }}</td>
                                            <td class="border">{{ $resultat->r02_densite }}</td>
                                            <td class="border">{{ $resultat->p2o5 }}</td>
                                            <td class="border">{{ $resultat->ammonical }}</td>
                                            <td class="border">{{ $resultat->h2o }}</td>
                                            <td class="border">{{ $resultat->zn }}</td>
                                            <td class="border">{{ $resultat->s }}</td>
                                            <td class="border">{{ $resultat->cd }}</td>
                                            <td class="border">{{ $resultat->p2o5_tot }}</td>
                                            <td class="border">{{ $resultat->temperature }}</td>
                                            <td class="border">{{ $resultat->sup_5 }}</td>
                                            <td class="border">{{ $resultat->sup_4_75 }}</td>
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