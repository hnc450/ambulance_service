<?php
   //require './App/Models/Database/Database.php';
   class User
   {
        public static function se_deconnecter()
        {
          session_destroy();
          unset($_SESSION['user']);
        }
        
        public static function supprimer_mon_compte(int $id)
        {
            Database::executeQuery("DELETE FROM users WHERE id=:id",[':id'=>$id]);
        }
        public function modifier_profile()
        {}
   }
?>