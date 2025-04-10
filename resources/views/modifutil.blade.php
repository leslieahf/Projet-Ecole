@extends('layout')
<link rel="stylesheet" href="{{ asset('css/modifutil.css') }}">
@section('contenu')
    <div class="content">
        <div class="container">
            <!-- Titre centré et bleu -->
            <h2>Modifier un utilisateur</h2>

            <!-- Formulaire de modification d'utilisateur -->
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

                <!-- Prénom -->
                <div class="form-group">
                    <label for='pren'>Prénom:</label>
                    <input type='text' name='prenom' id='pren' value="{{old('prenom', $utilisateur->prenom)}}"/>
                </div>

                <!-- Nom -->
                <div class="form-group">
                    <label for='nom'>Nom:</label>
                    <input type='text' name='nom' id='nom' value="{{old('nom', $utilisateur->nom)}}"/>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for='mail'>Email:</label>
                    <input type='text' name='email' id='mail' value="{{old('email', $utilisateur->email)}}"/>
                </div>

                <!-- Age -->
                <div class="form-group">
                    <label for='age'>Age:</label>
                    <input type='text' name='age' id='age' value="{{old('age', $utilisateur->age)}}"/>
                </div>

                <!-- Sexe -->
                <div class="form-group">
                    <label for='sex'>Sexe:</label>
                    <select name='sexe' id='sex'>
                        <option value="Féminin" {{ old('sexe', $utilisateur->sexe) == 'Féminin' ? 'selected' : '' }}>Féminin</option>
                        <option value="Masculin" {{ old('sexe', $utilisateur->sexe) == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                    </select>
                </div>

                <!-- Date de naissance -->
                <div class="form-group">
                    <label for='dtn'>Date de naissance:</label>
                    <input type='date' name='date_de_naiss' id='dtn' value="{{old('date_de_naiss', $utilisateur->date_de_naissance)}}"/>
                </div>

                <!-- Type de membre -->
                <div class="form-group">
                    <label for='tpm'>Type de membre:</label>
                    <select name='type_membre' id='tpm'>
                        <option value="Eleve" {{ old('type_membre', $utilisateur->type_membre) == 'Eleve' ? 'selected' : '' }}>Eleve</option>
                        <option value="Professeur" {{ old('type_membre', $utilisateur->type_membre) == 'Professeur' ? 'selected' : '' }}>Professeur</option>
                        <option value="Administrateur" {{ old('type_membre', $utilisateur->type_membre) == 'Administrateur' ? 'selected' : '' }}>Administrateur</option>
                    </select>
                </div>

                <!-- Nombre de connexions -->
                <div class="form-group">
                    <label for='connex'>Nombre de connexions:</label>
                    <input type='text' name='nbre_connexions' id='connex' value="{{old('nbre_connexions', $utilisateur->nbre_connexions)}}"/>
                </div>

                <!-- Nombre de consultations -->
                <div class="form-group">
                    <label for='consul'>Nombre de consultations:</label>
                    <input type='text' name='nbre_consultations' id='consul' value="{{old('nbre_consultations', $utilisateur->nbre_consultations)}}"/>
                </div>

                <!-- Points d'expérience -->
                <div class="form-group">
                    <label for='pts'>Points d'expérience:</label>
                    <input type='text' name='points_exp' id='pts' value="{{old('points_exp', $utilisateur->points_exp)}}"/>
                </div>

                <!-- Niveau -->
                <div class="form-group">
                    <label for='niv'>Niveau:</label>
                    <select name='niveau' id='niv'>
                        <option value="Débutant" {{ old('niveau', $utilisateur->niveau) == 'Débutant' ? 'selected' : '' }}>Débutant</option>
                        <option value="Intermédiaire" {{ old('niveau', $utilisateur->niveau) == 'Intermédiaire' ? 'selected' : '' }}>Intermédiaire</option>
                        <option value="Avancé" {{ old('niveau', $utilisateur->niveau) == 'Avancé' ? 'selected' : '' }}>Avancé</option>
                        <option value="Expert" {{ old('niveau', $utilisateur->niveau) == 'Expert' ? 'selected' : '' }}>Expert</option>
                    </select>
                </div>

                <button type='submit' name='modifier'>Modifier</button>
            </form>
        </div>
    </div>

@endsection


