<?php
require_once 'Conexion.php';

class Seccion
{
 
private $con;
private $id_seccion;
private $nom_seccion;
private $path_seccion;
private $uc_seccion;
private $fc_seccion;
private $um_seccion;
private $fm_seccion;

public function __construct()
{
 $this->con = Conexion::sing_conexion();   
}
//---------------------------------------------------------Se pasan las variables recibidas a locales
    public function setData($id_seccion,$nom_seccion,$path_seccion,$uc_seccion,$fc_seccion,$um_seccion,$fm_seccion)
    {
        $this->id_seccion=$id_seccion;
        $this->nom_seccion=$nom_seccion;
        $this->path_seccion=$path_seccion;
        $this->uc_seccion=$uc_seccion;
        $this->fc_seccion=$fc_seccion;
        $this->um_seccion=$um_seccion;
        $this->fm_seccion=$fm_seccion;
    }

//---------------------------------------------------------Mostrar los datos
public function showData($id= null) 
{   
    try{
$sql ="SELECT * FROM secciones";
    
if($id != NULL)
{
$sql.=" WHERE id_seccion = ?";
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
         if($this->id_seccion!=NULL) //Identificar si llega un ID nulo o declarado
         {
  $sql="UPDATE secciones set nom_seccion=?,path_seccion=?,um_seccion=?,fm_seccion=? WHERE id_seccion = ?";
             
         }else{
  $sql="INSERT into secciones Values(NULL,?,?,?,?,NULL,NULL)";
         }
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$this->nom_seccion);
        $consulta->bindParam(2,$this->path_seccion);
            if($this->id_seccion!=null)//Se asigna el valor del ID si esta declarado
            {
            $consulta->bindParam(3,$this->um_seccion);
            $consulta->bindParam(4,$this->fm_seccion);
            $consulta->bindParam(5,$this->id_seccion);  
            }else{
            $consulta->bindParam(3,$this->uc_seccion);
            $consulta->bindParam(4,$this->fc_seccion);
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
        
        
        $sql2="DELETE FROM documentos where sec_documento = ?";
        $consulta2 = $this->con->prepare($sql2);
        $consulta2->bindParam(1,$id);
        $consulta2->execute();
            
        $sql="DELETE FROM secciones where id_seccion = ?";
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