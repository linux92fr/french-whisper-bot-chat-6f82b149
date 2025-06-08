
<?php
session_start();
include_once 'config/database.php';
include_once 'includes/header.php';
?>

<main>
    <section class="hero-section" style="padding: 3rem 0;">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">RGPD</h1>
                <p class="hero-description">Règlement Général sur la Protection des Données</p>
            </div>
        </div>
    </section>

    <section style="padding: 3rem 0; background: var(--white);">
        <div class="container">
            <div style="max-width: 800px; margin: 0 auto;">
                <h2>Responsable du traitement</h2>
                <p style="margin-bottom: 2rem;">
                    FOCOM UES ILIAD<br>
                    Syndicat Force Ouvrière<br>
                    Email : contact@focom-iliad.fr
                </p>

                <h2>Finalités du traitement</h2>
                <ul style="margin-bottom: 2rem;">
                    <li>Gestion des adhésions</li>
                    <li>Communication syndicale</li>
                    <li>Défense des droits des salariés</li>
                    <li>Gestion des demandes de contact</li>
                </ul>

                <h2>Base légale</h2>
                <p style="margin-bottom: 2rem;">Le traitement est fondé sur l'intérêt légitime du syndicat et le consentement des personnes concernées.</p>

                <h2>Durée de conservation</h2>
                <ul style="margin-bottom: 2rem;">
                    <li>Données d'adhésion : pendant la durée d'adhésion + 3 ans</li>
                    <li>Données de contact : 3 ans après le dernier contact</li>
                    <li>Newsletter : jusqu'au désabonnement</li>
                </ul>

                <h2>Droits des personnes</h2>
                <p style="margin-bottom: 1rem;">Vous pouvez exercer vos droits en nous contactant :</p>
                <ul style="margin-bottom: 2rem;">
                    <li>Par email : contact@focom-iliad.fr</li>
                    <li>Par courrier avec justificatif d'identité</li>
                </ul>

                <h2>Délégué à la Protection des Données</h2>
                <p>Contact DPO : dpo@focom-iliad.fr</p>
            </div>
        </div>
    </section>
</main>

<?php include_once 'includes/footer.php'; ?>
