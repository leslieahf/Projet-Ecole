<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Evenements; // Importation du modèle Evenements


class EvenementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Evenements::where('titre', 'Journée Portes Ouvertes')->doesntExist()) {
            Evenements::create([
                'titre' => 'Journée Portes Ouvertes',
                'description' => 'Venez découvrir notre établissement le 15 mars !',
                'date' => '2026/01/15',
            ]);
        }

        if (Evenements::where('titre', 'Hackathon Jr')->doesntExist()) {
            Evenements::create([
                'titre' => 'Hackathon Jr',
                'description' => "Inscrivez-vous pour participer à notre concours de codage annuel !",
                'date' => '2025/10/24',
            ]);
        }

        if (Evenements::where('titre','Festival des Arts')->doesntExist()) {
            Evenements::create([
                'titre' => 'Festival des Arts',
                'description' => "Venez admirer les créations artistiques de nos élèves !",
                'date' => '2025/11/27',
            ]);
        }
    }
}
