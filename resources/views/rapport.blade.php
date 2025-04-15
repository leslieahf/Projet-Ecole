<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rapport</title>
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
    <h1>Rapport d'utilisation</h1>

    <h2>Utilisateurs</h2>
<div>
Nombre total d'utilisateurs : {{ $total_utilisateurs }} <br>
Nombre total de connexions : {{ $total_connexions }} <br>
Nombre moyen de connexions : {{ $moy_connexions }} <br>

</div>
    <table>
        <thead>
            <tr>
                <th>Login</th>
                <th>Nombre de connexions</th>
                <th>Nombre de consultations</th>
                <th>Taux de connexions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($utilisateurs as $utilisateur)
                <tr>
                    <td>{{ $utilisateur->login }}</td>
                    <td style="text-align: center;">{{ $utilisateur->nbre_connexions }}</td>
                    <td style="text-align: center;">{{ $utilisateur->nbre_consultations }}</td>
                    <td style="text-align: center;">{{ round((($utilisateur->nbre_connexions)/$total_connexions)*100,2) }}%</td>
                </tr>
            @endforeach
        </tbody>
    </table>

{{-- 
    <h2 class="table-caption">{{ $chart1->options['chart_title'] }}</h2>
    {!! $chart1->renderHtml() !!}

    {!! $chart1->renderChartJsLibrary() !!}

    {!! $chart1->renderJs() !!}
 --}}



    <h2>Objets</h2>
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
                <th style="text-align: center;">Consommation (Wh)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($objets as $objet)
                <tr>
                    <td>{{ $objet->id }}</td>
                    <td style="text-align: center;">{{ $objet->conso_wh }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> 