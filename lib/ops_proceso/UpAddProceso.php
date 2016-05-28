<?php
session_start();
include_once '../class/Proceso.php';
include_once '../class/Log.php';
$proc= new Proceso();
$log= new Log();

       
          $nom_proceso=$_POST['nom_proceso'];
          $uc_proceso=$_POST['uc_proceso'];
          $fc_proceso=$_POST['fc_proceso'];
          $um_proceso=$_POST['um_proceso'];
          $fm_proceso=$_POST['fm_proceso'];

 if(isset($_POST['id_proceso']))
 {
 $id_proceso=$_POST['id_proceso'];
     $nomOld_proceso=$_POST['nomOld_proceso'];
        $_SESSION['detOp']="Actualizacion";
            $uc_log=$um_proceso;
                $fc_log=$fm_proceso;
                    if($nomOld_proceso==$nom_proceso){
                       $accion_log= $_SESSION['detOp']." del proceso (" .$nom_proceso.")"; 
                    }else{
                        $accion_log= $_SESSION['detOp']." de proceso, cambio de nombre de (" .$nomOld_proceso.") a (".$nom_proceso.")";
                    }
 }else{
 $id_proceso=NULL;
     $_SESSION['detOp']="Agregado"; 
        $uc_log=$uc_proceso;
            $fc_log=$fc_proceso;
                 $accion_log= $_SESSION['detOp']." del proceso (" .$nom_proceso.")";
 }  

$proc->setData($id_proceso,
                $nom_proceso,
                $uc_proceso,
                $fc_proceso,
                $um_proceso,
                $fm_proceso);

$res=$proc->addData();

if($res==TRUE){
    $_SESSION['errorOp']="Success";
    $log->setData(NULL,$accion_log,"Proceso",$uc_log,$fc_log);
    $log->addData();
    header("Location: ../../administrador/procesos.php");
}else{
    $_SESSION['errorOp']="Error";    
    header("Location: ../../administrador/procesos.php");
}