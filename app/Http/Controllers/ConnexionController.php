<?php
namespace App\Http\Controllers; 

use App\Models\Utilisateurs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


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
            return redirect('/gestion');
        } else {
            return redirect()->back()->withErrors(['message' => 'Votre login ou mot de passe n\'est pas valide']);
        }
    }
}
    