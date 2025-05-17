// Variables globales
let map, resultMap, trackingMap, largeMap;
let startMarker, endMarker, ambulanceMarker;
let routingControl;
let currentStep = 1;
let selectedPaymentMethod = 'cash';
let countdown;
let ambulanceRoute = [];
let simulationInterval;

// Prix par kilomètre (en FC)
const PRICE_PER_KM = 5000;

// Initialisation quand le DOM est chargé
document.addEventListener('DOMContentLoaded', function() {
    // Initialiser les cartes
    initializeMaps();
    
    // Mettre à jour l'année dans le footer
    document.getElementById('currentYear').textContent = new Date().getFullYear();
    
    // Afficher l'étape 1 par défaut
    showStep(1);
});

// Initialisation des cartes
function initializeMaps() {
    // Carte de l'étape 1 (saisie des adresses)
    map = L.map('map').setView([-4.3217, 15.3125], 13); // Kinshasa par défaut
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    // Ajouter des événements de clic sur la carte
    map.on('click', function(e) {
        const activeInput = document.activeElement;
        if (activeInput && (activeInput.id === 'start' || activeInput.id === 'end')) {
            // Obtenir l'adresse à partir des coordonnées (reverse geocoding)
            reverseGeocode(e.latlng, function(address) {
                activeInput.value = address;
                
                // Ajouter un marqueur
                if (activeInput.id === 'start') {
                    if (startMarker) map.removeLayer(startMarker);
                    startMarker = L.marker(e.latlng).addTo(map);
                } else {
                    if (endMarker) map.removeLayer(endMarker);
                    endMarker = L.marker(e.latlng).addTo(map);
                }
            });
        }
    });
}

// Fonction pour obtenir la géolocalisation de l'utilisateur
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            const lat = position.coords.latitude;
            const lng = position.coords.longitude;
            
            // Centrer la carte sur la position actuelle
            map.setView([lat, lng], 15);
            
            // Ajouter un marqueur
            if (startMarker) map.removeLayer(startMarker);
            startMarker = L.marker([lat, lng]).addTo(map);
            
            // Obtenir l'adresse à partir des coordonnées
            reverseGeocode({lat: lat, lng: lng}, function(address) {
                document.getElementById('start').value = address;
            });
        }, function(error) {
            alert("Erreur de géolocalisation: " + error.message);
        });
    } else {
        alert("La géolocalisation n'est pas prise en charge par ce navigateur.");
    }
}

// Fonction pour faire du reverse geocoding (coordonnées -> adresse)
function reverseGeocode(latlng, callback) {
    // Utiliser Nominatim OpenStreetMap pour le reverse geocoding
    const url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latlng.lat}&lon=${latlng.lng}&addressdetails=1`;
    
    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data && data.display_name) {
                callback(data.display_name);
            } else {
                callback("Adresse inconnue");
            }
        })
        .catch(error => {
            console.error("Erreur de reverse geocoding:", error);
            callback("Erreur lors de la récupération de l'adresse");
        });
}

// Fonction pour faire du geocoding (adresse -> coordonnées)
function geocode(address, callback) {
    // Utiliser Nominatim OpenStreetMap pour le geocoding
    const url = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}&limit=1`;
    
    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data && data.length > 0) {
                callback({
                    lat: parseFloat(data[0].lat),
                    lng: parseFloat(data[0].lon)
                });
            } else {
                alert("Adresse non trouvée. Veuillez vérifier et réessayer.");
            }
        })
        .catch(error => {
            console.error("Erreur de geocoding:", error);
            alert("Erreur lors de la recherche de l'adresse");
        });
}

