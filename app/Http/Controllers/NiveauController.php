<?php

namespace App\Http\Controllers;

use App\Models\Utilisateurs;
use Illuminate\Http\Request;

class NiveauController extends Controller
{
    public function updateNiveau()
    {
        $utilisateur = auth()->user();
        $utilisateur->updateNiveau();
        return redirect()->back()->with('message', 'Votre niveau a été mis à jour !');
    }
} 