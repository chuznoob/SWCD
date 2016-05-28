<?php
require_once 'Conexion.php';

class Proceso
{
 
private $con;
private $id_proceso;
private $nom_proceso;
private $uc_proceso;
private $fc_proceso;
private $um_proceso;
private $fm_proceso;

public function __construct()
{
 $this->con = Conexion::sing_conexion();   
}
//---------------------------------------------------------Se pasan las variables recibidas a locales
    public function setData($id_proceso,$nom_proceso,$uc_proceso,$fc_proceso,$um_proceso,$fm_proceso)
    {
        $this->id_proceso=$id_proceso;
        $this->nom_proceso=$nom_proceso;
        $this->uc_proceso=$uc_proceso;
        $this->fc_proceso=$fc_proceso;
        $this->um_proceso=$um_proceso;
        $this->fm_proceso=$fm_proceso;
    }

//---------------------------------------------------------Mostrar los datos
public function showData($id= null) 
{   
    try{
$sql ="SELECT * FROM procesos";
    
if($id != NULL)
{
$sql.=" WHERE id_proceso = ?";
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
         if($this->id_proceso!=NULL) //Identificar si llega un ID nulo o declarado
         {
  $sql="UPDATE procesos set nom_proceso=?,um_proceso=?,fm_proceso=? WHERE id_proceso = ?";
             
         }else{
  $sql="INSERT into procesos Values(NULL,?,?,?,NULL,NULL)";
         }
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$this->nom_proceso);
            if($this->id_proceso!=null)//Se asigna el valor del ID si esta declarado
            {
            $consulta->bindParam(2,$this->um_proceso);
            $consulta->bindParam(3,$this->fm_proceso);
            $consulta->bindParam(4,$this->id_proceso);  
            }else{
            $consulta->bindParam(2,$this->uc_proceso);
            $consulta->bindParam(3,$this->fc_proceso);
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
            
        $sql="DELETE FROM procesos where id_proceso = ?";
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