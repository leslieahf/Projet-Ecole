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
                'pieces' => 'A5',
                'connectivite' => 'Wifi',
                'statut' => 'Inactif',
                'mode' => 'Automatique',
                'etat_batterie' => 50,
                'temperature' => 21,
                'niveau_encre' => null,
                'niveau_remplissage' => null,
                'conso_Wh' => 1200,
                'nbre_utilisations' => 150,
            ]);
        }

        if (Objets::where('id', 'Radiateur010')->doesntExist()) {
            Objets::create([
                'id' => 'Radiateur010',
                'nom' => 'Radiateur Atlantic',
                'type' => 'Radiateur',
                'pieces' => 'C8',
                'connectivite' => 'Wifi',
                'statut' => 'Actif',
                'mode' => 'Automatique',
                'etat_batterie' => 70,
                'temperature' => 22,
                'niveau_encre' => null,
                'niveau_remplissage' => null,
                'conso_Wh' => 700,
                'nbre_utilisations' => 100,
            ]);
        }


        if (Objets::where('id', 'Radiateur027')->doesntExist()) {
            Objets::create([
                'id' => 'Radiateur027',
                'nom' => 'Radiateur Thermor',
                'type' => 'Radiateur',
                'pieces' => 'C8',
                'connectivite' => 'Wifi',
                'statut' => 'Actif',
                'mode' => 'Automatique',
                'etat_batterie' => 70,
                'temperature' => 23,
                'niveau_encre' => null,
                'niveau_remplissage' => null,
                'conso_Wh' => 800,
                'nbre_utilisations' => 70,
            ]);
        }

        if (Objets::where('id', 'Projecteur089')->doesntExist()) {
            Objets::create([
                'id' => 'Projecteur789',
                'nom' => 'Vidéoprojecteur Epson',
                'type' => 'Projecteur',
                'pieces' => 'B3',
                'connectivite' => 'HDMI',
                'statut' => 'Eteint',
                'mode' => 'Standard',
                'etat_batterie' => 100,
                'temperature' => null,
                'niveau_encre' => null,
                'niveau_remplissage' => null,
                'conso_Wh' => 750,
                'nbre_utilisations' => 150,
            ]);
        }

        if (Objets::where('id', 'Projecteur104')->doesntExist()) {
            Objets::create([
                'id' => 'Projecteur104',
                'nom' => 'Vidéoprojecteur Sony',
                'type' => 'Projecteur',
                'pieces' => 'B3',
                'connectivite' => 'HDMI',
                'statut' => 'En marche',
                'mode' => 'Standard',
                'etat_batterie' => 90,
                'temperature' => null,
                'niveau_encre' => null,
                'niveau_remplissage' => null,
                'conso_Wh' => 800,
                'nbre_utilisations' => 42,
            ]);
        }

        if (Objets::where('id', 'Projecteur026')->doesntExist()) {
            Objets::create([
                'id' => 'Projecteur026',
                'nom' => 'Vidéoprojecteur Optoma',
                'type' => 'Projecteur',
                'pieces' => 'B3',
                'connectivite' => 'HDMI',
                'statut' => 'En marche',
                'mode' => 'Standard',
                'etat_batterie' => 100,
                'temperature' => null,
                'niveau_encre' => null,
                'niveau_remplissage' => null,
                'conso_Wh' => 950,
                'nbre_utilisations' => 114,
            ]);
        }

        if (Objets::where('id', 'Poubelle123')->doesntExist()) {
            Objets::create([
                'id' => 'Poubelle123',
                'nom' => 'Poubelle de recyclage',
                'type' => 'Poubelle',
                'pieces' => 'B3',
                'connectivite' => 'Wifi',
                'statut' => 'Plein',
                'mode' => 'Automatique',
                'etat_batterie' => 50,
                'temperature' => null,
                'niveau_encre' => null,
                'niveau_remplissage' => 70,
                'conso_Wh' => 400,
                'nbre_utilisations' => 300,
            ]);
        }

        if (Objets::where('id', 'Poubelle073')->doesntExist()) {
            Objets::create([
                'id' => 'Poubelle073',
                'nom' => 'Poubelle de verre',
                'type' => 'Poubelle',
                'pieces' => 'B3',
                'connectivite' => 'Wifi',
                'statut' => 'Vide',
                'mode' => 'Automatique',
                'etat_batterie' => 50,
                'temperature' => null,
                'niveau_encre' => null,
                'niveau_remplissage' => 10,
                'conso_Wh' => 620,
                'nbre_utilisations' => 170,
            ]);
        }

        if (Objets::where('id', 'Poubelle073')->doesntExist()) {
            Objets::create([
                'id' => 'Poubelle073',
                'nom' => 'Poubelle de recyclage',
                'type' => 'Poubelle',
                'pieces' => 'B3',
                'connectivite' => 'Wifi',
                'statut' => 'Vide',
                'mode' => 'Automatique',
                'etat_batterie' => 50,
                'temperature' => null,
                'niveau_encre' => null,
                'niveau_remplissage' => 30,
                'conso_Wh' => 500,
                'nbre_utilisations' => 50,
            ]);
        }

        if (Objets::where('id', 'Imprimante001')->doesntExist()) {
            Objets::create([
                'id' => 'Imprimante001',
                'nom' => 'Imprimante HP',
                'type' => 'Imprimante',
                'pieces' => 'B3',
                'connectivite' => 'Ethernet',
                'statut' => 'Hors ligne',
                'mode' => 'Standard',
                'etat_batterie' => 10,
                'temperature' => null,
                'niveau_encre' => 45,
                'niveau_remplissage' => null,
                'conso_Wh' => 1000,
                'nbre_utilisations' => 168,
            ]);
        }

        if (Objets::where('id', 'Imprimante008')->doesntExist()) {
            Objets::create([
                'id' => 'Imprimante008',
                'nom' => 'Imprimante EPSON',
                'type' => 'Imprimante',
                'pieces' => 'B3',
                'connectivite' => 'Ethernet',
                'statut' => 'En ligne',
                'mode' => 'Standard',
                'etat_batterie' => 10,
                'temperature' => null,
                'niveau_encre' => 20,
                'niveau_remplissage' => null,
                'conso_Wh' => 1300,
                'nbre_utilisations' => 180,
            ]);
        }

        if (Objets::where('id', 'Imprimante012')->doesntExist()) {
            Objets::create([
                'id' => 'Imprimante012',
                'nom' => 'Imprimante HP',
                'type' => 'Imprimante',
                'pieces' => 'B3',
                'connectivite' => 'Ethernet',
                'statut' => 'En ligne',
                'mode' => 'Standard',
                'etat_batterie' => 10,
                'temperature' => null,
                'niveau_encre' => 85,
                'niveau_remplissage' => null,
                'conso_Wh' => 1500,
                'nbre_utilisations' => 200,
            ]);
        }

        if (Objets::where('id', 'Casier456')->doesntExist()) {
            Objets::create([
                'id' => 'Casier456',
                'nom' => 'Casier de sécurité',
                'type' => 'Serrure',
                'pieces' => 'B3',
                'connectivite' => 'Bluetooth',
                'statut' => 'Verrouillé',
                'mode' => 'Automatique',
                'etat_batterie' => 75,
                'temperature' => null,
                'niveau_encre' => null,
                'niveau_remplissage' => null,
                'conso_Wh' => 550,
                'nbre_utilisations' => 30,
            ]);
        }

        if (Objets::where('id', 'Casier306')->doesntExist()) {
            Objets::create([
                'id' => 'Casier306',
                'nom' => 'Casier de sécurité',
                'type' => 'Serrure',
                'pieces' => 'C10',
                'connectivite' => 'Bluetooth',
                'statut' => 'Déverrouillé',
                'mode' => 'Automatique',
                'etat_batterie' => 70,
                'temperature' => null,
                'niveau_encre' => null,
                'niveau_remplissage' => null,
                'conso_Wh' => 800,
                'nbre_utilisations' => 87,
            ]);
        }

        if (Objets::where('id', 'Casier456')->doesntExist()) {
            Objets::create([
                'id' => 'Casier456',
                'nom' => 'Casier de sécurité',
                'type' => 'Serrure',
                'pieces' => 'B3',
                'connectivite' => 'Bluetooth',
                'statut' => 'Verrouillé',
                'mode' => 'Automatique',
                'etat_batterie' => 85,
                'temperature' => null,
                'niveau_encre' => null,
                'niveau_remplissage' => null,
                'conso_Wh' => 700,
                'nbre_utilisations' => 65,
            ]);
        }
    }
}
