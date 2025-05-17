<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription | AmbuLocation</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <main class="form-container">
        <div class="form-card">
            <div class="form-header">
                <h2>Inscription</h2>
                <p>Créez votre compte AmbuLocation</p>
                <p style="color: <?= $_GET['color'] ?? ''?>"><?= $_GET['message'] ?? ''?></p>
            </div>
            <form  action="/sign"  id="registerForm"  method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label for="firstName">Prénom</label>
                        <div class="input-with-icon">
                            <i class="fas fa-user"></i>
                            <input type="text" id="firstName" name="prenom" placeholder="Votre prénom" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Nom</label>
                        <div class="input-with-icon">
                            <i class="fas fa-user"></i>
                            <input type="text" id="lastName" name="nom" placeholder="Votre nom" value="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" placeholder="Votre adresse email"  value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone">Téléphone</label>
                    <div class="input-with-icon">
                        <i class="fas fa-phone"></i>
                        <input type="tel" id="phone" name="phone" placeholder="Votre numéro de téléphone" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Créez un mot de passe" value="">
                        <i class="fas fa-eye toggle-password"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirmer le mot de passe</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirmez votre mot de passe"  value="">
                        <i class="fas fa-eye toggle-password"></i>
                    </div>
                </div>
                <div class="form-options">
                    <div class="remember-me">
                        <input type="checkbox" id="terms" name="terms" >
                        <label for="terms">J'accepte les <a href="?condition=condition">conditions d'utilisation</a> et la <a href="?politique=politique">politique de confidentialité</a></label>
                    </div>
                </div>
                <button type="submit" class="btn btn-full btn-primary">S'inscrire</button>
                <div class="form-footer">
                    <p>Déjà un compte? <a href="/login">Se connecter</a></p>
                </div>
            </form>
        </div>
    </main>
</body>
</html>