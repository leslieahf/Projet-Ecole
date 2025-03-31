@extends('layout')
@if (session('message'))
   <script>
       alert("{{ session('message') }}");
        window.location.href = "/connexion"; 
   </script>
@endif
@section('contenu')
<form action='/connexion' method='post'>
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
<label for='log'>Login:</label>
<input type='text' name='login' id='log' value="{{old('login')}}"/></br></br>
<label for='mdp'>Mot de passe:</label>
<input type='password' name='mot_de_passe' id='mdp'/></br></br>
<button type='submit' name='connecter'>Se connecter</button>
</form>
@endsection