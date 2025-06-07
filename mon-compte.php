
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

// Traitement des modifications de profil
if ($_POST && isset($_POST['update_profile'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    
    $stmt = $pdo->prepare("UPDATE utilisateurs SET nom = ?, prenom = ?, email = ? WHERE id = ?");
    if ($stmt->execute([$nom, $prenom, $email, $user_id])) {
        $success = "Profil mis à jour avec succès";
        // Recharger les données utilisateur
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = ?");
        $stmt->execute([$user_id]);
        $user = $stmt->fetch();
    } else {
        $error = "Erreur lors de la mise à jour";
    }
}

include_once 'includes/header.php';
?>

<div class="account-container">
    <div class="container">
        <div class="account-header">
            <h1>Mon Compte</h1>
            <p>Gérez vos informations personnelles et accédez à vos services</p>
            <div class="account-actions">
                <a href="logout.php" class="btn btn-outline">Déconnexion</a>
                <?php if ($user['role'] === 'admin'): ?>
                <a href="admin.php" class="btn btn-secondary">Administration</a>
                <?php endif; ?>
            </div>
        </div>

        <div class="account-grid">
            <!-- Informations personnelles -->
            <div class="account-card">
                <div class="card-header">
                    <h2>👤 Informations Personnelles</h2>
                </div>
                
                <?php if (isset($success)): ?>
                <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
                <?php endif; ?>
                
                <?php if (isset($error)): ?>
                <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>
                
                <form method="POST">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($user['prenom']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($user['nom']) ?>" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Statut</label>
                        <div class="status-badge <?= $user['role'] ?>">
                            <?= ucfirst($user['role']) ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Membre depuis</label>
                        <p class="member-since"><?= date('d/m/Y', strtotime($user['date_creation'])) ?></p>
                    </div>
                    
                    <button type="submit" name="update_profile" class="btn btn-primary">
                        Mettre à jour le profil
                    </button>
                </form>
            </div>

            <!-- Actualités importantes -->
            <div class="account-card">
                <div class="card-header">
                    <h2>📰 Actualités Importantes</h2>
                </div>
                
                <?php
                $stmt = $pdo->prepare("SELECT * FROM actualites WHERE publie = TRUE ORDER BY urgent DESC, date_creation DESC LIMIT 3");
                $stmt->execute();
                $actualites = $stmt->fetchAll();
                ?>
                
                <div class="news-list">
                    <?php foreach($actualites as $article): ?>
                    <div class="news-item <?= $article['urgent'] ? 'urgent' : '' ?>">
                        <div class="news-header">
                            <h3><?= htmlspecialchars($article['titre']) ?></h3>
                            <?php if($article['urgent']): ?>
                            <span class="urgent-badge">Urgent</span>
                            <?php endif; ?>
                        </div>
                        <p><?= htmlspecialchars(substr($article['contenu'], 0, 120)) ?>...</p>
                        <div class="news-meta">
                            <span class="news-date">📅 <?= date('d/m/Y', strtotime($article['date_creation'])) ?></span>
                            <a href="article.php?id=<?= $article['id'] ?>" class="news-link">Lire la suite →</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="card-footer">
                    <a href="actualites.php" class="btn btn-outline">Voir toutes les actualités</a>
                </div>
            </div>

            <!-- Actions rapides -->
            <div class="account-card">
                <div class="card-header">
                    <h2>⚡ Actions Rapides</h2>
                </div>
                
                <div class="quick-actions">
                    <a href="documents.php" class="action-item">
                        <div class="action-icon">📄</div>
                        <div class="action-content">
                            <h3>Documents</h3>
                            <p>Accéder aux documents syndicaux</p>
                        </div>
                        <div class="action-arrow">→</div>
                    </a>
                    
                    <a href="contact.php" class="action-item">
                        <div class="action-icon">📧</div>
                        <div class="action-content">
                            <h3>Contact</h3>
                            <p>Contacter le syndicat</p>
                        </div>
                        <div class="action-arrow">→</div>
                    </a>
                    
                    <a href="elections.php" class="action-item">
                        <div class="action-icon">🗳️</div>
                        <div class="action-content">
                            <h3>Élections</h3>
                            <p>Résultats et informations</p>
                        </div>
                        <div class="action-arrow">→</div>
                    </a>
                </div>
            </div>

            <!-- Statistiques personnelles -->
            <div class="account-card">
                <div class="card-header">
                    <h2>📊 Mes Statistiques</h2>
                </div>
                
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-number"><?= date('Y') - date('Y', strtotime($user['date_creation'])) + 1 ?></div>
                        <div class="stat-label">Années d'adhésion</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number"><?= ucfirst($user['role']) ?></div>
                        <div class="stat-label">Statut</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.account-container {
    min-height: 80vh;
    padding: 2rem 0;
    background: var(--gray-50);
}

.account-header {
    text-align: center;
    margin-bottom: 3rem;
    position: relative;
}

.account-header h1 {
    color: var(--gray-900);
    margin-bottom: 0.5rem;
}

.account-header p {
    color: var(--gray-600);
    font-size: 1.125rem;
    margin-bottom: 2rem;
}

.account-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
}

.account-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 2rem;
}

.account-card {
    background: var(--white);
    border-radius: 1rem;
    padding: 2rem;
    box-shadow: 0 4px 6px rgba(0,0,0,0.05);
}

.card-header {
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid var(--gray-100);
}

.card-header h2 {
    color: var(--gray-900);
    font-size: 1.25rem;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    color: var(--gray-700);
}

.form-group input {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid var(--gray-300);
    border-radius: 0.5rem;
    font-size: 1rem;
}

.status-badge {
    display: inline-block;
    padding: 0.5rem 1rem;
    border-radius: 2rem;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.875rem;
}

.status-badge.admin {
    background: #fee2e2;
    color: #dc2626;
}

.status-badge.membre {
    background: #dcfce7;
    color: #16a34a;
}

.member-since {
    color: var(--gray-600);
    font-size: 1rem;
    margin: 0;
}

.news-list {
    margin-bottom: 1.5rem;
}

.news-item {
    padding: 1.5rem;
    border: 1px solid var(--gray-100);
    border-radius: 0.5rem;
    margin-bottom: 1rem;
    transition: all 0.3s;
}

.news-item:hover {
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.news-item.urgent {
    border-color: #ef4444;
    background: #fef2f2;
}

.news-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 0.5rem;
}

.news-header h3 {
    font-size: 1rem;
    color: var(--gray-900);
    margin: 0;
}

.urgent-badge {
    background: #ef4444;
    color: var(--white);
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.75rem;
    font-weight: 600;
}

.news-item p {
    color: var(--gray-600);
    margin-bottom: 0.75rem;
    line-height: 1.5;
}

.news-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.news-date {
    font-size: 0.875rem;
    color: var(--gray-500);
}

.news-link {
    color: var(--primary);
    text-decoration: none;
    font-weight: 500;
    font-size: 0.875rem;
}

.quick-actions {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.action-item {
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

.action-item:hover {
    background: var(--gray-50);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.action-icon {
    font-size: 2rem;
    width: 3rem;
    text-align: center;
}

.action-content {
    flex: 1;
}

.action-content h3 {
    font-size: 1rem;
    margin-bottom: 0.25rem;
    color: var(--gray-900);
}

.action-content p {
    font-size: 0.875rem;
    color: var(--gray-600);
    margin: 0;
}

.action-arrow {
    font-size: 1.25rem;
    color: var(--gray-400);
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
}

.stat-item {
    text-align: center;
    padding: 1.5rem;
    background: var(--gray-50);
    border-radius: 0.5rem;
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 0.875rem;
    color: var(--gray-600);
    text-transform: uppercase;
    font-weight: 500;
}

.card-footer {
    margin-top: 1.5rem;
    padding-top: 1.5rem;
    border-top: 1px solid var(--gray-100);
    text-align: center;
}

.alert {
    padding: 1rem;
    border-radius: 0.5rem;
    margin-bottom: 1.5rem;
}

.alert-error {
    background: #fef2f2;
    color: #dc2626;
    border: 1px solid #fecaca;
}

.alert-success {
    background: #f0fdf4;
    color: #16a34a;
    border: 1px solid #bbf7d0;
}

@media (max-width: 768px) {
    .account-grid {
        grid-template-columns: 1fr;
    }
    
    .form-row {
        grid-template-columns: 1fr;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .account-actions {
        flex-direction: column;
        align-items: center;
    }
}
</style>

<?php include_once 'includes/footer.php'; ?>
