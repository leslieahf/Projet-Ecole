@extends('layout')
@php
    use Carbon\Carbon;
@endphp

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - IntelliSchool</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link href="{{ asset('css/accueil.css') }}" rel="stylesheet">
@endsection
@section('contenu')
<div class="main-container">
    <!-- Hero Section -->
    <section class="hero">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>IntelliSchool</h1>
            <br>
            <h2>Bienvenue sur le site du lycée connecté</h2>
            <p>Explorez nos formations, événements et bien plus encore</p>
            <a href="#inscription" class="btn-primary">Rejoindre la plateforme</a>
        </div>
    </section>

    <!-- Présentation de l'école -->
    <section class="presentation">
        <div class="container">
            <h2>Découvrez notre établissement</h2>
            <p>IntelliSchool est un établissement innovant, dédié à l'excellence académique et à l'éducation moderne. Nos formations couvrent un large éventail de domaines, de la science aux arts, en passant par la technologie.</p>
            <div class="cards">
                <div class="card">
                    <h3>📚 Formations</h3>
                    <p>Explorez nos programmes dans les sciences, les lettres, la technologie, et plus encore.</p>
                </div>
                <div class="card">
                    <h3>🎉 Événements</h3>
                    <p>Suivez les événements à venir comme les journées portes ouvertes, les concours, et plus.</p>
                </div>
                <div class="card">
                    <h3>🚌 Transports</h3>
                    <p>Accédez aux informations de transport scolaire pour faciliter vos trajets.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section des événements -->
    <section id="events" class="events">
        <div class="container">
            <h2>Événements à venir</h2>

<!--            <nav>
                <form class='recherche' id="filterForm">
                    <input type="text" id="searchInput" placeholder="Rechercher par nom ou description">
                    <select id="modeSelect">
                        <option value="">Tous les événements</option>
                        <option value="Scolaire">Scolaire</option>
                        <option value="Extra-Scolaire">Extra-Scolaire</option>
                    </select>
                    <button type="button" id="searchButton">Rechercher</button>
                </form>
            </nav>

            <div class="event-cards">
                <div class="event-card" data-title="Journée Portes Ouvertes" data-mode="Scolaire">
                    <h3>Journée Portes Ouvertes</h3>
                    <p>Venez découvrir notre établissement le 15 septembre !</p>
                    <p class="date">Date: 15 Septembre 2025</p>
                </div>
                <div class="event-card" data-title="Concours d'Informatique" data-mode="Scolaire">
                    <h3>Concours d'Informatique</h3>
                    <p>Inscrivez-vous pour participer à notre concours de codage annuel !</p>
                    <p class="date">Date: 20 Octobre 2025</p>
                </div>
                <div class="event-card" data-title="Festival des Arts" data-mode="Extra-Scolaire">
                    <h3>Festival des Arts</h3>
                    <p>Venez admirer les créations artistiques de nos élèves !</p>
                    <p class="date">Date: 5 Décembre 2025</p>
                </div>
            </div>
        -->

                <nav>
                    <form class='recherche' id="filterForm" action="/#events" method="get">
                        <input type="text" name="search" placeholder="Rechercher par titre ou description" value="{{ request('search') }}">
                        <select name="annee">
                            <option value="" disabled {{ request('annee') == '' ? 'selected' : '' }}>Filtrer par année</option>
                            <option value="2025" {{ request('annee') == '2025' ? 'selected' : '' }}>2025</option>
                            <option value="2026" {{ request('annee') == '2026' ? 'selected' : '' }}>2026</option>
                            <option value="">Pas de filtre</option>
                        </select>
                        <input type='submit' value='Rechercher'/>
                    </form>
                </nav>

                @if(request('search') || request('annee'))
                <div class="event-cards">
                    @foreach($evenements as $evenement)
                    <div class="event-card">
                        <h3>{{ $evenement->titre }}</h3>
                        <p>{{ $evenement->description }}</p>
                        <p class="date">Date: {{ $evenement->date->locale('fr')->isoFormat('D MMMM YYYY') }}</p>
                    </div>
                    @endforeach
                </div>
                @endif
        </div>
    </section>

    <!-- Section Inscription -->
    <section id="inscription" class="inscription">
        <div class="container">
            <h2>Rejoindre la plateforme</h2>
            <p>Inscrivez-vous dès maintenant pour accéder à tous les services et ressources de notre lycée.</p>
            <div class="inscription-buttons">
                @if(auth()->guest())
                <a href="/inscription" class="btn-primary btn-sinscrire">S'inscrire maintenant</a>
                <a href="/connexion" class="btn-secondary">Se connecter</a>
                @else
                <a href="/profil" class="btn-primary">Mon profil</a>
                <a href="/deconnexion" class="btn-ternary">Se déconnecter</a>
                @endif
            </div>
        </div>
    </section>
@endsection
@if(session()->has('js_message3'))
    <script>
        alert("{!! session('js_message3') !!}");
        {{ session()->forget('js_message3') }} 
    </script>
@endif


@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const modeSelect = document.getElementById('modeSelect');
    const searchButton = document.getElementById('searchButton');
    const eventCards = document.querySelectorAll('.event-card');

    function filterEvents() {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedMode = modeSelect.value;

        eventCards.forEach(card => {
            const title = card.dataset.title.toLowerCase();
            const mode = card.dataset.mode;
            
            const matchesSearch = title.includes(searchTerm) || searchTerm === '';
            const matchesMode = mode === selectedMode || selectedMode === '';
            
            if (matchesSearch && matchesMode) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Écouteurs d'événements
    searchButton.addEventListener('click', filterEvents);
    searchInput.addEventListener('keyup', function(e) {
        if (e.key === 'Enter') {
            filterEvents();
        }
    });
    modeSelect.addEventListener('change', filterEvents);
});
</script>
@endsection

    