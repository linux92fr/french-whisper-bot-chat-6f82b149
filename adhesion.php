
<?php
session_start();
include_once 'config/database.php';
include_once 'includes/header.php';

$demande_envoyee = false;
$erreur = '';

if ($_POST) {
    $nom = trim($_POST['nom'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telephone = trim($_POST['telephone'] ?? '');
    $poste = trim($_POST['poste'] ?? '');
    $service = trim($_POST['service'] ?? '');
    $message = trim($_POST['message'] ?? '');
    
    if ($nom && $prenom && $email && $poste && $service) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            try {
                $stmt = $pdo->prepare("INSERT INTO adhesions (nom, prenom, email, telephone, poste, service, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$nom, $prenom, $email, $telephone, $poste, $service, $message]);
                $demande_envoyee = true;
            } catch (Exception $e) {
                $erreur = "Erreur lors de l'envoi de la demande. Veuillez réessayer.";
            }
        } else {
            $erreur = "Adresse email invalide.";
        }
    } else {
        $erreur = "Veuillez remplir tous les champs obligatoires.";
    }
}
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

    <!-- Formulaire d'adhésion -->
    <section class="services-section">
        <div class="container">
            <div style="max-width: 800px; margin: 0 auto;">
                <?php if ($demande_envoyee): ?>
                <div style="background: #d4edda; color: #155724; padding: 2rem; border-radius: 0.5rem; margin-bottom: 2rem; text-align: center;">
                    <h3>✅ Demande d'adhésion envoyée !</h3>
                    <p>Nous allons traiter votre demande rapidement et vous recontacter pour finaliser votre adhésion.</p>
                    <p><strong>Prochaines étapes :</strong></p>
                    <ul style="text-align: left; max-width: 400px; margin: 1rem auto;">
                        <li>• Validation de votre dossier (24-48h)</li>
                        <li>• Envoi du bulletin d'adhésion</li>
                        <li>• Activation de vos droits syndicaux</li>
                        <li>• Invitation aux prochaines réunions</li>
                    </ul>
                </div>
                <?php endif; ?>

                <?php if ($erreur): ?>
                <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 0.5rem; margin-bottom: 2rem; text-align: center;">
                    <p><strong>Erreur :</strong> <?= htmlspecialchars($erreur) ?></p>
                </div>
                <?php endif; ?>

                <div class="service-card">
                    <h2 style="text-align: center; margin-bottom: 2rem;">Formulaire d'adhésion</h2>
                    
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

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                            <div>
                                <label for="email" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Email professionnel *</label>
                                <input type="email" id="email" name="email" required 
                                       style="width: 100%; padding: 0.75rem; border: 2px solid var(--gray-100); border-radius: 0.5rem; font-size: 1rem;"
                                       value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                            </div>
                            <div>
                                <label for="telephone" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Téléphone</label>
                                <input type="tel" id="telephone" name="telephone" 
                                       style="width: 100%; padding: 0.75rem; border: 2px solid var(--gray-100); border-radius: 0.5rem; font-size: 1rem;"
                                       value="<?= htmlspecialchars($_POST['telephone'] ?? '') ?>">
                            </div>
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                            <div>
                                <label for="poste" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Poste occupé *</label>
                                <input type="text" id="poste" name="poste" required 
                                       style="width: 100%; padding: 0.75rem; border: 2px solid var(--gray-100); border-radius: 0.5rem; font-size: 1rem;"
                                       placeholder="Ex: Technicien réseau, Conseiller client..."
                                       value="<?= htmlspecialchars($_POST['poste'] ?? '') ?>">
                            </div>
                            <div>
                                <label for="service" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Service/Département *</label>
                                <select id="service" name="service" required 
                                        style="width: 100%; padding: 0.75rem; border: 2px solid var(--gray-100); border-radius: 0.5rem; font-size: 1rem;">
                                    <option value="">Choisissez votre service...</option>
                                    <option value="Technique" <?= ($_POST['service'] ?? '') === 'Technique' ? 'selected' : '' ?>>Technique</option>
                                    <option value="Commercial" <?= ($_POST['service'] ?? '') === 'Commercial' ? 'selected' : '' ?>>Commercial</option>
                                    <option value="Support client" <?= ($_POST['service'] ?? '') === 'Support client' ? 'selected' : '' ?>>Support client</option>
                                    <option value="Marketing" <?= ($_POST['service'] ?? '') === 'Marketing' ? 'selected' : '' ?>>Marketing</option>
                                    <option value="Administratif" <?= ($_POST['service'] ?? '') === 'Administratif' ? 'selected' : '' ?>>Administratif</option>
                                    <option value="RH" <?= ($_POST['service'] ?? '') === 'RH' ? 'selected' : '' ?>>Ressources Humaines</option>
                                    <option value="Autre" <?= ($_POST['service'] ?? '') === 'Autre' ? 'selected' : '' ?>>Autre</option>
                                </select>
                            </div>
                        </div>

                        <div style="margin-bottom: 2rem;">
                            <label for="message" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Message (optionnel)</label>
                            <textarea id="message" name="message" rows="4"
                                      style="width: 100%; padding: 0.75rem; border: 2px solid var(--gray-100); border-radius: 0.5rem; font-size: 1rem; resize: vertical;"
                                      placeholder="Dites-nous pourquoi vous souhaitez adhérer, vos attentes..."><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                        </div>

                        <div style="background: var(--light-blue); padding: 1.5rem; border-radius: 0.5rem; margin-bottom: 2rem;">
                            <p style="margin: 0; font-size: 0.9rem;">
                                <strong>📋 Engagement :</strong> En soumettant ce formulaire, je demande à adhérer au syndicat Force Ouvrière FOCOM UES ILIAD et accepte de payer la cotisation syndicale selon le barème en vigueur.
                            </p>
                        </div>

                        <div style="text-align: center;">
                            <button type="submit" class="btn btn-primary" style="padding: 1rem 2rem; font-size: 1.1rem;">
                                Envoyer ma demande d'adhésion
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include_once 'includes/footer.php'; ?>
