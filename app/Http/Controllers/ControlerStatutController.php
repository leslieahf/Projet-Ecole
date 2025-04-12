<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objets;

class ControlerStatutController extends Controller
{
    public function controlstatut($id)
    {
        $objet = Objets::find($id);
        $transitions = [
            'Actif' => 'Inactif',
            'Inactif' => 'Actif',
            'Verrouillé' => 'Déverrouillé',
            'Déverrouillé' => 'Verrouillé',
            'En ligne' => 'Hors ligne',
            'Hors ligne' => 'En ligne',
            'Plein' => 'Vide',
            'Vide' => 'Plein',
            'En marche' => 'Eteint',
            'Eteint' => 'En marche',
        ];
        $statutActuel = $objet->statut;
        if (array_key_exists($statutActuel, $transitions)) {
            $objet->statut = $transitions[$statutActuel];
            $objet->save();
            return redirect()->back()->with('success_stat', "Statut mis à jour avec succès !");
        }
        return redirect()->back()->with('error', 'Statut non pris en charge.');
    }
}
