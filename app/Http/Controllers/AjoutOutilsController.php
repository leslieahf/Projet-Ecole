<?php

namespace App\Http\Controllers;

use App\Models\Outils;
use Illuminate\Http\Request;

class AjoutOutilsController extends Controller
{
    // Affichage du formulaire d'ajout
    public function showForm()
    {
        return view('ajoutoutils');
    }

    // Méthode pour ajouter un outil
    public function ajouter()
    {
        // Validation des champs du formulaire
        request()->validate([
            'nom' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);
        
        // Création d'un nouvel outil
        $outil = Outils::create([
            'nom' => request('nom'),
            'description' => request('description'),
        ]);

        // Redirection vers la page d'administration avec un message de succès
        return redirect('/administration')->with(['success' => 'Outil ajouté avec succès !']);
    }
}
