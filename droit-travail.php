
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
                <h1 class="hero-title" style="font-size: 2.5rem;">Droit du Travail</h1>
                <p class="hero-description">
                    Informations essentielles et ressources pour connaître et défendre vos droits au travail.
                </p>
            </div>
        </div>
    </section>

    <!-- Sections droit du travail -->
    <section class="services-section">
        <div class="container">
            <div class="section-header">
                <h2>Vos droits essentiels</h2>
                <p>Connaître ses droits, c'est pouvoir les faire respecter</p>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">💰</div>
                    <h3>Salaire et rémunération</h3>
                    <div style="text-align: left;">
                        <h4>Vos droits :</h4>
                        <ul>
                            <li>• SMIC : 1 747,20€ brut/mois (2024)</li>
                            <li>• Paiement mensuel obligatoire</li>
                            <li>• Bulletin de paie détaillé</li>
                            <li>• Heures supplémentaires majorées</li>
                        </ul>
                        <h4>En cas de problème :</h4>
                        <ul>
                            <li>• Retard de paiement : mise en demeure</li>
                            <li>• Erreur de calcul : réclamation écrite</li>
                            <li>• Non-paiement : saisie des prud'hommes</li>
                        </ul>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-icon">⏰</div>
                    <h3>Temps de travail</h3>
                    <div style="text-align: left;">
                        <h4>Durée légale :</h4>
                        <ul>
                            <li>• 35h/semaine (1607h/an)</li>
                            <li>• 10h/jour maximum</li>
                            <li>• 48h/semaine maximum</li>
                            <li>• Repos hebdomadaire : 35h consécutives</li>
                        </ul>
                        <h4>Heures supplémentaires :</h4>
                        <ul>
                            <li>• +25% de 36h à 43h</li>
                            <li>• +50% au-delà de 43h</li>
                            <li>• Repos compensateur possible</li>
                        </ul>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-icon">🏖️</div>
                    <h3>Congés et absences</h3>
                    <div style="text-align: left;">
                        <h4>Congés payés :</h4>
                        <ul>
                            <li>• 2,5 jours/mois travaillé</li>
                            <li>• 30 jours ouvrables/an (5 semaines)</li>
                            <li>• Prise obligatoire entre mai et octobre</li>
                            <li>• Indemnité = salaire habituel</li>
                        </ul>
                        <h4>Autres congés :</h4>
                        <ul>
                            <li>• Maladie : maintien de salaire</li>
                            <li>• Maternité : 16 semaines</li>
                            <li>• Paternité : 28 jours</li>
                        </ul>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-icon">🛡️</div>
                    <h3>Protection contre le licenciement</h3>
                    <div style="text-align: left;">
                        <h4>Procédure obligatoire :</h4>
                        <ul>
                            <li>• Convocation à entretien préalable</li>
                            <li>• Délai de réflexion</li>
                            <li>• Notification écrite motivée</li>
                            <li>• Préavis selon ancienneté</li>
                        </ul>
                        <h4>Indemnités :</h4>
                        <ul>
                            <li>• Légale : 1/4 puis 1/3 mois/année</li>
                            <li>• Conventionnelle souvent plus favorable</li>
                            <li>• Préavis non effectué = indemnité</li>
                        </ul>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-icon">🚫</div>
                    <h3>Harcèlement et discrimination</h3>
                    <div style="text-align: left;">
                        <h4>Définitions :</h4>
                        <ul>
                            <li>• Harcèlement moral : agissements répétés</li>
                            <li>• Harcèlement sexuel : propos/comportements</li>
                            <li>• Discrimination : traitement inégal</li>
                        </ul>
                        <h4>Actions possibles :</h4>
                        <ul>
                            <li>• Signalement à l'employeur</li>
                            <li>• Alerte au CSE</li>
                            <li>• Médiation</li>
                            <li>• Action judiciaire</li>
                        </ul>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-icon">⚖️</div>
                    <h3>Recours juridiques</h3>
                    <div style="text-align: left;">
                        <h4>Conseil de prud'hommes :</h4>
                        <ul>
                            <li>• Gratuit (sauf frais d'avocat)</li>
                            <li>• Délai : 12 mois après rupture</li>
                            <li>• Procédure contradictoire</li>
                            <li>• Possibilité d'appel</li>
                        </ul>
                        <h4>Aide juridictionnelle :</h4>
                        <ul>
                            <li>• Selon revenus</li>
                            <li>• Prise en charge partielle/totale</li>
                            <li>• Avocat commis d'office</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="section-footer">
                <div style="background: var(--light-blue); padding: 2rem; border-radius: 1rem; margin: 3rem 0;">
                    <h3 style="text-align: center; margin-bottom: 1rem;">❓ Une question sur vos droits ?</h3>
                    <p style="text-align: center; margin-bottom: 2rem;">
                        Nos délégués syndicaux sont là pour vous accompagner et vous conseiller gratuitement.
                    </p>
                    <div style="text-align: center;">
                        <a href="contact.php" class="btn btn-primary" style="margin-right: 1rem;">Poser une question</a>
                        <a href="adhesion.php" class="btn btn-cta">Adhérer pour plus de protection</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include_once 'includes/footer.php'; ?>
