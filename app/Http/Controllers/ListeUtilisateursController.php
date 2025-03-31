<?php

namespace App\Http\Controllers;

use App\Models\Utilisateurs;
use Illuminate\Http\Request;

class ListeUtilisateursController extends Controller
{
public function liste()
    {
        $utilisateur = Utilisateurs::all();
        return view('profilautres', ['utilisateurs'=> $utilisateur],);
    }
}