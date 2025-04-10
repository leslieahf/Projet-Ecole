@extends('layout')
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
    <section class="events">
        <div class="container">
            <h2>Événements à venir</h2>
                <nav>
                    <form class='recherche' action="/" method="get">
                        <input type="text" name="search" placeholder="Rechercher par nom ou description" value="{{ request('search') }}">
                        <select name="mode">
                            <option value="" disabled {{ request('mode') == '' ? 'selected' : '' }}>Filtrer par mode</option>
                            <option value="Automatique" {{ request('mode') == 'Automatique' ? 'selected' : '' }}>Automatique</option>
                            <option value="Standard" {{ request('mode') == 'Standard' ? 'selected' : '' }}>Standard</option>
                            <option value="">Pas de filtre</option>
                        </select>
                        <input type='submit' value='Rechercher'/>
                    </form>
                </nav>
            
                <div class="event-cards">
                    <div class="event-card">
                        <h3>Journée Portes Ouvertes</h3>
                        <p>Venez découvrir notre établissement le 15 septembre !</p>
                        <p class="date">Date: 15 Septembre 2025</p>
                    </div>
                    <div class="event-card">
                        <h3>Concours d'Informatique</h3>
                        <p>Inscrivez-vous pour participer à notre concours de codage annuel !</p>
                        <p class="date">Date: 20 Octobre 2025</p>
                    </div>
                    <div class="event-card">
                        <h3>Festival des Arts</h3>
                        <p>Venez admirer les créations artistiques de nos élèves !</p>
                        <p class="date">Date: 5 Décembre 2025</p>
                    </div>
            </div>
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

    
