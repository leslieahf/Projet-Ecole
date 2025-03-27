<?php

namespace App\Http\Controllers;

use App\Models\Utilisateurs;
use Illuminate\Http\Request;

class AjoutUtilisateursController extends Controller
{
    public function showForm()
    {
        return view('ajoututilisateurs');
    }

    public function ajouter()
    {
        request()->validate([
            'prenom' => ['required', 'string'],
            'nom' => ['required', 'string'],
            'email' => ['required', 'email'],
            'age' => ['required', 'integer', 'min:1'],
            'sexe' => ['required', 'string'],
            'date_de_naiss' =>['required', 'date'],
            'type_membre' => ['required', 'string'],
        ]);
        $eleve = Utilisateurs::create([
        'prenom' => request('prenom'),
        'nom' => request('nom'),
        'email' => request('email'),
        'age' => request('age'),
        'sexe' => request('sexe'),
        'date_de_naissance' => request('date_de_naiss'),
        'type_membre' => request('type_membre'),
        ]);
        return 'Utilisateur ajouté avec succès !' ;
    }
}
