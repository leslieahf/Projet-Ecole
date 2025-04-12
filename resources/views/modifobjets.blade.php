@extends('layout')
<link rel="stylesheet" href="{{ asset('css/modifobjets.css') }}">
@section('contenu')
    <div class="content">
        <div class="container">
            <!-- Titre centré et bleu -->
            <h2>Modifier un objet</h2>

            <!-- Formulaire de modification d'objets -->
            <form action='/gestion/{{ $objet->id }}' method='post'>
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

                <!-- ID -->
                <div class="form-group">
                    <label for='id'>ID unique:</label>
                    <input type='text' name='id' id='id' value="{{ old('id', $objet->id) }}"/>
                </div>

                <!-- Nom -->
                <div class="form-group">
                    <label for='nom'>Nom:</label>
                    <input type='text' name='nom' id='nom' value="{{ old('nom', $objet->nom) }}"/>
                </div>

                <!-- Connectivité -->
                <div class="form-group">
                    <label for='con'>Connectivité:</label>
                    <select name='connectivite' id='con'>
                        <option value="Wifi" {{ old('connectivite', $objet->connectivite) == 'Wifi' ? 'selected' : '' }}>Wifi</option>
                        <option value="Bluetooth" {{ old('connectivite', $objet->connectivite) == 'Bluetooth' ? 'selected' : '' }}>Bluetooth</option>
                        <option value="HDMI" {{ old('connectivite', $objet->connectivite) == 'HDMI' ? 'selected' : '' }}>HDMI</option>
                        <option value="Ethernet" {{ old('connectivite', $objet->connectivite) == 'Ethernet' ? 'selected' : '' }}>Ethernet</option>
                    </select>
                </div>

                <!-- Statut -->
                <div class="form-group">
                    <label for='stat'>Statut:</label>
                    <select name='statut' id='stat'>
                        <option value="Plein" {{ old('statut', $objet->statut) == 'Plein' ? 'selected' : '' }}>Plein</option>
                        <option value="Vide" {{ old('statut', $objet->statut) == 'Vide' ? 'selected' : '' }}>Vide</option>
                        <option value="En ligne" {{ old('statut', $objet->statut) == 'En ligne' ? 'selected' : '' }}>En ligne</option>
                        <option value="Hors ligne" {{ old('statut', $objet->statut) == 'Hors ligne' ? 'selected' : '' }}>Hors ligne</option>
                        <option value="Verrouillé" {{ old('statut', $objet->statut) == 'Verrouillé' ? 'selected' : '' }}>Verrouillé</option>
                        <option value="Déverrouillé" {{ old('statut', $objet->statut) == 'Déverrouillé' ? 'selected' : '' }}>Déverrouillé</option>
                        <option value="En marche" {{ old('statut', $objet->statut) == 'En marche' ? 'selected' : '' }}>En marche</option>
                        <option value="Eteint" {{ old('statut', $objet->statut) == 'Eteint' ? 'selected' : '' }}>Eteint</option>
                        <option value="Actif" {{ old('statut', $objet->statut) == 'Actif' ? 'selected' : '' }}>Actif</option>
                        <option value="Inactif" {{ old('statut', $objet->statut) == 'Inactif' ? 'selected' : '' }}>Inactif</option>
                    </select>
                </div>

                <!-- Mode -->
                <div class="form-group">
                    <label for='mode'>Mode:</label>
                    <select name='mode' id='mode'>
                        <option value="Automatique" {{ old('mode', $objet->mode) == 'Automatique' ? 'selected' : '' }}>Automatique</option>
                        <option value="Standard" {{ old('mode', $objet->mode) == 'Standard' ? 'selected' : '' }}>Standard</option>
                    </select>
                </div>

                <!-- Etat de la batterie -->
                <div class="form-group">
                    <label for='etat_bat'>Etat de la batterie:</label>
                    <input type='text' name='etat_batterie' id='etat_bat' value="{{ old('etat_batterie', $objet->etat_batterie) }}"/>
                </div>

                <!-- Température -->
                <div class="form-group">
                    <label for='temp'>Température:</label>
                    <input type='text' name='temperature' id='temp' value="{{ old('temperature', $objet->temperature) }}"/>
                </div>

                <!-- Niveau d'encre -->
                <div class="form-group">
                    <label for='niv_encr'>Niveau d'encre:</label>
                    <input type='text' name='niveau_encre' id='niv_encr' value="{{ old('niveau_encre', $objet->niveau_encre) }}"/>
                </div>

                <!-- Niveau de remplissage -->
                <div class="form-group">
                    <label for='niv_remp'>Niveau de remplissage:</label>
                    <input type='text' name='niveau_remplissage' id='niv_remp' value="{{ old('niveau_remplissage', $objet->niveau_remplissage) }}"/>
                </div>

                <!-- Consommation(Wh) -->
                <div class="form-group">
                    <label for='conso_wh'>Consommation(Wh):</label>
                    <input type='text' name='conso_wh' id='conso_wh' value="{{ old('conso_wh', $objet->conso_Wh) }}"/>
                </div>

                <button type='submit' name='modifier'>Modifier</button>
            </form>
        </div>
    </div>

@endsection


