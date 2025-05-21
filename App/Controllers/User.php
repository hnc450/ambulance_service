<?php

   class User
   {
        public  function se_deconnecter()
        {
          $id = $_SESSION['user'][0]['id'];
          session_destroy();
          unset($_SESSION['user']);
          Database::QueryRequest("UPDATE users SET status=0 WHERE id=$id",3);
          header("Location: /");
        }
        
        public static function supprimer_mon_compte(int $id)
        {
           Database::executeQuery("DELETE FROM users WHERE id=:id",[':id'=>$id],4);
        }
        
        public static function modifier_mot_de_passe(array $datas, string $methode , int $id)
        {
          if($methode ==="POST")
          {
              if(empty($datas['current_password']) ||empty($datas['new_password']) || empty($datas['confirm_password']))
              {
                die("Veuillez remplir tout les champs pour modifier le mot de passe");
              }

              if(strlen($datas['current_password'] < 9 || strlen($datas['new_password']) < 9|| strlen($datas['confirm_password']) < 9))
              { 
                die("Le mot de passe doit avoir plus de 9 caracteres");
              }

              if($datas['new_password'] !== $datas['confirm_password'])
              {
                die("Nouveau mot de passe incorrect");
              }

              if(!preg_match('/^[a-zA-Z0-9]$/',$datas['current_password']) || !preg_match('/^[a-zA-Z0-9]$/',$datas['new_password'])  || !preg_match('/^[a-zA-Z0-9]$/',$datas['confirm_password']))
              {
                 die("le nouveau mot de passe doit avoir des chiffres et des lettres");
              }
              else
              {
                $mdp = $datas['new_password'];
                Database::QueryRequest("UPDATE users SET mot_de_passe='$mdp' WHERE id=$id",3);
              }

          }
        }
   }
?>
