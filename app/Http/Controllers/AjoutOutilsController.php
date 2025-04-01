<?php

namespace App\Http\Controllers;

use App\Models\Outils;
use Illuminate\Http\Request;

class AjoutOutilsController extends Controller
{
    public function showForm()
    {
        return view('ajoutoutils');
    }

    public function ajouter()
    {
        request()->validate([
            'nom' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);
        $outil = Outils::create([
        'nom' => request('nom'),
        'description' => request('description'),
        ]);
    return redirect('/ajoutoutils')->with(['success' => 'Outil ajouté avec succès !']) ;
    }
}
