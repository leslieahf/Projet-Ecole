<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompteController extends Controller
{
    public function deconnexion(){
        auth()->logout();

        session()->put('js_message3', "Vous êtes maintenant déconnecté.");
        return redirect('/');
    }
}
