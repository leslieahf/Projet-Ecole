<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleves extends Model
{
    use HasFactory;

    protected $fillable = [
        'prenom',
        'nom',
        'login',
        'mdp',
        'email',
        'age',
        'sexe',
        'date_de_naissance',
        'type_membre',
    ];
}
