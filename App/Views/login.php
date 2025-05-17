<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | AmbuLocation</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <main class="form-container">
        <div class="form-card">
            <div class="form-header">
                <h2>Connexion</h2>
                <p>Accédez à votre compte AmbuLocation</p>
                <p style="color: <?= $_GET['color'] ?? '' ?>"> <?= $_GET['message'] ?? '' ?></p>
            </div>
            <form  action="/login"  id="loginForm" method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" placeholder="Votre adresse email" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Votre mot de passe" >
                        <i class="fas fa-eye toggle-password"></i>
                    </div>
                </div>
                <div class="form-options">
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember" value="remember">
                        <label for="remember">Se souvenir de moi</label>
                    </div>
                    <a href="#" class="forgot-password">Mot de passe oublié?</a>
                </div>
                <button type="submit" class="btn btn-full btn-primary">Se connecter</button>
                <div class="form-footer">
                    <p>Pas encore de compte? <a href="/register">S'inscrire</a></p>
                </div>
            </form>
        </div>
    </main>
 
</body>
</html>