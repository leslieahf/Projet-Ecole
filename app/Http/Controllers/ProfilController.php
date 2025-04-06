<?php
namespace App\Http\Controllers;

use App\Models\Utilisateurs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function showForm()
    {
        $utilisateur = Auth::user();
        return view('profil', ['utilisateur' => $utilisateur]);
    }

    public function update()
    {
        request()->validate([
            'prenom' => ['required', 'string'],
            'nom' => ['required', 'string'],
            'email' => ['required', 'email'],
            'login' => ['required', 'string'],
            'mot_de_passe' => ['required'],
            'age' => ['required', 'integer', 'min:1'],
            'sexe' => ['required', 'string'],
            'date_de_naiss' =>['required', 'date'],
            'type_membre' => ['required', 'string'],
        ]);
        $utilisateur = Auth::user();
        if($utilisateur && request()->validate='true'){
            $utilisateur->update([
                'prenom' => request('prenom'),
                'nom' => request('nom'),
                'email' => request('email'),
                'login' => request('login'),
                'mdp' => bcrypt(request('mot_de_passe')), 
                'age' => request('age'),
                'sexe' => request('sexe'),
                'date_de_naissance' => request('date_de_naiss'),
                'type_membre' => request('type_membre'),
            ]);
            return redirect('/gestion')->with(['success' => 'Votre profil a été modifié avec succès !']);
        }
        else {
            return redirect()->back()->withErrors(['info' => 'Les informations fournies sont non conformes ']);
        }
    }
}
