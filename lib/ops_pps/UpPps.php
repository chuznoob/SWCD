<?php
session_start();
include_once '../class/Pps.php';
include_once '../class/Log.php';
include_once '../class/Proceso.php';
$pps= new Pps();
$log= new Log();


          $idp_pps=$_POST['idp_pps'];
          $ids_pps=$_POST['ids_pps'];
          $uc_pps=$_POST['uc_pps'];
          $fc_pps=$_POST['fc_pps'];
          $nom_subdireccion=$_POST['nom_subdireccion'];

$classProcs = new Proceso();
$dataProc = $classProcs -> showData($idp_pps);

 while($data=$dataProc->fetchObject()){
 $nom_proceso = $data->nom_proceso;
 }

     $_SESSION['detOp']="Agregado"; 
        $accion_log= $_SESSION['detOp']."de relación entre (".$nom_subdireccion.") y (".$nom_proceso.")";


$pps->setData(NULL,$idp_pps,$ids_pps,$uc_pps,$fc_pps);

$res=$pps->addData();

if($res==TRUE){
    $_SESSION['errorOp']="Success";
    $log->setData(NULL,$accion_log,"Relación",$uc_log,$fc_log);
    $log->addData();
    header("Location: ../../administrador/subdirecciones.php");
}else{
    $_SESSION['errorOp']="Error";    
    header("Location: ../../administrador/subdirecciones.php");
}