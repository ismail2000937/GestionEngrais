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
use App\models\Acide;
use App\Models\PN;
use App\Models\r02;
use App\Models\Sag;
use App\Models\Titre;
use App\Models\Granulometre;
use App\Models\Moy_acide;
class ControllerUpdate extends Controller
{
    //show et update moyennes
    public function show_moyennes(Request $request)
    {
        $id = $request->input('id_moy');
        $data = Moyenne::findOrFail($id);
        return view('update.update_moyennes', ['moyenne' => $data]);
    }

    public function update_moyennes(Request $request, $id)
    {   
        $entry = Moyenne::findOrFail($id);
       
        // Mettez à jour les champs de l'entrée
        $entry->ammonical = $request->input('ammonical');
        $entry->p2o5 = $request->input('p2o5');
        $entry->p2o5_tot = $request->input('p2o5_tot');
        $entry->p2o5_SE_C = $request->input('p2o5_SE_C');
        $entry->h2o = $request->input('h2o');
        $entry->zn = $request->input('zn');
        $entry->s = $request->input('s');
        $entry->sup_5 = $request->input('sup_5');
        $entry->sup_4_75 = $request->input('sup_4_75');
        $entry->sup_4 = $request->input('sup_4');
        $entry->sup_3_15 = $request->input('sup_3_15');
        $entry->sup_2_5 = $request->input('sup_2_5');
        $entry->sup_2 = $request->input('sup_2');
        $entry->sup_1 = $request->input('sup_1');
        $entry->date_saisi = $request->input('date_saisi');
        $entry->saiseur = $request->input('saiseur');
    
        // Sauvegarder les modifications
        $entry->save();
    
        return redirect('/affiche_moyennesproduits')->with('success', 'Moyenne produit mise à jour avec succès.');
    }    

    //show et update moyennes
    public function show_moyennestsp(Request $request)
    {
        $id = $request->input('id_moytsp');
        $data = MoyenneTsp::findOrFail($id);
        return view('update.update_moyennetsp', ['moyennetsp' => $data]);
    }

    public function update_moyennestsp(Request $request, $id)
    {
        $entry = MoyenneTsp::findOrFail($id);
    
        $entry->AL = $request->input('AL');
        $entry->P2O5_SE = $request->input('P2O5_SE');
        $entry->p2O5_SE_C = $request->input('p2O5_SE_C');
        $entry->TOT = $request->input('TOT');
        $entry->H2O_T = $request->input('H2O_T');
        $entry->H2O_B = $request->input('H2O_B');
        $entry->sup_6_3 = $request->input('sup_6_3');
        $entry->sup_5 = $request->input('sup_5');
        $entry->sup_4 = $request->input('sup_4');
        $entry->sup_3_15 = $request->input('sup_3_15');
        $entry->sup_2_5 = $request->input('sup_2_5');
        $entry->sup_2 = $request->input('sup_2');
        $entry->sup_1 = $request->input('sup_1');
        $entry->date_saisi = $request->input('date_saisi');
        $entry->saiseur = $request->input('saiseur');
    
        $validatedData = $request->validate([
            'AL' => 'required',
            'P2O5_SE' => 'required',
            'p2O5_SE_C' => 'required',
            'TOT' => 'required',
            'H2O_T' => 'required',
            'H2O_B' => 'required',
            'sup_6_3' => 'required',
            'sup_5' => 'required',
            'sup_4' => 'required',
            'sup_3_15' => 'required',
            'sup_2_5' => 'required',
            'sup_2' => 'required',
            'sup_1' => 'required',
        ]);
    
        $entry->update($validatedData);
    
        return redirect('/affiche_moyennestsp')->with('success', 'Moyenne updated successfully.');
    }
    
    //show and update tsp
    public function show_produittsp(Request $request)
    {
        $id_bouillie = $request->input('id_bouillie');
        $id_sortie = $request->input('id_sortie');
        $id_titsp = $request->input('id_titsp');
        $id_grantsp = $request->input('id_grantsp');

        $bouille = Bouille::findOrFail($id_bouillie);
        $sortieGranul = SortieGranul::findOrFail($id_sortie);
        $titreTsp = TitreTSP::findOrFail($id_titsp);
        $granulometreTsp = GranulometreTsp::findOrFail($id_grantsp);

        return view('update.update_produittsp', [
            'bouille' => $bouille,
            'sortieGranul' => $sortieGranul,
            'titreTsp' => $titreTsp,
            'granulometreTsp' => $granulometreTsp
        ]);
    }


