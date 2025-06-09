
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
