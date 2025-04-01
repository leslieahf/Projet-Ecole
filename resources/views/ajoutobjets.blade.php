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
        <option>Wifi</option>
        <option>Bluetooth</option>
        <option>HDMI</option>
        <option>Ethernet</option>
    </select></br></br>
    <label for='stat'>Statut:</label>
    <select name='statut' id='stat'>
        <option>Plein</option>
        <option>Vide</option>
        <option>En ligne</option>
        <option>Hors ligne</option>
        <option>Verrouillé</option>
        <option>Déverrouillé</option>
        <option>En marche</option>
        <option>Eteint</option>
        <option>Actif</option>
        <option>Inactif</option>
    </select></br></br>
    <label for='mode'>Mode:</label>
    <select name='mode' id='mode'>
        <option>Automatique</option>
        <option>Standard</option>
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