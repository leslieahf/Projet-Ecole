<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Objets; // Importation du modèle Objets


class ObjetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Vérifie si l'objet 'Poubelle connectée' existe déjà pour éviter les doublons
        if (Objets::where('id', 'Radiateur002')->doesntExist()) {
            Objets::create([
                'id' => 'Radiateur002',
                'nom' => 'Radiateur Dimplex',
                'connectivite' => 'Wifi',
                'statut' => 'Inactif',
                'mode' => 'Automatique',
                'etat_batterie' => 50,
                'temperature' => 0,
                'niveau_encre' => null,
                'niveau_remplissage' => null,
                'conso_Wh' => 1200
            ]);
        }

        if (Objets::where('id', 'Projecteur789')->doesntExist()) {
            Objets::create([
                'id' => 'Projecteur789',
                'nom' => 'Vidéoprojecteur Epson',
                'connectivite' => 'HDMI',
                'statut' => 'Éteint',
                'mode' => 'Standard',
                'etat_batterie' => 100,
                'temperature' => null,
                'niveau_encre' => null,
                'niveau_remplissage' => null,
                'conso_Wh' => 700
            ]);
        }

        if (Objets::where('id', 'Poubelle123')->doesntExist()) {
            Objets::create([
                'id' => 'Poubelle123',
                'nom' => 'Poubelle de recyclage',
                'connectivite' => 'Wifi',
                'statut' => 'Plein',
                'mode' => 'Automatique',
                'etat_batterie' => 50,
                'temperature' => null,
                'niveau_encre' => null,
                'niveau_remplissage' => 70,
                'conso_Wh' => 400
            ]);
        }

        if (Objets::where('id', 'Imprimante001')->doesntExist()) {
            Objets::create([
                'id' => 'Imprimante001',
                'nom' => 'Imprimante HP',
                'connectivite' => 'Ethernet',
                'statut' => 'Hors ligne',
                'mode' => 'Standard',
                'etat_batterie' => 10,
                'temperature' => null,
                'niveau_encre' => 45,
                'niveau_remplissage' => null,
                'conso_Wh' => 1000
            ]);
        }

        if (Objets::where('id', 'Casier456')->doesntExist()) {
            Objets::create([
                'id' => 'Casier456',
                'nom' => 'Casier de sécurité',
                'connectivite' => 'Bluetooth',
                'statut' => 'Verrouillé',
                'mode' => 'Automatique',
                'etat_batterie' => 75,
                'temperature' => null,
                'niveau_encre' => null,
                'niveau_remplissage' => null,
                'conso_Wh' => 600
            ]);
        }
    }
}
