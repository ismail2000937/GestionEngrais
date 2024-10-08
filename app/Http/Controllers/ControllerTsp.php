<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Bouille;
use App\Models\d03;
use App\Models\d05;
use App\Models\d09;
use App\Models\d10;
use App\Models\GranulometreTsp;
use App\Models\TitreTsp;
use App\models\SortieGranul;
use App\models\MoyenneTsp;
use App\models\Moyenne;
use App\models\Moy_acide;
use App\models\Acide;
use App\Models\PN;
use App\Models\r02;
use App\Models\Sag;
use App\Models\Titre;
use App\Models\Granulometre;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ControllerTsp extends Controller
{
    //ajouter moyenne et produit tsp
    public function ajouter_tsp()
    {
        return view('ajouter.ajouter_produit_tsp');
    }
    public function ajouter_tsp_produit(Request $request)
    {

        $bouile = new Bouille;
        $bouile->densite = $request->input('densite');
        $bouile->AL_B = $request->input('AL_B');
        $bouile->P2O5_SE_B = $request->input('P2O5_SE_B');
        $bouile->heure = session('heure');
        $bouile->saiseur = session('saiseur');
        $bouile->id_tsp = session('id_tsp');

        $sortiegranul = new SortieGranul;
        $sortiegranul->AL = $request->input('AL');
        $sortiegranul->P2O5_SE = $request->input('P2O5_SE');
        $sortiegranul->H2O = $request->input('H2O');
        $sortiegranul->heure = session('heure');
        $sortiegranul->saiseur = session('saiseur');
        $sortiegranul->id_tsp = session('id_tsp');


        $titretsp = new TitreTsp;
        $titretsp->H2O = $request->input('H2O');
        $titretsp->AL_T = $request->input('AL_T');
        $titretsp->P2O5_SE_T = $request->input('P2O5_SE_T');
        $titretsp->P2O5_SE_CIT = $request->input('P2O5_SE_CIT');
        $titretsp->TOT = $request->input('TOT');
        $titretsp->h2O_T = $request->input('h2O_T');
        $titretsp->H2O_B = $request->input('H2O_B');
        $titretsp->heure = session('heure');
        $titretsp->saiseur = session('saiseur');
        $titretsp->id_tsp = session('id_tsp');

        $granulometrestsp = new GranulometreTsp;
        $granulometrestsp->sup_6_3 = $request->input('sup_6_3');
        $granulometrestsp->sup_5 = $request->input('sup_5');
        $granulometrestsp->sup_4 = $request->input('sup_4');
        $granulometrestsp->sup_3_15 = $request->input('sup_3_15');
        $granulometrestsp->sup_2_5 = $request->input('sup_2_5');
        $granulometrestsp->sup_2 = $request->input('sup_2');
        $granulometrestsp->sup_1 = $request->input('sup_1');
        $granulometrestsp->heure = session('heure');
        $granulometrestsp->saiseur = session('saiseur');
        $granulometrestsp->id_tsp = session('id_tsp');

        $all_fields_filled = true;

        foreach ($request->all() as $key => $value) {
            $trimmed_value = trim($value);



            if (!isset($trimmed_value) || $trimmed_value === '') {


                $all_fields_filled = false;
                break;
            }
        }

        if ($all_fields_filled) {
            $bouile->save();
            $sortiegranul->save();
            $titretsp->save();
            $granulometrestsp->save();

            $heure = session('heure');
            if ($heure === 24) {
                $heure = 1;
            } else if ($heure === 6) {
                $moyenne = MoyenneTsp::where('id_tsp', session('id_tsp'))->first();
                $acide = Acide::where('id_tsp', session('id_tsp'))->first();
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
                }            } else {
                $heure++;
            }
            session(['heure' => $heure]);
            return view('ajouter.ajouter_produit_tsp');
        } else {
            return redirect()->route('ajouter.ajouter_tsp_produit')->withInput($request->all())->withErrors(['champs_requis' => 'tous les champs doivent etre  rempli .']);
        }
    }
    public function ajouter_moyenne_tsp()
    {
        return view('ajouter.ajouter_moyenne_tsp');
    }
    public function ajouter_moy_tsp(Request $request)
    {

        $moyenne_tsp = new MoyenneTsp;
        $moyenne_tsp->AL = $request->input('AL');
        $moyenne_tsp->P2O5_SE = $request->input('P2O5_SE');
        $moyenne_tsp->p2O5_SE_C = $request->input('p2O5_SE_C');
        $moyenne_tsp->TOT = $request->input('TOT');
        $moyenne_tsp->H2O_T = $request->input('H2O_T');
        $moyenne_tsp->H2O_B = $request->input('H2O_B');
        $moyenne_tsp->sup_6_3 = $request->input('sup_6_3');
        $moyenne_tsp->sup_5 = $request->input('sup_5');
        $moyenne_tsp->sup_4 = $request->input('sup_4');
        $moyenne_tsp->sup_3_15 = $request->input('sup_3_15');
        $moyenne_tsp->sup_2_5 = $request->input('sup_2_5');
        $moyenne_tsp->sup_2 = $request->input('sup_2');
        $moyenne_tsp->sup_1 = $request->input('sup_1');
        $moyenne_tsp->date_saisi = session('date_saisi');
        $moyenne_tsp->saiseur = session('saiseur');
        $moyenne_tsp->id_tsp = session('id_tsp');

        $all_fields_filled = true;

        foreach ($request->all() as $key => $value) {
            $trimmed_value = trim($value);



            if (!isset($trimmed_value) || $trimmed_value === '') {


                $all_fields_filled = false;
                break;
            }
        }
        // Recherche de la ligne dans la table de lignes
        $moytsp = MoyenneTsp::where('id_tsp', session('id_tsp'))
            ->first();

        if ($all_fields_filled && !$moytsp) {
            $moyenne_tsp->save();
            return view('ajouter.ajouter_ligne');
        } else {
            if ($moytsp) {
                $message = "Moyenne de cette date est deja existe.";
            } else {
                $message = "Tous les champs doivent être remplis.";
            }
            return redirect()->back()->withInput($request->all())->withErrors(['champs_requis' => $message]);
        }
    }

    //delete

    //delete moyenne tsp  
    public function deletemoyennetsp($id)
    {
        $entry = MoyenneTsp::find($id);
        $entry->delete();
        return redirect()->back()->with('success', 'L\'opération a été effectuée avec succès.');
    }
    //delete moyennes
    public function deletemoyenne($id)
    {
        $entry = Moyenne::findOrFail($id);
        $entry->delete();
        return redirect()->back()->with('success', 'L\'opération a été effectuée avec succès.');
    }
    //delete moyennes acides
    public function deletemoyacide($id)
    {
        $entry = Moy_acide::findOrFail($id);
        $entry->delete();
        return redirect()->back()->with('success', 'L\'opération a été effectuée avec succès.');
    }
    //delete tsp
    public function deletetsp(Request $request)
    {
        $id_boui = $request->input('id_bouillie');
        $id_sortie = $request->input('id_sortie');
        $id_tit = $request->input('id_titsp');
        $id_Granulo = $request->input('id_grantsp');

        // Supprimer les entrées correspondantes dans la base de données
        Bouille::findOrFail($id_boui)->delete();
        SortieGranul::findOrFail($id_sortie)->delete();
        TitreTsp::findOrFail($id_tit)->delete();
        GranulometreTsp::findOrFail($id_Granulo)->delete();

        return redirect()->back()->with('success', 'L\'opération a été effectuée avec succès.');
    }
    //delete produit
    public function deleteproduit(Request $request)
    {
        $id_pn = $request->input('id_pn');
        $id_sag = $request->input('id_sag');
        $id_r02 = $request->input('id_r02');
        $id_d03 = $request->input('id_d03');
        $id_d05 = $request->input('id_d05');
        $id_d09 = $request->input('id_d09');
        $id_d10 = $request->input('id_d10');
        $id_titre = $request->input('id_titre');
        $id_gran = $request->input('id_gran');

        // Supprimer les entrées correspondantes dans la base de données
        PN::findOrFail($id_pn)->delete();
        Sag::findOrFail($id_sag)->delete();
        r02::findOrFail($id_r02)->delete();
        d03::findOrFail($id_d03)->delete();
        d05::findOrFail($id_d05)->delete();
        d09::findOrFail($id_d09)->delete();
        d10::findOrFail($id_d10)->delete();
        Titre::findOrFail($id_titre)->delete();
        Granulometre::findOrFail($id_gran)->delete();

        return redirect()->back()->with('success', 'L\'opération a été effectuée avec succès.');
    }
    //delete produit
    public function deleteacide($id)
    {
        Acide::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'L\'opération a été effectuée avec succès.');
    }
}