// Fonction pour calculer l'itinéraire
function calculateRoute() {
    const startAddress = document.getElementById('start').value;
    const endAddress = document.getElementById('end').value;
    
    if (!startAddress || !endAddress) {
        alert("Veuillez entrer les adresses de départ et d'arrivée.");
        return;
    }
    
    // Obtenir les coordonnées pour l'adresse de départ
    geocode(startAddress, function(startCoords) {
        // Obtenir les coordonnées pour l'adresse d'arrivée
        geocode(endAddress, function(endCoords) {
            // Initialiser la carte de résultat si ce n'est pas déjà fait
            if (!resultMap) {
                resultMap = L.map('resultMap').setView([startCoords.lat, startCoords.lng], 13);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(resultMap);
            } else {
                resultMap.setView([startCoords.lat, startCoords.lng], 13);
            }
            
            // Ajouter des marqueurs pour le départ et l'arrivée
            const startIcon = L.icon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });
            
            const endIcon = L.icon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });
            
            // Supprimer les marqueurs existants s'il y en a
            if (routingControl) {
                resultMap.removeControl(routingControl);
            }
            
            // Ajouter le contrôle de routage
            routingControl = L.Routing.control({
                waypoints: [
                    L.latLng(startCoords.lat, startCoords.lng),
                    L.latLng(endCoords.lat, endCoords.lng)
                ],
                routeWhileDragging: false,
                showAlternatives: false,
                fitSelectedRoutes: true,
                lineOptions: {
                    styles: [{ color: '#1d3557', weight: 5 }]
                },
                createMarker: function(i, waypoint, n) {
                    if (i === 0) {
                        return L.marker(waypoint.latLng, { icon: startIcon });
                    } else {
                        return L.marker(waypoint.latLng, { icon: endIcon });
                    }
                }
            }).addTo(resultMap);
            
            // Écouter l'événement de calcul d'itinéraire
            routingControl.on('routesfound', function(e) {
                const routes = e.routes;
                const summary = routes[0].summary;
                
                // Stocker l'itinéraire pour la simulation
                ambulanceRoute = routes[0].coordinates;
                
                // Convertir la distance en kilomètres et arrondir à une décimale
                const distance = (summary.totalDistance / 1000).toFixed(1);
                
                // Convertir le temps en minutes et arrondir
                const timeInMinutes = Math.round(summary.totalTime / 60);
                
                // Calculer le prix estimé
                const price = Math.round(distance * PRICE_PER_KM);
                
                // Mettre à jour l'interface
                document.getElementById('distance').textContent = `${distance} km`;
                document.getElementById('duration').textContent = `${timeInMinutes} min`;
                document.getElementById('price').textContent = `${price.toLocaleString()} FC`;
                
                // Passer à l'étape 2
                showStep(2);
            });
        });
    });
}

// Fonction pour revenir à l'étape 1
function backToStep1() {
    showStep(1);
}

// Fonction pour sélectionner une méthode de paiement
function selectPaymentTab(method) {
    // Mettre à jour la méthode de paiement sélectionnée
    selectedPaymentMethod = method;
    
    // Mettre à jour les classes CSS
    const tabs = document.querySelectorAll('.payment-tabs .tab-item');
    tabs.forEach(tab => {
        tab.classList.remove('active');
        if (tab.getAttribute('data-tab') === method) {
            tab.classList.add('active');
        }
    });
    
    // Afficher le contenu de l'onglet correspondant
    const tabPanes = document.querySelectorAll('.payment-tabs .tab-pane');
    tabPanes.forEach(pane => {
        pane.classList.remove('active');
    });
    document.getElementById(`${method}Tab`).classList.add('active');
}

