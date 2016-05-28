<?php
require_once 'Conexion.php';

class Documento
{
 
private $con;
private $id_documento;
private $nom_documento;
private $ver_documento;
private $mod_documento;
private $sec_documento;
private $uc_documento;
private $fc_documento;
private $path_documento;
private $ext_documento;
private $um_documento;
private $fm_documento;

public function __construct()
{
 $this->con = Conexion::sing_conexion();   
}
//---------------------------------------------------------Se pasan las variables recibidas a locales
    public function setData($id_documento,$nom_documento,$ver_documento,$mod_documento,$sec_documento,$uc_documento,
            $fc_documento,$path_documento,$ext_documento,$um_documento,$fm_documento)
    {
        $this->id_documento =$id_documento;
        $this->nom_documento =$nom_documento;
        $this->ver_documento =$ver_documento;
        $this->mod_documento =$mod_documento;
        $this->sec_documento =$sec_documento;
        $this->uc_documento =$uc_documento;
        $this->fc_documento =$fc_documento;
        $this->path_documento =$path_documento;
        $this->ext_documento =$ext_documento;
        $this->um_documento =$um_documento;
        $this->fm_documento =$fm_documento;
    }

//---------------------------------------------------------Mostrar los datos
public function showData($type=null,$num= null) 
{   
    try{
$sql ="SELECT * FROM documentos";

if($type!=NULL){
if($type=="Seccion"){
    if($num=="Activos"){
        $sql.=" WHERE sec_documento != 1";  
    }else{
       $sql.=" WHERE sec_documento = ?";   
    }
}else{ 
    $sql.=" WHERE id_documento = ?"; 
}}
    $consulta = $this->con->prepare($sql);       
        
        if($num != NULL) //Si llega un id en especial se hace la asingacion del orden
        { if($num!="Activos"){
        $consulta->bindParam(1,$num);
          } 
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
         if($this->id_documento!=NULL) //Identificar si llega un ID nulo o declarado
         {
  $sql="UPDATE documentos set nom_documento=?,ver_documento=?,mod_documento=? ,sec_documento=? ,path_documento=?,ext_documento=? ,um_documento=? ,fm_documento=? WHERE id_documento = ?";
             
         }else{
  $sql="INSERT into documentos Values(NULL,?,?,?,?,?,?,?,?,NULL,NULL)";
         }
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$this->nom_documento);
        $consulta->bindParam(2,$this->ver_documento);
        $consulta->bindParam(3,$this->mod_documento);
        $consulta->bindParam(4,$this->sec_documento);
            if($this->id_documento!=null)//Se asigna el valor del ID si esta declarado
            {
            $consulta->bindParam(5,$this->path_documento);
            $consulta->bindParam(6,$this->ext_documento);
            $consulta->bindParam(7,$this->um_documento);
            $consulta->bindParam(8,$this->fm_documento);
            $consulta->bindParam(9,$this->id_documento);
            }else{
            $consulta->bindParam(5,$this->uc_documento);
            $consulta->bindParam(6,$this->fc_documento);
            $consulta->bindParam(7,$this->path_documento);
            $consulta->bindParam(8,$this->ext_documento);
            }
        return $consulta->execute();
         
        $this->con=null;
        
      }catch(PDOException $e)//mensaje de error en caso de fallo
      {
      print "Error: ".$e->getMessage();   
      }  
   }
//---------------------------------------------------------Borrar datos  
    public function delData($sec)
    {
        try{
            
        $sql="DELETE FROM documentos where sec_documento = ?";
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$sec);
        return $consulta->execute();
        $this->con=null;
        
        
        }catch(PDOException $e)
        {
        print "Error: ".$e->getMessage();   
        } 
    }
    
//---------------------------------------------------------Mover version vieja
   public function changeData()
   {
    try
      {
  $sql="UPDATE documentos set sec_documento=? ,path_documento=? ,ext_documento=? ,um_documento=? ,fm_documento=? WHERE id_documento = ?";
        
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$this->sec_documento);
        $consulta->bindParam(2,$this->path_documento);
        $consulta->bindParam(3,$this->ext_documento);
        $consulta->bindParam(4,$this->um_documento);
        $consulta->bindParam(5,$this->fm_documento);
        $consulta->bindParam(6,$this->id_documento);
            
        return $consulta->execute();
         
        $this->con=null;
        
      }catch(PDOException $e)//mensaje de error en caso de fallo
      {
      print "Error: ".$e->getMessage();   
      }  
   }
    
}