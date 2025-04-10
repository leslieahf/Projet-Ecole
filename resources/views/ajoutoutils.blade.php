@extends('layout')
<link rel="stylesheet" href="{{ asset('css/ajoutoutils.css') }}">
@if (session('success'))
   <script>
       alert("{{ session('success') }}");
       window.location.href = "/ajoutoutils"; 
   </script>
@endif

@section('contenu')

    <div class="content">
        <div class="container">
            <h2>Ajouter un outil</h2>

            <!-- Formulaire d'ajout d'objet -->
            <form action='/ajoutoutils' method='post'>
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
                    <label for='nom'>Nom:</label>
                    <input type='text' name='nom' id='nom' value="{{old('nom')}}"/><br><br>
                </div>

                <div class="form-group">
                    <label for='con'>Description:</label><br><br>
                    <textarea name='description' rows='5' cols='30' placeholder='Description du service ...' value="{{old('description')}}"></textarea><br><br>
                </div>

                <button type='submit' name='ajouter'>Ajouter</button>
            </form>
        </div>
    </div>


@endsection
