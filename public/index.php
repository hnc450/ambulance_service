<?php 
  session_start();
  require dirname(__DIR__).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
  require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR . 'Controllers' . DIRECTORY_SEPARATOR . 'PageController.php';
  require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR . 'Controllers' . DIRECTORY_SEPARATOR . 'FormData.php';
  require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR . 'Controllers' . DIRECTORY_SEPARATOR . 'User.php';
  
  require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'Database' . DIRECTORY_SEPARATOR .'Database.php';

  use AltoRouter as Route;
  $routes = new Route();
  $database = new Database("mysql:host","3306","ambulance","root","");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AmbuService - Service de Location d'Ambulance</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styles.css"> -
    <link rel="stylesheet" href="css/responsive.css"> 
    <link rel="stylesheet" href="./css/profile.css">
    <script src="./js/main.js" defer></script>
    <script src="./js/tarifs.js" defer></script>
    <script src="./js/a-propos.js" defer></script>
    <script src="./js/commande.js" defer></script>
    <script src="./js/suivi.js" defer></script>
    <script src="./js/dashboard/main.js"></script>
     <script src="./js/profile-script.js"></script> 
    <script src="./js/script.js"></script> 
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
                        <li><a href="/" class="active">Accueil</a></li>
                        <li><a href="/service">Services</a></li>
                        <li><a href="/propos">À propos</a></li>
                        <li><a href="/tarif">Tarifs</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </nav>
             <?php if(isset($_SESSION['user'])):?>   
                <div class="cta-button desktop-only">
                    <a href="/profile" class="btn btn-primary">
                        <i class="fa-solid fa-user"></i>
                    </a>
                </div>
                
                <div class="cta-button desktop-only">
                    <a href="/commande" class="btn btn-primary">
                        <i class="fas fa-phone"></i> Commander
                    </a>
                </div>
             <?php else: ?>
                <div class="cta-button desktop-only">
                    <a href="/login" class="btn btn-primary">
                      login
                    </a>
                </div>

                <div class="cta-button desktop-only">
                    <a href="/register" class="btn btn-primary">
                      sign-up
                    </a>
                </div>

                <div class="cta-button desktop-only">
                    <a href="/dash" class="btn btn-primary">
                      dashboard
                    </a>
                </div>
         <?php endif?>
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
                <li><a href="/" class="active">Accueil</a></li>
                <li><a href="/service">Services</a></li>
                <li><a href="/a-propos">À propos</a></li>
                <li><a href="/tarif">Tarifs</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
          <?php if(isset($_SESSION['user'])) :?>
            <a href="/commande" class="btn btn-primary btn-full">
                <i class="fas fa-phone"></i> Commander une Ambulance
            </a>
          <?php else: ?>
            <a href="/login" class="btn btn-primary btn-full">
                <i class="fas fa-lock"></i> login
            </a>
         <?php endif ?>
        </nav>
    </div>


    <?php

       if($_SERVER['REQUEST_URI'] === "/")
       {
         require '../App/Views/home.php';
       }
        
        $routes->map('GET','/[a:name]',function($fichier){
          PageController::page($fichier);
        });
      
        $routes->map('POST','/login',function(){
            FormData::sign_in($_POST,$_SERVER['REQUEST_METHOD']);
        },'sign-in');
        $routes->map('POST','/sign',function(){
            FormData::sign_up($_POST,$_SERVER['REQUEST_METHOD']);
        },'to-sign-up');
        $routes->map('POST','/contactez',function(){
            FormData::nous_contacter($_POST,$_SERVER['REQUEST_METHOD']);
        },'nous-contactez');

        $routes->map('POST','/users/[i:id]',function($id){
            User::supprimer_mon_compte($id['id']);
        });

        $match = $routes->match();

        if($match)
        {
            if(is_callable($match['target']))
            {
              call_user_func($match['target'],$match['params']);
            }

            else
            {
                list($controllerName,$method) = explode("#",$match['target']);
                $controller = new $controllerName();
                call_user_func_array([$controller,$method],$match['params']);
            }       
        }
    ?>

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

   
</body>
</html>
