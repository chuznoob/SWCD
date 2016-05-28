<?php
session_start();
include_once '../class/Usuario.php';
include_once '../class/Log.php';
$user = new Usuario();
$log= new Log();

if($_POST['pass']){
    
    $no_usuario = $_POST['expediente'];
    $pass_usuario = $_POST['pass'];
    
    $return=$user->login_data($no_usuario, $pass_usuario);
    
    if($return!=false){
        while($datos=$return->fetchObject())
        {
            $_SESSION['id_usuario']=$datos->id_usuario;
            $_SESSION['no_usuario']=$datos->no_usuario;
            $_SESSION['nom_usuario']=$datos->nom_usuario;
            $_SESSION['email_usuario']=$datos->email_usuario;
            $_SESSION['nivel_usuario']=$datos->nivel_usuario;
            $_SESSION['sesion']="true";
            
        }
    $accion_log= "El usuario ".$_SESSION['nom_usuario']." inicio sesión";
    $uc_log=$_SESSION['id_usuario'];
    $fc_log = date('Y-m-d H:i:s', time());
    $log->setData(NULL,$accion_log,"Login",$uc_log,$fc_log);
    $log->addData();
    header("Location: ../../administrador/index.php");
        }else{
      $_SESSION['erlogin']="Error";    
    header("Location: ../../login.php");
        }
    
}else{
    
    $subdir_usuario = $_POST['subdireccion'];
    $area_usuario = $_POST['area'];
    $proc_usuario = $_POST['proceso'];
    $no_usuario = $_POST['expediente'];
    
    $return=$user->login_alter($subdir_usuario, $area_usuario, $proc_usuario, $no_usuario);
    
    if($return!=false){
        while($datos=$return->fetchObject())
        {
            $_SESSION['id_usuario']=$datos->id_usuario;
            $_SESSION['no_usuario']=$datos->no_usuario;
            $_SESSION['nom_usuario']=$datos->nom_usuario;
            $_SESSION['email_usuario']=$datos->email_usuario;
            $_SESSION['nivel_usuario']=$datos->nivel_usuario;
            $_SESSION['sesion']="true";
        }
    $accion_log= "El usuario (".$_SESSION['nom_usuario'].") inicio sesión";
    $uc_log=$_SESSION['id_usuario'];
    $fc_log = date('Y-m-d H:i:s', time());
    $log->setData(NULL,$accion_log,"Login",$uc_log,$fc_log);
    $log->addData();
     header("Location: ../../administrador/index.php");
        }else{
     $_SESSION['erlogin']="Error";    
    header("Location: ../../login.php");
        }
}






     