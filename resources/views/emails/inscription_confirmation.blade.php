<!DOCTYPE html>
<html>
<head>
    <title>Confirmation d'inscription</title>
</head>
<body>
    <h1>Bonjour {{ $name }}</h1>
    <p>Votre inscription a été validée avec succès. Veuillez cliquer sur le lien suivant pour confirmer votre inscription.</p>
    <a href="{{ url('/confirm/' . $eleve->id) }}">Confirmer l'inscription</a>
</body>
</html>
