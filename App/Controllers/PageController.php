<?php 
  class PageController
  {
    public static function dashboard($FILE){
      echo $FILE['name'];
     
      require dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'admin' .  DIRECTORY_SEPARATOR . $FILE['name'] .".php";
      die(dirname(dirname(__DIR__)));

    }
    public static function page($FICHIER)
    {
      echo  var_dump($FICHIER)."<br/>";
      $verity = file_exists(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.$FICHIER['name'].'.php');
      echo $FICHIER['name'];
      echo var_dump(file_exists(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.$FICHIER['name'].'.php'));
      echo $verity;
 
  
      if(file_exists(dirname(__DIR__).DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.$FICHIER['name'].'.php'))
      {
         require dirname(__DIR__)
         . DIRECTORY_SEPARATOR .'Views'
         . DIRECTORY_SEPARATOR . $FICHIER['name'].'.php';
      }
      else
      {
        require dirname(__DIR__) . DIRECTORY_SEPARATOR .'Views' . DIRECTORY_SEPARATOR .'404.html';  
      }
    }
  }

?>