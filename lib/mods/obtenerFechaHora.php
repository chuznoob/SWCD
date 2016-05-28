 <?php
  $Meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
   'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
 
   $Dias = array( 'Domingo', 'Lunes', 'Martes',
       'Miercoles', 'Jueves', 'Viernes', 'Sabado');
     
    $fecha = $Dias[date('w')].", ".date('d')." de ".$Meses[date('m')-1];

    $hora = date("g").":".date("i").":".date("s")." ".date("a");
?>


<h5 class="left"><i class ="icon-calendar3"></i> <?php echo $fecha;?></h5>
<h5 class="left"><i class ="icon-line-watch"></i> <?php echo $hora; ?></h5>