<?php
session_start();
include_once '../class/Documento.php';
include_once '../class/Log.php';
$doc= new Documento();
$log= new Log();


 $id_documento=$_POST['id'];
  $path_documento=$_POST['path'];
   $ext_documento=$_POST['ext'];
    $ver_documento=$_POST['ver'];
     $nom_documento=$_POST['nom'];
     $fullname_documento = $nom_documento."_V".$ver_documento;
      $um_documento=$_POST['um'];
        $fm_documento = date('Y-m-d H:i:s', time());

        
         
     
     rename("../../administrador/".$path_documento.'/'.$fullname_documento.$ext_documento,
            "../../administrador/mods/Secciones/Repositorio/".$fullname_documento.$ext_documento);
     
$doc->setData($id_documento,
              null,
              null,
              null,
              1,
              null,
              null,
              "mods/Secciones/Repositorio",
              $ext_documento,
              $um_documento,
              $fm_documento);

$res=$doc->changeData();

$_SESSION['detOp']="Desactivación"; 
$uc_log=$um_documento;
$fc_log=$fm_documento;

if($res==TRUE){
   $_SESSION['errorOp']="Success";
     $accion_log= $_SESSION['detOp']." del documento (".$fullname_documento.")";
    $log->setData(NULL,$accion_log,"Documento",$uc_log,$fc_log);
    $log->addData();
    header("Location: ../../administrador/editor-documentos.php");  
}else{
    $_SESSION['errorOp']="ErrorDel";    
    header("Location: ../../administrador/editor-documentos.php");  
}