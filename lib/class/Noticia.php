<?php
require_once 'Conexion.php';

class Noticia
{
 
private $con;
private $id_noticia;
private $tit_noticia;
private $cont_noticia;
private $prior_noticia;
private $uc_noticia;
private $fc_noticia;
private $um_noticia;
private $fm_noticia;

public function __construct()
{
 $this->con = Conexion::sing_conexion();   
}
//---------------------------------------------------------Se pasan las variables recibidas a locales
    public function setData($id_noticia,$tit_noticia,$cont_noticia,$prior_noticia, $uc_noticia,$fc_noticia,$um_noticia,$fm_noticia)
    {
        $this->id_noticia=$id_noticia;
        $this->tit_noticia=$tit_noticia;
        $this->cont_noticia=$cont_noticia;
        $this->prior_noticia=$prior_noticia;
        $this->uc_noticia=$uc_noticia;
        $this->fc_noticia=$fc_noticia;
        $this->um_noticia=$um_noticia;
        $this->fm_noticia=$fm_noticia;
    }

//---------------------------------------------------------Mostrar los datos
public function showData($id= null) 
{   
    try{
$sql ="SELECT * FROM noticias";
    
if($id != NULL)
{
$sql.=" WHERE id_noticia = ?";
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
         if($this->id_noticia!=NULL) //Identificar si llega un ID nulo o declarado
         {
  $sql="UPDATE noticias set tit_noticia=?,cont_noticia=?,prior_noticia=?,um_noticia=?,fm_noticia=? WHERE id_noticia = ?";
             
         }else{
  $sql="INSERT into noticias Values(NULL,?,?,?,?,?,NULL,NULL)";
         }
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$this->tit_noticia);
        $consulta->bindParam(2,$this->cont_noticia);
        $consulta->bindParam(3,$this->prior_noticia);
            if($this->id_noticia!=null)//Se asigna el valor del ID si esta declarado
            {
            $consulta->bindParam(4,$this->um_noticia);
            $consulta->bindParam(5,$this->fm_noticia);
            $consulta->bindParam(6,$this->id_noticia);  
            }else{
            $consulta->bindParam(4,$this->uc_noticia);
            $consulta->bindParam(5,$this->fc_noticia);
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
            
        $sql="DELETE FROM noticias where id_noticia = ?";
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$id);
        return $consulta->execute();
        $this->con=null;
        
        
        }catch(PDOException $e)
        {
        print "Error: ".$e->getMessage();   
        } 
    }
    
//---------------------------------------------------------Paginador
public function pageData($ini,$npp) 
{   
    try{
$sql ="SELECT * FROM noticias ORDER BY id_noticia DESC LIMIT :limit,:offset";

     $consulta = $this->con->prepare($sql);
        
      
      $consulta->bindParam(':limit', $ini, PDO::PARAM_INT);
        $consulta->bindParam(':offset', $npp, PDO::PARAM_INT);
       
    $consulta->execute();
    $this->con=null;
        
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
    
}