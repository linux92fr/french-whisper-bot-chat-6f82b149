
<?php
session_start();
include_once 'config/database.php';

// Vérification des droits d'accès
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

include_once 'includes/header.php';
?>

<div class="admin-container">
    <div class="container">
        <h1>Administration FOCOM UES ILIAD</h1>
        
        <div class="admin-grid">
            <!-- Statistiques -->
            <div class="admin-card">
                <h2>📊 Statistiques</h2>
                <?php
                $stats = [
                    'actualites' => $pdo->query("SELECT COUNT(*) FROM actualites")->fetchColumn(),
                    'adhesions' => $pdo->query("SELECT COUNT(*) FROM adhesions WHERE status = 'en_attente'")->fetchColumn(),
                    'contacts' => $pdo->query("SELECT COUNT(*) FROM contacts WHERE traite = FALSE")->fetchColumn(),
                    'utilisateurs' => $pdo->query("SELECT COUNT(*) FROM utilisateurs")->fetchColumn()
                ];
                ?>
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-number"><?= $stats['actualites'] ?></div>
                        <div class="stat-label">Actualités</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number"><?= $stats['adhesions'] ?></div>
                        <div class="stat-label">Adhésions en attente</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number"><?= $stats['contacts'] ?></div>
                        <div class="stat-label">Messages non traités</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number"><?= $stats['utilisateurs'] ?></div>
                        <div class="stat-label">Utilisateurs</div>
                    </div>
                </div>
            </div>

            <!-- Gestion des actualités -->
            <div class="admin-card">
                <h2>📰 Actualités récentes</h2>
                <?php
                $stmt = $pdo->prepare("SELECT * FROM actualites ORDER BY date_creation DESC LIMIT 5");
                $stmt->execute();
                $actualites = $stmt->fetchAll();
                ?>
                <div class="admin-list">
                    <?php foreach($actualites as $article): ?>
                    <div class="admin-item">
                        <div class="item-info">
                            <h3><?= htmlspecialchars($article['titre']) ?></h3>
                            <p><?= date('d/m/Y', strtotime($article['date_creation'])) ?></p>
                        </div>
                        <div class="item-actions">
                            <a href="edit-article.php?id=<?= $article['id'] ?>" class="btn btn-small">Modifier</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <a href="manage-articles.php" class="btn btn-primary">Gérer les actualités</a>
            </div>

            <!-- Demandes d'adhésion -->
            <div class="admin-card">
                <h2>👥 Demandes d'adhésion</h2>
                <?php
                $stmt = $pdo->prepare("SELECT * FROM adhesions WHERE status = 'en_attente' ORDER BY date_creation DESC LIMIT 5");
                $stmt->execute();
                $adhesions = $stmt->fetchAll();
                ?>
                <div class="admin-list">
                    <?php foreach($adhesions as $adhesion): ?>
                    <div class="admin-item">
                        <div class="item-info">
                            <h3><?= htmlspecialchars($adhesion['prenom'] . ' ' . $adhesion['nom']) ?></h3>
                            <p><?= htmlspecialchars($adhesion['email']) ?></p>
                        </div>
                        <div class="item-actions">
                            <a href="process-adhesion.php?id=<?= $adhesion['id'] ?>&action=approve" class="btn btn-success btn-small">Approuver</a>
                            <a href="process-adhesion.php?id=<?= $adhesion['id'] ?>&action=refuse" class="btn btn-danger btn-small">Refuser</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <a href="manage-adhesions.php" class="btn btn-primary">Gérer les adhésions</a>
            </div>

            <!-- Messages de contact -->
            <div class="admin-card">
                <h2>📧 Messages récents</h2>
                <?php
                $stmt = $pdo->prepare("SELECT * FROM contacts WHERE traite = FALSE ORDER BY date_creation DESC LIMIT 5");
                $stmt->execute();
                $contacts = $stmt->fetchAll();
                ?>
                <div class="admin-list">
                    <?php foreach($contacts as $contact): ?>
                    <div class="admin-item">
                        <div class="item-info">
                            <h3><?= htmlspecialchars($contact['sujet']) ?></h3>
                            <p><?= htmlspecialchars($contact['nom'] . ' ' . $contact['prenom']) ?></p>
                        </div>
                        <div class="item-actions">
                            <a href="view-contact.php?id=<?= $contact['id'] ?>" class="btn btn-small">Voir</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <a href="manage-contacts.php" class="btn btn-primary">Gérer les messages</a>
            </div>
        </div>
    </div>
</div>

<style>
.admin-container {
    min-height: 80vh;
    padding: 2rem 0;
    background: var(--gray-50);
}

.admin-container h1 {
    text-align: center;
    margin-bottom: 3rem;
    color: var(--gray-900);
}

.admin-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 2rem;
}

.admin-card {
    background: var(--white);
    border-radius: 1rem;
    padding: 2rem;
    box-shadow: 0 4px 6px rgba(0,0,0,0.05);
}

.admin-card h2 {
    margin-bottom: 1.5rem;
    color: var(--gray-900);
}

.admin-list {
    margin-bottom: 1.5rem;
}

.admin-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem;
    border: 1px solid var(--gray-100);
    border-radius: 0.5rem;
    margin-bottom: 0.5rem;
}

.item-info h3 {
    font-size: 1rem;
    margin-bottom: 0.25rem;
    color: var(--gray-900);
}

.item-info p {
    font-size: 0.875rem;
    color: var(--gray-600);
}

.item-actions {
    display: flex;
    gap: 0.5rem;
}

.btn-small {
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
}

.btn-success {
    background: #10b981;
    color: var(--white);
}

.btn-success:hover {
    background: #059669;
}

.btn-danger {
    background: #ef4444;
    color: var(--white);
}

.btn-danger:hover {
    background: #dc2626;
}

@media (max-width: 768px) {
    .admin-grid {
        grid-template-columns: 1fr;
    }
    
    .admin-item {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .item-actions {
        width: 100%;
        justify-content: flex-end;
        margin-top: 0.5rem;
    }
}
</style>

<?php include_once 'includes/footer.php'; ?>
