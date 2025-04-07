@extends('layout')

@if (session('message'))
   <script>
       alert("{{ session('message') }}");
       window.location.href = "/connexion"; 
   </script>
@endif

@section('contenu')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Lycée Connecté</title>

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

        /* Formulaire de connexion */
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
        input[type="password"] {
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            background-color: #f9fafb;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #1d4ed8;
            box-shadow: 0 0 5px rgba(29, 78, 216, 0.3);
        }

        /* Bouton de connexion */
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

        /* Lien d'inscription */
        .mt-4 {
            text-align: center;
        }

        .mt-4 a {
            color: #2563eb;
            text-decoration: none;
        }

        .mt-4 a:hover {
            text-decoration: underline;
        }

        /* Footer */
        footer {
            background-color: #e5e7eb; /* Gris clair */
            color: #333;
            text-align: center;
            padding: 20px 0;
            font-size: 14px;
            position: absolute;
            width: 100%;
            bottom: 0;
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
        <h2>Connexion à votre compte</h2>
        <div class="form-container">
            <form action="/connexion" method="POST">
                @csrf
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <label for="login">Login:</label>
                <input type="text" name="login" id="login" value="{{ old('login') }}"/>

                <label for="mot_de_passe">Mot de passe:</label>
                <input type="password" name="mot_de_passe" id="mot_de_passe"/>

                <button type="submit">Se connecter</button>
            </form>

            <div class="mt-4">
                <p>Pas encore inscrit ? <a href="/inscription">Créez un compte ici</a></p>
            </div>
        </div>
    </section>

    <footer>
        &copy; 2025 Lycée Connecté. Tous droits réservés.
    </footer>
</body>
</html>
@endsection
