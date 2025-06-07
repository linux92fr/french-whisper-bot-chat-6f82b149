
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
                <h1 class="hero-title" style="font-size: 2.5rem;">Élections Professionnelles</h1>
                <p class="hero-description">
                    Résultats des élections et représentation Force Ouvrière dans les instances du personnel.
                </p>
            </div>
        </div>
    </section>

    <!-- Résultats actuels -->
    <section class="stats-section">
        <div class="container">
            <div class="section-header">
                <h2>Notre représentation actuelle</h2>
                <p>Force Ouvrière, 1er syndicat au sein d'ILIAD</p>
            </div>
            
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-icon">
                        <span>🗳️</span>
                    </div>
                    <div class="stat-number">42%</div>
                    <div class="stat-label">Voix obtenues</div>
                    <div class="stat-description">Dernières élections CSE</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-icon">
                        <span>👥</span>
                    </div>
                    <div class="stat-number">8</div>
                    <div class="stat-label">Élus titulaires</div>
                    <div class="stat-description">Au CSE</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-icon">
                        <span>🏛️</span>
                    </div>
                    <div class="stat-number">5</div>
                    <div class="stat-label">Délégués syndicaux</div>
                    <div class="stat-description">Représentants FO</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-icon">
                        <span>📈</span>
                    </div>
                    <div class="stat-number">+12%</div>
                    <div class="stat-label">Progression</div>
                    <div class="stat-description">Vs élections précédentes</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Résultats détaillés -->
    <section class="services-section">
        <div class="container">
            <div class="section-header">
                <h2>Résultats détaillés</h2>
            </div>

            <div class="services-grid" style="grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));">
                <div class="service-card">
                    <h3>🏢 Comité Social et Économique (CSE)</h3>
                    <div style="text-align: left;">
                        <h4>Élections 2023 :</h4>
                        <div style="margin: 1rem 0;">
                            <div style="display: flex; justify-content: space-between; margin: 0.5rem 0;">
                                <span><strong>Force Ouvrière</strong></span>
                                <span><strong>42.3%</strong></span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin: 0.5rem 0;">
                                <span>CFDT</span>
                                <span>28.1%</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin: 0.5rem 0;">
                                <span>CGT</span>
                                <span>18.7%</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin: 0.5rem 0;">
                                <span>UNSA</span>
                                <span>10.9%</span>
                            </div>
                        </div>
                        <p><strong>Résultat :</strong> 8 élus titulaires et 6 suppléants FO</p>
                    </div>
                </div>

                <div class="service-card">
                    <h3>🔒 Commission SSCT</h3>
                    <div style="text-align: left;">
                        <h4>Santé, Sécurité et Conditions de Travail :</h4>
                        <ul>
                            <li>• 3 représentants Force Ouvrière</li>
                            <li>• Présidence tournante</li>
                            <li>• Réunions mensuelles</li>
                            <li>• Droit d'alerte et de retrait</li>
                        </ul>
                        <h4>Actions récentes :</h4>
                        <ul>
                            <li>• Amélioration de l'ergonomie des postes</li>
                            <li>• Réduction du stress au travail</li>
                            <li>• Prévention des RPS</li>
                        </ul>
                    </div>
                </div>

                <div class="service-card">
                    <h3>⚖️ Conseil de Discipline</h3>
                    <div style="text-align: left;">
                        <h4>Représentation FO :</h4>
                        <ul>
                            <li>• 2 représentants titulaires</li>
                            <li>• 2 représentants suppléants</li>
                            <li>• Défense des salariés</li>
                            <li>• Respect de la procédure</li>
                        </ul>
                        <h4>Bilan 2024 :</h4>
                        <ul>
                            <li>• 15 dossiers traités</li>
                            <li>• 8 sanctions annulées</li>
                            <li>• 100% des salariés défendus</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Prochaines échéances -->
    <section class="news-section">
        <div class="container">
            <div class="section-header">
                <h2>Prochaines échéances électorales</h2>
            </div>

            <div style="max-width: 800px; margin: 0 auto;">
                <div class="service-card" style="text-align: left;">
                    <h3>📅 Calendrier électoral 2025-2027</h3>
                    
                    <div style="margin: 2rem 0;">
                        <h4>🗓️ Renouvellement CSE : Octobre 2027</h4>
                        <p>Les prochaines élections du Comité Social et Économique auront lieu en octobre 2027. Force Ouvrière prépare déjà ses listes pour maintenir et renforcer sa première place.</p>
                    </div>

                    <div style="margin: 2rem 0;">
                        <h4>🎯 Nos objectifs :</h4>
                        <ul>
                            <li>• Maintenir notre position de 1er syndicat</li>
                            <li>• Obtenir la majorité absolue</li>
                            <li>• Renforcer notre présence terrain</li>
                            <li>• Défendre un programme ambitieux</li>
                        </ul>
                    </div>

                    <div style="margin: 2rem 0;">
                        <h4>💪 Comment nous soutenir :</h4>
                        <ul>
                            <li>• Adhérer au syndicat</li>
                            <li>• Participer aux réunions</li>
                            <li>• Voter Force Ouvrière</li>
                            <li>• Devenir candidat(e)</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="section-footer">
                <div style="text-align: center;">
                    <h3>Envie de vous engager ?</h3>
                    <p style="margin: 1rem 0;">Rejoignez nos équipes et participez activement à la défense des droits des salariés.</p>
                    <a href="adhesion.php" class="btn btn-primary">Adhérer maintenant</a>
                    <a href="contact.php" class="btn btn-secondary">En savoir plus</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include_once 'includes/footer.php'; ?>
