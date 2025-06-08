
<?php
session_start();
include_once 'config/database.php';

header('Content-Type: application/json');

if ($_POST && isset($_POST['subscribe_newsletter'])) {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    
    if (!$email) {
        echo json_encode(['success' => false, 'message' => 'Adresse email invalide']);
        exit;
    }
    
    try {
        // Vérifier si l'email existe déjà
        $stmt = $pdo->prepare("SELECT id FROM newsletter WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->fetch()) {
            echo json_encode(['success' => false, 'message' => 'Cette adresse email est déjà inscrite']);
            exit;
        }
        
        // Insérer la nouvelle inscription
        $stmt = $pdo->prepare("INSERT INTO newsletter (email, date_inscription, actif) VALUES (?, NOW(), 1)");
        $stmt->execute([$email]);
        
        echo json_encode(['success' => true, 'message' => 'Inscription réussie']);
        
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'inscription']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Requête invalide']);
}
?>
