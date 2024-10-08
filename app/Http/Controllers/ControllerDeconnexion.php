<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ControllerDeconnexion extends Controller
{
    public function logout(Request $request) {
        Auth::logout(); // Déconnecte l'utilisateur actuel
        $request->session()->invalidate(); // Efface la session
        $request->session()->regenerateToken(); // Génère un nouveau jeton CSRF
        return view('welcome'); // Redirige vers la page de connexion
    }
    
}
