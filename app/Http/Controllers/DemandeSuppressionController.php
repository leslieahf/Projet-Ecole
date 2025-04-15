<?php

namespace App\Http\Controllers;

use App\Models\Utilisateurs;
use App\Models\Objets;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemandeSuppression;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DemandeSuppressionController extends Controller
{

    public function showlisteobjetsEtGraphe()
    {
        $utilisateurs = Utilisateurs::all();
        $objets = Objets::all();
        $imprimantes =  Objets::where('type', 'Imprimante');
        $projecteurs =  Objets::where('type', 'Projecteur');
        $poubelles =  Objets::where('type', 'Poubelle');
        $serrures =  Objets::where('type', 'Serrure');
        $radiateurs =  Objets::where('type', 'Radiateur');

        $total_conso = Objets::sum('conso_Wh'); // Somme de la colonne 'conso_Wh'
        $total_connexions = Utilisateurs::sum('nbre_connexions');
        $total_utilisateurs = Utilisateurs::count('login');
        $total_objets = Utilisateurs::count('id');


        // Calcul de la consommation totale par type d'objet
        $total_imprimantes = Objets::where('type', 'Imprimante')->sum('conso_Wh');
        $total_projecteurs = Objets::where('type', 'Projecteur')->sum('conso_Wh');
        $total_poubelles = Objets::where('type', 'Poubelle')->sum('conso_Wh');
        $total_serrures = Objets::where('type', 'Serrure')->sum('conso_Wh');
        $total_radiateurs = Objets::where('type', 'Radiateur')->sum('conso_Wh');

        $types_objets = ['Imprimantes', 'Projecteurs', 'Poubelles', 'Serrures', 'Radiateurs'];
        $conso_par_type = [
            $total_imprimantes,
            $total_projecteurs,
            $total_poubelles,
            $total_serrures,
            $total_radiateurs
        ];


        // couleur bleu 
        $colors = array_fill(0, count($types_objets), 'rgba(0, 51, 102, 1)'); // Bleu IntelliSchool opaque

        // Modifiez les options des graphiques comme suit :
        $chart_options = [
            'chart_title' => "Consommation par type d objet",
            'report_type' => 'group_by_string',
            'model' => 'App\Models\Objets',
            'group_by_field' => 'type',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'conso_Wh',
            'chart_type' => 'bar',
            'colors' => ['#003366'], // Couleur principale
            'background_color' => 'rgba(255, 255, 255, 1)', // Fond blanc opaque
            'bar_border_color' => '#002244', // Bordure plus foncée
            'bar_border_width' => 1,
            'dataset' => [
                [
                    'name' => 'Consommation énergétique',
                    'data' => $conso_par_type,
                    'backgroundColor' => 'rgba(0, 51, 102, 1)', // Bleu opaque
                    'borderColor' => 'rgba(0, 34, 68, 1)', // Bordure
                    'borderWidth' => 1,
                ]
            ],
            'labels' => $types_objets,
        ];

        
        $chart1 = new LaravelChart($chart_options);
        
        $chart_options = [
            'chart_title' => "Utilisation par type d objet",
            'report_type' => 'group_by_string',
            'model' => 'App\Models\Objets',
            'group_by_field' => 'type', // Axe X : type d'objet
            'aggregate_function' => 'sum', // Aggrégation par somme
            'aggregate_field' => 'nbre_utilisations', // Axe Y : consommation
            'chart_type' => 'bar',
            'colors' => ['#003366'], // Couleur principale
            'background_color' => 'rgba(255, 255, 255, 1)', // Fond blanc opaque
            'bar_border_color' => '#002244', // Bordure plus foncée
            'bar_border_width' => 1,
            'dataset' => [
                [
                    'name' => 'Consommation énergétique',
                    'data' => $conso_par_type, // Valeurs de la consommation pour chaque type d'objet
                    'backgroundColor' => 'rgba(0, 51, 102, 1)', // Bleu opaque
                    'borderColor' => 'rgba(0, 34, 68, 1)', // Bordure
                    'borderWidth' => 1, // Bordure de chaque barre
                ]
            ],
            'labels' => $types_objets, // Labels de l'axe X : Types d'objets
        ];
        
        $chart2 = new LaravelChart($chart_options);








        return view('gestion', [ 
            'objets' => $objets,
            'imprimantes' => $imprimantes,
            'projecteurs' => $projecteurs,
            'poubelles ' => $poubelles ,
            'serrures =' => $serrures,
            'radiateurs' => $radiateurs,    
            'chart1' => $chart1,
            'chart2' => $chart2,

        ]);
    }

    public function demandesup($objetid)
    {
        $objet = Objets::find($objetid);
        $utilisateur = Auth::user();
        $objetid = $objet->id;
        $objetnom = $objet->nom;
        $utilmail = $utilisateur->email;
        Mail::to('admin@admin.com')->send(new DemandeSuppression($objetid, $objetnom, $utilmail));
        return redirect('/gestion')->with('success_dem', 'Demande envoyée avec succès !');
    }
}