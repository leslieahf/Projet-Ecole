<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'IntelliSchool')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Lien vers le fichier CSS -->
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
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
                    @if(!auth()->guest())
                    <a href="/visualisation">Visualisation</a>
                    <a href="/gestion">Gestion</a>
                    <a href="/administration">Administration</a>
                    <a href="/deconnexion">Se déconnecter</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="logo-title">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
            <span class="title">IntelliSchool</span>
        </div>
        
        <div class="right-buttons">
            <button class="theme-toggle" onclick="toggleTheme()" title="Changer de thème">
                <i class="fas fa-moon"></i>
            </button>
            <a href="/profil" class="profil-link">
                <img src="{{ asset('images/logo_profil.png') }}" alt="Profil" class="profil-logo">
            </a>
        </div>
    </header>


    <!-- Contenu Principal -->
    <div class="main-content">
       
        @yield('contenu')
    </div>


    <!-- Footer -->
    <footer>
        &copy; 2025 Lycée Connecté IntelliSchool. Tous droits réservés.
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
        
    <!-- Script pour le changement de thème -->
    <script>
    // Vérifier si un thème est déjà sauvegardé, sinon utiliser le thème clair par défaut
    if (!localStorage.getItem('theme')) {
        localStorage.setItem('theme', 'light');
    }

    function toggleTheme() {
        const body = document.body;
        const icon = document.querySelector('.theme-toggle i');
        
        if (body.classList.contains('dark-theme')) {
            body.classList.remove('dark-theme');
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
            localStorage.setItem('theme', 'light');
        } else {
            body.classList.add('dark-theme');
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
            localStorage.setItem('theme', 'dark');
        }
    }

    // Appliquer le thème sauvegardé au chargement
    document.addEventListener('DOMContentLoaded', () => {
        const savedTheme = localStorage.getItem('theme') || 'light';
        const icon = document.querySelector('.theme-toggle i');
        
        if (savedTheme === 'dark') {
            document.body.classList.add('dark-theme');
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
        } else {
            document.body.classList.remove('dark-theme');
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
        }
    });
    </script>
</body>
@yield('scripts')
</html>