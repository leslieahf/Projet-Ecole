@extends('layout')

@section('contenu')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Lycée Connecté</title>

    <!-- Style personnalisé -->
    <style>
        /* Général */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7fafc; /* Gris clair */
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: flex-start; /* Le contenu est aligné en haut */
            align-items: center;
        }

        .container {
            max-width: 1200px;
            width: 100%;
            padding: 20px;
        }

        /* Header */
        header {
            background-color: #1d4ed8; /* Bleu primaire */
            color: white;
            padding: 30px 0; /* Hauteur du header plus grande */
            text-align: center;
            width: 100%;
            box-sizing: border-box;
            position: absolute;
            top: 0;
            left: 0;
        }

        header div {
            max-width: 1200px;
            margin: 0 auto;
        }

        header a {
            color: white;
            text-decoration: none;
            font-size: 30px; /* Agrandir la taille du texte */
            font-weight: bold;
        }

        header a:hover {
            text-decoration: underline;
        }

        /* Formulaire d'inscription */
        section {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            margin-top: 150px; /* Ajuster la marge du haut pour centrer la section */
        }

        h2 {
            font-size: 28px;
            color: #1d4ed8;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Style du formulaire */
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 16px;
            margin-bottom: 8px;
            color: #333;
        }

        input[type="text"],
        input[type="password"],
        input[type="file"],
        input[type="date"],
        select {
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            background-color: #f9fafb;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        select:focus {
            outline: none;
            border-color: #1d4ed8;
            box-shadow: 0 0 5px rgba(29, 78, 216, 0.3);
        }

        /* Bouton d'inscription */
        button {
            padding: 14px;
            background-color: #1d4ed8;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #2563eb;
        }

        /* Erreurs */
        ul {
            background-color: #fee2e2;
            color: #b91c1c;
            border-radius: 6px;
            padding: 10px;
            margin-bottom: 20px;
            list-style: none;
        }

        ul li {
            margin-bottom: 5px;
        }

        /* Footer */
        footer {
            background-color: #e5e7eb; /* Gris clair */
            color: #333;
            text-align: center;
            padding: 20px 0;
            font-size: 14px;
            width: 100%;
            position: relative;
            bottom: 0;
            margin-top: auto; /* Place le footer en bas */
        }

        /* Style du lien de connexion */
        .connexion-link {
            text-align: center;
            font-size: 14px;
            margin-top: 20px;
        }

        .connexion-link a {
            color: #2563eb;
            text-decoration: none;
        }

        .connexion-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <header>
        <div>
            <a href="{{ url('/') }}">Lycée Connecté</a> <!-- Lien vers l'accueil -->
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

            <label for='photo'>Photo:</label>
            <div id="photo-preview-container">
                <img id="photo-preview" width="100">
            </div>
            <input type='file' name='photo' id='photo' onchange="previewImage(event)"/><br><br>

            <label for='pren'>Prénom:</label>
            <input type='text' name='prenom' id='pren' value="{{old('prenom')}}"/><br><br>

            <label for='nom'>Nom:</label>
            <input type='text' name='nom' id='nom' value="{{old('nom')}}"/><br><br>

            <label for='mail'>Email:</label>
            <input type='text' name='email' id='mail' value="{{old('email')}}"/><br><br>

            <label for='log'>Login:</label>
            <input type='text' name='login' id='log' value="{{old('login')}}"/><br><br>

            <label for='mdp'>Mot de passe:</label>
            <input type='password' name='mot_de_passe' id='mdp'/><br><br>

            <label for='age'>Age:</label>
            <input type='text' name='age' id='age' value="{{old('age')}}"/><br><br>

            <label for='sex'>Sexe:</label>
            <select name='sexe' id='sex'>
                <option value="Féminin" {{ old('sexe') == 'Féminin' ? 'selected' : '' }}>Féminin</option>
                <option value="Masculin" {{ old('sexe') == 'Masculin' ? 'selected' : '' }}>Masculin</option>
            </select><br><br>

            <label for='dtn'>Date de naissance:</label>
            <input type='date' name='date_de_naiss' id='dtn' value="{{old('date_de_naiss')}}"/><br><br>

            <label for='tpm'>Type de membre:</label>
            <select name='type_membre' id='tpm'>
                <option value="Eleve" {{ old('type_membre') == 'Eleve' ? 'selected' : '' }}>Eleve</option>
                <option value="Professeur" {{ old('type_membre') == 'Professeur' ? 'selected' : '' }}>Professeur</option>
                <option value="Administrateur" {{ old('type_membre') == 'Administrateur' ? 'selected' : '' }}>Administrateur</option>
            </select><br><br>

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
                    previewContainer.style.display = 'block';  
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
