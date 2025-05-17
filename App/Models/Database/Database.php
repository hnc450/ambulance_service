<?php
 
    class Database
    {
       private  static $connexion;
       private  static string $dns;
       private  static string $port;
       private  static string $database;
       private static string $user;
       private static string $password;
       private static mixed $statement;


       public function __construct(string $dns, string $port, string $database,string $user,string $password)
       {
          self::$dns = $dns;
          self::$database = $database;
          self::$port = $port;
          self::$user = $user;
          self::$password = $password;

          try
          {
           self::$connexion = new \PDO(self::$dns."=localhost:".self::$port.";dbname=".self::$database,self::$user,self::$password);
           self::$connexion->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
      
          }
          catch(\PDOException $exception)
          {
             die('Erreur de connexion '.$exception->getMessage());
          }
       }

       public static function setNewDatabase(string $database):void
       {
            self::$database = $database;
       }

       public static function getDatabase():string
       {
         return self::$database;
       }
       
       public static function QueryRequest(string $sql):array
       {
         try
         {
            return self::$connexion->query($sql)->fetchAll(PDO::FETCH_ASSOC);
         }
         catch(PDOException $exception)
         {
            die($exception->getMessage());
         }
       }

       public static function  executeQuery(string $sql,array $params)
       {
          self::$statement = self::$connexion->prepare($sql);
          self::$statement->execute($params);
          return self::$statement->fetchAll(PDO::FETCH_ASSOC);
       }
    }
?>
