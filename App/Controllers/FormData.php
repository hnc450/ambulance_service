<?php 
    //require dirname(__DIR__). DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'Database' . DIRECTORY_SEPARATOR . 'Database.php';
    // namespace App\Controllers;
    
    class FormData
    { 
       /** 
        * @var string $cookie_name : nom cookie
        * @var array $datas :  tableau a stocker dans le cookie
       */
    
        public static function souviens_toi_de_moi(string $cookie_name, array $datas):void
        {
           setcookie($cookie_name,serialize($datas),time() + 84600 * 60);
        }

        public static function sign_in(array $datas, string $methode):void
        {
          echo"<pre>";
          var_dump($datas);
          echo"<pre>";
          echo"<br/>".$methode;
          
           if($methode === "POST")
           {
             if(empty($datas['email']) || empty($datas['password']))
             {
              die("tout les chmaps sont requis");
               header("Location: /login?message=tout les champs sont obligatoire && color=red");
             
             }

             if(strlen($datas['email']) < 9)
             {
              die("email doit avoir plus de 9 caracteres");
               header("Location: /login?message=l email doit avoir au moins 9 caracteres && color=red");
             }

             if(strlen($datas['password']) < 9)
             {
              die("mot de passe 9 caracteres");
               header('Location:/login?message=le mot de passe doit avoir 9 caracteres && color=red');
             }

             if(!filter_var($datas['email'], FILTER_VALIDATE_EMAIL)) 
             {
               die("email invalide");
                header("Location :/login?message=addresse email invalide && color=red");
             }

             if(!preg_match("/^[a-zA-Z0-9]*$/",$datas['password']))
             {
                die("mot de passe doit avoir des chiffres et des lettres");
                header("Location: /login?message=le mot de passe doit contenir dea chiffres et des lettres && color=red");
             }     
             else
             {
              $email = $datas['email'];
              $mdp = $datas['password'];
              $user_exists = [];
              //Database::executeQuery("SELECT * FROM users WHERE email = ?",$datas['email'])
              var_dump(
          
                Database::QueryRequest("SELECT * FROM users WHERE email='$email'"),
                Database::executeQuery("SELECT * FROM users WHERE email=:email AND mot_de_passe=:mdp",
              [
                ':email' => $email,
                ':mdp' => $mdp
              ])
              );
              $user_exists = Database::executeQuery("SELECT * FROM users WHERE email=:email AND mot_de_passe=:mdp",
              [
                ':email' =>$email,
                ':mdp' => $mdp
              ]);
              echo '<br/>'.count($user_exists);

              if(count($user_exists) > 0)
              {
                die("Bon la c est bon");
                $_SESSION['user'] = $user_exists;

                if(!empty($datas['remeber']))
                {
                  FormData::souviens_toi_de_moi("Tokken",$datas);
                }
                
              }
              else
              {
                die("veuillez creer un compte");
                header("Location: /login?message=veuillez creer un compte &&color=red");
              }

             } 
          }
          else{}
        }

        public  static function sign_up(array $datas, string $methode):void
        {
      
           echo"<pre>";
                 var_dump($datas);
           echo"<pre>";
           echo"<br/>".$methode;
           echo "<br/>";
        
        
            if($methode === "POST")
            {
               if( empty($datas['prenom']) || empty($datas['nom']) || empty($datas['email']) || empty($datas['phone']) || empty($datas['password']) || empty($datas['confirmPassword'])) 
               {
                  echo "tout les champs sont obligatoire";
                  die();
                  header("Location: /register?message=tout les champs sont obligatoire && color=red");
               }
               if(strlen($datas['email']) < 9)
               {
            
                 die('le mot de passe doit avoir 9 caracteres');
                 header("Location: /register?message=l email doit avoir au moins 9 caracteres && color=red");
               }
               if(strlen($datas['password']) < 9)
               {
                  die("le mot de passe doit avoir 9 caracteres");
                  header('Location:/register?message=le mot de passe doit avoir 9 caracteres && color=red');
               }

               if (!filter_var($datas['email'], FILTER_VALIDATE_EMAIL)) 
               {
                 die("email invalide");
                 header("Location :/register?message=addresse email invalide && color=red");
               }
             
               if ($datas['password'] !== $datas['confirmPassword'])
               {
                die("mot de passe incorrect");
                 header("Location: /sign-up?message = les mots de passe doivent etre similaire && color=red");
               }
             
               if(!preg_match("/^[a-zA-Z]*$/",$datas['nom']) || !preg_match("/^[a-zA-Z]*$/",$datas['prenom']))
               {
                die("caractere incorrect pour le nom ou le prenom");
                 header("Location: /sign-up?message=le nom et prenom doivent etre compose de lettre et chiffre && color=red");
               }

              if(!preg_match("/^[0-9]*$/",$datas['phone']))
              {
                die("le numero doit avoir que des chiffres");
                header("Location: /sign-up?message=le numero de telephone doit etre compose de chiffre && color=red");
              }
              else
              {
                $user_exists = Database::executeQuery("SELECT nom FROM users WHERE email=:email AND mot_de_passe=:mdp",[
                  ':email' => $datas['email'],
                  ':mdp' => $datas['passsword']
                ]);

                die("c est bon pour l enreigistrement");
                if(count($user_exists) > 0)
                {
                  die("ce compte existe deja");
                  header("Location: /register?message=ce compte existe deja&&color=red");
                }
                else
                {
                  // Database::QueryRequest("INSERT INTO 
                  //     users(nom,genre,email,mot_de_passe,role,addresses,status,phone)
                  //     VALUES()
                  // ");
                  die("Compte creer avec success");
                  header("Location: /login?message=compte creer avec succes&&color=green");
                }

              }
            }
            else
             {
                header("Location: /register");
             }
        }
        public static function nous_contacter(array $datas, string $methode){}
    }
?>
