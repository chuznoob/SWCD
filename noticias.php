<?php
session_start();
include('lib/class/Evento.php');

$classEventos = new Evento();
$dataEvento = $classEventos -> notiData();
?>


<!DOCTYPE html>
<html lang="es">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />
	<link rel="shortcut icon" type="image/x-icon" href="res/images/logos/icono.ico">

	<!-- CSS=================== -->
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<link rel="stylesheet" href="css/cxplorer.css" type="text/css" />
	<!-- /CSS================== -->
	
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- JS=================== -->
	<script src="js/mods/jqueryAlt.js"></script>
	<script type="text/javascript" src="js/plugins.js"></script>
	
	
    

	<!-- Titulo Pestaña=================== -->
	<title>RPPC/Noticias</title>

</head>

<body class="stretched" data-loader="4" data-loader-color="#999">

	<!-- Wrapper=================== -->
	<div id="wrapper" class="clearfix">

		<!-- Header=================== -->
		<header id="header" class="transparent-header">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo=================== -->
					<div id="logo">
					<?php if(isset($_SESSION['sesion'])){ 
                        if($_SESSION['nivel_usuario']=="Administrador"
                        ||$_SESSION['nivel_usuario']=="Master"){ ?>
                        <a href="administrador/index.php" class="standard-logo">
						<img src="res/images/logos/logoToAdmin.png" alt="Logo RPPC">
						</a>
						<a href="administrador/index.php" class="retina-logo" >
						<img src="res/images/logos/logoToAdmin@2x.png" alt="Logo RPPC">
						</a>
                        <?php }else{ ?>
						<a href="index.php" class="standard-logo">
						<img src="res/images/logos/logo.png" alt="Logo RPPC">
						</a>
						<a href="index.php" class="retina-logo" >
						<img src="res/images/logos/logo@2x.png" alt="Logo RPPC">
						</a>
				    <?php } }else{ ?>
						<a href="index.php" class="standard-logo">
						<img src="res/images/logos/logo.png" alt="Logo RPPC">
						</a>
						<a href="index.php" class="retina-logo" >
						<img src="res/images/logos/logo@2x.png" alt="Logo RPPC">
						</a>
				    <?php } ?>
					</div>
					<!-- /Logo================== -->

					<!-- Menu=================== -->
					<nav id="primary-menu">

						<ul>
							<li class="mega-menu"><a href="index.php"><div>Inicio</div></a></li>
							<li class="mega-menu"><a href="documentos.php"><div>Documentos</div></a></li>
							<li class="current"><a href="noticias.php"><div>Noticias</div></a></li>
							<li class="mega-menu"><a href="eventos.php"><div>Eventos</div></a></li>
							
							<?php if(isset($_SESSION['sesion'])){ 
                            if($_SESSION['nivel_usuario']=="Administrador"
                            ||$_SESSION['nivel_usuario']=="Master"){ ?>
                            <li class="mega-menu"><a href="#" onClick="logout.submit()"><div>Cerrar Sesion</div></a></li>
                            <?php }else{ ?>
							<li class="mega-menu"><a href="#" onClick="logout.submit()"><div>Cerrar Sesion</div></a></li>
							<?php }}else{ ?>
							<li class="mega-menu"><a href="login.php"><div>Login</div></a></li>
							<?php } ?>
							<!-- FormParaLogout=================== -->
						<form name="logout" method="POST" action="login.php">
                        <input type="hidden" name="logout" value="SI">
                        </form>
                        <!-- /FormParaLogout================== -->
						</ul>
						
						<!-- Notificar=================== -->
						<div id="top-search">
							<a href="#" class="center" data-notify-position="top-right" data-notify-type="info"
                           onclick="SEMICOLON.widget.notifications(this); return false;"
                          
                            data-notify-msg='
                           <?php 
                            echo "<strong>Próximos Eventos</strong><hr>";
                            if($dataEvento!=NULL){
                            while($data=$dataEvento->fetchObject()){
                            $fech = DateTime::createFromFormat('Y-m-d H:i:s', $data->fech_evento);
                            $ts= $fech->getTimestamp();
                            $fech_evento=strftime("%d %B del %Y",$ts);
                            $hora_evento=strftime("%I:%M:%S %p",$ts);
                            echo "<strong><i></i>Evento: </strong>".$data->tit_evento."<br>";
                            echo "<strong><i></i>Fecha: </strong>".$fech_evento."<br>";
                            echo "<strong><i></i>Hora: </strong>".$hora_evento."<hr>";
                            }} ?>'>
                           <i class="icon-calendar3 <?php if($dataEvento!=NULL){echo "notify"; } ?>"></i></a>
						</div>
						<!-- /Notificar================== -->

					</nav>
                    <!-- /Menu================== -->

            
				</div>

			</div>

		</header>
		<!-- /Header================== -->
		
		<!-- Titulo Pagina=================== -->
		<section id="page-title" >

			<div class="container clearfix">
				<h1>Noticias</h1>
				<ol class="breadcrumb">
					<li><a href="index.php">Inicio</a></li>
					<li class="active">Noticias</li>
				</ol>
			</div>

		</section>
        <!-- /Titulo Pagina================== -->