// Fonction pour traiter le paiement et passer à l'étape 3
function processPayment() {
    // Vérifier si un numéro de téléphone est requis
    if (['mpesa', 'orange', 'airtel'].includes(selectedPaymentMethod)) {
        const phoneInput = document.getElementById(`${selectedPaymentMethod}Phone`);
        if (!phoneInput.value) {
            alert("Veuillez entrer votre numéro de téléphone.");
            return;
        }
    }
    
    // Mettre à jour la méthode de paiement dans l'étape 3
    document.getElementById('paymentMethod').textContent = getPaymentMethodName(selectedPaymentMethod);
    
    // Initialiser la carte de suivi
    initializeTrackingMaps();
    
    // Définir l'heure de commande
    const now = new Date();
    document.getElementById('orderTime').textContent = formatDateTime(now);
    
    // Définir les adresses
    document.getElementById('startAddress').textContent = document.getElementById('start').value;
    document.getElementById('endAddress').textContent = document.getElementById('end').value;
    document.getElementById('endAddressContainer').style.display = 'flex';
    
    // Initialiser le compte à rebours
    startCountdown(5 * 60); // 5 minutes
    
    // Passer à l'étape 3
    showStep(3);
    
    // Démarrer la simulation du mouvement de l'ambulance
    startAmbulanceSimulation();
}

// Fonction pour obtenir le nom complet de la méthode de paiement
function getPaymentMethodName(method) {
    const methods = {
        'cash': 'Espèces',
        'mpesa': 'M-PESA',
        'orange': 'Orange Money',
        'airtel': 'Airtel Money',
        'card': 'Carte bancaire'
    };
    return methods[method] || method;
}

// Fonction pour formater la date et l'heure
function formatDateTime(date) {
    const options = { 
        hour: '2-digit', 
        minute: '2-digit', 
        day: 'numeric', 
        month: 'long', 
        year: 'numeric' 
    };
    return date.toLocaleDateString('fr-FR', options);
}

// Fonction pour initialiser les cartes de suivi
function initializeTrackingMaps() {
    // Carte de suivi principale
    trackingMap = L.map('trackingMap').setView([-4.3217, 15.3125], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(trackingMap);
    
    // Grande carte de suivi
    largeMap = L.map('largeMap').setView([-4.3217, 15.3125], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(largeMap);
    
    // Récupérer les coordonnées de départ et d'arrivée depuis le routingControl
    if (routingControl && routingControl._selectedRoute) {
        const waypoints = routingControl._selectedRoute.waypoints;
        const startLatLng = waypoints[0].latLng;
        const endLatLng = waypoints[waypoints.length - 1].latLng;
        
        // Ajouter des marqueurs pour le départ et l'arrivée sur les deux cartes
        const startIcon = L.icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });
        
        const endIcon = L.icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });
        
        L.marker(startLatLng, { icon: startIcon }).addTo(trackingMap);
        L.marker(endLatLng, { icon: endIcon }).addTo(trackingMap);
        
        L.marker(startLatLng, { icon: startIcon }).addTo(largeMap);
        L.marker(endLatLng, { icon: endIcon }).addTo(largeMap);
        
        // Ajouter l'itinéraire sur les deux cartes
        L.Routing.control({
            waypoints: [
                L.latLng(startLatLng.lat, startLatLng.lng),
                L.latLng(endLatLng.lat, endLatLng.lng)
            ],
            routeWhileDragging: false,
            showAlternatives: false,
            fitSelectedRoutes: true,
            lineOptions: {
                styles: [{ color: '#1d3557', weight: 5 }]
            },
            createMarker: function() { return null; } // Ne pas créer de marqueurs supplémentaires
        }).addTo(trackingMap);
        
        L.Routing.control({
            waypoints: [
                L.latLng(startLatLng.lat, startLatLng.lng),
                L.latLng(endLatLng.lat, endLatLng.lng)
            ],
            routeWhileDragging: false,
            showAlternatives: false,
            fitSelectedRoutes: true,
            lineOptions: {
                styles: [{ color: '#1d3557', weight: 5 }]
            },
            createMarker: function() { return null; } // Ne pas créer de marqueurs supplémentaires
        }).addTo(largeMap);
        
        // Créer un marqueur pour l'ambulance
        const ambulanceIcon = L.icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });
        
        ambulanceMarker = L.marker(startLatLng, { icon: ambulanceIcon }).addTo(trackingMap);
        ambulanceMarker.bindPopup("Ambulance #A-12345");
        
        const ambulanceMarkerLarge = L.marker(startLatLng, { icon: ambulanceIcon }).addTo(largeMap);
        ambulanceMarkerLarge.bindPopup("Ambulance #A-12345");
    }
}

// Fonction pour démarrer la simulation du mouvement de l'ambulance
function startAmbulanceSimulation() {
    if (!ambulanceRoute || ambulanceRoute.length === 0) {
        console.error("Aucun itinéraire disponible pour la simulation");
        return;
    }
    
    let i = 0;
    simulationInterval = setInterval(function() {
        if (i >= ambulanceRoute.length) {
            clearInterval(simulationInterval);
            return;
        }
        
        const position = ambulanceRoute[i];
        
        // Mettre à jour la position de l'ambulance sur les deux cartes
        if (ambulanceMarker) {
            ambulanceMarker.setLatLng(position);
            trackingMap.setView(position, trackingMap.getZoom());
        }
        
        // Mettre à jour la position sur la grande carte
        const ambulanceMarkerLarge = largeMap.eachLayer(function(layer) {
            if (layer instanceof L.Marker && layer.getPopup() && layer.getPopup().getContent() === "Ambulance #A-12345") {
                layer.setLatLng(position);
                largeMap.setView(position, largeMap.getZoom());
            }
        });
        
        i++;
    }, 1000); // Déplacer l'ambulance toutes les secondes
}

// Fonction pour démarrer le compte à rebours
function startCountdown(seconds) {
    let remainingSeconds = seconds;
    
    function updateCountdown() {
        const minutes = Math.floor(remainingSeconds / 60);
        const secs = remainingSeconds % 60;
        document.getElementById('countdown').querySelector('.countdown-value').textContent = 
            `${minutes}:${secs < 10 ? '0' : ''}${secs}`;
        
        if (remainingSeconds <= 0) {
            clearInterval(countdown);
        } else {
            remainingSeconds--;
        }
    }
    
    updateCountdown(); // Mettre à jour immédiatement
    countdown = setInterval(updateCountdown, 1000);
}

// Fonction pour sélectionner un onglet de suivi
function selectTrackingTab(tab) {
    // Mettre à jour les classes CSS
    const tabs = document.querySelectorAll('.tracking-tabs .tab-item');
    tabs.forEach(item => {
        item.classList.remove('active');
        if (item.getAttribute('data-tab') === tab) {
            item.classList.add('active');
        }
    });
    
    // Afficher le contenu de l'onglet correspondant
    const tabPanes = document.querySelectorAll('.tracking-tabs .tab-pane');
    tabPanes.forEach(pane => {
        pane.classList.remove('active');
    });
    document.getElementById(`${tab}Tab`).classList.add('active');
    
    // Redimensionner la carte si nécessaire
    if (tab === 'map' && largeMap) {
        setTimeout(function() {
            largeMap.invalidateSize();
        }, 100);
    }
}

// Fonction pour afficher une étape spécifique
function showStep(step) {
    currentStep = step;
    
    // Masquer toutes les étapes
    const steps = document.querySelectorAll('.step-content');
    steps.forEach(stepElement => {
        stepElement.classList.remove('active');
    });
    
    // Afficher l'étape demandée
    document.getElementById(`step${step}`).classList.add('active');
    
    // Redimensionner les cartes si nécessaire
    if (step === 1 && map) {
        setTimeout(function() {
            map.invalidateSize();
        }, 100);
    } else if (step === 2 && resultMap) {
        setTimeout(function() {
            resultMap.invalidateSize();
        }, 100);
    } else if (step === 3 && trackingMap && largeMap) {
        setTimeout(function() {
            trackingMap.invalidateSize();
            largeMap.invalidateSize();
        }, 100);
    }
}

// Nettoyer les ressources lors de la fermeture de la page
window.addEventListener('beforeunload', function() {
    if (countdown) clearInterval(countdown);
    if (simulationInterval) clearInterval(simulationInterval);
});