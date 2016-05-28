<?php
	include('../class/Evento.php');
    include('../class/Usuario.php');

	$classEventos = new Evento();
    $dataEvento = $classEventos -> showData();
   if($dataEvento!=NULL){
    $count = $dataEvento->rowCount();
 
	$adjacents = 2;
	$RPP = 2;
	
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
 
$classEventos2 = new Evento();
$dataEvento2 = $classEventos2->pageData($start,$RPP);
$count=0;
 if($dataEvento2!=NULL){
 while($data=$dataEvento2->fetchObject()){
     $count=1+$count;
 }
}
$HTML='';
if($count > 0)
{
    $classEventos3 = new Evento();
    $dataEvento3 = $classEventos3->pageData($start,$RPP);
     while($data=$dataEvento3->fetchObject()){
     $HTML.="<div class='col_full nobottommargin clearfix'>";
         
         $tit_evento= $data->tit_evento;
         $cont_evento= $data->cont_evento;
         $fech = DateTime::createFromFormat('Y-m-d H:i:s', $data->fech_evento);
         $ts= $fech->getTimestamp();
         $fech_evento=strftime("%d %B del %Y <br> %I:%M:%S %p",$ts);
         
         $idc=$data->uc_evento;
         $classUsuario = new Usuario();
         $dataUsuario = $classUsuario -> showData($idc);
         $dataU=$dataUsuario->fetchObject();
         $uc_evento=$dataU->nom_usuario;
         
         $fecha = DateTime::createFromFormat('Y-m-d H:i:s', $data->fc_evento);
         $ts= $fecha->getTimestamp();
         $fc_evento=strftime("%d %B del %Y <br> %I:%M:%S %p",$ts);
         
         if($data->um_evento==NULL){
         $um_evento=NULL;
         }else{
         $idm=$data->um_evento;
         $classUsuario2 = new Usuario();
         $dataUsuario2 = $classUsuario2 -> showData($idm);
         $dataU2=$dataUsuario2->fetchObject();
         $um_evento=$dataU2->nom_usuario;
         }
                                
         if($data->fm_evento==NULL){
         $fm_evento=NULL;
         }else{
         $fecha = DateTime::createFromFormat('Y-m-d H:i:s', $data->fm_evento);
         $ts= $fecha->getTimestamp();
         $fm_evento=strftime("%d %B del %Y <br> %I:%M:%S %p",$ts);
         }
         
         $fech = DateTime::createFromFormat('Y-m-d H:i:s', $data->fech_evento);
         $ts= $fech->getTimestamp();
         $Day=strftime("%d",$ts);
         $Month=strftime("%B",$ts);
         $Hour= strftime("%I:%M:%S %p",$ts);
         
         if($data->fech_evento>date('Y-m-d H:i:s', time()-3600*6) && $data->fech_evento<date('Y-m-d H:i:s', time()+3600*6)){
          if($um_evento!=NULL){    
          $HTML.="<div class='pricing-box pricing-extended bottommargin clearfix'>
                    <div class='pricing-desc'>
							<div class='pricing-title'>
								<h3>".$tit_evento."</h3>
								<p style='margin-bottom:20px !important;'>".$cont_evento."</p>
								<p style='margin-bottom:0px !important; font-size:11px;'>
                                <strong>Evento creado por: </strong>".$um_evento." / <strong>Creado el dia: </strong>".$fm_evento."</p>
							</div>
						</div>

						<div class='pricing-action-area alertmsg'>
							<div class='pricing-price'>
								<span class='price-unit'></span>".$Day."<span class='price-tenure'>de ".$Month."</span>
                                <span class='price-tenure'>".$Hour."</span>
							</div>
						</div>
					</div>";
          }else{
              $HTML.="<div class='pricing-box pricing-extended bottommargin clearfix'>
                    <div class='pricing-desc'>
							<div class='pricing-title'>
								<h3>".$tit_evento."</h3>
								<p style='margin-bottom:20px !important;'>".$cont_evento."</p>
								<p style='margin-bottom:0px !important; font-size:11px;'>
                                <strong>Evento creado por: </strong>".$uc_evento." / <strong>El dia: </strong>".$fc_evento."</p>
							</div>
						</div>

						<div class='pricing-action-area alertmsg'>
							<div class='pricing-price'>
								<span class='price-unit'></span>".$Day."<span class='price-tenure'>de ".$Month."</span>
                                <span class='price-tenure'>".$Hour."</span>
							</div>
						</div>
					</div>";
          }
             
         }else if($data->fech_evento<date('Y-m-d H:i:s', time()-3600*6)){
          if($um_evento!=NULL){    
           $HTML.="<div class='pricing-box pricing-extended bottommargin clearfix'>
                    <div class='pricing-desc'>
							<div class='pricing-title'>
								<h3>".$tit_evento."</h3>
								<p style='margin-bottom:20px !important;'>".$cont_evento."</p>
								<p style='margin-bottom:0px !important; font-size:11px;'>
                                <strong>Evento creado por: </strong>".$um_evento." / <strong>Creado el dia: </strong>".$fm_evento."</p>
							</div>
						</div>

						<div class='pricing-action-area errormsg'>
							<div class='pricing-price'>
								<span class='price-unit'></span>".$Day."<span class='price-tenure'>de ".$Month."</span>
                                <span class='price-tenure'>".$Hour."</span>
							</div>
						</div>
					</div>";
          }else{
           $HTML.="<div class='pricing-box pricing-extended bottommargin clearfix'>
                    <div class='pricing-desc'>
							<div class='pricing-title'>
								<h3>".$tit_evento."</h3>
								<p style='margin-bottom:20px !important;'>".$cont_evento."</p>
								<p style='margin-bottom:0px !important; font-size:11px;'>
                                <strong>Evento creado por: </strong>".$uc_evento." / <strong>Creado el dia: </strong>".$fc_evento."</p>
							</div>
						</div>

						<div class='pricing-action-area errormsg'>
							<div class='pricing-price'>
								<span class='price-unit'></span>".$Day."<span class='price-tenure'>de ".$Month."</span>
                                <span class='price-tenure'>".$Hour."</span>
							</div>
						</div>
					</div>";   
          }   
             
         }else if($data->fech_evento>date('Y-m-d H:i:s', time()+3600*6)){
          if($um_evento!=NULL){    
          $HTML.="<div class='pricing-box pricing-extended bottommargin clearfix'>
                    <div class='pricing-desc'>
							<div class='pricing-title'>
								<h3>".$tit_evento."</h3>
								<p style='margin-bottom:20px !important;'>".$cont_evento."</p>
								<p style='margin-bottom:0px !important; font-size:11px;'>
                                <strong>Evento creado por: </strong>".$um_evento." / <strong>Creado el dia: </strong>".$fm_evento."</p>
							</div>
						</div>

						<div class='pricing-action-area infomsg'>
							<div class='pricing-price'>
								<span class='price-unit'></span>".$Day."<span class='price-tenure'>de ".$Month."</span>
                                <span class='price-tenure'>".$Hour."</span>
							</div>
						</div>
					</div>";
          }else{
            $HTML.="<div class='pricing-box pricing-extended bottommargin clearfix'>
                    <div class='pricing-desc'>
							<div class='pricing-title'>
								<h3>".$tit_evento."</h3>
								<p style='margin-bottom:20px !important;'>".$cont_evento."</p>
								<p style='margin-bottom:0px !important; font-size:11px;'>
                                <strong>Evento creado por: </strong>".$uc_evento." / <strong>Creado el dia: </strong>".$fc_evento."</p>
							</div>
						</div>

						<div class='pricing-action-area infomsg'>
							<div class='pricing-price'>
								<span class='price-unit'></span>".$Day."<span class='price-tenure'>de ".$Month."</span>
                                <span class='price-tenure'>".$Hour."</span>
							</div>
						</div>
					</div>";   
          }     
             
             
         }
         
         
         
        $HTML.="</div>";
     }
		
	
}
else
{
   $HTML='
           <br><br><br><br><br>
           <div class="style-msg infomsg">
           <div class="sb-msg"><i class="icon-info-sign"></i><strong>Bienvenido al panel de eventos!</strong> aun no hay eventos crados, pero en cuanto se genere uno, podrás revisarlo en este panel.</div>
           </div>
           <br><br><br><br><br>'; 
}
echo $pagination;
echo $HTML;
echo $pagination;
    
   }else{
       $HTML='
           <br><br><br><br><br>
           <div class="style-msg infomsg">
           <div class="sb-msg"><i class="icon-info-sign"></i><strong>Bienvenido al panel de eventos!</strong> aun no hay eventos crados, pero en cuanto se genere uno, podrás revisarlo en este panel.</div>
           </div>
           <br><br><br><br><br>';  
        echo $HTML;
    }   
    


?>
