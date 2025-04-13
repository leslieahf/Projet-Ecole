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
                'type' => 'Radiateur',
                'salle' => 'A5',
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

        if (Objets::where('id', 'Radiateur010')->doesntExist()) {
            Objets::create([
                'id' => 'Radiateur010',
                'nom' => 'Radiateur Atlantic',
                'type' => 'Radiateur',
                'salle' => 'C8',
                'connectivite' => 'Wifi',
                'statut' => 'Actif',
                'mode' => 'Automatique',
                'etat_batterie' => 70,
                'temperature' => 0,
                'niveau_encre' => null,
                'niveau_remplissage' => null,
                'conso_Wh' => 700
            ]);
        }


        if (Objets::where('id', 'Radiateur027')->doesntExist()) {
            Objets::create([
                'id' => 'Radiateur027',
                'nom' => 'Radiateur Thermor',
                'type' => 'Radiateur',
                'salle' => 'C8',
                'connectivite' => 'Wifi',
                'statut' => 'Actif',
                'mode' => 'Automatique',
                'etat_batterie' => 70,
                'temperature' => 0,
                'niveau_encre' => null,
                'niveau_remplissage' => null,
                'conso_Wh' => 800
            ]);
        }

        if (Objets::where('id', 'Projecteur089')->doesntExist()) {
            Objets::create([
                'id' => 'Projecteur789',
                'nom' => 'Vidéoprojecteur Epson',
                'type' => 'Projecteur',
                'salle' => 'B3',
                'connectivite' => 'HDMI',
                'statut' => 'Éteint',
                'mode' => 'Standard',
                'etat_batterie' => 100,
                'temperature' => null,
                'niveau_encre' => null,
                'niveau_remplissage' => null,
                'conso_Wh' => 750
            ]);
        }

        if (Objets::where('id', 'Projecteur104')->doesntExist()) {
            Objets::create([
                'id' => 'Projecteur104',
                'nom' => 'Vidéoprojecteur Sony',
                'type' => 'Projecteur',
                'salle' => 'A3',
                'connectivite' => 'HDMI',
                'statut' => 'Allumé',
                'mode' => 'Standard',
                'etat_batterie' => 90,
                'temperature' => null,
                'niveau_encre' => null,
                'niveau_remplissage' => null,
                'conso_Wh' => 800
            ]);
        }

        if (Objets::where('id', 'Projecteur026')->doesntExist()) {
            Objets::create([
                'id' => 'Projecteur026',
                'nom' => 'Vidéoprojecteur Optoma',
                'type' => 'Projecteur',
                'salle' => 'A3',
                'connectivite' => 'HDMI',
                'statut' => 'Allumé',
                'mode' => 'Standard',
                'etat_batterie' => 500,
                'temperature' => null,
                'niveau_encre' => null,
                'niveau_remplissage' => null,
                'conso_Wh' => 950
            ]);
        }

        if (Objets::where('id', 'Poubelle123')->doesntExist()) {
            Objets::create([
                'id' => 'Poubelle123',
                'nom' => 'Poubelle de recyclage',
                'type' => 'Poubelle',
                'salle' => 'Cantine',
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

        if (Objets::where('id', 'Poubelle073')->doesntExist()) {
            Objets::create([
                'id' => 'Poubelle073',
                'nom' => 'Poubelle de verre',
                'type' => 'Poubelle',
                'salle' => 'Entrée',
                'connectivite' => 'Wifi',
                'statut' => 'Vide',
                'mode' => 'Automatique',
                'etat_batterie' => 50,
                'temperature' => null,
                'niveau_encre' => null,
                'niveau_remplissage' => 10,
                'conso_Wh' => 620
            ]);
        }

        if (Objets::where('id', 'Poubelle073')->doesntExist()) {
            Objets::create([
                'id' => 'Poubelle073',
                'nom' => 'Poubelle de recyclage',
                'type' => 'Poubelle',
                'salle' => 'Entrée',
                'connectivite' => 'Wifi',
                'statut' => 'Vide',
                'mode' => 'Automatique',
                'etat_batterie' => 50,
                'temperature' => null,
                'niveau_encre' => null,
                'niveau_remplissage' => 30,
                'conso_Wh' => 500
            ]);
        }

        if (Objets::where('id', 'Imprimante001')->doesntExist()) {
            Objets::create([
                'id' => 'Imprimante001',
                'nom' => 'Imprimante HP',
                'type' => 'Imprimante',
                'salle' => 'B12',
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

        if (Objets::where('id', 'Imprimante008')->doesntExist()) {
            Objets::create([
                'id' => 'Imprimante008',
                'nom' => 'Imprimante EPSON',
                'type' => 'Imprimante',
                'salle' => 'C04',
                'connectivite' => 'Ethernet',
                'statut' => 'En ligne',
                'mode' => 'Standard',
                'etat_batterie' => 10,
                'temperature' => null,
                'niveau_encre' => 20,
                'niveau_remplissage' => null,
                'conso_Wh' => 1300
            ]);
        }

        if (Objets::where('id', 'Imprimante012')->doesntExist()) {
            Objets::create([
                'id' => 'Imprimante012',
                'nom' => 'Imprimante HP',
                'type' => 'Imprimante',
                'salle' => 'A16',
                'connectivite' => 'Ethernet',
                'statut' => 'En ligne',
                'mode' => 'Standard',
                'etat_batterie' => 10,
                'temperature' => null,
                'niveau_encre' => 85,
                'niveau_remplissage' => null,
                'conso_Wh' => 1500
            ]);
        }

        if (Objets::where('id', 'Casier456')->doesntExist()) {
            Objets::create([
                'id' => 'Casier456',
                'nom' => 'Casier de sécurité',
                'type' => 'Serrure',
                'salle' => 'Couloir',
                'connectivite' => 'Bluetooth',
                'statut' => 'Verrouillé',
                'mode' => 'Automatique',
                'etat_batterie' => 75,
                'temperature' => null,
                'niveau_encre' => null,
                'niveau_remplissage' => null,
                'conso_Wh' => 550
            ]);
        }

        if (Objets::where('id', 'Casier306')->doesntExist()) {
            Objets::create([
                'id' => 'Casier306',
                'nom' => 'Casier de sécurité',
                'type' => 'Serrure',
                'salle' => 'Vestiaire',
                'connectivite' => 'Bluetooth',
                'statut' => 'Déverrouillé',
                'mode' => 'Automatique',
                'etat_batterie' => 70,
                'temperature' => null,
                'niveau_encre' => null,
                'niveau_remplissage' => null,
                'conso_Wh' => 800
            ]);
        }

        if (Objets::where('id', 'Casier456')->doesntExist()) {
            Objets::create([
                'id' => 'Casier456',
                'nom' => 'Casier de sécurité',
                'type' => 'Serrure',
                'salle' => 'Couloir',
                'connectivite' => 'Bluetooth',
                'statut' => 'Verrouillé',
                'mode' => 'Automatique',
                'etat_batterie' => 85,
                'temperature' => null,
                'niveau_encre' => null,
                'niveau_remplissage' => null,
                'conso_Wh' => 700
            ]);
        }
    }
}
