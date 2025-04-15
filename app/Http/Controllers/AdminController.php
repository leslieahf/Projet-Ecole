<?php

namespace App\Http\Controllers;

use App\Models\Utilisateurs;
use App\Models\Objets;
use App\Models\Outils;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function liste2()
    {
        $utilisateur = Utilisateurs::all();
        $objet = Objets::all();
        $outil = Outils::all();
        $total_conso = Objets::sum('conso_Wh'); // Somme de la colonne 'conso_Wh'
        $total_connexions = Utilisateurs::sum('nbre_connexions');
        $total_utilisateurs = Utilisateurs::count('login');
        $total_objets = Utilisateurs::count('id');
        $total_imprimantes =  Objets::where('type', 'Imprimante')->count();
        $total_projecteurs =  Objets::where('type', 'Projecteur')->count();
        $total_poubelles =  Objets::where('type', 'Poubelle')->count();
        $total_serrures =  Objets::where('type', 'Serrure')->count();
        $total_radiateurs =  Objets::where('type', 'Radiateur')->count();

        return view('administration', [
            'utilisateurs' => $utilisateur, 
            'objets' => $objet, 
            'outils' => $outil,
            'total_conso' => $total_conso,
            'total_connexions' => $total_connexions,
            'total_utilisateurs' => $total_utilisateurs,
            'total_objets' => $total_objets,
            'total_imprimantes' => $total_imprimantes,
            'total_projecteurs' => $total_projecteurs,
            'total_poubelles' => $total_poubelles,
            'total_serrures' => $total_serrures,
            'total_radiateurs' => $total_radiateurs,
        ]);
    }
}