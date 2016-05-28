<?php 
setlocale(LC_ALL,NULL);
setlocale(LC_ALL,'es_ES.UTF-8'); 

class Conexion
{
    private static $instancia; //Variable de instancia
    private $con; //variable de conexion 
    
    private function __construct()
    {
    
    try
    { 
        
    $this->con = new PDO('mysql:host=localhost;dbname=rppc','root',''); //Variables con comillas dobles     
    $this->con->exec("SET CHARSET utf8");
        
    }catch(PDOException $e)
    {
        
    echo "Error: ".$e->getMessage();
    die();
        
    }
        
    }
    
    public static function sing_conexion()
    {
      if(!Isset(self::$instancia))
      {
       $miclase=__CLASS__;
       self::$instancia = new $miclase;
      }
        return self::$instancia;
    }
    
    public function __clone()
    {
     trigger_error('La clonacion no es permitida',E_USER_ERROR);   
    }
    
    
    public function prepare($sql) //preparador de sql, evita sql injection
    {
       return $this->con->prepare($sql);
    }
    
    public function last_Id(){
     return $this->con->lastInsertId();
    }

}

