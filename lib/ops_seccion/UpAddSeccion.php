<?php
session_start();
include_once '../class/Documento.php';
include_once '../class/Seccion.php';
include_once '../class/Log.php';
  
$doc= new Documento();
$sec= new Seccion();
$log= new Log();

       
          $nom_seccion=$_POST['nom_seccion'];
          $uc_seccion=$_POST['uc_seccion'];
          $fc_seccion=$_POST['fc_seccion'];
          $um_seccion=$_POST['um_seccion'];
          $fm_seccion=$_POST['fm_seccion'];

 if(isset($_POST['id_seccion']))
 {
   $id_seccion=$_POST['id_seccion'];
     $nomOld_seccion=$_POST['nomOld_seccion'];
       $path_seccion=$_POST['oldPath_seccion'];
         $_SESSION['detOp']="Actualizacion";
           $uc_log=$um_seccion;
             $fc_log=$fm_seccion;
                    if($nomOld_seccion==$nom_seccion){
                       $accion_log= $_SESSION['detOp']." de la sección (" .$nom_seccion.")"; 
                    }else{
                        $accion_log= $_SESSION['detOp']." de sección, cambio de nombre de (" .$nomOld_seccion.") a (".$nom_seccion.")";
                    }
     
      rename("../../administrador/mods/Secciones/".$nomOld_seccion,
            "../../administrador/mods/Secciones/".$nom_seccion);
     

$dataDocumento = $doc -> showData("Seccion",$id_seccion); 

      if($dataDocumento != NULL){
      while($data=$dataDocumento->fetchObject()){
         

      $id_documento=$data->id_documento; 
      $path_documento=str_replace('mods/Secciones/'.$nomOld_seccion, 'mods/Secciones/'.$nom_seccion, $data->path_documento);
      $ext_documento=$data->ext_documento;
      $um_documento=$data->um_documento;
      $fm_documento=$data->fm_documento;
          
$doc2= new Documento();
$doc2->setData($id_documento,
              null,
              null,
              null,
              $id_seccion,
              null,
              null,
              $path_documento,
              $ext_documento,
              $um_documento,
              $fm_documento);

$doc2->changeData();
      }}
     

     
     
 }else{
 $id_seccion=NULL;
     $_SESSION['detOp']="Agregado"; 
        $uc_log=$uc_seccion;
            $fc_log=$fc_seccion;
                 $accion_log= $_SESSION['detOp']." de la sección (" .$nom_seccion.")";
     
     mkdir("../../administrador/mods/Secciones/".$nom_seccion);
 }  

$sec->setData($id_seccion,
                $nom_seccion,
                "mods/Secciones",
                $uc_seccion,
                $fc_seccion,
                $um_seccion,
                $fm_seccion);

$res=$sec->addData();

if($res==TRUE){
    $_SESSION['errorOp']="Success";
    $log->setData(NULL,$accion_log,"Sección",$uc_log,$fc_log);
    $log->addData();
    header("Location: ../../administrador/secciones.php");
}else{
    $_SESSION['errorOp']="Error";    
    header("Location: ../../administrador/secciones.php");
}