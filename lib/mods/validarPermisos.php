<?php
session_start();
if(isset($_SESSION['sesion']))
{
    if(basename($_SERVER['PHP_SELF'])=="login.php"){
        if($_POST['logout']){
            
            include_once 'lib/class/Log.php';
            $log= new Log();
            $accion_log= "El usuario (".$_SESSION['nom_usuario'].") cerro sesión";
            $uc_log=$_SESSION['id_usuario'];
            $fc_log = date('Y-m-d H:i:s', time());
            $log->setData(NULL,$accion_log,"Login",$uc_log,$fc_log);
            $log->addData();
            session_destroy();
            
        }else{
            header("Location: http://{$_SERVER['SERVER_NAME']}/SWCD/index.php");
        }
    }else{
        if($_SESSION['nivel_usuario']=="Administrador"|| $_SESSION['nivel_usuario']=="Master")
        {
        $bienvenido=$_SESSION['nom_usuario'];
        }else{
         header("Location: http://{$_SERVER['SERVER_NAME']}/SWCD/index.php");
        }
    }
}else{
    if(basename($_SERVER['PHP_SELF'])=="login.php"){
        
    }else{
   header("Location: http://{$_SERVER['SERVER_NAME']}/SWCD/login.php");
    }
}

?>