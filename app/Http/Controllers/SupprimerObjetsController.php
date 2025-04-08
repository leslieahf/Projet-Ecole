<?php

namespace App\Http\Controllers;

use App\Models\Objets;
use Illuminate\Http\Request;

class SupprimerObjetsController extends Controller
{
    public function delete($id)
    {
        $objet = Objets::find($id);
        $objet->delete();
        return redirect('/administration')->with(['success' => 'Objet supprimé avec succès !']);
    }
}
