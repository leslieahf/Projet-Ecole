@extends('layout')

@section('head') <!-- Section pour remplir le head du layout -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Utilisateur - IntelliSchool</title>
    <link href="{{ asset('css/ajoututil.css') }}" rel="stylesheet"> <!-- Lien vers le fichier CSS spécifique -->
@endsection

@section('contenu')
    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
            window.location.href = "/ajoututilisateurs"; 
        </script>
    @endif

    <!-- Formulaire d'ajout d'utilisateur -->
    <form action='/ajoututilisateurs' method='post'>
        @csrf
        @if ($errors->any())
            <div class="error-messages" style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li> <!-- Affichage des erreurs -->
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Champs du formulaire -->
        <label for='pren'>Prénom:</label>
        <input type='text' name='prenom' id='pren' value="{{ old('prenom') }}" /><br><br>

        <label for='nom'>Nom:</label>
        <input type='text' name='nom' id='nom' value="{{ old('nom') }}" /><br><br>

        <label for='mail'>Email:</label>
        <input type='email' name='email' id='mail' value="{{ old('email') }}" /><br><br>

        <label for='age'>Âge:</label>
        <input type='text' name='age' id='age' value="{{ old('age') }}" /><br><br>

        <label for='sex'>Sexe:</label>
        <select name='sexe' id='sex'>
            <option value="Féminin" {{ old('sexe') == 'Féminin' ? 'selected' : '' }}>Féminin</option>
            <option value="Masculin" {{ old('sexe') == 'Masculin' ? 'selected' : '' }}>Masculin</option>
        </select><br><br>

        <label for='dtn'>Date de naissance:</label>
        <input type='date' name='date_de_naiss' id='dtn' value="{{ old('date_de_naiss') }}" /><br><br>

        <label for='tpm'>Type de membre:</label>
        <select name='type_membre' id='tpm'>
            <option value="Eleve" {{ old('type_membre') == 'Eleve' ? 'selected' : '' }}>Élève</option>
            <option value="Professeur" {{ old('type_membre') == 'Professeur' ? 'selected' : '' }}>Professeur</option>
            <option value="Administrateur" {{ old('type_membre') == 'Administrateur' ? 'selected' : '' }}>Administrateur</option>
        </select><br><br>

        <button type='submit' name='ajouter'>Ajouter</button>
    </form>



@endsection
