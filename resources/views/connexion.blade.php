@extends('layout')

@section('head') <!-- Section pour remplir le head du layout -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - IntelliSchool</title>
    <link href="{{ asset('css/connexion.css') }}" rel="stylesheet"> <!-- Lien vers le fichier CSS spécifique -->
@endsection

@section('contenu')

@if (session('message'))
   <script>
       alert("{{ session('message') }}");
       window.location.href = "/connexion"; 
   </script>
@endif

<body>

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


</body>
@endsection
@if(session()->has('js_message'))
    <script>
        alert("{{ session('js_message') }}");
        {{ session()->forget('js_message') }}
    </script>
@endif
