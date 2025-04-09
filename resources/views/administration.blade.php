@extends('layout')
<link rel="stylesheet" href="{{ asset('css/administration.css') }}">
@if (session('success'))
   <script>
       alert("{{ session('success') }}");
       window.location.href = "/administration"; 
   </script>
@endif

@section('contenu')
<p>Voici la liste des utilisateurs de la plateforme :</p>
<button><a href="/ajoututilisateurs">Ajouter un utilisateur</a></button>
<table>
    <caption><strong>Liste des utilisateurs<strong></caption>
    <tr>
        <th>Prenom</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Age</th>
        <th>Sexe</th>
        <th>Date de naissance</th>
        <th>Type de membre</th>
        <th>Nbre de connexions</th>
        <th>Nbre de consultations</th>
        <th>Points d'expérience</th>
        <th>Niveau</th>
        <th>Actions</th>
    </tr>
@foreach($utilisateurs as $utilisateur)
        <tr>
            <td>{{ $utilisateur->prenom }}</td>
            <td>{{ $utilisateur->nom }}</td>
            <td>{{ $utilisateur->email }}</td>
            <td>{{ $utilisateur->age }}</td>
            <td>{{ $utilisateur->sexe }}</td>
            <td>{{ $utilisateur->date_de_naissance }}</td>
            <td>{{ $utilisateur->type_membre }}</td>
            <td>{{ $utilisateur->nbre_connexions }}</td>
            <td>{{ $utilisateur->nbre_consultations }}</td>
            <td>{{ $utilisateur->points_exp }}</td>
            <td>{{ $utilisateur->niveau }}</td>
            <td>
                <button><a href="/administration/{{ $utilisateur->id }}">Modifier</a></button>
                <form action="/administration/utilisateur/{{ $utilisateur->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('delete')
                <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
@endforeach
</table>

<p>Voici la liste des objets de la plateforme :</p>
<button><a href="/ajoutobjets">Ajouter un objet</a></button>
<table>
    <caption><strong>Liste des objets<strong></caption>
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
        <td>
            <form action="/administration/objet/{{ $objet->id }}" method="POST" style="display:inline;">
                @csrf
                @method('delete')
            <button type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<p>Voici la liste des outils et services proposés par la plateforme :</p>
<button><a href="/ajoutoutils">Ajouter un outil</a></button>
<table>
    <caption><strong>Liste des outils et services<strong></caption>
    <tr>
        <th>Nom</th>
        <th>Description</th>
    </tr>
    @foreach($outils as $outil)
    <tr>
        <td>{{ $outil->nom }}</td>
        <td>{{ $outil->description }}</td>
        <td>
            <form action="/administration/outil/{{ $outil->id }}" method="POST" style="display:inline;">
                @csrf
                @method('delete')
            <button type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
