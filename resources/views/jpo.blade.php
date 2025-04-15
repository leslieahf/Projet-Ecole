@extends('layout')

@section('head')
    <title>Journée Portes Ouvertes - IntelliSchool</title>
    <link href="{{ asset('css/jpo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/evenements.css') }}" rel="stylesheet">  
@endsection

@section('contenu')
<div class="event-container">
    <section class="event-hero" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1588072432836-e10032774350');">
        <h1>Journée Portes Ouvertes</h1>
        <p>15 janvier 2026</p>
    </section>

    <div class="event-content">
        <div class="event-details">
            <h2>Découvrez notre établissement</h2>
            <p>Une occasion unique de visiter nos installations, rencontrer nos enseignants et en savoir plus sur nos formations.</p>
            
            <div class="event-info">
                <div class="info-card">
                    <h3>📅 Date et Heure</h3>
                    <p>15 janvier 2026</p>
                    <p>9h00 - 17h00</p>
                </div>
                <div class="info-card">
                    <h3>📍 Lieu</h3>
                    <p>Lycée IntelliSchool</p>
                    <p>123 Rue de l'Éducation, 75000 Paris</p>
                </div>
                <div class="info-card">
                    <h3>✨ Programme</h3>
                    <ul>
                        <li>Visites guidées</li>
                        <li>Rencontres avec les enseignants</li>
                        <li>Présentations des formations</li>
                    </ul>
                </div>
            </div>

            <div class="event-schedule">
                <h3>Programme détaillé</h3>
                <div class="schedule-item">
                    <h4>9h00 - 10h30</h4>
                    <p>Accueil et présentation générale</p>
                </div>
                <div class="schedule-item">
                    <h4>10h30 - 12h30</h4>
                    <p>Visites des installations (groupes de 15 personnes)</p>
                </div>
                <div class="schedule-item">
                    <h4>13h30 - 15h30</h4>
                    <p>Rencontres avec les enseignants par filière</p>
                </div>
                <div class="schedule-item">
                    <h4>15h30 - 17h00</h4>
                    <p>Échanges informels et questions/réponses</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection