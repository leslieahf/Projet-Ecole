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
                'nbre_connexions' => 50,
                'nbre_consultations' => 50,
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
                    'nbre_connexions' => 16,
                    'nbre_consultations' => 5,
                    'points_exp' => 21,
                    'niveau' => 'Avancé',
                ]);
        }
        if (Utilisateurs::where('login', 'eleve')->doesntExist()) {
            Utilisateurs::create([
                'prenom' => 'Léo',
                'nom' => 'ROGER-MACHART',
                'email' => 'eleve@eleve.com',
                'login' => 'eleve',
                'mdp' => bcrypt('eleve'), // Utilise bcrypt pour sécuriser le mot de passe
                'age' => 20,
                'sexe' => 'Masculin',
                'date_de_naissance' => '2004-11-30',
                'type_membre' => 'Eleve',
                'nbre_connexions' => 2,
                'nbre_consultations' => 1,
                'points_exp' => 3,
                'niveau' => 'Débutant',
            ]);
        }

        if (Utilisateurs::where('login', 'eleve2')->doesntExist()) {
            Utilisateurs::create([
                'prenom' => 'Karine',
                'nom' => 'SONG',
                'email' => 'eleve2@eleve.com',
                'login' => 'eleve2',
                'mdp' => bcrypt('eleve2'), // Utilise bcrypt pour sécuriser le mot de passe
                'age' => 20,
                'sexe' => 'Féminin',
                'date_de_naissance' => '2004-06-10',
                'type_membre' => 'Eleve',
                'nbre_connexions' => 10,
                'nbre_consultations' => 5,
                'points_exp' => 15,
                'niveau' => 'Intermédiaire',
            ]);
        }

        if (Utilisateurs::where('login', 'eleve3')->doesntExist()) {
            Utilisateurs::create([
                'prenom' => 'Kristina',
                'nom' => 'PANIC',
                'email' => 'eleve3@eleve.com',
                'login' => 'eleve3',
                'mdp' => bcrypt('eleve3'), // Utilise bcrypt pour sécuriser le mot de passe
                'age' => 20,
                'sexe' => 'Féminin',
                'date_de_naissance' => '2004-08-30',
                'type_membre' => 'Eleve',
                'nbre_connexions' => 30,
                'nbre_consultations' => 40,
                'points_exp' => 70,
                'niveau' => 'Expert',
            ]);
        }

        if (Utilisateurs::where('login', 'eleve4')->doesntExist()) {
            Utilisateurs::create([
                'prenom' => 'Grégoire',
                'nom' => 'DUMUR',
                'email' => 'eleve4@eleve.com',
                'login' => 'eleve4',
                'mdp' => bcrypt('eleve4'), // Utilise bcrypt pour sécuriser le mot de passe
                'age' => 20,
                'sexe' => 'Masculin',
                'date_de_naissance' => '2004-10-18',
                'type_membre' => 'Eleve',
                'nbre_connexions' => 50,
                'nbre_consultations' => 20,
                'points_exp' => 70,
                'niveau' => 'Expert',
            ]);
        }
    }
}
