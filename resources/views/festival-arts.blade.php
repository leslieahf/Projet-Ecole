@extends('layout')

@section('head')
    <title>Festival des Arts - IntelliSchool</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/festival-arts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/evenements.css') }}" rel="stylesheet">

@endsection

@section('contenu')
<div class="event-container">
    <section class="event-hero" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f');">
        <h1>Festival des Arts</h1>
        <p>27 novembre 2025</p>
    </section>

    <div class="event-content">
        <div class="event-details">
            <h2>Créativité et expression artistique</h2>
            <p>Découvrez les talents cachés de nos élèves à travers une exposition exceptionnelle de peintures, sculptures, photographies et performances live.</p>
            
            <div class="event-info">
                <div class="info-card">
                    <h3>📅 Date et Heure</h3>
                    <p>27 novembre 2025</p>
                    <p>14h00 - 20h00</p>
                </div>
                <div class="info-card">
                    <h3>📍 Lieu</h3>
                    <p>Hall principal et salle polyvalente</p>
                    <p>Lycée IntelliSchool</p>
                </div>
                <div class="info-card">
                    <h3>🎨 Activités</h3>
                    <ul>
                        <li>Exposition artistique</li>
                        <li>Performances live</li>
                        <li>Ateliers créatifs</li>
                    </ul>
                </div>
            </div>

            <div class="event-description">
                <h3>À propos de l'événement</h3>
                <p>Le Festival des Arts est l'occasion pour nos élèves de montrer leur créativité à travers diverses formes d'art. Cette année, nous mettons à l'honneur :</p>
                <ul>
                    <li>Une exposition de peintures et dessins</li>
                    <li>Des sculptures et installations</li>
                    <li>Un défilé de mode artistique</li>
                    <li>Des performances musicales et théâtrales</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection