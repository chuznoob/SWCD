 <?php
setlocale(LC_ALL,NULL);
setlocale(LC_ALL,'es_ES.UTF-8'); 

  $fecha = new DateTime();
  $ts= $fecha->getTimestamp();
  $dateMod=strftime("%d %B del %Y | %I:%M:%S %p",$ts);

echo $dateMod; ?>