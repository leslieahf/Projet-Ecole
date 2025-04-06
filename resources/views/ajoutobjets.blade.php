@extends('layout')
@if (session('success'))
   <script>
       alert("{{ session('success') }}");
        window.location.href = "/ajoutobjets"; 
   </script>
@endif
@section('contenu')
<form action='/ajoutobjets' method='post'>
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
    <label for='id'>ID unique:</label>
    <input type='text' name='id' id='id' value="{{old('id')}}"/></br></br>
    <label for='nom'>Nom:</label>
    <input type='text' name='nom' id='nom' value="{{old('nom')}}"/></br></br>
    <label for='con'>Connectivité:</label>
    <select name='connectivite' id='con'>
        <option value="Wifi" {{ old('connectivite') == 'Wifi' ? 'selected' : '' }}>Wifi</option>
        <option value="Bluetooth" {{ old('connectivite') == 'Bluetooth' ? 'selected' : '' }}>Bluetooth</option>
        <option value="HDMI" {{ old('connectivite') == 'HDMI' ? 'selected' : '' }}>HDMI</option>
        <option value="Ethernet" {{ old('connectivite') == 'Ethernet' ? 'selected' : '' }}>Ethernet</option>
    </select></br></br>
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
    </select></br></br>
    <label for='mode'>Mode:</label>
    <select name='mode' id='mode'>
        <option value="Automatique" {{ old('mode') == 'Automatique' ? 'selected' : '' }}>Automatique</option>
        <option value="Standard" {{ old('mode') == 'Standard' ? 'selected' : '' }}>Standard</option>
    </select></br></br>
    <label for='etat_bat'>Etat de la batterie:</label>
    <input type='text' name='etat_batterie' id='etat_bat' value="{{old('etat_batterie')}}"></br></br>
    <label for='temp'>Température:</label>
    <input type='text' name='temperature' id='temp' value="{{old('temperature')}}"/></br></br>
    <label for='niv_encr'>Niveau d'encre:</label>
    <input type='text' name='niveau_encre' id='niv_encr' value="{{old('niveau_encre')}}"/></br></br>
    <label for='niv_remp'>Niveau de remplissage:</label>
    <input type='text' name='niveau_remplissage' id='niv_remp' value="{{old('niveau_remplissage')}}"/></br></br>
    <button type='submit' name='ajouter'>Ajouter</button>
</form>
@endsection