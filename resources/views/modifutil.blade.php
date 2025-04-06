@extends('layout')
@section('contenu')
<form action='/administration/{{ $utilisateur->id }}' method='post'>
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
    <label for='pren'>Prénom:</label>
    <input type='text' name='prenom' id='pren' value="{{old('prenom', $utilisateur->prenom)}}"/></br></br>
    <label for='nom'>Nom:</label>
    <input type='text' name='nom' id='nom' value="{{old('nom', $utilisateur->nom)}}"/></br></br>
    <label for='mail'>Email:</label>
    <input type='text' name='email' id='mail' value="{{old('email', $utilisateur->email)}}"/></br></br>
    <label for='age'>Age:</label>
    <input type='text' name='age' id='age' value="{{old('age', $utilisateur->age)}}"/></br></br>
    <label for='sex'>Sexe:</label>
    <select name='sexe' id='sex'>
        <option value="Féminin" {{ old('sexe', $utilisateur->sexe) == 'Féminin' ? 'selected' : '' }}>Féminin</option>
        <option value="Masculin" {{ old('sexe', $utilisateur->sexe) == 'Masculin' ? 'selected' : '' }}>Masculin</option>
    </select></br></br>
    <label for='dtn'>Date de naissance:</label>
    <input type='date' name='date_de_naiss' id='dtn' value="{{old('date_de_naiss', $utilisateur->date_de_naissance)}}"/></br></br>
    <label for='tpm'>Type de membre:</label>
    <select name='type_membre' id='tpm'>
        <option value="Eleve" {{ old('type_membre', $utilisateur->type_membre) == 'Eleve' ? 'selected' : '' }}>Eleve</option>
        <option value="Professeur" {{ old('type_membre', $utilisateur->type_membre) == 'Professeur' ? 'selected' : '' }}>Professeur</option>
        <option value="Administrateur" {{ old('type_membre', $utilisateur->type_membre) == 'Administrateur' ? 'selected' : '' }}>Administrateur</option>
    </select></br></br>
    <label for='connex'>Nombre de connexions:</label>
    <input type='text' name='nbre_connexions' id='connex' value="{{old('nbre_connexions', $utilisateur->nbre_connexions)}}"/></br></br>
    <label for='consul'>Nombre de consultations:</label>
    <input type='text' name='nbre_consultations' id='consul' value="{{old('nbre_consultations', $utilisateur->nbre_consultations)}}"/></br></br>
    <label for='pts'>Points d'expérience:</label>
    <input type='text' name='points_exp' id='pts' value="{{old('points_exp', $utilisateur->points_exp)}}"/></br></br>
    <label for='niv'>Niveau:</label>
    <select name='niveau' id='tpm'>
        <option value="Débutant" {{ old('niveau', $utilisateur->niveau) == 'Débutant' ? 'selected' : '' }}>Débutant</option>
        <option value="Intermédiaire" {{ old('niveau', $utilisateur->niveau) == 'Intermédiaire' ? 'selected' : '' }}>Intermédiaire</option>
        <option value="Avancé" {{ old('niveau', $utilisateur->niveau) == 'Avancé' ? 'selected' : '' }}>Avancé</option>
        <option value="Expert" {{ old('niveau', $utilisateur->niveau) == 'Expert' ? 'selected' : '' }}>Expert</option>
    </select></br></br>
    <button type='submit' name='modifier'>Modifier</button>
</form>
@endsection