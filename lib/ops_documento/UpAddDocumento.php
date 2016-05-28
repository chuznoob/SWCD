<?php
session_start();
include_once '../class/Documento.php';
include_once '../class/Log.php';
$doc= new Documento();
$log= new Log();

       
          $nom_documento=$_POST['nom_documento'];
          $ver_documento=$_POST['ver_documento'];
          $mod_documento=$_POST['mod_documento'];
          $sec_documento=$_POST['sec_documento'];
          $uc_documento=$_POST['uc_documento'];
          $fc_documento=$_POST['fc_documento'];
          $tempath_documento=$_POST['path_documento'];
          $um_documento=$_POST['um_documento'];
          $fm_documento=$_POST['fm_documento'];


if(isset($_POST['ide_documento'])){ 
//No sube archivo
}else{
    
if($_FILES['document']['name'] !="") {
$rutaTemporal=$_FILES['document']['tmp_name'];
$nombreImagen=$_FILES['document']['name'];
$newname = $nom_documento."_V".$ver_documento;
$file_ext = substr($nombreImagen, strripos($nombreImagen, '.'));
$newfilename = $newname . $file_ext;
$rutaDestino=$tempath_documento;
$path_documento=$rutaDestino;
move_uploaded_file($rutaTemporal,"../../administrador/".$path_documento.'/'.$newfilename);
    
$ext_documento=$file_ext;
    
}else{
    
$_SESSION['errorOp']="Error";    

if(isset($_POST['idv_documento'])){ 
header("Location: ../../administrador/version-documentos.php");
}else{
header("Location: ../../administrador/explorador-documentos.php");
}}}




 if(isset($_POST['idv_documento'])){
//------------------------------------------------------------------------------------Subir Nueva version del archivo
 $docnv= new Documento();
 $docnv->setData(null,
              $nom_documento,
              $ver_documento,
              $mod_documento,
              $sec_documento,
              $uc_documento,
              $fc_documento,
              $path_documento,
              $ext_documento,
              $um_documento,
              $fm_documento);   
 $resnv=$docnv->addData(); 
     
     
 $id_documento=$_POST['idv_documento'];
  $Oldpath_documento=$_POST['Oldpath_documento'];
   $Oldext_documento=$_POST['Oldext_documento'];
    $oldver=$ver_documento-1;
     $oldname = $nom_documento."_V".$oldver;
       $_SESSION['detOp']="Nueva versión";
        $uc_log=$um_documento;
         $fc_log=$fm_documento;
          $accion_log= $_SESSION['detOp']." del documento (" .$oldname.") ,ahora es (".$nom_documento."_V".$ver_documento.") ,Y el documento (".$oldname.") fue reubicado al repositorio.";
     
     rename("../../administrador/".$Oldpath_documento.'/'.$oldname.$Oldext_documento,
            "../../administrador/mods/Secciones/Repositorio/".$oldname.$Oldext_documento);
     
$doc->setData($id_documento,
              $nom_documento,
              $ver_documento,
              $mod_documento,
              1,
              $uc_documento,
              $fc_documento,
              "mods/Secciones/Repositorio",
              $Oldext_documento,
              $um_documento,
              $fm_documento);
$res=$doc->changeData();
 //------------------------------------------------------------------------------------Subir Nueva version del archivo     
 }else{
if(isset($_POST['ide_documento'])){
 //------------------------------------------------------------------------------------Editar un archivo  
 $id_documento=$_POST['ide_documento'];
  $oldname=$_POST['nomOld_doc'];
   $Oldpath_documento=$_POST['Oldpath_documento'];
    $Oldext_documento=$_POST['Oldext_documento'];
     $_SESSION['detOp']="Modificacion";
      $uc_log=$um_documento;
       $fc_log=$fm_documento;
    
                    if($oldname.'_V'.$ver_documento.$Oldext_documento==$nom_documento.'_V'.$ver_documento.$Oldext_documento){
                        $accion_log= $_SESSION['detOp']." del documento (" .$nom_documento.'_V'.$ver_documento.$Oldext_documento.")"; 
                    }else{
                        $accion_log= $_SESSION['detOp']." de documento, cambio de nombre de (" .$oldname.'_V'.$ver_documento.$Oldext_documento.") a (".$nom_documento.'_V'.$ver_documento.$Oldext_documento.")";
                    }
    
    rename("../../administrador/".$Oldpath_documento.'/'.$oldname.'_V'.$ver_documento.$Oldext_documento,
            "../../administrador/".$Oldpath_documento.'/'.$nom_documento.'_V'.$ver_documento.$Oldext_documento);
    
    $doc->setData($id_documento,
              $nom_documento,
              $ver_documento,
              $mod_documento,
              $sec_documento,
              $uc_documento,
              $fc_documento,
              $Oldpath_documento,
              $Oldext_documento,
              $um_documento,
              $fm_documento);

$res=$doc->addData();
     
 }else{
//------------------------------------------------------------------------------------Editar un archivo  
 $id_documento=NULL;
     $_SESSION['detOp']="Agregado"; 
        $uc_log=$uc_documento;
            $fc_log=$fc_documento;
                 $accion_log= $_SESSION['detOp']." del documento (" .$nom_documento.'_V'.$ver_documento.")";
    
    $doc->setData($id_documento,
              $nom_documento,
              $ver_documento,
              $mod_documento,
              $sec_documento,
              $uc_documento,
              $fc_documento,
              $path_documento,
              $ext_documento,
              $um_documento,
              $um_documento,
              $fm_documento);

$res=$doc->addData();
//------------------------------------------------------------------------------------Agregar nuevo archivo
 } }  













if($res==TRUE){
    
    $_SESSION['errorOp']="Success";
    $log->setData(NULL,$accion_log,"Documento",$uc_log,$fc_log);
    $log->addData();
    
     if(isset($_POST['idv_documento'])){
        header("Location: ../../administrador/version-documentos.php");  
     }else{
         if(isset($_POST['ide_documento'])){
           header("Location: ../../administrador/editor-documentos.php");   
         }else{
            header("Location: ../../administrador/explorador-documentos.php"); 
         }}
   
}else{
    $_SESSION['errorOp']="Error";    
    
    if(isset($_POST['idv_documento'])){
        header("Location: ../../administrador/version-documentos.php");  
     }else{
         if(isset($_POST['ide_documento'])){
           header("Location: ../../administrador/editor-documentos.php");   
         }else{
            header("Location: ../../administrador/explorador-documentos.php"); 
         }}
}