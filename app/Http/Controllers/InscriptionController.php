<?php
namespace App\Http\Controllers; 

use App\Models\Utilisateurs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InscriptionConfirmation;

class InscriptionController extends Controller
{
    public function showForm()
    {
        return view('inscription');
    }

    public function inscription()
    {
        request()->validate([
            'photo' => ['image'],
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
        if(request()->hasFile('photo') && request('photo')->isValid()){
            $path = request('photo')->store('photo', 'public');
        }
        else{
            $path=null;
        }
        $utilisateur = Utilisateurs::where('email', request('email'))->first();
        if ($utilisateur) {
            $utilisateur->update([
                'photo' => $path,
                'login' => request('login'), 
                'mdp' => bcrypt(request('mot_de_passe')), 
            ]);
            Mail::to($utilisateur)->send(new InscriptionConfirmation);
            return redirect('/connexion')->with(['message' => 'Inscription réussie ! Un email de confirmation a été envoyé.']);
        }
        else {
            return redirect()->back()->withErrors(['email' => 'Les informations fournies ne correspondent pas à un membre valide.']);
        }
    }
}
    