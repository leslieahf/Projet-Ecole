@extends('layout')
@section('contenu')
<form action="/gestion" method="get">
    <input type="text" name="search" placeholder="Rechercher par nom ou description" value="{{ request('search') }}">
    <select name="mode">
        <option value="" disabled {{ request('mode') == '' ? 'selected' : '' }}>Filtrer par mode</option>
        <option value="Automatique" {{ request('mode') == 'Automatique' ? 'selected' : '' }}>Automatique</option>
        <option value="Standard" {{ request('mode') == 'Standard' ? 'selected' : '' }}>Standard</option>
        <option value="">Pas de filtre</option>
    </select>
    <button type='submit'>Rechercher</button>
</form>
<div>
    <button>
        <a href='/gestion'>Accueil</a>
    </button>
</div>
<div>
    <button>
        <a href='/profil'>Mon profil</a>
    </button>
</div>
<div>
    <button>
        <a href='/profilautres'>Profil des autres membres</a>
    </button>
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
        <p>Aucun objet trouvé</p>
    @endif
    @if($outils->count() > 0)
        <p>Voici les outils/services correspondant à votre recherche :</p>
        @foreach($outils as $outil)
            <?php $services = explode(',', $outil->description) ?>
            <h3>{{ $outil->nom }}</h3>
            <ul>
                @foreach($services as $service)
                    <li>{{ $service }}</li>
                @endforeach
            </ul>
        @endforeach
    @else
        <p>Aucun outil trouvé</p>
    @endif
@else
    <p>Voici les outils et services proposés par la plateforme :</p>
    @foreach($outils as $outil)
        <?php $services = explode(',', $outil->description) ?>
        <h3>{{ $outil->nom }}</h3>
        <ul>
            @foreach($services as $service)
                <li>{{ $service }}</li>
            @endforeach
        </ul>
    @endforeach
@endif


<div class="container">
    <h1>Bienvenue {{ auth()->user()->prenom }} {{ auth()->user()->nom }}</h1>
    
    <div class="user-info">
        <p>Points d'expérience : {{ auth()->user()->points_exp }}</p>
        <p>Niveau actuel : {{ auth()->user()->niveau }}</p>
    </div>

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form action="/update-niveau" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Mettre à jour mon niveau</button>
    </form>

    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .user-info {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: 400;
            line-height: 1.5;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            border: 1px solid transparent;
            cursor: pointer;
        }
        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
    </style>
</div>
@endsection 
