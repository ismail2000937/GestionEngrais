@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/style_inscription.css">

    <div class="log">

        <h1>Reset Password</h1>
        <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-floating mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            <label for="email">Email Address:</label>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>

                <div class="form-floating mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password">
                        <label for="password" >Password:</label>

                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>

                <div class="form-floating mb-3">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                    <label for="password-confirm">password confirm:</label>
                    @error('password-confirm')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
@endsection
