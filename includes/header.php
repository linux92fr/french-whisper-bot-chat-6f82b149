
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
                    <a href="https://webmail.focom-iliad.fr" target="_blank" class="nav-link">📧 Webmail</a>
                </nav>

                <!-- User menu and CTA -->
                <div class="header-actions">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <?php
                        // Récupérer les infos utilisateur si connecté
                        if (!isset($user)) {
                            $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = ?");
                            $stmt->execute([$_SESSION['user_id']]);
                            $user = $stmt->fetch();
                        }
                        ?>
                        <div class="dropdown">
                            <button class="dropdown-trigger">
                                👤 <?= htmlspecialchars($user['prenom']) ?>
                            </button>
                            <div class="dropdown-menu">
                                <a href="mon-compte.php">👤 Mon compte</a>
                                <?php if ($user['role'] === 'admin'): ?>
                                <a href="admin.php">⚙️ Administration</a>
                                <?php endif; ?>
                                <a href="logout.php">🚪 Déconnexion</a>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="dropdown">
                            <button class="dropdown-trigger">
                                👤 Mon compte
                            </button>
                            <div class="dropdown-menu">
                                <a href="login.php">🔑 Connexion</a>
                                <a href="login.php">📝 Inscription</a>
                            </div>
                        </div>
                    <?php endif; ?>
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
                <a href="https://webmail.focom-iliad.fr" target="_blank">📧 Webmail</a>
                <div class="mobile-actions">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="mon-compte.php">Mon compte</a>
                        <?php if ($user['role'] === 'admin'): ?>
                        <a href="admin.php">Administration</a>
                        <?php endif; ?>
                        <a href="logout.php">Déconnexion</a>
                    <?php else: ?>
                        <a href="login.php">Connexion</a>
                    <?php endif; ?>
                    <a href="adhesion.php" class="btn btn-cta">Adhérer</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Bouton retour en haut -->
    <button class="back-to-top" id="backToTop" onclick="scrollToTop()">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('active');
        }

        // Gestion du bouton retour en haut
        window.addEventListener('scroll', function() {
            const backToTop = document.getElementById('backToTop');
            if (window.pageYOffset > 300) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });

        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>
