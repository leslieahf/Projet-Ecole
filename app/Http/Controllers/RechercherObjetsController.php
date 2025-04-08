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
            Auth::user()->increment('nbre_consultations');
            if (Auth::check()) {
                $nbre_connexions = Auth::user()->nbre_connexions;
                $nbre_consultations = Auth::user()->nbre_consultations;
                $points_exp = $nbre_connexions + $nbre_consultations;
                $points_exp = Auth::user()->update(['points_exp' => $points_exp]);
            }
            else {
                return redirect('connexion'); 
            }
        }
        if ($mode) {
            $objet->where('mode', $mode);
            Auth::user()->increment('nbre_consultations');
            if (Auth::check()) {
                $nbre_connexions = Auth::user()->nbre_connexions;
                $nbre_consultations = Auth::user()->nbre_consultations;
                $points_exp = $nbre_connexions + $nbre_consultations;
                $points_exp = Auth::user()->update(['points_exp' => $points_exp]);
            }
            else {
                return redirect('connexion'); 
            }
        }
        $outil = $outil->get();
        $objet = $objet->get();
        return view('visualisation', ['objets' => $objet], ['outils'=> $outil],);
    }
}

