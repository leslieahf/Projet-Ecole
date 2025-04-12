@extends('layout')
<link rel="stylesheet" href="{{ asset('css/administration.css') }}">
@if (session('success'))
   <script>
       alert("{{ session('success') }}");
   </script>
@endif

@section('contenu')


    <div class="container">
        <p>Voici la liste des utilisateurs de la plateforme :</p></br></br>
         <!-- Bouton Ajouter un utilisateur en dessous du tableau -->
         <div class="actions">
            <button class="btn-add"><a href="/ajoututilisateurs">Ajouter un utilisateur</a></button></br></br>
        </div>
        <!-- Container for the table with horizontal scrolling -->
        <div class="table-caption">
            <strong>Liste des utilisateurs</strong>
        </div>
        <div class="table-container">
            <table>
                <tr>
                    <th>Prénom</th>
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
                    <th>Actions</th> <!-- Nouvelle colonne pour les actions -->
                </tr>
            @foreach($utilisateurs as $utilisateur)
                <tr>
                    <td>{{ $utilisateur->prenom }}</td>
                    <td>{{ $utilisateur->nom }}</td>
                    <td>{{ $utilisateur->email }}</td>
                    <td style="text-align: center;">{{ $utilisateur->age }}</td>
                    <td>{{ $utilisateur->sexe }}</td>
                    <td style="text-align: center;">{{ $utilisateur->date_de_naissance }}</td>
                    <td>{{ $utilisateur->type_membre }}</td>
                    <td style="text-align: center;">{{ $utilisateur->nbre_connexions }}</td>
                    <td style="text-align: center;">{{ $utilisateur->nbre_consultations }}</td>
                    <td style="text-align: center;">{{ $utilisateur->points_exp }}</td>
                    <td>{{ $utilisateur->niveau }}</td>
                    <td>
                        <button class="btn-modify"><a href="/administration/{{ $utilisateur->id }}">Modifier</a></button>
                        @if(Auth::user()->niveau === 'Expert')
                        <form action="/administration/utilisateur/{{ $utilisateur->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn-delete">Supprimer</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </table>
        </div></br></br>

        <p>Voici la liste des objets de la plateforme :</p></br></br>
        <!-- Bouton Ajouter un objet en dessous du tableau -->
        <div class="actions">
            <button class="btn-add"><a href="/ajoutobjets">Ajouter un objet</a></button></br></br>
        </div>
        <!-- Container for the table with horizontal scrolling -->
        <div class="table-caption">
            <strong>Liste des objets</strong>
        </div>
        <div class="table-container">
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
                    <th>Consommation (Wh)</th>
                    @if(Auth::user()->niveau === 'Expert')
                    <th>Actions</th> <!-- Nouvelle colonne pour les actions -->
                    @endif
                </tr>
                @foreach($objets as $objet)
                <tr>
                    <td style="text-align: left;">{{ $objet->id }}</td>
                    <td>{{ $objet->nom }}</td>
                    <td>{{ $objet->connectivite }}</td>
                    <td>{{ $objet->statut }}</td>
                    <td>{{ $objet->mode }}</td>
                    <td style="text-align: center;">{{ $objet->etat_batterie }}</td>
                    <td style="text-align: center;" >{{ $objet->temperature ?? 'NULL' }}</td>
                    <td style="text-align: center;">{{ $objet->niveau_encre ?? 'NULL' }}</td>
                    <td style="text-align: center;">{{ $objet->niveau_remplissage ?? 'NULL' }}</td>
                    <td style="text-align: center;">{{ $objet->conso_Wh ?? 'NULL' }}</td>
                    @if(Auth::user()->niveau === 'Expert')
                    <td>
                    <form action="/administration/objet/{{ $objet->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn-delete">Supprimer</button>
                    </form>
                    </td>
                    @endif
                </tr>
                @endforeach
            </table>
        </div></br></br>

        <p>Voici la liste des outils et services proposés par la plateforme :</p></br></br>
        <!-- Bouton Ajouter un outil en dessous du tableau -->
        <div class="actions">
            <button class="btn-add"><a href="/ajoutoutils">Ajouter un outil</a></button></br></br>
        </div>
        <!-- Container for the table with horizontal scrolling -->
        <div class="table-caption">
            <strong>Liste des outils et services</strong>
        </div>
        <div class="table-container">
            <table class="tools-table">
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    @if(Auth::user()->niveau === 'Expert')
                    <th>Actions</th> <!-- Nouvelle colonne pour les actions -->
                    @endif
                </tr>
                @foreach($outils as $outil)
                <tr>
                    <td>{{ $outil->nom }}</td>
                    <td>{{ $outil->description }}</td>
                    @if(Auth::user()->niveau === 'Expert')
                    <td>
                    <form action="/administration/outil/{{ $outil->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Supprimer</button>
                    </form>

                    </td>
                    @endif
                </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection
