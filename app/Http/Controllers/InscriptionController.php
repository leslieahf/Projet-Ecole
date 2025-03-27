<?php
namespace App\Http\Controllers; 

use App\Models\Eleves;
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
            'prenom' => ['required', 'string'],
            'nom' => ['required', 'string'],
            'email' => ['required', 'email'],
            'login' => ['required', 'string'],
            'mot_de_passe' => ['required', 'password'],
            'age' => ['required', 'integer', 'min:1'],
            'sexe' => ['required', 'string'],
            'date_de_naiss' =>['required', 'date'],
            'type_membre' => ['required', 'string'],
        ]);
        $eleve = Eleves::where('email', request('email'));
        if ($eleve) {
            $eleve->update([
                'login' => request('login'), 
                'mdp' => bcrypt(request('mot_de_passe')), 
            ]);
            Mail::to($eleve->email)->send(new InscriptionConfirmation($eleve));
            return redirect()->route('connexion')->with('message', 'Inscription réussie. Un email de confirmation a été envoyé.');
        }
        else {
            return redirect()->back()->withErrors(['email' => 'Les informations fournies ne correspondent pas à un membre valide.']);
        }
    }
}
    