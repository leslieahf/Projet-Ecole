<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompteController extends Controller
{
    public function deconnexion(){
        auth()->logout();

        flash("Vous êtes maintenant déconnecté")->success();

        return redirect('/');
    }
}
