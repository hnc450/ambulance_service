// suivi.js

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

// Fonction pour gérer la soumission du formulaire de suivi
function handleTrackingSubmit(event) {
    event.preventDefault();
    
    // Récupérer le numéro de suivi
    const trackingNumber = document.getElementById('trackingNumber').value.trim();
    
    // Vérifier si le numéro de suivi est valide
    if (!trackingNumber) {
        alert('Veuillez entrer un numéro de suivi valide.');
        return;
    }
    
    // Simuler une recherche de commande
    if (trackingNumber.toUpperCase() === 'AMB-12345' || trackingNumber.toUpperCase() === '12345') {
        // Afficher les détails de la commande
        document.getElementById('trackingResult').style.display = 'block';
        document.getElementById('trackingNotFound').style.display = 'none';
        document.getElementById('orderNumber').textContent = 'AMB-12345';
        
        // Simuler une mise à jour en temps réel
        startLiveTracking();
    } else {
        // Afficher le message "commande introuvable"
        document.getElementById('trackingResult').style.display = 'none';
        document.getElementById('trackingNotFound').style.display = 'block';
    }
}

// Fonction pour réinitialiser le formulaire de suivi
function resetTracking() {
    document.getElementById('trackingForm').reset();
    document.getElementById('trackingResult').style.display = 'none';
    document.getElementById('trackingNotFound').style.display = 'none';
}

// Fonction pour simuler le suivi en temps réel
function startLiveTracking() {
    // Simuler un changement d'état après quelques secondes
    setTimeout(() => {
        // Mettre à jour le statut
        document.getElementById('statusBadge').textContent = 'Arrivée sur place';
        document.getElementById('statusBadge').style.backgroundColor = 'rgba(76, 175, 80, 0.1)';
        document.getElementById('statusBadge').style.color = 'var(--success)';
        
        // Mettre à jour les étapes
        document.getElementById('stepEnRoute').classList.remove('active');
        document.getElementById('stepEnRoute').classList.add('completed');
        document.getElementById('stepArrived').classList.add('active');
        
        // Mettre à jour l'heure d'arrivée
        const now = new Date();
        const timeString = `${now.getDate()} Mars, ${now.getHours()}:${now.getMinutes().toString().padStart(2, '0')}`;
        document.getElementById('timeArrived').textContent = timeString;
        
        // Mettre à jour les informations de la carte
        document.getElementById('eta').textContent = 'Arrivé';
        document.getElementById('remainingDistance').textContent = '0 km';
        
        // Simuler la fin du service après quelques secondes supplémentaires
        setTimeout(() => {
            // Mettre à jour le statut
            document.getElementById('statusBadge').textContent = 'Service terminé';
            
            // Mettre à jour les étapes
            document.getElementById('stepArrived').classList.remove('active');
            document.getElementById('stepArrived').classList.add('completed');
            document.getElementById('stepCompleted').classList.add('active');
            document.getElementById('stepCompleted').classList.add('completed');
            
            // Mettre à jour l'heure de fin
            const now = new Date();
            const timeString = `${now.getDate()} Mars, ${now.getHours()}:${(now.getMinutes() + 5).toString().padStart(2, '0')}`;
            document.getElementById('timeCompleted').textContent = timeString;
        }, 10000);
    }, 5000);
}

// suivi.js

// Variables globales pour la carte et le suivi
let map;
let routingControl;
let ambulanceMarker;
let routeCoordinates = [];
let simulationInterval;

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

// Fonction pour initialiser la carte
function initMap() {
    // Créer la carte centrée sur Kinshasa
    map = L.map('liveMap').setView([-4.441931, 15.266293], 13);
    
    // Ajouter les tuiles OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    // Créer l'icône personnalisée pour l'ambulance
    const ambulanceIcon = L.divIcon({
        html: '<i class="fas fa-ambulance ambulance-icon" style="color: red; font-size: 24px;"></i>',
        iconSize: [24, 24],
        className: 'ambulance-marker'
    });
    
    // Ajouter un marqueur pour l'ambulance (position initiale)
    ambulanceMarker = L.marker([-4.441931, 15.266293], {
        icon: ambulanceIcon
    }).addTo(map);
}

