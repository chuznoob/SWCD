<?php
require_once 'Conexion.php';

class Area
{
 
private $con;
private $id_area;
private $nom_area;
private $uc_area;
private $fc_area;
private $um_area;
private $fm_area;

public function __construct()
{
 $this->con = Conexion::sing_conexion();   
}
//---------------------------------------------------------Se pasan las variables recibidas a locales
    public function setData($id_area,$nom_area,$uc_area,$fc_area,$um_area,$fm_area)
    {
        $this->id_area=$id_area;
        $this->nom_area=$nom_area;
        $this->uc_area=$uc_area;
        $this->fc_area=$fc_area;
        $this->um_area=$um_area;
        $this->fm_area=$fm_area;
    }

//---------------------------------------------------------Mostrar los datos
public function showData($id= null) 
{   
    try{
$sql ="SELECT * FROM areas";
    
if($id != NULL)
{
$sql.=" WHERE id_area = ?";
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
         if($this->id_area!=NULL) //Identificar si llega un ID nulo o declarado
         {
  $sql="UPDATE areas set nom_area=?,um_area=?,fm_area=? WHERE id_area = ?";
             
         }else{
  $sql="INSERT into areas Values(NULL,?,?,?,NULL,NULL)";
         }
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$this->nom_area);
            if($this->id_area!=null)//Se asigna el valor del ID si esta declarado
            {
            $consulta->bindParam(2,$this->um_area);
            $consulta->bindParam(3,$this->fm_area);
            $consulta->bindParam(4,$this->id_area);  
            }else{
            $consulta->bindParam(2,$this->uc_area);
            $consulta->bindParam(3,$this->fc_area);
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
            
        $sql="DELETE FROM areas where id_area = ?";
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