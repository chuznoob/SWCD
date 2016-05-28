<?php

include '../../lib/mods/validarPermisos.php';
include_once '../../lib/class/Log.php';
include_once '../../lib/class/Usuario.php';

$classLogs = new Log();

if(isset($_POST['tipo'])){
$type=$_POST['tipo'];
if($type=="Todos"){
$type=$_POST['tipo'];
$dataLog = $classLogs -> showData();   
}else{
$type=$_POST['tipo'];
$dataLog = $classLogs -> showData($type);    
}}else{
$type=$_POST['tipo'];
$dataLog = $classLogs -> showData();   
}


ob_start();

?>
   <page backtop="38mm" backbottom="5mm"> 

    <page_header footer='page'>
    <table style="margin-left: 2px;  width:100%; padding:2px; background-color: #282828;">
            <tr style="width:100%; height: 100%;">
                <td style="width:33.3%; text-align:center;">
                <img src="../../res/images/logos/logoSWCD.png" style="width:80%;">
                </td>
                <td style="width:33.3%;">
                </td>
                <td style="width:33.3%;">
                <strong style="font-size: 12px; color: #ffffff; text-align:center;">
                <?php echo date('Y-m-d H:i:s', time())."_".$type.".pdf"; ?></strong>
                </td>
            </tr>
        </table>
      
        <table style="margin-left: 2px; border: 2px solid #282828; width:100%; padding:2px;">
            <tr style="width:100%; height: 100%;">
                <td style="width:33.3%; border-right: 1px solid #282828;">
                    <strong style="font-size: 12px; color: #555555">Registro de acciones de: </strong><br>  
                    <strong style="font-size: 12px; color: #282828">"<?php echo $type; ?>"</strong>
                </td>
                <td style="width:33.3%; border-right: 1px solid #282828;">
                    <strong style="font-size: 12px; color: #555555">Reporte creado por: </strong><br> 
                    <strong style="font-size: 12px; color: #282828">"<?php echo $_SESSION['nom_usuario']; ?>"</strong>
                </td>
                <td style="width:33.3%;">
                    <strong style="font-size: 12px; color: #555555">Fecha: </strong><br>  
                    <?php   $fecha = DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s', time()));
                            $ts= $fecha->getTimestamp();
                    ?>
                    <strong style="font-size: 12px; color: #282828">"
                    <?php echo strftime("%d %B del %Y &nbsp;|&nbsp; %I:%M:%S %p" ,$ts); ?>"</strong>
                </td>
            </tr>
        </table>
</page_header> 
  
   <page_footer>
 
 <style type="text/css">
.tfoot  { width:99.9%; border-collapse:collapse;border-spacing:0;}
.tfoot th{ font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 10px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tfoot .tfoot-cr{width:66.6%; font-weight:bold;font-size:12px;font-family: Helvetica, sans-serif !important;;background-color:#282828;color:#ffffff;text-align:center}
.tfoot .tfoot-np{width:33.3%; font-weight:bold;font-size:12px;font-family: Helvetica, sans-serif !important;;background-color:#282828;color:#ffffff;text-align:center}
</style>

<table class="tfoot">
  <tr>
    <th class="tfoot-cr">Copyrights © Registro Público de la Propiedad y del Comercio, Querétaro</th>
    <th class="tfoot-np">[[page_cu]]/[[page_nb]]</th>
  </tr>
</table>

</page_footer> 
 
   
    <p style="font-size: 18px; text-align: center; font-family: Helvetica, sans-serif !important; font-weight:bold; text-decoration: underline">Acciones realizadas</p>

 
 
<style type="text/css">
.tab  { width:100%; border-collapse:collapse;border-spacing:0;}
.tab td{ width:25%; font-family:Arial, sans-serif;font-size:14px;padding:5px 10px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tab th{ width:25%; font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 10px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tab .tab-title{ width:25%; font-weight:bold;font-size:12px;font-family: Helvetica, sans-serif !important;background-color:#282828;color:#ffffff;text-align:center;}
.tab .tab-content{  width:25%;font-size:10px;font-family: Helvetica, sans-serif !important;text-align:center;}
</style>

<table class="tab">
  <tr>
    <th class="tab-title">Acción</th>
    <th class="tab-title">Tipo</th>
    <th class="tab-title">Usuario<br>que realizo la acción</th>
    <th class="tab-title">Fecha / Hora de realización</th>
  </tr>
  
  <?php
                            if($dataLog!=null){ 
                            while($data=$dataLog->fetchObject()){
                                
                                $idc=$data->uc_log;
                                $classUsuario = new Usuario();
                                $dataUsuario = $classUsuario -> showData($idc);
                                $dataU=$dataUsuario->fetchObject();
                                $uc_log=$dataU->nom_usuario;
                                
                                $fecha = DateTime::createFromFormat('Y-m-d H:i:s', $data->fc_log);
                                $ts= $fecha->getTimestamp();
                                
                            echo "<tr>";
                            echo "<td class='tab-content'>" . $data->accion_log . "</td>";
                            echo "<td  class='tab-content'>" . $data->tipo_log . "</td>";
                            echo "<td  class='tab-content'>" . $uc_log . "</td>";
                            echo "<td  class='tab-content'>" . $data->fc_log."<br>(". strftime("%d %B del %Y &nbsp;|&nbsp; %I:%M:%S %p",$ts).")</td>";
                            echo "</tr>"; ?>
                            <?php }}?>   

</table>
</page>


<?php
$content = ob_get_clean();
require_once('../../res/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P', 'A4', 'fr', 'true', 'UTF-8');
$pdf->writeHTML($content);
$pdf->Output(date('Y-m-d H:i:s', time())."_".$type.".pdf","D");

?>

    
