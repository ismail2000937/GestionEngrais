<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/moyenne.css">
    @include('boots')
    <title>Update MoyenneTsp</title>

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
                            <a class="nav-link" href="{{ route('log_out') }}">Deconnexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="d1">
        <table class="table table-striped">
            <form method="POST" action="{{ route('update_moyennetsp', ['id' => $moyennetsp->id_moytsp]) }}">
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
                    <th class="border"> Ligne :<input type="hidden" name="nom_ligne" value="{{ $moyennetsp->nom_ligne }}"> </th>
                    <th class="border">Date : <input type="hidden" name="date_saisi" value="{{ $moyennetsp->date_saisi }}"></th>
                </tr>

                <tr class="border">
                    <th class="border">Nom du saiseur : <input type="hidden" name="saiseur" value="{{ $moyennetsp->saiseur }}"></th>
                    <th class="border">Nom du Produit : <input type="hidden" name="nom_produit" value="{{ $moyennetsp->nom_produit }}"></th>
                    <th colspan="2" class="border"></th>
                </tr>
        </table>

        <div class="c1">
            <table class="table table-striped">

                <tr class="border">
                    <th colspan="2"><em>Moyenne_TSP</em></th>
                </tr>
                <tr class="border">
                    <th class="border" id="prb">
                        <p>A.L</p>
                    </th>
                    <td class="border"><input type="text" name="AL" value="{{ $moyennetsp->AL }}"></td>
                </tr>

                <tr class="border">
                    <th class="border" id="prb">
                        <p>P₂O₅(S.E) </p>
                    </th>
                    <td class="border"><input type="text" name="P2O5_SE" value="{{ $moyennetsp->P2O5_SE }}"></td>
                </tr class="border">

                <tr class="border">
                    <th class="border" id="prb">
                        <p class="ths">P2O5 (SE+C)</p>
                    </th>
                    <td class="border"><input type="text" name="p2O5_SE_C" value="{{ $moyennetsp->p2O5_SE_C }}"></td>
                </tr>
                <tr class="border">
                    <th class="border" id="prb">
                        <p class="ths">tot</p>
                    </th>
                    <td class="border"><input type="text" name="TOT" value="{{ $moyennetsp->TOT }}"></td>
                </tr>

                <tr class="border">
                    <th class="border" id="prb">
                        <p class="ths">H₂O_T</p>
                    </th>
                    <td class="border"><input type="text" name="H2O_T" value="{{ $moyennetsp->H2O_T }}"></td>
                </tr>

                <tr class="border">
                    <th class="border" id="prb">
                        <p>H₂O_B</p>
                    </th>
                    <td class="border"><input type="text" name="H2O_B" value="{{ $moyennetsp->H2O_B }}"></td>
                </tr>
                <tr class="border">
                    <th class="border" id="prb">
                        <p> > 6.3</p>
                    </th>
                    <td class="border"><input type="text" name="sup_6_3" value="{{ $moyennetsp->sup_6_3 }}"></td>
                </tr>

                <tr class="border">
                    <th class="border" id="prb">
                        <p> > 5</p>
                    </th>
                    <td class="border"><input type="text" name="sup_5" value="{{ $moyennetsp->sup_5 }}"></td>
                </tr>
                <tr class="border">
                    <th class="border" id="prb">
                        <p class="tds"> > 4</p>
                    </th>
                    <td class="border"><input type="text" name="sup_4" value="{{ $moyennetsp->sup_4 }}"></td>
                </tr>

                <tr class="border">
                    <th class="border" id="prb">
                        <p> > 3.15</p>
                    </th>
                    <td class="border"><input type="text" name="sup_3_15" value="{{ $moyennetsp->sup_3_15 }}"></td>
                </tr>

                <tr class="border">
                    <th class="border" id="prb">
                        <p> > 2.5</p>
                    </th>
                    <td class="border"><input type="text" name="sup_2_5" value="{{ $moyennetsp->sup_2_5 }}"></td>
                </tr>

                <tr class="border">
                    <th class="border" id="prb">
                        <p> > 2</p>
                    </th>
                    <td class="border"><input type="text" name="sup_2" value="{{ $moyennetsp->sup_2 }}"></td>
                </tr>

                <tr class="border">
                    <th class="border" id="prb">
                        <p> > 1</p>
                    </th>
                    <td class="border"><input type="text" name="sup_1" value="{{ $moyennetsp->sup_1 }}"></td>
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