<?php
require_once 'Conexion.php';

class Usuario
{
 
private $con;
private $id_usuario;
private $no_usuario;
private $nom_usuario;
private $pass_usuario;
private $email_usuario;
private $tel_usuario;
private $ext_usuario;
private $subdir_usuario;
private $area_usuario;
private $proc_usuario;
private $nivel_usuario;
private $status_usuario;
private $uc_usuario;
private $fc_usuario;
private $um_usuario;
private $fm_usuario;

public function __construct()
{
 $this->con = Conexion::sing_conexion();   
}
//---------------------------------------------------------Se pasan las variables recibidas a locales
    public function setData($id_usuario,$no_usuario,$nom_usuario,$pass_usuario,$email_usuario,$tel_usuario,$ext_usuario,$subdir_usuario,$area_usuario,$proc_usuario,$nivel_usuario,$status_usuario,$uc_usuario,$fc_usuario,$um_usuario,$fm_usuario)
    {
        $this->id_usuario=$id_usuario;
        $this->no_usuario=$no_usuario;
        $this->nom_usuario=$nom_usuario;
        $this->pass_usuario=$pass_usuario;
        $this->email_usuario=$email_usuario;
        $this->tel_usuario=$tel_usuario;
        $this->ext_usuario=$ext_usuario;
        $this->subdir_usuario=$subdir_usuario;
        $this->area_usuario=$area_usuario;
        $this->proc_usuario=$proc_usuario;
        $this->nivel_usuario=$nivel_usuario;
        $this->status_usuario=$status_usuario;
        $this->uc_usuario=$uc_usuario;
        $this->fc_usuario=$fc_usuario;
        $this->um_usuario=$um_usuario;
        $this->fm_usuario=$fm_usuario;
    }

//---------------------------------------------------------Mostrar los datos
public function showData($id= null) 
{   
    try{
$sql ="SELECT * FROM usuarios,subdirecciones,areas,procesos 
where subdir_usuario=id_subdireccion AND area_usuario=id_area AND proc_usuario=id_proceso ";
    
if($id != NULL){
    if($id == "Administrador"){
        $sql.=" AND nivel_usuario = 'Administrador'";
    }else{
        if($id == "Inactivo"){
            $sql.="AND status_usuario='Inactivo'";
        }else{
            $sql.=" AND id_usuario = ?";
        }
        
    }}else{ 
    $sql.="AND status_usuario='Activo'";
    }
    $consulta = $this->con->prepare($sql);       
        
        if($id != NULL) //Si llega un id en especial se hace la asingacion del orden
        {if($id != "Administrador"){
         if($id != "Inactivo"){
        $consulta->bindParam(1,$id);
        }}}
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
         if($this->id_usuario!=NULL) //Identificar si llega un ID nulo o declarado
         {
  $sql="UPDATE usuarios set no_usuario =?,nom_usuario =?,pass_usuario =?,email_usuario =?,tel_usuario =?,ext_usuario =?,subdir_usuario =?,area_usuario =?,proc_usuario =?,nivel_usuario =?,status_usuario =?,um_usuario=?,fm_usuario=? WHERE id_usuario = ?";
             
         }else{
  $sql="INSERT into usuarios Values(0,?,?,?,?,?,?,?,?,?,?,?,?,?,NULL,NULL)";
         }
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$this->no_usuario);
        $consulta->bindParam(2,$this->nom_usuario);
        $consulta->bindParam(3,$this->pass_usuario);
        $consulta->bindParam(4,$this->email_usuario);
        $consulta->bindParam(5,$this->tel_usuario);
        $consulta->bindParam(6,$this->ext_usuario);
        $consulta->bindParam(7,$this->subdir_usuario);
        $consulta->bindParam(8,$this->area_usuario);
        $consulta->bindParam(9,$this->proc_usuario);
        $consulta->bindParam(10,$this->nivel_usuario);
        $consulta->bindParam(11,$this->status_usuario);
        $consulta->bindParam(12,$this->uc_usuario);
        $consulta->bindParam(13,$this->fc_usuario);
            if($this->id_usuario!=null)//Se asigna el valor del ID si esta declarado
            {
            $consulta->bindParam(12,$this->um_usuario);
            $consulta->bindParam(13,$this->fm_usuario);
            $consulta->bindParam(14,$this->id_usuario);  
            }
        
        return $consulta->execute();
        $this->con=null;        
      }catch(PDOException $e)//mensaje de error en caso de fallo
      {
      print "Error: ".$e->getMessage();   
      }  
   }
//---------------------------------------------------------Borrar datos  
    public function changeData($status,$id)
    {
        try{
            
        $sql="UPDATE usuarios set status_usuario =? where id_usuario = ?";
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(1,$status);
        $consulta->bindParam(2,$id);
        return $consulta->execute();
        $this->con=null;
        
        
        }catch(PDOException $e)
        {
        print "Error: ".$e->getMessage();   
        } 
    }
    
//---------------------------------------------------------Validar el Login
       public function login_data($no_usuario, $pass_usuario)
    {
        try
        {
         $sql="SELECT * FROM usuarios WHERE no_usuario = ? AND pass_usuario = ?";
            $consulta = $this->con->prepare($sql);
                $consulta->bindParam(1,$no_usuario);
                $pass=md5($pass_usuario);
                $consulta->bindParam(2,$pass);
                $consulta->execute();
                $this->con = null;

            
    if($consulta->rowCount()==1)//mostrar o no el resultado de la consulta
    {
        return $consulta;
    }else{
        return false;
    }
    }catch(PDOException $e){//mensaje de error en caso de fallo
      print "Error: ".$e->getMessage();   
    }
    }
    
//---------------------------------------------------------Login Alternativo
       public function login_alter($subdir_usuario, $area_usuario, $proc_usuario, $no_usuario)
    {
        try
        {
         $sql="SELECT * FROM usuarios WHERE subdir_usuario = ? AND area_usuario = ? AND proc_usuario=? AND no_usuario=?";
            $consulta = $this->con->prepare($sql);
            $consulta->bindParam(1,$subdir_usuario);
            $consulta->bindParam(2,$area_usuario);
            $consulta->bindParam(3,$proc_usuario);
            $consulta->bindParam(4,$no_usuario);
            $consulta->execute();
            $this->con = null;

            
    if($consulta->rowCount()==1)//mostrar o no el resultado de la consulta
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