// tarifs.js

// Fonction pour calculer le prix estimé
function calculatePrice() {
    // Récupérer les valeurs du formulaire
    const serviceType = document.getElementById('serviceType').value;
    const distance = parseInt(document.getElementById('distance').value) || 0;
    const oxygen = document.getElementById('oxygen').checked;
    const medicalTeam = document.getElementById('medicalTeam').checked;
    const waitingTime = document.getElementById('waitingTime').checked;
    
    // Tarifs de base
    const basePrices = {
        'urgence': 25000,
        'transport': 20000
    };
    
    // Tarifs kilométriques
    const kmPrices = {
        'urgence': 1000,
        'transport': 800
    };
    
    // Calculer le prix de base
    let totalPrice = basePrices[serviceType];
    
    // Ajouter le prix kilométrique (moins 5 km inclus dans le prix de base)
    const extraKm = Math.max(0, distance - 5);
    totalPrice += extraKm * kmPrices[serviceType];
    
    // Ajouter les options supplémentaires
    if (oxygen) {
        totalPrice += 5000;
    }
    
    if (medicalTeam) {
        totalPrice += 15000;
    }
    
    if (waitingTime) {
        totalPrice += 5000;
    }
    
    // Afficher le résultat
    document.getElementById('estimatedPrice').textContent = totalPrice.toLocaleString();
    
    // Afficher la boîte de résultat
    document.getElementById('calculatorResult').style.display = 'block';
}

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

// Initialisation
document.addEventListener('DOMContentLoaded', function() {
    // Masquer la boîte de résultat au chargement
    const calculatorResult = document.getElementById('calculatorResult');
    if (calculatorResult) {
        calculatorResult.style.display = 'none';
    }
});