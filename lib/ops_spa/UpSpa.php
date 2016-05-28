<?php
session_start();
include_once '../class/Spa.php';
include_once '../class/Log.php';
include_once '../class/Subdireccion.php';
$spa= new Spa();
$log= new Log();


          $ids_spa=$_POST['ids_spa'];
          $ida_spa=$_POST['ida_spa'];
          $uc_spa=$_POST['uc_spa'];
          $fc_spa=$_POST['fc_spa'];
          $nom_area=$_POST['nom_area'];

$classSubdirs = new Subdireccion();
$dataSubdir = $classSubdirs -> showData($ids_spa);

 while($data=$dataSubdir->fetchObject()){
 $nom_subdireccion = $data->nom_subdireccion;
 }

     $_SESSION['detOp']="Agregado"; 
        $accion_log= $_SESSION['detOp']."de relación entre (".$nom_area.") y (".$nom_subdireccion.")";


$spa->setData(NULL,$ids_spa,$ida_spa,$uc_spa,$fc_spa);

$res=$spa->addData();

if($res==TRUE){
    $_SESSION['errorOp']="Success";
    $log->setData(NULL,$accion_log,"Relación",$uc_log,$fc_log);
    $log->addData();
    header("Location: ../../administrador/areas.php");
}else{
    $_SESSION['errorOp']="Error";    
    header("Location: ../../administrador/areas.php");
}