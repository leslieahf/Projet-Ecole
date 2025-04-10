@extends('layout')

@section('head') <!-- Section pour remplir le head du layout -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription - IntelliSchool</title>
    <link href="{{ asset('css/inscription.css') }}" rel="stylesheet"> <!-- Lien vers le fichier CSS spécifique -->
@endsection



@section('contenu')
<body>

    <section class="container">
        <h2>Inscription</h2>
        <form action='/inscription' method='post' enctype="multipart/form-data">
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

            <div class="form-group">
                <label for='photo'>Photo:</label>
                <input type='file' name='photo' id='photo' onchange="previewImage(event)"/>
                <div id="photo-preview-container" style="margin-left: 10px;">
                    <img id="photo-preview" width="100">
                </div>
            </div>

            <div class="form-group">
                <label for='pren'>Prénom:</label>
                <input type='text' name='prenom' id='pren' value="{{old('prenom')}}"/>
            </div>

            <div class="form-group">
                <label for='nom'>Nom:</label>
                <input type='text' name='nom' id='nom' value="{{old('nom')}}"/>
            </div>

            <div class="form-group">
                <label for='mail'>Email:</label>
                <input type='text' name='email' id='mail' value="{{old('email')}}"/>
            </div>

            <div class="form-group">
                <label for='log'>Login:</label>
                <input type='text' name='login' id='log' value="{{old('login')}}"/>
            </div>

            <div class="form-group">
                <label for='mdp'>Mot de passe:</label>
                <input type='password' name='mot_de_passe' id='mdp'/>
            </div>

            <div class="form-group">
                <label for='age'>Age:</label>
                <input type='text' name='age' id='age' value="{{old('age')}}"/>
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
                <input type='date' name='date_de_naiss' id='dtn' value="{{old('date_de_naiss')}}"/>
            </div>

            <div class="form-group">
                <label for='tpm'>Type de membre:</label>
                <select name='type_membre' id='tpm'>
                    <option value="Eleve" {{ old('type_membre') == 'Eleve' ? 'selected' : '' }}>Eleve</option>
                    <option value="Professeur" {{ old('type_membre') == 'Professeur' ? 'selected' : '' }}>Professeur</option>
                    <option value="Administrateur" {{ old('type_membre') == 'Administrateur' ? 'selected' : '' }}>Administrateur</option>
                </select>
            </div>

            <button type='submit' name='sinscrire'>S'inscrire</button>
        </form>

        <div class="connexion-link">
            <p>Vous avez déjà un compte ? <a href="/connexion">Connectez-vous ici</a></p>
        </div>
    </section>


    <script>
        function previewImage(event) {
            const previewContainer = document.getElementById('photo-preview-container');
            const previewImage = document.getElementById('photo-preview');

            // Afficher l'aperçu de l'image
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewContainer.style.display = 'inline-block';  
                };

                reader.readAsDataURL(file);
            } else {
                previewContainer.style.display = 'none';  
            }
        }
    </script>
</body>
@endsection
