<?php
require_once 'Conexion.php';

class Evento
{
 
private $con;
private $id_evento;
private $tit_evento;
private $cont_evento;
private $fech_evento;
private $uc_evento;
private $fc_evento;
private $um_evento;
private $fm_evento;

public function __construct()
{
 $this->con = Conexion::sing_conexion();   
}
//---------------------------------------------------------Se pasan las variables recibidas a locales
    public function setData($id_evento,$tit_evento,$cont_evento,$fech_evento, $uc_evento,$fc_evento,$um_evento,$fm_evento)
    {
        $this->id_evento=$id_evento;
        $this->tit_evento=$tit_evento;
        $this->cont_evento=$cont_evento;
        $this->fech_evento=$fech_evento;
        $this->uc_evento=$uc_evento;
        $this->fc_evento=$fc_evento;
        $this->um_evento=$um_evento;
        $this->fm_evento=$fm_evento;
    }

//---------------------------------------------------------Mostrar los datos
public function showData($id= null) 
{   
    try{
$sql ="SELECT * FROM eventos";
    
if($id != NULL)
{
$sql.=" WHERE id_evento = ?";
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
         if($this->id_evento!=NULL) //Identificar si llega un ID nulo o declarado
         {
  $sql="UPDATE eventos set tit_evento=?,cont_evento=?,fech_evento=?,um_evento=?,fm_evento=? WHERE id_evento = ?";
             
         }else{
  $sql="INSERT into eventos Values(NULL,?,?,?,?,?,NULL,NULL)";
         }
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$this->tit_evento);
        $consulta->bindParam(2,$this->cont_evento);
        $consulta->bindParam(3,$this->fech_evento);
            if($this->id_evento!=null)//Se asigna el valor del ID si esta declarado
            {
            $consulta->bindParam(4,$this->um_evento);
            $consulta->bindParam(5,$this->fm_evento);
            $consulta->bindParam(6,$this->id_evento);  
            }else{
            $consulta->bindParam(4,$this->uc_evento);
            $consulta->bindParam(5,$this->fc_evento);
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
            
        $sql="DELETE FROM eventos where id_evento = ?";
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
$sql ="SELECT * FROM eventos WHERE fech_evento >= now() - INTERVAL 1 DAY ORDER BY id_evento DESC LIMIT :limit,:offset";

     
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
    
//---------------------------------------------------------Notificador
public function notiData() 
{   
    try{
$sql ="SELECT * FROM eventos WHERE fech_evento < NOW() + INTERVAL 6 HOUR ORDER BY fech_evento ASC LIMIT 10 ";

    $consulta = $this->con->prepare($sql);       
        
        
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
    
}