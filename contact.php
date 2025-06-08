
<?php
session_start();
include_once 'config/database.php';

$success = '';
$error = '';

if ($_POST && isset($_POST['send_message'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $telephone = htmlspecialchars($_POST['telephone']);
    $sujet = htmlspecialchars($_POST['sujet']);
    $message = htmlspecialchars($_POST['message']);
    $type_demande = htmlspecialchars($_POST['type_demande']);
    
    if (!$email) {
        $error = 'Adresse email invalide';
    } elseif (empty($nom) || empty($prenom) || empty($sujet) || empty($message)) {
        $error = 'Tous les champs obligatoires doivent être remplis';
    } else {
        // Enregistrer le message en base
        $stmt = $pdo->prepare("INSERT INTO messages_contact (nom, prenom, email, telephone, sujet, message, type_demande, date_envoi) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
        
        if ($stmt->execute([$nom, $prenom, $email, $telephone, $sujet, $message, $type_demande])) {
            // Préparer l'email
            $to = 'contact@focom-iliad.fr';
            $subject = 'Nouveau message depuis le site FOCOM - ' . $sujet;
            
            $email_content = "
Nouveau message reçu depuis le site FOCOM UES ILIAD

Informations du contact :
- Nom : $nom
- Prénom : $prenom  
- Email : $email
- Téléphone : $telephone
- Type de demande : $type_demande

Sujet : $sujet

Message :
$message

---
Message envoyé depuis le formulaire de contact du site FOCOM UES ILIAD
Date : " . date('d/m/Y à H:i');

            $headers = "From: $email\r\n";
            $headers .= "Reply-To: $email\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
            
            // Envoyer l'email
            if (mail($to, $subject, $email_content, $headers)) {
                $success = 'Votre message a été envoyé avec succès. Nous vous répondrons dans les plus brefs délais.';
            } else {
                $success = 'Votre message a été enregistré. Nous vous répondrons dans les plus brefs délais.';
            }
        } else {
            $error = 'Erreur lors de l\'envoi du message. Veuillez réessayer.';
        }
    }
}

include_once 'includes/header.php';
?>

<div class="container" style="padding: 2rem 0;">
    <div class="section-header">
        <h1>Contactez-nous</h1>
        <p>Une question, une demande d'information ou besoin d'aide ? N'hésitez pas à nous contacter.</p>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; margin-bottom: 3rem;">
        <!-- Informations de contact -->
        <div>
            <h2 style="margin-bottom: 1.5rem; color: var(--gray-900);">Nos coordonnées</h2>
            
            <div style="background: var(--gray-50); padding: 2rem; border-radius: 1rem; margin-bottom: 2rem;">
                <h3 style="margin-bottom: 1rem; color: var(--primary-blue);">📍 Adresse</h3>
                <p style="margin-bottom: 1rem;">FOCOM UES ILIAD<br>
                Force Ouvrière<br>
                75000 Paris, France</p>
                
                <h3 style="margin-bottom: 1rem; color: var(--primary-blue);">📞 Téléphone</h3>
                <p style="margin-bottom: 1rem;">01 23 45 67 89</p>
                
                <h3 style="margin-bottom: 1rem; color: var(--primary-blue);">📧 Email</h3>
                <p style="margin-bottom: 1rem;">contact@focom-iliad.fr</p>
                
                <h3 style="margin-bottom: 1rem; color: var(--primary-blue);">🕒 Horaires</h3>
                <p>Lundi - Vendredi : 9h00 - 17h00</p>
            </div>

            <div style="background: var(--light-blue); padding: 2rem; border-radius: 1rem;">
                <h3 style="margin-bottom: 1rem; color: var(--primary-blue);">💡 Le saviez-vous ?</h3>
                <p>En tant que salarié d'ILIAD, vous bénéficiez de permanences syndicales régulières. Consultez votre espace membre pour connaître les prochaines dates.</p>
            </div>
        </div>

        <!-- Formulaire de contact -->
        <div class="contact-form">
            <h3>Envoyez-nous un message</h3>
            
            <?php if ($success): ?>
            <div style="background: #f0fdf4; color: #16a34a; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem; border: 1px solid #bbf7d0;">
                <?= $success ?>
            </div>
            <?php endif; ?>

            <?php if ($error): ?>
            <div style="background: #fef2f2; color: #dc2626; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem; border: 1px solid #fecaca;">
                <?= $error ?>
            </div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label for="prenom">Prénom *</label>
                        <input type="text" id="prenom" name="prenom" required value="<?= isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom *</label>
                        <input type="text" id="nom" name="nom" required value="<?= isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : '' ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" required value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="telephone">Téléphone</label>
                        <input type="tel" id="telephone" name="telephone" value="<?= isset($_POST['telephone']) ? htmlspecialchars($_POST['telephone']) : '' ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="type_demande">Type de demande</label>
                    <select id="type_demande" name="type_demande">
                        <option value="information" <?= (isset($_POST['type_demande']) && $_POST['type_demande'] === 'information') ? 'selected' : '' ?>>Demande d'information</option>
                        <option value="adhesion" <?= (isset($_POST['type_demande']) && $_POST['type_demande'] === 'adhesion') ? 'selected' : '' ?>>Adhésion au syndicat</option>
                        <option value="conseil" <?= (isset($_POST['type_demande']) && $_POST['type_demande'] === 'conseil') ? 'selected' : '' ?>>Conseil juridique</option>
                        <option value="reclamation" <?= (isset($_POST['type_demande']) && $_POST['type_demande'] === 'reclamation') ? 'selected' : '' ?>>Réclamation</option>
                        <option value="autre" <?= (isset($_POST['type_demande']) && $_POST['type_demande'] === 'autre') ? 'selected' : '' ?>>Autre</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="sujet">Sujet *</label>
                    <input type="text" id="sujet" name="sujet" required value="<?= isset($_POST['sujet']) ? htmlspecialchars($_POST['sujet']) : '' ?>">
                </div>

                <div class="form-group">
                    <label for="message">Message *</label>
                    <textarea id="message" name="message" required placeholder="Décrivez votre demande..."><?= isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '' ?></textarea>
                </div>

                <button type="submit" name="send_message" class="btn btn-primary" style="width: 100%;">
                    📤 Envoyer le message
                </button>
            </form>
        </div>
    </div>

    <!-- Section FAQ rapide -->
    <div style="background: var(--gray-50); padding: 3rem; border-radius: 1rem;">
        <h2 style="text-align: center; margin-bottom: 2rem;">Questions fréquentes</h2>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
            <div style="background: var(--white); padding: 1.5rem; border-radius: 0.5rem;">
                <h4 style="color: var(--primary-blue); margin-bottom: 0.5rem;">Comment adhérer au syndicat ?</h4>
                <p style="color: var(--gray-600);">Rendez-vous sur notre page <a href="adhesion.php" style="color: var(--primary-blue);">adhésion</a> pour remplir le formulaire en ligne.</p>
            </div>
            
            <div style="background: var(--white); padding: 1.5rem; border-radius: 0.5rem;">
                <h4 style="color: var(--primary-blue); margin-bottom: 0.5rem;">J'ai un problème au travail, que faire ?</h4>
                <p style="color: var(--gray-600);">Contactez-nous immédiatement. Nous proposons un accompagnement juridique pour tous les salariés.</p>
            </div>
            
            <div style="background: var(--white); padding: 1.5rem; border-radius: 0.5rem;">
                <h4 style="color: var(--primary-blue); margin-bottom: 0.5rem;">Les permanences syndicales</h4>
                <p style="color: var(--gray-600);">Des permanences ont lieu régulièrement. Consultez votre espace membre pour les dates.</p>
            </div>
        </div>
    </div>
</div>

<style>
@media (max-width: 768px) {
    div[style*="grid-template-columns: 1fr 1fr"] {
        display: block !important;
    }
    
    div[style*="grid-template-columns: 1fr 1fr"] > div:first-child {
        margin-bottom: 2rem;
    }
}
</style>

<?php include_once 'includes/footer.php'; ?>
