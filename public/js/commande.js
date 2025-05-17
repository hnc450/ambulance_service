// commande.js

// Variables globales
let currentStep = 1;
let formData = {
    nom: '',
    prenom: '',
    telephone: '',
    email: '',
    typeUrgence: 'medical',
    description: '',
    adresseDepart: '',
    adresseArrivee: '',
    dateHeure: '',
    paiement: 'cash',
    telephonePaiement: ''
};

// Initialisation
document.addEventListener('DOMContentLoaded', function() {
    // Initialiser les écouteurs d'événements
    initEventListeners();
    
    // Mettre à jour le résumé de la commande
    updateOrderSummary();
});

// Initialiser les écouteurs d'événements
function initEventListeners() {
    // Formulaire d'informations
    const infoForm = document.getElementById('infoForm');
    if (infoForm) {
        const inputs = infoForm.querySelectorAll('input, textarea');
        inputs.forEach(input => {
            input.addEventListener('change', function() {
                formData[input.name] = input.value;
            });
        });
        
        const radioButtons = infoForm.querySelectorAll('input[type="radio"]');
        radioButtons.forEach(radio => {
            radio.addEventListener('change', function() {
                if (radio.checked) {
                    formData.typeUrgence = radio.value;
                }
            });
        });
    }
    
    // Formulaire de localisation
    const localisationForm = document.getElementById('localisationForm');
    if (localisationForm) {
        const inputs = localisationForm.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('change', function() {
                formData[input.name] = input.value;
                updateOrderSummary();
            });
        });
    }
    
    // Formulaire de paiement
    const paiementForm = document.getElementById('paiementForm');
    if (paiementForm) {
        const telephonePaiement = document.getElementById('telephonePaiement');
        if (telephonePaiement) {
            telephonePaiement.addEventListener('change', function() {
                formData.telephonePaiement = telephonePaiement.value;
            });
        }
    }
}

