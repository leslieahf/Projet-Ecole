@extends('layout')
@section('contenu')
<div>
    <button>
        <a href='/gestion'>Accueil</a>
    </button>
</div>
<div>
    <button>
        <a href='/profil'>Mon profil</a>
    </button>
</div>
<div>
    <button>
        <a href='/profilautres'>Profil des autres membres</a>
    </button>
</div>
<!--mettre ici quelques infos sur les objets venant de la base-->
@endsection
