@extends('layout')
<<<<<<< HEAD

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Utilisateur - Lycée Connecté</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="{{ asset('css/ajoututilisateurs.css') }}" rel="stylesheet">
@endsection

@section('contenu')
    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
            window.location.href = "/ajoututilisateurs"; 
        </script>
    @endif

    <!-- Header -->
    <header>
        <!-- Menu Hamburger à gauche -->
=======
<link rel="stylesheet" href="{{ asset('css/ajoututil.css') }}">
@if (session('success'))
   <script>
       alert("{{ session('success') }}");
       window.location.href = "/ajoututilisateurs"; 
   </script>
@endif

@section('contenu')

    <!-- Header -->
    <header>
        Lycée Connecté
        <!-- Menu Deroulant (Hamburger) -->
>>>>>>> 67a1e1a (Modofication CSS et modification de controlleurs d'objet, utilisateurs et outils)
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
<<<<<<< HEAD
        </div>

        <!-- Logo et Titre au centre -->
        <div class="logo-title-container">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Lycée Connecté" class="logo">
            <div class="title">IntelliSchool</div>
        </div>

        <!-- Logo Profil à droite -->
        <a href="/profil">
            <img src="{{ asset('images/logo_profil.png') }}" alt="Profil" class="profil-logo">
        </a>
    </header>

    <form action='/ajoututilisateurs' method='post'>
    @csrf
    @if ($errors->any())
        <div class="errors-container">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-row">
        <div class="form-group">
            <label for='pren'>Prénom:</label>
            <input type='text' name='prenom' id='pren' value="{{ old('prenom') }}" />
        </div>

        <div class="form-group">
            <label for='nom'>Nom:</label>
            <input type='text' name='nom' id='nom' value="{{ old('nom') }}" />
        </div>
    </div>

    <div class="form-group">
        <label for='mail'>Email:</label>
        <input type='email' name='email' id='mail' value="{{ old('email') }}" />
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for='age'>Age:</label>
            <input type='text' name='age' id='age' value="{{ old('age') }}" />
        </div>

        <div class="form-group">
            <label for='sex'>Sexe:</label>
            <select name='sexe' id='sex'>
                <option value="Féminin" {{ old('sexe') == 'Féminin' ? 'selected' : '' }}>Féminin</option>
                <option value="Masculin" {{ old('sexe') == 'Masculin' ? 'selected' : '' }}>Masculin</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for='dtn'>Date de naissance:</label>
        <input type='date' name='date_de_naiss' id='dtn' value="{{ old('date_de_naiss') }}" />
    </div>

    <div class="form-group">
        <label for='tpm'>Type de membre:</label>
        <select name='type_membre' id='tpm'>
            <option value="Eleve" {{ old('type_membre') == 'Eleve' ? 'selected' : '' }}>Élève</option>
            <option value="Professeur" {{ old('type_membre') == 'Professeur' ? 'selected' : '' }}>Professeur</option>
            <option value="Administrateur" {{ old('type_membre') == 'Administrateur' ? 'selected' : '' }}>Administrateur</option>
        </select>
    </div>

    <button type='submit' name='ajouter'>Ajouter</button>
</form>
@endsection

<!-- JavaScript pour le menu -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdown = document.querySelector('.dropdown');
        dropdown.addEventListener('click', function(e) {
            e.stopPropagation();
            this.classList.toggle('open');
        });

        // Fermer le menu quand on clique ailleurs
        document.addEventListener('click', function() {
            dropdown.classList.remove('open');
        });
    });
</script>
=======
        </div>
    </header>

    <div class="container">
        
        <h2>Ajouter un Utilisateur</h2>
        <!-- Formulaire d'ajout d'utilisateur avec le titre inclus -->
        <form action='/ajoututilisateurs' method='post'>
            
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
                <label for='pren'>Prénom:</label>
                <input type='text' name='prenom' id='pren' value="{{ old('prenom') }}"/>
            </div>

            <div class="form-group">
                <label for='nom'>Nom:</label>
                <input type='text' name='nom' id='nom' value="{{ old('nom') }}"/>
            </div>

            <div class="form-group">
                <label for='mail'>Email:</label>
                <input type='text' name='email' id='mail' value="{{ old('email') }}"/>
            </div>

            <div class="form-group">
                <label for='age'>Âge:</label>
                <input type='text' name='age' id='age' value="{{ old('age') }}"/>
            </div>

            <div class="form-group">
                <label for='sex'>Sexe:</label>
                <select name='sexe' id='sex'>
                    <option value="Féminin" {{ old('sexe') == 'Féminin' ? 'selected' : '' }}>Féminin</option>
                    <option value="Masculin" {{ old('sexe') == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                </select>
            </div>

            <div class="form-group">
                <label for='dtn'>Date de naissance:</label>
                <input type='date' name='date_de_naiss' id='dtn' value="{{ old('date_de_naiss') }}"/>
            </div>

            <div class="form-group">
                <label for='tpm'>Type de membre:</label>
                <select name='type_membre' id='tpm'>
                    <option value="Eleve" {{ old('type_membre') == 'Eleve' ? 'selected' : '' }}>Élève</option>
                    <option value="Professeur" {{ old('type_membre') == 'Professeur' ? 'selected' : '' }}>Professeur</option>
                    <option value="Administrateur" {{ old('type_membre') == 'Administrateur' ? 'selected' : '' }}>Administrateur</option>
                </select>
            </div>

            <button type='submit' name='ajouter' class="btn-add">Ajouter</button>
        </form>
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
>>>>>>> 67a1e1a (Modofication CSS et modification de controlleurs d'objet, utilisateurs et outils)
