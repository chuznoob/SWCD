<?php
session_start();
include_once '../class/Area.php';
include_once '../class/Log.php';
$area= new Area();
$log= new Log();

       
          $nom_area=$_POST['nom_area'];
          $uc_area=$_POST['uc_area'];
          $fc_area=$_POST['fc_area'];
          $um_area=$_POST['um_area'];
          $fm_area=$_POST['fm_area'];

 if(isset($_POST['id_area']))
 {
 $id_area=$_POST['id_area'];
     $nomOld_area=$_POST['nomOld_area'];
        $_SESSION['detOp']="Actualizacion";
            $uc_log=$um_area;
                $fc_log=$fm_area;
                
                    if($nomOld_area==$nom_area){
                       $accion_log= $_SESSION['detOp']." del área (" .$nom_area.")"; 
                    }else{
                        $accion_log= $_SESSION['detOp']." de área, cambio de nombre de (" .$nomOld_area.") a (".$nom_area.")";
                    }
                     
 }else{
 $id_area=NULL;
     $_SESSION['detOp']="Agregado"; 
        $uc_log=$uc_area;
            $fc_log=$fc_area;
                 $accion_log= $_SESSION['detOp']." del área (" .$nom_area.")";
 }  

$area->setData($id_area,
                $nom_area,
                $uc_area,
                $fc_area,
                $um_area,
                $fm_area);

$res=$area->addData();

if($res==TRUE){
    $_SESSION['errorOp']="Success";
    $log->setData(NULL,$accion_log,"Área",$uc_log,$fc_log);
    $log->addData();
    header("Location: ../../administrador/areas.php");
}else{
    $_SESSION['errorOp']="Error";    
    header("Location: ../../administrador/areas.php");
}