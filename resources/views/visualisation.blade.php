@extends('layout')

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualisation - IntelliSchool</title>
    <link href="{{ asset('css/visualisation.css') }}" rel="stylesheet">
@endsection

@if (session('success'))
@section('scripts')
    <script>
        alert("{{ session('success') }}");
        window.location.href = "/visualisation"; 
    </script>
@endsection
@endif

@section('contenu')
<div class="main-content">
    
    <section class="welcome-section">
        <h2 class="header-title">Bienvenue, {{Auth()->user()->prenom}} {{Auth()->user()->nom}}</h2>
        <p class="welcome-message">Nous sommes heureux de vous voir connecté. Explorez les différentes fonctionnalités de la plateforme.</p>
    </section>
    
    <nav>
        <form class='recherche' action="/visualisation" method="get">
            <input type="text" name="search" placeholder="Rechercher par nom ou description" value="{{ request('search') }}">
            <select name="mode">
                <option value="" disabled {{ request('mode') == '' ? 'selected' : '' }}>Filtrer par mode</option>
                <option value="Automatique" {{ request('mode') == 'Automatique' ? 'selected' : '' }}>Automatique</option>
                <option value="Standard" {{ request('mode') == 'Standard' ? 'selected' : '' }}>Standard</option>
                <option value="">Pas de filtre</option>
            </select>
            <input type='submit' value='Rechercher'/>
        </form>
        <a class='accueil' href='/visualisation' id='current'>Accueil</a>
        <a href='/profil'>Mon profil</a>
        <a href='/profilautres'>Profil des autres membres</a>
    </nav>


    <div class="dashboard-container">
        <!-- Section Objets Connectés -->
        <section class="objects-section">
            <h3 class="section-title">Vos Objets Connectés</h3>
            @if($objets->count() > 0)
                <div class="objects-grid">
                    @foreach($objets as $objet)
                        <div class="object-card">
                            <div class="object-header">
                                <h4>{{ $objet->nom }}</h4>
                                <span class="object-status {{ strtolower($objet->statut) }}">{{ $objet->statut }}</span>
                            </div>
                            <div class="object-details">
                                <div class="detail">
                                    <span class="detail-label">Connectivité:</span>
                                    <span>{{ $objet->connectivite }}</span>
                                </div>
                                <div class="detail">
                                    <span class="detail-label">Mode:</span>
                                    <span>{{ $objet->mode }}</span>
                                </div>
                                <div class="detail">
                                    <span class="detail-label">Batterie:</span>
                                    <span class="battery-level" style="--level: {{ $objet->etat_batterie }}%">
                                        {{ $objet->etat_batterie }}%
                                    </span>
                                </div>
                                @if($objet->temperature)
                                <div class="detail">
                                    <span class="detail-label">Température:</span>
                                    <span>{{ $objet->temperature }}°C</span>
                                </div>
                                @endif
                                @if($objet->niveau_encre)
                                <div class="detail">
                                    <span class="detail-label">Niveau d'encre:</span>
                                    <div class="ink-level">
                                        <div class="ink-level-bar" style="width: {{ $objet->niveau_encre }}%"></div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="no-results">Aucun objet connecté disponible</p>
            @endif
        </section>

        <!-- Section Services Disponibles -->
        <section class="services-section">
            <h3 class="section-title">Services Disponibles</h3>
            @if($outils->count() > 0)
                <div class="services-grid">
                    @foreach($outils as $outil)
                        <div class="service-card">
                            <h4>{{ $outil->nom }}</h4>
                            <div class="service-description">
                                <ul class="service-features">
                                    @foreach(explode(',', $outil->description) as $service)
                                        <li>{{ $service }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="no-results">Aucun service disponible</p>
            @endif
        </section>
    </div>
</div>
@endsection