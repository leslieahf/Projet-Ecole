<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class Objets extends Model implements Authenticatable
{
    use HasFactory;
    use BasicAuthenticatable;

    protected $fillable = [
        'id',
        'nom',
        'type',
        'connectivite',
        'statut',
        'mode',
        'etat_batterie',
        'temperature',
        'niveau_encre',
        'niveau_remplissage',
        'conso_Wh',
        'pieces',
        'nbre_utilisations',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    
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
