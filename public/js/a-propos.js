// a-propos.js

// Variables globales
let currentTestimonial = 0;
const totalTestimonials = 3;

// Fonction pour afficher un témoignage spécifique
function showTestimonial(index) {
    // Masquer tous les témoignages
    const testimonials = document.querySelectorAll('.testimonial-slide');
    testimonials.forEach(testimonial => {
        testimonial.classList.remove('active');
    });
    
    // Afficher le témoignage demandé
    testimonials[index].classList.add('active');
    
    // Mettre à jour les points de navigation
    const dots = document.querySelectorAll('.dot');
    dots.forEach((dot, i) => {
        if (i === index) {
            dot.classList.add('active');
        } else {
            dot.classList.remove('active');
        }
    });
    
    // Mettre à jour l'index courant
    currentTestimonial = index;
}

// Fonction pour afficher le témoignage suivant
function nextTestimonial() {
    let nextIndex = currentTestimonial + 1;
    if (nextIndex >= totalTestimonials) {
        nextIndex = 0;
    }
    showTestimonial(nextIndex);
}

// Fonction pour afficher le témoignage précédent
function prevTestimonial() {
    let prevIndex = currentTestimonial - 1;
    if (prevIndex < 0) {
        prevIndex = totalTestimonials - 1;
    }
    showTestimonial(prevIndex);
}

// Initialisation
document.addEventListener('DOMContentLoaded', function() {
    // Démarrer le carrousel automatique
    setInterval(nextTestimonial, 5000);
});