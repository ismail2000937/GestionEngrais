<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PN;
use App\Models\sag;
use App\Models\d03;
use App\Models\d05;
use App\Models\d10;
use App\Models\d09;
use App\Models\r02;
use App\Models\Titre;
use App\Models\Acide;
use App\Models\Moy_acide;
use App\Models\Granulometre;
use App\Models\Moyenne;

class ControllerProduit extends Controller
{
    public function ajouter_produits()
    {
        return view('ajouter.ajouter_produit');
    }
    public function tableau_heure(Request $request)
    {

        $pn = new PN;
        $pn->pn_rm = $request->input('pn_rm');
        $pn->pn_densite = $request->input('pn_densite');
        $pn->heure = session('heure');
        $pn->saiseur = session('saiseur');
        $pn->id_produit = session('id_produit');

        $sag = new Sag;
        $sag->sag_rm = $request->input('sag_rm');
        $sag->heure = session('heure');
        $sag->saiseur = session('saiseur');
        $sag->id_produit = session('id_produit');

        $d03 = new d03;
        $d03->d03_rm = $request->input('d03_rm');
        $d03->d03_densite = $request->input('d03_densite');
        $d03->heure = session('heure');
        $d03->saiseur = session('saiseur');
        $d03->id_produit = session('id_produit');

        $d05 = new d05;
        $d05->d05_rm = $request->input('d05_rm');
        $d05->d05_densite = $request->input('d05_densite');
        $d05->heure = session('heure');
        $d05->saiseur = session('saiseur');
        $d05->id_produit = session('id_produit');

        $d09 = new d09;
        $d09->d09_rm = $request->input('d09_rm');
        $d09->d09_densite = $request->input('d09_densite');
        $d09->heure = session('heure');
        $d09->saiseur = session('saiseur');
        $d09->id_produit = session('id_produit');

        $d10 = new d10;
        $d10->d10_ph = $request->input('d10_ph');
        $d10->heure = session('heure');
        $d10->saiseur = session('saiseur');
        $d10->id_produit = session('id_produit');

        $r02 = new r02;
        $r02->r02_rm = $request->input('r02_rm');
        $r02->r02_densite = $request->input('r02_densite');
        $r02->heure = session('heure');
        $r02->saiseur = session('saiseur');
        $r02->id_produit = session('id_produit');

        $granulometre = new Granulometre;
        $granulometre->sup_5 = $request->input('sup_5');
        $granulometre->sup_4_75 = $request->input('sup_4_75');
        $granulometre->sup_4 = $request->input('sup_4');
        $granulometre->sup_3_15 = $request->input('sup_3_15');
        $granulometre->sup_2_5 = $request->input('sup_2_5');
        $granulometre->sup_2 = $request->input('sup_2');
        $granulometre->sup_1 = $request->input('sup_1');
        $granulometre->heure = session('heure');
        $granulometre->saiseur = session('saiseur');
        $granulometre->id_produit = session('id_produit');

        $titre = new Titre;
        $titre->ammonical = $request->input('ammonical');
        $titre->p2o5 = $request->input('p2o5');
        $titre->h2o = $request->input('h2o');
        $titre->zn = $request->input('zn');
        $titre->s = $request->input('s');
        $titre->cd = $request->input('cd');
        $titre->p2o5_tot = $request->input('p2o5_tot');
        $titre->temperature = $request->input('temperature');
        $titre->heure = session('heure');
        $titre->saiseur = session('saiseur');
        $titre->id_produit = session('id_produit');

        $all_fields_filled = true;

        foreach ($request->all() as $key => $value) {
            $trimmed_value = trim($value);



            if (!isset($trimmed_value) || $trimmed_value === '') {


                $all_fields_filled = false;
                break;
            }
        }

        if ($all_fields_filled) {
            $pn->save();
            $sag->save();
            $d03->save();
            $d05->save();
            $d09->save();
            $d10->save();
            $r02->save();
            $granulometre->save();
            $titre->save();

            $heure = session('heure');
            if ($heure === 24) {
                $heure = 1;
            } else if ($heure === 6) {

                $moyenne = Moyenne::where('id_produit', session('id_produit'))->first();
                $acide = Acide::where('id_produit', session('id_produit'))->first();
                if ($moyenne && $acide) {
                    $moyenneacide = Moy_acide::where('id_acide', $acide->id_acide)->first();
                    if ($moyenneacide) {
                        return view('ajouter.ajouter_ligne');
                    } else {
                        return view('ajouter.MoyenneAcide');
                    }
                } else if ($moyenne) {
                    return view('Acide');
                } else {
                    return view('ajouter.ajouter_moyenne');
                }
            } else {
                $heure++;
            }
            session(['heure' => $heure]);
            return view('ajouter.ajouter_produit');
        } else {
            return redirect()->route('ajouter_tableau')->withInput($request->all())->withErrors(['champs_requis' => 'Tous les champs doivent être remplis.']);
        }
    }
    public function ajouter_moyenne()
    {
        return view('ajouter.ajouter_moyenne');
    }
    public function ajouter_moy(Request $request)
    {

        $moynne = new Moyenne;
        $moynne->ammonical = $request->input('ammonical');
        $moynne->p2o5 = $request->input('p2o5');
        $moynne->p2o5_tot = $request->input('p2o5_tot');
        $moynne->p2o5_SE_C = $request->input('p2o5_SE_C');
        $moynne->h2o = $request->input('h2o');
        $moynne->zn = $request->input('zn');
        $moynne->s = $request->input('s');
        $moynne->sup_5 = $request->input('sup_5');
        $moynne->sup_4_75 = $request->input('sup_4_75');
        $moynne->sup_4 = $request->input('sup_4');
        $moynne->sup_3_15 = $request->input('sup_3_15');
        $moynne->sup_2_5 = $request->input('sup_2_5');
        $moynne->sup_2 = $request->input('sup_2');
        $moynne->sup_1 = $request->input('sup_1');
        $moynne->date_saisi = session('date_saisi');
        $moynne->saiseur = session('saiseur');
        $moynne->id_produit = session('id_produit');

        $all_fields_filled = true;

        foreach ($request->all() as $key => $value) {
            $trimmed_value = trim($value);



            if (!isset($trimmed_value) || $trimmed_value === '') {


                $all_fields_filled = false;
                break;
            }
        }
        // Recherche de la ligne dans la table de lignes
        $line = Moyenne::where('id_produit', session('id_produit'))
            ->first();

        if ($all_fields_filled && !$line) {
            $moynne->save();
            return view('ajouter.ajouter_ligne');
        } else {
            if ($line) {
                $message = "Moyenne de cette date est deja existe.";
            } else {
                $message = "Tous les champs doivent être remplis.";
            }
            return redirect()->back()->withInput($request->all())->withErrors(['champs_requis' => $message]);
        }
    }
}
