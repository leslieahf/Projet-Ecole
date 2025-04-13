<?php

namespace App\Http\Controllers;

use App\Models\Objets;
use Illuminate\Http\Request;

class ModifObjetsController extends Controller
{

    public function showForm($id)
    {
        $objet = Objets::find($id); 
        return view('modifobjets', compact('objet')); 
    }

    public function update($id)
    {
      $objet = Objets::find($id); 
      request()->validate([
            'id' => ['required', 'string'],
            'nom' => ['required', 'string'],
            'type' => ['required', 'string'],
            'salle' => ['required', 'string'],
            'connectivite' => ['required', 'string'],
            'statut' => ['required', 'string'],
            'mode' => ['required', 'string'],
            'etat_batterie' => ['required', 'integer'],
            'temperature' => ['nullable', 'integer'],
            'niveau_encre' => ['nullable', 'integer'],
            'niveau_remplissage' => ['nullable', 'integer'],
            'conso_wh' => ['nullable', 'integer'],
        ]);
        $objet = Objets::find($id);
        if($objet && request()->validate='true'){
        $objet->update([
            'id' => request('id'),
            'nom' => request('nom'),
            'type' => request('type'),
            'salle' => request('salle'),
            'connectivite' => request('connectivite'),
            'statut' => request('statut'),
            'mode' => request('mode'),
            'etat_batterie' => request('etat_batterie'),
            'temperature' => request('temperature'),
            'niveau_encre' => request('niveau_encre'),
            'niveau_remplissage' => request('niveau_remplissage'),
            'conso_Wh' => request('conso_wh'),
            ]);
            return redirect('/gestion')->with(['success_obj' => 'Objet modifié avec succès !']);
        }
    }
}