
<?php
session_start();
include_once 'config/database.php';

// Vérification de connexion
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

include_once 'includes/header.php';
?>

<div class="dashboard-container">
    <div class="container">
        <div class="dashboard-header">
            <h1>Espace Membre</h1>
            <p>Bienvenue, <?= htmlspecialchars($user['prenom'] . ' ' . $user['nom']) ?></p>
        </div>

        <div class="dashboard-grid">
            <!-- Profil utilisateur -->
            <div class="dashboard-card">
                <h2>👤 Mon Profil</h2>
                <div class="profile-info">
                    <p><strong>Nom :</strong> <?= htmlspecialchars($user['nom']) ?></p>
                    <p><strong>Prénom :</strong> <?= htmlspecialchars($user['prenom']) ?></p>
                    <p><strong>Email :</strong> <?= htmlspecialchars($user['email']) ?></p>
                    <p><strong>Statut :</strong> <?= ucfirst($user['role']) ?></p>
                    <p><strong>Membre depuis :</strong> <?= date('d/m/Y', strtotime($user['date_creation'])) ?></p>
                </div>
                <a href="edit-profile.php" class="btn btn-primary">Modifier mon profil</a>
            </div>

            <!-- Actualités pour les membres -->
            <div class="dashboard-card">
                <h2>📰 Actualités importantes</h2>
                <?php
                $stmt = $pdo->prepare("SELECT * FROM actualites WHERE publie = TRUE ORDER BY urgent DESC, date_creation DESC LIMIT 3");
                $stmt->execute();
                $actualites = $stmt->fetchAll();
                ?>
                <div class="news-list">
                    <?php foreach($actualites as $article): ?>
                    <div class="news-item <?= $article['urgent'] ? 'urgent' : '' ?>">
                        <h3><?= htmlspecialchars($article['titre']) ?></h3>
                        <p><?= htmlspecialchars(substr($article['contenu'], 0, 100)) ?>...</p>
                        <div class="news-meta">
                            <?php if($article['urgent']): ?>
                            <span class="badge urgent">Urgent</span>
                            <?php endif; ?>
                            <span class="date"><?= date('d/m/Y', strtotime($article['date_creation'])) ?></span>
                        </div>
                        <a href="article.php?id=<?= $article['id'] ?>" class="btn btn-small">Lire la suite</a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Actions rapides -->
            <div class="dashboard-card">
                <h2>⚡ Actions rapides</h2>
                <div class="quick-actions">
                    <a href="documents.php" class="action-btn">
                        <span>📄</span>
                        <div>
                            <h3>Documents</h3>
                            <p>Accéder aux documents syndicaux</p>
                        </div>
                    </a>
                    <a href="contact.php" class="action-btn">
                        <span>📧</span>
                        <div>
                            <h3>Contact</h3>
                            <p>Contacter le syndicat</p>
                        </div>
                    </a>
                    <a href="elections.php" class="action-btn">
                        <span>🗳️</span>
                        <div>
                            <h3>Élections</h3>
                            <p>Résultats et informations</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Statistiques personnelles -->
            <div class="dashboard-card">
                <h2>📊 Mes informations</h2>
                <div class="personal-stats">
                    <div class="stat-item">
                        <div class="stat-number"><?= date('Y') - date('Y', strtotime($user['date_creation'])) + 1 ?></div>
                        <div class="stat-label">Années d'adhésion</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number"><?= $user['role'] === 'admin' ? 'Admin' : 'Membre' ?></div>
                        <div class="stat-label">Statut</div>
                    </div>
                </div>
                <?php if($user['role'] === 'admin'): ?>
                <a href="admin.php" class="btn btn-secondary">Accéder à l'administration</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<style>
.dashboard-container {
    min-height: 80vh;
    padding: 2rem 0;
    background: var(--gray-50);
}

.dashboard-header {
    text-align: center;
    margin-bottom: 3rem;
}

.dashboard-header h1 {
    color: var(--gray-900);
    margin-bottom: 0.5rem;
}

.dashboard-header p {
    color: var(--gray-600);
    font-size: 1.125rem;
}

.dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 2rem;
}

.dashboard-card {
    background: var(--white);
    border-radius: 1rem;
    padding: 2rem;
    box-shadow: 0 4px 6px rgba(0,0,0,0.05);
}

.dashboard-card h2 {
    margin-bottom: 1.5rem;
    color: var(--gray-900);
}

.profile-info p {
    margin-bottom: 0.75rem;
    color: var(--gray-700);
}

.news-list {
    margin-bottom: 1.5rem;
}

.news-item {
    padding: 1.5rem;
    border: 1px solid var(--gray-100);
    border-radius: 0.5rem;
    margin-bottom: 1rem;
}

.news-item.urgent {
    border-color: #ef4444;
    background: #fef2f2;
}

.news-item h3 {
    font-size: 1rem;
    margin-bottom: 0.5rem;
    color: var(--gray-900);
}

.news-item p {
    color: var(--gray-600);
    margin-bottom: 0.75rem;
}

.news-meta {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 0.75rem;
}

.badge {
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.75rem;
    font-weight: 600;
}

.badge.urgent {
    background: #ef4444;
    color: var(--white);
}

.date {
    font-size: 0.875rem;
    color: var(--gray-600);
}

.quick-actions {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.action-btn {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    border: 1px solid var(--gray-100);
    border-radius: 0.5rem;
    text-decoration: none;
    color: var(--gray-900);
    transition: all 0.3s;
}

.action-btn:hover {
    background: var(--gray-50);
    transform: translateY(-2px);
}

.action-btn span {
    font-size: 2rem;
}

.action-btn h3 {
    font-size: 1rem;
    margin-bottom: 0.25rem;
}

.action-btn p {
    font-size: 0.875rem;
    color: var(--gray-600);
}

.personal-stats {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.personal-stats .stat-item {
    text-align: center;
    padding: 1rem;
    background: var(--gray-50);
    border-radius: 0.5rem;
}

@media (max-width: 768px) {
    .dashboard-grid {
        grid-template-columns: 1fr;
    }
    
    .personal-stats {
        grid-template-columns: 1fr;
    }
}
</style>

<?php include_once 'includes/footer.php'; ?>
