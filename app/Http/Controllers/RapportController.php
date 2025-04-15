<?php

namespace App\Http\Controllers;

use App\Models\Utilisateurs;
use App\Models\Objets;
use Barryvdh\DomPDF\Facade\Pdf;

class RapportController extends Controller
{
    public function generatePDF()
    {
        // Récupérer les données des utilisateurs
        $utilisateurs = Utilisateurs::select('login', 'nbre_connexions', 'nbre_consultations')->get();
        
        // Récupérer les données des objets
        $objets = Objets::select('id', 'conso_wh')->get();

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

        

        // Générer le PDF
        $pdf = PDF::loadView('rapport', [
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
        ]);

        return $pdf->download('rapport.pdf');
    }
} 