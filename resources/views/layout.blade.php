<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Ici, tu ajoutes la section 'head' -->
        @yield('head') <!-- Cette ligne permet d'inclure les balises dans 'head' de tes autres pages -->
    </head>

    <body>
        @yield('contenu') <!-- Cette ligne permet d'inclure le contenu principal de chaque page -->
    </body>
</html>
