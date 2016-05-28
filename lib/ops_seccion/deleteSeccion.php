<?php
session_start();
include_once '../class/Seccion.php';
include_once '../class/Log.php';
$seccion= new Seccion();
$log= new Log();


$id_seccion =$_POST['id'];
$nom_seccion =$_POST['nom'];
$uc_log =$_POST['uc_log'];
$fc_log = date('Y-m-d H:i:s', time());
$Path="../../administrador/mods/Secciones/".$nom_seccion;
delete($Path);

$res=$seccion->delData($id_seccion);

$_SESSION['detOp']="Eliminacion"; 


function delete($dirPath) {
    if (!is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath no es un directorio");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}

if($res==TRUE){
    $_SESSION['errorOp']="Success"; 
    $accion_log= $_SESSION['detOp']." de la sección (".$nom_seccion.") con todo su contenido";
    $log->setData(NULL,$accion_log,"Sección",$uc_log,$fc_log);
    $log->addData();
    header("Location: ../../administrador/secciones.php");
}else{
    $_SESSION['errorOp']="ErrorDel";    
    header("Location: ../../administrador/secciones.php");
}