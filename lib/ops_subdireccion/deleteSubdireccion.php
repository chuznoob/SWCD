<?php
session_start();
include_once '../class/Subdireccion.php';
include_once '../class/Log.php';
$subdir= new Subdireccion();
$log= new Log();


$id_subdireccion =$_POST['id'];
$nom_subdireccion =$_POST['nom'];
$uc_log =$_POST['uc_log'];
$fc_log = date('Y-m-d H:i:s', time());


$res=$subdir->delData($id_subdireccion);

$_SESSION['detOp']="Eliminacion"; 

if($res==TRUE){
    $_SESSION['errorOp']="Success"; 
    $accion_log= $_SESSION['detOp']." de la subdirección (".$nom_subdireccion.")";
    $log->setData(NULL,$accion_log,"Subdirección",$uc_log,$fc_log);
    $log->addData();
    header("Location: ../../administrador/subdirecciones.php");
}else{
    $_SESSION['errorOp']="ErrorDel";    
    header("Location: ../../administrador/subdirecciones.php");
}
