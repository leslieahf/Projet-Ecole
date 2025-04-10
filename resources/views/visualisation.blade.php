@extends('layout')

@section('head') <!-- Section pour remplir le head du layout -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualisation - IntelliSchool</title>
    <link href="{{ asset('css/visualisation.css') }}" rel="stylesheet"> <!-- Lien vers le fichier CSS spécifique -->
@endsection

@if (session('success'))
   <script>
       alert("{{ session('success') }}");
        window.location.href = "/visualisation"; 
   </script>
@endif

@section('contenu')
<!-- Main Content -->
<div class="main-content">
        <nav>
            <form class='recherche' action="/visualisation" method="get">
                <input type="text" name="search" placeholder="Rechercher par nom ou description" value="{{ request('search') }}">
                <select class='filtrerselect' name="mode">
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
        </div>


    <!-- Page Content -->
    <section class="py-16 px-6 bg-white">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="header-title text-blue-900 mb-4">Bienvenue, {{Auth()->user()->prenom}} {{Auth()->user()->nom}}</h2>
            <p class="text-lg text-gray-700 mb-8">Nous sommes heureux de vous voir connecté. Explorez les différentes fonctionnalités de la plateforme.</p>
        </div>
@if(request('search') || request('mode'))
    @if($objets->count() > 0)
        <p>Voici les objets correspondant à votre recherche :</p>
        <table>
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
            </tr>
            @foreach($objets as $objet)
                <tr>
                    <td>{{ $objet->id }}</td>
                    <td>{{ $objet->nom }}</td>
                    <td>{{ $objet->connectivite }}</td>
                    <td>{{ $objet->statut }}</td>
                    <td>{{ $objet->mode }}</td>
                    <td>{{ $objet->etat_batterie }}</td>
                    <td>{{ $objet->temperature ?? 'NULL' }}</td>
                    <td>{{ $objet->niveau_encre ?? 'NULL' }}</td>
                    <td>{{ $objet->niveau_remplissage ?? 'NULL' }}</td>
                </tr>
            @endforeach
        </table>
    @else
        <p>Aucun objet trouvé</p></br>
    @endif
    @if($outils->count() > 0)
        <p>Voici les outils/services correspondant à votre recherche :</p>
        @foreach($outils as $outil)
            <?php $services = explode(',', $outil->description) ?>
            <h3 class="outil-title header-title text-blue-900 mb-4">{{ $outil->nom }}</h3>
            <ul class="service-list">
                @foreach($services as $service)
                    <li>{{ $service }}</li>
                @endforeach
            </ul>
        @endforeach
    @else
        <p>Aucun outil trouvé</p></br>
    @endif
@else
    <p>Voici les outils et services proposés par la plateforme :</p>
    @foreach($outils as $outil)
        <?php $services = explode(',', $outil->description) ?>
        <h3 class="outil-title header-title text-blue-900 mb-4">{{ $outil->nom }}</h3>
        <ul class="service-list">
            @foreach($services as $service)
                <li>{{ $service }}</li>
            @endforeach
        </ul>
    @endforeach
@endif
</section>
</div>
@endsection


