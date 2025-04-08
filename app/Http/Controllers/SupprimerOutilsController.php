<?php

namespace App\Http\Controllers;

use App\Models\Outils;
use Illuminate\Http\Request;

class SupprimerOutilsController extends Controller
{
    public function delete($id)
    {
        $outil = Outils::find($id);
        $outil->delete();
        return redirect('/administration')->with(['success' => 'Outil supprimé avec succès !']);
    }
}