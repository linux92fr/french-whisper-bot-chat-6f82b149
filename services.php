
<?php
session_start();
include_once 'config/database.php';
include_once 'includes/header.php';
?>

<main>
    <!-- Hero Section Services -->
    <section class="hero-section" style="padding: 3rem 0;">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title" style="font-size: 2.5rem;">Nos Services</h1>
                <p class="hero-description">
                    Des services complets pour accompagner et protéger tous nos adhérents dans leur vie professionnelle.
                </p>
            </div>
        </div>
    </section>

    <!-- Services détaillés -->
    <section class="services-section">
        <div class="container">
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">🛡️</div>
                    <h3>Défense individuelle</h3>
                    <p>Accompagnement personnalisé pour la défense de vos droits : entretiens disciplinaires, litiges salariaux, harcèlement moral ou sexuel.</p>
                    <ul style="text-align: left; margin: 1rem 0;">
                        <li>• Assistance lors d'entretiens</li>
                        <li>• Conseil juridique personnalisé</li>
                        <li>• Représentation aux prud'hommes</li>
                        <li>• Médiation avec l'employeur</li>
                    </ul>
                </div>

                <div class="service-card">
                    <div class="service-icon">📋</div>
                    <h3>Négociation collective</h3>
                    <p>Participation active aux négociations pour améliorer vos conditions de travail et votre rémunération.</p>
                    <ul style="text-align: left; margin: 1rem 0;">
                        <li>• Négociation des salaires</li>
                        <li>• Amélioration des conditions de travail</li>
                        <li>• Temps de travail et congés</li>
                        <li>• Avantages sociaux</li>
                    </ul>
                </div>

                <div class="service-card">
                    <div class="service-icon">📚</div>
                    <h3>Formation et information</h3>
                    <p>Sessions de formation pour connaître vos droits et vous informer sur l'évolution du droit du travail.</p>
                    <ul style="text-align: left; margin: 1rem 0;">
                        <li>• Formations aux droits syndicaux</li>
                        <li>• Ateliers droit du travail</li>
                        <li>• Séminaires thématiques</li>
                        <li>• Documentation juridique</li>
                    </ul>
                </div>

                <div class="service-card">
                    <div class="service-icon">👥</div>
                    <h3>Représentation du personnel</h3>
                    <p>Élus Force Ouvrière présents dans toutes les instances représentatives du personnel.</p>
                    <ul style="text-align: left; margin: 1rem 0;">
                        <li>• Comité Social et Économique (CSE)</li>
                        <li>• Commission SSCT</li>
                        <li>• Délégués syndicaux</li>
                        <li>• Représentants de proximité</li>
                    </ul>
                </div>

                <div class="service-card">
                    <div class="service-icon">⚖️</div>
                    <h3>Assistance juridique</h3>
                    <p>Support juridique complet avec nos experts en droit du travail pour tous vos questionnements.</p>
                    <ul style="text-align: left; margin: 1rem 0;">
                        <li>• Consultation juridique gratuite</li>
                        <li>• Rédaction de courriers</li>
                        <li>• Analyse de contrats</li>
                        <li>• Veille juridique</li>
                    </ul>
                </div>

                <div class="service-card">
                    <div class="service-icon">📞</div>
                    <h3>Permanences et écoute</h3>
                    <p>Permanences régulières et ligne d'écoute pour répondre à vos préoccupations professionnelles.</p>
                    <ul style="text-align: left; margin: 1rem 0;">
                        <li>• Permanences sur site</li>
                        <li>• Ligne téléphonique dédiée</li>
                        <li>• Rendez-vous individuels</li>
                        <li>• Support par email</li>
                    </ul>
                </div>
            </div>

            <div class="section-footer">
                <p style="text-align: center; font-size: 1.1rem; margin: 2rem 0;">
                    <strong>Besoin d'aide ou d'informations ?</strong><br>
                    Contactez-nous dès maintenant pour bénéficier de nos services.
                </p>
                <a href="contact.php" class="btn btn-primary">Nous contacter</a>
                <a href="adhesion.php" class="btn btn-cta">Adhérer maintenant</a>
            </div>
        </div>
    </section>
</main>

<?php include_once 'includes/footer.php'; ?>
