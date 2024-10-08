<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\tspsProduit;
use App\Models\PN;
use App\Models\sag;
use App\Models\d03;
use App\Models\d05;
use App\Models\d10;
use App\Models\d09;
use App\Models\r02;
use App\Models\Titre;
use App\Models\Granulometre;
use App\Models\Produit;
use App\Models\Bouille;
use App\Models\GranulometreTsp;
use App\Models\TitreTsp;
use App\models\SortieGranul;
use App\models\Acide;
use Illuminate\Support\Facades\DB;

class ControllerAffichage extends Controller
{
    public function accueill()
    {
        return view('accueil_analyst');
    }

    public function accueil_contro()
    {
        return view('accueil_controleur');
    }
    //visualsation des courbes pour analyste
    public function chart()
    {
        // récupérer les données depuis la base de données pour PN
        $donnees_par_heure = PN::select('heure', 'pn_densite', 'pn_rm', 'id_produit')
            ->orderByDesc('id_pn')
            ->get()
            ->toArray();

        // récupérer les données depuis la base de données pour D03
        $donnees_d03 = d03::select('heure', 'd03_densite', 'd03_rm', 'id_produit')
            ->orderByDesc('id_d03')
            ->get()
            ->toArray();

        // récupérer les données depuis la table r02
        $donnees_r02 = r02::select('heure', 'r02_densite', 'r02_rm', 'id_produit')
            ->orderByDesc('id_r02')
            ->get()
            ->toArray();
        // récupérer les données depuis la table sag
        $donnees_sag = sag::select('heure', 'sag_rm', 'id_produit')
            ->orderByDesc('id_sag')
            ->get()
            ->toArray();

        // récupérer les données depuis la table d05
        $donnees_d05 = d05::select('heure', 'd05_densite', 'd05_rm', 'id_produit')
            ->orderByDesc('id_d05')
            ->get()
            ->toArray();
        // récupérer les données depuis la table d09
        $donnees_d09 = d09::select('heure', 'd09_densite', 'd09_rm', 'id_produit')
            ->orderByDesc('id_d09')
            ->get()
            ->toArray();

        $donnees_d10 = d10::select('heure', 'd10_ph', 'id_produit')
            ->orderByDesc('id_d10')
            ->get()
            ->toArray();

        // récupérer les données depuis la table Titre
        $donnees_Titre = Titre::select('heure', 'ammonical', 'p2o5', 'h2o', 'zn', 's', 'cd', 'p2o5_tot', 'temperature', 'id_produit')
            ->orderByDesc('id_titre')
            ->get()
            ->toArray();
        //récupérer les données depuis la table gran
        $donnees_Granulometre = Granulometre::select('heure', 'sup_5', 'sup_4_75', 'sup_4', 'sup_3_15', 'sup_2_5', 'sup_2', 'sup_1', 'id_produit')
            ->orderByDesc('id_gran')
            ->get()
            ->toArray();





        // regrouper les données par id_produit pour PN
        $grouped_data_pn = [];
        foreach ($donnees_par_heure as $donnees) {
            $id_produit = $donnees['id_produit'];
            if (!isset($grouped_data_pn[$id_produit])) {
                $grouped_data_pn[$id_produit] = [];
            }
            $grouped_data_pn[$id_produit][] = [
                'heure' => $donnees['heure'],
                'pn_densite' => $donnees['pn_densite'],
                'pn_rm' => $donnees['pn_rm']
            ];
        }

        // regrouper les données par id_produit pour D03
        $grouped_data_d03 = [];
        foreach ($donnees_d03 as $donnees) {
            $id_produit = $donnees['id_produit'];
            if (!isset($grouped_data_d03[$id_produit])) {
                $grouped_data_d03[$id_produit] = [];
            }
            $grouped_data_d03[$id_produit][] = [
                'heure' => $donnees['heure'],
                'd03_densite' => $donnees['d03_densite'],
                'd03_rm' => $donnees['d03_rm']
            ];
        }


        // R02
        $grouped_data_r02 = [];
        foreach ($donnees_r02 as $donnees) {
            $id_produit = $donnees['id_produit'];
            if (!isset($grouped_data_r02[$id_produit])) {
                $grouped_data_r02[$id_produit] = [];
            }
            $grouped_data_r02[$id_produit][] = [
                'heure' => $donnees['heure'],
                'r02_densite' => $donnees['r02_densite'],
                'r02_rm' => $donnees['r02_rm']
            ];
        }

        // sag
        $grouped_data_sag = [];
        foreach ($donnees_sag as $donnees) {
            $id_produit = $donnees['id_produit'];
            if (!isset($grouped_data_sag[$id_produit])) {
                $grouped_data_sag[$id_produit] = [];
            }
            $grouped_data_sag[$id_produit][] = [
                'heure' => $donnees['heure'],
                'sag_rm' => $donnees['sag_rm']
            ];
        }


        // regrouper les données par id_produit pour D05
        $grouped_data_d05 = [];
        foreach ($donnees_d05 as $donnees) {
            $id_produit = $donnees['id_produit'];
            if (!isset($grouped_data_d05[$id_produit])) {
                $grouped_data_d05[$id_produit] = [];
            }
            $grouped_data_d05[$id_produit][] = [
                'heure' => $donnees['heure'],
                'd05_densite' => $donnees['d05_densite'],
                'd05_rm' => $donnees['d05_rm']
            ];
        }


        $grouped_data_d09 = [];
        foreach ($donnees_d09 as $donnees) {
            $id_produit = $donnees['id_produit'];
            if (!isset($grouped_data_d09[$id_produit])) {
                $grouped_data_d09[$id_produit] = [];
            }
            $grouped_data_d09[$id_produit][] = [
                'heure' => $donnees['heure'],
                'd09_densite' => $donnees['d09_densite'],
                'd09_rm' => $donnees['d09_rm']
            ];
        }


        $grouped_data_d10 = [];
        foreach ($donnees_d10 as $donnees) {
            $id_produit = $donnees['id_produit'];
            if (!isset($grouped_data_d10[$id_produit])) {
                $grouped_data_d10[$id_produit] = [];
            }
            $grouped_data_d10[$id_produit][] = [
                'heure' => $donnees['heure'],
                'd10_ph' => $donnees['d10_ph']
            ];
        }


        $grouped_data_Titre = [];
        foreach ($donnees_Titre as $donnees) {
            $id_produit = $donnees['id_produit'];
            if (!isset($grouped_data_Titre[$id_produit])) {
                $grouped_data_Titre[$id_produit] = [];
            }
            $grouped_data_Titre[$id_produit][] = [
                'heure' => $donnees['heure'],
                'ammonical' => $donnees['ammonical'],
                'p2o5' => $donnees['p2o5'],
                'h2o' => $donnees['h2o'],
                'zn' => $donnees['zn'],
                's' => $donnees['s'],
                'cd' => $donnees['cd'],
                'p2o5_tot' => $donnees['p2o5_tot'],
                'temperature' => $donnees['temperature'],
            ];
        }
        $grouped_data_Granulometre = [];
        foreach ($donnees_Granulometre as $donnees) {
            $id_produit = $donnees['id_produit'];
            if (!isset($grouped_data_Granulometre[$id_produit])) {
                $grouped_data_Granulometre[$id_produit] = [];
            }
            $grouped_data_Granulometre[$id_produit][] = [
                'heure' => $donnees['heure'],
                'sup_5'  => $donnees['sup_5'],
                'sup_4_75' => $donnees['sup_4_75'],
                'sup_4' => $donnees['sup_4'],
                'sup_3_15' => $donnees['sup_3_15'],
                'sup_2_5' => $donnees['sup_2_5'],
                'sup_2' => $donnees['sup_2'],
                'sup_1' => $donnees['sup_1'],
            ];
        }

        // pour chaque groupe de données PN, créer un graphe
        $graphe_par_produit_pn = [];
        foreach ($grouped_data_pn as $id_produit => $donnees_produit) {
            $heure = array_column($donnees_produit, 'heure');
            $pn_densite = array_column($donnees_produit, 'pn_densite');
            $pn_rm = array_column($donnees_produit, 'pn_rm');

            $produit = DB::table('produits')->where('id_produit', $id_produit)->first();
            $ligne = DB::table('lignes')->where('id_ligne', $produit->id_ligne)->first();
            $date_production = $ligne->date_production;
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;

            // créer le graphe PN
            $chart_data = [
                'labels' => $heure,
                'datasets' => [
                    [
                        'label' => 'PN Densite',
                        'data' => $pn_densite,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgba(255, 99, 132, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'PN RM',
                        'data' => $pn_rm,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ]
                ]
            ];

            $graphe_par_produit_pn[$id_produit] = [
                'chart_data' => $chart_data,
                'date_production' => $date_production,
                'nom_ligne' => $nom_ligne,
                'nom_produit' => $nom_produit,
                'qlt' => $qlt,
            ];
        }

        // pour chaque groupe de données D03, créer un graphe
        $graphe_par_produit_d03 = [];
        foreach ($grouped_data_d03 as $id_produit => $donnees_produit) {
            $heure = array_column($donnees_produit, 'heure');
            $d03_densite = array_column($donnees_produit, 'd03_densite');
            $d03_rm = array_column($donnees_produit, 'd03_rm');

            $produit = DB::table('produits')->where('id_produit', $id_produit)->first();
            $ligne = DB::table('lignes')->where('id_ligne', $produit->id_ligne)->first();
            $date_production = $ligne->date_production;
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;

            // créer le graphe
            $chart_data = [
                'labels' => $heure,
                'datasets' => [
                    [
                        'label' => 'D03 Densite',
                        'data' => $d03_densite,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgba(255, 99, 132, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'D03 RM',
                        'data' => $d03_rm,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ]
                ]
            ];

            $graphe_par_produit_d03[$id_produit] = [
                'chart_data' => $chart_data,
                'date_production' => $date_production,
                'nom_ligne' => $nom_ligne,
                'nom_produit' => $nom_produit,
                'qlt' => $qlt,
            ];
        }
        // regrouper pour tracer r02
        $graphe_par_produit_r02 = [];
        foreach ($grouped_data_r02 as $id_produit => $donnees_produit) {
            $heure = array_column($donnees_produit, 'heure');
            $r02_densite = array_column($donnees_produit, 'r02_densite');
            $r02_rm = array_column($donnees_produit, 'r02_rm');

            $produit = DB::table('produits')->where('id_produit', $id_produit)->first();
            $ligne = DB::table('lignes')->where('id_ligne', $produit->id_ligne)->first();
            $date_production = $ligne->date_production;
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;

            // créer le graphe
            $chart_data = [
                'labels' => $heure,
                'datasets' => [
                    [
                        'label' => 'r02 Densite',
                        'data' => $r02_densite,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgba(255, 99, 132, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'r02 RM',
                        'data' => $r02_rm,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ]
                ]
            ];

            $graphe_par_produit_r02[$id_produit] = [
                'chart_data' => $chart_data,
                'date_production' => $date_production,
                'nom_ligne' => $nom_ligne,
                'nom_produit' => $nom_produit,
                'qlt' => $qlt,
            ];
        }

        // regrouper pour tracer sag
        $graphe_par_produit_sag = [];
        foreach ($grouped_data_sag as $id_produit => $donnees_produit) {
            $heure = array_column($donnees_produit, 'heure');
            $sag_densite = array_column($donnees_produit, 'sag_densite');
            $sag_rm = array_column($donnees_produit, 'sag_rm');

            $produit = DB::table('produits')->where('id_produit', $id_produit)->first();
            $ligne = DB::table('lignes')->where('id_ligne', $produit->id_ligne)->first();
            $date_production = $ligne->date_production;
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;

            // créer le graphe sag
            $chart_data = [
                'labels' => $heure,
                'datasets' => [

                    [
                        'label' => 'sag RM',
                        'data' => $sag_rm,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ]
                ]
            ];

            $graphe_par_produit_sag[$id_produit] = [
                'chart_data' => $chart_data,
                'date_production' => $date_production,
                'nom_ligne' => $nom_ligne,
                'nom_produit' => $nom_produit,
                'qlt' => $qlt,
            ];
        }


        // regrouper pour tracer r02
        $graphe_par_produit_d05 = [];
        foreach ($grouped_data_d05 as $id_produit => $donnees_produit) {
            $heure = array_column($donnees_produit, 'heure');
            $d05_densite = array_column($donnees_produit, 'd05_densite');
            $d05_rm = array_column($donnees_produit, 'd05_rm');

            $produit = DB::table('produits')->where('id_produit', $id_produit)->first();
            $ligne = DB::table('lignes')->where('id_ligne', $produit->id_ligne)->first();
            $date_production = $ligne->date_production;
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;

            // créer le graphe
            $chart_data = [
                'labels' => $heure,
                'datasets' => [
                    [
                        'label' => 'd05 Densite',
                        'data' => $d05_densite,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgba(255, 99, 132, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'd05 RM',
                        'data' => $d05_rm,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ]
                ]
            ];

            $graphe_par_produit_d05[$id_produit] = [
                'chart_data' => $chart_data,
                'date_production' => $date_production,
                'nom_ligne' => $nom_ligne,
                'nom_produit' => $nom_produit,
                'qlt' => $qlt,
            ];
        }


        // regrouper pour tracer d09
        $graphe_par_produit_d09 = [];
        foreach ($grouped_data_d09 as $id_produit => $donnees_produit) {
            $heure = array_column($donnees_produit, 'heure');
            $d09_densite = array_column($donnees_produit, 'd09_densite');
            $d09_rm = array_column($donnees_produit, 'd09_rm');

            $produit = DB::table('produits')->where('id_produit', $id_produit)->first();
            $ligne = DB::table('lignes')->where('id_ligne', $produit->id_ligne)->first();
            $date_production = $ligne->date_production;
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;

            // créer le graphe
            $chart_data = [
                'labels' => $heure,
                'datasets' => [
                    [
                        'label' => 'd09 Densite',
                        'data' => $d09_densite,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgba(255, 99, 132, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'd09 RM',
                        'data' => $d09_rm,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ]
                ]
            ];

            $graphe_par_produit_d09[$id_produit] = [
                'chart_data' => $chart_data,
                'date_production' => $date_production,
                'nom_ligne' => $nom_ligne,
                'nom_produit' => $nom_produit,
                'qlt' => $qlt,
            ];
        }

        // regrouper pour tracer sag
        $graphe_par_produit_d10 = [];
        foreach ($grouped_data_d10 as $id_produit => $donnees_produit) {
            $heure = array_column($donnees_produit, 'heure');
            $d10_ph = array_column($donnees_produit, 'd10_ph');

            $produit = DB::table('produits')->where('id_produit', $id_produit)->first();
            $ligne = DB::table('lignes')->where('id_ligne', $produit->id_ligne)->first();
            $date_production = $ligne->date_production;
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;

            // créer le graphe d10
            $chart_data = [
                'labels' => $heure,
                'datasets' => [

                    [
                        'label' => 'd10 PH',
                        'data' => $d10_ph,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ]
                ]
            ];

            $graphe_par_produit_d10[$id_produit] = [
                'chart_data' => $chart_data,
                'date_production' => $date_production,
                'nom_ligne' => $nom_ligne,
                'nom_produit' => $nom_produit,
                'qlt' => $qlt,
            ];
        }

        // pour chaque groupe de données PN, créer un graphe
        $graphe_par_produit_Titre = [];
        foreach ($grouped_data_Titre as $id_produit => $donnees_produit) {
            $heure = array_column($donnees_produit, 'heure');
            $ammonical = array_column($donnees_produit, 'ammonical');
            $p2o5 = array_column($donnees_produit, 'p2o5');
            $h2o = array_column($donnees_produit, 'h2o');
            $zn = array_column($donnees_produit, 'zn');
            $s = array_column($donnees_produit, 's');
            $cd = array_column($donnees_produit, 'cd');
            $p2o5_tot = array_column($donnees_produit, 'p2o5_tot');
            $temperature = array_column($donnees_produit, 'temperature');

            $produit = DB::table('produits')->where('id_produit', $id_produit)->first();
            $ligne = DB::table('lignes')->where('id_ligne', $produit->id_ligne)->first();
            $date_production = $ligne->date_production;
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;

            // créer le graphe PN
            $chart_data = [
                'labels' => $heure,
                'datasets' => [
                    [
                        'label' => 'ammonical',
                        'data' => $ammonical,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgba(255, 99, 132, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'p2o5',
                        'data' => $p2o5,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ],

                    [
                        'label' => 'h2o',
                        'data' => $h2o,
                        ' borderColor' => 'rgb(75, 192, 192)',
                        'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'zn',
                        'data' => $zn,
                        ' borderColor' => 'rgb(255, 0, 255)',
                        'backgroundColor' => 'rgba(255, 0, 255)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 's',
                        'data' => $s,
                        ' borderColor' => 'rgb(255, 255, 0) ',
                        'backgroundColor' => 'rgba(255, 255, 0)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'cd',
                        'data' => $cd,
                        ' borderColor' => 'rgb(0, 0, 255) ',
                        'backgroundColor' => 'rgba(0, 0, 255) ',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'p2o5_tot',
                        'data' => $p2o5_tot,
                        ' borderColor' => 'rgb(0, 255, 0) ',
                        'backgroundColor' => 'rgba(0, 255, 0)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'temperature',
                        'data' => $temperature,
                        ' borderColor' => 'rgb(255, 0, 0) ',
                        'backgroundColor' => 'rgba(255, 0, 0)',
                        'borderWidth' => 1
                    ]



                ]
            ];

            $graphe_par_produit_Titre[$id_produit] = [
                'chart_data' => $chart_data,
                'date_production' => $date_production,
                'nom_ligne' => $nom_ligne,
                'nom_produit' => $nom_produit,
                'qlt' => $qlt,
            ];
        }


        // pour chaque groupe de données PN, créer un graphe
        $graphe_par_produit_Granulometre = [];
        foreach ($grouped_data_Granulometre as $id_produit => $donnees_produit) {
            $heure = array_column($donnees_produit, 'heure');
            $sup_5 = array_column($donnees_produit, 'sup_5');
            $sup_4_75 = array_column($donnees_produit, 'sup_4_75');
            $sup_4 = array_column($donnees_produit, 'sup_4');
            $sup_3_15 = array_column($donnees_produit, 'sup_3_15');
            $sup_2_5 = array_column($donnees_produit, 'sup_2_5');
            $sup_2 = array_column($donnees_produit, 'sup_2');
            $sup_1 = array_column($donnees_produit, 'sup_1');

            $produit = DB::table('produits')->where('id_produit', $id_produit)->first();
            $ligne = DB::table('lignes')->where('id_ligne', $produit->id_ligne)->first();
            $date_production = $ligne->date_production;
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;

            // créer le graphe PN
            $chart_data = [
                'labels' => $heure,
                'datasets' => [
                    [
                        'label' => 'sup_5',
                        'data' => $sup_5,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgba(255, 99, 132, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'sup_4_75',
                        'data' => $sup_4_75,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ],

                    [
                        'label' => 'sup_4',
                        'data' => $sup_4,
                        ' borderColor' => 'rgb(75, 192, 192)',
                        'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'sup_3_15',
                        'data' => $sup_3_15,
                        ' borderColor' => 'rgb(255, 0, 255)',
                        'backgroundColor' => 'rgba(255, 0, 255)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'sup_2_5',
                        'data' => $sup_2_5,
                        ' borderColor' => 'rgb(255, 255, 0) ',
                        'backgroundColor' => 'rgba(255, 255, 0)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'sup_2',
                        'data' => $sup_2,
                        ' borderColor' => 'rgb(0, 0, 255) ',
                        'backgroundColor' => 'rgba(0, 0, 255) ',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'sup_1',
                        'data' => $sup_1,
                        ' borderColor' => 'rgb(0, 255, 0) ',
                        'backgroundColor' => 'rgba(0, 255, 0)',
                        'borderWidth' => 1
                    ],




                ]
            ];

            $graphe_par_produit_Granulometre[$id_produit] = [
                'chart_data' => $chart_data,
                'date_production' => $date_production,
                'nom_ligne' => $nom_ligne,
                'nom_produit' => $nom_produit,
                'qlt' => $qlt,
            ];
        }




        return view('visualisation.visualisation', compact('graphe_par_produit_d03', 'graphe_par_produit_pn', 'graphe_par_produit_r02', 'graphe_par_produit_sag', 'graphe_par_produit_d05', 'graphe_par_produit_d09', 'graphe_par_produit_d10', 'graphe_par_produit_Titre', 'graphe_par_produit_Granulometre'));
    }
    public function chartcont()
    {
        $donnees_par_heure = PN::select('heure', 'pn_densite', 'pn_rm', 'id_produit')
            ->orderByDesc('id_pn')
            ->get()
            ->toArray();

        // récupérer les données depuis la base de données pour D03
        $donnees_d03 = d03::select('heure', 'd03_densite', 'd03_rm', 'id_produit')
            ->orderByDesc('id_d03')
            ->get()
            ->toArray();

        // récupérer les données depuis la table r02
        $donnees_r02 = r02::select('heure', 'r02_densite', 'r02_rm', 'id_produit')
            ->orderByDesc('id_r02')
            ->get()
            ->toArray();
        // récupérer les données depuis la table sag
        $donnees_sag = sag::select('heure', 'sag_rm', 'id_produit')
            ->orderByDesc('id_sag')
            ->get()
            ->toArray();

        // récupérer les données depuis la table d05
        $donnees_d05 = d05::select('heure', 'd05_densite', 'd05_rm', 'id_produit')
            ->orderByDesc('id_d05')
            ->get()
            ->toArray();
        // récupérer les données depuis la table d09
        $donnees_d09 = d09::select('heure', 'd09_densite', 'd09_rm', 'id_produit')
            ->orderByDesc('id_d09')
            ->get()
            ->toArray();

        $donnees_d10 = d10::select('heure', 'd10_ph', 'id_produit')
            ->orderByDesc('id_d10')
            ->get()
            ->toArray();

        // récupérer les données depuis la table Titre
        $donnees_Titre = Titre::select('heure', 'ammonical', 'p2o5', 'h2o', 'zn', 's', 'cd', 'p2o5_tot', 'temperature', 'id_produit')
            ->orderByDesc('id_titre')
            ->get()
            ->toArray();
        //récupérer les données depuis la table gran
        $donnees_Granulometre = Granulometre::select('heure', 'sup_5', 'sup_4_75', 'sup_4', 'sup_3_15', 'sup_2_5', 'sup_2', 'sup_1', 'id_produit')
            ->orderByDesc('id_gran')
            ->get()
            ->toArray();





        // regrouper les données par id_produit pour PN
        $grouped_data_pn = [];
        foreach ($donnees_par_heure as $donnees) {
            $id_produit = $donnees['id_produit'];
            if (!isset($grouped_data_pn[$id_produit])) {
                $grouped_data_pn[$id_produit] = [];
            }
            $grouped_data_pn[$id_produit][] = [
                'heure' => $donnees['heure'],
                'pn_densite' => $donnees['pn_densite'],
                'pn_rm' => $donnees['pn_rm']
            ];
        }

        // regrouper les données par id_produit pour D03
        $grouped_data_d03 = [];
        foreach ($donnees_d03 as $donnees) {
            $id_produit = $donnees['id_produit'];
            if (!isset($grouped_data_d03[$id_produit])) {
                $grouped_data_d03[$id_produit] = [];
            }
            $grouped_data_d03[$id_produit][] = [
                'heure' => $donnees['heure'],
                'd03_densite' => $donnees['d03_densite'],
                'd03_rm' => $donnees['d03_rm']
            ];
        }


        // R02
        $grouped_data_r02 = [];
        foreach ($donnees_r02 as $donnees) {
            $id_produit = $donnees['id_produit'];
            if (!isset($grouped_data_r02[$id_produit])) {
                $grouped_data_r02[$id_produit] = [];
            }
            $grouped_data_r02[$id_produit][] = [
                'heure' => $donnees['heure'],
                'r02_densite' => $donnees['r02_densite'],
                'r02_rm' => $donnees['r02_rm']
            ];
        }

        // sag
        $grouped_data_sag = [];
        foreach ($donnees_sag as $donnees) {
            $id_produit = $donnees['id_produit'];
            if (!isset($grouped_data_sag[$id_produit])) {
                $grouped_data_sag[$id_produit] = [];
            }
            $grouped_data_sag[$id_produit][] = [
                'heure' => $donnees['heure'],
                'sag_rm' => $donnees['sag_rm']
            ];
        }


        // regrouper les données par id_produit pour D05
        $grouped_data_d05 = [];
        foreach ($donnees_d05 as $donnees) {
            $id_produit = $donnees['id_produit'];
            if (!isset($grouped_data_d05[$id_produit])) {
                $grouped_data_d05[$id_produit] = [];
            }
            $grouped_data_d05[$id_produit][] = [
                'heure' => $donnees['heure'],
                'd05_densite' => $donnees['d05_densite'],
                'd05_rm' => $donnees['d05_rm']
            ];
        }


        $grouped_data_d09 = [];
        foreach ($donnees_d09 as $donnees) {
            $id_produit = $donnees['id_produit'];
            if (!isset($grouped_data_d09[$id_produit])) {
                $grouped_data_d09[$id_produit] = [];
            }
            $grouped_data_d09[$id_produit][] = [
                'heure' => $donnees['heure'],
                'd09_densite' => $donnees['d09_densite'],
                'd09_rm' => $donnees['d09_rm']
            ];
        }


        $grouped_data_d10 = [];
        foreach ($donnees_d10 as $donnees) {
            $id_produit = $donnees['id_produit'];
            if (!isset($grouped_data_d10[$id_produit])) {
                $grouped_data_d10[$id_produit] = [];
            }
            $grouped_data_d10[$id_produit][] = [
                'heure' => $donnees['heure'],
                'd10_ph' => $donnees['d10_ph']
            ];
        }


        $grouped_data_Titre = [];
        foreach ($donnees_Titre as $donnees) {
            $id_produit = $donnees['id_produit'];
            if (!isset($grouped_data_Titre[$id_produit])) {
                $grouped_data_Titre[$id_produit] = [];
            }
            $grouped_data_Titre[$id_produit][] = [
                'heure' => $donnees['heure'],
                'ammonical' => $donnees['ammonical'],
                'p2o5' => $donnees['p2o5'],
                'h2o' => $donnees['h2o'],
                'zn' => $donnees['zn'],
                's' => $donnees['s'],
                'cd' => $donnees['cd'],
                'p2o5_tot' => $donnees['p2o5_tot'],
                'temperature' => $donnees['temperature'],
            ];
        }
        $grouped_data_Granulometre = [];
        foreach ($donnees_Granulometre as $donnees) {
            $id_produit = $donnees['id_produit'];
            if (!isset($grouped_data_Granulometre[$id_produit])) {
                $grouped_data_Granulometre[$id_produit] = [];
            }
            $grouped_data_Granulometre[$id_produit][] = [
                'heure' => $donnees['heure'],
                'sup_5'  => $donnees['sup_5'],
                'sup_4_75' => $donnees['sup_4_75'],
                'sup_4' => $donnees['sup_4'],
                'sup_3_15' => $donnees['sup_3_15'],
                'sup_2_5' => $donnees['sup_2_5'],
                'sup_2' => $donnees['sup_2'],
                'sup_1' => $donnees['sup_1'],
            ];
        }

        // pour chaque groupe de données PN, créer un graphe
        $graphe_par_produit_pn = [];
        foreach ($grouped_data_pn as $id_produit => $donnees_produit) {
            $heure = array_column($donnees_produit, 'heure');
            $pn_densite = array_column($donnees_produit, 'pn_densite');
            $pn_rm = array_column($donnees_produit, 'pn_rm');

            $produit = DB::table('produits')->where('id_produit', $id_produit)->first();
            $ligne = DB::table('lignes')->where('id_ligne', $produit->id_ligne)->first();
            $date_production = $ligne->date_production;
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;

            // créer le graphe PN
            $chart_data = [
                'labels' => $heure,
                'datasets' => [
                    [
                        'label' => 'PN Densite',
                        'data' => $pn_densite,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgba(255, 99, 132, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'PN RM',
                        'data' => $pn_rm,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ]
                ]
            ];

            $graphe_par_produit_pn[$id_produit] = [
                'chart_data' => $chart_data,
                'date_production' => $date_production,
                'nom_ligne' => $nom_ligne,
                'nom_produit' => $nom_produit,
                'qlt' => $qlt,
            ];
        }

        // pour chaque groupe de données D03, créer un graphe
        $graphe_par_produit_d03 = [];
        foreach ($grouped_data_d03 as $id_produit => $donnees_produit) {
            $heure = array_column($donnees_produit, 'heure');
            $d03_densite = array_column($donnees_produit, 'd03_densite');
            $d03_rm = array_column($donnees_produit, 'd03_rm');

            $produit = DB::table('produits')->where('id_produit', $id_produit)->first();
            $ligne = DB::table('lignes')->where('id_ligne', $produit->id_ligne)->first();
            $date_production = $ligne->date_production;
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;

            // créer le graphe
            $chart_data = [
                'labels' => $heure,
                'datasets' => [
                    [
                        'label' => 'D03 Densite',
                        'data' => $d03_densite,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgba(255, 99, 132, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'D03 RM',
                        'data' => $d03_rm,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ]
                ]
            ];

            $graphe_par_produit_d03[$id_produit] = [
                'chart_data' => $chart_data,
                'date_production' => $date_production,
                'nom_ligne' => $nom_ligne,
                'nom_produit' => $nom_produit,
                'qlt' => $qlt,
            ];
        }
        // regrouper pour tracer r02
        $graphe_par_produit_r02 = [];
        foreach ($grouped_data_r02 as $id_produit => $donnees_produit) {
            $heure = array_column($donnees_produit, 'heure');
            $r02_densite = array_column($donnees_produit, 'r02_densite');
            $r02_rm = array_column($donnees_produit, 'r02_rm');

            $produit = DB::table('produits')->where('id_produit', $id_produit)->first();
            $ligne = DB::table('lignes')->where('id_ligne', $produit->id_ligne)->first();
            $date_production = $ligne->date_production;
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;

            // créer le graphe
            $chart_data = [
                'labels' => $heure,
                'datasets' => [
                    [
                        'label' => 'r02 Densite',
                        'data' => $r02_densite,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgba(255, 99, 132, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'r02 RM',
                        'data' => $r02_rm,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ]
                ]
            ];

            $graphe_par_produit_r02[$id_produit] = [
                'chart_data' => $chart_data,
                'date_production' => $date_production,
                'nom_ligne' => $nom_ligne,
                'nom_produit' => $nom_produit,
                'qlt' => $qlt,
            ];
        }

        // regrouper pour tracer sag
        $graphe_par_produit_sag = [];
        foreach ($grouped_data_sag as $id_produit => $donnees_produit) {
            $heure = array_column($donnees_produit, 'heure');
            $sag_densite = array_column($donnees_produit, 'sag_densite');
            $sag_rm = array_column($donnees_produit, 'sag_rm');

            $produit = DB::table('produits')->where('id_produit', $id_produit)->first();
            $ligne = DB::table('lignes')->where('id_ligne', $produit->id_ligne)->first();
            $date_production = $ligne->date_production;
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;

            // créer le graphe sag
            $chart_data = [
                'labels' => $heure,
                'datasets' => [

                    [
                        'label' => 'sag RM',
                        'data' => $sag_rm,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ]
                ]
            ];

            $graphe_par_produit_sag[$id_produit] = [
                'chart_data' => $chart_data,
                'date_production' => $date_production,
                'nom_ligne' => $nom_ligne,
                'nom_produit' => $nom_produit,
                'qlt' => $qlt,
            ];
        }


        // regrouper pour tracer r02
        $graphe_par_produit_d05 = [];
        foreach ($grouped_data_d05 as $id_produit => $donnees_produit) {
            $heure = array_column($donnees_produit, 'heure');
            $d05_densite = array_column($donnees_produit, 'd05_densite');
            $d05_rm = array_column($donnees_produit, 'd05_rm');

            $produit = DB::table('produits')->where('id_produit', $id_produit)->first();
            $ligne = DB::table('lignes')->where('id_ligne', $produit->id_ligne)->first();
            $date_production = $ligne->date_production;
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;

            // créer le graphe
            $chart_data = [
                'labels' => $heure,
                'datasets' => [
                    [
                        'label' => 'd05 Densite',
                        'data' => $d05_densite,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgba(255, 99, 132, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'd05 RM',
                        'data' => $d05_rm,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ]
                ]
            ];

            $graphe_par_produit_d05[$id_produit] = [
                'chart_data' => $chart_data,
                'date_production' => $date_production,
                'nom_ligne' => $nom_ligne,
                'nom_produit' => $nom_produit,
                'qlt' => $qlt,
            ];
        }


        // regrouper pour tracer d09
        $graphe_par_produit_d09 = [];
        foreach ($grouped_data_d09 as $id_produit => $donnees_produit) {
            $heure = array_column($donnees_produit, 'heure');
            $d09_densite = array_column($donnees_produit, 'd09_densite');
            $d09_rm = array_column($donnees_produit, 'd09_rm');

            $produit = DB::table('produits')->where('id_produit', $id_produit)->first();
            $ligne = DB::table('lignes')->where('id_ligne', $produit->id_ligne)->first();
            $date_production = $ligne->date_production;
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;

            // créer le graphe
            $chart_data = [
                'labels' => $heure,
                'datasets' => [
                    [
                        'label' => 'd09 Densite',
                        'data' => $d09_densite,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgba(255, 99, 132, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'd09 RM',
                        'data' => $d09_rm,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ]
                ]
            ];

            $graphe_par_produit_d09[$id_produit] = [
                'chart_data' => $chart_data,
                'date_production' => $date_production,
                'nom_ligne' => $nom_ligne,
                'nom_produit' => $nom_produit,
                'qlt' => $qlt,
            ];
        }

        // regrouper pour tracer sag
        $graphe_par_produit_d10 = [];
        foreach ($grouped_data_d10 as $id_produit => $donnees_produit) {
            $heure = array_column($donnees_produit, 'heure');
            $d10_ph = array_column($donnees_produit, 'd10_ph');

            $produit = DB::table('produits')->where('id_produit', $id_produit)->first();
            $ligne = DB::table('lignes')->where('id_ligne', $produit->id_ligne)->first();
            $date_production = $ligne->date_production;
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;

            // créer le graphe d10
            $chart_data = [
                'labels' => $heure,
                'datasets' => [

                    [
                        'label' => 'd10 PH',
                        'data' => $d10_ph,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ]
                ]
            ];

            $graphe_par_produit_d10[$id_produit] = [
                'chart_data' => $chart_data,
                'date_production' => $date_production,
                'nom_ligne' => $nom_ligne,
                'nom_produit' => $nom_produit,
                'qlt' => $qlt,
            ];
        }

        // pour chaque groupe de données PN, créer un graphe
        $graphe_par_produit_Titre = [];
        foreach ($grouped_data_Titre as $id_produit => $donnees_produit) {
            $heure = array_column($donnees_produit, 'heure');
            $ammonical = array_column($donnees_produit, 'ammonical');
            $p2o5 = array_column($donnees_produit, 'p2o5');
            $h2o = array_column($donnees_produit, 'h2o');
            $zn = array_column($donnees_produit, 'zn');
            $s = array_column($donnees_produit, 's');
            $cd = array_column($donnees_produit, 'cd');
            $p2o5_tot = array_column($donnees_produit, 'p2o5_tot');
            $temperature = array_column($donnees_produit, 'temperature');

            $produit = DB::table('produits')->where('id_produit', $id_produit)->first();
            $ligne = DB::table('lignes')->where('id_ligne', $produit->id_ligne)->first();
            $date_production = $ligne->date_production;
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;

            // créer le graphe PN
            $chart_data = [
                'labels' => $heure,
                'datasets' => [
                    [
                        'label' => 'ammonical',
                        'data' => $ammonical,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgba(255, 99, 132, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'p2o5',
                        'data' => $p2o5,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ],

                    [
                        'label' => 'h2o',
                        'data' => $h2o,
                        ' borderColor' => 'rgb(75, 192, 192)',
                        'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'zn',
                        'data' => $zn,
                        ' borderColor' => 'rgb(255, 0, 255)',
                        'backgroundColor' => 'rgba(255, 0, 255)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 's',
                        'data' => $s,
                        ' borderColor' => 'rgb(255, 255, 0) ',
                        'backgroundColor' => 'rgba(255, 255, 0)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'cd',
                        'data' => $cd,
                        ' borderColor' => 'rgb(0, 0, 255) ',
                        'backgroundColor' => 'rgba(0, 0, 255) ',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'p2o5_tot',
                        'data' => $p2o5_tot,
                        ' borderColor' => 'rgb(0, 255, 0) ',
                        'backgroundColor' => 'rgba(0, 255, 0)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'temperature',
                        'data' => $temperature,
                        ' borderColor' => 'rgb(255, 0, 0) ',
                        'backgroundColor' => 'rgba(255, 0, 0)',
                        'borderWidth' => 1
                    ]



                ]
            ];

            $graphe_par_produit_Titre[$id_produit] = [
                'chart_data' => $chart_data,
                'date_production' => $date_production,
                'nom_ligne' => $nom_ligne,
                'nom_produit' => $nom_produit,
                'qlt' => $qlt,
            ];
        }


        // pour chaque groupe de données PN, créer un graphe
        $graphe_par_produit_Granulometre = [];
        foreach ($grouped_data_Granulometre as $id_produit => $donnees_produit) {
            $heure = array_column($donnees_produit, 'heure');
            $sup_5 = array_column($donnees_produit, 'sup_5');
            $sup_4_75 = array_column($donnees_produit, 'sup_4_75');
            $sup_4 = array_column($donnees_produit, 'sup_4');
            $sup_3_15 = array_column($donnees_produit, 'sup_3_15');
            $sup_2_5 = array_column($donnees_produit, 'sup_2_5');
            $sup_2 = array_column($donnees_produit, 'sup_2');
            $sup_1 = array_column($donnees_produit, 'sup_1');

            $produit = DB::table('produits')->where('id_produit', $id_produit)->first();
            $ligne = DB::table('lignes')->where('id_ligne', $produit->id_ligne)->first();
            $date_production = $ligne->date_production;
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;

            // créer le graphe PN
            $chart_data = [
                'labels' => $heure,
                'datasets' => [
                    [
                        'label' => 'sup_5',
                        'data' => $sup_5,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgba(255, 99, 132, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'sup_4_75',
                        'data' => $sup_4_75,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ],

                    [
                        'label' => 'sup_4',
                        'data' => $sup_4,
                        ' borderColor' => 'rgb(75, 192, 192)',
                        'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'sup_3_15',
                        'data' => $sup_3_15,
                        ' borderColor' => 'rgb(255, 0, 255)',
                        'backgroundColor' => 'rgba(255, 0, 255)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'sup_2_5',
                        'data' => $sup_2_5,
                        ' borderColor' => 'rgb(255, 255, 0) ',
                        'backgroundColor' => 'rgba(255, 255, 0)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'sup_2',
                        'data' => $sup_2,
                        ' borderColor' => 'rgb(0, 0, 255) ',
                        'backgroundColor' => 'rgba(0, 0, 255) ',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'sup_1',
                        'data' => $sup_1,
                        ' borderColor' => 'rgb(0, 255, 0) ',
                        'backgroundColor' => 'rgba(0, 255, 0)',
                        'borderWidth' => 1
                    ],




                ]
            ];

            $graphe_par_produit_Granulometre[$id_produit] = [
                'chart_data' => $chart_data,
                'date_production' => $date_production,
                'nom_ligne' => $nom_ligne,
                'nom_produit' => $nom_produit,
                'qlt' => $qlt,
            ];
        }



        return view('visualisation.visualisationcont', compact('graphe_par_produit_d03', 'graphe_par_produit_pn', 'graphe_par_produit_r02', 'graphe_par_produit_sag', 'graphe_par_produit_d05', 'graphe_par_produit_d09', 'graphe_par_produit_d10', 'graphe_par_produit_Titre', 'graphe_par_produit_Granulometre'));
    }
    //visualsation des courbes pour analyste
    public function chartTsp()
    {

        $donnees_Bouille = Bouille::select('heure', 'densite', 'AL_B', 'P2O5_SE_B', 'id_tsp')
            ->orderByDesc('id_bouillie')
            ->get()
            ->toArray();

        $donnees_SortieGranul = SortieGranul::select('heure', 'AL', 'P2O5_SE', 'H2O', 'id_tsp')
            ->orderByDesc('id_sortie')
            ->get()
            ->toArray();

        // récupérer les données depuis la table Titre
        $donnees_TitreTsp = TitreTsp::select('heure', 'H2O', 'AL_T', 'P2O5_SE_T', 'P2O5_SE_CIT', 'TOT', 'h2O_T', 'H2O_B', 'id_tsp')
            ->orderByDesc('id_titsp')
            ->get()
            ->toArray();
        //récupérer les données depuis la table gran
        $donnees_GranulometreTsp = GranulometreTsp::select('heure', 'sup_6_3', 'sup_5', 'sup_4', 'sup_3_15', 'sup_2_5', 'sup_2', 'sup_1', 'id_tsp')
            ->orderByDesc('id_grantsp')
            ->get()
            ->toArray();

        $grouped_data_Bouille = [];
        foreach ($donnees_Bouille as $donnees) {
            $id_tsp = $donnees['id_tsp'];

            if (!isset($grouped_data_Bouille[$id_tsp])) {
                $grouped_data_Bouille[$id_tsp] = [];
            }
            $grouped_data_Bouille[$id_tsp][] = [
                'heure' => $donnees['heure'],
                'densite' => $donnees['densite'],
                'AL_B' => $donnees['AL_B'],
                'P2O5_SE_B' => $donnees['P2O5_SE_B'],
            ];
        }



        $grouped_data_SortieGranul = [];
        foreach ($donnees_SortieGranul as $donnees) {
            $id_tsp = $donnees['id_tsp'];
            if (!isset($grouped_data_SortieGranul[$id_tsp])) {
                $grouped_data_SortieGranul[$id_tsp] = [];
            }
            $grouped_data_SortieGranul[$id_tsp][] = [
                'heure' => $donnees['heure'],
                'AL' => $donnees['AL'],
                'H2O' => $donnees['H2O'],
                'P2O5_SE' => $donnees['P2O5_SE'],



            ];
        }



        // regrouper les données par id_tsp titre

        $grouped_data_TitreTsp = [];
        foreach ($donnees_TitreTsp as $donnees) {
            $id_tsp = $donnees['id_tsp'];
            if (!isset($grouped_data_TitreTsp[$id_tsp])) {
                $grouped_data_TitreTsp[$id_tsp] = [];
            }
            $grouped_data_TitreTsp[$id_tsp][] = [
                'heure' => $donnees['heure'],
                'H2O' => $donnees['H2O'],
                'AL_T' => $donnees['AL_T'],
                'P2O5_SE_T' => $donnees['P2O5_SE_T'],
                'P2O5_SE_CIT' => $donnees['P2O5_SE_CIT'],
                'TOT' => $donnees['TOT'],
                'h2O_T' => $donnees['h2O_T'],
                'H2O_B' => $donnees['H2O_B'],
            ];
        }



        // regrouper les données par id_tsp grna 
        $grouped_data_GranulometreTsp = [];
        foreach ($donnees_GranulometreTsp as $donnees) {
            $id_tsp = $donnees['id_tsp'];
            if (!isset($grouped_data_GranulometreTsp[$id_tsp])) {
                $grouped_data_GranulometreTsp[$id_tsp] = [];
            }
            $grouped_data_GranulometreTsp[$id_tsp][] = [
                'heure' => $donnees['heure'],
                'sup_6_3' => $donnees['sup_6_3'],
                'sup_5' => $donnees['sup_5'],
                'sup_4' => $donnees['sup_4'],
                'sup_3_15' => $donnees['sup_3_15'],
                'sup_2_5' => $donnees['sup_2_5'],
                'sup_2' => $donnees['sup_2'],
                'sup_1' => $donnees['sup_1'],
            ];
        }




        // créer le graphe



        $graphe_par_produit_Bouille = [];
        foreach ($grouped_data_Bouille as $id_tsp => $donnees_produit) {
            $tsp = DB::table('tsps_produits')->where('id_tsp', $id_tsp)->first();
            $ligne = DB::table('lignes')->where('id_ligne', $tsp->id_ligne)->first();
            $date_production = $ligne->date_production;
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;

            $heure = array_column($donnees_produit, 'heure');
            $densite = array_column($donnees_produit, 'densite');
            $AL_B = array_column($donnees_produit, 'AL_B');
            $P2O5_SE_B = array_column($donnees_produit, 'P2O5_SE_B');
            // créer le graphe
            $chart_data = [
                'labels' => $heure,
                'datasets' => [
                    [
                        'label' => ' Densite',
                        'data' => $densite,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgba(255, 99, 132, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'AL_B',
                        'data' => $AL_B,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ],

                    [
                        'label' => 'P2O5_SE_B',
                        'data' => $P2O5_SE_B,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ]


                ]
            ];

            $graphe_par_produit_Bouille[$id_tsp] = [
                'chart_data' => $chart_data,
                'date_production' => $date_production,
                'nom_ligne' => $nom_ligne,
                'nom_produit' => $nom_produit,
                'qlt' => $qlt,
            ];
        }


        // regrouper pour tracer d09
        $graphe_par_produit_SortieGranul = [];
        foreach ($grouped_data_SortieGranul as $id_tsp => $donnees_produit) {
            $heure = array_column($donnees_produit, 'heure');
            $AL = array_column($donnees_produit, 'AL');
            $P2O5_SE = array_column($donnees_produit, 'P2O5_SE');
            $H2O = array_column($donnees_produit, 'H2O');

            $tsp = DB::table('tsps_produits')->where('id_tsp', $id_tsp)->first();
            $ligne = DB::table('lignes')->where('id_ligne', $tsp->id_ligne)->first();
            $date_production = $ligne->date_production;
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;

            // créer le graphe
            $chart_data = [
                'labels' => $heure,
                'datasets' => [
                    [
                        'label' => ' AL',
                        'data' => $AL,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgba(255, 99, 132, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'P2O5_SE',
                        'data' => $P2O5_SE,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ],

                    [
                        'label' => 'H2O',
                        'data' => $H2O,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ]


                ]
            ];

            $graphe_par_produit_SortieGranul[$id_tsp]  = [
                'chart_data' => $chart_data,
                'date_production' => $date_production,
                'nom_ligne' => $nom_ligne,
                'nom_produit' => $nom_produit,
                'qlt' => $qlt,
            ];
        }




        $graphe_par_produit_TitreTsp = [];
        foreach ($grouped_data_TitreTsp as $id_tsp => $donnees_produit) {
            $heure = array_column($donnees_produit, 'heure');
            $H2O = array_column($donnees_produit, 'H2O');
            $AL_T = array_column($donnees_produit, 'AL_T');
            $P2O5_SE_T = array_column($donnees_produit, 'P2O5_SE_T');
            $P2O5_SE_CIT = array_column($donnees_produit, 'P2O5_SE_CIT');
            $TOT = array_column($donnees_produit, 'TOT');
            $h2O_T = array_column($donnees_produit, 'h2O_T');
            $H2O_B = array_column($donnees_produit, 'H2O_B');

            $tsp = DB::table('tsps_produits')->where('id_tsp', $id_tsp)->first();
            $ligne = DB::table('lignes')->where('id_ligne', $tsp->id_ligne)->first();
            $date_production = $ligne->date_production;
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;

            // créer le graphe
            $chart_data = [
                'labels' => $heure,
                'datasets' => [
                    [
                        'label' => ' H2O',
                        'data' => $H2O,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgba(255, 99, 132, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'AL_T',
                        'data' => $AL_T,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ],

                    [
                        'label' => 'P2O5_SE_T',
                        'data' => $P2O5_SE_T,
                        'backgroundColor' => 'rgba(255, 206, 86, 0.2)',
                        'borderColor' => 'rgba(255, 206, 86, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'P2O5_SE_CIT',
                        'data' => $P2O5_SE_CIT,
                        'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                        'borderColor' => 'rgba(75, 192, 192, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'TOT',
                        'data' => $TOT,
                        'backgroundColor' => 'rgba(153, 102, 255, 0.2)',
                        'borderColor' => 'rgba(153, 102, 255, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'h2O_T',
                        'data' => $h2O_T,
                        'backgroundColor' => 'rgba(255, 159, 64, 0.2)',
                        'borderColor' => 'rgba(255, 159, 64, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'H2O_B',
                        'data' => $H2O_B,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgba(255, 99, 132, 1)',
                        'borderWidth' => 1,
                    ],
                ]
            ];

            $graphe_par_produit_TitreTsp[$id_tsp] = [
                'chart_data' => $chart_data,
                'date_production' => $date_production,
                'nom_ligne' => $nom_ligne,
                'nom_produit' => $nom_produit,
                'qlt' => $qlt,
            ];
        }
        // pour chaque groupe de gran
        $graphe_par_produit_GranulometreTsp = [];
        foreach ($grouped_data_GranulometreTsp as $id_tsp => $donnees_produit) {
            $heure = array_column($donnees_produit, 'heure');
            $sup_6_3 = array_column($donnees_produit, 'sup_6_3');
            $sup_5 = array_column($donnees_produit, 'sup_5');
            $sup_4 = array_column($donnees_produit, 'sup_4');
            $sup_3_15 = array_column($donnees_produit, 'sup_3_15');
            $sup_2_5 = array_column($donnees_produit, 'sup_2_5');
            $sup_2 = array_column($donnees_produit, 'sup_2');
            $sup_1 = array_column($donnees_produit, 'sup_1');

            $tsp = DB::table('tsps_produits')->where('id_tsp', $id_tsp)->first();
            $ligne = DB::table('lignes')->where('id_ligne', $tsp->id_ligne)->first();
            $date_production = $ligne->date_production;
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;
            // créer le graphe PN
            $chart_data = [
                'labels' => $heure,
                'datasets' => [
                    [
                        'label' => 'sup_6_3',
                        'data' => $sup_6_3,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgba(255, 99, 132, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'sup_5',
                        'data' => $sup_5,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ],

                    [
                        'label' => 'sup_4',
                        'data' => $sup_4,
                        ' borderColor' => 'rgb(75, 192, 192)',
                        'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'sup_3_15',
                        'data' => $sup_3_15,
                        ' borderColor' => 'rgb(255, 0, 255)',
                        'backgroundColor' => 'rgba(255, 0, 255)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'sup_2_5',
                        'data' => $sup_2_5,
                        ' borderColor' => 'rgb(255, 255, 0) ',
                        'backgroundColor' => 'rgba(255, 255, 0)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'sup_2',
                        'data' => $sup_2,
                        ' borderColor' => 'rgb(0, 0, 255) ',
                        'backgroundColor' => 'rgba(0, 0, 255) ',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'sup_1',
                        'data' => $sup_1,
                        ' borderColor' => 'rgb(0, 255, 0) ',
                        'backgroundColor' => 'rgba(0, 255, 0)',
                        'borderWidth' => 1
                    ],




                ]
            ];

            $graphe_par_produit_GranulometreTsp[$id_tsp] = [
                'chart_data' => $chart_data,
                'date_production' => $date_production,
                'nom_ligne' => $nom_ligne,
                'nom_produit' => $nom_produit,
                'qlt' => $qlt,
            ];
        }

        return view('visualisation.visualisationTsp', compact('graphe_par_produit_Bouille', 'graphe_par_produit_SortieGranul', 'graphe_par_produit_TitreTsp', 'graphe_par_produit_GranulometreTsp'));
    }
    public function chartTspcont()
    {

        $donnees_Bouille = Bouille::select('heure', 'densite', 'AL_B', 'P2O5_SE_B', 'id_tsp')
            ->orderByDesc('id_bouillie')
            ->get()
            ->toArray();

        $donnees_SortieGranul = SortieGranul::select('heure', 'AL', 'P2O5_SE', 'H2O', 'id_tsp')
            ->orderByDesc('id_sortie')
            ->get()
            ->toArray();

        // récupérer les données depuis la table Titre
        $donnees_TitreTsp = TitreTsp::select('heure', 'H2O', 'AL_T', 'P2O5_SE_T', 'P2O5_SE_CIT', 'TOT', 'h2O_T', 'H2O_B', 'id_tsp')
            ->orderByDesc('id_titsp')
            ->get()
            ->toArray();
        //récupérer les données depuis la table gran
        $donnees_GranulometreTsp = GranulometreTsp::select('heure', 'sup_6_3', 'sup_5', 'sup_4', 'sup_3_15', 'sup_2_5', 'sup_2', 'sup_1', 'id_tsp')
            ->orderByDesc('id_grantsp')
            ->get()
            ->toArray();

        $grouped_data_Bouille = [];
        foreach ($donnees_Bouille as $donnees) {
            $id_tsp = $donnees['id_tsp'];

            if (!isset($grouped_data_Bouille[$id_tsp])) {
                $grouped_data_Bouille[$id_tsp] = [];
            }
            $grouped_data_Bouille[$id_tsp][] = [
                'heure' => $donnees['heure'],
                'densite' => $donnees['densite'],
                'AL_B' => $donnees['AL_B'],
                'P2O5_SE_B' => $donnees['P2O5_SE_B'],
            ];
        }



        $grouped_data_SortieGranul = [];
        foreach ($donnees_SortieGranul as $donnees) {
            $id_tsp = $donnees['id_tsp'];
            if (!isset($grouped_data_SortieGranul[$id_tsp])) {
                $grouped_data_SortieGranul[$id_tsp] = [];
            }
            $grouped_data_SortieGranul[$id_tsp][] = [
                'heure' => $donnees['heure'],
                'AL' => $donnees['AL'],
                'H2O' => $donnees['H2O'],
                'P2O5_SE' => $donnees['P2O5_SE'],



            ];
        }



        // regrouper les données par id_tsp titre

        $grouped_data_TitreTsp = [];
        foreach ($donnees_TitreTsp as $donnees) {
            $id_tsp = $donnees['id_tsp'];
            if (!isset($grouped_data_TitreTsp[$id_tsp])) {
                $grouped_data_TitreTsp[$id_tsp] = [];
            }
            $grouped_data_TitreTsp[$id_tsp][] = [
                'heure' => $donnees['heure'],
                'H2O' => $donnees['H2O'],
                'AL_T' => $donnees['AL_T'],
                'P2O5_SE_T' => $donnees['P2O5_SE_T'],
                'P2O5_SE_CIT' => $donnees['P2O5_SE_CIT'],
                'TOT' => $donnees['TOT'],
                'h2O_T' => $donnees['h2O_T'],
                'H2O_B' => $donnees['H2O_B'],
            ];
        }



        // regrouper les données par id_tsp grna 
        $grouped_data_GranulometreTsp = [];
        foreach ($donnees_GranulometreTsp as $donnees) {
            $id_tsp = $donnees['id_tsp'];
            if (!isset($grouped_data_GranulometreTsp[$id_tsp])) {
                $grouped_data_GranulometreTsp[$id_tsp] = [];
            }
            $grouped_data_GranulometreTsp[$id_tsp][] = [
                'heure' => $donnees['heure'],
                'sup_6_3' => $donnees['sup_6_3'],
                'sup_5' => $donnees['sup_5'],
                'sup_4' => $donnees['sup_4'],
                'sup_3_15' => $donnees['sup_3_15'],
                'sup_2_5' => $donnees['sup_2_5'],
                'sup_2' => $donnees['sup_2'],
                'sup_1' => $donnees['sup_1'],
            ];
        }




        // créer le graphe



        $graphe_par_produit_Bouille = [];
        foreach ($grouped_data_Bouille as $id_tsp => $donnees_produit) {
            $tsp = DB::table('tsps_produits')->where('id_tsp', $id_tsp)->first();
            $ligne = DB::table('lignes')->where('id_ligne', $tsp->id_ligne)->first();
            $date_production = $ligne->date_production;
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;

            $heure = array_column($donnees_produit, 'heure');
            $densite = array_column($donnees_produit, 'densite');
            $AL_B = array_column($donnees_produit, 'AL_B');
            $P2O5_SE_B = array_column($donnees_produit, 'P2O5_SE_B');
            // créer le graphe
            $chart_data = [
                'labels' => $heure,
                'datasets' => [
                    [
                        'label' => ' Densite',
                        'data' => $densite,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgba(255, 99, 132, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'AL_B',
                        'data' => $AL_B,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ],

                    [
                        'label' => 'P2O5_SE_B',
                        'data' => $P2O5_SE_B,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ]


                ]
            ];

            $graphe_par_produit_Bouille[$id_tsp] = [
                'chart_data' => $chart_data,
                'date_production' => $date_production,
                'nom_ligne' => $nom_ligne,
                'nom_produit' => $nom_produit,
                'qlt' => $qlt,
            ];
        }


        // regrouper pour tracer d09
        $graphe_par_produit_SortieGranul = [];
        foreach ($grouped_data_SortieGranul as $id_tsp => $donnees_produit) {
            $heure = array_column($donnees_produit, 'heure');
            $AL = array_column($donnees_produit, 'AL');
            $P2O5_SE = array_column($donnees_produit, 'P2O5_SE');
            $H2O = array_column($donnees_produit, 'H2O');

            $tsp = DB::table('tsps_produits')->where('id_tsp', $id_tsp)->first();
            $ligne = DB::table('lignes')->where('id_ligne', $tsp->id_ligne)->first();
            $date_production = $ligne->date_production;
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;

            // créer le graphe
            $chart_data = [
                'labels' => $heure,
                'datasets' => [
                    [
                        'label' => ' AL',
                        'data' => $AL,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgba(255, 99, 132, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'P2O5_SE',
                        'data' => $P2O5_SE,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ],

                    [
                        'label' => 'H2O',
                        'data' => $H2O,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ]


                ]
            ];

            $graphe_par_produit_SortieGranul[$id_tsp]  = [
                'chart_data' => $chart_data,
                'date_production' => $date_production,
                'nom_ligne' => $nom_ligne,
                'nom_produit' => $nom_produit,
                'qlt' => $qlt,
            ];
        }




        $graphe_par_produit_TitreTsp = [];
        foreach ($grouped_data_TitreTsp as $id_tsp => $donnees_produit) {
            $heure = array_column($donnees_produit, 'heure');
            $H2O = array_column($donnees_produit, 'H2O');
            $AL_T = array_column($donnees_produit, 'AL_T');
            $P2O5_SE_T = array_column($donnees_produit, 'P2O5_SE_T');
            $P2O5_SE_CIT = array_column($donnees_produit, 'P2O5_SE_CIT');
            $TOT = array_column($donnees_produit, 'TOT');
            $h2O_T = array_column($donnees_produit, 'h2O_T');
            $H2O_B = array_column($donnees_produit, 'H2O_B');

            $tsp = DB::table('tsps_produits')->where('id_tsp', $id_tsp)->first();
            $ligne = DB::table('lignes')->where('id_ligne', $tsp->id_ligne)->first();
            $date_production = $ligne->date_production;
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;

            // créer le graphe
            $chart_data = [
                'labels' => $heure,
                'datasets' => [
                    [
                        'label' => ' H2O',
                        'data' => $H2O,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgba(255, 99, 132, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'AL_T',
                        'data' => $AL_T,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ],

                    [
                        'label' => 'P2O5_SE_T',
                        'data' => $P2O5_SE_T,
                        'backgroundColor' => 'rgba(255, 206, 86, 0.2)',
                        'borderColor' => 'rgba(255, 206, 86, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'P2O5_SE_CIT',
                        'data' => $P2O5_SE_CIT,
                        'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                        'borderColor' => 'rgba(75, 192, 192, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'TOT',
                        'data' => $TOT,
                        'backgroundColor' => 'rgba(153, 102, 255, 0.2)',
                        'borderColor' => 'rgba(153, 102, 255, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'h2O_T',
                        'data' => $h2O_T,
                        'backgroundColor' => 'rgba(255, 159, 64, 0.2)',
                        'borderColor' => 'rgba(255, 159, 64, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'H2O_B',
                        'data' => $H2O_B,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgba(255, 99, 132, 1)',
                        'borderWidth' => 1,
                    ],
                ]
            ];

            $graphe_par_produit_TitreTsp[$id_tsp] = [
                'chart_data' => $chart_data,
                'date_production' => $date_production,
                'nom_ligne' => $nom_ligne,
                'nom_produit' => $nom_produit,
                'qlt' => $qlt,
            ];
        }
        // pour chaque groupe de gran
        $graphe_par_produit_GranulometreTsp = [];
        foreach ($grouped_data_GranulometreTsp as $id_tsp => $donnees_produit) {
            $heure = array_column($donnees_produit, 'heure');
            $sup_6_3 = array_column($donnees_produit, 'sup_6_3');
            $sup_5 = array_column($donnees_produit, 'sup_5');
            $sup_4 = array_column($donnees_produit, 'sup_4');
            $sup_3_15 = array_column($donnees_produit, 'sup_3_15');
            $sup_2_5 = array_column($donnees_produit, 'sup_2_5');
            $sup_2 = array_column($donnees_produit, 'sup_2');
            $sup_1 = array_column($donnees_produit, 'sup_1');

            $tsp = DB::table('tsps_produits')->where('id_tsp', $id_tsp)->first();
            $ligne = DB::table('lignes')->where('id_ligne', $tsp->id_ligne)->first();
            $date_production = $ligne->date_production;
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;
            // créer le graphe PN
            $chart_data = [
                'labels' => $heure,
                'datasets' => [
                    [
                        'label' => 'sup_6_3',
                        'data' => $sup_6_3,
                        'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                        'borderColor' => 'rgba(255, 99, 132, 1)',
                        'borderWidth' => 1,
                    ],
                    [
                        'label' => 'sup_5',
                        'data' => $sup_5,
                        'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                        'borderColor' => 'rgba(54, 162, 235, 1)',
                        'borderWidth' => 1,
                    ],

                    [
                        'label' => 'sup_4',
                        'data' => $sup_4,
                        ' borderColor' => 'rgb(75, 192, 192)',
                        'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'sup_3_15',
                        'data' => $sup_3_15,
                        ' borderColor' => 'rgb(255, 0, 255)',
                        'backgroundColor' => 'rgba(255, 0, 255)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'sup_2_5',
                        'data' => $sup_2_5,
                        ' borderColor' => 'rgb(255, 255, 0) ',
                        'backgroundColor' => 'rgba(255, 255, 0)',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'sup_2',
                        'data' => $sup_2,
                        ' borderColor' => 'rgb(0, 0, 255) ',
                        'backgroundColor' => 'rgba(0, 0, 255) ',
                        'borderWidth' => 1
                    ],
                    [
                        'label' => 'sup_1',
                        'data' => $sup_1,
                        ' borderColor' => 'rgb(0, 255, 0) ',
                        'backgroundColor' => 'rgba(0, 255, 0)',
                        'borderWidth' => 1
                    ],




                ]
            ];

            $graphe_par_produit_GranulometreTsp[$id_tsp] = [
                'chart_data' => $chart_data,
                'date_production' => $date_production,
                'nom_ligne' => $nom_ligne,
                'nom_produit' => $nom_produit,
                'qlt' => $qlt,
            ];
        }

        return view('visualisation.visualisationTspcont', compact('graphe_par_produit_Bouille', 'graphe_par_produit_SortieGranul', 'graphe_par_produit_TitreTsp', 'graphe_par_produit_GranulometreTsp'));
    }

    public function chartacide()
    {
        $donnees_produit = Acide::select('heure', 'Ref_bac', 'densite', 'temperature', 'P2O5', 'TS', 'SO4', 'cd', 'Mgo', 'Zn', 'saiseur', 'id_produit')
            ->orderByDesc('id_acide')
            ->get()
            ->toArray();
        $donnees_tsp = Acide::select('heure', 'Ref_bac', 'densite', 'temperature', 'P2O5', 'TS', 'SO4', 'cd', 'Mgo', 'Zn', 'saiseur', 'id_tsp')
            ->orderByDesc('id_acide')
            ->get()
            ->toArray();
        // regrouper les données par id_produit pour acide
        $grouped_data_acide = [];
        foreach ($donnees_produit as $donnees) {
            $id_produit = $donnees['id_produit'];
            if (!isset($grouped_data_acide[$id_produit])) {
                $grouped_data_acide[$id_produit] = [];
            }
            $grouped_data_acide[$id_produit][] = [
                'heure' => $donnees['heure'],
                'Ref_bac' => $donnees['Ref_bac'],
                'densite' => $donnees['densite'],
                'temperature' => $donnees['temperature'],
                'P2O5' => $donnees['P2O5'],
                'TS' => $donnees['TS'],
                'SO4' => $donnees['SO4'],
                'cd' => $donnees['cd'],
                'Mgo' => $donnees['Mgo'],
                'Zn' => $donnees['Zn'],
            ];
        }

        $graphe_par_produit_acide = [];
        foreach ($grouped_data_acide as $id_produit => $donnees_produit) {
            $heure = array_column($donnees_produit, 'heure');
            $Ref_bac = array_column($donnees_produit, 'Ref_bac');
            $densite = array_column($donnees_produit, 'densite');
            $temperature = array_column($donnees_produit, 'temperature');
            $P2O5 = array_column($donnees_produit, 'P2O5');
            $TS = array_column($donnees_produit, 'TS');
            $SO4 = array_column($donnees_produit, 'SO4');
            $cd = array_column($donnees_produit, 'cd');
            $Mgo = array_column($donnees_produit, 'Mgo');
            $Zn = array_column($donnees_produit, 'Zn');

            $produit = DB::table('produits')->where('id_produit', $id_produit)->first();
            if ($produit) {
                $ligne = DB::table('lignes')->where('id_ligne', $produit->id_ligne)->first();
                // dd($ligne);
                $date_production = $ligne->date_production;
                $nom_ligne = $ligne->nom_ligne;
                $nom_produit = $ligne->nom_produit;
                $qlt = $ligne->qlt;

                // créer le graphe acide
                $chart_data = [
                    'labels' => $heure,
                    'datasets' => [
                        [
                            'label' => ' Densite',
                            'data' => $Ref_bac,
                            'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                            'borderColor' => 'rgba(255, 99, 132, 1)',
                            'borderWidth' => 1,
                        ],
                        [
                            'label' => 'densite',
                            'data' => $densite,
                            'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                            'borderColor' => 'rgba(54, 162, 235, 1)',
                            'borderWidth' => 1,
                        ],


                        [
                            'label' => 'temperature',
                            'data' => $temperature,
                            'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                            'borderColor' => 'rgba(255, 99, 132, 1)',
                            'borderWidth' => 1,
                        ],
                        [
                            'label' => 'P2O5',
                            'data' => $P2O5,
                            'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                            'borderColor' => 'rgba(54, 162, 235, 1)',
                            'borderWidth' => 1,
                        ],

                        [
                            'label' => 'TS',
                            'data' => $TS,
                            ' borderColor' => 'rgb(75, 192, 192)',
                            'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                            'borderWidth' => 1
                        ],
                        [
                            'label' => 'SO4',
                            'data' => $SO4,
                            ' borderColor' => 'rgb(255, 0, 255)',
                            'backgroundColor' => 'rgba(255, 0, 255)',
                            'borderWidth' => 1
                        ],
                        [
                            'label' => 'cd',
                            'data' => $cd,
                            ' borderColor' => 'rgb(255, 255, 0) ',
                            'backgroundColor' => 'rgba(255, 255, 0)',
                            'borderWidth' => 1
                        ],
                        [
                            'label' => 'Mgo',
                            'data' => $Mgo,
                            ' borderColor' => 'rgb(0, 0, 255) ',
                            'backgroundColor' => 'rgba(0, 0, 255) ',
                            'borderWidth' => 1
                        ],
                        [
                            'label' => 'Zn',
                            'data' => $Zn,
                            ' borderColor' => 'rgb(0, 255, 0) ',
                            'backgroundColor' => 'rgba(0, 255, 0)',
                            'borderWidth' => 1
                        ],

                    ]
                ];

                $graphe_par_produit_acide[$id_produit] = [
                    'chart_data' => $chart_data,
                    'date_production' => $date_production,
                    'nom_ligne' => $nom_ligne,
                    'nom_produit' => $nom_produit,
                    'qlt' => $qlt,
                ];
            }
        }

        // regrouper les données par id_tsp pour acide
        $grouped_data_acide1 = [];
        foreach ($donnees_tsp as $donnees) {
            $id_tsp = $donnees['id_tsp'];
            if (!isset($grouped_data_acide1[$id_tsp])) {
                $grouped_data_acide1[$id_tsp] = [];
            }
            $grouped_data_acide1[$id_tsp][] = [
                'heure' => $donnees['heure'],
                'Ref_bac' => $donnees['Ref_bac'],
                'densite' => $donnees['densite'],
                'temperature' => $donnees['temperature'],
                'P2O5' => $donnees['P2O5'],
                'TS' => $donnees['TS'],
                'SO4' => $donnees['SO4'],
                'cd' => $donnees['cd'],
                'Mgo' => $donnees['Mgo'],
                'Zn' => $donnees['Zn'],
            ];
        }
        $graphe_par_produit_acide1 = [];
        foreach ($grouped_data_acide1 as $id_tsp => $donnees_tsp) {
            $heure = array_column($donnees_tsp, 'heure');
            $Ref_bac = array_column($donnees_tsp, 'Ref_bac');
            $densite = array_column($donnees_tsp, 'densite');
            $temperature = array_column($donnees_tsp, 'temperature');
            $P2O5 = array_column($donnees_tsp, 'P2O5');
            $TS = array_column($donnees_tsp, 'TS');
            $SO4 = array_column($donnees_tsp, 'SO4');
            $cd = array_column($donnees_tsp, 'cd');
            $Mgo = array_column($donnees_tsp, 'Mgo');
            $Zn = array_column($donnees_tsp, 'Zn');

            $tsps_produit = DB::table('tsps_produits')->where('id_tsp', $id_tsp)->first();
            if ($tsps_produit) {
                $ligne = DB::table('lignes')->where('id_ligne', $tsps_produit->id_ligne)->first();
                $date_production = $ligne->date_production;
                $nom_ligne = $ligne->nom_ligne;
                $nom_produit = $ligne->nom_produit;
                $qlt = $ligne->qlt;

                // créer le graphe acide
                $chart_data = [
                    'labels' => $heure,
                    'datasets' => [
                        [
                            'label' => ' Densite',
                            'data' => $Ref_bac,
                            'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                            'borderColor' => 'rgba(255, 99, 132, 1)',
                            'borderWidth' => 1,
                        ],
                        [
                            'label' => 'densite',
                            'data' => $densite,
                            'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                            'borderColor' => 'rgba(54, 162, 235, 1)',
                            'borderWidth' => 1,
                        ],


                        [
                            'label' => 'temperature',
                            'data' => $temperature,
                            'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                            'borderColor' => 'rgba(255, 99, 132, 1)',
                            'borderWidth' => 1,
                        ],
                        [
                            'label' => 'P2O5',
                            'data' => $P2O5,
                            'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                            'borderColor' => 'rgba(54, 162, 235, 1)',
                            'borderWidth' => 1,
                        ],

                        [
                            'label' => 'TS',
                            'data' => $TS,
                            ' borderColor' => 'rgb(75, 192, 192)',
                            'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                            'borderWidth' => 1
                        ],
                        [
                            'label' => 'SO4',
                            'data' => $SO4,
                            ' borderColor' => 'rgb(255, 0, 255)',
                            'backgroundColor' => 'rgba(255, 0, 255)',
                            'borderWidth' => 1
                        ],
                        [
                            'label' => 'cd',
                            'data' => $cd,
                            ' borderColor' => 'rgb(255, 255, 0) ',
                            'backgroundColor' => 'rgba(255, 255, 0)',
                            'borderWidth' => 1
                        ],
                        [
                            'label' => 'Mgo',
                            'data' => $Mgo,
                            ' borderColor' => 'rgb(0, 0, 255) ',
                            'backgroundColor' => 'rgba(0, 0, 255) ',
                            'borderWidth' => 1
                        ],
                        [
                            'label' => 'Zn',
                            'data' => $Zn,
                            ' borderColor' => 'rgb(0, 255, 0) ',
                            'backgroundColor' => 'rgba(0, 255, 0)',
                            'borderWidth' => 1
                        ],

                    ]
                ];

                $graphe_par_produit_acide1[$id_tsp] = [
                    'chart_data' => $chart_data,
                    'date_production' => $date_production,
                    'nom_ligne' => $nom_ligne,
                    'nom_produit' => $nom_produit,
                    'qlt' => $qlt,
                ];
            }
        }

        return view('visualisation.visualisation_acide', compact('graphe_par_produit_acide', 'graphe_par_produit_acide1'));
    }
    public function chartacidecont()
    {
        $donnees_produit = Acide::select('heure', 'Ref_bac', 'densite', 'temperature', 'P2O5', 'TS', 'SO4', 'cd', 'Mgo', 'Zn', 'saiseur', 'id_produit')
            ->orderByDesc('id_acide')
            ->get()
            ->toArray();
        $donnees_tsp = Acide::select('heure', 'Ref_bac', 'densite', 'temperature', 'P2O5', 'TS', 'SO4', 'cd', 'Mgo', 'Zn', 'saiseur', 'id_tsp')
            ->orderByDesc('id_acide')
            ->get()
            ->toArray();
        // regrouper les données par id_produit pour acide
        $grouped_data_acide = [];
        foreach ($donnees_produit as $donnees) {
            $id_produit = $donnees['id_produit'];
            if (!isset($grouped_data_acide[$id_produit])) {
                $grouped_data_acide[$id_produit] = [];
            }
            $grouped_data_acide[$id_produit][] = [
                'heure' => $donnees['heure'],
                'Ref_bac' => $donnees['Ref_bac'],
                'densite' => $donnees['densite'],
                'temperature' => $donnees['temperature'],
                'P2O5' => $donnees['P2O5'],
                'TS' => $donnees['TS'],
                'SO4' => $donnees['SO4'],
                'cd' => $donnees['cd'],
                'Mgo' => $donnees['Mgo'],
                'Zn' => $donnees['Zn'],
            ];
        }

        $graphe_par_produit_acide = [];
        foreach ($grouped_data_acide as $id_produit => $donnees_produit) {
            $heure = array_column($donnees_produit, 'heure');
            $Ref_bac = array_column($donnees_produit, 'Ref_bac');
            $densite = array_column($donnees_produit, 'densite');
            $temperature = array_column($donnees_produit, 'temperature');
            $P2O5 = array_column($donnees_produit, 'P2O5');
            $TS = array_column($donnees_produit, 'TS');
            $SO4 = array_column($donnees_produit, 'SO4');
            $cd = array_column($donnees_produit, 'cd');
            $Mgo = array_column($donnees_produit, 'Mgo');
            $Zn = array_column($donnees_produit, 'Zn');

            $produit = DB::table('produits')->where('id_produit', $id_produit)->first();
            if ($produit) {
                $ligne = DB::table('lignes')->where('id_ligne', $produit->id_ligne)->first();
                // dd($ligne);
                $date_production = $ligne->date_production;
                $nom_ligne = $ligne->nom_ligne;
                $nom_produit = $ligne->nom_produit;
                $qlt = $ligne->qlt;

                // créer le graphe acide
                $chart_data = [
                    'labels' => $heure,
                    'datasets' => [
                        [
                            'label' => ' Densite',
                            'data' => $Ref_bac,
                            'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                            'borderColor' => 'rgba(255, 99, 132, 1)',
                            'borderWidth' => 1,
                        ],
                        [
                            'label' => 'densite',
                            'data' => $densite,
                            'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                            'borderColor' => 'rgba(54, 162, 235, 1)',
                            'borderWidth' => 1,
                        ],


                        [
                            'label' => 'temperature',
                            'data' => $temperature,
                            'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                            'borderColor' => 'rgba(255, 99, 132, 1)',
                            'borderWidth' => 1,
                        ],
                        [
                            'label' => 'P2O5',
                            'data' => $P2O5,
                            'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                            'borderColor' => 'rgba(54, 162, 235, 1)',
                            'borderWidth' => 1,
                        ],

                        [
                            'label' => 'TS',
                            'data' => $TS,
                            ' borderColor' => 'rgb(75, 192, 192)',
                            'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                            'borderWidth' => 1
                        ],
                        [
                            'label' => 'SO4',
                            'data' => $SO4,
                            ' borderColor' => 'rgb(255, 0, 255)',
                            'backgroundColor' => 'rgba(255, 0, 255)',
                            'borderWidth' => 1
                        ],
                        [
                            'label' => 'cd',
                            'data' => $cd,
                            ' borderColor' => 'rgb(255, 255, 0) ',
                            'backgroundColor' => 'rgba(255, 255, 0)',
                            'borderWidth' => 1
                        ],
                        [
                            'label' => 'Mgo',
                            'data' => $Mgo,
                            ' borderColor' => 'rgb(0, 0, 255) ',
                            'backgroundColor' => 'rgba(0, 0, 255) ',
                            'borderWidth' => 1
                        ],
                        [
                            'label' => 'Zn',
                            'data' => $Zn,
                            ' borderColor' => 'rgb(0, 255, 0) ',
                            'backgroundColor' => 'rgba(0, 255, 0)',
                            'borderWidth' => 1
                        ],

                    ]
                ];

                $graphe_par_produit_acide[$id_produit] = [
                    'chart_data' => $chart_data,
                    'date_production' => $date_production,
                    'nom_ligne' => $nom_ligne,
                    'nom_produit' => $nom_produit,
                    'qlt' => $qlt,
                ];
            }
        }

        // regrouper les données par id_tsp pour acide
        $grouped_data_acide1 = [];
        foreach ($donnees_tsp as $donnees) {
            $id_tsp = $donnees['id_tsp'];
            if (!isset($grouped_data_acide1[$id_tsp])) {
                $grouped_data_acide1[$id_tsp] = [];
            }
            $grouped_data_acide1[$id_tsp][] = [
                'heure' => $donnees['heure'],
                'Ref_bac' => $donnees['Ref_bac'],
                'densite' => $donnees['densite'],
                'temperature' => $donnees['temperature'],
                'P2O5' => $donnees['P2O5'],
                'TS' => $donnees['TS'],
                'SO4' => $donnees['SO4'],
                'cd' => $donnees['cd'],
                'Mgo' => $donnees['Mgo'],
                'Zn' => $donnees['Zn'],
            ];
        }
        $graphe_par_produit_acide1 = [];
        foreach ($grouped_data_acide1 as $id_tsp => $donnees_tsp) {
            $heure = array_column($donnees_tsp, 'heure');
            $Ref_bac = array_column($donnees_tsp, 'Ref_bac');
            $densite = array_column($donnees_tsp, 'densite');
            $temperature = array_column($donnees_tsp, 'temperature');
            $P2O5 = array_column($donnees_tsp, 'P2O5');
            $TS = array_column($donnees_tsp, 'TS');
            $SO4 = array_column($donnees_tsp, 'SO4');
            $cd = array_column($donnees_tsp, 'cd');
            $Mgo = array_column($donnees_tsp, 'Mgo');
            $Zn = array_column($donnees_tsp, 'Zn');

            $tsps_produit = DB::table('tsps_produits')->where('id_tsp', $id_tsp)->first();
            if ($tsps_produit) {
                $ligne = DB::table('lignes')->where('id_ligne', $tsps_produit->id_ligne)->first();
                $date_production = $ligne->date_production;
                $nom_ligne = $ligne->nom_ligne;
                $nom_produit = $ligne->nom_produit;
                $qlt = $ligne->qlt;

                // créer le graphe acide
                $chart_data = [
                    'labels' => $heure,
                    'datasets' => [
                        [
                            'label' => ' Densite',
                            'data' => $Ref_bac,
                            'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                            'borderColor' => 'rgba(255, 99, 132, 1)',
                            'borderWidth' => 1,
                        ],
                        [
                            'label' => 'densite',
                            'data' => $densite,
                            'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                            'borderColor' => 'rgba(54, 162, 235, 1)',
                            'borderWidth' => 1,
                        ],


                        [
                            'label' => 'temperature',
                            'data' => $temperature,
                            'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                            'borderColor' => 'rgba(255, 99, 132, 1)',
                            'borderWidth' => 1,
                        ],
                        [
                            'label' => 'P2O5',
                            'data' => $P2O5,
                            'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                            'borderColor' => 'rgba(54, 162, 235, 1)',
                            'borderWidth' => 1,
                        ],

                        [
                            'label' => 'TS',
                            'data' => $TS,
                            ' borderColor' => 'rgb(75, 192, 192)',
                            'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                            'borderWidth' => 1
                        ],
                        [
                            'label' => 'SO4',
                            'data' => $SO4,
                            ' borderColor' => 'rgb(255, 0, 255)',
                            'backgroundColor' => 'rgba(255, 0, 255)',
                            'borderWidth' => 1
                        ],
                        [
                            'label' => 'cd',
                            'data' => $cd,
                            ' borderColor' => 'rgb(255, 255, 0) ',
                            'backgroundColor' => 'rgba(255, 255, 0)',
                            'borderWidth' => 1
                        ],
                        [
                            'label' => 'Mgo',
                            'data' => $Mgo,
                            ' borderColor' => 'rgb(0, 0, 255) ',
                            'backgroundColor' => 'rgba(0, 0, 255) ',
                            'borderWidth' => 1
                        ],
                        [
                            'label' => 'Zn',
                            'data' => $Zn,
                            ' borderColor' => 'rgb(0, 255, 0) ',
                            'backgroundColor' => 'rgba(0, 255, 0)',
                            'borderWidth' => 1
                        ],

                    ]
                ];

                $graphe_par_produit_acide1[$id_tsp] = [
                    'chart_data' => $chart_data,
                    'date_production' => $date_production,
                    'nom_ligne' => $nom_ligne,
                    'nom_produit' => $nom_produit,
                    'qlt' => $qlt,
                ];
            }
        }

        return view('visualisation.visualisation_acidecont', compact('graphe_par_produit_acide', 'graphe_par_produit_acide1'));
    }
    //fonction pour affichage des produits TSP
    public function recupererDonneestsps()
    {
        // Récupérer tous les id_tsp de la table "tspsproduits"
        $tsp_produits = DB::table('tsps_produits')
            ->orderByDesc('id_tsp')
            ->get();

        // Initialiser un tableau pour stocker les données pour chaque id_tsp et chaque heure
        $donnees_par_tsp_et_par_heure = [];

        foreach ($tsp_produits as $tsp_produit) {
            $donnees_par_tsp = [];
            $id_tsp = $tsp_produit->id_tsp;
            $id_ligne = $tsp_produit->id_ligne;

            $ligne = DB::table('lignes')->where('id_ligne', $id_ligne)->first();
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;
            $date_saisi = $ligne->date_production;

            $heures = DB::table('bouilles')
                ->select(DB::raw('heure'))
                ->where('id_tsp', '=', $id_tsp)
                ->orderBy('created_at')
                ->distinct()
                ->pluck('heure');

            foreach ($heures as $heure) {
                // Récupérer toutes les données pour chaque id_tsp et chaque heure
                $resultats = DB::table('tsps_produits')
                    ->leftJoin('bouilles', function ($join) use ($id_tsp, $heure) {
                        $join->on('tsps_produits.id_tsp', '=', 'bouilles.id_tsp')
                            ->where('bouilles.id_tsp', '=', $id_tsp)
                            ->where(DB::raw('bouilles.heure'), '=', $heure);
                    })
                    ->leftJoin('sortie_granuls', function ($join) use ($id_tsp, $heure) {
                        $join->on('tsps_produits.id_tsp', '=', 'sortie_granuls.id_tsp')
                            ->where('sortie_granuls.id_tsp', '=', $id_tsp)
                            ->where(DB::raw('sortie_granuls.heure'), '=', $heure);
                    })
                    ->leftJoin('titre_tsps', function ($join) use ($id_tsp, $heure) {
                        $join->on('tsps_produits.id_tsp', '=', 'titre_tsps.id_tsp')
                            ->where('titre_tsps.id_tsp', '=', $id_tsp)
                            ->where(DB::raw('titre_tsps.heure'), '=', $heure);
                    })
                    ->leftJoin('granulometres_tsps', function ($join) use ($id_tsp, $heure) {
                        $join->on('tsps_produits.id_tsp', '=', 'granulometres_tsps.id_tsp')
                            ->where('granulometres_tsps.id_tsp', '=', $id_tsp)
                            ->where(DB::raw('granulometres_tsps.heure'), '=', $heure);
                    })
                    ->select(
                        'tsps_produits.id_tsp',
                        'bouilles.id_bouillie',
                        'bouilles.densite',
                        'bouilles.AL_B',
                        'bouilles.P2O5_SE_B',
                        'bouilles.heure',
                        'bouilles.saiseur',
                        'sortie_granuls.id_sortie',
                        'sortie_granuls.AL',
                        'sortie_granuls.P2O5_SE',
                        'sortie_granuls.H2O',
                        'titre_tsps.id_titsp',
                        'titre_tsps.H2O',
                        'titre_tsps.AL_T',
                        'titre_tsps.P2O5_SE_T',
                        'titre_tsps.P2O5_SE_CIT',
                        'titre_tsps.TOT',
                        'titre_tsps.h2O_T',
                        'titre_tsps.H2O_B',
                        'granulometres_tsps.id_grantsp',
                        'granulometres_tsps.sup_6_3',
                        'granulometres_tsps.sup_5',
                        'granulometres_tsps.sup_4',
                        'granulometres_tsps.sup_3_15',
                        'granulometres_tsps.sup_2_5',
                        'granulometres_tsps.sup_2',
                        'granulometres_tsps.sup_1'
                    )
                    ->where('tsps_produits.id_tsp', '=', $id_tsp)
                    ->get();
                // Stocker les résultats dans le tableau $donnees_par_tsp_et_par_heure
                if (!empty($resultats))
                    $donnees_par_tsp[$heure] = $resultats;
                else {
                    $donnees_par_tsp[$heure] = null;
                }
            }
            if (!empty($donnees_par_tsp)) {
                $donnees_par_tsp_et_par_heure[$id_tsp] = [
                    'nom_ligne' => $nom_ligne,
                    'nom_produit' => $nom_produit,
                    'qlt' => $qlt,
                    'date_saisi' => $date_saisi,
                    'donnees' => $donnees_par_tsp,
                ];
            }
        }
        // dd($donnees_par_tsp_et_par_heure);
        return $donnees_par_tsp_et_par_heure;
    }
    //analyst
    public function recupererDonneestsp()
    {
        $donnees_par_tsp_et_par_heure = $this->recupererDonneestsps();
        return view('affiche.affiche_produittsp', ['donnees_par_tsp_et_par_heure' => $donnees_par_tsp_et_par_heure]);
    }
    //controleur
    public function recupererDonneestspcont()
    {
        $donnees_par_tsp_et_par_heure = $this->recupererDonneestsps();
        return view('controleur.cont_produittsp', ['donnees_par_tsp_et_par_heure' => $donnees_par_tsp_et_par_heure]);
    }

    //fonction pour affichage des produits
    public function recupererDonneesproduits()
    {
        // Récupérer tous les id_tsp de la table "tspsproduits"
        $produits = DB::table('produits')
            ->orderByDesc('id_produit')
            ->get();

        // Initialiser un tableau pour stocker les données pour chaque id_tsp et chaque heure
        $donnees_par_produit_et_par_heure = [];

        foreach ($produits as $produit) {
            $donnees_par_produit = [];
            $id_produit = $produit->id_produit;
            $id_ligne = $produit->id_ligne;

            $ligne = DB::table('lignes')->where('id_ligne', $id_ligne)->first();
            $nom_ligne = $ligne->nom_ligne;
            $nom_produit = $ligne->nom_produit;
            $qlt = $ligne->qlt;
            $date_saisi = $ligne->date_production;

            $heures = DB::table('p_n_s')
                ->select(DB::raw('heure'))
                ->where('id_produit', '=', $id_produit)
                ->orderBy('created_at')
                ->distinct()
                ->pluck('heure');

            foreach ($heures as $heure) {
                // Récupérer toutes les données pour chaque id_tsp et chaque heure
                $resultats = DB::table('produits')
                    ->leftJoin('p_n_s', function ($join) use ($id_produit, $heure) {
                        $join->on('produits.id_produit', '=', 'p_n_s.id_produit')
                            ->where('p_n_s.id_produit', '=', $id_produit)
                            ->where(DB::raw('p_n_s.heure'), '=', $heure);
                    })
                    ->leftJoin('d03s', function ($join) use ($id_produit, $heure) {
                        $join->on('produits.id_produit', '=', 'd03s.id_produit')
                            ->where('d03s.id_produit', '=', $id_produit)
                            ->where(DB::raw('d03s.heure'), '=', $heure);
                    })
                    ->leftJoin('d05s', function ($join) use ($id_produit, $heure) {
                        $join->on('produits.id_produit', '=', 'd05s.id_produit')
                            ->where('d05s.id_produit', '=', $id_produit)
                            ->where(DB::raw('d05s.heure'), '=', $heure);
                    })
                    ->leftJoin('d09s', function ($join) use ($id_produit, $heure) {
                        $join->on('produits.id_produit', '=', 'd09s.id_produit')
                            ->where('d09s.id_produit', '=', $id_produit)
                            ->where(DB::raw('d09s.heure'), '=', $heure);
                    })
                    ->leftJoin('d10s', function ($join) use ($id_produit, $heure) {
                        $join->on('produits.id_produit', '=', 'd10s.id_produit')
                            ->where('d10s.id_produit', '=', $id_produit)
                            ->where(DB::raw('d10s.heure'), '=', $heure);
                    })
                    ->leftJoin('sags', function ($join) use ($id_produit, $heure) {
                        $join->on('produits.id_produit', '=', 'sags.id_produit')
                            ->where('sags.id_produit', '=', $id_produit)
                            ->where(DB::raw('sags.heure'), '=', $heure);
                    })
                    ->leftJoin('r02s', function ($join) use ($id_produit, $heure) {
                        $join->on('produits.id_produit', '=', 'r02s.id_produit')
                            ->where('r02s.id_produit', '=', $id_produit)
                            ->where(DB::raw('r02s.heure'), '=', $heure);
                    })
                    ->leftJoin('granulometres', function ($join) use ($id_produit, $heure) {
                        $join->on('produits.id_produit', '=', 'granulometres.id_produit')
                            ->where('granulometres.id_produit', '=', $id_produit)
                            ->where(DB::raw('granulometres.heure'), '=', $heure);
                    })
                    ->leftJoin('titres', function ($join) use ($id_produit, $heure) {
                        $join->on('produits.id_produit', '=', 'titres.id_produit')
                            ->where('titres.id_produit', '=', $id_produit)
                            ->where(DB::raw('titres.heure'), '=', $heure);
                    })
                    ->select(
                        'produits.id_produit',
                        'p_n_s.id_pn',
                        'p_n_s.pn_densite',
                        'p_n_s.pn_rm',
                        'p_n_s.heure',
                        'p_n_s.saiseur',
                        'd03s.id_d03',
                        'd03s.d03_densite',
                        'd03s.d03_rm',
                        'r02s.id_r02',
                        'r02s.r02_densite',
                        'r02s.r02_rm',
                        'sags.id_sag',
                        'sags.sag_rm',
                        'd05s.id_d05',
                        'd05s.d05_densite',
                        'd05s.d05_rm',
                        'd09s.id_d09',
                        'd09s.d09_densite',
                        'd09s.d09_rm',
                        'd10s.id_d10',
                        'd10s.d10_ph',
                        'titres.id_titre',
                        'titres.ammonical',
                        'titres.p2o5',
                        'titres.h2o',
                        'titres.zn',
                        'titres.s',
                        'titres.cd',
                        'titres.p2o5_tot',
                        'titres.temperature',
                        'granulometres.id_gran',
                        'granulometres.sup_5',
                        'granulometres.sup_4_75',
                        'granulometres.sup_4',
                        'granulometres.sup_3_15',
                        'granulometres.sup_2_5',
                        'granulometres.sup_2',
                        'granulometres.sup_1'
                    )
                    ->where('produits.id_produit', '=', $id_produit)
                    ->get();
                // Stocker les résultats dans le tableau $donnees_par_tsp_et_par_heure
                if (!empty($resultats))
                    $donnees_par_produit[$heure] = $resultats;
                else {
                    $donnees_par_produit[$heure] = null;
                }
            }
            if (!empty($donnees_par_produit)) {
                $donnees_par_produit_et_par_heure[$id_produit] = [
                    'nom_ligne' => $nom_ligne,
                    'nom_produit' => $nom_produit,
                    'qlt' => $qlt,
                    'date_saisi' => $date_saisi,
                    'donnees' => $donnees_par_produit,
                ];
            }
        }
        return $donnees_par_produit_et_par_heure;
    }
    //analyst
    public function recupererDonneesproduit()
    {

        $donnees_par_produit_et_par_heure = $this->recupererDonneesproduits();
        return view('affiche.affiche_produits', ['donnees_par_produit_et_par_heure' => $donnees_par_produit_et_par_heure]);
    }
    //controleur
    public function recupererDonneesproduitcont()
    {

        $donnees_par_produit_et_par_heure = $this->recupererDonneesproduits();
        return view('controleur.cont_produits', ['donnees_par_produit_et_par_heure' => $donnees_par_produit_et_par_heure]);
    }


    //afficher moyenne tsp
    public function getResultatsmoyennetsps()
    {
        $resultattsp = [];
        $resultattsps = [];
        $tsp_produits = DB::table('tsps_produits')
            ->orderByDesc('id_tsp')
            ->get();

        foreach ($tsp_produits as $tsp_produit) {
            $id_ligne = $tsp_produit->id_ligne;
            $ligne = DB::table('lignes')->where('id_ligne', $id_ligne)->first();

            $id_tsp = $tsp_produit->id_tsp;
            $moyenne = DB::table('moyenne_tsps')->where('id_tsp', $id_tsp)->first();

            if ($moyenne) {
                $resultattsp = [
                    'id_moytsp' => $moyenne->id_moytsp,
                    'nom_ligne' => $ligne->nom_ligne,
                    'qlt' => $ligne->qlt,
                    'nom_produit' => $ligne->nom_produit,
                    'AL' => $moyenne->AL,
                    'P2O5_SE' => $moyenne->P2O5_SE,
                    'p2O5_SE_C' => $moyenne->p2O5_SE_C,
                    'TOT' => $moyenne->TOT,
                    'H2O_T'    => $moyenne->H2O_T,
                    'H2O_B' => $moyenne->H2O_B,
                    'sup_6_3' => $moyenne->sup_6_3,
                    'sup_5' => $moyenne->sup_5,
                    'sup_4' => $moyenne->sup_4,
                    'sup_3_15' => $moyenne->sup_3_15,
                    'sup_2_5' => $moyenne->sup_2_5,
                    'sup_2' => $moyenne->sup_2,
                    'sup_1' => $moyenne->sup_1,
                    'date_saisi' => $moyenne->date_saisi,
                    'saiseur' => $moyenne->saiseur,
                ];

                $resultattsps[] = $resultattsp;
            }
        }
        return  $resultattsps;
    }

    //analyst
    public function getResultatsmoyennetsp()
    {

        $resultattsps = $this->getResultatsmoyennetsps();
        return view('affiche.affiche_moyennestsp', ['resultattsps' => $resultattsps]);
    }
    //controleur
    public function getResultatsmoyennetspcont()
    {

        $resultattsps = $this->getResultatsmoyennetsps();
        return view('controleur.cont_moyennestsp', ['resultattsps' => $resultattsps]);
    }

    //afficher moyenne produit
    public function getResultatsmoyenneproduits()
    {
        $resultatproduits = [];

        $produits = DB::table('produits')
            ->orderByDesc('id_produit')
            ->get();

        foreach ($produits as $produit) {
            $id_ligne = $produit->id_ligne;
            $ligne = DB::table('lignes')->where('id_ligne', $id_ligne)->first();

            $id_produit = $produit->id_produit;
            $moyenne = DB::table('moyennes')->where('id_produit', $id_produit)->first();

            if ($moyenne) {
                $resultatproduit = [
                    'id_moy' => $moyenne->id_moy,
                    'nom_ligne' => $ligne->nom_ligne,
                    'qlt' => $ligne->qlt,
                    'nom_produit' => $ligne->nom_produit,
                    'ammonical' => $moyenne->ammonical,
                    'p2o5' => $moyenne->p2o5,
                    'p2o5_tot' => $moyenne->p2o5_tot,
                    'p2o5_SE_C' => $moyenne->p2o5_SE_C,
                    'h2o'    => $moyenne->h2o,
                    'zn' => $moyenne->zn,
                    's' => $moyenne->s,
                    'sup_5' => $moyenne->sup_5,
                    'sup_4_75' => $moyenne->sup_4_75,
                    'sup_4' => $moyenne->sup_4,
                    'sup_3_15' => $moyenne->sup_3_15,
                    'sup_2_5' => $moyenne->sup_2_5,
                    'sup_2' => $moyenne->sup_2,
                    'sup_1' => $moyenne->sup_1,
                    'date_saisi' => $moyenne->date_saisi,
                    'saiseur' => $moyenne->saiseur,
                ];

                $resultatproduits[] = $resultatproduit;
            }
        }
        return  $resultatproduits;
    }
    //analyste
    public function getResultatsmoyenneproduit()
    {

        $resultatproduits = $this->getResultatsmoyenneproduits();
        return view('affiche.affiche_moyennesproduits', ['resultatproduits' => $resultatproduits]);
    }
    //controleur
    public function getResultatsmoyenneproduitcont()
    {

        $resultatproduits = $this->getResultatsmoyenneproduits();
        return view('controleur.cont_moyennes', ['resultatproduits' => $resultatproduits]);
    }
}
