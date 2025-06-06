@extends('layout')

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion - IntelliSchool</title>
    <link href="{{ asset('css/gestion.css') }}" rel="stylesheet">
@endsection

@if (session('success_dem'))
   <script>
       alert("{{ session('success_dem') }}");
   </script>
@endif

@if (session('success_stat'))
   <script>
       alert("{{ session('success_stat') }}");
   </script>
@endif

@if (session('success_obj'))
   <script>
       alert("{{ session('success_obj') }}");
   </script>
@endif

@if (session('success_assoc'))
   <script>
       alert("{{ session('success_assoc') }}");
   </script>
@endif

@section('contenu')
    <section class="welcome-section">
        <h1 class="header-title">Gestion des Objets Connectés</h1>
        <p class="welcome-message">Gestion, configuration et surveillance des équipements intelligents</p>
    </section>

    <div class="container">
        <div class="tabs">
            <div class="tab active" onclick="openTab('gestion')">Gestion</div>
            <div class="tab" onclick="openTab('configuration')">Configuration</div>
            {{-- <div class="tab" onclick="openTab('surveillance')">Surveillance</div> --}}
            <div class="tab" onclick="openTab('rapports')">Rapports</div>
        </div>
        
        <!-- Onglet Gestion -->
<div id="gestion" class="tab-content active">
    <div class="card">
        <h2>Gestions des objets connectés</h2></br>
        <button class='btn btn-primary'><a class='add' href='/ajoutobjets'>Ajouter un objet</a></button>
      
        <!-- Container for the table with horizontal scrolling -->
        <div class="table-caption">
            <strong>Liste des objets</strong>
        </div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Type</th>
                    <th style="text-align: center;">Pièce</th>
                    <th>Connectivité</th>
                    <th style="text-align: center;">Statut</th>
                    <th>Mode</th>
                    <th style="text-align: center;">Etat de la batterie</th>
                    <th>Température</th>
                    <th>Niveau d'encre</th>
                    <th>Niveau de remplissage</th>
                    <th style="text-align: center;">Consommation (Wh)</th>
                    <th style="text-align: center;">Nombre d'utilisations</th>
                    <th>Actions</th> 
                </tr>
                @foreach($objets as $objet)
                <tr>
                    <td>{{ $objet->id }}</td>
                    <td>{{ $objet->nom }}</td>
                    <td>{{ $objet->type }}</td>
                    <td style="text-align: center;">{{ $objet->pieces }}</td>
                    <td style="text-align: center;">{{ $objet->connectivite }}</td>
                    <td style="text-align: center;">{{ $objet->statut }}</td>
                    <td>{{ $objet->mode }}</td>
                    <td style="text-align: center;">{{ $objet->etat_batterie }}</td>
                    <td style="text-align: center;">{{ $objet->temperature ?? '-' }}</td>
                    <td style="text-align: center;">{{ $objet->niveau_encre ?? '-' }}</td>
                    <td style="text-align: center;">{{ $objet->niveau_remplissage ?? '-' }}</td>
                    <td style="text-align: center;">{{ $objet->conso_Wh ?? '-' }}</td>
                    <td style="text-align: center;">{{ $objet->nbre_utilisations ?? '-' }}</td>
                    <td>
                    <form action="/gestion/demandesup/{{ $objet->id }}" method="post" style="display:inline;">
                        @csrf
                        <button class="btn btn-primary" type='submit'>Demander la suppression</button>
                    </form>
                    <div style="display: flex; gap: 3px;">
                    <button class="btn btn-warning"><a class="add" href="/gestion/{{ $objet->id }}">Modifier</a></button>
                    @php
                        // Définir les classes & libellés selon le statut
                        $statut = $objet->statut;
                        switch ($statut) {
                            case 'Actif':
                                $btnClass = 'btn-danger';
                                $label = 'Désactiver';
                                break;
                            case 'Inactif':
                                $btnClass = 'btn-secondary';
                                $label = 'Activer';
                                break;
                            case 'Déverrouillé':
                                $btnClass = 'btn-danger';
                                $label = 'Verrouiller';
                                break;
                            case 'Verrouillé':
                                $btnClass = 'btn-secondary';
                                $label = 'Déverrouiller';
                                break;
                            case 'En ligne':
                                $btnClass = 'btn-danger';
                                $label = 'Mettre hors ligne';
                                break;
                            case 'Hors ligne':
                                $btnClass = 'btn-secondary';
                                $label = 'Mettre en ligne';
                                break;
                            case 'Plein':
                                $btnClass = 'btn-danger';
                                $label = 'Vider';
                                break;
                            case 'Vide':
                                $btnClass = 'btn-secondary';
                                $label = 'Remplir';
                                break;
                            case 'En marche':
                                $btnClass = 'btn-danger';
                                $label = 'Eteindre';
                                break;
                            case 'Eteint':
                                $btnClass = 'btn-secondary';
                                $label = 'Allumer';
                                break;
                        }
                    @endphp
                    <form action="/gestion/controlstatut/{{ $objet->id }}" method="POST" style="display:inline;">
                        @csrf
                        <button class="btn {{ $btnClass }}" type="submit">
                            {{ $label }}
                        </button>
                    </form>
                    </div>
                    </td>
                </tr>
                @endforeach
            </table>
    </div>
