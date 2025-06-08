
<?php
session_start();
include_once 'config/database.php';
include_once 'includes/header.php';
?>

<main>
    <section class="hero-section" style="padding: 3rem 0;">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Politique de Confidentialité</h1>
                <p class="hero-description">Protection de vos données personnelles</p>
            </div>
        </div>
    </section>

    <section style="padding: 3rem 0; background: var(--white);">
        <div class="container">
            <div style="max-width: 800px; margin: 0 auto;">
                <h2>1. Collecte des données</h2>
                <p style="margin-bottom: 2rem;">Nous collectons les données personnelles que vous nous fournissez directement lors de votre inscription, contact ou adhésion.</p>

                <h2>2. Utilisation des données</h2>
                <p style="margin-bottom: 2rem;">Vos données sont utilisées pour :</p>
                <ul style="margin-bottom: 2rem;">
                    <li>Gérer votre adhésion au syndicat</li>
                    <li>Vous informer de nos actions et actualités</li>
                    <li>Répondre à vos demandes</li>
                    <li>Assurer la défense de vos droits</li>
                </ul>

                <h2>3. Partage des données</h2>
                <p style="margin-bottom: 2rem;">Nous ne vendons, n'échangeons ni ne louons vos données personnelles à des tiers sans votre consentement explicite.</p>

                <h2>4. Sécurité</h2>
                <p style="margin-bottom: 2rem;">Nous mettons en place des mesures techniques et organisationnelles appropriées pour protéger vos données.</p>

                <h2>5. Vos droits</h2>
                <p style="margin-bottom: 1rem;">Conformément au RGPD, vous disposez des droits suivants :</p>
                <ul style="margin-bottom: 2rem;">
                    <li>Droit d'accès à vos données</li>
                    <li>Droit de rectification</li>
                    <li>Droit à l'effacement</li>
                    <li>Droit à la portabilité</li>
                    <li>Droit d'opposition</li>
                </ul>

                <h2>6. Contact</h2>
                <p>Pour exercer vos droits, contactez-nous à : <a href="mailto:contact@focom-iliad.fr">contact@focom-iliad.fr</a></p>
            </div>
        </div>
    </section>
</main>

<?php include_once 'includes/footer.php'; ?>
