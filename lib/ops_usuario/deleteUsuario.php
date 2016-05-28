<?php
session_start();
include_once '../class/Usuario.php';
include_once '../class/Log.php';
$user= new Usuario();
$log= new Log();


$id_usuario =$_POST['id'];
$nom_usuario =$_POST['nom'];
$status_usuario =$_POST['status'];
$uc_log =$_POST['uc_log'];
$fc_log = date('Y-m-d H:i:s', time());


$res=$user->changeData($status_usuario,$id_usuario);

$_SESSION['detOp']="Cambio de estado"; 

if($res==TRUE){
    $_SESSION['errorOp']="Success"; 
    $accion_log= $_SESSION['detOp']." a '".$status_usuario."' del usuario (".$nom_usuario.")";
    $log->setData(NULL,$accion_log,"Usuario",$uc_log,$fc_log);
    $log->addData();
    header("Location: ../../administrador/usuarios.php");
}else{
    $_SESSION['errorOp']="ErrorDel";    
    header("Location: ../../administrador/usuarios.php");
}