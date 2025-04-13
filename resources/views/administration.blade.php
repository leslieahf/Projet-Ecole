@extends('layout')

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - IntelliSchool</title>
    <link href="{{ asset('css/administration.css') }}" rel="stylesheet">
@endsection

@if (session('success'))
   <script>
       alert("{{ session('success') }}");
   </script>
@endif

@section('contenu')
    <section class="welcome-section">
        <h1 class="header-title">Administration</h1>
        <p class="welcome-message">Gestion complète des utilisateurs, objets et outils</p>
    </section>

    <div class="container">
        <div class="tabs">
            <div class="tab active" onclick="openTab('utilisateurs')">Utilisateurs</div>
            <div class="tab" onclick="openTab('objets')">Objets</div>
            <div class="tab" onclick="openTab('outils')">Outils</div>
            <div class="tab" onclick="openTab('rapports')">Rapports</div>
        </div>
        
        <!-- Onglet Utilisateurs -->
        <div id="utilisateurs" class="tab-content active">
            <div class="card">
                <h2>Gestion des utilisateurs</h2>
                <div class="mb-3">
                    <a href="/ajoututilisateurs" class="btn btn-primary">Ajouter un utilisateur</a>
                </div>
                
                <div class="table-caption">
                    <strong>Liste des utilisateurs</strong>
                </div>
                
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Age</th>
                                <th>Sexe</th>
                                <th>Date de naissance</th>
                                <th>Type de membre</th>
                                <th>Nbre de connexions</th>
                                <th>Nbre de consultations</th>
                                <th>Points d'expérience</th>
                                <th>Niveau</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($utilisateurs as $utilisateur)
                            <tr>
                                <td>{{ $utilisateur->prenom }}</td>
                                <td>{{ $utilisateur->nom }}</td>
                                <td>{{ $utilisateur->email }}</td>
                                <td class="text-center">{{ $utilisateur->age }}</td>
                                <td>{{ $utilisateur->sexe }}</td>
                                <td class="text-center">{{ $utilisateur->date_de_naissance }}</td>
                                <td>{{ $utilisateur->type_membre }}</td>
                                <td class="text-center">{{ $utilisateur->nbre_connexions }}</td>
                                <td class="text-center">{{ $utilisateur->nbre_consultations }}</td>
                                <td class="text-center">{{ $utilisateur->points_exp }}</td>
                                <td>{{ $utilisateur->niveau }}</td>
                                <td>
                                    <div class="d-flex flex-column gap-2">
                                        <a href="/administration/{{ $utilisateur->id }}" class="btn btn-warning">Modifier</a>
                                        @if(Auth::user()->niveau === 'Expert')
                                        <form action="/administration/utilisateur/{{ $utilisateur->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Onglet Objets -->
        <div id="objets" class="tab-content">
            <div class="card">
                <h2>Gestion des objets</h2>
                <div class="mb-3">
                    <a href="/ajoutobjets" class="btn btn-primary">Ajouter un objet</a>
                </div>
                
                <div class="table-caption">
                    <strong>Liste des objets</strong>
                </div>
                
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Connectivité</th>
                                <th>Statut</th>
                                <th>Mode</th>
                                <th>Etat de la batterie</th>
                                <th>Température</th>
                                <th>Niveau d'encre</th>
                                <th>Niveau de remplissage</th>
                                <th>Consommation (Wh)</th>
                                @if(Auth::user()->niveau === 'Expert')
                                <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($objets as $objet)
                            <tr>
                                <td>{{ $objet->id }}</td>
                                <td>{{ $objet->nom }}</td>
                                <td>{{ $objet->connectivite }}</td>
                                <td>{{ $objet->statut }}</td>
                                <td>{{ $objet->mode }}</td>
                                <td class="text-center">{{ $objet->etat_batterie }}</td>
                                <td class="text-center">{{ $objet->temperature ?? 'NULL' }}</td>
                                <td class="text-center">{{ $objet->niveau_encre ?? 'NULL' }}</td>
                                <td class="text-center">{{ $objet->niveau_remplissage ?? 'NULL' }}</td>
                                <td class="text-center">{{ $objet->conso_Wh ?? 'NULL' }}</td>
                                @if(Auth::user()->niveau === 'Expert')
                                <td>
                                    <form action="/administration/objet/{{ $objet->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Onglet Outils -->
        <div id="outils" class="tab-content">
            <div class="card">
                <h2>Gestion des outils</h2>
                <div class="mb-3">
                    <a href="/ajoutoutils" class="btn btn-primary">Ajouter un outil</a>
                </div>
                
                <div class="table-caption">
                    <strong>Liste des outils et services</strong>
                </div>
                
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Description</th>
                                @if(Auth::user()->niveau === 'Expert')
                                <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($outils as $outil)
                            <tr>
                                <td>{{ $outil->nom }}</td>
                                <td>{{ $outil->description }}</td>
                                @if(Auth::user()->niveau === 'Expert')
                                <td>
                                    <form action="/administration/outil/{{ $outil->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Onglet Rapport -->
        <div id="rapports" class="tab-content">
            <div class="card">
                <h2>Génération de rapports</h2>

                <div class="mb-3">
                    <form method="POST" action="/generer-rapport">
                        @csrf
                        <div class="mb-3">
                            <label for="type_rapport" class="form-label">Type de rapport</label>
                            <select class="form-select" id="type_rapport" name="type_rapport" required>
                                <option value="">Sélectionner un type</option>
                                <option value="utilisation">Utilisation de la plateforme</option>
                                <option value="energie">Consommation énergétique</option>
                                <option value="connexion">Taux de connexion</option>
                                <option value="services">Services les plus utilisés</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="periode" class="form-label">Période</label>
                            <select class="form-select" id="periode" name="periode" required>
                                <option value="7">7 derniers jours</option>
                                <option value="30">30 derniers jours</option>
                                <option value="90">3 derniers mois</option>
                                <option value="365">1 an</option>
                                <option value="custom">Personnalisée</option>
                            </select>
                        </div>

                        <div id="custom-date-range" class="mb-3" style="display: none;">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date_debut" class="form-label">Date de début</label>
                                    <input type="date" class="form-control" id="date_debut" name="date_debut">
                                </div>
                                <div class="col-md-6">
                                    <label for="date_fin" class="form-label">Date de fin</label>
                                    <input type="date" class="form-control" id="date_fin" name="date_fin">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="format" class="form-label">Format d'export</label>
                            <select class="form-select" id="format" name="format" required>
                                <option value="pdf">PDF</option>
                                <option value="csv">CSV</option>
                                <option value="excel">Excel</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Générer le rapport</button>
                    </form>
                </div>

                <!-- Section pour afficher les statistiques -->
                <div class="table-caption">
                    <strong>Statistiques globales</strong>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <h3>Consommation énergétique</h3>
                            <p>Total: {{ $stats['conso_totale'] ?? 0 }} Wh</p>
                            <p>Moyenne/jour: {{ $stats['conso_moyenne'] ?? 0 }} Wh</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <h3>Utilisateurs</h3>
                            <p>Taux de connexion: {{ $stats['taux_connexion'] ?? 0 }}%</p>
                            <p>Actifs (7j): {{ $stats['utilisateurs_actifs'] ?? 0 }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <h3>Services</h3>
                            @if(isset($stats['services_populaires']))
                                @foreach($stats['services_populaires'] as $service)
                                    <p>{{ $service->nom }}: {{ $service->count }} utilisations</p>
                                @endforeach
                            @endif
                        </div>
                    </div>
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