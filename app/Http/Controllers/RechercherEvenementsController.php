<?php
namespace App\Http\Controllers;

use App\Models\Evenements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RechercherEvenementsController extends Controller
{
    public function rechercher()
    {
        $evenement = Evenements::all();
        $search = request('search');
        $evenement = Evenements::query();
        $annee = request('annee');

        if ($search) {
            $evenement->where(function($query) use ($search) {
                $query->where('titre', 'like', '%' . $search . '%')
                    ->orwhere('description', 'like', '%' . $search . '%');
            });
        }

        if ($annee) {
            $evenement->whereYear('date', $annee);
        }

        $evenement = $evenement->get();
        return view('/accueil', ['evenements' => $evenement]);
    }
}

