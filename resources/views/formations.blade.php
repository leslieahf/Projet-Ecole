@extends('layout')

@section('head')
    <title>Formations - IntelliSchool</title>
    <link href="{{ asset('css/formations.css') }}" rel="stylesheet">
@endsection

@section('contenu')
<div class="formations-container">
    <section class="hero-banner">
        <h1>Nos Formations</h1>
        <p>Découvrez notre offre pédagogique complète</p>
    </section>

    <div class="formations-grid">
        <!-- Formation 1 -->
        <div class="formation-card">
            <div class="formation-header">
                <h2>Bac Général</h2>
                <span class="level-badge">Seconde à Terminale</span>
            </div>
            <p>Parcours complet avec spécialités en Sciences, Humanités et Technologies.</p>
            <div class="formation-details">
                <span>📅 Durée: 3 ans</span>
                <span>👨‍🏫 Responsable: Mme. Durand</span>
            </div>
        </div>

        <!-- Formation 2 -->
        <div class="formation-card">
            <div class="formation-header">
                <h2>Bac Technologique STI2D</h2>
                <span class="level-badge">Première à Terminale</span>
            </div>
            <p>Spécialisation en innovation technologique et développement durable.</p>
            <div class="formation-details">
                <span>📅 Durée: 2 ans</span>
                <span>👨‍🏫 Responsable: M. Lefèvre</span>
            </div>
        </div>

        <!-- Formation 3 -->
        <div class="formation-card">
            <div class="formation-header">
                <h2>BTS SIO</h2>
                <span class="level-badge">Post-Bac</span>
            </div>
            <p>Services Informatiques aux Organisations, options SLAM ou SISR.</p>
            <div class="formation-details">
                <span>📅 Durée: 2 ans</span>
                <span>👨‍🏫 Responsable: M. Martin</span>
            </div>
        </div>
    </div>
</div>
@endsection