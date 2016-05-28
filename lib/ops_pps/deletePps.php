<?php
session_start();
include_once '../class/Pps.php';
include_once '../class/Log.php';
$pps= new Pps();
$log= new Log();


$id_pps =$_POST['id'];
$nom_proceso =$_POST['nomp'];
$nom_subdireccion =$_POST['noms'];
$uc_log =$_POST['uc_log'];
$fc_log = date('Y-m-d H:i:s', time());


$res=$pps->delData($id_pps);

$_SESSION['detOp']="Eliminacion"; 

if($res==TRUE){
    $_SESSION['errorOp']="Success"; 
    $accion_log= $_SESSION['detOp']." de la relación entre (".$nom_subdireccion.") y (".$nom_proceso.")";
    $log->setData(NULL,$accion_log,"Relación",$uc_log,$fc_log);
    $log->addData();
    header("Location: ../../administrador/subdirecciones.php");
}else{
    $_SESSION['errorOp']="ErrorDelRel";    
    header("Location: ../../administrador/subdirecciones.php");
}