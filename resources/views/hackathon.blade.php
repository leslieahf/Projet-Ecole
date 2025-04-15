@extends('layout')

@section('head')
    <title>Hackathon Jr - IntelliSchool</title>
    <link href="{{ asset('css/hackathon.css') }}" rel="stylesheet">
    <link href="{{ asset('css/evenements.css') }}" rel="stylesheet">
@endsection

@section('contenu')
<div class="event-container">
    <section class="event-hero" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1551033406-611cf9a28f67');">
        <h1>Hackathon Jr</h1>
        <p>24 octobre 2025</p>
    </section>

    <div class="event-content">
        <div class="event-details">
            <h2>Concours de codage annuel</h2>
            <p>Inscrivez-vous pour participer à notre compétition de programmation ouverte à tous les élèves du lycée. Formez des équipes et relevez nos défis techniques !</p>
            
            <div class="event-info">
                <div class="info-card">
                    <h3>📅 Date</h3>
                    <p>24 octobre 2025</p>
                    <p>9h00 - 18h00</p>
                </div>
                <div class="info-card">
                    <h3>📍 Lieu</h3>
                    <p>Salle informatique B12</p>
                </div>
                <div class="info-card">
                    <h3>🎯 Public</h3>
                    <p>Élèves de la Seconde à la Terminale</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection