<?php
require_once 'Conexion.php';

class Log
{
 
private $con;
private $id_log;
private $accion_log;
private $tipo_log;
private $uc_log;
private $fc_log;

public function __construct()
{
 $this->con = Conexion::sing_conexion();   
}
//---------------------------------------------------------Se pasan las variables recibidas a locales
    public function setData($id_log,$accion_log,$tipo_log,$uc_log,$fc_log)
    {
        $this->id_log=$id_log;
        $this->accion_log=$accion_log;
        $this->tipo_log=$tipo_log;
        $this->uc_log=$uc_log;
        $this->fc_log=$fc_log;
    }

//---------------------------------------------------------Mostrar los datos
public function showData($id= null) 
{   
    try{
$sql ="SELECT * FROM logs ";
    
if($id != NULL)
{
$sql.=" WHERE tipo_log = ? ";
}
    $consulta = $this->con->prepare($sql);       
        
        if($id != NULL) //Si llega un id en especial se hace la asingacion del orden
        {
        $consulta->bindParam(1,$id);
        }
        
    $consulta->execute();
    $this->con=NULL;//cierra la conexion
        if($consulta->rowCount()>0)//mostrar o no el resultado de la consulta
        {
            return $consulta;
        }else{
            return false;
        }
        
    }catch(PDOException $e){//mensaje de error en caso de fallo
      print "Error: ".$e->getMessage();   
    }
}
    
//---------------------------------------------------------Agregar o modificar los datos
   public function addData()
   {
    try
      {
         if($this->id_log!=NULL) //Identificar si llega un ID nulo o declarado
         {
  $sql="UPDATE logs set accion_log=?,tipo_log=?,uc_log=?,fc_log=? WHERE id_log = ?";
             
         }else{
  $sql="INSERT into logs Values(NULL,?,?,?,?)";
         }
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$this->accion_log);
        $consulta->bindParam(2,$this->tipo_log);
        $consulta->bindParam(3,$this->uc_log);
        $consulta->bindParam(4,$this->fc_log);
            if($this->id_log!=null)//Se asigna el valor del ID si esta declarado
            {
            $consulta->bindParam(5,$this->id_log);  
            }
        $consulta->execute();
        $this->con=null;
        
      }catch(PDOException $e)//mensaje de error en caso de fallo
      {
      print "Error: ".$e->getMessage();   
      }  
   }
//---------------------------------------------------------Borrar datos  
    public function delData()
    {
        try{
            
        $sql="DELETE FROM logs";
        $consulta = $this->con->prepare($sql);
        return $consulta->execute();
        $this->con=null;
        
        
        }catch(PDOException $e)
        {
        print "Error: ".$e->getMessage();   
        } 
    }
    
}