<?php

namespace App\Http\Controllers;

use App\Models\Objets;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemandeSuppression;

class DemandeSuppressionController extends Controller
{

    public function showlisteobjets()
    {
        $objet = Objets::all();
        return view('gestion', [ 'objets' => $objet,]);
    }

    public function demandesup($objetid)
    {
        $objet = Objets::find($objetid);
        $utilisateur = Auth::user();
        $objetid = $objet->id;
        $objetnom = $objet->nom;
        $utilmail = $utilisateur->email;
        Mail::to('admin@admin.com')->send(new DemandeSuppression($objetid, $objetnom, $utilmail));
        return redirect('/gestion')->with('success_dem', 'Demande envoyée avec succès !');
    }
}