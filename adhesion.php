
<?php
session_start();
include_once 'config/database.php';
include_once 'includes/header.php';
?>

<main>
    <!-- Hero Section -->
    <section class="hero-section" style="padding: 3rem 0;">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title" style="font-size: 2.5rem;">Adhérer à Force Ouvrière</h1>
                <p class="hero-description">
                    Rejoignez le 1er syndicat d'ILIAD et bénéficiez de la protection et des services de Force Ouvrière.
                </p>
            </div>
        </div>
    </section>

    <!-- Avantages de l'adhésion -->
    <section class="services-section">
        <div class="container">
            <div class="section-header">
                <h2>Pourquoi adhérer ?</h2>
                <p>Les avantages concrets de votre adhésion</p>
            </div>
            
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">🛡️</div>
                    <h3>Protection juridique</h3>
                    <p>Accompagnement et défense gratuite en cas de conflit avec votre employeur, assistance aux prud'hommes.</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">💰</div>
                    <h3>Négociations salariales</h3>
                    <p>Participation active aux négociations pour améliorer vos salaires et conditions de travail.</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">📚</div>
                    <h3>Formation et information</h3>
                    <p>Accès à nos formations sur vos droits et à toute l'information syndicale en temps réel.</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">🤝</div>
                    <h3>Solidarité</h3>
                    <p>Appartenance à un collectif fort de plus de 2 300 adhérents qui défendent vos intérêts.</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">📞</div>
                    <h3>Conseil personnalisé</h3>
                    <p>Ligne directe avec nos délégués syndicaux pour toutes vos questions professionnelles.</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">🗳️</div>
                    <h3>Démocratie sociale</h3>
                    <p>Participation aux décisions qui vous concernent et vote sur les orientations du syndicat.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Cotisation -->
    <section class="stats-section">
        <div class="container">
            <div style="text-align: center; max-width: 800px; margin: 0 auto;">
                <h2 style="margin-bottom: 2rem;">Cotisation syndicale</h2>
                <div style="background: var(--white); padding: 3rem; border-radius: 1rem; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
                    <div style="font-size: 3rem; color: var(--primary-blue); margin-bottom: 1rem;">0.75%</div>
                    <div style="font-size: 1.5rem; font-weight: 600; margin-bottom: 1rem;">du salaire brut</div>
                    <div style="color: var(--gray-600); margin-bottom: 2rem;">
                        Soit environ <strong>13€/mois</strong> pour un salaire de 1 750€ brut<br>
                        <small>Déduction fiscale possible selon votre situation</small>
                    </div>
                    <div style="background: var(--light-blue); padding: 1.5rem; border-radius: 0.5rem;">
                        <strong>💡 Le saviez-vous ?</strong><br>
                        En 2024, nos négociations ont permis une augmentation moyenne de 12% des salaires,
                        soit un gain bien supérieur au coût de la cotisation !
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section téléchargement bulletin d'adhésion -->
    <section class="services-section">
        <div class="container">
            <div style="max-width: 800px; margin: 0 auto;">
                <div class="service-card">
                    <div style="text-align: center; margin-bottom: 3rem;">
                        <div style="background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue)); width: 5rem; height: 5rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem; font-size: 2rem;">📄</div>
                        <h2 style="color: var(--primary-blue); margin-bottom: 1rem;">Téléchargez votre bulletin d'adhésion</h2>
                        <p style="color: var(--gray-600); font-size: 1.1rem; line-height: 1.6;">
                            Téléchargez le bulletin d'adhésion officiel, remplissez-le et retournez-le nous par email ou courrier.
                        </p>
                    </div>

                    <!-- Étapes d'adhésion -->
                    <div style="background: var(--light-blue); padding: 2rem; border-radius: 1rem; margin-bottom: 3rem;">
                        <h3 style="color: var(--primary-blue); margin-bottom: 1.5rem; text-align: center;">📋 Comment adhérer ?</h3>
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
                            <div style="text-align: center;">
                                <div style="background: var(--white); width: 3rem; height: 3rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-weight: bold; color: var(--primary-blue);">1</div>
                                <h4>Téléchargez</h4>
                                <p style="font-size: 0.9rem; color: var(--gray-600);">Le bulletin d'adhésion au format PDF</p>
                            </div>
                            <div style="text-align: center;">
                                <div style="background: var(--white); width: 3rem; height: 3rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-weight: bold; color: var(--primary-blue);">2</div>
                                <h4>Remplissez</h4>
                                <p style="font-size: 0.9rem; color: var(--gray-600);">Vos informations personnelles et professionnelles</p>
                            </div>
                            <div style="text-align: center;">
                                <div style="background: var(--white); width: 3rem; height: 3rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; font-weight: bold; color: var(--primary-blue);">3</div>
                                <h4>Retournez</h4>
                                <p style="font-size: 0.9rem; color: var(--gray-600);">Par email à contact@focom-iliad.fr</p>
                            </div>
                        </div>
                    </div>

                    <!-- Bouton de téléchargement -->
                    <div style="text-align: center; margin-bottom: 2rem;">
                        <a href="documents/bulletin-adhesion-focom.pdf" 
                           download="bulletin-adhesion-focom.pdf"
                           class="btn btn-primary" 
                           style="display: inline-flex; align-items: center; gap: 0.75rem; padding: 1.25rem 2rem; font-size: 1.1rem; text-decoration: none; border-radius: 0.75rem; background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue)); color: var(--white); font-weight: 600; box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3); transition: all 0.3s ease;">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Télécharger le bulletin d'adhésion (PDF)
                        </a>
                        <p style="margin-top: 1rem; font-size: 0.9rem; color: var(--gray-500);">
                            Format PDF • Environ 150 Ko
                        </p>
                    </div>

                    <!-- Informations de contact -->
                    <div style="background: var(--gray-50); padding: 2rem; border-radius: 1rem; border-left: 4px solid var(--primary-blue);">
                        <h3 style="color: var(--primary-blue); margin-bottom: 1.5rem;">📞 Besoin d'aide ?</h3>
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
                            <div>
                                <h4 style="margin-bottom: 0.5rem;">📧 Par email</h4>
                                <p style="color: var(--gray-600); margin: 0;">
                                    <a href="mailto:contact@focom-iliad.fr" style="color: var(--primary-blue);">contact@focom-iliad.fr</a><br>
                                    <small>Réponse sous 24h ouvrées</small>
                                </p>
                            </div>
                            <div>
                                <h4 style="margin-bottom: 0.5rem;">📞 Par téléphone</h4>
                                <p style="color: var(--gray-600); margin: 0;">
                                    <a href="tel:0123456789" style="color: var(--primary-blue);">01 23 45 67 89</a><br>
                                    <small>Lun-Ven 9h-17h</small>
                                </p>
                            </div>
                        </div>
                        <div style="margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid var(--gray-200);">
                            <p style="margin: 0; font-size: 0.9rem; color: var(--gray-600);">
                                <strong>💡 Conseil :</strong> Si vous avez des questions sur la cotisation ou vos droits, 
                                n'hésitez pas à nous contacter avant de remplir le bulletin !
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section alternative en ligne -->
    <section class="stats-section" style="background: var(--gray-50);">
        <div class="container">
            <div style="text-align: center; max-width: 600px; margin: 0 auto;">
                <h2 style="margin-bottom: 1.5rem; color: var(--primary-blue);">Adhésion en ligne bientôt disponible</h2>
                <p style="color: var(--gray-600); margin-bottom: 2rem; line-height: 1.6;">
                    Nous travaillons actuellement sur une solution d'adhésion 100% en ligne pour vous simplifier les démarches. 
                    En attendant, le bulletin PDF reste le moyen le plus rapide pour nous rejoindre !
                </p>
                <div style="display: inline-flex; align-items: center; background: var(--white); padding: 1rem 1.5rem; border-radius: 0.75rem; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                    <span style="margin-right: 0.75rem; font-size: 1.5rem;">🚀</span>
                    <span style="color: var(--gray-700); font-weight: 500;">Lancement prévu début 2025</span>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include_once 'includes/footer.php'; ?>
