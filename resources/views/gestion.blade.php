@extends('layout')

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion - IntelliSchool</title>
    <link href="{{ asset('css/gestion.css') }}" rel="stylesheet">
@endsection

@section('contenu')
    <section class="welcome-section">
        <h1 class="header-title">Gestion des Objets Connectés</h1>
        <p class="welcome-message">Configuration et surveillance des équipements intelligents</p>
    </section>

    <div class="container">
        <div class="tabs">
            <div class="tab active" onclick="openTab('configuration')">Configuration</div>
            <div class="tab" onclick="openTab('surveillance')">Surveillance</div>
            <div class="tab" onclick="openTab('rapports')">Rapports</div>
        </div>
        
        <!-- Onglet Configuration -->
        <div id="configuration" class="tab-content active">
            <div class="card">
                <h2>Associer des objets à des zones</h2>
                <div class="form-group">
                    <label for="objet">Objet connecté</label>
                    <select id="objet">
                        <option value="">Sélectionner un objet</option>
                        <option value="thermostat1">Thermostat - Salle A1</option>
                        <option value="lumiere2">Lumière - Couloir principal</option>
                        <option value="capteur3">Capteur de CO2 - Labo informatique</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="zone">Zone/pièce</label>
                    <select id="zone">
                        <option value="">Sélectionner une zone</option>
                        <option value="salle_a1">Salle A1</option>
                        <option value="couloir_principal">Couloir principal</option>
                        <option value="labo_info">Labo informatique</option>
                        <option value="cantine">Cantine</option>
                    </select>
                </div>
                
                <button class="btn btn-primary">Associer</button>
            </div>
            
            <div class="card">
                <h2>Configuration des paramètres</h2>
                <div class="grid">
                    <div>
                        <h3>Thermostats</h3>
                        <div class="form-group">
                            <label for="temp-cible">Température cible (°C)</label>
                            <input type="number" id="temp-cible" min="15" max="30" value="20">
                        </div>
                        <div class="form-group">
                            <label for="horaire-thermo">Plage horaire</label>
                            <select id="horaire-thermo">
                                <option value="7-18">7h-18h (scolaire)</option>
                                <option value="8-17">8h-17h (bureaux)</option>
                                <option value="24/7">24h/24</option>
                                <option value="custom">Personnalisé</option>
                            </select>
                        </div>
                        <button class="btn btn-secondary">Appliquer</button>
                    </div>
                    
                    <div>
                        <h3>Éclairages</h3>
                        <div class="form-group">
                            <label for="intensite">Intensité lumineuse (%)</label>
                            <input type="range" id="intensite" min="0" max="100" value="75">
                        </div>
                        <div class="form-group">
                            <label for="horaire-lumiere">Programmation</label>
                            <select id="horaire-lumiere">
                                <option value="auto">Automatique (détection présence)</option>
                                <option value="7-19">7h-19h</option>
                                <option value="custom">Personnalisé</option>
                            </select>
                        </div>
                        <button class="btn btn-secondary">Appliquer</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Onglet Surveillance -->
        <div id="surveillance" class="tab-content">
            <div class="card">
                <h2>État des objets connectés</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Objet</th>
                            <th>Zone</th>
                            <th>Statut</th>
                            <th>Dernière activité</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Thermostat #1</td>
                            <td>Salle A1</td>
                            <td><span class="status-badge status-normal">Opérationnel</span></td>
                            <td>Il y a 5 min</td>
                            <td>
                                <button class="btn btn-primary">Configurer</button>
                                <button class="btn btn-warning">Maintenance</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Lumière #2</td>
                            <td>Couloir principal</td>
                            <td><span class="status-badge status-warning">Efficacité réduite</span></td>
                            <td>Il y a 2 min</td>
                            <td>
                                <button class="btn btn-primary">Configurer</button>
                                <button class="btn btn-warning">Maintenance</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Capteur CO2 #3</td>
                            <td>Labo informatique</td>
                            <td><span class="status-badge status-danger">Nécessite intervention</span></td>
                            <td>Il y a 1 heure</td>
                            <td>
                                <button class="btn btn-primary">Configurer</button>
                                <button class="btn btn-danger">Remplacer</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="card">
                <h2>Optimisation énergétique</h2>
                <div class="grid">
                    <div>
                        <h3>Consommation actuelle</h3>
                        <p><strong>250 kWh</strong> aujourd'hui</p>
                        <p><strong>1,750 kWh</strong> cette semaine</p>
                        <p class="status-badge status-warning">+15% vs semaine dernière</p>
                    </div>
                    <div>
                        <h3>Objets inefficaces</h3>
                        <ul>
                            <li>Lumière #2 (Couloir principal) - 25% d'utilisation inefficace</li>
                            <li>Thermostat #5 (Bureaux) - Fonctionnement en dehors des heures ouvrables</li>
                        </ul>
                        <button class="btn btn-secondary">Voir recommandations</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Onglet Rapports -->
        <div id="rapports" class="tab-content">
            <div class="card">
                <h2>Génération de rapports</h2>
                <div class="form-group">
                    <label for="periode">Période</label>
                    <select id="periode">
                        <option value="jour">Journalier</option>
                        <option value="semaine">Hebdomadaire</option>
                        <option value="mois">Mensuel</option>
                        <option value="custom">Personnalisé</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="type-rapport">Type de rapport</label>
                    <select id="type-rapport">
                        <option value="energie">Consommation énergétique</option>
                        <option value="utilisation">Taux d'utilisation</option>
                        <option value="maintenance">Historique de maintenance</option>
                        <option value="complet">Rapport complet</option>
                    </select>
                </div>
                
                <button class="btn btn-primary">Générer le rapport</button>
                <button class="btn btn-secondary">Exporter en PDF</button>
                
                <div class="chart-container">
                    <!-- Espace réservé pour un graphique -->
                    <p style="text-align: center; padding: 50px; background: var(--light-bg); border-radius: 4px;">
                        [Graphique de consommation énergétique apparaîtra ici]
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function openTab(tabName) {
            // Masquer tous les onglets
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Désactiver tous les boutons d'onglet
            document.querySelectorAll('.tab').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Activer l'onglet sélectionné
            document.getElementById(tabName).classList.add('active');
            event.currentTarget.classList.add('active');
        }
    </script>
@endsection