</div>

        <!-- Onglet Configuration -->
        <div id="configuration" class="tab-content">
            <div class="card">
                <h2>Associer des objets à des zones</h2></br>
            <form action='/gestion/association/{{ $objet->id }}' method='post'>
                @csrf
                @if ($errors->any())
                <div class="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-group">
                    <label for="objet">Objet connecté</label>
                    <select name='objet' id="objet">
                        <option value="" disabled selected>Sélectionner un objet</option>
                        @foreach($objets as $objet)
                        <option value="{{ $objet->id }}">{{ $objet->nom }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="piece">Zone/pièce</label>
                    <select name='piece' id="piece">
                        <option value="" disabled selected>Sélectionner une pièce</option>
                        <option value="Salle de classe">Salle de classe</option>
                        <option value="Couloir principal">Couloir principal</option>
                        <option value="Cantine">Cantine</option>
                        <option value="Bureau du principal">Bureau du principal</option>
                        <option value="Salle de réunion">Salle de réunion</option>
                        <option value="Toilettes">Toilettes</option>
                        <option value="Bibliothèque">Bibliothèque</option>
                    </select>
                </div>
                
                <button class="btn btn-primary" type='submit'>Associer</button>
            </form>
            </div>
            
            {{-- <div class="card">
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
            </div> --}}
        </div>
        
        <!-- Onglet Surveillance -->
        {{-- <div id="surveillance" class="tab-content">
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
            </div> --}}
            {{-- 
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
         --}}
        <!-- Onglet Rapports -->
        <div id="rapports" class="tab-content">
            <div class="card">
                <h2>Génération de rapports</h2></br>
                {{-- <div class="form-group">
                    <label for="periode">Période</label>
                    <select id="periode">
                        <option value="jour">Journalier</option>
                        <option value="semaine">Hebdomadaire</option>
                        <option value="mois">Mensuel</option>
                        <option value="custom">Personnalisé</option>
                    </select>
                </div> --}}
                
{{--                 <div class="form-group">
                    <label for="type-rapport">Type de rapport</label>
                    <select id="type-rapport">
                        <option value="energie">Consommation énergétique</option>
                        <option value="utilisation">Taux d'utilisation</option>
                        <option value="maintenance">Historique de maintenance</option>
                        <option value="complet">Rapport complet</option>
                    </select>
                </div> --}}
                
                <button class='btn btn-primary'><a class='add' href='/rapportgestion'>Générer le rapport PDF</a></button></br></br>
                {{-- 
                <button class="btn btn-primary">Générer le rapport PDF</button>
                <button class="btn btn-secondary">Exporter en PDF</button>
                 --}}

                <div class="chart-container">
                    <!-- Espace réservé pour un graphique -->
                    <div class="chart-container" style="flex: 1; min-height: 500px;">
                        {!! $chart1->renderHtml() !!}
                    </div>
                    <div class="chart-container" style="flex: 1; min-height: 500px;">
                        {!! $chart2->renderHtml() !!}
                    </div>



                </div>
            </div>
        </div>
    </div>
    
    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart2->renderChartJsLibrary() !!}

    {!! $chart1->renderJs() !!}
    {!! $chart2->renderJs() !!}

    

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