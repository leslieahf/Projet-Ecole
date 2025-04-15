@extends('layout')

@section('head')
    <title>Transports - IntelliSchool</title>
    <link href="{{ asset('css/transports.css') }}" rel="stylesheet">
@endsection

@section('contenu')
<nav class="main-nav">
    <div class="nav-container">
        <a href="{{ route('formations') }}" class="nav-btn">
            <span class="nav-icon">🎓</span>
            <span class="nav-text">Formations</span>
        </a>
        <a href="{{ route('evenements') }}" class="nav-btn">
            <span class="nav-icon">📅</span>
            <span class="nav-text">Événements</span>
        </a>
        <a href="{{ route('transports') }}" class="nav-btn active">
            <span class="nav-icon">🚌</span>
            <span class="nav-text">Transports</span>
        </a>
    </div>
</nav>

<div class="transport-container">
    <section class="hero-banner">
        <h1>Informations Transports</h1>
        <p>Planifiez vos trajets vers notre établissement</p>
    </section>

    <div class="transport-content">
        <div class="transport-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.9916256937595!2d2.292292615509614!3d48.85837007928746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sTour%20Eiffel!5e0!3m2!1sfr!2sfr!4v1623251234567!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

        <div class="transport-lines">
            <h2>Lignes de bus desservant l'établissement</h2>
            <ul class="bus-lines">
                <li>
                    <span class="line-number">Ligne 42</span>
                    <span class="line-details">Gare Nord → Centre Ville → Lycée</span>
                    <span class="line-schedule">Toutes les 15min (7h-20h)</span>
                </li>
                <li>
                    <span class="line-number">Ligne 38</span>
                    <span class="line-details">Quartier Sud → Lycée</span>
                    <span class="line-schedule">Toutes les 30min (6h30-19h30)</span>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection