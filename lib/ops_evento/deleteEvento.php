<?php
session_start();
include_once '../class/Evento.php';
include_once '../class/Log.php';
$evento= new Evento();
$log= new Log();


$id_evento =$_POST['id'];
$nom_evento =$_POST['nom'];
$uc_log =$_POST['uc_log'];
$fc_log = date('Y-m-d H:i:s', time());


$res=$evento->delData($id_evento);

$_SESSION['detOp']="Eliminacion"; 

if($res==TRUE){
    $_SESSION['errorOp']="Success"; 
    $accion_log= $_SESSION['detOp']." del evento (".$nom_evento.")";
    $log->setData(NULL,$accion_log,"Evento",$uc_log,$fc_log);
    $log->addData();
    header("Location: ../../administrador/eventos.php");
}else{
    $_SESSION['errorOp']="Error";    
    header("Location: ../../administrador/eventos.php");
}