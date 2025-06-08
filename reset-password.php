
<?php
session_start();
include_once 'config/database.php';

$error = '';
$success = '';
$step = isset($_GET['token']) ? 'reset' : 'request';

if ($_POST) {
    if (isset($_POST['request_reset'])) {
        // Demande de réinitialisation
        $email = $_POST['email'];
        
        $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if ($user) {
            // Générer un token unique
            $token = bin2hex(random_bytes(32));
            $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));
            
            // Enregistrer le token
            $stmt = $pdo->prepare("UPDATE utilisateurs SET reset_token = ?, reset_token_expires = ? WHERE email = ?");
            $stmt->execute([$token, $expires, $email]);
            
            // Ici, vous pourriez envoyer un email avec le lien
            // Pour le moment, on affiche le lien
            $reset_link = "http://" . $_SERVER['HTTP_HOST'] . "/reset-password.php?token=" . $token;
            $success = "Un lien de réinitialisation a été généré. Dans un vrai environnement, ce lien serait envoyé par email.<br><br>Lien de test: <a href='$reset_link'>$reset_link</a>";
        } else {
            $success = "Si un compte avec cet email existe, un lien de réinitialisation a été envoyé.";
        }
    } elseif (isset($_POST['reset_password'])) {
        // Réinitialisation du mot de passe
        $token = $_POST['token'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        
        if ($password !== $confirm_password) {
            $error = 'Les mots de passe ne correspondent pas';
        } elseif (strlen($password) < 6) {
            $error = 'Le mot de passe doit contenir au moins 6 caractères';
        } else {
            // Vérifier le token
            $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE reset_token = ? AND reset_token_expires > NOW()");
            $stmt->execute([$token]);
            $user = $stmt->fetch();
            
            if ($user) {
                // Mettre à jour le mot de passe
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("UPDATE utilisateurs SET password = ?, reset_token = NULL, reset_token_expires = NULL WHERE id = ?");
                
                if ($stmt->execute([$hashed_password, $user['id']])) {
                    $success = 'Votre mot de passe a été réinitialisé avec succès. Vous pouvez maintenant vous connecter.';
                    $step = 'success';
                } else {
                    $error = 'Erreur lors de la réinitialisation du mot de passe';
                }
            } else {
                $error = 'Token invalide ou expiré';
            }
        }
    }
}

include_once 'includes/header.php';
?>

<div class="auth-container">
    <div class="container">
        <div class="auth-wrapper">
            <?php if ($step === 'request'): ?>
                <div class="auth-form active">
                    <h2>Mot de passe oublié</h2>
                    <p>Entrez votre adresse email pour recevoir un lien de réinitialisation</p>
                    
                    <?php if ($error): ?>
                    <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
                    <?php endif; ?>

                    <?php if ($success): ?>
                    <div class="alert alert-success"><?= $success ?></div>
                    <?php endif; ?>
                    
                    <form method="POST">
                        <div class="form-group">
                            <label for="email">Adresse email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        
                        <button type="submit" name="request_reset" class="btn btn-primary">Envoyer le lien</button>
                    </form>
                    
                    <div style="text-align: center; margin-top: 1rem;">
                        <a href="login.php">Retour à la connexion</a>
                    </div>
                </div>
            
            <?php elseif ($step === 'reset'): ?>
                <div class="auth-form active">
                    <h2>Nouveau mot de passe</h2>
                    <p>Entrez votre nouveau mot de passe</p>
                    
                    <?php if ($error): ?>
                    <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
                    <?php endif; ?>

                    <?php if ($success): ?>
                    <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
                    <?php endif; ?>
                    
                    <form method="POST">
                        <input type="hidden" name="token" value="<?= htmlspecialchars($_GET['token']) ?>">
                        
                        <div class="form-group">
                            <label for="password">Nouveau mot de passe</label>
                            <input type="password" id="password" name="password" required minlength="6">
                        </div>
                        
                        <div class="form-group">
                            <label for="confirm_password">Confirmer le mot de passe</label>
                            <input type="password" id="confirm_password" name="confirm_password" required minlength="6">
                        </div>
                        
                        <button type="submit" name="reset_password" class="btn btn-primary">Réinitialiser</button>
                    </form>
                </div>
            
            <?php else: ?>
                <div class="auth-form active">
                    <h2>Mot de passe réinitialisé</h2>
                    <div class="alert alert-success">
                        Votre mot de passe a été réinitialisé avec succès !
                    </div>
                    <div style="text-align: center; margin-top: 1rem;">
                        <a href="login.php" class="btn btn-primary">Se connecter</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
/* Réutilisation des styles de login.php */
.auth-container {
    min-height: 80vh;
    padding: 2rem 0;
    background: var(--gray-50);
    display: flex;
    align-items: center;
}

.auth-wrapper {
    max-width: 500px;
    margin: 0 auto;
    background: var(--white);
    border-radius: 1rem;
    padding: 2rem;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.auth-form h2 {
    margin-bottom: 0.5rem;
    color: var(--gray-900);
}

.auth-form p {
    color: var(--gray-600);
    margin-bottom: 2rem;
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

.form-group input:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
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
    .auth-wrapper {
        margin: 1rem;
        padding: 1.5rem;
    }
}
</style>

<?php include_once 'includes/footer.php'; ?>
