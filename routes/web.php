<?php

use App\Http\Controllers\ControllerAffichage;
use App\Http\Controllers\ControllerDeconnexion;
use App\Http\Controllers\ControllerProduit;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerTableau;
use App\Http\Controllers\ControllerTsp;
use App\Http\Controllers\ControllerUpdate;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Authentifier;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/ajouter_ligne', [ControllerTableau::class, 'ajouter_lige'])->name('ajouter_lign');
    Route::post('/ajouter_produits', [ControllerTableau::class, 'ligne'])->name('ajouter_heure');


    Route::get('/ajouter_produit', [ControllerProduit::class, 'ajouter_produits'])->name('ajouter_tableau1');
    Route::post('/ajouter_produit', [ControllerProduit::class, 'tableau_heure'])->name('ajouter_tableau');

    Route::get('/ajouter_moyenne', [ControllerProduit::class, 'ajouter_moyenne'])->name('ajouter_moyenne');
    Route::post('/ajouter_moyenne', [ControllerProduit::class, 'ajouter_moy'])->name('ajouter_moy');


    Route::get('/ajouter_moyenne_tsp', [ControllerTsp::class, 'ajouter_moyenne_tsp'])->name('ajouter_moyenne_tsp');
    Route::post('/ajouter_moyenne_tsp', [ControllerTsp::class, 'ajouter_moy_tsp'])->name('ajouter_moyenne_tsp1');


    Route::get('/ajouter_produit_tsp', [ControllerTsp::class, 'ajouter_tsp'])->name('ajouter_tsp');
    Route::post('/ajouter_produit_tsp', [ControllerTsp::class, 'ajouter_tsp_produit'])->name('ajouter_tsp_produit');


    Route::get('/accueil_analyst', [ControllerAffichage::class, 'accueill'])->name('accueil_analyste');
    Route::get('/affiche_produitsp', [ControllerAffichage::class, 'recupererDonneestsp'])->name('toutes-heurestsp');

    Route::get('/affiche_produits', [ControllerAffichage::class, 'recupererDonneesproduit'])->name('toutes-heuresproduit');
    Route::get('/affiche_moyennestsp', [ControllerAffichage::class, 'getResultatsmoyennetsp'])->name('toutes-moyennestsp');
    Route::get('/affiche_moyennesproduits', [ControllerAffichage::class, 'getResultatsmoyenneproduit'])->name('toutes-moyennes');

    Route::get('/visualisation', [ControllerAffichage::class, 'chart'])->name('chart');
    Route::get('/visualisationTsp', [ControllerAffichage::class, 'chartTsp'])->name('chartTsp');



    Route::get('/accueil_controleur', [ControllerAffichage::class, 'accueil_contro'])->name('accueil_controleur');
    Route::get('/cont_produittsp', [ControllerAffichage::class, 'recupererDonneestspcont'])->name('toutes-heurestspcont');
    Route::get('/cont_produits', [ControllerAffichage::class, 'recupererDonneesproduitcont'])->name('toutes-heuresproduitcont');
    Route::get('/cont_moyennestsp', [ControllerAffichage::class, 'getResultatsmoyennetspcont'])->name('toutes-moyennestspcont');
    Route::get('/cont_moyennes', [ControllerAffichage::class, 'getResultatsmoyenneproduitcont'])->name('toutes-moyennescont');

    Route::get('/visualisationcont', [ControllerAffichage::class, 'chartcont'])->name('chartcont');
    Route::get('/visualisationTspcont', [ControllerAffichage::class, 'chartTspcont'])->name('chartTspcont');
    Route::get('/visualisation_acide', [ControllerAffichage::class, 'chartacide'])->name('chartacide');
    Route::get('/visualisation_acidecont', [ControllerAffichage::class, 'chartacidecont'])->name('chartacidecont');

    //delete
    //delete moyenne tsp 
    Route::delete('/affiche_moyennestsp/{id}', [ControllerTsp::class, 'deletemoyennetsp'])->name('delete_resultattsp');
    //delete moyenne produit
    Route::delete('/affiche_moyennesproduits/{id}', [ControllerTsp::class, 'deletemoyenne'])->name('delete_resultatproduit');
    //delete tsp 
    Route::delete('/affiche_produittsps', [ControllerTsp::class, 'deletetsp'])->name('delete_produittsp');
    //delete  produit
    Route::delete('/affiche_produits', [ControllerTsp::class, 'deleteproduit'])->name('delete_produit');
    //delete acide
    Route::delete('/affiche_acide/{id}', [ControllerTsp::class, 'deleteacide'])->name('delete_resultatacide');
    //delete moyenne
    Route::delete('/affiche_moyenneacide/{id}', [ControllerTsp::class, 'deletemoyacide'])->name('delete_resultatmoyenne');

    //update
    //update tsp
    Route::post('/update_produittsp', [ControllerUpdate::class, 'show_produittsp'])->name('update_produit_tsp');
    Route::post('/affiche_produitsp', [ControllerUpdate::class, 'update_tsp'])->name('update_produit_tsps');
    //update produit
    Route::post('/update_produits', [ControllerUpdate::class, 'show_produit'])->name('update_produit');
    Route::post('/affiche_produits', [ControllerUpdate::class, 'update_produit'])->name('update_produits');
    //update moyennestsp
    Route::post('/update_moyennetsp', [ControllerUpdate::class, 'show_moyennestsp'])->name('update_moyennestsp');
    Route::put('/affiche_moyennestsp/{id}', [ControllerUpdate::class, 'update_moyennestsp'])->name('update_moyennetsp');
    //update moyennes
    Route::post('/update_moyennes', [ControllerUpdate::class, 'show_moyennes'])->name('update_moyenne');
    Route::put('/affiche_moyennesproduit/{id}', [ControllerUpdate::class, 'update_moyennes'])->name('update_moy');

    //ajout de l'acide et leur moyenne 
    //analyste acide route
    Route::get('/acide', [ControllerTableau::class, 'ajouter_acide'])->name('ajouter_acide');
    //analyste acide ajouter
    Route::post('/acide', [ControllerTableau::class, 'ajouter_acid'])->name('ajouter_acid');
    //analyste moyenne acide route
    Route::get('/MoyenneAcide', [ControllerTableau::class, 'ajouter_moyacide'])->name('ajouter_moyacide');
    //analyste moyenne acide ajouter
    Route::post('/MoyenneAcide', [ControllerTableau::class, 'ajouter_moyA'])->name('ajouter_moyA');
    //affiche de l'acide et leur moyenne 
    //analyste acide
    Route::get('/affiche_acide', [ControllerTableau::class, 'AfficherAcide'])->name('AfficherAcide');
    //controleur acide
    Route::get('/cont_acide', [ControllerTableau::class, 'AfficherAcidecont'])->name('AfficherAcidecont');
    //analyste moyenne
    Route::get('/affiche_moyenneacide', [ControllerTableau::class, 'AfficherMoyacide'])->name('AfficherMoyacide');
    //controleur moyenne
    Route::get('/cont_moyenneacide', [ControllerTableau::class, 'AfficherMoyacidecont'])->name('AfficherMoyacidecont');


    //update acide
    Route::post('/update_acide', [ControllerUpdate::class, 'show_acide'])->name('update_acide');
    Route::put('/affiche_acide/{id}', [ControllerUpdate::class, 'update_acide'])->name('update_acides');
    //update moyenne acide
    Route::post('/update_moyenneacide', [ControllerUpdate::class, 'show_moyacide'])->name('update_moyenneacide');
    Route::put('/affiche_moyenneacide/{id}', [ControllerUpdate::class, 'update_moyacide'])->name('update_moyacide');
});

Route::get('/welcome', [ControllerDeconnexion::class, 'logout'])->name('log_out');
