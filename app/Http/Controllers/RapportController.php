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

        // Générer le PDF
        $pdf = PDF::loadView('rapport', [
            'utilisateurs' => $utilisateurs,
            'objets' => $objets
        ]);

        return $pdf->download('rapport.pdf');
    }
} 