@extends('layout')
@if (session('success'))
   <script>
       alert("{{ session('success') }}");
        window.location.href = "/profil"; 
   </script>
@endif
@section('contenu')
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
        <option>Feminin</option>
        <option>Masculin</option>
    </select></br></br>
    <label for='dtn'>Date de naissance:</label>
    <input type='date' name='date_de_naiss' id='dtn' value="{{old('date_de_naiss', $utilisateur->date_de_naissance)}}"/></br></br>
    <label for='tpm'>Type de membre:</label>
    <select name='type_membre' id='tpm'>
        <option>Eleve</option>
        <option>Professeur</option>
        <option>Administrateur</option>
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