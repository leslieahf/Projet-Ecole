@extends('layout')

@if (session('success'))
   <script>
       alert("{{ session('success') }}");
       window.location.href = "/ajoutoutils"; 
   </script>
@endif

@section('contenu')

<link rel="stylesheet" href="{{ asset('css/ajoutoutils.css') }}">

    <!-- Header -->
    <header>
        Lycée Connecté
        <!-- Menu Deroulant (Hamburger) -->
        <div class="menu">
            <div class="dropdown">
                <div class="menu-bar"></div>
                <div class="menu-bar"></div>
                <div class="menu-bar"></div>
                <div class="dropdown-content">
                    <a href="/">Accueil</a>
                    <a href="/gestion">Gestion</a>
                    <a href="/administration">Administration</a>
                </div>
            </div>
        </div>
    </header>

    <div class="content">
        <div class="container">
            <h2>Ajouter un outil</h2>

            <!-- Formulaire d'ajout d'objet -->
            <form action='/ajoutoutils' method='post'>
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
                    <label for='nom'>Nom:</label>
                    <input type='text' name='nom' id='nom' value="{{old('nom')}}"/><br><br>
                </div>

                <div class="form-group">
                    <label for='con'>Description:</label><br><br>
                    <textarea name='description' rows='5' cols='30' placeholder='Description du service ...' value="{{old('description')}}"></textarea><br><br>
                </div>

                <button type='submit' name='ajouter'>Ajouter</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        &copy; 2025 Lycée Connecté. Tous droits réservés.
    </footer>

    <!-- JavaScript pour toggle menu -->
    <script>
        const menu = document.querySelector('.dropdown');
        menu.addEventListener('click', function() {
            menu.classList.toggle('open');
        });
    </script>

@endsection