    public function update_tsp(Request $request)
    {
        $id_bouillie = $request->input('id_bouillie');
        $id_sortie = $request->input('id_sortie');
        $id_titsp = $request->input('id_titsp');
        $id_grantsp = $request->input('id_grantsp');

        $bouile = Bouille::findOrFail($id_bouillie);
        $bouile->densite = $request->input('densite');
        $bouile->AL_B = $request->input('AL_B');
        $bouile->P2O5_SE_B = $request->input('P2O5_SE_B');
        $bouile->heure = $request->input('heure');
        $bouile->saiseur = $request->input('saiseur');
        $bouile->id_tsp = $request->input('id_tsp');

        $sortiegranul = SortieGranul::findOrFail($id_sortie);
        $sortiegranul->AL = $request->input('AL');
        $sortiegranul->P2O5_SE = $request->input('P2O5_SE');
        $sortiegranul->H2O = $request->input('H2O');
        $sortiegranul->heure = $request->input('heure');
        $sortiegranul->saiseur = $request->input('saiseur');
        $sortiegranul->id_tsp = $request->input('id_tsp');


        $titretsp = TitreTsp::findOrFail($id_titsp);
        $titretsp->H2O = $request->input('H2O');
        $titretsp->AL_T = $request->input('AL_T');
        $titretsp->P2O5_SE_T = $request->input('P2O5_SE_T');
        $titretsp->P2O5_SE_CIT = $request->input('P2O5_SE_CIT');
        $titretsp->TOT = $request->input('TOT');
        $titretsp->h2O_T = $request->input('h2O_T');
        $titretsp->H2O_B = $request->input('H2O_B');
        $titretsp->heure = $request->input('heure');
        $titretsp->saiseur = $request->input('saiseur');
        $titretsp->id_tsp = $request->input('id_tsp');

        $granulometrestsp = GranulometreTsp::findOrFail($id_grantsp);
        $granulometrestsp->sup_6_3 = $request->input('sup_6_3');
        $granulometrestsp->sup_5 = $request->input('sup_5');
        $granulometrestsp->sup_4 = $request->input('sup_4');
        $granulometrestsp->sup_3_15 = $request->input('sup_3_15');
        $granulometrestsp->sup_2_5 = $request->input('sup_2_5');
        $granulometrestsp->sup_2 = $request->input('sup_2');
        $granulometrestsp->sup_1 = $request->input('sup_1');
        $granulometrestsp->heure = $request->input('heure');
        $granulometrestsp->saiseur = $request->input('saiseur');
        $granulometrestsp->id_tsp = $request->input('id_tsp');

        $bouile->update();
        $sortiegranul->update();
        $titretsp->update();
        $granulometrestsp->update();

        return redirect('/affiche_produitsp')->with('success', 'Produit updated successfully.');
    }
//view indeterminer


    //update produits
    public function show_produit(Request $request)
    {
        $id_pn = $request->input('id_pn');
        $id_sag = $request->input('id_sag');
        $id_r02 = $request->input('id_r02');
        $id_d03 = $request->input('id_d03');
        $id_d05= $request->input('id_d05');
        $id_d09 = $request->input('id_d09');
        $id_d10 = $request->input('id_d10');
        $id_titre = $request->input('id_titre');
        $id_gran= $request->input('id_gran');

        $pn = PN::findOrFail($id_pn);
        $sag = Sag::findOrFail($id_sag);
        $r02 = r02::findOrFail($id_r02);
        $d03 = d03::findOrFail($id_d03);
        $d05 = d05::findOrFail($id_d05);
        $d09 = d09::findOrFail($id_d09);
        $d10 = d10::findOrFail($id_d10);
        $titre = Titre::findOrFail($id_titre);
        $granulometre = Granulometre::findOrFail($id_gran);

        return view('update.update_produits', [
            'pn' => $pn,
            'sag' => $sag,
            'r02' => $r02,
            'd03' => $d03,
            'd05' => $d05,
            'd09' => $d09,
            'd10' => $d10,
            'titre' => $titre,
            'granulometre' => $granulometre
        ]);
    }


