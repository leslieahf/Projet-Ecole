@extends('layout')
@section('contenu')
<p>Voici le profil des autres membres</p>
<table>
    <tr>
        <th>Photo</th>
        <th>Login</th>
        <th>Age</th>
        <th>Sexe</th>
        <th>Date de naissance</th>
        <th>Type de membre</th>
    </tr>
@foreach($utilisateurs as $utilisateur)
    @if ($utilisateur->login)
        <tr>
            <td>
            @if($utilisateur->photo)
                <img src="{{ Storage::url($utilisateur->photo) }}" width="100" alt="Photo de profil">
            @endif
            </td>
            <td>{{ $utilisateur->login }}</td>
            <td>{{ $utilisateur->age }}</td>
            <td>{{ $utilisateur->sexe }}</td>
            <td>{{ $utilisateur->date_de_naissance }}</td>
            <td>{{ $utilisateur->type_membre }}</td>
        </tr>
    @endif
@endforeach
</table>
@endsection