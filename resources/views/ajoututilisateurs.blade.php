@extends('layout')
@if (session('success'))
   <script>
       alert("{{ session('success') }}");
        window.location.href = "/ajoututilisateurs"; 
   </script>
@endif
@section('contenu')
<form action='/ajoututilisateurs' method='post'>
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
    <label for='pren'>Prenom:</label>
    <input type='text' name='prenom' id='pren' value="{{old('prenom')}}"/></br></br>
    <label for='nom'>Nom:</label>
    <input type='text' name='nom' id='nom' value="{{old('nom')}}"/></br></br>
    <label for='mail'>Email:</label>
    <input type='text' name='email' id='mail' value="{{old('email')}}"/></br></br>
    <label for='age'>Age:</label>
    <input type='text' name='age' id='age' value="{{old('age')}}"/></br></br>
    <label for='sex'>Sexe:</label>
    <select name='sexe' id='sex'>
        <option>Feminin</option>
        <option>Masculin</option>
    </select></br></br>
    <label for='dtn'>Date de naissance:</label>
    <input type='date' name='date_de_naiss' id='dtn' value="{{old('date_de_naiss')}}"/></br></br>
    <label for='tpm'>Type de membre:</label>
    <select name='type_membre' id='tpm'>
        <option>Eleve</option>
        <option>Professeur</option>
        <option>Administrateur</option>
    </select></br></br>
    <button type='submit' name='ajouter'>Ajouter</button>
</form>
@endsection