    public function update_produit(Request $request)
    {
        $id_pn = $request->input('id_pn');
        $id_sag = $request->input('id_sag');
        $id_r02 = $request->input('id_r02');
        $id_d03 = $request->input('id_d03');
        $id_d05= $request->input('id_d05');
        $id_d09 = $request->input('id_d09');
        $id_d10 = $request->input('id_d10');
        $id_titre = $request->input('id_titre');
        $id_gran= $request->input('id_gran');

        $pn = pn::findOrFail($id_pn);
        $pn->pn_rm = $request->input('pn_rm');
        $pn->pn_densite = $request->input('pn_densite');
        $pn->heure = $request->input('heure');
        $pn->saiseur = $request->input('saiseur');
        $pn->id_produit = $request->input('id_produit');

        $sag = sag::findOrFail($id_sag);
        $sag->sag_rm = $request->input('sag_rm');    
        $sag->heure = $request->input('heure');
        $sag->saiseur = $request->input('saiseur');
        $sag->id_produit = $request->input('id_produit');

        $d03 = d03::findOrFail($id_d03);
        $d03->d03_rm = $request->input('d03_rm');
        $d03->d03_densite = $request->input('d03_densite');
        $d03->heure = $request->input('heure');
        $d03->saiseur = $request->input('saiseur');
        $d03->id_produit = $request->input('id_produit');

        $d05 = d05::findOrFail($id_d05);
        $d05->d05_rm = $request->input('d05_rm');
        $d05->d05_densite = $request->input('d05_densite');
        $d05->heure = $request->input('heure');
        $d05->saiseur = $request->input('saiseur');
        $d05->id_produit = $request->input('id_produit');

        $d09 = d09::findOrFail($id_d09);
        $d09->d09_rm = $request->input('d09_rm');
        $d09->d09_densite = $request->input('d09_densite');
        $d09->heure = $request->input('heure');
        $d09->saiseur = $request->input('saiseur');
        $d09->id_produit = $request->input('id_produit');

        $d10 = d10::findOrFail($id_d10);
        $d10->d10_ph = $request->input('d10_ph');
        $d10->heure = $request->input('heure');
        $d10->saiseur = $request->input('saiseur');
        $d10->id_produit = $request->input('id_produit');

        $r02 = r02::findOrFail($id_r02);
        $r02->r02_rm = $request->input('r02_rm');
        $r02->r02_densite = $request->input('r02_densite');
        $r02->heure = $request->input('heure');
        $r02->saiseur = $request->input('saiseur');
        $r02->id_produit = $request->input('id_produit');

        $granulometre = granulometre::findOrFail($id_gran);
        $granulometre->sup_5 = $request->input('sup_5');
        $granulometre->sup_4_75 = $request->input('sup_4_75');
        $granulometre->sup_4 = $request->input('sup_4');
        $granulometre->sup_3_15 = $request->input('sup_3_15');
        $granulometre->sup_2_5 = $request->input('sup_2_5');
        $granulometre->sup_2 = $request->input('sup_2');
        $granulometre->sup_1 = $request->input('sup_1');
        $granulometre->heure = $request->input('heure');
        $granulometre->saiseur = $request->input('saiseur');
        $granulometre->id_produit = $request->input('id_produit');

        $titre = titre::findOrFail($id_titre);
        $titre->ammonical = $request->input('ammonical');
        $titre->p2o5 = $request->input('p2o5');
        $titre->h2o = $request->input('h2o');
        $titre->zn = $request->input('zn');
        $titre->s = $request->input('s');
        $titre->cd = $request->input('cd');
        $titre->p2o5_tot = $request->input('p2o5_tot');
        $titre->temperature = $request->input('temperature');
        $titre->heure = $request->input('heure');
        $titre->saiseur = $request->input('saiseur');
        $titre->id_produit = $request->input('id_produit');

        $pn->update();
        $sag->update();
        $d03->update();
        $d05->update();
        $d09->update();
        $d10->update();
        $r02->update();
        $granulometre->update();
        $titre->update();

        return redirect('/affiche_produits')->with('success', 'Produit updated successfully.');
    }

    //update acide
    public function show_acide(Request $request)
    {
       
        $id_acide= $request->input('id_acide');

        $acide = Acide::findOrFail($id_acide);

        return view('update.update_acide', [
            'acide' => $acide
        ]);
    }


    public function update_acide(Request $request, $id)
    {
        $acide = Acide::findOrFail($id);
        $acide->Ref_bac = $request->input('Ref_bac');
        $acide->densite = $request->input('densite');
        $acide->temperature = $request->input('temperature');
        $acide->P2O5 = $request->input('P2O5');
        $acide->TS = $request->input('TS');
        $acide->cd = $request->input('cd');
        $acide->SO4 = $request->input('SO4');
        $acide->Mgo = $request->input('Mgo');
        $acide->Zn = $request->input('Zn');
        $acide->heure = $request->input('heure');
        $acide->saiseur = $request->input('saiseur');

        $acide->update();

        return redirect('/affiche_acide')->with('success', 'Acide updated successfully.');
    }

    //update moyenne acide 
    public function show_moyacide(Request $request)
    {
       
        $id_moy= $request->input('id_moy');

        $moyenne = Moy_acide::findOrFail($id_moy);

        return view('update.update_moyenneacide', [
            'moyenne' => $moyenne
        ]);
    }

    public function update_moyacide(Request $request, $id)
    {
        
        $moyenne = Moy_acide::findOrFail($id);
        $moyenne->densite = $request->input('densite');
        $moyenne->Tc = $request->input('Tc');
        $moyenne->P2O5 = $request->input('p2o5');
        $moyenne->TS = $request->input('TS');
        $moyenne->SO4 = $request->input('SO4');
        $moyenne->date_saisi = $request->input('date_saisi');
        $moyenne->saiseur = $request->input('saiseur');

        $moyenne->update();

        return redirect('/affiche_moyenneacide')->with('success', 'Moyenne Acide updated successfully.');
    }
}
