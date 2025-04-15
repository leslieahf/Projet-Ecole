<?php

namespace App\Http\Controllers;

use App\Models\Utilisateurs;
use App\Models\Objets;
use Barryvdh\DomPDF\Facade\Pdf;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


class RapportGestionController extends Controller
{
    public function generatePDF()
    {
        // Récupérer les données des utilisateurs
        $utilisateurs = Utilisateurs::select('login', 'nbre_connexions', 'nbre_consultations')->get();
        
        // Récupérer les données des objets
        $objets = Objets::select('id', 'conso_wh','nbre_utilisations')->get();

        // Récupérer les objets avec la consommation la plus élevée par type
        $max_conso_imprimante = Objets::where('type', 'Imprimante')->orderBy('conso_wh', 'desc')->first();
        $max_conso_projecteur = Objets::where('type', 'Projecteur')->orderBy('conso_wh', 'desc')->first();
        $max_conso_poubelle = Objets::where('type', 'Poubelle')->orderBy('conso_wh', 'desc')->first();
        $max_conso_serrure = Objets::where('type', 'Serrure')->orderBy('conso_wh', 'desc')->first();
        $max_conso_radiateur = Objets::where('type', 'Radiateur')->orderBy('conso_wh', 'desc')->first();

        // Récupérer les objets les plus utilisés par type
        $max_utilisations_imprimante = Objets::where('type', 'Imprimante')->orderBy('nbre_utilisations', 'desc')->first();
        $max_utilisations_projecteur = Objets::where('type', 'Projecteur')->orderBy('nbre_utilisations', 'desc')->first();
        $max_utilisations_poubelle = Objets::where('type', 'Poubelle')->orderBy('nbre_utilisations', 'desc')->first();
        $max_utilisations_serrure = Objets::where('type', 'Serrure')->orderBy('nbre_utilisations', 'desc')->first();
        $max_utilisations_radiateur = Objets::where('type', 'Radiateur')->orderBy('nbre_utilisations', 'desc')->first();

        $total_conso = Objets::sum('conso_Wh'); // Somme de la colonne 'conso_Wh'
        $total_connexions = Utilisateurs::sum('nbre_connexions');
        $total_utilisateurs = Utilisateurs::count('login');
        $total_objets = Objets::count('id');
        $total_imprimantes =  Objets::where('type', 'Imprimante')->count();
        $total_projecteurs =  Objets::where('type', 'Projecteur')->count();
        $total_poubelles =  Objets::where('type', 'Poubelle')->count();
        $total_serrures =  Objets::where('type', 'Serrure')->count();
        $total_radiateurs =  Objets::where('type', 'Radiateur')->count();
        $moy_connexions = round($total_connexions/$total_utilisateurs,1);

        /* 
        // Graphe
                // Générer des couleurs aléatoires
                $colors = [];
                foreach ($utilisateurs as $utilisateur) {
                    //$colors[] = '#' . substr(md5(rand()), 0, 6); // Génère une couleur aléatoire en hexadécimal
                    $colors[] = '#' . substr(sha1(uniqid(rand(), true)), 0, 6); // Génère une couleur aléatoire en hexadécimal
        
                }
                // Configuration du premier graphique avec l'axe X = pseudo et l'axe Y = nbre_connexions
                $chart_options = [
                    'chart_title' => "Nombre de connexions par utilisateur",
                    'report_type' => 'group_by_string',
                    'model' => 'App\Models\Utilisateurs',
                    'group_by_field' => 'login',
                    'aggregate_function' => 'sum',
                    'aggregate_field' => 'nbre_connexions',
                    'chart_type' => 'bar',
                    'backgroundColor' => $colors, // Définition des couleurs ici
                    'labels' => $utilisateurs->pluck('login')->toArray(),
                ];
                
                $chart1 = new LaravelChart($chart_options);
        */

        // Générer le PDF
        $pdf = PDF::loadView('rapportgestion', [
            'utilisateurs' => $utilisateurs,
            'objets' => $objets,
            'total_conso' => $total_conso,
            'total_connexions' => $total_connexions,
            'total_utilisateurs' => $total_utilisateurs,
            'total_objets' => $total_objets,
            'total_imprimantes' => $total_imprimantes,
            'total_projecteurs' => $total_projecteurs,
            'total_poubelles' => $total_poubelles,
            'total_serrures' => $total_serrures,
            'total_radiateurs' => $total_radiateurs,
            'moy_connexions' => $moy_connexions,
            //'chart1' => $chart1,
            'max_conso_imprimante' => $max_conso_imprimante,
            'max_conso_projecteur' => $max_conso_projecteur,
            'max_conso_poubelle' => $max_conso_poubelle,
            'max_conso_serrure' => $max_conso_serrure,
            'max_conso_radiateur' => $max_conso_radiateur,
            'max_utilisations_imprimante' => $max_utilisations_imprimante ,
            'max_utilisations_projecteur' => $max_utilisations_projecteur,
            'max_utilisations_poubelle' => $max_utilisations_poubelle ,
            'max_utilisations_serrure' => $max_utilisations_serrure ,
            'max_utilisations_radiateur' => $max_utilisations_radiateur, 
        ]);

        return $pdf->download('rapportgestion.pdf');
    }
} 