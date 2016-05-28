<?php
require_once 'Conexion.php';

class Spa
{
 
private $con;
private $id_spa;
private $ids_spa;
private $ida_spa;
private $uc_spa;
private $fc_spa;

public function __construct()
{
 $this->con = Conexion::sing_conexion();   
}
//---------------------------------------------------------Se pasan las variables recibidas a locales
    public function setData($id_spa,$ids_spa,$ida_spa,$uc_spa,$fc_spa)
    {
        $this->id_spa=$id_spa;
        $this->ids_spa=$ids_spa;
        $this->ida_spa=$ida_spa;
        $this->uc_spa=$uc_spa;
        $this->fc_spa=$fc_spa;
    }

//---------------------------------------------------------Mostrar los datos de Subdirección
public function showDataSub($id= null) 
{   
    try{
$sql ="SELECT * FROM spa";
    
if($id != NULL)
{
$sql.=" WHERE ids_spa = ?";
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
    
//---------------------------------------------------------Mostrar los datos de Área
public function showDataAre($id= null) 
{   
    try{
$sql ="SELECT * FROM spa";
    
if($id != NULL)
{
$sql.=" WHERE ida_spa = ?";
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
         if($this->id_spa!=NULL) //Identificar si llega un ID nulo o declarado
         {
  $sql="UPDATE spa set ids_spa=?,ida_spa=?,uc_spa=?,fc_spa=? WHERE id_spa = ?";
             
         }else{
  $sql="INSERT into spa Values(NULL,?,?,?,?)";
         }
        $consulta = $this->con->prepare($sql);
            if($this->id_spa!=null)//Se asigna el valor del ID si esta declarado
            {
            $consulta->bindParam(1,$this->ids_spa);
            $consulta->bindParam(2,$this->ida_spa);
            $consulta->bindParam(3,$this->uc_spa);
            $consulta->bindParam(4,$this->fc_spa);
            $consulta->bindParam(5,$this->id_spa); 
            }else{
            $consulta->bindParam(1,$this->ids_spa);
            $consulta->bindParam(2,$this->ida_spa);
            $consulta->bindParam(3,$this->uc_spa);
            $consulta->bindParam(4,$this->fc_spa);
            }
        return $consulta->execute();
         
        $this->con=null;
        
      }catch(PDOException $e)//mensaje de error en caso de fallo
      {
      print "Error: ".$e->getMessage();   
      }  
   }
//---------------------------------------------------------Borrar datos  
    public function delData($id)
    {
        try{
            
        $sql="DELETE FROM spa where id_spa = ?";
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$id);
        return $consulta->execute();
        $this->con=null;
        
        
        }catch(PDOException $e)
        {
        print "Error: ".$e->getMessage();   
        } 
    }
    
}