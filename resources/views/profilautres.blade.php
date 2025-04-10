@extends('layout')

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil des autres utilisateurs - IntelliSchool</title>
    <link href="{{ asset('css/profilautres.css') }}" rel="stylesheet">
@endsection

@section('contenu')
<div class="main-container">
    <!-- En-tête de section -->
    <div class="section-header">
        <h1 class="section-title">Profil des membres</h1>
        <p class="section-subtitle">Voici la liste complète des utilisateurs</p>
    </div>

    <!-- Conteneur du tableau -->
    <div class="table-wrapper">
        <table class="profile-table">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Login</th>
                    <th>Age</th>
                    <th>Sexe</th>
                    <th>Date de naissance</th>
                    <th>Type de membre</th>
                </tr>
            </thead>
            <tbody>
                @foreach($utilisateurs as $utilisateur)
                    @if ($utilisateur->login)
                        <tr>
                            <td>
                                @if($utilisateur->photo)
                                    <img src="{{ Storage::url($utilisateur->photo) }}" 
                                         class="profile-avatar" 
                                         alt="Photo de profil de {{ $utilisateur->login }}">
                                @else
                                    <span class="empty-avatar">—</span>
                                @endif
                            </td>
                            <td>{{ $utilisateur->login }}</td>
                            <td>{{ $utilisateur->age }}</td>
                            <td>{{ $utilisateur->sexe }}</td>
                            <td>{{ $utilisateur->date_de_naissance }}</td>
                            <td class="member-type">{{ $utilisateur->type_membre }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection