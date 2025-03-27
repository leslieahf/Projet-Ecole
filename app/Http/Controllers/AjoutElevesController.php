<?php

namespace App\Http\Controllers;

use App\Models\Eleves;
use Illuminate\Http\Request;

class AjoutElevesController extends Controller
{
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
        $eleve = Eleves::create([
        'prenom' => request('prenom'),
        'nom' => request('nom'),
        'email' => request('email'),
        'age' => request('age'),
        'sexe' => request('sexe'),
        'date_de_naissance' => request('date_de_naiss'),
        'type_membre' => request('type_membre'),
        ]);
        return 'Eleve ajouté avec succès !' ;
    }
}
