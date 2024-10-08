<?php

namespace App\Http\Controllers;

use App\Models\Bouille;
use Illuminate\Http\Request;
use App\Models\Ligne;
use App\Models\PN;
use App\Models\Produit;
use App\Models\TspsProduit;
use App\Models\Moy_acide;
use App\Models\Acide;
use App\Models\MoyenneTsp;
use App\Models\Moyenne;
use Illuminate\Support\Facades\DB;

class ControllerTableau extends Controller
{
    //ajouter ligne
    public function ajouter_lige()
    {
        return view('ajouter.ajouter_ligne');
    }

    public function ligne(Request $request)
    {
        $ligne = new Ligne;
        $ligne->nom_ligne = $request->input('nom_ligne');
        $ligne->date_production = $request->input('date_production');
        $ligne->nom_produit = $request->input('nom_produit');
        $ligne->qlt = $request->input('qlt');

        session([
            'date_production' => $ligne->date_production,
            'nom_ligne' => $ligne->nom_ligne,
            'nom_produit' => $ligne->nom_produit,
            'qlt' => $ligne->qlt,
            'date_saisi' => $ligne->date_production,
        ]);

        // Recherche de la ligne dans la table de lignes
        $line = Ligne::where('date_production', $ligne->date_production)
            ->where('nom_ligne', $ligne->nom_ligne)
            ->where('nom_produit', $ligne->nom_produit)
            ->where('qlt', $ligne->qlt)
            ->first();

        if ($ligne->nom_produit === 'tsp') {
            if ($line) {
                $id_ligne = $line->id_ligne;

                $tspsproduit = tspsProduit::join('lignes', 'tsps_produits.id_ligne', '=', 'lignes.id_ligne')
                    ->where('lignes.id_ligne', $id_ligne)
                    ->select('tsps_produits.*')
                    ->first();

                $id_tsp = $tspsproduit->id_tsp;

                $bouilles = Bouille::join('tsps_produits', 'bouilles.id_tsp', '=', 'tsps_produits.id_tsp')
                    ->where('bouilles.id_tsp', $id_tsp)
                    ->orderBy('bouilles.created_at', 'DESC')
                    ->first();

                    session([
                        'id_tsp' => $id_tsp,
                    ]);

                    if (isset($bouilles)) {
                        $heure = $bouilles->heure;
                        if ($heure != 24 && $heure != 6) {
                            $heure += 1;
                        } else if ($heure == 24) {
                            $heure = 1;
                        } else if ($heure == 6) {
                            $moyenne = MoyenneTsp::where('id_tsp', $id_tsp)->first();
                            $acide = Acide::where('id_tsp', $id_tsp)->first();
                            if ($moyenne && $acide) {
                                $moyenneacide = Moy_acide::where('id_acide', $acide->id_acide)->first();
                                if ($moyenneacide) {
                                    return view('ajouter.ajouter_ligne');
                                } else {
                                    return view('ajouter.MoyenneAcide');
                                }
                            } else if ($moyenne) {
                                return view('ajouter.Acide');
                            } else {
                                return view('ajouter.ajouter_moyenne_tsp');
                            }
                        }
                    } else {
                        $heure = 7; // Valeur par défaut
                    }                    

                session([
                    'heure' => $heure,
                    'id_pro' => $id_tsp
                ]);

                return view('ajouter.ajouter_produit_tsp');
            } else {
                $ligne->save();
                $id_ligne = $ligne->id;
                $tsp_produit = new tspsProduit;
                $tsp_produit->id_ligne = $id_ligne;
                $tsp_produit->save();

                $id_tsp = $tsp_produit->id;
                session([
                    'id_tsp' => $id_tsp,
                    'id_pro' => $id_tsp,
                    'heure' => 7
                ]);

                return view('ajouter.ajouter_produit_tsp');
            }
        } else {
            if ($line) {
                $id_ligne = $line->id_ligne;
                $produit = Produit::join('lignes', 'produits.id_ligne', '=', 'lignes.id_ligne')
                    ->where('lignes.id_ligne', $id_ligne)
                    ->select('produits.*')
                    ->first();
                $id_produit = $produit->id_produit;

                $pns = PN::join('produits', 'p_n_s.id_produit', '=', 'produits.id_produit')
                    ->where('p_n_s.id_produit', $id_produit)
                    ->orderBy('p_n_s.created_at', 'DESC')
                    ->first();

                    session([
                        'id_produit' => $id_produit,
                    ]);

                if (isset($pns)) {
                    $heure = $pns->heure;
                    if ($heure != 24 && $heure != 6) {
                        $heure = $heure + 1;
                    } else if ($heure == 24) {
                        $heure = 1;
                    } else if ($heure == 6) {

                            $moyenne = Moyenne::where('id_produit', $id_produit)->first();
                            $acide = Acide::where('id_produit', $id_produit)->first();
                            if ($moyenne && $acide) {
                                $moyenneacide = Moy_acide::where('id_acide', $acide->id_acide)->first();
                                if ($moyenneacide) {
                                    return view('ajouter.ajouter_ligne');
                                } else {
                                    return view('ajouter.MoyenneAcide');
                                }
                            } else if ($moyenne) {
                                return view('ajouter.Acide');
                            } else {
                                return view('ajouter.ajouter_moyenne');
                            }
                      
                    } else {
                        $heure = 7; // Valeur par défaut
                    }

                } else {
                    $heure = 7; // Valeur par défaut
                }

                session([
                    'heure' => $heure,
                    'id_pro' => $id_produit
                ]);

                return view('ajouter_produit');
            } else {
                $ligne->save();
                $id_ligne = $ligne->id;
                $produit = new Produit;
                $produit->id_ligne = $id_ligne;
                $produit->save();
                $id_produit = $produit->id;
                session([
                    'id_produit' => $id_produit,
                    'id_pro' => $id_produit,
                    'heure' => 7,
                ]);
                return view('ajouter.ajouter_produit');
            }
        }
    }
    // acide
    //route d'acide
    public function ajouter_acide()
    {
        return view('ajouter.acide');
    }
    // route moyenne acide
    public function ajouter_moyacide()
    {
        return view('ajouter.MoyenneAcide');
    }
    //ajouter acide
    public function ajouter_acid(Request $request)
    {
        $id_tsp = session('id_tsp');
        $existingAcide = Acide::where('id_tsp', $id_tsp)->first();
    
        if ($existingAcide) {
            return redirect()->back()->withErrors(['champs_requis' => 'Acide existe déjà pour cette produit.']);
        }
    
        $acides = new Acide;
        $acides->Ref_bac = $request->input('Ref_bac');
        $acides->nom_produit = session('nom_produit');
        $acides->densite = $request->input('densite');
        $acides->temperature = $request->input('temperature');
        $acides->P2O5 = $request->input('P2O5');
        $acides->TS = $request->input('TS');
        $acides->SO4 = $request->input('SO4');
        $acides->cd = $request->input('cd');
        $acides->Mgo = $request->input('Mgo');
        $acides->Zn = $request->input('Zn');
        $acides->heure = $request->input('heure');
        $acides->saiseur = session('saiseur');
        
        if ($acides->nom_produit === 'tsp') {
            $acides->id_tsp = $id_tsp;
        } else {
            $acides->id_produit = session('id_produit');
        }
    
        $all_fields_filled = true;
    
        foreach ($request->all() as $key => $value) {
            $trimmed_value = trim($value);
    
            if (!isset($trimmed_value) || $trimmed_value === '') {
                $all_fields_filled = false;
                break;
            }
        }
    
        if ($all_fields_filled) {
            $acides->save();
            return view('ajouter.MoyenneAcide');
        } else {
            return redirect()->back()->withInput($request->all())->withErrors(['champs_requis' => 'Tous les champs doivent être remplis.']);
        }
    }
    
