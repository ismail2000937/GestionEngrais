<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Analystique</title>
    @include('boots')
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
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Menu
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('toutes-heurestsp') }}">Afficher produit TSP</a>
                                <a class="dropdown-item" href="{{ route('toutes-heuresproduit') }}">Afficher produits</a>
                                <a class="dropdown-item" href="{{ route('AfficherAcide') }}">Afficher acides</a>
                                <a class="dropdown-item" href="{{ route('toutes-moyennestsp') }}">Afficher moyenne TSP</a>
                                <a class="dropdown-item" href="{{ route('toutes-moyennes') }}">Afficher moyennes</a>
                                <a class="dropdown-item" href="{{ route('AfficherMoyacide') }}">Afficher moyennes acides</a>
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

    <section class="bg-light" style="padding-top: 60px;">

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <div>
            <div class="jumbotron">
                <h1 class="display-4">Laboratoire OUBABA</h1>
                <p class="lead"><strong>Un partenaire incontournable dans le domaine du nettoyage industriel et des
                        analyses des engrais</strong></p>
            </div>
        </div>
    </section>

    <section class="bg-light" style="padding-top: 60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="text-justify" style="font-size: 18px; line-height: 1.6;">Le laboratoire OUBABA vise
                        essentiellement à fournir des compétences, proposer des formations pratiques et apporter une
                        assistance en ce qui concerne les analyses physico-chimiques, agricoles, environnement,
                        pétrolières et minières.</p>
                    <p class="text-justify" style="font-size: 18px; line-height: 1.6;">Afin de répondre aux exigences
                        requises, le laboratoire OUBABA s'est engagé dans une démarche dynamique et collective
                        d'amélioration continue pour l'obtention de l'accréditation NM ISO/CEI 17025 version 2017 pour
                        les activités d'analyses.</p>
                    <p class="text-justify" style="font-size: 18px; line-height: 1.6;">Le laboratoire OUBABA dispose
                        d'une grande expérience en matière des analyses depuis 2020, il dispose également des meilleurs
                        équipements, personnel et expérience pour fournir des résultats d'analyses.</p>
                </div>
                <div class="col-md-6">
                    <img src="images/oubaba_logo.png" class="img-fluid" alt="Laboratoire OUBABA"
                        style="width: 100%; height: auto;">
                </div>
            </div>
        </div>
    </section>









    <section class="bg-light" style="padding-top: 60px;">
        <div class="container py-8">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-justify" style="font-size: 18px; line-height: 1.6;">Le contrôleur de la production
                        des engrais utilise une interface machine pour surveiller et ajuster les installations de
                        production. Il reçoit les analyses de laboratoire OUBABA via l'application Ferticheck, ce qui
                        lui permet de modifier les paramètres de production pour garantir la conformité du produit final
                        et éviter les problèmes. Cela assure la qualité et l'efficacité des produits engrais.</p>
                </div>
                <div class="col-md-12">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"></li>
                            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"></li>
                            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5"></li>
                            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6"></li>
                            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="7"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/lab1.jpeg" class="d-block w-100" alt="Image 1">
                            </div>
                            <div class="carousel-item">
                                <img src="images/lab2.jpeg" class="d-block w-100" alt="Image 2">
                            </div>
                            <div class="carousel-item">
                                <img src="images/lab3.jpeg" class="d-block w-100" alt="Image 3">
                            </div>
                            <div class="carousel-item">
                                <img src="images/lab4.jpeg" class="d-block w-100" alt="Image 4">
                            </div>
                            <div class="carousel-item">
                                <img src="images/lab5.jpeg" class="d-block w-100" alt="Image 5">
                            </div>
                            <div class="carousel-item">
                                <img src="images/lab6.jpeg" class="d-block w-100" alt="Image 6">
                            </div>
                            <div class="carousel-item">
                                <img src="images/lab7.jpeg" class="d-block w-100" alt="Image 7">
                            </div>
                            <div class="carousel-item">
                                <img src="images/lab8.jpeg" class="d-block w-100" alt="Image 8">
                            </div>
                        </div>
                        <a class="carousel-control-prev custom-icon" href="#carouselExampleIndicators" role="button"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next custom-icon" href="#carouselExampleIndicators" role="button"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light" style="padding-top: 60px;">
        <div class="container services">
            <h2 class="text-center" style="color: green;">Nos Services</h2>
            <p class="text-center">L'application FertiCheck offre une plateforme complète de gestion des analyses des
                engrais. Grâce à nos services, vous pouvez facilement surveiller et optimiser l'utilisation des engrais
                dans votre activité agricole. Voici les principaux services que nous proposons.</p>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/servv1.PNG" class="card-img-top" alt="Service 1">
                        <div class="card-body">
                            <h5 class="card-title">Transmission des résultats en temps réel</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/srv1.PNG" class="card-img-top" alt="Service 2">
                        <div class="card-body">
                            <h5 class="card-title">Visualisation simple des données</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/serv3.PNG" class="card-img-top" alt="Service 3">
                        <div class="card-body">
                            <h5 class="card-title">Stockage centralisé des données</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <script>
        // Initialiser le menu déroulant Bootstrap
        var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
        var dropdownList = dropdownElementList.map(function(dropdownToggleEl) {
            return new bootstrap.Dropdown(dropdownToggleEl)
        });
    </script>

</body>
@include('footer')

</html>
