<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Localisation et Estimation du Trajet - AmbuService</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/localisation.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <a href="index.html">
                        <span class="logo-blue">Ambu</span><span class="logo-red">Service</span>
                    </a>
                </div>
                <nav class="desktop-nav">
                    <ul>
                        <li><a href="index.html">Accueil</a></li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="a-propos.html">À propos</a></li>
                        <li><a href="tarifs.html">Tarifs</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
                <div class="cta-button desktop-only">
                    <a href="commande.html" class="btn btn-primary">
                        <i class="fas fa-phone"></i> Commander
                    </a>
                </div>
                <button class="mobile-menu-btn" id="mobileMenuBtn">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <nav>
            <ul>
                <li><a href="index.html">Accueil</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="a-propos.html">À propos</a></li>
                <li><a href="tarifs.html">Tarifs</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <a href="commande.html" class="btn btn-primary btn-full">
                <i class="fas fa-phone"></i> Commander une Ambulance
            </a>
        </nav>
    </div>

    <!-- Page Content -->
    <div class="page-header">
        <div class="container">
            <h1>Localisation et Estimation du Trajet</h1>
        </div>
    </div>

    <div class="container">
        <div class="localisation-wrapper">
            <!-- Step 1: Adresses -->
            <div class="step-content active" id="step1">
                <div class="card">
                    <div class="card-header">
                        <h2>Entrez les adresses</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="start">Adresse de départ</label>
                            <div class="input-with-button">
                                <input type="text" id="start" placeholder="Entrez l'adresse de départ">
                                <button type="button" class="btn btn-outline" onclick="getLocation()">
                                    <i class="fas fa-map-marker-alt"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="end">Adresse d'arrivée</label>
                            <input type="text" id="end" placeholder="Entrez l'adresse d'arrivée">
                        </div>
                        
                        <div class="map-container">
                            <div id="map">
                                <div class="map-placeholder">
                                    <p>Carte interactive sera affichée ici</p>
                                </div>
                            </div>
                            <div class="map-info">
                                <i class="fas fa-info-circle"></i>
                                <p>Vous pouvez cliquer sur la carte pour sélectionner les adresses ou utiliser le bouton de géolocalisation.</p>
                            </div>
                        </div>
                        
                        <button type="button" class="btn btn-primary btn-full" onclick="calculateRoute()">
                            Calculer l'itinéraire
                        </button>
                    </div>
                </div>
            </div>

            <!-- Step 2: Résultats -->
            <div class="step-content" id="step2">
                <div class="card">
                    <div class="card-header">
                        <h2>Résultats de l'itinéraire</h2>
                    </div>
                    <div class="card-body">
                        <div class="map-container">
                            <div id="resultMap">
                                <div class="map-placeholder">
                                    <p>Carte avec l'itinéraire sera affichée ici</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="route-info">
                            <div class="info-card">
                                <div class="info-icon blue">
                                    <i class="fas fa-route"></i>
                                </div>
                                <div class="info-value" id="distance">0 km</div>
                                <div class="info-label">Distance</div>
                            </div>
                            
                            <div class="info-card">
                                <div class="info-icon green">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="info-value" id="duration">0 min</div>
                                <div class="info-label">Temps estimé</div>
                            </div>
                            
                            <div class="info-card">
                                <div class="info-icon purple">
                                    <i class="fas fa-credit-card"></i>
                                </div>
                                <div class="info-value" id="price">0 FC</div>
                                <div class="info-label">Prix estimé</div>
                            </div>
                        </div>
                        
                        <div class="payment-section">
                            <h3>Méthode de paiement</h3>
                            
                            <div class="payment-tabs">
                                <div class="tab-header">
                                    <div class="tab-item active" data-tab="cash" onclick="selectPaymentTab('cash')">Cash</div>
                                    <div class="tab-item" data-tab="mpesa" onclick="selectPaymentTab('mpesa')">M-PESA</div>
                                    <div class="tab-item" data-tab="orange" onclick="selectPaymentTab('orange')">Orange Money</div>
                                    <div class="tab-item" data-tab="airtel" onclick="selectPaymentTab('airtel')">Airtel Money</div>
                                    <div class="tab-item" data-tab="card" onclick="selectPaymentTab('card')">Carte bancaire</div>
                                </div>
                                
                                <div class="tab-content">
                                    <div class="tab-pane active" id="cashTab">
                                        <div class="payment-info">
                                            <i class="fas fa-money-bill-wave"></i>
                                            <p>Paiement en espèces à l'arrivée de l'ambulance.</p>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane" id="mpesaTab">
                                        <div class="payment-info">
                                            <i class="fas fa-mobile-alt"></i>
                                            <p>Paiement via M-PESA. Entrez votre numéro de téléphone ci-dessous.</p>
                                        </div>
                                        <input type="tel" id="mpesaPhone" placeholder="Numéro de téléphone">
                                    </div>
                                    
                                    <div class="tab-pane" id="orangeTab">
                                        <div class="payment-info">
                                            <i class="fas fa-mobile-alt"></i>
                                            <p>Paiement via Orange Money. Entrez votre numéro de téléphone ci-dessous.</p>
                                        </div>
                                        <input type="tel" id="orangePhone" placeholder="Numéro de téléphone">
                                    </div>
                                    
                                    <div class="tab-pane" id="airtelTab">
                                        <div class="payment-info">
                                            <i class="fas fa-mobile-alt"></i>
                                            <p>Paiement via Airtel Money. Entrez votre numéro de téléphone ci-dessous.</p>
                                        </div>
                                        <input type="tel" id="airtelPhone" placeholder="Numéro de téléphone">
                                    </div>
                                    
                                    <div class="tab-pane" id="cardTab">
                                        <div class="payment-info">
                                            <i class="fas fa-credit-card"></i>
                                            <p>Paiement par carte bancaire. Vous serez redirigé vers une page de paiement sécurisée.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="button" class="btn btn-outline" onclick="backToStep1()">
                                Retour
                            </button>
                            <button type="button" class="btn btn-primary" onclick="processPayment()">
                                Lancer la course
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 3: Suivi -->
            <div class="step-content" id="step3">
                <div class="card">
                    <div class="card-header">
                        <h2>Suivi de l'ambulance</h2>
                    </div>
                    <div class="card-body">
                        <div class="countdown" id="countdown">
                            <div class="countdown-value">5:00</div>
                            <div class="countdown-label">Nous arrivons dans</div>
                        </div>
                        
                        <div class="ambulance-tracking">
                            <div class="tracking-map" id="trackingMap">
                                <div class="map-placeholder">
                                    <p>Carte de suivi en temps réel</p>
                                </div>
                            </div>
                            
                            <div class="tracking-info">
                                <div class="ambulance-details">
                                    <div class="ambulance-icon">
                                        <i class="fas fa-ambulance"></i>
                                    </div>
                                    <div class="ambulance-data">
                                        <h3>Ambulance #A-12345</h3>
                                        <p>Plaque: ABC-1234</p>
                                    </div>
                                    <div class="ambulance-actions">
                                        <button class="btn btn-icon">
                                            <i class="fas fa-phone"></i>
                                        </button>
                                        <button class="btn btn-icon">
                                            <i class="fas fa-comment"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="journey-details">
                                    <div class="journey-item">
                                        <i class="fas fa-clock"></i>
                                        <div>
                                            <p class="item-label">Heure de commande</p>
                                            <p class="item-value" id="orderTime">14:30, 11 Mars 2025</p>
                                        </div>
                                    </div>
                                    <div class="journey-item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <div>
                                            <p class="item-label">Adresse de départ</p>
                                            <p class="item-value" id="startAddress">123 Avenue Principale, Kinshasa</p>
                                        </div>
                                    </div>
                                    <div class="journey-item" id="endAddressContainer" style="display: none;">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <div>
                                            <p class="item-label">Adresse d'arrivée</p>
                                            <p class="item-value" id="endAddress">Hôpital Général de Référence, Kinshasa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tracking-tabs">
                            <div class="tab-header">
                                <div class="tab-item active" data-tab="map" onclick="selectTrackingTab('map')">Carte</div>
                                <div class="tab-item" data-tab="details" onclick="selectTrackingTab('details')">Détails</div>
                            </div>
                            
                            <div class="tab-content">
                                <div class="tab-pane active" id="mapTab">
                                    <div class="tracking-map-large" id="largeMap">
                                        <div class="map-placeholder">
                                            <p>Carte de suivi en temps réel</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tab-pane" id="detailsTab">
                                    <div class="details-content">
                                        <div class="details-section">
                                            <h3>Équipe médicale</h3>
                                            <div class="team-members">
                                                <div class="team-member">
                                                    <div class="member-avatar"></div>
                                                    <div class="member-info">
                                                        <p class="member-name">Jean Dupont</p>
                                                        <p class="member-role">Chauffeur</p>
                                                    </div>
                                                </div>
                                                <div class="team-member">
                                                    <div class="member-avatar"></div>
                                                    <div class="member-info">
                                                        <p class="member-name">Dr. Marie Kabongo</p>
                                                        <p class="member-role">Médecin</p>
                                                    </div>
                                                </div>
                                                <div class="team-member">
                                                    <div class="member-avatar"></div>
                                                    <div class="member-info">
                                                        <p class="member-name">Pierre Mutombo</p>
                                                        <p class="member-role">Infirmier</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="details-section">
                                            <h3>Informations sur le véhicule</h3>
                                            <div class="vehicle-info">
                                                <div class="info-row">
                                                    <span>Type:</span>
                                                    <span>Ambulance médicalisée</span>
                                                </div>
                                                <div class="info-row">
                                                    <span>Équipement:</span>
                                                    <span>Réanimation complète</span>
                                                </div>
                                                <div class="info-row">
                                                    <span>Année:</span>
                                                    <span>2023</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="details-section">
                                            <h3>Détails de la commande</h3>
                                            <div class="order-info">
                                                <div class="info-row">
                                                    <span>Numéro de commande:</span>
                                                    <span>#CMD-12345</span>
                                                </div>
                                                <div class="info-row">
                                                    <span>Type d'urgence:</span>
                                                    <span>Médicale</span>
                                                </div>
                                                <div class="info-row">
                                                    <span>Méthode de paiement:</span>
                                                    <span id="paymentMethod">M-PESA</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center mt-20">
                            <a href="index.html" class="btn btn-outline">
                                Retour à l'accueil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h3>AmbuService</h3>
                    <p>Service de location d'ambulance rapide et fiable disponible 24h/24 et 7j/7.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <div class="footer-col">
                    <h3>Liens Rapides</h3>
                    <ul>
                        <li><a href="index.html">Accueil</a></li>
                        <li><a href="services.html">Nos Services</a></li>
                        <li><a href="a-propos.html">À Propos</a></li>
                        <li><a href="tarifs.html">Tarifs</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h3>Nos Services</h3>
                    <ul>
                        <li><a href="services.html#urgence">Ambulance d'Urgence</a></li>
                        <li><a href="services.html#transport">Transport Médical</a></li>
                        <li><a href="services.html#evenements">Couverture d'Événements</a></li>
                        <li><a href="services.html#international">Transport International</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h3>Contact</h3>
                    <ul class="contact-info">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>123 Avenue Principale, Kinshasa, RDC</span>
                        </li>
                        <li>
                            <i class="fas fa-phone"></i>
                            <span>+243 123 456 789</span>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <span>contact@ambuservice.com</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; <span id="currentYear"></span> AmbuService. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script src="js/main.js"></script>
    <script src="js/localisation.js"></script>
</body>
</html>