<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commander une Ambulance - AmbuService</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/commande.css">
</head>
<body>
    <!-- Header (même que index.html) -->
    <header class="header">
        <!-- Contenu du header -->
    </header>

    <!-- Mobile Menu (même que index.html) -->
    <div class="mobile-menu" id="mobileMenu">
        <!-- Contenu du menu mobile -->
    </div>

    <!-- Page Content -->
    <div class="page-header">
        <div class="container">
            <h1>Commander une Ambulance</h1>
        </div>
    </div>

    <div class="container">
        <div class="commande-wrapper">
            <!-- Progress Steps -->
            <div class="progress-steps">
                <div class="step active" data-step="1">
                    <div class="step-number">1</div>
                    <div class="step-label">Informations</div>
                </div>
                <div class="step-line"></div>
                <div class="step" data-step="2">
                    <div class="step-number">2</div>
                    <div class="step-label">Localisation</div>
                </div>
                <div class="step-line"></div>
                <div class="step" data-step="3">
                    <div class="step-number">3</div>
                    <div class="step-label">Paiement</div>
                </div>
                <div class="step-line"></div>
                <div class="step" data-step="4">
                    <div class="step-number">4</div>
                    <div class="step-label">Confirmation</div>
                </div>
            </div>

            <!-- Step 1: Informations personnelles -->
            <div class="step-content active" id="step1">
                <div class="card">
                    <div class="card-header">
                        <h2>Informations personnelles</h2>
                    </div>
                    <div class="card-body">
                        <form id="infoForm">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input type="text" id="nom" name="nom" required>
                                </div>
                                <div class="form-group">
                                    <label for="prenom">Prénom</label>
                                    <input type="text" id="prenom" name="prenom" required>
                                </div>
                                <div class="form-group">
                                    <label for="telephone">Téléphone</label>
                                    <input type="tel" id="telephone" name="telephone" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Type d'urgence</label>
                                <div class="radio-group">
                                    <div class="radio-option">
                                        <input type="radio" id="medical" name="typeUrgence" value="medical" checked>
                                        <label for="medical">Médicale</label>
                                    </div>
                                    <div class="radio-option">
                                        <input type="radio" id="accident" name="typeUrgence" value="accident">
                                        <label for="accident">Accident</label>
                                    </div>
                                    <div class="radio-option">
                                        <input type="radio" id="transport" name="typeUrgence" value="transport">
                                        <label for="transport">Transport médical</label>
                                    </div>
                                    <div class="radio-option">
                                        <input type="radio" id="autre" name="typeUrgence" value="autre">
                                        <label for="autre">Autre</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="description">Description (optionnel)</label>
                                <textarea id="description" name="description" rows="4" placeholder="Décrivez brièvement la situation..."></textarea>
                            </div>
                            
                            <div class="form-actions">
                                <button type="button" class="btn btn-primary" onclick="nextStep(2)">
                                    Suivant <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Step 2: Localisation -->
            <div class="step-content" id="step2">
                <div class="card">
                    <div class="card-header">
                        <h2>Localisation</h2>
                    </div>
                    <div class="card-body">
                        <form id="localisationForm">
                            <div class="form-group">
                                <label for="adresseDepart">Adresse de départ</label>
                                <div class="input-with-button">
                                    <input type="text" id="adresseDepart" name="adresseDepart" required>
                                    <button type="button" class="btn btn-outline" onclick="getLocation()">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="adresseArrivee">Adresse d'arrivée (optionnel)</label>
                                <div class="input-with-button">
                                    <input type="text" id="adresseArrivee" name="adresseArrivee">
                                    <button type="button" class="btn btn-outline">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="dateHeure">Date et heure (pour transport planifié)</label>
                                <input type="datetime-local" id="dateHeure" name="dateHeure">
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
                            
                            <div class="form-actions">
                                <button type="button" class="btn btn-outline" onclick="prevStep(1)">
                                    Retour
                                </button>
                                <button type="button" class="btn btn-primary" onclick="nextStep(3)">
                                    Suivant <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Step 3: Paiement -->
            <div class="step-content" id="step3">
                <div class="card">
                    <div class="card-header">
                        <h2>Méthode de paiement</h2>
                    </div>
                    <div class="card-body">
                        <form id="paiementForm">
                            <div class="form-group">
                                <label>Choisissez votre méthode de paiement</label>
                                <div class="payment-options">
                                    <div class="payment-option" onclick="selectPayment('cash')">
                                        <input type="radio" id="cash" name="paiement" value="cash" checked>
                                        <label for="cash">Cash à l'arrivée</label>
                                    </div>
                                    <div class="payment-option" onclick="selectPayment('mpesa')">
                                        <input type="radio" id="mpesa" name="paiement" value="mpesa">
                                        <label for="mpesa">M-PESA</label>
                                    </div>
                                    <div class="payment-option" onclick="selectPayment('orange')">
                                        <input type="radio" id="orange" name="paiement" value="orange">
                                        <label for="orange">Orange Money</label>
                                    </div>
                                    <div class="payment-option" onclick="selectPayment('airtel')">
                                        <input type="radio" id="airtel" name="paiement" value="airtel">
                                        <label for="airtel">Airtel Money</label>
                                    </div>
                                    <div class="payment-option" onclick="selectPayment('card')">
                                        <input type="radio" id="card" name="paiement" value="card">
                                        <label for="card">Carte bancaire</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group" id="mobilePaymentGroup" style="display: none;">
                                <label for="telephonePaiement">Numéro de téléphone pour le paiement mobile</label>
                                <input type="tel" id="telephonePaiement" name="telephonePaiement">
                            </div>
                            
                            <div class="order-summary">
                                <h3>Résumé de la commande</h3>
                                <div class="summary-item">
                                    <span>Type d'urgence:</span>
                                    <span id="summaryUrgence">Médicale</span>
                                </div>
                                <div class="summary-item">
                                    <span>Adresse de départ:</span>
                                    <span id="summaryDepart"></span>
                                </div>
                                <div class="summary-item" id="summaryArriveeContainer" style="display: none;">
                                    <span>Adresse d'arrivée:</span>
                                    <span id="summaryArrivee"></span>
                                </div>
                                <div class="summary-divider"></div>
                                <div class="summary-total">
                                    <span>Total estimé:</span>
                                    <span>Prix à déterminer</span>
                                </div>
                                <p class="summary-note">Le prix final sera calculé en fonction de la distance et du temps de trajet.</p>
                            </div>
                            
                            <div class="form-actions">
                                <button type="button" class="btn btn-outline" onclick="prevStep(2)">
                                    Retour
                                </button>
                                <button type="button" class="btn btn-primary" onclick="submitOrder()">
                                    Confirmer la commande
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Step 4: Confirmation -->
            <div class="step-content" id="step4">
                <div class="card">
                    <div class="card-header confirmation-header">
                        <h2>Commande confirmée !</h2>
                    </div>
                    <div class="card-body text-center">
                        <div class="confirmation-icon">
                            <i class="fas fa-check"></i>
                        </div>
                        
                        <div class="confirmation-message">
                            <h3>Merci pour votre commande, <span id="confirmationName"></span> !</h3>
                            <p>Votre ambulance est en route. Vous pouvez suivre son trajet en temps réel.</p>
                        </div>
                        
                        <div class="ambulance-info">
                            <h4>Informations sur l'ambulance</h4>
                            <div class="info-grid">
                                <div class="info-item">
                                    <span>Plaque d'immatriculation:</span>
                                    <span>ABC-1234</span>
                                </div>
                                <div class="info-item">
                                    <span>Chauffeur:</span>
                                    <span>Jean Dupont</span>
                                </div>
                                <div class="info-item">
                                    <span>Temps d'arrivée estimé:</span>
                                    <span>10 minutes</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="confirmation-actions">
                            <a href="suivi.html" class="btn btn-primary btn-full">
                                Suivre l'ambulance en temps réel
                            </a>
                            <a href="index.html" class="btn btn-outline btn-full">
                                Retour à l'accueil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer (même que index.html) -->
    <footer class="footer">
        <!-- Contenu du footer -->
    </footer>

    <script src="js/main.js"></script>
    <script src="js/commande.js"></script>
</body>
</html>