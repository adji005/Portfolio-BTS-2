// Simple : Navigation qui change de couleur quand on scroll
document.addEventListener('DOMContentLoaded', function() {
    
    // Récupère tous les liens de navigation
    const liens = document.querySelectorAll('.nav-link');
    
    // Quand on scroll sur la page
    window.addEventListener('scroll', function() {
        
        // Enlève la couleur de tous les liens
        liens.forEach(lien => {
            lien.classList.remove('nvcolor');
        });
        
        // Vérifie où on est sur la page et colore le bon lien
        const position = window.scrollY;
        
        if (position < 600) {
            //  Accueil
            document.querySelector('a[href="#accueil"]').classList.add('nvcolor');
        } else if (position >= 600 && position < 1200) {
            //  À propos
            document.querySelector('a[href="#apropos"]').classList.add('nvcolor');
        } else if (position >= 1200 && position < 3800) {
            //  Projets
            document.querySelector('a[href="#myCarousel"]').classList.add('nvcolor');
        } else if (position >= 7000 && position < 8000) {
            // Épreuve E4
            document.querySelector('a[href="#epreuve"]').classList.add('nvcolor');
        } else if (position >= 9000 && position < 100000) {
            // Veille
            document.querySelector('a[href="#veille"]').classList.add('nvcolor');
        } else {
            // reste donc contact 
            document.querySelector('a[href="#contact"]').classList.add('nvcolor');
        }
    });
    
});
