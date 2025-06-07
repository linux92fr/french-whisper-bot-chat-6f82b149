
<?php
session_start();
include_once 'config/database.php';
include_once 'includes/header.php';
?>

<main>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-background">
            <div class="hero-pattern"></div>
        </div>
        
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">
                    Ensemble pour défendre
                    <span class="hero-highlight">nos droits</span>
                </h1>
                
                <p class="hero-description">
                    Rejoignez le syndicat FOCOM UES ILIAD et participez à la construction d'un environnement professionnel juste et équitable.
                </p>

                <div class="hero-testimonial">
                    <p class="testimonial-text">
                        "Grâce au syndicat, j'ai pu faire valoir mes droits et obtenir une promotion méritée."
                    </p>
                    <p class="testimonial-author">- Marie D., Adhérente depuis 2022</p>
                </div>

                <div class="hero-buttons">
                    <a href="adhesion.php" class="btn btn-primary">
                        Adhérer maintenant
                        <span class="btn-icon">→</span>
                    </a>
                    <a href="services.php" class="btn btn-secondary">
                        En savoir plus
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-icon">
                        <span>👥</span>
                    </div>
                    <div class="stat-number">2,340</div>
                    <div class="stat-label">Adhérents actifs</div>
                    <div class="stat-description">Membres engagés</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-icon">
                        <span>🏆</span>
                    </div>
                    <div class="stat-number">47</div>
                    <div class="stat-label">Victoires obtenues</div>
                    <div class="stat-description">En 2024</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-icon">
                        <span>⏰</span>
                    </div>
                    <div class="stat-number">15</div>
                    <div class="stat-label">Années d'expérience</div>
                    <div class="stat-description">Au service des salariés</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-icon">
                        <span>📈</span>
                    </div>
                    <div class="stat-number">12%</div>
                    <div class="stat-label">Augmentation moyenne</div>
                    <div class="stat-description">Négociée cette année</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section">
        <div class="container">
            <div class="section-header">
                <h2>Nos Services</h2>
                <p>Des services complets pour accompagner et protéger tous nos adhérents</p>
            </div>
            
            <div class="services-grid">
                <div class="service-card urgent">
                    <div class="service-icon">📰</div>
                    <div class="service-badge">Mis à jour</div>
                    <h3>Actualités du travail</h3>
                    <p>Restez informé des dernières évolutions législatives et jurisprudentielles dans le domaine du droit du travail.</p>
                    <a href="actualites.php" class="service-link">En savoir plus →</a>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">🛡️</div>
                    <div class="service-badge">Populaire</div>
                    <h3>Défense des droits</h3>
                    <p>Notre équipe d'experts vous accompagne dans la défense de vos droits et la résolution des conflits au travail.</p>
                    <a href="droit-travail.php" class="service-link">En savoir plus →</a>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">📊</div>
                    <div class="service-badge">Nouveau</div>
                    <h3>Résultats des élections</h3>
                    <p>Consultez les résultats des dernières élections professionnelles et l'impact de notre action syndicale.</p>
                    <a href="elections.php" class="service-link">En savoir plus →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="news-section">
        <div class="container">
            <div class="section-header">
                <h2>Actualités Récentes</h2>
                <p>Suivez l'actualité de votre syndicat et les dernières victoires</p>
            </div>
            
            <div class="news-grid">
                <?php
                // Récupérer les actualités depuis la base de données
                $stmt = $pdo->prepare("SELECT * FROM actualites ORDER BY date_creation DESC LIMIT 3");
                $stmt->execute();
                $actualites = $stmt->fetchAll();
                
                foreach($actualites as $article): ?>
                <article class="news-card">
                    <div class="news-image">
                        <img src="<?= htmlspecialchars($article['image']) ?>" alt="<?= htmlspecialchars($article['titre']) ?>">
                        <?php if($article['urgent']): ?>
                        <span class="news-urgent">Urgent</span>
                        <?php endif; ?>
                    </div>
                    <div class="news-content">
                        <div class="news-date">
                            📅 <?= date('d/m/Y', strtotime($article['date_creation'])) ?>
                        </div>
                        <h3><?= htmlspecialchars($article['titre']) ?></h3>
                        <p><?= htmlspecialchars(substr($article['contenu'], 0, 150)) ?>...</p>
                        <div class="news-tags">
                            <?php if($article['tags']): ?>
                                <?php foreach(explode(',', $article['tags']) as $tag): ?>
                                <span class="tag">#<?= trim($tag) ?></span>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <a href="article.php?id=<?= $article['id'] ?>" class="news-link">Lire la suite →</a>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
            
            <div class="section-footer">
                <a href="actualites.php" class="btn btn-primary">Voir toutes les actualités →</a>
            </div>
        </div>
    </section>
</main>

<?php include_once 'includes/footer.php'; ?>
