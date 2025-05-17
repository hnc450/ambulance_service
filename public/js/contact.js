// contact.js

// Fonction pour basculer l'affichage des réponses FAQ
function toggleFaq(element) {
    const faqItem = element.closest('.faq-item');
    
    // Vérifier si l'élément est déjà actif
    const isActive = faqItem.classList.contains('active');
    
    // Fermer tous les éléments actifs
    const allFaqItems = document.querySelectorAll('.faq-item');
    allFaqItems.forEach(item => {
        item.classList.remove('active');
    });
    
    // Si l'élément n'était pas actif, l'ouvrir
    if (!isActive) {
        faqItem.classList.add('active');
    }
}

// Fonction pour gérer la soumission du formulaire
function handleFormSubmit(event) {
    event.preventDefault();
    
    // Récupérer les données du formulaire
    const formData = {
        nom: document.getElementById('nom').value,
        prenom: document.getElementById('prenom').value,
        email: document.getElementById('email').value,
        telephone: document.getElementById('telephone').value,
        sujet: document.getElementById('sujet').value,
        message: document.getElementById('message').value,
        consentement: document.getElementById('consentement').checked
    };
    
    // Valider les données
    if (!formData.nom || !formData.prenom || !formData.email || !formData.telephone || !formData.sujet || !formData.message || !formData.consentement) {
        alert('Veuillez remplir tous les champs obligatoires.');
        return;
    }
    
    // Simuler l'envoi des données au serveur
    console.log('Données du formulaire:', formData);
    
    // Afficher le message de succès
    document.getElementById('contactForm').style.display = 'none';
    document.getElementById('formSuccess').style.display = 'block';
    
    // Réinitialiser le formulaire
    document.getElementById('contactForm').reset();
}

// Initialisation
document.addEventListener('DOMContentLoaded', function() {
    // Ajouter l'écouteur d'événement pour la soumission du formulaire
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', handleFormSubmit);
    }
});