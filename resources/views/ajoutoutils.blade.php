@extends('layout')
@if (session('success'))
   <script>
       alert("{{ session('success') }}");
        window.location.href = "/ajoutoutils"; 
   </script>
@endif
@section('contenu')
<form action='/ajoutoutils' method='post'>
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
    <label for='nom'>Nom:</label>
    <input type='text' name='nom' id='nom' value="{{old('nom')}}"/></br></br>
    <label for='con'>Description:</label></br></br>
    <textarea name='description' rows='5' cols='30' placeholder='Description du service ...'></textarea></br></br>
    <button type='submit' name='ajouter'>Ajouter</button>
</form>
@endsection