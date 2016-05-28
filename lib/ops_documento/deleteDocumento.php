<?php
session_start();
include_once '../class/Documento.php';
include_once '../class/Log.php';
$doc= new Documento();
$log= new Log();

     

$res=$doc->delData(1);


$_SESSION['detOp']="Eliminacion"; 
$uc_log= $_SESSION['id_usuario'];
$fc_log=date('Y-m-d H:i:s', time());

if($res==TRUE){
    array_map('unlink', glob("../../administrador/mods/Secciones/Repositorio/*.*"));
    
    $_SESSION['errorOp']="Success";
    $accion_log= $_SESSION['detOp']." de contenido del repositorio";
    $log->setData(NULL,$accion_log,"Documento",$uc_log,$fc_log);
    $log->addData();
    header("Location: ../../administrador/detalle-documentos.php");  
}else{
    $_SESSION['errorOp']="ErrorDel";    
    header("Location: ../../administrador/detalle-documentos.php");  
}