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
        return view('administration', [
            'utilisateurs' => $utilisateur, 
            'objets' => $objet, 
            'outils' => $outil
        ]);
    }
}