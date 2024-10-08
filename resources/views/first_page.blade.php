<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Page d'accueil</title>
  <link rel="stylesheet" href="css/header.css">
  <!-- Liens vers les fichiers Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-OgVRvuATP1z7JjHLkuOU0HhX2c0wX26z6VjVQQBw5ElmDwN6YDi1WHM6dG3mzDRl" crossorigin="anonymous">

</head>

<body>

  <!-- En-tête de la page -->
  <header class="bg-light d-flex justify-content-between align-items-center">
    <a href="#" class="logo" style="text-decoration:none;">
        <img src="images/logo_ferti.png">
    </a>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#foot">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('authentification') }}">Connexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<section class="bg-light" style="padding-top: 60px;">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6">
                <h1><strong>Bienvenue sur FertiCheck </strong></h1>
                <p>FertiCheck c'est une application d'analyse de la qualité des engrais ! Nous offrons une solution complète pour les analystes et les utilisateurs afin de collecter et de visualiser les données de composition des produits en temps réel.</p>
            </div>
            <div class="col-md-6">
                <video src="images/vid1.mp4" loop muted autoplay></video>
            </div>
        </div>
    </div>
</section>


  <!-- Section des cartes de produits -->
  <section>
    <div class="container py-5">
      <h2>Nos analyses sur ces produits populaires</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <img src="images/tsp1.jpg" alt="Image du produit 1" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">TSP</h5>
              <p class="card-text">(Triple Super Phosphate) est produit à partir de phosphate de roche, qui est traité avec de l'acide sulfurique pour produire de l'acide phosphorique. L'acide phosphorique est ensuite mélangé avec de la craie ou de la chaux pour former du TSP. L'engrais résultant contient généralement environ 46% de phosphore.</p>

            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="images/dap1.jpg" alt="Image du produit 2" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">DAP</h5>
              <p class="card-text">(Diammonium Phosphate) est un type d'engrais granulaire qui contient des nutriments essentiels pour la croissance des plantes, tels que l'azote et le phosphore. Il est considéré comme un engrais "complet" car il contient ces deux éléments nutritifs dans des proportions équilibrées.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="images/map1.jpg" alt="Image du produit 3" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">MAP</h5>
              <p class="card-text">(Monammonium Phosphate) est un type d'engrais granulaire qui contient l'acide phosphorique et d'ammoniac, qui sont mélangés pour former du monammonium phosphate. L'engrais résultant contient généralement environ 11% d'azote et 52% de phosphore. </p>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
  <!-- Liens vers les fichiers Bootstrap JavaScript -->
  <div id="foot">
@include('footer')
</div>

</html>