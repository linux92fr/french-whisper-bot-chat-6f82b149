
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

    <!-- Bannière cookies -->
    <div class="cookie-banner" id="cookieBanner">
        <div class="cookie-banner-content">
            <p>🍪 Nous utilisons des cookies pour améliorer votre expérience. En continuant, vous acceptez notre <a href="confidentialite.php" style="color: var(--yellow);">politique de confidentialité</a>.</p>
            <div class="cookie-banner-buttons">
                <button onclick="acceptCookies()" class="btn btn-cta" style="padding: 0.5rem 1rem;">Accepter</button>
                <a href="rgpd.php" style="color: var(--gray-300); margin-left: 1rem;">En savoir plus</a>
            </div>
        </div>
    </div>

    <!-- Popup Newsletter -->
    <div class="newsletter-popup" id="newsletterPopup">
        <div class="newsletter-popup-content">
            <button class="newsletter-close" onclick="hideNewsletterPopup()">&times;</button>
            <h3 style="color: var(--primary-blue); margin-bottom: 1rem;">📧 Restez informé !</h3>
            <p style="margin-bottom: 1rem;">Inscrivez-vous à notre newsletter pour recevoir nos actualités syndicales et défendre vos droits.</p>
            <form class="newsletter-form" onsubmit="submitNewsletter(event)">
                <input type="email" id="newsletterEmail" placeholder="Votre adresse email" required>
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </form>
        </div>
    </div>

    <script src="assets/js/site.js"></script>
    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('active');
        }
    </script>
