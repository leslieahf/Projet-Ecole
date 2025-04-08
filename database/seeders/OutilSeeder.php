<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Outils; // Importation du modèle Outils


class OutilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // Vérifie si l'outil 'Poubelle connectée' existe déjà pour éviter les doublons
        if (Outils::where('nom', 'Poubelle connectée')->doesntExist()) {
            Outils::create([
                'nom' => 'Poubelle connectée',
                'description' => 'Suivi du niveau de remplissage, Gestion de déchets recyclables, Alertes pour déchets non triés',
            ]);
        }

        if (Outils::where('nom', 'Serrure connectée')->doesntExist()) {
            Outils::create([
                'nom' => 'Serrure connectée',
                'description' => "Contrôle d'accès sécurisé, Gestion des accès à distance, Rapport d'accès"
            ]);
        }

        if (Outils::where('nom','Radiateur connecté')->doesntExist()) {
            Outils::create([
                'nom' => 'Radiateur connecté',
                'description' => "Contrôle de la température, Programme de chauffage automatique, Alertes en cas de panne"
            ]);
        }

        if (Outils::where('nom','Vidéoprojecteur connecté')->doesntExist()) {
            Outils::create([
                'nom' => 'Vidéoprojecteur connecté',
                'description' => "Gestion à distance, Intégration avec des plateformes d'apprentissage en ligne, Suivi de l'utilisation",
            ]);
        }

        if (Outils::where('nom','Imprimante connectée')->doesntExist()) {
            Outils::create([
                'nom' => 'Imprimante connectée',
                'description' => "Impression sécurisée, Suivi des niveaux d'encre et de papier, Optimisation des impressions"
            ]);
        }

    }
    
}