    //moyenne acide
    public function ajouter_moyA(Request $request)
    {
        $acide = null;
        $nom_produit = session('nom_produit');

        if ($nom_produit === 'tsp') {
            $acide = Acide::where('id_tsp', session('id_tsp'))->first();
        } else {
            $acide = Acide::where('id_produit', session('id_produit'))->first();
        }

        if (!$acide) {
            return redirect()->back()->withInput($request->all())->withErrors(['champs_requis' => 'tu dois remplir les champs du acide en premier temps.']);
        }

        $all_fields_filled = true;

        foreach ($request->all() as $key => $value) {
            $trimmed_value = trim($value);



            if (!isset($trimmed_value) || $trimmed_value === '') {


                $all_fields_filled = false;
                break;
            }
        }

        if (!$all_fields_filled) {
            return redirect()->back()->withInput($request->all())->withErrors(['champs_requis' => 'tous les champs doivent être remplis.']);
        }

        $id_acide = $acide->id_acide;

        $moy_acides = new Moy_acide;
        $moy_acides->densite = $request->input('densite');
        $moy_acides->Tc = $request->input('Tc');
        $moy_acides->p2o5 = $request->input('p2o5');
        $moy_acides->TS = $request->input('TS');
        $moy_acides->SO4 = $request->input('SO4');
        $moy_acides->date_saisi = session('date_saisi');
        $moy_acides->saiseur = session('saiseur');
        $moy_acides->id_acide = $id_acide; // Assigner la clé étrangère

        $moy_acides->save();

        return view('ajouter.Ajouter_ligne');
    }