// Fonction pour calculer et afficher l'itinéraire
function calculateRoute(startPoint, endPoint) {
    // Supprimer l'ancien itinéraire s'il existe
    if (routingControl) {
        map.removeControl(routingControl);
    }
    
    // Créer un nouveau contrôle d'itinéraire
    routingControl = L.Routing.control({
        waypoints: [
            L.latLng(startPoint[0], startPoint[1]),
            L.latLng(endPoint[0], endPoint[1])
        ],
        routeWhileDragging: false,
        showAlternatives: false,
        fitSelectedRoutes: true,
        lineOptions: {
            styles: [
                {color: '#2196f3', opacity: 0.8, weight: 6}
            ]
        },
        createMarker: function(i, waypoint, n) {
            // Ne pas créer de marqueurs pour les points de départ et d'arrivée
            if (i === 0) {
                return L.marker(waypoint.latLng, {
                    icon: L.divIcon({
                        html: '<i class="fas fa-home" style="color: #2196f3; font-size: 20px;"></i>',
                        iconSize: [20, 20],
                        className: 'start-marker'
                    })
                });
            } else if (i === n - 1) {
                return L.marker(waypoint.latLng, {
                    icon: L.divIcon({
                        html: '<i class="fas fa-hospital" style="color: #f44336; font-size: 20px;"></i>',
                        iconSize: [20, 20],
                        className: 'end-marker'
                    })
                });
            }
            return null;
        }
    }).addTo(map);
    
    // Récupérer les coordonnées de l'itinéraire une fois calculé
    routingControl.on('routesfound', function(e) {
        const routes = e.routes;
        const summary = routes[0].summary;
        
        // Mettre à jour les informations de distance et de temps
        document.getElementById('remainingDistance').textContent = (summary.totalDistance / 1000).toFixed(1) + ' km';
        document.getElementById('eta').textContent = Math.ceil(summary.totalTime / 60) + ' minutes';
        
        // Stocker les coordonnées de l'itinéraire pour la simulation
        routeCoordinates = routes[0].coordinates;
        
        // Démarrer la simulation du déplacement de l'ambulance
        startAmbulanceSimulation();
    });
}

// Fonction pour simuler le déplacement de l'ambulance le long de l'itinéraire
function startAmbulanceSimulation() {
    // Arrêter toute simulation en cours
    if (simulationInterval) {
        clearInterval(simulationInterval);
    }
    
    // Vérifier qu'il y a des coordonnées d'itinéraire
    if (routeCoordinates.length === 0) {
        console.error("Pas de coordonnées d'itinéraire disponibles");
        return;
    }
    
    let currentStep = 0;
    const totalSteps = routeCoordinates.length;
    
    // Placer l'ambulance au début de l'itinéraire
    ambulanceMarker.setLatLng(routeCoordinates[0]);
    
    // Déplacer l'ambulance le long de l'itinéraire
    simulationInterval = setInterval(() => {
        // Avancer d'une étape
        currentStep++;
        
        // Si on a atteint la fin de l'itinéraire
        if (currentStep >= totalSteps) {
            clearInterval(simulationInterval);
            
            // Mettre à jour le statut à "Arrivée sur place"
            document.getElementById('statusBadge').textContent = 'Arrivée sur place';
            document.getElementById('statusBadge').style.backgroundColor = 'rgba(76, 175, 80, 0.1)';
            document.getElementById('statusBadge').style.color = 'var(--success)';
            
            // Mettre à jour les étapes de progression
            document.getElementById('stepEnRoute').classList.remove('active');
            document.getElementById('stepEnRoute').classList.add('completed');
            document.getElementById('stepArrived').classList.add('active');
            
            // Mettre à jour l'heure d'arrivée
            const now = new Date();
            const timeString = `${now.getDate()} Mars, ${now.getHours()}:${now.getMinutes().toString().padStart(2, '0')}`;
            document.getElementById('timeArrived').textContent = timeString;
            
            // Mettre à jour les informations de la carte
            document.getElementById('eta').textContent = 'Arrivé';
            document.getElementById('remainingDistance').textContent = '0 km';
            
            // Simuler la fin du service après quelques secondes
            setTimeout(() => {
                // Mettre à jour le statut
                document.getElementById('statusBadge').textContent = 'Service terminé';
                
                // Mettre à jour les étapes
                document.getElementById('stepArrived').classList.remove('active');
                document.getElementById('stepArrived').classList.add('completed');
                document.getElementById('stepCompleted').classList.add('active');
                document.getElementById('stepCompleted').classList.add('completed');
                
                // Mettre à jour l'heure de fin
                const now = new Date();
                const timeString = `${now.getDate()} Mars, ${now.getHours()}:${(now.getMinutes() + 5).toString().padStart(2, '0')}`;
                document.getElementById('timeCompleted').textContent = timeString;
            }, 10000);
            
            return;
        }
        
        // Déplacer l'ambulance à la position suivante
        ambulanceMarker.setLatLng(routeCoordinates[currentStep]);
        
        // Calculer la distance restante et le temps estimé
        const remainingSteps = totalSteps - currentStep;
        const remainingDistance = (remainingSteps * 0.01).toFixed(1); // Approximation simplifiée
        const remainingTime = Math.ceil(remainingSteps / 10); // Approximation simplifiée
        
        // Mettre à jour les informations
        document.getElementById('remainingDistance').textContent = remainingDistance + ' km';
        document.getElementById('eta').textContent = remainingTime + ' minutes';
    }, 800); // Intervalle de temps pour le déplacement
}

