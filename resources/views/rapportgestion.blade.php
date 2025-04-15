<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rapport Objets</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #003366;
            text-align: center;
            margin-bottom: 30px;
        }
        h2 {
            color: #003366;
            margin-top: 30px;
            margin-bottom: 15px;
        }
        table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #003366;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .date {
            text-align: right;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="date">Date: {{ date('d/m/Y') }}</div>
    <h1>Rapport d'utilisation objets</h1>

    <h2>Objets</h2>
    <h3>Objets avec la consommation la plus élevée</h3>
{{-- <ul>
    <li>Imprimante : {{ $max_conso_imprimante->id }} - {{ $max_conso_imprimante->conso_Wh }} Wh</li>
    <li>Projecteur : {{ $max_conso_projecteur->id }} - {{ $max_conso_projecteur->conso_Wh }} Wh</li>
    <li>Poubelle : {{ $max_conso_poubelle->id }} - {{ $max_conso_poubelle->conso_Wh }} Wh</li>
    <li>Serrure : {{ $max_conso_serrure->id }} - {{ $max_conso_serrure->conso_Wh }} Wh</li>
    <li>Radiateur : {{ $max_conso_radiateur->id }} - {{ $max_conso_radiateur->conso_Wh }} Wh</li>
</ul> --}}

<table>
    <thead>
        <tr>
            <th>Type</th>
            <th>ID</th>
            <th>Consommation (en Wh)</th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td>{{ $max_conso_imprimante->type }}</td>
                <td>{{ $max_conso_imprimante->id }}</td>
                <td>{{ $max_conso_imprimante->conso_Wh }}</td>
            </tr>
            <tr>
                <td>{{ $max_conso_projecteur->type }}</td>
                <td>{{ $max_conso_projecteur->id }}</td>
                <td>{{ $max_conso_projecteur->conso_Wh }}</td>
            </tr>
            <tr>
                <td>{{ $max_conso_poubelle->type }}</td>
                <td>{{ $max_conso_poubelle->id }}</td>
                <td>{{ $max_conso_poubelle->conso_Wh }}</td>
            </tr>
            <tr>
                <td>{{ $max_conso_serrure->type }}</td>
                <td>{{ $max_conso_serrure->id }}</td>
                <td>{{ $max_conso_serrure->conso_Wh }}</td>
            </tr>
            <tr>
                <td>{{ $max_conso_radiateur->type }}</td>
                <td>{{ $max_conso_radiateur->id }}</td>
                <td>{{ $max_conso_radiateur->conso_Wh }}</td>
            </tr>
    </tbody>
</table>



<h3>Objets les plus utilisés</h3>
{{-- <ul>
    <li>Imprimante : {{ $max_utilisations_imprimante->id }} - {{ $max_utilisations_imprimante->nbre_utilisations }} </li>
    <li>Projecteur : {{ $max_utilisations_projecteur->id }} - {{ $max_utilisations_projecteur->nbre_utilisations }} </li>
    <li>Poubelle :   {{ $max_utilisations_poubelle->id }} - {{ $max_utilisations_poubelle->nbre_utilisations }} </li>
    <li>Serrure :    {{ $max_utilisations_serrure->id }} - {{ $max_utilisations_serrure->nbre_utilisations }} </li>
    <li>Radiateur :  {{ $max_utilisations_radiateur->id }} - {{ $max_utilisations_radiateur->nbre_utilisations }} </li>
</ul> --}}

<table>
    <thead>
        <tr>
            <th>Type</th>
            <th>ID</th>
            <th>Nombre d'utilisations</th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td>{{ $max_utilisations_imprimante->type }}</td>
                <td>{{ $max_utilisations_imprimante->id }}</td>
                <td>{{ $max_utilisations_imprimante->nbre_utilisations }}</td>
            </tr>
            <tr>
                <td>{{ $max_utilisations_projecteur->type }}</td>
                <td>{{ $max_utilisations_projecteur->id }}</td>
                <td>{{ $max_utilisations_projecteur->nbre_utilisations }}</td>
            </tr>
            <tr>
                <td>{{ $max_utilisations_poubelle->type }}</td>
                <td>{{ $max_utilisations_poubelle->id }}</td>
                <td>{{ $max_utilisations_poubelle->nbre_utilisations }}</td>
            </tr>
            <tr>
                <td>{{ $max_utilisations_serrure->type }}</td>
                <td>{{ $max_utilisations_serrure->id }}</td>
                <td>{{ $max_utilisations_serrure->nbre_utilisations }}</td>
            </tr>
            <tr>
                <td>{{ $max_utilisations_radiateur->type }}</td>
                <td>{{ $max_utilisations_radiateur  ->id }}</td>
                <td>{{ $max_utilisations_radiateur->nbre_utilisations }}</td>
            </tr>
    </tbody>
</table>

<h3>Informations générales</h3>

<div>
Consommation énergétique totale : {{ $total_conso }} Wh <br>
Nombre total d'objets : {{ $total_objets }} <br>
Nombre d'imprimantes  : {{ $total_imprimantes }} <br>
Nombre de radiateurs : {{ $total_radiateurs }} <br>
Nombre de poubelles : {{ $total_poubelles }} <br>
Nombre de radiateurs : {{ $total_radiateurs }} <br>
Nombre de projecteurs : {{ $total_projecteurs }} <br>

</div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Consommation (Wh)</th>
                <th>Nombre d'utilisations</th>
            </tr>
        </thead>
        <tbody>
            @foreach($objets as $objet)
                <tr>
                    <td>{{ $objet->id }}</td>
                    <td>{{ $objet->conso_wh }}</td>
                    <td>{{ $objet->nbre_utilisations }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html> 