    //afficher moyenne produit
    public function AfficherAcides()
    {
        $resultatacides = [];

        $produits = DB::table('produits')->get();
        $tsps_produits = DB::table('tsps_produits')->get();

        foreach ($produits as $produit) {
            $id_ligne = $produit->id_ligne;
            $ligne = DB::table('lignes')->where('id_ligne', $id_ligne)->first();

            $id_produit = $produit->id_produit;
            $acide_produit = DB::table('acides')->where('id_produit', $id_produit)->first();

            if ($acide_produit) {
                $resultatacide_produit = [
                    'nom_ligne' => $ligne->nom_ligne,
                    'nom_produit' => $acide_produit->nom_produit,
                    'qlt' => $ligne->qlt,
                    'date_saisi' => $ligne->date_production,
                    'heure' => $acide_produit->heure,
                    'Ref_bac' => $acide_produit->Ref_bac,
                    'densite' => $acide_produit->densite,
                    'temperature' => $acide_produit->temperature,
                    'P2O5' => $acide_produit->P2O5,
                    'TS'    => $acide_produit->TS,
                    'SO4' => $acide_produit->SO4,
                    'cd' => $acide_produit->cd,
                    'Mgo' => $acide_produit->Mgo,
                    'Zn' => $acide_produit->Zn,
                    'saiseur' => $acide_produit->saiseur,
                    'id_acide' => $acide_produit->id_acide,

                ];

                $resultatacides[] = $resultatacide_produit;
            }
        }

        foreach ($tsps_produits as $tsps_produit) {
            $id_ligne = $tsps_produit->id_ligne;
            $ligne = DB::table('lignes')->where('id_ligne', $id_ligne)->first();

            $id_tsp = $tsps_produit->id_tsp;
            $acide_tsp = DB::table('acides')->where('id_tsp', $id_tsp)->first();

            if ($acide_tsp) {
                $resultatacide_tsp = [
                    'nom_ligne' => $ligne->nom_ligne,
                    'nom_produit' => $acide_tsp->nom_produit,
                    'qlt' => $ligne->qlt,
                    'date_saisi' => $ligne->date_production,
                    'heure' => $acide_tsp->heure,
                    'Ref_bac' => $acide_tsp->Ref_bac,
                    'densite' => $acide_tsp->densite,
                    'temperature' => $acide_tsp->temperature,
                    'P2O5' => $acide_tsp->P2O5,
                    'TS'    => $acide_tsp->TS,
                    'SO4' => $acide_tsp->SO4,
                    'cd' => $acide_tsp->cd,
                    'Mgo' => $acide_tsp->Mgo,
                    'Zn' => $acide_tsp->Zn,
                    'saiseur' => $acide_tsp->saiseur,
                    'id_acide' => $acide_tsp->id_acide,
                ];

                $resultatacides[] = $resultatacide_tsp;
            }
        }

        return $resultatacides;
    }
    //analyste
    public function AfficherAcide()
    {

        $resultatacides = $this->AfficherAcides();
        return view('affiche.affiche_acide', ['resultatacides' => $resultatacides]);
    }
    //controleur
    public function AfficherAcidecont()
    {

        $resultatacides = $this->AfficherAcides();
        return view('controleur.cont_acide', ['resultatacides' => $resultatacides]);
    }

