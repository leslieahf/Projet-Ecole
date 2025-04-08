@extends('layout')
<style>
    body {
        font-family: 'Roboto', sans-serif;
        display: flex;
        min-height: 100vh;
        background-color: #f7fafc;
        margin: 0;
    }
    .cta-button {
        background-color: #3182ce; /* Bleu */
        color: white;
        padding: 12px 24px;
        border-radius: 8px;
        text-transform: uppercase;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .cta-button:hover {
        background-color: #2b6cb0; /* Couleur bleue plus foncée pour le survol */
    }

    .profile-photo {
        width: 120px;
        height: 120px;
        border-radius: 50%;
    }
    footer {
        margin-top: 20px;
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

    .main-content {
        padding: 20px;
        flex-grow: 1;
    }

    /* Header avec un bouton de déconnexion à droite */
    .header-content {
        width: 100%;
    }

</style>
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
                <a href='/profil' id='current'>Mon profil</a>
                <a href='/profilautres'>Profil des autres membres</a>
            </nav>
            </div>
        </header>

    <!-- Page Content -->
    <section class="py-16 px-6 bg-white">
@if(session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-3xl font-semibold text-blue-900 mb-4">Mon Profil</h2>
            <p class="text-lg text-gray-700 mb-8">Modifiez vos informations personnelles ci-dessous.</p>
                <!-- Carte Modifier Profil -->
                <div class="card bg-white p-6 rounded-xl shadow-md hover:shadow-lg col-span-1 sm:col-span-2 lg:col-span-3">
    <div class="container">
    <div>
    <form class="user-info" action='' method='post'>
        @csrf
        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </ul>
            </div>
        @endif
        <label for='photo'>Photo:</label>
        <div id="photo-preview-container" >
            @if ($utilisateur->photo)
            <img id="photo-preview" src="{{ Storage::url($utilisateur->photo) }}" width="100" alt="Photo actuelle"/>
            @endif
        </div>
        <input type='file' name='photo' id='photo' onchange="previewImage(event)"/></br></br>
        <div class='points'>
        <div>
        <p class='pfont1'>Points d'expérience : {{ auth()->user()->points_exp }}</p>
        <p class='pfont2'>Niveau actuel : {{ auth()->user()->niveau }}</p>
        </div>
            <div>
            <button class="btn btn-primary" name='action' value='action1' type="submit">Mettre à jour mon niveau</button>
            </div>
        </div>
        <label for='pren'>Prénom:</label>
        <input class='pren' type='text' name='prenom' id='pren' value="{{old('prenom', $utilisateur->prenom)}}"/></br></br>
        <label for='nom'>Nom:</label>
        <input class='nom' type='text' name='nom' id='nom' value="{{old('nom', $utilisateur->nom)}}"/></br></br>
        <label for='mail'>Email:</label>
        <input class='mail' type='text' name='email' id='mail' value="{{old('email', $utilisateur->email)}}"/></br></br>
        <label for='log'>Login:</label>
        <input class='log' type='text' name='login' id='log' value="{{old('login', $utilisateur->login)}}"/></br></br>
        <label for='mdp'>Mot de passe:</label>
        <input class='mdp' type='password' name='mot_de_passe' id='mdp'/></br></br>
        <label for='age'>Age:</label>
        <input class='age' type='text' name='age' id='age' value="{{old('age', $utilisateur->age)}}"/></br></br>
        <label for='sex'>Sexe:</label>
        <select class='sex' name='sexe' id='sex'>
            <option value="Féminin" {{ old('sexe', $utilisateur->sexe) == 'Féminin' ? 'selected' : '' }}>Féminin</option>
            <option value="Masculin" {{ old('sexe', $utilisateur->sexe) == 'Masculin' ? 'selected' : '' }}>Masculin</option>
        </select></br></br>
        <label for='dtn'>Date de naissance:</label>
        <input class='dtn' type='date' name='date_de_naiss' id='dtn' value="{{old('date_de_naiss', $utilisateur->date_de_naissance)}}"/></br></br>
        <label for='tpm'>Type de membre:</label>
        <select class='tpm'  name='type_membre' id='tpm'>
            <option value="Eleve" {{ old('type_membre', $utilisateur->type_membre) == 'Eleve' ? 'selected' : '' }}>Eleve</option>
            <option value="Professeur" {{ old('type_membre', $utilisateur->type_membre) == 'Professeur' ? 'selected' : '' }}>Professeur</option>
            <option value="Administrateur" {{ old('type_membre', $utilisateur->type_membre) == 'Administrateur' ? 'selected' : '' }}>Administrateur</option>
        </select></br></br>
        <button class="btn btn-primary btnmod" name='action' value='action2' type='submit' name='modifier'>Modifier</button>
    </form>
    </div>
<script>
    function previewImage(event) {
        const previewContainer = document.getElementById('photo-preview-container');
        const previewImage = document.getElementById('photo-preview');

        // Afficher l'aperçu de l'image
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                previewImage.src = e.target.result;
                previewContainer.style.display = 'block';  
            };

            reader.readAsDataURL(file);
        } else {
            previewContainer.style.display = 'none';  
        }
    }
    </script>
@endsection