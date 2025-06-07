
<?php
session_start();
include_once 'config/database.php';
include_once 'includes/header.php';

$message_envoye = false;
$erreur = '';

if ($_POST) {
    $nom = trim($_POST['nom'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $sujet = trim($_POST['sujet'] ?? '');
    $message = trim($_POST['message'] ?? '');
    
    if ($nom && $prenom && $email && $sujet && $message) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            try {
                $stmt = $pdo->prepare("INSERT INTO contacts (nom, prenom, email, sujet, message) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$nom, $prenom, $email, $sujet, $message]);
                $message_envoye = true;
            } catch (Exception $e) {
                $erreur = "Erreur lors de l'envoi du message. Veuillez réessayer.";
            }
        } else {
            $erreur = "Adresse email invalide.";
        }
    } else {
        $erreur = "Veuillez remplir tous les champs.";
    }
}
?>

<main>
    <!-- Hero Section -->
    <section class="hero-section" style="padding: 3rem 0;">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title" style="font-size: 2.5rem;">Contactez-nous</h1>
                <p class="hero-description">
                    Une question, un problème, besoin de conseils ? Notre équipe est là pour vous accompagner.
                </p>
            </div>
        </div>
    </section>

    <!-- Informations de contact -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-icon">
                        <span>📧</span>
                    </div>
                    <div class="stat-label">Email</div>
                    <div class="stat-description">contact@focom-iliad.fr</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-icon">
                        <span>📞</span>
                    </div>
                    <div class="stat-label">Téléphone</div>
                    <div class="stat-description">01 23 45 67 89</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-icon">
                        <span>📍</span>
                    </div>
                    <div class="stat-label">Adresse</div>
                    <div class="stat-description">Paris, France</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-icon">
                        <span>⏰</span>
                    </div>
                    <div class="stat-label">Permanences</div>
                    <div class="stat-description">Lun-Ven 9h-17h</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Formulaire de contact -->
    <section class="services-section">
        <div class="container">
            <div style="max-width: 800px; margin: 0 auto;">
                <?php if ($message_envoye): ?>
                <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 0.5rem; margin-bottom: 2rem; text-align: center;">
                    <h3>✅ Message envoyé avec succès !</h3>
                    <p>Nous vous répondrons dans les plus brefs délais.</p>
                </div>
                <?php endif; ?>

                <?php if ($erreur): ?>
                <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 0.5rem; margin-bottom: 2rem; text-align: center;">
                    <p><strong>Erreur :</strong> <?= htmlspecialchars($erreur) ?></p>
                </div>
                <?php endif; ?>

                <div class="service-card">
                    <h2 style="text-align: center; margin-bottom: 2rem;">Envoyez-nous un message</h2>
                    
                    <form method="POST" style="text-align: left;">
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                            <div>
                                <label for="nom" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Nom *</label>
                                <input type="text" id="nom" name="nom" required 
                                       style="width: 100%; padding: 0.75rem; border: 2px solid var(--gray-100); border-radius: 0.5rem; font-size: 1rem;"
                                       value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>">
                            </div>
                            <div>
                                <label for="prenom" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Prénom *</label>
                                <input type="text" id="prenom" name="prenom" required 
                                       style="width: 100%; padding: 0.75rem; border: 2px solid var(--gray-100); border-radius: 0.5rem; font-size: 1rem;"
                                       value="<?= htmlspecialchars($_POST['prenom'] ?? '') ?>">
                            </div>
                        </div>

                        <div style="margin-bottom: 1rem;">
                            <label for="email" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Email *</label>
                            <input type="email" id="email" name="email" required 
                                   style="width: 100%; padding: 0.75rem; border: 2px solid var(--gray-100); border-radius: 0.5rem; font-size: 1rem;"
                                   value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                        </div>

                        <div style="margin-bottom: 1rem;">
                            <label for="sujet" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Sujet *</label>
                            <select id="sujet" name="sujet" required 
                                    style="width: 100%; padding: 0.75rem; border: 2px solid var(--gray-100); border-radius: 0.5rem; font-size: 1rem;">
                                <option value="">Choisissez un sujet...</option>
                                <option value="Question juridique" <?= ($_POST['sujet'] ?? '') === 'Question juridique' ? 'selected' : '' ?>>Question juridique</option>
                                <option value="Problème au travail" <?= ($_POST['sujet'] ?? '') === 'Problème au travail' ? 'selected' : '' ?>>Problème au travail</option>
                                <option value="Adhésion" <?= ($_POST['sujet'] ?? '') === 'Adhésion' ? 'selected' : '' ?>>Adhésion</option>
                                <option value="Information générale" <?= ($_POST['sujet'] ?? '') === 'Information générale' ? 'selected' : '' ?>>Information générale</option>
                                <option value="Autre" <?= ($_POST['sujet'] ?? '') === 'Autre' ? 'selected' : '' ?>>Autre</option>
                            </select>
                        </div>

                        <div style="margin-bottom: 2rem;">
                            <label for="message" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Message *</label>
                            <textarea id="message" name="message" required rows="6"
                                      style="width: 100%; padding: 0.75rem; border: 2px solid var(--gray-100); border-radius: 0.5rem; font-size: 1rem; resize: vertical;"
                                      placeholder="Décrivez votre situation ou votre question..."><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                        </div>

                        <div style="text-align: center;">
                            <button type="submit" class="btn btn-primary" style="padding: 1rem 2rem;">
                                Envoyer le message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Autres moyens de contact -->
    <section class="news-section">
        <div class="container">
            <div class="section-header">
                <h2>Autres moyens de nous joindre</h2>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">🏢</div>
                    <h3>Permanences sur site</h3>
                    <p>Nos délégués syndicaux tiennent des permanences régulières sur les différents sites d'ILIAD.</p>
                    <p><strong>Horaires :</strong> Consultez l'affichage syndical ou contactez-nous pour connaître les créneaux.</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">📱</div>
                    <h3>Réseaux sociaux</h3>
                    <p>Suivez-nous sur nos réseaux sociaux pour ne rien manquer de l'actualité syndicale.</p>
                    <div style="margin-top: 1rem;">
                        <a href="#" style="margin-right: 1rem;">📘 Facebook</a>
                        <a href="#" style="margin-right: 1rem;">🐦 Twitter</a>
                        <a href="#">💼 LinkedIn</a>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-icon">🚨</div>
                    <h3>Urgences</h3>
                    <p>En cas de situation urgente (accident du travail, harcèlement, licenciement abusif), contactez-nous immédiatement.</p>
                    <p><strong>Ligne urgence :</strong> 01 23 45 67 89<br>
                    <strong>Email prioritaire :</strong> urgence@focom-iliad.fr</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include_once 'includes/footer.php'; ?>