    //afficher moyenne produit
    public function AfficherMoyacides()
    {
        $resultatmoyennes = [];
    
        $produits = DB::table('produits')->get();
        $tsps_produits = DB::table('tsps_produits')->get();
    
        foreach ($produits as $produit) {
            $id_ligne = $produit->id_ligne;
            $ligne = DB::table('lignes')->where('id_ligne', $id_ligne)->first();
    
            $id_produit = $produit->id_produit;
            $acide_produit = DB::table('acides')->where('id_produit', $id_produit)->first();
    
            if ($acide_produit) {
                $id_acide_produit = $acide_produit->id_acide;
                $moy_acides_produit = DB::table('moy_acides')->where('id_acide', $id_acide_produit)->first();
    
                if ($moy_acides_produit) {
                    $resultatmoyenne_produit = [
                        'nom_ligne' => $ligne->nom_ligne,
                        'nom_produit' => $ligne->nom_produit,
                        'qlt' => $ligne->qlt,
                        'date_saisi' => $ligne->date_production,
                        'densite' => $moy_acides_produit->densite,
                        'Tc' => $moy_acides_produit->Tc,
                        'p2o5' => $moy_acides_produit->p2o5,
                        'TS' => $moy_acides_produit->TS,
                        'SO4' => $moy_acides_produit->SO4,
                        'saiseur' => $moy_acides_produit->saiseur,
                        'id_moy' => $moy_acides_produit->id_moy,
                        'id_acide' => $id_acide_produit,
                    ];
    
                    $resultatmoyennes[] = $resultatmoyenne_produit;
                }
            }
        }
    
        foreach ($tsps_produits as $tsps_produit) {
            $id_ligne_tsp = $tsps_produit->id_ligne;
            $ligne_tsp = DB::table('lignes')->where('id_ligne', $id_ligne_tsp)->first();
    
            $id_tsp = $tsps_produit->id_tsp;
            $acide_tsp = DB::table('acides')->where('id_tsp', $id_tsp)->first();
    
            if ($acide_tsp) {
                $id_acide_tsp = $acide_tsp->id_acide;
                $moy_acides_tsp = DB::table('moy_acides')->where('id_acide', $id_acide_tsp)->first();
    
                if ($moy_acides_tsp) {
                    $resultatmoyenne_tsp = [
                        'nom_ligne' => $ligne_tsp->nom_ligne,
                        'nom_produit' => $ligne_tsp->nom_produit,
                        'qlt' => $ligne_tsp->qlt,
                        'date_saisi' => $ligne_tsp->date_production,
                        'densite' => $moy_acides_tsp->densite,
                        'Tc' => $moy_acides_tsp->Tc,
                        'p2o5' => $moy_acides_tsp->p2o5,
                        'TS' => $moy_acides_tsp->TS,
                        'SO4' => $moy_acides_tsp->SO4,
                        'saiseur' => $moy_acides_tsp->saiseur,
                        'id_moy' => $moy_acides_tsp->id_moy,
                        'id_acide' => $id_acide_tsp,
                    ];
    
                    $resultatmoyennes[] = $resultatmoyenne_tsp;
                }
            }
        }
    
        return $resultatmoyennes;
    }
    
    //analyste
    public function AfficherMoyacide()
    {

        $resultatmoyennes = $this->AfficherMoyacides();

        return view('affiche.affiche_moyenneacide', ['resultatmoyennes' => $resultatmoyennes]);
    }
    //controleur
    public function AfficherMoyacidecont()
    {

        $resultatmoyennes = $this->AfficherMoyacides();

        return view('controleur.cont_moyenneacide', ['resultatmoyennes' => $resultatmoyennes]);
    }
}
