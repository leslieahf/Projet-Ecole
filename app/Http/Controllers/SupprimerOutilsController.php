<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Outils;
=======
use App\Models\Outils; // Assurez-vous que vous importez le modèle Outils
>>>>>>> 67a1e1a (Modofication CSS et modification de controlleurs d'objet, utilisateurs et outils)
use Illuminate\Http\Request;

class SupprimerOutilsController extends Controller
{
<<<<<<< HEAD
    public function delete($id)
    {
        $outil = Outils::find($id);
        $outil->delete();
        return redirect('/administration')->with(['success' => 'Outil supprimé avec succès !']);
    }
}
=======
    /**
     * Supprimer un outil
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        // Trouver l'outil par son ID
        $outil = Outils::find($id);

        // Vérifier si l'outil existe
        if (!$outil) {
            return redirect('/administration')->with(['error' => 'Outil non trouvé.']);
        }

        // Supprimer l'outil
        $outil->delete();

        // Rediriger avec un message de succès
        return redirect('/administration')->with(['success' => 'Outil supprimé avec succès !']);
    }
}
>>>>>>> 67a1e1a (Modofication CSS et modification de controlleurs d'objet, utilisateurs et outils)
