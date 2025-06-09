
<div class="contact-form">
    <div class="contact-form-header">
        <h3>📩 Envoyez-nous un message</h3>
        <p>Nous vous répondrons dans les plus brefs délais</p>
    </div>
    
    <?php if ($success): ?>
    <div class="alert alert-success">
        <div class="alert-icon">✅</div>
        <div class="alert-content"><?= $success ?></div>
    </div>
    <?php endif; ?>

    <?php if ($error): ?>
    <div class="alert alert-error">
        <div class="alert-icon">❌</div>
        <div class="alert-content"><?= $error ?></div>
    </div>
    <?php endif; ?>

    <form method="POST" class="contact-form-grid">
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
                <option value="information" <?= (isset($_POST['type_demande']) && $_POST['type_demande'] === 'information') ? 'selected' : '' ?>>💡 Demande d'information</option>
                <option value="adhesion" <?= (isset($_POST['type_demande']) && $_POST['type_demande'] === 'adhesion') ? 'selected' : '' ?>>🤝 Adhésion au syndicat</option>
                <option value="conseil" <?= (isset($_POST['type_demande']) && $_POST['type_demande'] === 'conseil') ? 'selected' : '' ?>>⚖️ Conseil juridique</option>
                <option value="reclamation" <?= (isset($_POST['type_demande']) && $_POST['type_demande'] === 'reclamation') ? 'selected' : '' ?>>📝 Réclamation</option>
                <option value="autre" <?= (isset($_POST['type_demande']) && $_POST['type_demande'] === 'autre') ? 'selected' : '' ?>>❓ Autre</option>
            </select>
        </div>

        <div class="form-group">
            <label for="sujet">Sujet *</label>
            <input type="text" id="sujet" name="sujet" required value="<?= isset($_POST['sujet']) ? htmlspecialchars($_POST['sujet']) : '' ?>" placeholder="Résumez votre demande en quelques mots">
        </div>

        <div class="form-group">
            <label for="message">Message *</label>
            <textarea id="message" name="message" required placeholder="Décrivez votre demande en détail. Plus vous serez précis, mieux nous pourrons vous aider."><?= isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '' ?></textarea>
        </div>

        <button type="submit" name="send_message" class="btn btn-primary btn-contact-submit">
            <span class="btn-icon">📤</span>
            <span>Envoyer le message</span>
        </button>
    </form>
</div>
