<?php
namespace App\Http\Controllers;

use App\Models\Objets;
use App\Models\Outils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RechercherObjetsController extends Controller
{
    public function rechercher()
    {
        $outil = Outils::all();
        $search = request('search');
        $mode = request('mode');
        $objet = Objets::query();
        $outil = Outils::query();
        if ($search) {
            $objet->where(function($query) use ($search) {
                $query->where('nom', 'like', '%' . $search . '%');
            });
            $outil->where(function($query) use ($search) {
                $query->where('nom', 'like', '%' . $search . '%')
                    ->orwhere('description', 'like', '%' . $search . '%');
            });
        }
        if ($mode) {
            $objet->where('mode', $mode);
        }
        $outil = $outil->get();
        $objet = $objet->get();
        if (Auth::check()) {
            $nbre_consultations = Auth::user()->increment('nbre_consultations');
            $points_exp = Auth::user()->update('points_exp');
            $points_exp = $nbre_consultations * $nbre_connexions;
        }
        return view('gestion', ['objets' => $objet], ['outils'=> $outil],);
    }
}

