<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/moyenne.css">
        @include('boots')
        <title>Tableau</title>
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
                            <a class="nav-link" href="{{ route('ajouter_lign') }}">AjoutTableau</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ajouter_acide') }}">AjoutAcide </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ajouter_moyacide') }}">Moyenne_acide</a>
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

        <form method="POST" action="{{ route('update_acides', ['id' => $acide->id_acide]) }}">
            @csrf
            @method('PUT')
            <table class="table table-striped" id="mar">
                <tr class="border">
                    <td><img src="images/oubaba.png"></td>
                    <td>
                        <h3>Analyses Acides phosphoriques Secteur 1 </h3>
                    </td>
                    <td class="image1"> <img src="images/ocp.png"></td>
                </tr>
                <tr class="border">
                    <td colspan="3">Prestations de prélèvement et d’analyse de pilotage de l’entité Engrais de l’OCP Jorf
                        Lasfar (OCP Nord)</td>
                </tr>

                <tr class="border">
                    <th class="border">Nom du saiseur : <input type="hidden" name="saiseur" value="{{ $acide->saiseur }}"></th>
                    <th class="border">Nom du Produit : <input type="hidden" name="nom_produit" value="{{ $acide->nom_produit }}"></th>
                    <th colspan="2" class="border">L'heure : <input type="hidden" name="heure" value="{{ $acide->heure }}">H</th>
                </tr>

            </table>

            @if(isset($message))
            <div class="alert alert-danger">{{ $message }}</div>
            @endif

            <div class="taille">

                <table class="table table-striped">
                    <tr>
                        <th colspan="2" class="border"><em>Les Titres d'acide</em></th>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="ths">heure</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" name="heure" value="{{ $acide->heure }}"></td>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="ths">Ref_bac</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" name="Ref_bac" value="{{ $acide->Ref_bac }}"></td>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="ths">densite</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" name="densite" value="{{ $acide->densite }}"></td>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="ths">T°c</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" name="temperature" value="{{ $acide->temperature }}"></td>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="ths">P₂O₅%</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" name="P2O5" value="{{ $acide->P2O5 }}"></td>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="ths">TS%</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" name="TS" value="{{ $acide->TS }}"></td>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="ths">SO4--</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" name="SO4" value="{{ $acide->SO4 }}"></td>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="ths">cd</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" name="cd" value="{{ $acide->cd }}"></td>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="ths">MgO</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" name="Mgo" value="{{ $acide->Mgo }}"></td>
                    </tr>
                    <tr>
                        <th class="border">
                            <p class="ths">Zn(ppm)</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" name="Zn" value="{{ $acide->Zn }}"></td>
                    </tr>

                </table>
            </div>
            <input type="submit" value="update" name="submit" class="btn btn-success" id="submit-btn">
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