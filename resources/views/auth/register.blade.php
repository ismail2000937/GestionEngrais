@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/style_inscription.css">

    <div class="log">
        <h1>Inscription</h1>

        <form method="POST" action="{{ route('register') }}">

            @csrf

            <div class="form-floating mb-3">
                <input type="text" id="nom" name="nom" value="{{ old('nom') }}"
                    class="form-control @error('nom') is-invalid @enderror">
                <label for="nom">Nom:</label>
                @error('nom')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}"
                    class="form-control @error('prenom') is-invalid @enderror">
                <label for="prenom">Prénom:</label>
                @error('prenom')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror">
                <label for="email">Email:</label>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" autocomplete="new-password">
                <label for="password">Mot de passe:</label>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input id="password_confirmation" type="password"
                    class="form-control @error('Confirm Password') is-invalid @enderror" {{ __('Confirm Password') }}
                    autocomplete="new-password">
                <label for="password_confirmation">Confirmation du mot de passe:</label>
                @error('password_confirmation')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <select name="mission" id="mission" class="form-control @error('mission') is-invalid @enderror">
                    <option value="#">Choisir votre mission</option>
                    <option value="controleur" {{ old('mission') == 'controleur' ? 'selected' : '' }}>
                        Contrôleur</option>
                    <option value="analyste" {{ old('mission') == 'analyste' ? 'selected' : '' }}>Analyste
                    </option>
                </select>
                <label for="mission">Mission</label>
                @error('mission')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="sexe">Sexe:</label>
                <div class="form-check">
                    <input type="radio" id="homme" name="sexe" value="homme" class="form-check-input"
                        {{ old('sexe') == 'homme' ? 'checked' : '' }}>
                    <label for="homme" class="form-check-label">Homme</label>
                </div>
                <div class="form-check">
                    <input type="radio" id="femme" name="sexe" value="femme" class="form-check-input"
                        {{ old('sexe') == 'femme' ? 'checked' : '' }}>
                    <label for="femme" class="form-check-label">femme</label>
                </div>
                @error('sexe')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
