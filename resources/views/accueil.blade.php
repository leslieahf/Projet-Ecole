<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lycée - Accueil</title>
    <link rel="stylesheet" href="{{ asset('css/accueil.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="menu-dropdown">
                <button class="menu-btn"><i class="fas fa-bars"></i></button>
                <div class="dropdown-content">
                    <a href="#">Accueil</a>
                    <a href="#">Présentation</a>
                    <a href="#">Formations</a>
                    <a href="#">Vie scolaire</a>
                    <a href="#">Contact</a>
                </div>
            </div>
            
            <div class="logo">
                <img src="logo.png" alt="Logo du lycée">
            </div>
            
            <div class="login-btn">
                <button>Se connecter</button>
            </div>
        </nav>
    </header>

    <main>
        <h1>Bienvenue sur le site du Lycée</h1>
        <p>Découvrez notre établissement et nos formations</p>
    </main>
</body>
</html>