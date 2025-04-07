<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bienvenue sur le site du Lycée Connecté. Découvrez nos formations, événements et bien plus encore.">
    <title>Accueil - Lycée Connecté</title>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f7fafc;
        }

        a {
            text-decoration: none;
        }

        /* Hero Section */
        .hero {
            background-image: url('https://www.cap-emploi.net/wp-content/uploads/2025/03/Lycee_Connecte__une_methode_efficace_pour_booster_lengagement_des_eleves.webp');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.5); /* Légère transparence pour améliorer la visibilité du texte */
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
        }

        .hero-content {
            text-align: center;
            color: white; /* Texte blanc pour un meilleur contraste */
            padding: 20px;
            z-index: 2; /* S'assurer que le texte est au-dessus de l'image */
        }

        .hero-content h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .hero-content p {
            font-size: 1.25rem;
            margin-top: 10px;
            color: white; /* Changement de la couleur du texte en blanc */
        }

        .btn-primary {
            background-color: #38a169;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2f855a;
        }

        /* Présentation Section */
        .presentation {
            padding: 50px 20px;
            background-color: white;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        h2 {
            font-size: 2.5rem;
            color: #1a365d;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.125rem;
            color: #4a5568;
            margin-bottom: 30px;
        }

        .cards {
            display: flex;
            justify-content: space-around;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            flex: 1 1 280px;
            max-width: 320px;
            text-align: center;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card h3 {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .card p {
            font-size: 1rem;
        }

        /* Events Section */
        .events {
            padding: 50px 20px;
            background-color: #f7fafc;
        }

        .event-cards {
            display: flex;
            justify-content: space-around;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .event-card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            flex: 1 1 280px;
            max-width: 320px;
            text-align: center;
        }

        .event-card:hover {
            transform: scale(1.05);
        }

        .event-card h3 {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .date {
            font-size: 0.875rem;
            color: #718096;
            margin-top: 10px;
        }

        /* Connexion Section */
        .connexion {
            padding: 50px 20px;
            background-color: #1D4ED8;
            color: white;
            text-align: center;
            border-radius: 10px;
        }

        .connexion h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #ffffff;
        }

        .connexion p {
            font-size: 1.25rem;
            margin-bottom: 30px;
            color: #ffffff;
        }

        .btn-primary {
            background-color: #2563EB;
            color: white;
            padding: 12px 25px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
            font-size: 1.1rem;
        }

        .btn-primary:hover {
            background-color: #1D4ED8;
        }

        /* Footer */
        footer {
            background-color: #e5e7eb; /* Fond gris clair */
            color: #333;
            text-align: center;
            padding: 20px;
            font-size: 0.875rem;
            color: #4a5568;
            position: relative;
        }

    </style>
</head>
<body>

    <!-- Hero Section -->
    <section class="hero">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>Bienvenue sur le site du Lycée Connecté</h1>
            <p>Explorez nos formations, événements et bien plus encore</p>
            <a href="#connexion" class="btn-primary">Rejoindre la plateforme</a>
        </div>
    </section>

    <!-- Présentation de l'école -->
    <section class="presentation">
        <div class="container">
            <h2>Découvrez notre établissement</h2>
            <p>Le Lycée Connecté est un établissement innovant, dédié à l'excellence académique et à l'éducation moderne. Nos formations couvrent un large éventail de domaines, de la science aux arts, en passant par la technologie.</p>
            <div class="cards">
                <div class="card">
                    <h3>📚 Formations</h3>
                    <p>Explorez nos programmes dans les sciences, les lettres, la technologie, et plus encore.</p>
                </div>
                <div class="card">
                    <h3>🎉 Événements</h3>
                    <p>Suivez les événements à venir comme les journées portes ouvertes, les concours, et plus.</p>
                </div>
                <div class="card">
                    <h3>🚌 Transports</h3>
                    <p>Accédez aux informations de transport scolaire pour faciliter vos trajets.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section des événements -->
    <section class="events">
        <div class="container">
            <h2>Événements à venir</h2>
            <div class="event-cards">
                <div class="event-card">
                    <h3>Journée Portes Ouvertes</h3>
                    <p>Venez découvrir notre établissement le 15 septembre !</p>
                    <p class="date">Date: 15 Septembre 2025</p>
                </div>
                <div class="event-card">
                    <h3>Concours d'Informatique</h3>
                    <p>Inscrivez-vous pour participer à notre concours de codage annuel !</p>
                    <p class="date">Date: 20 Octobre 2025</p>
                </div>
                <div class="event-card">
                    <h3>Festival des Arts</h3>
                    <p>Venez admirer les créations artistiques de nos élèves !</p>
                    <p class="date">Date: 5 Décembre 2025</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Connexion -->
    <section id="connexion" class="connexion">
        <div class="container">
            <h2>Rejoindre la plateforme</h2>
            <p>Connectez-vous dès maintenant pour accéder à tous les services et ressources de notre lycée.</p>
            <a href="/connexion" class="btn-primary">Se connecter maintenant</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        &copy; 2025 Lycée Connecté. Tous droits réservés.
    </footer>

</body>
</html>
