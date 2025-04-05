<?php

namespace App\Http\Controllers;

use App\Models\Utilisateurs;
use Illuminate\Http\Request;

class AdminController extends Controller
{

public function liste2()
    {
        $utilisateur = Utilisateurs::all();
        return view('administration', ['utilisateurs'=> $utilisateur],);
    }
}