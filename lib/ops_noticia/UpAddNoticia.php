<?php
session_start();
include_once '../class/Noticia.php';
include_once '../class/Log.php';
$noticia= new Noticia();
$log= new Log();

       
          $tit_noticia=$_POST['tit_noticia'];
          $cont_noticia=$_POST['cont_noticia'];
          $prior_noticia=$_POST['prior_noticia'];
          $uc_noticia=$_POST['uc_noticia'];
          $fc_noticia=$_POST['fc_noticia'];
          $um_noticia=$_POST['um_noticia'];
          $fm_noticia=$_POST['fm_noticia'];

 if(isset($_POST['id_noticia']))
 {
 $id_noticia=$_POST['id_noticia'];
     $nomOld_noticia=$_POST['nomOld_noticia'];
        $_SESSION['detOp']="Actualizacion";
            $uc_log=$um_noticia;
                $fc_log=$fm_noticia;
                    if($nomOld_evento==$tit_evento){
                       $accion_log= $_SESSION['detOp']." de la noticia (" .$tit_evento.")"; 
                    }else{
                        $accion_log= $_SESSION['detOp']." de noticia, cambio de nombre de (" .$nomOld_evento.") a (".$tit_evento.")";
                    }
 }else{
 $id_noticia=NULL;
     $_SESSION['detOp']="Agregado"; 
        $uc_log=$uc_noticia;
            $fc_log=$fc_noticia;
                 $accion_log= $_SESSION['detOp']." de la noticia (" .$tit_noticia.")";
 }  

$noticia->setData($id_noticia,
                $tit_noticia,
                $cont_noticia,
                $prior_noticia,
                $uc_noticia,
                $fc_noticia,
                $um_noticia,
                $fm_noticia);

$res=$noticia->addData();

if($res==TRUE){
    $_SESSION['errorOp']="Success";
    $log->setData(NULL,$accion_log,"Noticia",$uc_log,$fc_log);
    $log->addData();
    header("Location: ../../administrador/noticias.php");
}else{
    $_SESSION['errorOp']="Error";    
    header("Location: ../../administrador/noticias.php");
}