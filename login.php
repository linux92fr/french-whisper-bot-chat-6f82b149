
<?php
session_start();
include_once 'config/database.php';

$error = '';
$success = '';

if ($_POST) {
    if (isset($_POST['login'])) {
        // Connexion
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];
            header('Location: mon-compte.php');
            exit;
        } else {
            $error = 'Email ou mot de passe incorrect';
        }
    } elseif (isset($_POST['register'])) {
        // Inscription
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        // Vérifier si l'email existe déjà
        $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->fetch()) {
            $error = 'Cet email est déjà utilisé';
        } else {
            $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, prenom, email, password, role) VALUES (?, ?, ?, ?, 'membre')");
            if ($stmt->execute([$nom, $prenom, $email, $password])) {
                $success = 'Inscription réussie ! Vous pouvez maintenant vous connecter.';
            } else {
                $error = 'Erreur lors de l\'inscription';
            }
        }
    }
}

include_once 'includes/header.php';
?>

<div class="auth-container">
    <div class="container">
        <div class="auth-wrapper">
            <div class="auth-tabs">
                <button class="tab-btn active" onclick="showTab('login')">Connexion</button>
                <button class="tab-btn" onclick="showTab('register')">Inscription</button>
            </div>

            <?php if ($error): ?>
            <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <?php if ($success): ?>
            <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
            <?php endif; ?>

            <!-- Formulaire de connexion -->
            <div id="login-form" class="auth-form active">
                <h2>Connexion</h2>
                <p>Accédez à votre espace membre</p>
                
                <form method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    
                    <button type="submit" name="login" class="btn btn-primary">Se connecter</button>
                </form>
            </div>

            <!-- Formulaire d'inscription -->
            <div id="register-form" class="auth-form">
                <h2>Inscription</h2>
                <p>Créez votre compte membre</p>
                
                <form method="POST">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" id="prenom" name="prenom" required>
                        </div>
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" name="nom" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="register-email">Email</label>
                        <input type="email" id="register-email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="register-password">Mot de passe</label>
                        <input type="password" id="register-password" name="password" required minlength="6">
                    </div>
                    
                    <button type="submit" name="register" class="btn btn-primary">S'inscrire</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
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

.auth-tabs {
    display: flex;
    margin-bottom: 2rem;
    border-bottom: 1px solid var(--gray-200);
}

.tab-btn {
    flex: 1;
    padding: 1rem;
    border: none;
    background: transparent;
    cursor: pointer;
    border-bottom: 3px solid transparent;
    transition: all 0.3s;
}

.tab-btn.active {
    border-bottom-color: var(--primary);
    color: var(--primary);
    font-weight: 600;
}

.auth-form {
    display: none;
}

.auth-form.active {
    display: block;
}

.auth-form h2 {
    margin-bottom: 0.5rem;
    color: var(--gray-900);
}

.auth-form p {
    color: var(--gray-600);
    margin-bottom: 2rem;
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
    .form-row {
        grid-template-columns: 1fr;
    }
    
    .auth-wrapper {
        margin: 1rem;
        padding: 1.5rem;
    }
}
</style>

<script>
function showTab(tabName) {
    // Cacher tous les formulaires
    document.querySelectorAll('.auth-form').forEach(form => {
        form.classList.remove('active');
    });
    
    // Désactiver tous les boutons
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    
    // Afficher le formulaire sélectionné
    document.getElementById(tabName + '-form').classList.add('active');
    
    // Activer le bouton correspondant
    event.target.classList.add('active');
}
</script>

<?php include_once 'includes/footer.php'; ?>
