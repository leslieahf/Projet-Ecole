@extends('layout')
@if (session('success'))
   <script>
       alert("{{ session('success') }}");
        window.location.href = "/profil"; 
   </script>
@endif
@section('contenu')
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
<form action='' method='post'>
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
    <label for='pren'>Prenom:</label>
    <input type='text' name='prenom' id='pren' value="{{old('prenom', $utilisateur->prenom)}}"/></br></br>
    <label for='nom'>Nom:</label>
    <input type='text' name='nom' id='nom' value="{{old('nom', $utilisateur->nom)}}"/></br></br>
    <label for='mail'>Email:</label>
    <input type='text' name='email' id='mail' value="{{old('email', $utilisateur->email)}}"/></br></br>
    <label for='log'>Login:</label>
    <input type='text' name='login' id='log' value="{{old('login', $utilisateur->login)}}"/></br></br>
    <label for='mdp'>Mot de passe:</label>
    <input type='password' name='mot_de_passe' id='mdp'/></br></br>
    <label for='age'>Age:</label>
    <input type='text' name='age' id='age' value="{{old('age', $utilisateur->age)}}"/></br></br>
    <label for='sex'>Sexe:</label>
    <select name='sexe' id='sex'>
        <option value="Féminin" {{ old('sexe', $utilisateur->sexe) == 'Féminin' ? 'selected' : '' }}>Féminin</option>
        <option value="Masculin" {{ old('sexe', $utilisateur->sexe) == 'Masculin' ? 'selected' : '' }}>Masculin</option>
    </select></br></br>
    <label for='dtn'>Date de naissance:</label>
    <input type='date' name='date_de_naiss' id='dtn' value="{{old('date_de_naiss', $utilisateur->date_de_naissance)}}"/></br></br>
    <label for='tpm'>Type de membre:</label>
    <select name='type_membre' id='tpm'>
        <option value="Eleve" {{ old('type_membre', $utilisateur->type_membre) == 'Eleve' ? 'selected' : '' }}>Eleve</option>
        <option value="Professeur" {{ old('type_membre', $utilisateur->type_membre) == 'Professeur' ? 'selected' : '' }}>Professeur</option>
        <option value="Administrateur" {{ old('type_membre', $utilisateur->type_membre) == 'Administrateur' ? 'selected' : '' }}>Administrateur</option>
    </select></br></br>
    <button type='submit' name='modifier'>Modifier</button>
</form>
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