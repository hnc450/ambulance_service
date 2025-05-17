<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi de Commande - AmbuService</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Ajout des bibliothèques Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/suivi.css">
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

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1>Suivi de Commande</h1>
            <p>Suivez en temps réel l'état de votre commande d'ambulance</p>
        </div>
    </div>

    <!-- Tracking Section -->
    <section class="tracking-section">
        <div class="container">
            <!-- Tracking Form -->
            <div class="tracking-form-container">
                <div class="form-header">
                    <h2>Entrez votre numéro de commande</h2>
                    <p>Saisissez le numéro de commande que vous avez reçu par SMS ou par email pour suivre votre ambulance.</p>
                </div>
                
                <form id="trackingForm" class="tracking-form">
                    <div class="form-group">
                        <label for="trackingNumber">Numéro de commande</label>
                        <div class="input-group">
                            <input type="text" id="trackingNumber" name="trackingNumber" placeholder="Ex: AMB-12345" required>
                            <button type="submit" class="btn btn-primary">Suivre</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Tracking Result -->
            <div id="trackingResult" class="tracking-result" style="display: none;">
                <div class="order-details">
                    <div class="order-header">
                        <h2>Détails de la commande</h2>
                        <span class="order-number">Commande #<span id="orderNumber">AMB-12345</span></span>
                    </div>
                    
                    <div class="order-info-grid">
                        <div class="order-info-item">
                            <h3>Type de service</h3>
                            <p id="serviceType">Ambulance d'Urgence</p>
                        </div>
                        
                        <div class="order-info-item">
                            <h3>Date et heure</h3>
                            <p id="orderDateTime">12 Mars 2025, 14:30</p>
                        </div>
                        
                        <div class="order-info-item">
                            <h3>Adresse de prise en charge</h3>
                            <p id="pickupAddress">123 Avenue Principale, Kinshasa</p>
                        </div>
                        
                        <div class="order-info-item">
                            <h3>Destination</h3>
                            <p id="destinationAddress">Hôpital Général de Référence, Kinshasa</p>
                        </div>
                    </div>
                    
                    <div class="order-status">
                        <h3>Statut actuel</h3>
                        <div class="status-badge" id="statusBadge">En route</div>
                    </div>
                </div>
                
                <!-- Tracking Progress -->
                <div class="tracking-progress">
                    <div class="progress-steps">
                        <div class="progress-step completed" id="stepConfirmed">
                            <div class="step-icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="step-content">
                                <h4>Commande confirmée</h4>
                                <p class="step-time" id="timeConfirmed">12 Mars, 14:30</p>
                            </div>
                        </div>
                        
                        <div class="progress-step completed" id="stepDispatched">
                            <div class="step-icon">
                                <i class="fas fa-headset"></i>
                            </div>
                            <div class="step-content">
                                <h4>Ambulance envoyée</h4>
                                <p class="step-time" id="timeDispatched">12 Mars, 14:32</p>
                            </div>
                        </div>
                        
                        <div class="progress-step active" id="stepEnRoute">
                            <div class="step-icon">
                                <i class="fas fa-ambulance"></i>
                            </div>
                            <div class="step-content">
                                <h4>En route</h4>
                                <p class="step-time" id="timeEnRoute">12 Mars, 14:35</p>
                            </div>
                        </div>
                        
                        <div class="progress-step" id="stepArrived">
                            <div class="step-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="step-content">
                                <h4>Arrivée sur place</h4>
                                <p class="step-time" id="timeArrived">--</p>
                            </div>
                        </div>
                        
                        <div class="progress-step" id="stepCompleted">
                            <div class="step-icon">
                                <i class="fas fa-flag-checkered"></i>
                            </div>
                            <div class="step-content">
                                <h4>Service terminé</h4>
                                <p class="step-time" id="timeCompleted">--</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Live Map -->
                <div class="live-map-container">
                    <h3>Localisation en temps réel</h3>
                    <div class="live-map" id="liveMap"></div>
                    
                    <div class="map-info">
                        <div class="info-item">
                            <i class="fas fa-clock"></i>
                            <span>Temps estimé d'arrivée: <strong id="eta">5 minutes</strong></span>
                        </div>
                        
                        <div class="info-item">
                            <i class="fas fa-road"></i>
                            <span>Distance restante: <strong id="remainingDistance">2.3 km</strong></span>
                        </div>
                    </div>
                </div>
                
                <!-- Driver Info -->
                <div class="driver-info">
                    <h3>Informations sur l'équipe</h3>
                    <div class="driver-card">
                        <div class="driver-image">
                            <img src="/placeholder.svg?height=100&width=100" alt="Photo du chauffeur">
                        </div>
                        <div class="driver-details">
                            <h4 id="driverName">Jean Mutombo</h4>
                            <p class="driver-role">Chauffeur</p>
                            <div class="driver-contact">
                                <a href="tel:+243123456789" class="btn btn-sm btn-outline">
                                    <i class="fas fa-phone"></i> Appeler
                                </a>
                            </div>
                        </div>
                        <div class="driver-rating">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span>4.5/5</span>
                        </div>
                    </div>
                    
                    <div class="medical-team">
                        <h4>Équipe médicale</h4>
                        <ul>
                            <li id="medic1">Dr. Marie Kabongo - Médecin urgentiste</li>
                            <li id="medic2">Pierre Lukusa - Infirmier</li>
                        </ul>
                    </div>
                    
                    <div class="vehicle-info">
                        <h4>Véhicule</h4>
                        <p id="vehicleInfo">Ambulance Type A - Mercedes Sprinter - Plaque: ABC-123</p>
                    </div>
                </div>
                
                <!-- Emergency Contact -->
                <div class="emergency-contact">
                    <div class="contact-icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <div class="contact-content">
                        <h3>Besoin d'aide urgente?</h3>
                        <p>Si vous avez besoin d'assistance immédiate, appelez notre ligne d'urgence:</p>
                        <a href="tel:+243123456789" class="btn btn-danger">
                            <i class="fas fa-phone"></i> +243 123 456 789
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Tracking Not Found -->
            <div id="trackingNotFound" class="tracking-not-found" style="display: none;">
                <div class="not-found-icon">
                    <i class="fas fa-search"></i>
                </div>
                <h2>Commande introuvable</h2>
                <p>Nous n'avons pas pu trouver de commande avec le numéro fourni. Veuillez vérifier le numéro et réessayer.</p>
                <button class="btn btn-primary" onclick="resetTracking()">Réessayer</button>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <h2>Questions fréquentes sur le suivi</h2>
            
            <div class="faq-list">
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>Comment puis-je obtenir mon numéro de suivi ?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Votre numéro de suivi vous est envoyé par SMS et par email dès que votre commande d'ambulance est confirmée. Il commence généralement par "AMB-" suivi de 5 chiffres.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>À quelle fréquence les informations de suivi sont-elles mises à jour ?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Les informations de suivi sont mises à jour en temps réel. La position de l'ambulance est actualisée toutes les 10 secondes, et le statut de la commande est mis à jour à chaque étape du processus.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>Puis-je contacter directement le chauffeur ou l'équipe médicale ?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Oui, une fois que l'ambulance est en route, vous pouvez contacter directement le chauffeur en utilisant le bouton "Appeler" dans la section "Informations sur l'équipe". Cela vous permet de communiquer des informations importantes ou de poser des questions.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>Que faire si l'ambulance est en retard ?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Si vous constatez que l'ambulance est en retard par rapport au temps d'arrivée estimé, vous pouvez contacter notre service client au +243 123 456 789. Nous vous fournirons des informations supplémentaires et prendrons les mesures nécessaires pour résoudre la situation.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

    <!-- Scripts Leaflet -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    
    <script src="js/main.js"></script>
    <script src="js/suivi.js"></script>
</body>
</html>