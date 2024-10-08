<?php

namespace App\Http\Controllers;

use App\Models\Controleur;
use Illuminate\Http\Request;
use App\Models\Analyste;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
class ControllerProjet extends Controller
{
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $user = Controleur::where('email', $validatedData['email'])->first();
    
        if (!$user) {
            $user = Analyste::where('email', $validatedData['email'])->first();
        }
    
        if ($user && Hash::check($validatedData['password'], $user->password)) {

            $saiseur=$user->nom.' '.$user->prenom;
            session([
                'saiseur' => $saiseur,
                'heure' => 2
           ]);

            if ($user instanceof Controleur) {
                Auth::loginUsingId($user->id);
                return view('accueil_controleur');
            } else {
                Auth::loginUsingId($user->id);
                return view('accueil_analyst');
            }
        }
    
        return redirect()->back()->withErrors([
            'email' => 'Identifiants invalides',
        ]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'mission' => 'required|in:controleur,analyste',
            'sexe' => 'required|in:homme,femme'
        ], [
            'confirmpassword' => 'Les deux champs de mot de passe ne correspondent pas.'
        ]);
    
        if ($request->input('mission') === 'controleur') {
            $user = new Controleur([
                'nom' => $request->input('nom'),
                'prenom' => $request->input('prenom'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'mission' => $request->input('mission'),
                'sexe' => $request->input('sexe')
            ]);
        } else {
            $user = new Analyste([
                'nom' => $request->input('nom'),
                'prenom' => $request->input('prenom'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'mission' => $request->input('mission'),
                'sexe' => $request->input('sexe')
            ]);
        }
    
        $user->save();
        return view('authentification');
    }
    
    
    

    public function inscription()
    {
        return view('inscription');
    }
    public function authentification()
    {
        return view('authentification');
    }

    
}