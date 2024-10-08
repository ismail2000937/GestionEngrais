<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/style_inscription.css">
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
    <form action="{{ route('use.store') }}" method="POST" class="p-3 border">
        @csrf
        <h1 class="mb-3">Inscription</h1>

        <div class="form-floating mb-3">
            <input type="text" id="nom" name="nom" value="{{ old('nom') }}" class="form-control @error('nom') is-invalid @enderror">
            <label for="nom">Nom:</label>
            @error('nom')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}" class="form-control @error('prenom') is-invalid @enderror">
            <label for="prenom">Prénom:</label>
            @error('prenom')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@ocpgroup\.ma$" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
            <label for="email">Email:</label>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
            <label for="password">Mot de passe:</label>
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input id="password_confirmation" type="password" class="form-control @error('prenom') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
            <label for="confirmpassword">Confirmation du mot de passe:</label>
            @error('password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <select name="mission" id="mission" class="form-control @error('mission') is-invalid @enderror">
                <option value="#">Choisir votre mission</option>
                <option value="controleur" {{ old('mission') == 'controleur' ? 'selected' : '' }}>Contrôleur</option>
                <option value="analyste" {{ old('mission') == 'analyste' ? 'selected' : '' }}>Analyste</option>
            </select>
            <label for="mission">Mission</label>
            @error('mission')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="sexe">Sexe:</label>
            <div class="form-check">
                <input type="radio" id="homme" name="sexe" value="homme" class="form-check-input" {{ old('sexe') == 'homme' ? 'checked' : '' }}>
                <label for="homme" class="form-check-label">Homme</label>
            </div>
            <div class="form-check">
                <input type="radio" id="femme" name="sexe" value="femme" class="form-check-input" {{ old('sexe') == 'femme' ? 'checked' : '' }}>
                <label for="femme" class="form-check-label">femme</label>
            </div>
            @error('sexe')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <button type="submit" class="btn btn-primary">S'inscrire</button><br>
        <p>Vous avez déjà un compte? <a href="{{route('authentification')}}">Connexion</a></p>

</body>

</html>