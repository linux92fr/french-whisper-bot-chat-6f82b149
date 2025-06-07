
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
                <h1 class="hero-title" style="font-size: 2.5rem;">Actualités</h1>
                <p class="hero-description">
                    Suivez toute l'actualité syndicale et les dernières actions de Force Ouvrière FOCOM UES ILIAD.
                </p>
            </div>
        </div>
    </section>

    <!-- Liste des actualités -->
    <section class="news-section">
        <div class="container">
            <div class="news-grid">
                <?php
                // Récupérer toutes les actualités
                $stmt = $pdo->prepare("SELECT * FROM actualites WHERE publie = 1 ORDER BY date_creation DESC");
                $stmt->execute();
                $actualites = $stmt->fetchAll();
                
                if (count($actualites) > 0):
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
                                📅 <?= date('d/m/Y à H:i', strtotime($article['date_creation'])) ?>
                            </div>
                            <h3><?= htmlspecialchars($article['titre']) ?></h3>
                            <p><?= htmlspecialchars(substr($article['contenu'], 0, 200)) ?>...</p>
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
                    <?php endforeach;
                else: ?>
                    <div style="grid-column: 1 / -1; text-align: center; padding: 3rem;">
                        <h3>Aucune actualité disponible pour le moment</h3>
                        <p>Revenez bientôt pour découvrir nos dernières nouvelles.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Section Newsletter -->
    <section class="stats-section">
        <div class="container">
            <div style="text-align: center; max-width: 600px; margin: 0 auto;">
                <h2 style="margin-bottom: 1rem;">Restez informé</h2>
                <p style="margin-bottom: 2rem; color: var(--gray-600);">
                    Ne manquez aucune information importante concernant vos droits et les actions du syndicat.
                </p>
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="adhesion.php" class="btn btn-primary">Adhérer pour recevoir les infos</a>
                    <a href="contact.php" class="btn btn-secondary">Nous contacter</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include_once 'includes/footer.php'; ?>
