<?php
namespace App\Http\Controllers;

use App\Models\Objets;
use Illuminate\Http\Request;

class AssocierObjPiecesController extends Controller
{
    public function associer()
    {
        request()->validate([
            'objet' => ['required'],
            'piece' => ['required'],
        ]); 
        $objet = Objets::where('id', request('objet'))->first();
        if ($objet) {
            $objet->update([
                'pieces' => request('piece'),
            ]);
            return redirect()->back()->with('success_assoc', 'Objet associé avec succès à la pièce.');
        }
    }
}

