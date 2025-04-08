@extends('layout')
@section('contenu')
<div class="main-content">
    <!-- Header -->
    <header class="bg-blue-900 text-white p-6 shadow-md">
        <div class="header-content">
                <p class="text-xl font-semibold">Lycée Connecté</p>
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
            <a class='accueil' href='/visualisation'>Accueil</a>
            <a href='/profil'>Mon profil</a>
            <a href='/profilautres' id='current'>Profil des autres membres</a>
        </nav>
        </div>
    </header>

<!-- Page Content -->
<section class="py-16 px-6 bg-white">
<p class="text-lg text-gray-700 mb-8">Voici le profil des autres membres :</p>
<table>
    <tr>
        <th>Photo</th>
        <th>Login</th>
        <th>Age</th>
        <th>Sexe</th>
        <th>Date de naissance</th>
        <th>Type de membre</th>
    </tr>
@foreach($utilisateurs as $utilisateur)
    @if ($utilisateur->login)
        <tr>
            <td>
            @if($utilisateur->photo)
                <img src="{{ Storage::url($utilisateur->photo) }}" width="100" alt="Photo de profil">
            @endif
            </td>
            <td>{{ $utilisateur->login }}</td>
            <td>{{ $utilisateur->age }}</td>
            <td>{{ $utilisateur->sexe }}</td>
            <td>{{ $utilisateur->date_de_naissance }}</td>
            <td>{{ $utilisateur->type_membre }}</td>
        </tr>
    @endif
@endforeach
</table>
@endsection