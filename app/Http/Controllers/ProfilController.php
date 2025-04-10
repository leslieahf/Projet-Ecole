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
        $utilisateur = Auth::user();
        $action = request('action'); 
        if ($action == 'action1') {
            if ($utilisateur->points_exp >= 0 && $utilisateur->points_exp <= 9) {
                $utilisateur->niveau = 'Débutant';
            } elseif ($utilisateur->points_exp >= 10 && $utilisateur->points_exp <= 19) {
                $utilisateur->niveau = 'Intermédiaire';
            } elseif ($utilisateur->points_exp >= 20 && $utilisateur->points_exp <= 29) {
                $utilisateur->niveau = 'Avancé';
            } else {
                $utilisateur->niveau = 'Expert';
            }
            $utilisateur->save();
            return redirect()->back()->with('message', 'Votre niveau a été mis à jour !');
        }
        elseif ($action == 'action2') {
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
                'photo' => ['image', 'nullable'],
            ]);
            $utilisateur = Auth::user();
            if($utilisateur && request()->validate='true'){
                $data = [
                    'prenom' => request('prenom'),
                    'nom' => request('nom'),
                    'email' => request('email'),
                    'login' => request('login'),
                    'mdp' => bcrypt(request('mot_de_passe')), 
                    'age' => request('age'),
                    'sexe' => request('sexe'),
                    'date_de_naissance' => request('date_de_naiss'),
                    'type_membre' => request('type_membre'),
                ];

                if(request()->hasFile('photo') && request('photo')->isValid()){
                    $path = request('photo')->store('photo', 'public');
                    $data['photo'] = $path;
                }

                $utilisateur->update($data);
                return redirect('/visualisation')->with(['success' => 'Votre profil a été modifié avec succès !']);
            }
            else {
                return redirect()->back()->withErrors(['info' => 'Les informations fournies sont non conformes ']);
            }
        }
    }
}
