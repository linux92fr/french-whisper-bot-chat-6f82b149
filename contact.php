
<?php
session_start();
include_once 'config/database.php';

// Traitement du formulaire
include_once 'includes/contact-handler.php';

include_once 'includes/header.php';
?>

<div class="container" style="padding: 2rem 0;">
    <div class="section-header">
        <h1>Contactez-nous</h1>
        <p>Une question, une demande d'information ou besoin d'aide ? N'hésitez pas à nous contacter.</p>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; margin-bottom: 3rem;">
        <!-- Informations de contact -->
        <?php include_once 'includes/contact-info.php'; ?>

        <!-- Formulaire de contact -->
        <?php include_once 'includes/contact-form.php'; ?>
    </div>

    <!-- Section FAQ rapide -->
    <?php include_once 'includes/contact-faq.php'; ?>
</div>

<style>
@media (max-width: 768px) {
    div[style*="grid-template-columns: 1fr 1fr"] {
        display: block !important;
    }
    
    div[style*="grid-template-columns: 1fr 1fr"] > div:first-child {
        margin-bottom: 2rem;
    }
}
</style>

<?php include_once 'includes/footer.php'; ?>
