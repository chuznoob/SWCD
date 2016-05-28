<?php
require_once 'Conexion.php';

class Subdireccion
{
 
private $con;
private $id_subdireccion;
private $nom_subdireccion;
private $uc_subdireccion;
private $fc_subdireccion;
private $um_subdireccion;
private $fm_subdireccion;

public function __construct()
{
 $this->con = Conexion::sing_conexion();   
}
//---------------------------------------------------------Se pasan las variables recibidas a locales
    public function setData($id_subdireccion,$nom_subdireccion,$uc_subdireccion,$fc_subdireccion,$um_subdireccion,$fm_subdireccion)
    {
        $this->id_subdireccion=$id_subdireccion;
        $this->nom_subdireccion=$nom_subdireccion;
        $this->uc_subdireccion=$uc_subdireccion;
        $this->fc_subdireccion=$fc_subdireccion;
        $this->um_subdireccion=$um_subdireccion;
        $this->fm_subdireccion=$fm_subdireccion;
    }

//---------------------------------------------------------Mostrar los datos
public function showData($id= null) 
{   
    try{
$sql ="SELECT * FROM subdirecciones";
    
if($id != NULL)
{
$sql.=" WHERE id_subdireccion = ?";
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
         if($this->id_subdireccion!=NULL) //Identificar si llega un ID nulo o declarado
         {
  $sql="UPDATE subdirecciones set nom_subdireccion=?,um_subdireccion=?,fm_subdireccion=? WHERE id_subdireccion = ?";
             
         }else{
  $sql="INSERT into subdirecciones Values(NULL,?,?,?,NULL,NULL)";
         }
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$this->nom_subdireccion);
            if($this->id_subdireccion!=null)//Se asigna el valor del ID si esta declarado
            {
            $consulta->bindParam(2,$this->um_subdireccion);
            $consulta->bindParam(3,$this->fm_subdireccion);
            $consulta->bindParam(4,$this->id_subdireccion);  
            }else{
            $consulta->bindParam(2,$this->uc_subdireccion);
            $consulta->bindParam(3,$this->fc_subdireccion);
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
            
        $sql="DELETE FROM subdirecciones where id_subdireccion = ?";
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