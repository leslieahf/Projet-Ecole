@extends('layout')
<link rel="stylesheet" href="{{ asset('css/ajoutobjet.css') }}">
@if (session('success'))
   <script>
       alert("{{ session('success') }}");
       window.location.href = "/administration"; 
   </script>
@endif

@section('contenu')


    <div class="container">
        <!-- Titre centré à l'intérieur du formulaire -->
        <h2 style="text-align: center; margin-bottom: 20px;">Ajouter un objet</h2>

        <!-- Formulaire d'ajout d'objet -->
        <form action='/ajoutobjets' method='post'>
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
                <label for='id'>ID unique:</label>
                <input type='text' name='id' id='id' value="{{ old('id') }}"/>
            </div>

            <div class="form-group">
                <label for='nom'>Nom:</label>
                <input type='text' name='nom' id='nom' value="{{ old('nom') }}"/>
            </div>

            <div class="form-group">
                <label for='con'>Connectivité:</label>
                <select name='connectivite' id='con'>
                    <option value="Wifi" {{ old('connectivite') == 'Wifi' ? 'selected' : '' }}>Wifi</option>
                    <option value="Bluetooth" {{ old('connectivite') == 'Bluetooth' ? 'selected' : '' }}>Bluetooth</option>
                    <option value="HDMI" {{ old('connectivite') == 'HDMI' ? 'selected' : '' }}>HDMI</option>
                    <option value="Ethernet" {{ old('connectivite') == 'Ethernet' ? 'selected' : '' }}>Ethernet</option>
                </select>
            </div>

            <div class="form-group">
                <label for='stat'>Statut:</label>
                <select name='statut' id='stat'>
                    <option value="Plein" {{ old('statut') == 'Plein' ? 'selected' : '' }}>Plein</option>
                    <option value="Vide" {{ old('statut') == 'Vide' ? 'selected' : '' }}>Vide</option>
                    <option value="En ligne" {{ old('statut') == 'En ligne' ? 'selected' : '' }}>En ligne</option>
                    <option value="Hors ligne" {{ old('statut') == 'Hors ligne' ? 'selected' : '' }}>Hors ligne</option>
                    <option value="Verrouillé" {{ old('statut') == 'Verrouillé' ? 'selected' : '' }}>Verrouillé</option>
                    <option value="Déverrouillé" {{ old('statut') == 'Déverrouillé' ? 'selected' : '' }}>Déverrouillé</option>
                    <option value="En marche" {{ old('statut') == 'En marche' ? 'selected' : '' }}>En marche</option>
                    <option value="Eteint" {{ old('statut') == 'Eteint' ? 'selected' : '' }}>Eteint</option>
                    <option value="Actif" {{ old('statut') == 'Actif' ? 'selected' : '' }}>Actif</option>
                    <option value="Inactif" {{ old('statut') == 'Inactif' ? 'selected' : '' }}>Inactif</option>
                </select>
            </div>

            <div class="form-group">
                <label for='mode'>Mode:</label>
                <select name='mode' id='mode'>
                    <option value="Automatique" {{ old('mode') == 'Automatique' ? 'selected' : '' }}>Automatique</option>
                    <option value="Standard" {{ old('mode') == 'Standard' ? 'selected' : '' }}>Standard</option>
                </select>
            </div>

            <div class="form-group">
                <label for='etat_bat'>Etat de la batterie:</label>
                <input type='text' name='etat_batterie' id='etat_bat' value="{{ old('etat_batterie') }}"/>
            </div>

            <div class="form-group">
                <label for='temp'>Température:</label>
                <input type='text' name='temperature' id='temp' value="{{ old('temperature') }}"/>
            </div>

            <div class="form-group">
                <label for='niv_encr'>Niveau d'encre:</label>
                <input type='text' name='niveau_encre' id='niv_encr' value="{{ old('niveau_encre') }}"/>
            </div>

            <div class="form-group">
                <label for='niv_remp'>Niveau de remplissage:</label>
                <input type='text' name='niveau_remplissage' id='niv_remp' value="{{ old('niveau_remplissage') }}"/>
            </div>

            <button type='submit' name='ajouter' class="btn-add">Ajouter</button>
        </form>
    </div>


    <!-- JavaScript pour toggle menu -->
    <script>
        const menu = document.querySelector('.dropdown');
        menu.addEventListener('click', function() {
            menu.classList.toggle('open');
        });
    </script>

@endsection
