<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user(); // Récupérer l'utilisateur authentifié

        $saiseur=$user->nom.' '.$user->prenom;
            session([
                'saiseur' => $saiseur,
           ]);

        if ($user->mission === 'analyste') {
            return view('accueil_analyst');
        } else {
            return view('accueil_controleur');
        }
    }
}