<?php
session_start();
include_once '../class/Spa.php';
include_once '../class/Log.php';
$spa= new Spa();
$log= new Log();


$id_spa =$_POST['id'];
$nom_subdireccion =$_POST['noms'];
$nom_area =$_POST['noma'];
$uc_log =$_POST['uc_log'];
$fc_log = date('Y-m-d H:i:s', time());


$res=$spa->delData($id_spa);

$_SESSION['detOp']="Eliminacion"; 

if($res==TRUE){
    $_SESSION['errorOp']="Success"; 
    $accion_log= $_SESSION['detOp']." de la relación entre (".$nom_area.") y (".$nom_subdireccion.")";
    $log->setData(NULL,$accion_log,"Relación",$uc_log,$fc_log);
    $log->addData();
    header("Location: ../../administrador/areas.php");
}else{
    $_SESSION['errorOp']="ErrorDelRel";    
    header("Location: ../../administrador/areas.php");
}