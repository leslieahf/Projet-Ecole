<?php

namespace App\Http\Controllers;

use App\Models\Utilisateurs;
use Illuminate\Http\Request;

class ModifUtilisateursController extends Controller
{

    public function showForm($id)
    {
        $utilisateur = Utilisateurs::find($id); 
        return view('modifutil', compact('utilisateur')); 
    }

    public function update($id)
    {
      $utilisateur = Utilisateurs::find($id); 
      request()->validate([
            'prenom' => ['required', 'string'],
            'nom' => ['required', 'string'],
            'email' => ['required', 'email'],
            'age' => ['required', 'integer', 'min:1'],
            'sexe' => ['required', 'string'],
            'date_de_naiss' =>['required', 'date'],
            'type_membre' => ['required', 'string'],
            'nbre_connexions' => ['required', 'integer', 'min:0'],
            'nbre_consultations' => ['required', 'integer', 'min:0'],
            'points_exp' => ['required', 'integer', 'min:0'],
            'niveau' => ['required', 'string'],
        ]);
        $utilisateur = Utilisateurs::find($id);
        if($utilisateur && request()->validate='true'){
        $utilisateur->update([
            'prenom' => request('prenom'),
            'nom' => request('nom'),
            'email' => request('email'), 
            'age' => request('age'),
            'sexe' => request('sexe'),
            'date_de_naissance' => request('date_de_naiss'),
            'type_membre' => request('type_membre'),
            'nbre_connexions' => request('nbre_connexions'),
            'nbre_consultations' => request('nbre_consultations'),
            'points_exp' => request('points_exp'),
            'niveau' => request('niveau'),
            ]);
            return redirect('/administration')->with(['success' => 'Utilisateur modifié avec succès !']);
        }
    }

    public function delete($id)
    {
        $utilisateur = Utilisateurs::find($id);
        $utilisateur->delete();
        return redirect('/administration')->with(['success' => 'Utilisateur supprimé avec succès !']);
    }
}