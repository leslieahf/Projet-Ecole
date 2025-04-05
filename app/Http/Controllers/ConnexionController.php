<?php
namespace App\Http\Controllers; 

use App\Models\Utilisateurs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class ConnexionController extends Controller
{
    public function showForm()
    {
        return view('connexion');
    }

    public function connexion()
    { 
        request()->validate([
            'login' => ['required', 'string'],
            'mot_de_passe' => ['required', 'string'],
        ]);
        $utilisateur = Utilisateurs::where('login', request('login'))->first();
        if ($utilisateur && Hash::check(request('mot_de_passe'), $utilisateur->mdp)) {
            auth()->login($utilisateur);

            //Auth::user()->increment('nbre_connexions');
            //$nbre_connexions = Auth::user()->nbre_connexions;
            //$nbre_consultations = Auth::user()->nbre_consultations;
            //$points_exp = $nbre_connexions + $nbre_consultations;
            //$points_exp = Auth::user()->update(['points_exp' => $points_exp]);

            $utilisateur->points_exp += 1;
            $utilisateur->nbre_connexions += 1;
            $utilisateur->save();
            return redirect('/gestion');
        } else {
            return redirect()->back()->withErrors(['message' => 'Votre login ou mot de passe n\'est pas valide']);
        }
    }
}
    