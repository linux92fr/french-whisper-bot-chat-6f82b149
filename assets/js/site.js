
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
    const progressTracker = document.querySelector('.back-to-top__progress-svg .tracker');
    
    if (backToTop) {
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrollPercentage = (scrollTop / scrollHeight) * 100;
            
            // Afficher le bouton après 300px de scroll
            if (scrollTop > 300) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
            
            // Mettre à jour la barre de progression circulaire
            if (progressTracker) {
                const circumference = 314; // 2 * π * r (r = 50)
                const offset = circumference - (scrollPercentage / 100) * circumference;
                progressTracker.style.strokeDashoffset = offset;
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
