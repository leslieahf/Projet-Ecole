@extends('layout')

@section('head')
    <title>Événements - IntelliSchool</title>
    <link href="{{ asset('css/evenements.css') }}" rel="stylesheet">
@endsection

@section('contenu')
<nav class="main-nav">
    <div class="nav-container">
        <a href="{{ route('formations') }}" class="nav-btn">
            <span class="nav-icon">🎓</span>
            <span class="nav-text">Formations</span>
        </a>
        <a href="{{ route('evenements') }}" class="nav-btn active">
            <span class="nav-icon">📅</span>
            <span class="nav-text">Événements</span>
        </a>
        <a href="{{ route('transports') }}" class="nav-btn">
            <span class="nav-icon">🚌</span>
            <span class="nav-text">Transports</span>
        </a>
    </div>
</nav>

<div class="events-container">
    <section class="hero-banner">
        <h1>Événements du Lycée</h1>
        <p>Découvrez tous les événements à venir</p>
    </section>

    <div class="events-timeline">
        <!-- Événement 1 -->
        <div class="event-item">
            <div class="event-date">
                <span class="day">15</span>
                <span class="month">SEP</span>
            </div>
            <div class="event-content">
                <h2>Journée Portes Ouvertes</h2>
                <p>Découverte de l'établissement et des formations proposées.</p>
                <div class="event-meta">
                    <span>📍 Hall principal</span>
                    <span>⏰ 9h00 - 17h00</span>
                </div>
            </div>
        </div>

        <!-- Événement 2 -->
        <div class="event-item">
            <div class="event-date">
                <span class="day">20</span>
                <span class="month">OCT</span>
            </div>
            <div class="event-content">
                <h2>Forum des Métiers</h2>
                <p>Rencontre avec des professionnels de différents secteurs.</p>
                <div class="event-meta">
                    <span>📍 Salle polyvalente</span>
                    <span>⏰ 10h00 - 16h00</span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="featured-events">
    <h3>Événements phares</h3>
    <div class="event-buttons">
        <a href="{{ route('event.hackathon') }}" class="btn-event">Hackathon Jr</a>
        <a href="{{ route('event.festival') }}" class="btn-event">Festival des Arts</a>
        <a href="{{ route('event.jpo') }}" class="btn-event">Journée Portes Ouvertes</a>
    </div>
</div>
    
</div>
@endsection