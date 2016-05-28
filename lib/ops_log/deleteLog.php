<?php
session_start();
include_once '../class/Log.php';
$log= new Log();
$logs= new Log();

$res=$log->delData();
$uc_log =$_SESSION['id_usuario'];
$fc_log = date('Y-m-d H:i:s', time());
$_SESSION['detOp']="Depuración"; 

if($res==TRUE){
    $_SESSION['errorOp']="Success"; 
    $accion_log= "Depuración de los registros de la bitácora";
    $logs->setData(NULL,$accion_log,"Log",$uc_log,$fc_log);
    $logs->addData();
    header("Location: ../../administrador/logs.php");
}else{
    $_SESSION['errorOp']="Error";    
    header("Location: ../../administrador/logs.php");
}