<section id="content">

			<div class="content-wrap" style="padding-top:10px; ">

				<div class="container clearfix">
                     
                <br>
                <div id="page_data"></div>
                   
                  </div>

			</div>
			
		</section>
		
		<!-- Wrapper-Footer=================== -->
		<footer  class="dark">
		<!-- Semi-Footer=================== -->
        <!-- /Semi-Footer================== -->


            <!-- Footer=================== -->
			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_half">
						Copyrights &copy; Registro Público de la Propiedad y del Comercio, Querétaro
						<div class="copyright-links">
						    
						    <a href="http://rppc.queretaro.gob.mx/rppcweb/portal/" target="_blank" class="social-icon si-small si-borderless si-call">
								<i class="icon-line2-globe"></i>
								<i class="icon-line2-globe"></i>
							</a>
							
							<a href="https://www.facebook.com/pages/Registro-P%C3%BAblico-de-la-Propiedad-y-del-Comercio/204363919592832" target="_blank" class="social-icon si-small si-borderless si-facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="https://goo.gl/maps/7kndgDTbdg22" target="_blank" class="social-icon si-small si-borderless si-evernote">
								<i class="icon-map-marker"></i>
								<i class="icon-map-marker"></i>
							</a>

						    
						</div>
					</div>

					<div class="col_half col_last tright">
						<div class="fright clearfix">
						
						    
							
						</div>

						<i class="icon-email3"></i> <a href="mailto:mtrejog@queretaro.gob.mx">mtrejog@queretaro.gob.mx</a> <span class="middot">&middot;</span> <i class="icon-phone-sign"></i> <a href="tel:+4222271800">442-227-18-00</a> <span class="middot">&middot;</span> <i class="icon-user"></i> ext. 2112.
					</div>

				</div>

			</div>
			<!-- /Footer================== -->

		</footer>
		<!-- /Wrapper-Footer================== -->
		
		
		
		


	</div>
	<!-- /Wrapper================== -->


	<!-- Ir arriba================== -->
	<div id="gotoTop" class="icon-angle-up"></div>
    <!-- /Ir arriba================= -->
    
    
	<!-- Footer JS================= -->
	<script src="js/mods/cxplorer.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	change_page('0');
});
function change_page(page_id){
     var dataString = 'page_id='+ page_id;
     $.ajax({
           type: "POST",
           url: "lib/mods/paginadorNoticias.php",
           data: dataString,
           cache: false,
           success: function(result){
			     $("#page_data").html(result);
           }
      });
}
</script>
    <!-- /Footer JS================ -->

</body>
</html>




