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
    <h1>Rapport d'Utilisation</h1>

    <h2>Utilisateurs</h2>
    <table>
        <thead>
            <tr>
                <th>Login</th>
                <th>Nombre de Connexions</th>
                <th>Nombre de Consultations</th>
            </tr>
        </thead>
        <tbody>
            @foreach($utilisateurs as $utilisateur)
                <tr>
                    <td>{{ $utilisateur->login }}</td>
                    <td>{{ $utilisateur->nbre_connexions }}</td>
                    <td>{{ $utilisateur->nbre_consultations }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Objets</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Consommation (Wh)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($objets as $objet)
                <tr>
                    <td>{{ $objet->id }}</td>
                    <td>{{ $objet->conso_wh }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> 