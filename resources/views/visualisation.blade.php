@extends('layout')
@if (session('success'))
   <script>
       alert("{{ session('success') }}");
        window.location.href = "/visualisation"; 
   </script>
@endif
<style>
    body {
        font-family: 'Roboto', sans-serif;
        min-height: 100vh;
        background-color: #f7fafc;
        margin: 0;
    }

    /* Contenu principal ajusté */
    .main-content {
        padding: 20px;
        flex-grow: 1;
    }

    /* Styles déjà définis pour le contenu */
    .header-title {
        font-size: 32px;
        font-weight: 600;
    }

    .section-header {
        font-size: 24px;
        font-weight: 500;
    }

    /* Assurer que le texte ne dépasse pas */
    .cta-button {
        background-color: #3182ce;
        color: white;
        padding: 12px 24px;
        border-radius: 8px;
        text-transform: uppercase;
        font-weight: bold;
        width: 100%;
        text-align: center;
        transition: background-color 0.3s ease;
        margin-top: auto;
        box-sizing: border-box;
    }

    .cta-button:hover {
        background-color: #2b6cb0;
    }

    /* Header avec un bouton de déconnexion à droite */
    .header-content {
        width: 100%;
    }

    /* Style pour le titre des outils (en gras et plus grand) */
    .outil-title {
        font-size: 24px;
        font-weight: bold; 
        margin-top: 20px;
        margin-bottom: 10px;
    }

    /* Liste des services avec des puces */
    .service-list {
        list-style-type: disc; 
        padding-left: 20px; 
        color: #555; 
    }

    .service-list li {
        font-size: 16px; 
        margin-bottom: 8px; 
    }

</style>
@section('contenu')
<!-- Main Content -->
<div class="main-content">
    
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


