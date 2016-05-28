<?php
session_start();
include_once '../class/Usuario.php';
include_once '../class/Log.php';
$user= new Usuario();
$log= new Log();

       
          $no_usuario=$_POST['no_usuario'];
          $nom_usuario=$_POST['nom_usuario'];
          $pass=$_POST['pass_usuario'];
          $pass_usuario=md5($pass);
          $email_usuario=$_POST['email_usuario'];
          $tel_usuario=$_POST['tel_usuario'];
          $ext_usuario=$_POST['ext_usuario'];
          $subdir_usuario=$_POST['subdir_usuario'];
          $area_usuario=$_POST['area_usuario'];
          $proc_usuario=$_POST['proc_usuario'];
          $nivel_usuario=$_POST['nivel_usuario'];
          $uc_usuario=$_POST['uc_usuario'];
          $fc_usuario=$_POST['fc_usuario'];
          $um_usuario=$_POST['um_usuario'];
          $fm_usuario=$_POST['fm_usuario'];

 if(isset($_POST['id_usuario']))
 {
 $id_usuario=$_POST['id_usuario'];
    $nomOld_usuario=$_POST['nomOld_usuario'];
        $passOld_usuario=$_POST['passOld_usuario'];
     
        if($passOld_usuario==$pass){
        $pass_usuario= $passOld_usuario;
        }else{
        $pass_usuario=$pass_usuario;
        }
     
            $_SESSION['detOp']="Actualizacion";
                $uc_log=$um_usuario;
                    $fc_log=$fm_usuario;
     
                        if($nomOld_usuario==$nom_usuario){
                            $accion_log= $_SESSION['detOp']." del usuario (".$nomOld_usuario.")";
                        }else{
                            $accion_log= $_SESSION['detOp']." del usuario (".$nomOld_usuario.") a (".$nom_usuario.")";  
                        }

 }else{
 $id_usuario=NULL;
     $_SESSION['detOp']="Agregado"; 
        $uc_log=$uc_usuario;
            $fc_log=$fc_usuario;
                 $accion_log= $_SESSION['detOp']." del usuario (".$nom_usuario.")";
 }  

$user->setData ($id_usuario,$no_usuario,$nom_usuario,$pass_usuario,$email_usuario,$tel_usuario,$ext_usuario,$subdir_usuario,$area_usuario,$proc_usuario,$nivel_usuario,"Activo",$uc_usuario,$fc_usuario,$um_usuario,$fm_usuario);

$res=$user->addData();

echo $id_usuario;

if($res==TRUE){
    $_SESSION['errorOp']="Success";
    $log->setData(NULL,$accion_log,"Usuario",$uc_log,$fc_log);
    $log->addData();
    header("Location: ../../administrador/usuarios.php");
}else{
    $_SESSION['errorOp']="Error";    
    header("Location: ../../administrador/usuarios.php");
}