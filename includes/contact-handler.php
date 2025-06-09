
<?php
// Traitement du formulaire de contact
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
?>
