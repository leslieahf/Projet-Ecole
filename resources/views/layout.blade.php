<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'IntelliSchool')</title>

    <!-- Lien vers le fichier CSS -->
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    
    @yield('head') <!-- Section pour le head spécifique de chaque page -->
</head>
<body>

    <!-- Header -->
    <header class="header-content">
    <div class="menu">
        <div class="dropdown">
            <div class="menu-bar"></div>
            <div class="menu-bar"></div>
            <div class="menu-bar"></div>
            <div class="dropdown-content">
                <a href="/">Accueil</a>
                <a href="/visualisation">Visualisation</a>
                <a href="/administration">Administration</a>
            </div>
        </div>
    </div>

    <div class="logo-title">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
        <span class="title">IntelliSchool</span>
    </div>

    <!-- Logo Profil à droite -->
    <a href="/profil" class="profil-link">
        <img src="{{ asset('images/logo_profil.png') }}" alt="Profil" class="profil-logo">
    </a>
</header>


    <!-- Contenu Principal -->
    <div class="main-content">
        @include('flash::message')
        @yield('contenu')
    </div>


    <!-- Footer -->
    <footer>
        &copy; 2025 Lycée Connecté. Tous droits réservés.
    </footer>


    
        <!-- Script JS pour le menu déroulant -->
        <script>
            // Sélectionne l'élément du menu déroulant
            const dropdown = document.querySelector('.dropdown');
            const dropdownContent = document.querySelector('.dropdown-content');

            // Ouvrir ou fermer le menu lorsque l'utilisateur clique sur l'icône hamburger
            dropdown.addEventListener('click', function(event) {
                event.stopPropagation(); // Empêche le clic de se propager au document
                dropdown.classList.toggle('open');
            });

            // Fermer le menu lorsque l'utilisateur clique ailleurs sur la page
            document.addEventListener('click', function(event) {
                if (!dropdown.contains(event.target)) {
                    dropdown.classList.remove('open');
                }
            });
        </script>

</body>
</html>