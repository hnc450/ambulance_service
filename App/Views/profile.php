<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil | AmbuLocation</title>
    <link rel="stylesheet" href="profile.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <main class="profile-container">
        <div class="container">
            <div class="profile-header">
                <div class="profile-cover">
                    <div class="profile-avatar">
                        <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80" alt="Photo de profil">
                        <div class="avatar-edit">
                            <i class="fas fa-camera"></i>
                        </div>
                    </div>
                </div>
                <div class="profile-info">
                    <h2>Thomas Dubois</h2>
                    <p class="profile-status"><i class="fas fa-circle"></i> Client Premium</p>
                    <div class="profile-actions">
                        <button class="btn btn-outline">
                            <i class="fas fa-edit"></i> Modifier le profil
                        </button>
                        <button class="btn btn-primary">
                            <i class="fas fa-ambulance"></i> Réserver une ambulance
                        </button>
                    </div>
                </div>
            </div>

            <div class="profile-dashboard">
                <div class="dashboard-card">
                    <div class="dashboard-icon">
                        <i class="fas fa-ambulance"></i>
                    </div>
                    <div class="dashboard-info">
                        <h3>12</h3>
                        <p>Locations</p>
                    </div>
                </div>
                <div class="dashboard-card">
                    <div class="dashboard-icon">
                        <i class="fas fa-file-medical"></i>
                    </div>
                    <div class="dashboard-info">
                        <h3>8</h3>
                        <p>Cas médicaux</p>
                    </div>
                </div>
                <div class="dashboard-card">
                    <div class="dashboard-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="dashboard-info">
                        <h3>4.8</h3>
                        <p>Note moyenne</p>
                    </div>
                </div>
                <div class="dashboard-card">
                    <div class="dashboard-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="dashboard-info">
                        <h3>2</h3>
                        <p>Réservations à venir</p>
                    </div>
                </div>
            </div>

            <div class="profile-content">
                <div class="profile-tabs">
                    <button class="tab-btn active" data-tab="info">
                        <i class="fas fa-user"></i> Informations
                    </button>
                    <button class="tab-btn" data-tab="bookings">
                        <i class="fas fa-history"></i> Locations
                    </button>
                    <button class="tab-btn" data-tab="cases">
                        <i class="fas fa-file-medical"></i> Cas médicaux
                    </button>
                    <button class="tab-btn" data-tab="settings">
                        <i class="fas fa-cog"></i> Paramètres
                    </button>
                </div>

                <div class="tab-content active" id="info">
                    <div class="profile-section">
                        <h3 class="section-title">Informations personnelles</h3>
                        <div class="info-grid">
                            <div class="info-item">
                                <span class="info-label">Nom complet</span>
                                <span class="info-value">Thomas Dubois</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Email</span>
                                <span class="info-value">thomas.dubois@email.com</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Téléphone</span>
                                <span class="info-value">+33 6 12 34 56 78</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Date de naissance</span>
                                <span class="info-value">15/04/1985</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Adresse</span>
                                <span class="info-value">123 Avenue de la Santé, 75001 Paris</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Membre depuis</span>
                                <span class="info-value">Juin 2022</span>
                            </div>
                        </div>
                    </div>

                    <div class="profile-section">
                        <h3 class="section-title">Informations médicales</h3>
                        <div class="info-grid">
                            <div class="info-item">
                                <span class="info-label">Groupe sanguin</span>
                                <span class="info-value">A+</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Allergies</span>
                                <span class="info-value">Pénicilline</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Conditions médicales</span>
                                <span class="info-value">Hypertension</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Contact d'urgence</span>
                                <span class="info-value">Marie Dubois - +33 6 98 76 54 32</span>
                            </div>
                        </div>
                    </div>

                    <div class="profile-section">
                        <h3 class="section-title">Documents</h3>
                        <div class="documents-list">
                            <div class="document-item">
                                <div class="document-icon">
                                    <i class="fas fa-file-pdf"></i>
                                </div>
                                <div class="document-info">
                                    <h4>Carte d'identité</h4>
                                    <p>Ajouté le 12/06/2022</p>
                                </div>
                                <div class="document-actions">
                                    <button class="btn-icon" aria-label="Voir le document">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn-icon" aria-label="Télécharger le document">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="document-item">
                                <div class="document-icon">
                                    <i class="fas fa-file-pdf"></i>
                                </div>
                                <div class="document-info">
                                    <h4>Carte vitale</h4>
                                    <p>Ajouté le 12/06/2022</p>
                                </div>
                                <div class="document-actions">
                                    <button class="btn-icon" aria-label="Voir le document">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn-icon" aria-label="Télécharger le document">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="document-item">
                                <div class="document-icon">
                                    <i class="fas fa-file-pdf"></i>
                                </div>
                                <div class="document-info">
                                    <h4>Dossier médical</h4>
                                    <p>Ajouté le 15/07/2022</p>
                                </div>
                                <div class="document-actions">
                                    <button class="btn-icon" aria-label="Voir le document">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn-icon" aria-label="Télécharger le document">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </div>
                            <button class="btn btn-outline btn-sm add-document">
                                <i class="fas fa-plus"></i> Ajouter un document
                            </button>
                        </div>
                    </div>
                </div>

                <div class="tab-content" id="bookings">
                    <div class="profile-section">
                        <div class="section-header">
                            <h3 class="section-title">Réservations à venir</h3>
                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Nouvelle réservation
                            </button>
                        </div>
                        <div class="bookings-list">
                            <div class="booking-item upcoming">
                                <div class="booking-status">
                                    <span class="status-badge confirmed">Confirmée</span>
                                    <span class="booking-date">25 Mai 2023</span>
                                </div>
                                <div class="booking-details">
                                    <div class="booking-info">
                                        <h4>Transport médical - Hôpital Saint-Louis</h4>
                                        <p><i class="fas fa-map-marker-alt"></i> De: 123 Avenue de la Santé, Paris</p>
                                        <p><i class="fas fa-map-marker-alt"></i> À: Hôpital Saint-Louis, Paris</p>
                                        <p><i class="fas fa-clock"></i> 10:30 - Type: Ambulance médicalisée</p>
                                    </div>
                                    <div class="booking-actions">
                                        <button class="btn btn-outline btn-sm">
                                            <i class="fas fa-edit"></i> Modifier
                                        </button>
                                        <button class="btn btn-accent btn-sm">
                                            <i class="fas fa-times"></i> Annuler
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="booking-item upcoming">
                                <div class="booking-status">
                                    <span class="status-badge confirmed">Confirmée</span>
                                    <span class="booking-date">30 Mai 2023</span>
                                </div>
                                <div class="booking-details">
                                    <div class="booking-info">
                                        <h4>Transport médical - Centre de rééducation</h4>
                                        <p><i class="fas fa-map-marker-alt"></i> De: 123 Avenue de la Santé, Paris</p>
                                        <p><i class="fas fa-map-marker-alt"></i> À: Centre de rééducation, Versailles</p>
                                        <p><i class="fas fa-clock"></i> 14:00 - Type: Ambulance standard</p>
                                    </div>
                                    <div class="booking-actions">
                                        <button class="btn btn-outline btn-sm">
                                            <i class="fas fa-edit"></i> Modifier
                                        </button>
                                        <button class="btn btn-accent btn-sm">
                                            <i class="fas fa-times"></i> Annuler
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="profile-section">
                        <h3 class="section-title">Historique des locations</h3>
                        <div class="bookings-list">
                            <div class="booking-item past">
                                <div class="booking-status">
                                    <span class="status-badge completed">Terminée</span>
                                    <span class="booking-date">15 Mai 2023</span>
                                </div>
                                <div class="booking-details">
                                    <div class="booking-info">
                                        <h4>Transport médical - Clinique du Sport</h4>
                                        <p><i class="fas fa-map-marker-alt"></i> De: 123 Avenue de la Santé, Paris</p>
                                        <p><i class="fas fa-map-marker-alt"></i> À: Clinique du Sport, Paris</p>
                                        <p><i class="fas fa-clock"></i> 09:00 - Type: Ambulance standard</p>
                                    </div>
                                    <div class="booking-actions">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <button class="btn btn-outline btn-sm">
                                            <i class="fas fa-file-alt"></i> Facture
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="booking-item past">
                                <div class="booking-status">
                                    <span class="status-badge completed">Terminée</span>
                                    <span class="booking-date">5 Mai 2023</span>
                                </div>
                                <div class="booking-details">
                                    <div class="booking-info">
                                        <h4>Transport médical - Hôpital Necker</h4>
                                        <p><i class="fas fa-map-marker-alt"></i> De: 123 Avenue de la Santé, Paris</p>
                                        <p><i class="fas fa-map-marker-alt"></i> À: Hôpital Necker, Paris</p>
                                        <p><i class="fas fa-clock"></i> 11:30 - Type: Ambulance médicalisée</p>
                                    </div>
                                    <div class="booking-actions">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <button class="btn btn-outline btn-sm">
                                            <i class="fas fa-file-alt"></i> Facture
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="booking-item past">
                                <div class="booking-status">
                                    <span class="status-badge completed">Terminée</span>
                                    <span class="booking-date">20 Avril 2023</span>
                                </div>
                                <div class="booking-details">
                                    <div class="booking-info">
                                        <h4>Transport médical - Centre d'imagerie</h4>
                                        <p><i class="fas fa-map-marker-alt"></i> De: 123 Avenue de la Santé, Paris</p>
                                        <p><i class="fas fa-map-marker-alt"></i> À: Centre d'imagerie, Paris</p>
                                        <p><i class="fas fa-clock"></i> 15:45 - Type: Ambulance standard</p>
                                    </div>
                                    <div class="booking-actions">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <button class="btn btn-outline btn-sm">
                                            <i class="fas fa-file-alt"></i> Facture
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-outline btn-sm view-more">
                                <i class="fas fa-history"></i> Voir plus d'historique
                            </button>
                        </div>
                    </div>
                </div>

                <div class="tab-content" id="cases">
                    <div class="profile-section">
                        <div class="section-header">
                            <h3 class="section-title">Cas médicaux actifs</h3>
                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Nouveau cas
                            </button>
                        </div>
                        <div class="cases-list">
                            <div class="case-item active">
                                <div class="case-status">
                                    <span class="status-badge in-progress">En cours</span>
                                    <span class="case-id">Cas #12458</span>
                                </div>
                                <div class="case-details">
                                    <div class="case-info">
                                        <h4>Suivi post-opératoire</h4>
                                        <p><i class="fas fa-user-md"></i> Dr. Martin - Chirurgie orthopédique</p>
                                        <p><i class="fas fa-hospital"></i> Hôpital Saint-Louis</p>
                                        <p><i class="fas fa-calendar-alt"></i> Début: 10 Mai 2023 - Fin prévue: 10 Juin 2023</p>
                                    </div>
                                    <div class="case-actions">
                                        <button class="btn btn-outline btn-sm">
                                            <i class="fas fa-eye"></i> Détails
                                        </button>
                                        <button class="btn btn-primary btn-sm">
                                            <i class="fas fa-ambulance"></i> Réserver
                                        </button>
                                    </div>
                                </div>
                                <div class="case-progress">
                                    <div class="progress-bar">
                                        <div class="progress" style="width: 60%;"></div>
                                    </div>
                                    <span class="progress-text">60% complété</span>
                                </div>
                            </div>
                            <div class="case-item active">
                                <div class="case-status">
                                    <span class="status-badge in-progress">En cours</span>
                                    <span class="case-id">Cas #12475</span>
                                </div>
                                <div class="case-details">
                                    <div class="case-info">
                                        <h4>Rééducation physique</h4>
                                        <p><i class="fas fa-user-md"></i> Dr. Dupont - Kinésithérapie</p>
                                        <p><i class="fas fa-hospital"></i> Centre de rééducation Versailles</p>
                                        <p><i class="fas fa-calendar-alt"></i> Début: 15 Mai 2023 - Fin prévue: 15 Juillet 2023</p>
                                    </div>
                                    <div class="case-actions">
                                        <button class="btn btn-outline btn-sm">
                                            <i class="fas fa-eye"></i> Détails
                                        </button>
                                        <button class="btn btn-primary btn-sm">
                                            <i class="fas fa-ambulance"></i> Réserver
                                        </button>
                                    </div>
                                </div>
                                <div class="case-progress">
                                    <div class="progress-bar">
                                        <div class="progress" style="width: 25%;"></div>
                                    </div>
                                    <span class="progress-text">25% complété</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="profile-section">
                        <h3 class="section-title">Historique des cas médicaux</h3>
                        <div class="cases-list">
                            <div class="case-item past">
                                <div class="case-status">
                                    <span class="status-badge completed">Terminé</span>
                                    <span class="case-id">Cas #12356</span>
                                </div>
                                <div class="case-details">
                                    <div class="case-info">
                                        <h4>Traitement cardiologique</h4>
                                        <p><i class="fas fa-user-md"></i> Dr. Leroy - Cardiologie</p>
                                        <p><i class="fas fa-hospital"></i> Hôpital Européen Georges Pompidou</p>
                                        <p><i class="fas fa-calendar-alt"></i> 10 Janvier 2023 - 15 Mars 2023</p>
                                    </div>
                                    <div class="case-actions">
                                        <button class="btn btn-outline btn-sm">
                                            <i class="fas fa-eye"></i> Rapport
                                        </button>
                                        <button class="btn btn-outline btn-sm">
                                            <i class="fas fa-file-medical"></i> Dossier
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="case-item past">
                                <div class="case-status">
                                    <span class="status-badge completed">Terminé</span>
                                    <span class="case-id">Cas #12289</span>
                                </div>
                                <div class="case-details">
                                    <div class="case-info">
                                        <h4>Consultation neurologique</h4>
                                        <p><i class="fas fa-user-md"></i> Dr. Bernard - Neurologie</p>
                                        <p><i class="fas fa-hospital"></i> Hôpital de la Pitié-Salpêtrière</p>
                                        <p><i class="fas fa-calendar-alt"></i> 5 Novembre 2022 - 20 Décembre 2022</p>
                                    </div>
                                    <div class="case-actions">
                                        <button class="btn btn-outline btn-sm">
                                            <i class="fas fa-eye"></i> Rapport
                                        </button>
                                        <button class="btn btn-outline btn-sm">
                                            <i class="fas fa-file-medical"></i> Dossier
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-outline btn-sm view-more">
                                <i class="fas fa-history"></i> Voir plus d'historique
                            </button>
                        </div>
                    </div>
                </div>

                <div class="tab-content" id="settings">
                    <div class="profile-section">
                        <h3 class="section-title">Paramètres du compte</h3>
                        <form class="settings-form">
                            <div class="form-group">
                                <label for="email">Adresse email</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-envelope"></i>
                                    <input type="email" id="email" name="email" value="thomas.dubois@email.com">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone">Numéro de téléphone</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-phone"></i>
                                    <input type="tel" id="phone" name="phone" value="+33 6 12 34 56 78">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Adresse</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-home"></i>
                                    <input type="text" id="address" name="address" value="123 Avenue de la Santé, 75001 Paris">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="language">Langue</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-globe"></i>
                                    <select id="language" name="language">
                                        <option value="fr" selected>Français</option>
                                        <option value="en">English</option>
                                        <option value="es">Español</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Enregistrer les modifications
                            </button>
                        </form>
                    </div>

                    <div class="profile-section">
                        <h3 class="section-title">Sécurité</h3>
                        <form class="settings-form">
                            <div class="form-group">
                                <label for="current-password">Mot de passe actuel</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" id="current-password" name="current-password">
                                    <i class="fas fa-eye toggle-password"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="new-password">Nouveau mot de passe</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" id="new-password" name="new-password">
                                    <i class="fas fa-eye toggle-password"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirm-password">Confirmer le nouveau mot de passe</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" id="confirm-password" name="confirm-password">
                                    <i class="fas fa-eye toggle-password"></i>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-key"></i> Changer le mot de passe
                            </button>
                        </form>
                    </div>

                    <div class="profile-section">
                        <h3 class="section-title">Notifications</h3>
                        <div class="notification-settings">
                            <div class="notification-option">
                                <div class="notification-info">
                                    <h4>Notifications par email</h4>
                                    <p>Recevoir des emails pour les confirmations de réservation</p>
                                </div>
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="notification-option">
                                <div class="notification-info">
                                    <h4>Notifications par SMS</h4>
                                    <p>Recevoir des SMS pour les rappels de rendez-vous</p>
                                </div>
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="notification-option">
                                <div class="notification-info">
                                    <h4>Offres promotionnelles</h4>
                                    <p>Recevoir des offres et promotions spéciales</p>
                                </div>
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="notification-option">
                                <div class="notification-info">
                                    <h4>Newsletters</h4>
                                    <p>Recevoir notre newsletter mensuelle</p>
                                </div>
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="profile-section danger-zone">
                        <h3 class="section-title">Zone de danger</h3>
                        <div class="danger-actions">
                            <div class="danger-action">
                                <div class="danger-info">
                                    <h4>Désactiver le compte</h4>
                                    <p>Votre compte sera temporairement désactivé</p>
                                </div>
                                <button class="btn btn-outline btn-danger">
                                    <i class="fas fa-user-slash"></i> Désactiver
                                </button>
                            </div>
                            <div class="danger-action">
                                <div class="danger-info">
                                    <h4>Supprimer le compte</h4>
                                    <p>Toutes vos données seront définitivement supprimées</p>
                                </div>
                                <!--
                                     mettre la routes /users/ suivi de l id
                                     pour la suppression en gros on doit utiliser
                                     la session ou le cookie ;
                                     exemple /users/2
                                  -->
                             <form action="#" method="POST">
                                <button class="btn btn-danger" type="submit">
                                    <i class="fas fa-trash-alt"></i> Supprimer
                                </button>
                             </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        // Tabs functionality
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-btn');
            const tabContents = document.querySelectorAll('.tab-content');
            
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons and contents
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));
                    
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    // Show corresponding content
                    const tabId = this.getAttribute('data-tab');
                    document.getElementById(tabId).classList.add('active');
                });
            });
        });
    </script>
</body>
</html>