<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lycée Connecté</title>

        <!-- Liens CSS communs -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- Le fichier CSS principal -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- Pour les icônes -->

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Ici, tu ajoutes la section 'head' pour inclure les éléments spécifiques -->
        @yield('head') <!-- Cette ligne permet d'ajouter les balises dans 'head' pour chaque page -->
    </head>

    <body>
        <!-- Ici, tu inclues le contenu spécifique à chaque page -->
        @yield('contenu') <!-- Cette ligne permet d'inclure le contenu principal de chaque page -->
    </body>
</html>
