
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
    }
}

function hideNewsletterPopup() {
    const popup = document.getElementById('newsletterPopup');
    if (popup) {
        popup.classList.remove('show');
    }
}

function setupBackToTop() {
    const backToTop = document.getElementById('backToTop');
    
    if (backToTop) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });
    }
}

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Soumission newsletter
function submitNewsletter(event) {
    event.preventDefault();
    
    const email = document.getElementById('newsletterEmail').value;
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
            alert('Inscription à la newsletter réussie !');
            hideNewsletterPopup();
        } else {
            alert('Erreur : ' + data.message);
        }
    })
    .catch(error => {
        console.error('Erreur:', error);
        alert('Erreur lors de l\'inscription');
    });
}
