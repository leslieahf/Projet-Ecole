@extends('layout')

@section('head') <!-- Section pour remplir le head du layout -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - IntelliSchool</title>
    <link href="{{ asset('css/profil.css') }}" rel="stylesheet"> <!-- Lien vers le fichier CSS spécifique -->
@endsection

@section('contenu')
<div class="main-content">
    <nav>
        <a class='accueil' href='/visualisation' >Accueil</a>
        <a href='/profil' id='current'>Mon profil</a>
        <a href='/profilautres'>Profil des autres membres</a>
    </nav>
</div>

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
                <div class="container">
                    <form class="user-info" action='' method='post' enctype="multipart/form-data">
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

                        <!-- Photo -->
                        <label class='photo' for='photo'>Photo:</label>
                        <div id="photo-preview-container">
                            @if ($utilisateur->photo)
                                <img id="photo-preview" src="{{ Storage::url($utilisateur->photo) }}" width="100" alt="Photo actuelle"/>
                            @endif
                        </div>
                        <input type='file' name='photo' id='photo' onchange="previewImage(event)"/>

                        <div class='points'>
                            <div>
                                <p class='pfont1'>Nombre de connexions : {{ auth()->user()->nbre_connexions }}</p>
                                <p class='pfont1'>Nombre de consultations : {{ auth()->user()->nbre_consultations }}</p>
                                <p class='pfont1'>Points d'expérience : {{ auth()->user()->points_exp }}</p>
                                <p class='pfont2'>Niveau actuel : {{ auth()->user()->niveau }}</p>
                            </div>
                            <div>
                                <button class="btn btn-primary" name='action' value='action1' type="submit">Mettre à jour mon niveau</button>
                            </div>
                        </div>

                        <!-- Formulaire -->
                        <label for='pren'>Prénom:</label>
                        <input class='pren' type='text' name='prenom' id='pren' value="{{ old('prenom', $utilisateur->prenom) }}"/>

                        <label for='nom'>Nom:</label>
                        <input class='nom' type='text' name='nom' id='nom' value="{{ old('nom', $utilisateur->nom) }}"/>

                        <label for='mail'>Email:</label>
                        <input class='mail' type='text' name='email' id='mail' value="{{ old('email', $utilisateur->email) }}"/>

                        <label for='log'>Login:</label>
                        <input class='log' type='text' name='login' id='log' value="{{ old('login', $utilisateur->login) }}"/>

                        <label for='mdp'>Mot de passe:</label>
                        <input class='mdp' type='password' name='mot_de_passe' id='mdp'/>

                        <label for='age'>Age:</label>
                        <input class='age' type='text' name='age' id='age' value="{{ old('age', $utilisateur->age) }}"/>

                        <label for='sex'>Sexe:</label>
                        <select class='sex' name='sexe' id='sex'>
                            <option value="Féminin" {{ old('sexe', $utilisateur->sexe) == 'Féminin' ? 'selected' : '' }}>Féminin</option>
                            <option value="Masculin" {{ old('sexe', $utilisateur->sexe) == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                        </select>

                        <label for='dtn'>Date de naissance:</label>
                        <input class='dtn' type='date' name='date_de_naiss' id='dtn' value="{{ old('date_de_naiss', $utilisateur->date_de_naissance) }}"/>

                        <label for='tpm'>Type de membre:</label>
                        <select class='tpm' name='type_membre' id='tpm'>
                            <option value="Eleve" {{ old('type_membre', $utilisateur->type_membre) == 'Eleve' ? 'selected' : '' }}>Eleve</option>
                            <option value="Professeur" {{ old('type_membre', $utilisateur->type_membre) == 'Professeur' ? 'selected' : '' }}>Professeur</option>
                            <option value="Administrateur" {{ old('type_membre', $utilisateur->type_membre) == 'Administrateur' ? 'selected' : '' }}>Administrateur</option>
                        </select>

                        <button class="btn btn-primary btnmod" name='action' value='action2' type='submit' name='modifier'>Modifier</button>
                    </form>
                </div>
            </div>
    </section>

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