// Fonction pour gérer la soumission du formulaire de suivi
function handleTrackingSubmit(event) {
    event.preventDefault();
    
    // Récupérer le numéro de suivi
    const trackingNumber = document.getElementById('trackingNumber').value.trim();
    
    // Vérifier si le numéro de suivi est valide
    if (!trackingNumber) {
        alert('Veuillez entrer un numéro de suivi valide.');
        return;
    }
    
    // Simuler une recherche de commande
    if (trackingNumber.toUpperCase() === 'AMB-12345' || trackingNumber.toUpperCase() === '12345') {
        // Afficher les détails de la commande
        document.getElementById('trackingResult').style.display = 'block';
        document.getElementById('trackingNotFound').style.display = 'none';
        document.getElementById('orderNumber').textContent = 'AMB-12345';
        
        // Initialiser la carte si elle n'existe pas encore
        if (!map) {
            initMap();
        }
        
        // Définir les points de départ et d'arrivée (coordonnées de Kinshasa pour l'exemple)
        const startPoint = [-4.441931, 15.266293]; // Point de départ (adresse de prise en charge)
        const endPoint = [-4.431931, 15.276293];   // Point d'arrivée (destination)
        
        // Calculer et afficher l'itinéraire
        calculateRoute(startPoint, endPoint);
    } else {
        // Afficher le message "commande introuvable"
        document.getElementById('trackingResult').style.display = 'none';
        document.getElementById('trackingNotFound').style.display = 'block';
    }
}

// Fonction pour réinitialiser le formulaire de suivi
function resetTracking() {
    document.getElementById('trackingForm').reset();
    document.getElementById('trackingResult').style.display = 'none';
    document.getElementById('trackingNotFound').style.display = 'none';
    
    // Arrêter la simulation si elle est en cours
    if (simulationInterval) {
        clearInterval(simulationInterval);
    }
    
    // Réinitialiser la carte si elle existe
    if (map) {
        if (routingControl) {
            map.removeControl(routingControl);
        }
        if (ambulanceMarker) {
            map.removeLayer(ambulanceMarker);
        }
    }
}

// Initialisation
document.addEventListener('DOMContentLoaded', function() {
    // Ajouter l'écouteur d'événement pour la soumission du formulaire
    const trackingForm = document.getElementById('trackingForm');
    if (trackingForm) {
        trackingForm.addEventListener('submit', handleTrackingSubmit);
    }
    
    // Mettre à jour l'année actuelle dans le footer
    const currentYearElement = document.getElementById('currentYear');
    if (currentYearElement) {
        currentYearElement.textContent = new Date().getFullYear();
    }
});

// Initialisation
document.addEventListener('DOMContentLoaded', function() {
    // Ajouter l'écouteur d'événement pour la soumission du formulaire
    const trackingForm = document.getElementById('trackingForm');
    if (trackingForm) {
        trackingForm.addEventListener('submit', handleTrackingSubmit);
    }
});