<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-Nous - AmbuService</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1>Contactez-Nous</h1>
            <p>Nous sommes là pour répondre à toutes vos questions</p>
        </div>
    </div>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="contact-grid">
                <!-- Contact Form -->
                <div class="contact-form-container">
                    <div class="form-header">
                        <h2>Envoyez-nous un message</h2>
                        <p>Remplissez le formulaire ci-dessous et nous vous répondrons dans les plus brefs délais.</p>
                        <p>
                            <?= $_GET['message'] ?? '' ?>
                        </p>
                    </div>
                    
                    <form id="contactForm" class="contact-form" method="POST" action="/contactez">
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" id="nom" name="nom" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input type="text" id="prenom" name="prenom" required>
                            </div>
                        </div>
                        
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="telephone">Téléphone</label>
                                <input type="tel" id="telephone" name="telephone" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="sujet">Sujet</label>
                            <select id="sujet" name="sujet" required>
                                <option value="">Sélectionnez un sujet</option>
                                <option value="information">Demande d'information</option>
                                <option value="devis">Demande de devis</option>
                                <option value="reclamation">Réclamation</option>
                                <option value="emploi">Candidature d'emploi</option>
                                <option value="autre">Autre</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" rows="6" required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <div class="checkbox-option">
                                <input type="checkbox" id="consentement" name="consentement" required>
                                <label for="consentement">J'accepte que mes données soient traitées pour répondre à ma demande.</label>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-full">Envoyer le message</button>
                    </form>
                    
                    <div id="formSuccess" class="form-success" style="display: none;">
                        <div class="success-icon">
                            <i class="fas fa-check"></i>
                        </div>
                        <h3>Message envoyé avec succès !</h3>
                        <p>Nous vous répondrons dans les plus brefs délais. Merci de nous avoir contactés.</p>
                    </div>
                </div>
                
                <!-- Contact Info -->
                <div class="contact-info-container">
                    <div class="info-card">
                        <h2>Nos Coordonnées</h2>
                        
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="info-content">
                                <h3>Adresse</h3>
                                <p>123 Avenue Principale<br>Kinshasa, RDC</p>
                            </div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="info-content">
                                <h3>Téléphone</h3>
                                <p>+243 123 456 789<br>+243 987 654 321</p>
                            </div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="info-content">
                                <h3>Email</h3>
                                <p>contact@ambuservice.com<br>info@ambuservice.com</p>
                            </div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="info-content">
                                <h3>Heures d'ouverture</h3>
                                <p>Service d'ambulance : 24h/24, 7j/7<br>Bureau administratif : Lun-Ven, 8h-17h</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="social-card">
                        <h3>Suivez-nous</h3>
                        <div class="social-links">
                            <a href="#" class="social-link">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div class="emergency-card">
                        <div class="emergency-icon">
                            <i class="fas fa-ambulance"></i>
                        </div>
                        <h3>Besoin d'une ambulance en urgence ?</h3>
                        <p>Appelez notre numéro d'urgence ou utilisez notre service de commande en ligne.</p>
                        <a href="tel:+243123456789" class="btn btn-danger btn-full">
                            <i class="fas fa-phone"></i> +243 123 456 789
                        </a>
                        <a href="commande.html" class="btn btn-primary btn-full">
                            Commander en ligne
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="container">
            <h2>Notre Localisation</h2>
            <div class="map-container">
                <div id="map">
                    <div class="map-placeholder">
                        <p>Carte interactive sera affichée ici</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <h2>Questions fréquentes</h2>
            
            <div class="faq-list">
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>Comment puis-je commander une ambulance ?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Vous pouvez commander une ambulance en appelant notre numéro d'urgence au +243 123 456 789 ou en utilisant notre service de commande en ligne sur notre site web. Notre équipe est disponible 24h/24 et 7j/7 pour répondre à vos besoins.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>Quels sont les modes de paiement acceptés ?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Nous acceptons plusieurs modes de paiement pour votre confort : espèces, M-PESA, Orange Money, Airtel Money et cartes bancaires. Vous pouvez choisir votre mode de paiement préféré lors de la commande.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>Combien de temps faut-il pour qu'une ambulance arrive ?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Notre objectif est d'arriver sur les lieux dans les 15 minutes suivant votre appel pour les urgences. Le temps d'arrivée peut varier en fonction de la distance, des conditions de circulation et de la disponibilité des ambulances.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>Comment postuler pour un emploi chez AmbuService ?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Vous pouvez postuler en envoyant votre CV et lettre de motivation à emploi@ambuservice.com ou en remplissant le formulaire de contact sur cette page en sélectionnant "Candidature d'emploi" comme sujet. Nous sommes toujours à la recherche de professionnels de la santé passionnés.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>