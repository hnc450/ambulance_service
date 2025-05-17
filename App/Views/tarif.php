<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Tarifs - AmbuService</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/tarifs.css">
</head>
<body>
  
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1>Nos Tarifs</h1>
            <p>Des tarifs transparents et adaptés à vos besoins</p>
        </div>
    </div>

    <!-- Pricing Section -->
     
    <section class="pricing-section">
        <div class="container">
            <div class="pricing-intro">
                <h2>Tarification simple et transparente</h2>
                <p>Chez AmbuService, nous croyons en une tarification transparente sans frais cachés. Nos tarifs sont calculés en fonction de la distance, du type de service et des équipements nécessaires. Vous pouvez obtenir une estimation précise en utilisant notre calculateur ci-dessous ou en nous contactant directement.</p>
            </div>

            <!-- Pricing Cards -->
            <div class="pricing-cards">
                <!-- Card 1 -->
                <div class="pricing-card">
                    <div class="card-header">
                        <div class="card-icon red">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <h3>Ambulance d'Urgence</h3>
                    </div>
                    <div class="card-price">
                        <span class="price">25,000</span>
                        <span class="currency">FC</span>
                        <span class="period">/ course de base</span>
                    </div>
                    <div class="card-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Intervention rapide 24/7</li>
                            <li><i class="fas fa-check"></i> Équipement médical complet</li>
                            <li><i class="fas fa-check"></i> Personnel médical qualifié</li>
                            <li><i class="fas fa-check"></i> Oxygène et matériel de réanimation</li>
                            <li><i class="fas fa-check"></i> Suivi en temps réel</li>
                        </ul>
                    </div>
                    <div class="card-note">
                        <p>+ 1,000 FC par kilomètre supplémentaire</p>
                    </div>
                    <div class="card-action">
                        <a href="commande.html" class="btn btn-primary btn-full">Commander</a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="pricing-card featured">
                    <div class="card-badge">Populaire</div>
                    <div class="card-header">
                        <div class="card-icon blue">
                            <i class="fas fa-ambulance"></i>
                        </div>
                        <h3>Transport Médical</h3>
                    </div>
                    <div class="card-price">
                        <span class="price">20,000</span>
                        <span class="currency">FC</span>
                        <span class="period">/ course de base</span>
                    </div>
                    <div class="card-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Transport inter-hospitalier</li>
                            <li><i class="fas fa-check"></i> Rendez-vous médicaux</li>
                            <li><i class="fas fa-check"></i> Personnel médical</li>
                            <li><i class="fas fa-check"></i> Équipement standard</li>
                            <li><i class="fas fa-check"></i> Assistance au patient</li>
                            <li><i class="fas fa-check"></i> Réservation à l'avance</li>
                        </ul>
                    </div>
                    <div class="card-note">
                        <p>+ 800 FC par kilomètre supplémentaire</p>
                    </div>
                    <div class="card-action">
                        <a href="commande.html" class="btn btn-primary btn-full">Réserver</a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="pricing-card">
                    <div class="card-header">
                        <div class="card-icon green">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h3>Couverture d'Événements</h3>
                    </div>
                    <div class="card-price">
                        <span class="price">Sur devis</span>
                    </div>
                    <div class="card-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Événements sportifs</li>
                            <li><i class="fas fa-check"></i> Concerts et festivals</li>
                            <li><i class="fas fa-check"></i> Conférences</li>
                            <li><i class="fas fa-check"></i> Équipe médicale complète</li>
                            <li><i class="fas fa-check"></i> Poste médical avancé</li>
                            <li><i class="fas fa-check"></i> Ambulance sur place</li>
                        </ul>
                    </div>
                    <div class="card-note">
                        <p>Tarif personnalisé selon la durée et le type d'événement</p>
                    </div>
                    <div class="card-action">
                        <a href="contact.html" class="btn btn-primary btn-full">Demander un devis</a>
                    </div>
                </div>
            </div>

            <!-- Price Calculator -->
            <div class="price-calculator">
                <h2>Calculateur de tarif</h2>
                <p>Estimez le coût de votre course d'ambulance en fonction de la distance et du type de service.</p>
                
                <div class="calculator-form">
                    <div class="form-group">
                        <label for="serviceType">Type de service</label>
                        <select id="serviceType">
                            <option value="urgence">Ambulance d'Urgence</option>
                            <option value="transport">Transport Médical</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="distance">Distance estimée (km)</label>
                        <input type="number" id="distance" min="1" value="5">
                    </div>
                    
                    <div class="form-group">
                        <label for="options">Options supplémentaires</label>
                        <div class="checkbox-group">
                            <div class="checkbox-option">
                                <input type="checkbox" id="oxygen" value="oxygen">
                                <label for="oxygen">Oxygène supplémentaire</label>
                            </div>
                            <div class="checkbox-option">
                                <input type="checkbox" id="medicalTeam" value="medicalTeam">
                                <label for="medicalTeam">Équipe médicale renforcée</label>
                            </div>
                            <div class="checkbox-option">
                                <input type="checkbox" id="waitingTime" value="waitingTime">
                                <label for="waitingTime">Temps d'attente</label>
                            </div>
                        </div>
                    </div>
                    
                    <button type="button" class="btn btn-primary" onclick="calculatePrice()">Calculer le prix</button>
                </div>
                
                <div class="calculator-result" id="calculatorResult">
                    <div class="result-box">
                        <h3>Estimation de prix</h3>
                        <div class="price-display">
                            <span id="estimatedPrice">0</span>
                            <span class="currency">FC</span>
                        </div>
                        <p class="result-note">Cette estimation est donnée à titre indicatif et peut varier en fonction des conditions réelles.</p>
                        <a href="commande.html" class="btn btn-primary btn-full">Commander maintenant</a>
                    </div>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="additional-info">
                <h2>Informations complémentaires</h2>
                
                <div class="info-grid">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <h3>Modes de paiement</h3>
                        <p>Nous acceptons plusieurs modes de paiement pour votre confort : espèces, M-PESA, Orange Money, Airtel Money et cartes bancaires.</p>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <h3>Facturation</h3>
                        <p>Une facture détaillée vous sera fournie après chaque service. Nous proposons également des contrats pour les entreprises et les établissements de santé.</p>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Assurances</h3>
                        <p>Nous travaillons avec la plupart des compagnies d'assurance. Contactez-nous pour vérifier si votre assurance couvre nos services.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <h2>Questions fréquentes sur nos tarifs</h2>
            
            <div class="faq-list">
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>Comment sont calculés vos tarifs ?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Nos tarifs sont calculés en fonction de plusieurs facteurs : le type de service demandé, la distance à parcourir, les équipements médicaux nécessaires et le personnel médical requis. Un tarif de base est appliqué, auquel s'ajoute un coût kilométrique.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>Les frais d'attente sont-ils inclus ?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Les frais d'attente ne sont pas inclus dans le tarif de base. Si l'ambulance doit attendre sur place (par exemple, pendant un rendez-vous médical), des frais supplémentaires de 5,000 FC par heure d'attente sont appliqués.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>Mon assurance couvre-t-elle vos services ?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Nous travaillons avec plusieurs compagnies d'assurance. La couverture dépend de votre police d'assurance spécifique. Nous vous recommandons de contacter votre assureur pour vérifier votre couverture avant d'utiliser nos services. Nous pouvons également vous aider dans cette démarche.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>Y a-t-il des frais supplémentaires pour les services de nuit ?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Oui, pour les services entre 22h et 6h du matin, un supplément de 20% est appliqué au tarif de base. Ce supplément ne s'applique pas au coût kilométrique.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <h3>Proposez-vous des tarifs spéciaux pour les trajets réguliers ?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Oui, nous proposons des forfaits avantageux pour les patients nécessitant des transports réguliers, comme pour des séances de dialyse ou de chimiothérapie. Contactez-nous pour discuter de vos besoins spécifiques et obtenir un devis personnalisé.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>