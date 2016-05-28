<?php

include '../../lib/mods/validarPermisos.php';
include_once '../../lib/class/Documento.php';
include_once '../../lib/class/Usuario.php';
include_once '../../lib/class/Seccion.php';

$classSeccion = new Seccion();
$dataSeccion = $classSeccion -> showData();


$id_documento=$_POST['id']; 
  
$classDocumentos = new Documento();
$dataDocumento = $classDocumentos -> showData("ID",$id_documento);

while($doc=$dataDocumento->fetchObject())
      {
          $nom_documento=$doc->nom_documento;
          $ver_documento=$doc->ver_documento;
          $mod_documento=$doc->mod_documento;
          $sec_documento=$doc->sec_documento;
          $uc_documento=$doc->uc_documento;
          $fc_documento=$doc->fc_documento;
          $path_documento=$doc->path_documento;
          $ext_documento=$doc->ext_documento;
          $um_documento=$doc->um_documento;
          $fm_documento=$doc->fm_documento;
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
                <?php echo date('Y-m-d H:i:s', time())."_DOC_".$nom_documento."_V".$ver_documento.".pdf"; ?></strong>
                </td>
            </tr>
        </table>
      
        <table style="margin-left: 2px; border: 2px solid #282828; width:100%; padding:2px;">
            <tr style="width:100%; height: 100%;">
                <td style="width:33.3%; border-right: 1px solid #282828;">
                    <strong style="font-size: 12px; color: #555555">Detalles del documento: </strong><br>  
                    <strong style="font-size: 12px; color: #282828">"<?php echo $nom_documento; ?>"</strong>
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
 
   
    <p style="font-size: 18px; text-align: center; font-family: Helvetica, sans-serif !important; font-weight:bold; text-decoration: underline"><?php echo $nom_documento."_V".$ver_documento.$ext_documento; ?></p>
 
 
 
 
 
 <style type="text/css">
.tab  {width: 100%; border-collapse:collapse;border-spacing:0;}
.tab td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tab .empty{width: 5%; vertical-align:top; border: 1px solid #FFFFFF;}
.tab .title{width: 30%; font-weight:bold;font-size:12px;font-family: Helvetica, sans-serif !important;;background-color:#282828;color:#ffffff;text-align:center;vertical-align:top}
.tab .content{width: 60%; font-size:12px;font-family: Helvetica, sans-serif !important;;text-align:center;vertical-align:top}
.tab .topi{border-top-left-radius:10px;}
.tab .topd{border-top-right-radius:10px;}
.tab .boti{border-bottom-left-radius:10px;}
.tab .botd{border-bottom-right-radius:10px;}
</style>
<table class="tab">
  <tr>
    <td class="empty"></td>
    <td class="title topi">ID:</td>
    <td class="content topd"><?php echo $id_documento; ?></td>
    <td class="empty"></td>
  </tr>
  <tr>
    <td class="empty"></td>
    <td class="title">Nombre:</td>
    <td class="content"><?php echo $nom_documento; ?></td>
    <td class="empty"></td>
  </tr>
  <tr>
    <td class="empty"></td>
    <td class="title">Versión:</td>
    <td class="content"><?php echo $ver_documento; ?></td>
    <td class="empty"></td>
  </tr>
  <tr>
    <td class="empty"></td>
    <td class="title">Características:</td>
    <td class="content"><?php echo $mod_documento; ?></td>
    <td class="empty"></td>
  </tr>
  <tr>
    <td class="empty"></td>
    <td class="title">Sección:</td>
    <td class="content">
         <?php while($sec=$dataSeccion->fetchObject()){ 
          if($sec!=NULL){
          if($sec->id_seccion == $sec_documento){  ?>
		 <?php echo $sec->nom_seccion; ?>
		 <?php } } } ?>
    </td>
    <td class="empty"></td>
  </tr>
  <tr>
    <td class="empty"></td>
    <td class="title">Ubicación:</td>
    <td class="content">"<?php echo str_replace('mods/Secciones/', '', $path_documento); ?></td>
    <td class="empty"></td>
  </tr>
  <tr>
    <td class="empty"></td>
    <td class="title">Tipo de archivo:</td>
    <td class="content"><?php echo $ext_documento; ?></td>
    <td class="empty"></td>
  </tr>
  <tr>
    <td class="empty"></td>
    <td class="title">Creador:</td>
    <td class="content">
        <?php if($id_documento!=NULL){ 
              if($uc_documento==NULL){
              $uc_documento="Sistema";
              }else{
              $idc=$uc_documento;
              $classUsuario = new Usuario();
              $dataUsuario = $classUsuario -> showData($idc);
              $dataU=$dataUsuario->fetchObject();
              $uc_documento=$dataU->nom_usuario;
              echo $uc_documento; } }
        ?>
    </td>
    <td class="empty"></td>
  </tr>
  <tr>
    <td class="empty"></td>
    <td class="title">Fecha de creación:</td>
    <td class="content">
        <?php if($id_documento!=NULL){ 
              if($fc_documento==NULL){
              $fc_documento="N/D";
              } } 
              echo $fc_documento; 
        ?>
    </td>
    <td class="empty"></td>
  </tr>
  <tr>
    <td class="empty"></td>
    <td class="title">Ultimo modificador:</td>
    <td class="content">
        <?php if($id_documento!=NULL){ 
              if($um_documento==NULL){
              $um_documento="N/D";
              }else{
              $idm=$um_documento;
              $classUsuario2 = new Usuario();
              $dataUsuario2 = $classUsuario2 -> showData($idm);
              $dataU2=$dataUsuario2->fetchObject();
              $um_documento=$dataU2->nom_usuario;
              }
              echo $um_documento; 
              }?>
    </td>
    <td class="empty"></td>
  </tr>
  <tr>
    <td class="empty"></td>
    <td class="title boti">Fecha de modificación:</td>
    <td class="content botd">
        <?php if($id_documento!=NULL){ 
              if($fm_documento==NULL){
              $fm_documento="N/D";
              } }
              echo $fm_documento; 
        ?>
    </td>
    <td class="empty"></td>
  </tr>
</table>
 
 
 
 
 
 

</page>


<?php
$content = ob_get_clean();
require_once('../../res/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P', 'A4', 'fr', 'true', 'UTF-8');
$pdf->writeHTML($content);
$pdf->Output(date('Y-m-d H:i:s', time())."_DOC_".$nom_documento."_V".$ver_documento.".pdf","D");

?>

    
