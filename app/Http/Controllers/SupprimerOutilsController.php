<?php

namespace App\Http\Controllers;

use App\Models\Outils; // Assurez-vous que vous importez le modèle Outils
use Illuminate\Http\Request;

class SupprimerOutilsController extends Controller
{
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
