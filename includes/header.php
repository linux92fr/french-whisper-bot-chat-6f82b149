
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOCOM UES ILIAD - Force Ouvrière</title>
    <meta name="description" content="Syndicat Force Ouvrière FOCOM UES ILIAD - Défense des droits des salariés">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-content">
                <!-- Logo -->
                <div class="logo">
                    <div class="logo-icon">FO</div>
                    <div class="logo-text">
                        <h1>FOCOM UES ILIAD</h1>
                        <p>Force Ouvrière</p>
                    </div>
                </div>

                <!-- Navigation desktop -->
                <nav class="nav-desktop">
                    <a href="index.php" class="nav-link">Accueil</a>
                    <a href="services.php" class="nav-link">Services</a>
                    <a href="actualites.php" class="nav-link">Actualités</a>
                    <a href="droit-travail.php" class="nav-link">Droit du travail</a>
                    <a href="elections.php" class="nav-link">Élections</a>
                    <a href="contact.php" class="nav-link">Contact</a>
                </nav>

                <!-- User menu and CTA -->
                <div class="header-actions">
                    <div class="dropdown">
                        <button class="dropdown-trigger">
                            👤 Mon compte
                        </button>
                        <div class="dropdown-menu">
                            <a href="dashboard.php">👤 Espace membre</a>
                            <a href="admin.php">⚙️ Administration</a>
                        </div>
                    </div>
                    <a href="adhesion.php" class="btn btn-cta">Adhérer</a>
                </div>

                <!-- Menu mobile toggle -->
                <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>

            <!-- Menu mobile -->
            <div class="nav-mobile" id="mobileMenu">
                <a href="index.php">Accueil</a>
                <a href="services.php">Services</a>
                <a href="actualites.php">Actualités</a>
                <a href="droit-travail.php">Droit du travail</a>
                <a href="elections.php">Élections</a>
                <a href="contact.php">Contact</a>
                <div class="mobile-actions">
                    <a href="dashboard.php">Espace membre</a>
                    <a href="admin.php">Administration</a>
                    <a href="adhesion.php" class="btn btn-cta">Adhérer</a>
                </div>
            </div>
        </div>
    </header>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('active');
        }
    </script>
