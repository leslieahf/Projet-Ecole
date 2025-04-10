@extends('layout')
<link rel="stylesheet" href="{{ asset('css/ajoututil.css') }}">
@if (session('success'))
   <script>
       alert("{{ session('success') }}");
       window.location.href = "/ajoututilisateurs"; 
   </script>
@endif

@section('contenu')

    <div class="container">
    
        <!-- Formulaire d'ajout d'utilisateur avec le titre inclus -->
        <form action='/ajoututilisateurs' method='post'>
            <h2>Ajouter un utilisateur</h2>
            @csrf
            @if ($errors->any())
                <div class="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for='pren'>Prénom:</label>
                <input type='text' name='prenom' id='pren' value="{{ old('prenom') }}"/>
            </div>

            <div class="form-group">
                <label for='nom'>Nom:</label>
                <input type='text' name='nom' id='nom' value="{{ old('nom') }}"/>
            </div>

            <div class="form-group">
                <label for='mail'>Email:</label>
                <input type='text' name='email' id='mail' value="{{ old('email') }}"/>
            </div>

            <div class="form-group">
                <label for='age'>Âge:</label>
                <input type='text' name='age' id='age' value="{{ old('age') }}"/>
            </div>

            <div class="form-group">
                <label for='sex'>Sexe:</label>
                <select name='sexe' id='sex'>
                    <option value="Féminin" {{ old('sexe') == 'Féminin' ? 'selected' : '' }}>Féminin</option>
                    <option value="Masculin" {{ old('sexe') == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                </select>
            </div>

            <div class="form-group">
                <label for='dtn'>Date de naissance:</label>
                <input type='date' name='date_de_naiss' id='dtn' value="{{ old('date_de_naiss') }}"/>
            </div>

            <div class="form-group">
                <label for='tpm'>Type de membre:</label>
                <select name='type_membre' id='tpm'>
                    <option value="Eleve" {{ old('type_membre') == 'Eleve' ? 'selected' : '' }}>Élève</option>
                    <option value="Professeur" {{ old('type_membre') == 'Professeur' ? 'selected' : '' }}>Professeur</option>
                    <option value="Administrateur" {{ old('type_membre') == 'Administrateur' ? 'selected' : '' }}>Administrateur</option>
                </select>
            </div>

            <button type='submit' name='ajouter' class="btn-add">Ajouter</button>
        </form>
    </div>

@endsection
