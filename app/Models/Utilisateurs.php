<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class Utilisateurs extends Model implements Authenticatable
{
    use HasFactory;
    use BasicAuthenticatable;

    protected $fillable = [
        'photo',
        'prenom',
        'nom',
        'email',
        'login',
        'mdp',
        'age',
        'sexe',
        'date_de_naissance',
        'type_membre',
        'nbre_connexions',
        'nbre_consultations',
        'points_exp',
        'niveau',
    ];
    
    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->mdp;
    }
}
