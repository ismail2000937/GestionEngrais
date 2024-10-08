<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $request->route('token') }}">
    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ $request->email ?? old('email') }}" required autofocus>
    </div>
    <div>
        <label for="password">Nouveau mot de passe</label>
        <input id="password" type="password" name="password" required>
    </div>
    <div>
        <label for="password_confirmation">Confirmer le nouveau mot de passe</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
</div>
<div>
<button type="submit">Réinitialiser le mot de passe</button>
</div>

</form>