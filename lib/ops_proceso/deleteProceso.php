<?php
session_start();
include_once '../class/Proceso.php';
include_once '../class/Log.php';
$proc= new Proceso();
$log= new Log();



$id_proceso =$_POST['id'];
$nom_proceso =$_POST['nom'];
$uc_log =$_POST['uc_log'];
$fc_log = date('Y-m-d H:i:s', time());


$res=$proc->delData($id_proceso);

$_SESSION['detOp']="Eliminacion"; 

if($res==TRUE){
    $_SESSION['errorOp']="Success"; 
    $accion_log= $_SESSION['detOp']." del proceso (".$nom_proceso.")";
    $log->setData(NULL,$accion_log,"Proceso",$uc_log,$fc_log);
    $log->addData();
    header("Location: ../../administrador/procesos.php");
}else{
    $_SESSION['errorOp']="ErrorDel";    
    header("Location: ../../administrador/procesos.php");
}