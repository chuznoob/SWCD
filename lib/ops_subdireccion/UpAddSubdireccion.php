<?php
session_start();
include_once '../class/Subdireccion.php';
include_once '../class/Log.php';
$subdir= new Subdireccion();
$log= new Log();

       
          $nom_subdireccion=$_POST['nom_subdireccion'];
          $uc_subdireccion=$_POST['uc_subdireccion'];
          $fc_subdireccion=$_POST['fc_subdireccion'];
          $um_subdireccion=$_POST['um_subdireccion'];
          $fm_subdireccion=$_POST['fm_subdireccion'];

 if(isset($_POST['id_subdireccion']))
 {
 $id_subdireccion=$_POST['id_subdireccion'];
     $nomOld_subdir=$_POST['nomOld_subdir'];
        $_SESSION['detOp']="Actualizacion"; 
            $uc_log=$um_subdireccion;
                $fc_log=$fm_subdireccion;
                    if($nomOld_subdir==$nom_subdireccion){
                       $accion_log= $_SESSION['detOp']." de la subdirección (" .$nom_subdireccion.")"; 
                    }else{
                        $accion_log= $_SESSION['detOp']." de subdirección, cambio de nombre de (" .$nomOld_subdir.") a (".$nom_subdireccion.")";
                    }
     
 }else{
 $id_subdireccion=NULL;
     $_SESSION['detOp']="Agregado"; 
        $uc_log=$uc_subdireccion;
            $fc_log=$fc_subdireccion;
                 $accion_log= $_SESSION['detOp']." de la subdirección (" .$nom_subdireccion.")";
 }  

$subdir->setData($id_subdireccion,
                $nom_subdireccion,
                $uc_subdireccion,
                $fc_subdireccion,
                $um_subdireccion,
                $fm_subdireccion);

$res=$subdir->addData();

if($res==TRUE){
    $_SESSION['errorOp']="Success"; 
    $log->setData(NULL,$accion_log,"Subdirección",$uc_log,$fc_log);
    $log->addData();
    header("Location: ../../administrador/subdirecciones.php");
}else{
    $_SESSION['errorOp']="Error";    
    header("Location: ../../administrador/subdirecciones.php");
}