<?php
session_start();
include_once '../class/Area.php';
include_once '../class/Log.php';
$area= new Area();
$log= new Log();


$id_area =$_POST['id'];
$nom_area =$_POST['nom'];
$uc_log =$_POST['uc_log'];
$fc_log = date('Y-m-d H:i:s', time());


$res=$area->delData($id_area);

$_SESSION['detOp']="Eliminacion"; 

if($res==TRUE){
    $_SESSION['errorOp']="Success"; 
    $accion_log= $_SESSION['detOp']." del área (".$nom_area.")";
    $log->setData(NULL,$accion_log,"Área",$uc_log,$fc_log);
    $log->addData();
    header("Location: ../../administrador/areas.php");
}else{
    $_SESSION['errorOp']="ErrorDel";    
    header("Location: ../../administrador/areas.php");
}