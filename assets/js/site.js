
// Gestion des cookies
document.addEventListener('DOMContentLoaded', function() {
    // Vérifier si l'utilisateur a déjà accepté les cookies
    if (!localStorage.getItem('cookiesAccepted')) {
        showCookieBanner();
    }

    // Afficher la popup newsletter après 10 secondes si pas déjà vue
    if (!localStorage.getItem('newsletterSeen')) {
        setTimeout(showNewsletterPopup, 10000);
    }

    // Gestion du bouton retour en haut
    setupBackToTop();
});

function showCookieBanner() {
    const banner = document.getElementById('cookieBanner');
    if (banner) {
        banner.classList.add('show');
    }
}

function acceptCookies() {
    localStorage.setItem('cookiesAccepted', 'true');
    hideCookieBanner();
}

function hideCookieBanner() {
    const banner = document.getElementById('cookieBanner');
    if (banner) {
        banner.classList.remove('show');
    }
}

function showNewsletterPopup() {
    const popup = document.getElementById('newsletterPopup');
    if (popup) {
        popup.classList.add('show');
        localStorage.setItem('newsletterSeen', 'true');
        
        // Ajouter l'événement pour fermer en cliquant à l'extérieur
        popup.addEventListener('click', function(e) {
            if (e.target === popup) {
                hideNewsletterPopup();
            }
        });
        
        // Fermer avec la touche Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && popup.classList.contains('show')) {
                hideNewsletterPopup();
            }
        });
    }
}

function hideNewsletterPopup() {
    const popup = document.getElementById('newsletterPopup');
    if (popup) {
        popup.classList.remove('show');
    }
}

// Fonction améliorée pour la soumission newsletter
function submitNewsletter(event) {
    event.preventDefault();
    
    const email = document.getElementById('newsletterEmail').value;
    const submitBtn = event.target.querySelector('button[type="submit"]');
    const messageContainer = document.getElementById('newsletterMessage');
    
    // Validation côté client
    if (!email || !email.includes('@')) {
        showNewsletterMessage('Veuillez entrer une adresse email valide.', 'error');
        return;
    }
    
    // État de chargement
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span style="opacity: 0.7;">⏳ Inscription...</span>';
    
    const formData = new FormData();
    formData.append('email', email);
    formData.append('subscribe_newsletter', '1');
    
    fetch('newsletter.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNewsletterMessage('🎉 Inscription réussie ! Merci de rejoindre notre communauté.', 'success');
            document.getElementById('newsletterEmail').value = '';
            
            // Fermer automatiquement après 2 secondes
            setTimeout(() => {
                hideNewsletterPopup();
            }, 2000);
        } else {
            showNewsletterMessage('❌ ' + data.message, 'error');
        }
    })
    .catch(error => {
        console.error('Erreur:', error);
        showNewsletterMessage('❌ Erreur lors de l\'inscription. Veuillez réessayer.', 'error');
    })
    .finally(() => {
        // Restaurer le bouton
        submitBtn.disabled = false;
        submitBtn.innerHTML = '📧 S\'inscrire maintenant';
    });
}

function showNewsletterMessage(message, type) {
    const messageContainer = document.getElementById('newsletterMessage');
    if (messageContainer) {
        messageContainer.className = `newsletter-message ${type}`;
        messageContainer.textContent = message;
        messageContainer.style.display = 'block';
        
        // Masquer le message après 5 secondes pour les erreurs
        if (type === 'error') {
            setTimeout(() => {
                messageContainer.style.display = 'none';
            }, 5000);
        }
    }
}

// Fonction pour afficher manuellement la popup (pour tests ou boutons)
function openNewsletterPopup() {
    showNewsletterPopup();
}
