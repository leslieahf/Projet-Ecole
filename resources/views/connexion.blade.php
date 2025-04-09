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
    <link rel="stylesheet" href="{{ asset('css/connexion.css') }}">
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

                <div class="form-group">
                    <label for="login">Login:</label>
                    <input type="text" name="login" id="login" value="{{ old('login') }}"/>
                </div>

                <div class="form-group">
                    <label for="mot_de_passe">Mot de passe:</label>
                    <input type="password" name="mot_de_passe" id="mot_de_passe"/>
                </div>

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
