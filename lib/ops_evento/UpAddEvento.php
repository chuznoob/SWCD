<?php
session_start();
include_once '../class/Evento.php';
include_once '../class/Log.php';;
$evento= new Evento();
$log= new Log();

       
          $tit_evento=$_POST['tit_evento'];
          $cont_evento=$_POST['cont_evento'];
          $fech_evento=$_POST['fech_evento'];
          $uc_evento=$_POST['uc_evento'];
          $fc_evento=$_POST['fc_evento'];
          $um_evento=$_POST['um_evento'];
          $fm_evento=$_POST['fm_evento'];

 if(isset($_POST['id_evento']))
 {
 $id_evento=$_POST['id_evento'];
     $nomOld_evento=$_POST['nomOld_evento'];
        $_SESSION['detOp']="Actualizacion";
            $uc_log=$um_evento;
                $fc_log=$fm_evento;
                     if($nomOld_area==$nom_area){
                       $accion_log= $_SESSION['detOp']." del evento (" .$tit_evento.")"; 
                    }else{
                        $accion_log= $_SESSION['detOp']." de evento, cambio de nombre de (" .$nomOld_evento.") a (".$tit_evento.")";
                    }
 }else{
 $id_evento=NULL;
     $_SESSION['detOp']="Agregado"; 
        $uc_log=$uc_evento;
            $fc_log=$fc_evento;
                 $accion_log= $_SESSION['detOp']." del evento (" .$tit_evento.")";
 }  

$evento->setData($id_evento,
                $tit_evento,
                $cont_evento,
                $fech_evento,
                $uc_evento,
                $fc_evento,
                $um_evento,
                $fm_evento);

$res=$evento->addData();

if($res==TRUE){
    $_SESSION['errorOp']="Success";
    $log->setData(NULL,$accion_log,"Evento",$uc_log,$fc_log);
    $log->addData();
    header("Location: ../../administrador/eventos.php");
}else{
    $_SESSION['errorOp']="Error";    
    header("Location: ../../administrador/eventos.php");
}