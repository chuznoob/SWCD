<?php
require_once 'Conexion.php';

class Pps
{
 
private $con;
private $id_pps;
private $idp_pps;
private $ids_pps;
private $uc_pps;
private $fc_pps;

public function __construct()
{
 $this->con = Conexion::sing_conexion();   
}
//---------------------------------------------------------Se pasan las variables recibidas a locales
    public function setData($id_pps,$idp_pps,$ids_pps,$uc_pps,$fc_pps)
    {
        $this->id_pps=$id_pps;
        $this->idp_pps=$idp_pps;
        $this->ids_pps=$ids_pps;
        $this->uc_pps=$uc_pps;
        $this->fc_pps=$fc_pps;
    }

//---------------------------------------------------------Mostrar los datos de Proceso
public function showDataProc($id= null) 
{   
    try{
$sql ="SELECT * FROM pps";
    
if($id != NULL)
{
$sql.=" WHERE idp_pps = ?";
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
    

//---------------------------------------------------------Mostrar los datos de Subdirección
public function showDataSub($id= null) 
{   
    try{
$sql ="SELECT * FROM pps";
    
if($id != NULL)
{
$sql.=" WHERE ids_pps = ?";
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
         if($this->id_pps!=NULL) //Identificar si llega un ID nulo o declarado
         {
  $sql="UPDATE pps set idp_pps=?,ids_pps=?,uc_pps=?,fc_pps=? WHERE id_pps = ?";
             
         }else{
  $sql="INSERT into pps Values(NULL,?,?,?,?)";
         }
        $consulta = $this->con->prepare($sql);
            if($this->id_pps!=null)//Se asigna el valor del ID si esta declarado
            {
            $consulta->bindParam(1,$this->idp_pps);
            $consulta->bindParam(2,$this->ids_pps);
            $consulta->bindParam(3,$this->uc_pps);
            $consulta->bindParam(4,$this->fc_pps);
            $consulta->bindParam(5,$this->id_pps); 
            }else{
            $consulta->bindParam(1,$this->idp_pps);
            $consulta->bindParam(2,$this->ids_pps);
            $consulta->bindParam(3,$this->uc_pps);
            $consulta->bindParam(4,$this->fc_pps);
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
            
        $sql="DELETE FROM pps where id_pps = ?";
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