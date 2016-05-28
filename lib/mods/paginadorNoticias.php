<?php
	include('../class/Noticia.php');
    include('../class/Usuario.php');

	$classNoticias = new Noticia();
    $dataNoticia = $classNoticias -> showData();
    if($dataNoticia!=NULL){
    $count = $dataNoticia->rowCount();
 
	$adjacents = 2;
	$RPP = 1;
	
	$page = (int) (isset($_POST['page_id']) ? $_POST['page_id'] : 1);
	$page = ($page == 0 ? 1 : $page);
	$start = ($page-1) * $RPP;
	
	$next = $page + 1;    
	$prev = $page - 1;
	$last_page = ceil($count/$RPP);
	$second_last = $last_page - 1; 
 
	
	$pagination = "";
	if($last_page > 1){
        $pagination .= "<ul class='pagination'>";
        if($page > 1)
            $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(1);'>&laquo; Inicio</a></li>";
        else
            $pagination.= "<li class='disabled'><a>&laquo; Inicio</a></li>";
		
		if ($page > 1)
            $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(".($prev).");'>&laquo; Anterior&nbsp;&nbsp;</a></li>";
        else
            $pagination.= "<li class='disabled'><a>&laquo; Anterior&nbsp;&nbsp;</a></li>";   
		
        if ($last_page < 7 + ($adjacents * 2))
        {   
            for ($counter = 1; $counter <= $last_page; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<li class='active'><a>$counter</a></li>";
                else
                    $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(".($counter).");'>$counter</a></li>";     
                         
            }
        }
        elseif($last_page > 5 + ($adjacents * 2))
        {
            if($page < 1 + ($adjacents * 2))
            {
                for($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if($counter == $page)
                        $pagination.= "<li class='active'><a>$counter</a></li>";
                    else
                        $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(".($counter).");'>$counter</a></li>";     
                }
                $pagination.= "...";
                $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(".($second_last).");'> $second_last</a></li>";
                $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(".($last_page).");'>$last_page</a></li>";   
           
           }
           elseif($last_page - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(1);'>1</a></li>";
               $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(2);'>2</a></li>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<li class='active'><a>$counter</a></li>";
                   else
                       $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(".($counter).");'>$counter</a></li>";     
               }
               $pagination.= "..";
               $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(".($second_last).");'>$second_last</a></li>";
               $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(".($last_page).");'>$last_page</a></li>";   
           }
           else
           {
               $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(1);'>1</a></li>";
               $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(2);'>2</a></li>";
               $pagination.= "..";
               for($counter = $last_page - (2 + ($adjacents * 2)); $counter <= $last_page; $counter++)
               {
                   if($counter == $page)
                        $pagination.= "<li class='active'><a>$counter</a></li>";
                   else
                        $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(".($counter).");'>$counter</a></li>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(".($next).");'>Siguiente &raquo;</a></li>";
        else
            $pagination.= "<li class='disabled'><a>Siguiente &raquo;</a></li>";
		
		if($page < $last_page)
            $pagination.= "<li><a href='javascript:void(0);' onClick='change_page(".($last_page).");'>Ultimo &raquo;</a></li>";
        else
            $pagination.= "<li class='disabled'><a>Ultimo &raquo;</a></li>";
        
        $pagination.= "</ul>";       
    }
 
$classNoticias2 = new Noticia();
$dataNoticia2 = $classNoticias2->pageData($start,$RPP);
$count=0;
 if($dataNoticia2!=NULL){
 while($data=$dataNoticia2->fetchObject()){
     $count=1+$count;
 }
 }
$HTML='';
if($count > 0)
{
    $classNoticias3 = new Noticia();
     $dataNoticia3 = $classNoticias3->pageData($start,$RPP);
     while($data=$dataNoticia3->fetchObject()){
     $HTML.="<div class='col_full nobottommargin clearfix'>";
         
         $tit_noticia= $data->tit_noticia;
         $cont_noticia= $data->cont_noticia;
         $prior_noticia= $data->prior_noticia;
         
         $idc=$data->uc_noticia;
         $classUsuario = new Usuario();
         $dataUsuario = $classUsuario -> showData($idc);
         $dataU=$dataUsuario->fetchObject();
         $uc_noticia=$dataU->nom_usuario;
         
         $fecha = DateTime::createFromFormat('Y-m-d H:i:s', $data->fc_noticia);
         $ts= $fecha->getTimestamp();
         $fc_noticia=strftime("%d %B del %Y - %I:%M:%S %p",$ts);
         
         if($data->um_noticia==NULL){
         $um_noticia=NULL;
         }else{
         $idm=$data->um_noticia;
         $classUsuario2 = new Usuario();
         $dataUsuario2 = $classUsuario2 -> showData($idm);
         $dataU2=$dataUsuario2->fetchObject();
         $um_noticia=$dataU2->nom_usuario;
         }
                                
         if($data->fm_noticia==NULL){
         $fm_noticia=NULL;
         }else{
         $fecha = DateTime::createFromFormat('Y-m-d H:i:s', $data->fm_noticia);
         $ts= $fecha->getTimestamp();
         $fm_noticia=strftime("%d %B del %Y - %I:%M:%S %p",$ts);
         }
         
         if($prior_noticia=="Alta"){
          if($um_noticia!=NULL){
           $HTML.=" <blockquote class='pull-left alertmsg'>
							<p style='padding-right:10px;'>".$tit_noticia." </p>
							<footer><strong>".$um_noticia."</strong>
                            <br><i class='icon-calendar3'></i> ".$fm_noticia."
                            <br><i class='icon-bubble'></i> <strong>Importante</strong></footer>
				   </blockquote>
                   <p>".$cont_noticia."</p>
                   <div class='divider dark'><i class='icon-circle'></i></div>";   
          }else{
             $HTML.=" <blockquote class='pull-left alertmsg'>
							<p style='padding-right:10px;'>".$tit_noticia." </p>
							<footer><strong>".$uc_noticia."</strong>
                            <br><i class='icon-calendar3'></i> ".$fc_noticia."
                            <br><i class='icon-bubble'></i> <strong>Importante</strong></footer>
				   </blockquote>
                   <p>".$cont_noticia."</p>
                   <div class='divider dark'><i class='icon-circle'></i></div>"; 
          }}else if($prior_noticia=="Media"){
             if($um_noticia!=NULL){
               $HTML.=" <blockquote class='pull-left infomsg'>
							<p style='padding-right:10px;'>".$tit_noticia." </p>
							<footer><strong>".$um_noticia."</strong>
                            <br><i class='icon-calendar3'></i> ".$fm_noticia."
                            <br><i class='icon-bubble'></i> <strong>Aviso general</strong></footer>
				   </blockquote>
                   <p>".$cont_noticia."</p>
                   <div class='divider dark'><i class='icon-circle'></i></div>";
             }else{
              $HTML.=" <blockquote class='pull-left infomsg'>
							<p style='padding-right:10px;'>".$tit_noticia." </p>
							<footer><strong>".$uc_noticia."</strong>
                            <br><i class='icon-calendar3'></i> ".$fc_noticia."
                            <br><i class='icon-bubble'></i> <strong>Aviso general</strong></footer>
				   </blockquote>
                   <p>".$cont_noticia."</p>
                   <div class='divider dark'><i class='icon-circle'></i></div>"; 
             }
         }else{
             if($um_noticia!=NULL){
              $HTML.=" <blockquote class='pull-left' style='background-color: #EEE;'>
							<p style='padding-right:10px;'>".$tit_noticia." </p>
							<footer><strong>".$um_noticia."</strong>
                            <br><i class='icon-calendar3'></i> ".$fm_noticia."
                            <br><i class='icon-bubble'></i> <strong>Recomendación</strong></footer>
				   </blockquote>
                   <p>".$cont_noticia."</p>
                   <div class='divider dark'><i class='icon-circle'></i></div>";
             }else{
              $HTML.=" <blockquote class='pull-left' style='background-color: #EEE;'>
							<p style='padding-right:10px;'>".$tit_noticia." </p>
							<footer><strong>".$uc_noticia."</strong>
                            <br><i class='icon-calendar3'></i> ".$fc_noticia."
                            <br><i class='icon-bubble'></i> <strong>Recomendación</strong></footer>
				   </blockquote>
                   <p>".$cont_noticia."</p>
                   <div class='divider dark'><i class='icon-circle'></i></div>";
             }}
         
        $HTML.="</div>";
     }
		
	
}
else
{
   $HTML='
           <br><br><br><br><br>
           <div class="style-msg infomsg">
           <div class="sb-msg"><i class="icon-info-sign"></i><strong>Bienvenido al panel de noticias!</strong> aun no hay noticias creadas, pero en cuanto se genere una, podrás revisarla en este panel.</div>
           </div>
           <br><br><br><br><br>'; 
}
echo $HTML;
echo $pagination;
    
    
    
    }else{
       $HTML='
           <br><br><br><br><br>
           <div class="style-msg infomsg">
           <div class="sb-msg"><i class="icon-info-sign"></i><strong>Bienvenido al panel de noticias!</strong> aun no hay noticias creadas, pero en cuanto se genere una, podrás revisarla en este panel.</div>
           </div>
           <br><br><br><br><br>';  
        echo $HTML;
    }

?>
