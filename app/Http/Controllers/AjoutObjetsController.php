<?php

namespace App\Http\Controllers;

use App\Models\Objets;
use Illuminate\Http\Request;

class AjoutObjetsController extends Controller
{
    public function showForm()
    {
        return view('ajoutobjets');
    }

    public function ajouter()
    {
        request()->validate([
            'id' => ['required', 'string', 'unique:objets,id'],
            'nom' => ['required', 'string'],
            'connectivite' => ['required', 'string'],
            'statut' => ['required', 'string'],
            'mode' => ['required', 'string'],
            'etat_batterie' => ['required', 'integer'],
            'temperature' => ['nullable', 'integer'],
            'niveau_encre' => ['nullable', 'integer'],
            'niveau_remplissage' => ['nullable', 'integer'],
        ]);
        $objet = Objets::create([
        'id' => request('id'),
        'nom' => request('nom'),
        'connectivite' => request('connectivite'),
        'statut' => request('statut'),
        'mode' => request('mode'),
        'etat_batterie' => request('etat_batterie'),
        'temperature' => request('temperature'),
        'niveau_encre' => request('niveau_encre'),
        'niveau_remplissage' => request('niveau_remplissage'),
        ]);
    return redirect('/ajoutobjets')->with(['success' => 'Objet ajouté avec succès !']) ;
    }
}
