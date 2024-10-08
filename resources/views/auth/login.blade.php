@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/style_inscription.css">

    <div class="log">
        <h1 class="text-center mb-4">Connexion</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-floating mb-3">
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror">
                <label for="email">Email:</label>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="password" id="password" name="password" value="{{ old('password') }}"
                    class="form-control @error('password') is-invalid @enderror">
                <label for="password">Password:</label>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="row mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
            <div class="form-floating mb-3">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>

            <div class="form-floating mb-3">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                </div>
            </div>
        </form>
    </div>
    </div>
    </div>
    </div>
@endsection
