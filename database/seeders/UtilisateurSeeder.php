<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Utilisateurs; // Importation du modèle Utilisateurs

class UtilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vérifie si l'utilisateur 'admin' existe déjà pour éviter les doublons
        if (Utilisateurs::where('login', 'admin')->doesntExist()) {
            Utilisateurs::create([
                'prenom' => 'admin',
                'nom' => 'admin',
                'email' => 'admin@admin.com',
                'login' => 'admin',
                'mdp' => bcrypt('admin'), // Utilise bcrypt pour sécuriser le mot de passe
                'age' => 68,
                'sexe' => 'Masculin',
                'date_de_naissance' => '1956-08-15',
                'type_membre' => 'Administrateur',
                'points_exp' => 100,
                'niveau' => 'Expert',
            ]);
        }

            if (Utilisateurs::where('login', 'prof')->doesntExist()) {
                Utilisateurs::create([
                    'prenom' => 'Samy',
                    'nom' => 'Khémira',
                    'email' => 'prof@prof.com',
                    'login' => 'prof',
                    'mdp' => bcrypt('prof'), // Utilise bcrypt pour sécuriser le mot de passe
                    'age' => 30,
                    'sexe' => 'Masculin',
                    'date_de_naissance' => '1995-04-05',
                    'type_membre' => 'Professeur',
                    'points_exp' => 25,
                    'niveau' => 'Avancé',
                ]);
        }
        if (Utilisateurs::where('login', 'eleve')->doesntExist()) {
            Utilisateurs::create([
                'prenom' => 'Eric',
                'nom' => 'SHAO',
                'email' => 'eleve@eleve.com',
                'login' => 'eleve',
                'mdp' => bcrypt('eleve'), // Utilise bcrypt pour sécuriser le mot de passe
                'age' => 20,
                'sexe' => 'Masculin',
                'date_de_naissance' => '2004-11-30',
                'type_membre' => 'Eleve',
                'points_exp' => 5,
                'niveau' => 'Débutant',
            ]);
        }
    }
}
