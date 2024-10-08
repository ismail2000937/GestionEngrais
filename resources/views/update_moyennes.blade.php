<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/moyenne.css">
    <title>Update Moyenne</title>
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
                            <a class="nav-link" href="{{ route('accueil_analyste') }}">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ajouter_lign') }}">Ajouter tableau</a>
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
                            <a class="nav-link" href="{{ route('logout') }}">Deconnexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="d1">
        <table class="table table-striped">
            <form method="POST" action="{{ route('update_moy', ['id' => $moyenne->id_moy]) }}">
                @csrf
                @method('PUT')

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
                    <th class="border"> Ligne :<input type="hidden" name="nom_ligne" value="{{ $moyenne->nom_ligne }}"> </th>
                    <th class="border">Date : <input type="hidden" name="date_saisi" value="{{ $moyenne->date_saisi }}"></th>
                </tr>

                <tr class="border">
                    <th class="border">Nom du saiseur : <input type="hidden" name="saiseur" value="{{ $moyenne->saiseur }}"></th>
                    <th class="border">Nom du Produit : <input type="hidden" name="nom_produit" value="{{ $moyenne->nom_produit }}"></th>
                    <th colspan="2" class="border"></th>
                </tr>
        </table>
        <div class="c1">

            <table class="table table-striped">

                <tr class="border">
                    <th colspan="2" class="moy"><em>Moyenne</em></th>
                </tr>
                <tr class="border">
                    <th class="border" id="prb">
                        <p>Ammoniacal</p>
                    </th>
                    <td class="border"><input type="text" name="ammonical" value="{{ $moyenne->ammonical }}" required autofocus></td>
                </tr>

                <tr class="border">
                    <th class="border" id="prb">
                        <p>P2O5 </p>
                    </th>
                    <td class="border"><input type="text" name="p2o5" value="{{ $moyenne->p2o5 }}" required></td>
                </tr class="border">

                <tr class="border">

                    <th class="border" id="prb">
                        <p>P2O5 tot</p>
                    </th>
                    <td class="border"><input type="text" name="p2o5_tot" value="{{ $moyenne->p2o5_tot }}" required></td>
                </tr>

                <tr class="border">
                    <th class="border" id="prb">
                        <p class="ths">P2O5 (SE+C)</p>
                    </th>
                    <td class="border"><input type="text" name="p2o5_SE_C" value="{{ $moyenne->p2o5_SE_C }}" required></td>
                </tr>

                <tr class="border">
                    <th class="border" id="prb">
                        <p class="ths">H₂O</p>
                    </th>
                    <td class="border"><input type="text" name="h2o" value="{{ $moyenne->h2o }}" required></td>
                </tr>

                <tr class="border">
                    <th class="border" id="prb">
                        <p class="ths">Zn</p>
                    </th>
                    <td class="border"><input type="text" name="zn" value="{{ $moyenne->zn }}" required></td>
                </tr>

                <tr class="border">
                    <th class="border" id="prb">
                        <p>S</p>
                    </th>
                    <td class="border"><input type="text" name="s" value="{{ $moyenne->s }}" required></td>
                </tr>
                <tr class="border">
                    <th class="border" id="prb">
                        <p> > 5</p>
                    </th>
                    <td class="border"><input type="text" name="sup_5" value="{{ $moyenne->sup_5 }}" required></td>
                </tr>

                <tr class="border">
                    <th class="border" id="prb">
                        <p> > 4.75</p>
                    </th>
                    <td class="border"><input type="text" name="sup_4_75" value="{{ $moyenne->sup_4_75 }}" required></td>
                </tr>

                <tr class="border">
                    <th class="border" id="prb">
                        <p class="tds"> > 4</p>
                    </th>
                    <td class="border"><input type="text" name="sup_4" value="{{ $moyenne->sup_4 }}" required></td>
                </tr>

                <tr class="border">
                    <th class="border" id="prb">
                        <p> > 3.15</p>
                    </th>
                    <td class="border"><input type="text" name="sup_3_15" value="{{ $moyenne->sup_3_15 }}" required></td>
                </tr>

                <tr class="border">
                    <th class="border" id="prb">
                        <p> > 2.5</p>
                    </th>
                    <td class="border"><input type="text" name="sup_2_5" value="{{ $moyenne->sup_2_5 }}" required></td>
                </tr>

                <tr class="border">
                    <th class="border" id="prb">
                        <p> > 2</p>
                    </th>
                    <td class="border"><input type="text" name="sup_2" value="{{ $moyenne->sup_2 }}" required></td>
                </tr>

                <tr class="border">
                    <th class="border" id="prb">
                        <p> > 1</p>
                    </th>
                    <td class="border"><input type="text" name="sup_1" value="{{ $moyenne->sup_1 }}" required></td>
                </tr>
            </table>
        </div>
        <input type="submit" value="Update" name="submit" class="btn btn-success" id="submit-btn">
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