// Passer à l'étape suivante
function nextStep(step) {
    // Valider l'étape actuelle
    if (!validateStep(currentStep)) {
        return;
    }
    
    // Masquer l'étape actuelle
    document.getElementById(`step${currentStep}`).classList.remove('active');
    
    // Marquer l'étape actuelle comme complétée
    const currentStepElement = document.querySelector(`.step[data-step="${currentStep}"]`);
    currentStepElement.classList.remove('active');
    currentStepElement.classList.add('completed');
    
    // Mettre à jour l'étape actuelle
    currentStep = step;
    
    // Afficher la nouvelle étape
    document.getElementById(`step${currentStep}`).classList.add('active');
    
    // Marquer la nouvelle étape comme active
    const newStepElement = document.querySelector(`.step[data-step="${currentStep}"]`);
    newStepElement.classList.add('active');
    
    // Mettre à jour les lignes de progression
    updateProgressLines();
    
    // Si c'est l'étape de paiement, mettre à jour le résumé de la commande
    if (currentStep === 3) {
        updateOrderSummary();
    }
    
    // Faire défiler vers le haut
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Revenir à l'étape précédente
function prevStep(step) {
    // Masquer l'étape actuelle
    document.getElementById(`step${currentStep}`).classList.remove('active');
    
    // Démarquer l'étape actuelle
    const currentStepElement = document.querySelector(`.step[data-step="${currentStep}"]`);
    currentStepElement.classList.remove('active');
    
    // Mettre à jour l'étape actuelle
    currentStep = step;
    
    // Afficher la nouvelle étape
    document.getElementById(`step${currentStep}`).classList.add('active');
    
    // Marquer la nouvelle étape comme active
    const newStepElement = document.querySelector(`.step[data-step="${currentStep}"]`);
    newStepElement.classList.add('active');
    newStepElement.classList.remove('completed');
    
    // Mettre à jour les lignes de progression
    updateProgressLines();
    
    // Faire défiler vers le haut
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Mettre à jour les lignes de progression
function updateProgressLines() {
    const stepLines = document.querySelectorAll('.step-line');
    stepLines.forEach((line, index) => {
        if (index < currentStep - 1) {
            line.classList.add('active');
        } else {
            line.classList.remove('active');
        }
    });
}

// Valider l'étape actuelle
function validateStep(step) {
    switch (step) {
        case 1:
            // Valider les informations personnelles
            const nom = document.getElementById('nom').value;
            const prenom = document.getElementById('prenom').value;
            const telephone = document.getElementById('telephone').value;
            
            if (!nom || !prenom || !telephone) {
                alert('Veuillez remplir tous les champs obligatoires.');
                return false;
            }
            return true;
            
        case 2:
            // Valider la localisation
            const adresseDepart = document.getElementById('adresseDepart').value;
            
            if (!adresseDepart) {
                alert('Veuillez entrer une adresse de départ.');
                return false;
            }
            return true;
            
        case 3:
            // Valider le paiement
            const paiement = document.querySelector('input[name="paiement"]:checked').value;
            const telephonePaiement = document.getElementById('telephonePaiement').value;
            
            if (paiement !== 'cash' && paiement !== 'card' && !telephonePaiement) {
                alert('Veuillez entrer un numéro de téléphone pour le paiement mobile.');
                return false;
            }
            return true;
            
        default:
            return true;
    }
}

// Mettre à jour le résumé de la commande
function updateOrderSummary() {
    const summaryUrgence = document.getElementById('summaryUrgence');
    const summaryDepart = document.getElementById('summaryDepart');
    const summaryArrivee = document.getElementById('summaryArrivee');
    const summaryArriveeContainer = document.getElementById('summaryArriveeContainer');
    
    if (summaryUrgence) {
        summaryUrgence.textContent = formData.typeUrgence;
    }
    
    if (summaryDepart) {
        summaryDepart.textContent = formData.adresseDepart || 'Non spécifiée';
    }
    
    if (summaryArrivee && summaryArriveeContainer) {
        if (formData.adresseArrivee) {
            summaryArrivee.textContent = formData.adresseArrivee;
            summaryArriveeContainer.style.display = 'flex';
        } else {
            summaryArriveeContainer.style.display = 'none';
        }
    }
}

// Sélectionner une méthode de paiement
function selectPayment(method) {
    // Mettre à jour la valeur du formulaire
    document.querySelector(`input[value="${method}"]`).checked = true;
    formData.paiement = method;
    
    // Mettre à jour l'affichage
    const paymentOptions = document.querySelectorAll('.payment-option');
    paymentOptions.forEach(option => {
        option.classList.remove('selected');
    });
    
    const selectedOption = document.querySelector(`input[value="${method}"]`).closest('.payment-option');
    selectedOption.classList.add('selected');
    
    // Afficher/masquer le champ de téléphone pour les paiements mobiles
    const mobilePaymentGroup = document.getElementById('mobilePaymentGroup');
    if (method === 'mpesa' || method === 'orange' || method === 'airtel') {
        mobilePaymentGroup.style.display = 'block';
    } else {
        mobilePaymentGroup.style.display = 'none';
    }
}

// Soumettre la commande
function submitOrder() {
    // Valider l'étape actuelle
    if (!validateStep(currentStep)) {
        return;
    }
    
    // Simuler l'envoi des données au serveur
    console.log('Données de la commande:', formData);
    
    // Mettre à jour le nom dans la confirmation
    const confirmationName = document.getElementById('confirmationName');
    if (confirmationName) {
        confirmationName.textContent = formData.prenom;
    }
    
    // Passer à l'étape de confirmation
    nextStep(4);
}

// Utiliser la géolocalisation pour l'adresse de départ
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function(position) {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;
                const adresseDepart = `${lat}, ${lon}`;
                
                document.getElementById('adresseDepart').value = adresseDepart;
                formData.adresseDepart = adresseDepart;
                updateOrderSummary();
                
                alert('Position récupérée avec succès !');
            },
            function(error) {
                alert('Impossible de récupérer votre position. Assurez-vous que la géolocalisation est activée.');
                console.error('Erreur de géolocalisation:', error);
            }
        );
    } else {
        alert('La géolocalisation n\'est pas supportée par votre navigateur.');
    }
}