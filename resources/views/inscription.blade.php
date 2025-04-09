@extends('layout')

@section('contenu')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Lycée Connecté</title>
    <link rel="stylesheet" href="{{ asset('css/inscription.css') }}">
<<<<<<< HEAD
=======

>>>>>>> 67a1e1a (Modofication CSS et modification de controlleurs d'objet, utilisateurs et outils)
</head>
<body>
    
    <header>
        <div>
            <a href="{{ url('/') }}">IntelliSchool</a> <!-- Lien vers l'accueil -->
        </div>
    </header>

    <section class="container">
        <h2>Inscription</h2>
        <form action='/inscription' method='post' enctype="multipart/form-data">
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

            <div class="form-group">
                <label for='photo'>Photo:</label>
                <input type='file' name='photo' id='photo' onchange="previewImage(event)"/><br><br>
                <div id="photo-preview-container" style="margin-left: 10px;">
                    <img id="photo-preview" width="100">
                </div>
            </div>

            <div class="form-group">
                <label for='pren'>Prénom:</label>
                <input type='text' name='prenom' id='pren' value="{{old('prenom')}}"/><br><br>
            </div>

            <div class="form-group">
                <label for='nom'>Nom:</label>
                <input type='text' name='nom' id='nom' value="{{old('nom')}}"/><br><br>
            </div>

            <div class="form-group">
                <label for='mail'>Email:</label>
                <input type='text' name='email' id='mail' value="{{old('email')}}"/><br><br>
            </div>

            <div class="form-group">
                <label for='log'>Login:</label>
                <input type='text' name='login' id='log' value="{{old('login')}}"/><br><br>
            </div>

            <div class="form-group">
                <label for='mdp'>Mot de passe:</label>
                <input type='password' name='mot_de_passe' id='mdp'/><br><br>
            </div>

            <div class="form-group">
                <label for='age'>Age:</label>
                <input type='text' name='age' id='age' value="{{old('age')}}"/><br><br>
            </div>

            <div class="form-group">
                <label for='sex'>Sexe:</label>
                <select name='sexe' id='sex'>
                    <option value="Féminin" {{ old('sexe') == 'Féminin' ? 'selected' : '' }}>Féminin</option>
                    <option value="Masculin" {{ old('sexe') == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                </select><br><br>
            </div>

            <div class="form-group">
                <label for='dtn'>Date de naissance:</label>
                <input type='date' name='date_de_naiss' id='dtn' value="{{old('date_de_naiss')}}"/><br><br>
            </div>

            <div class="form-group">
                <label for='tpm'>Type de membre:</label>
                <select name='type_membre' id='tpm'>
                    <option value="Eleve" {{ old('type_membre') == 'Eleve' ? 'selected' : '' }}>Eleve</option>
                    <option value="Professeur" {{ old('type_membre') == 'Professeur' ? 'selected' : '' }}>Professeur</option>
                    <option value="Administrateur" {{ old('type_membre') == 'Administrateur' ? 'selected' : '' }}>Administrateur</option>
                </select><br><br>
            </div>

            <button type='submit' name='sinscrire'>S'inscrire</button>
        </form>

        <div class="connexion-link">
            <p>Vous avez déjà un compte ? <a href="/connexion">Connectez-vous ici</a></p>
        </div>
    </section>

    <footer>
        &copy; 2025 Lycée Connecté. Tous droits réservés.
    </footer>

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
                    previewContainer.style.display = 'inline-block';  
                };

                reader.readAsDataURL(file);
            } else {
                previewContainer.style.display = 'none';  
            }
        }
    </script>
</body>
</html>
@endsection
