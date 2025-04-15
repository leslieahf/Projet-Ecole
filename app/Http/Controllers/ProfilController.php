<?php
namespace App\Http\Controllers;

use App\Models\Utilisateurs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    public function showForm()
    {
        $utilisateur = Auth::user();
        return view('profil', ['utilisateur' => $utilisateur]);
    }

    public function update(Request $request)
    {
        $utilisateur = Auth::user();
        $action = $request->action; 

        switch ($action) {
            case 'action1': // Mise à jour du niveau
                return $this->updateLevel($utilisateur);
                
            case 'action2': // Mise à jour du profil
                return $this->updateProfile($request, $utilisateur);
                
            case 'reset_password': // Réinitialisation du mot de passe
                return $this->resetPassword($request, $utilisateur);
                
            default:
                return redirect()->back()->withErrors(['error' => 'Action non reconnue']);
        }
    }

    private function updateLevel($utilisateur)
    {
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

    private function updateProfile(Request $request, $utilisateur)
    {
        $validator = Validator::make($request->all(), [
            'prenom' => ['required', 'string'],
            'nom' => ['required', 'string'],
            'email' => ['required', 'email'],
            'login' => ['required', 'string'],
            'age' => ['required', 'integer', 'min:1'],
            'sexe' => ['required', 'string'],
            'date_de_naiss' => ['required', 'date'],
            'type_membre' => ['required', 'string'],
            'photo' => ['image', 'nullable'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $data = [
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'email' => $request->email,
            'login' => $request->login,
            'age' => $request->age,
            'sexe' => $request->sexe,
            'date_de_naissance' => $request->date_de_naiss,
            'type_membre' => $request->type_membre,
        ];

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $path = $request->file('photo')->store('photo', 'public');
            $data['photo'] = $path;
        }

        $utilisateur->update($data);
        return redirect('/visualisation')->with('success', 'Votre profil a été modifié avec succès !');
    }

    private function resetPassword(Request $request, $utilisateur)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => ['required', function ($attribute, $value, $fail) use ($utilisateur) {
                if (!Hash::check($value, $utilisateur->mdp)) {
                    $fail('Le mot de passe actuel est incorrect.');
                }
            }],
            'new_password' => ['required', 'min:1', 'different:current_password'],
            'new_password_confirmation' => ['required', 'same:new_password'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $utilisateur->mdp = Hash::make($request->new_password);
        $utilisateur->save();

        return redirect()->back()->with('message', 'Votre mot de passe a été mis à jour avec succès !');
    }
}