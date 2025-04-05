@extends('layout')
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
                <form action="/administration/{{ $utilisateur->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('delete')
                <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
@endforeach
</table>
@endsection