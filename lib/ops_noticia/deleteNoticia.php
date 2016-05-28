<?php
session_start();
include_once '../class/Noticia.php';
include_once '../class/Log.php';
$noticia= new Noticia();
$log= new Log();


$id_noticia =$_POST['id'];
$nom_noticia =$_POST['nom'];
$uc_log =$_POST['uc_log'];
$fc_log = date('Y-m-d H:i:s', time());


$res=$noticia->delData($id_noticia);

$_SESSION['detOp']="Eliminacion"; 

if($res==TRUE){
    $_SESSION['errorOp']="Success"; 
    $accion_log= $_SESSION['detOp']." de la noticia (".$nom_noticia.")";
    $log->setData(NULL,$accion_log,"Noticia",$uc_log,$fc_log);
    $log->addData();
    header("Location: ../../administrador/noticias.php");
}else{
    $_SESSION['errorOp']="Error";    
    header("Location: ../../administrador/noticias.php");
}