<?php
include 'lib/mods/validarPermisos.php';
include_once 'lib/class/Area.php';
include_once 'lib/class/Proceso.php';
include('lib/class/Evento.php');

$classEventos = new Evento();
$dataEvento = $classEventos -> notiData();

$classArea = new Area();
$dataArea = $classArea -> showData();

$classProceso = new Proceso();
$dataProceso = $classProceso -> showData();
?>

<!DOCTYPE html>
<html lang="es">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" type="image/x-icon" href="res/images/logos/icono.ico">

	<!-- CSS=================== -->
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />
	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<!-- /CSS================== -->
	
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- JS=================== -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/plugins.js"></script>
	<script type="text/javascript" src="js/mods/loginMod.js"></script>
    <!-- /JS================== -->

	<!-- Titulo Pestaña=================== -->
	<title>RPPC/Login</title>

</head>

<body class="stretched" data-loader="4" data-loader-color="#999" onload="showNoLoad()">
     
<?php if(isset($_SESSION['erlogin'])){
if($_SESSION['erlogin']=="Error"){ ?>
<script type="text/javascript">
	jQuery(window).load( function(){
		SEMICOLON.widget.notifications( jQuery('#custom-notification-message') );
	});
</script>
<?php session_destroy(); }} ?>

     <div id="custom-notification-message" data-notify-position="top-full-width" 
     data-notify-type="error" 
     data-notify-msg="<i class='icon-remove'></i> Los datos de inicio de sesión no son correctos, verifica tu información"></div>

	<!-- Wrapper=================== -->
	<div id="wrapper" class="clearfix">

		<!-- Header=================== -->
		<header id="header" class="transparent-header">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo=================== -->
					<div id="logo">
						<a href="index.php" class="standard-logo">
						<img src="res/images/logos/logo.png" alt="Logo RPPC">
						</a>
						<a href="index.php" class="retina-logo" >
						<img src="res/images/logos/logo@2x.png" alt="Logo RPPC">
						</a>
					</div>
					<!-- /Logo================== -->

					<!-- Menu=================== -->
					<nav id="primary-menu">

						<ul>
							<li class="mega-menu"><a href="index.php"><div>Inicio</div></a></li>
							<li class="mega-menu"><a href="documentos.php"><div>Documentos</div></a></li>
							<li class="mega-menu"><a href="noticias.php"><div>Noticias</div></a></li>
							<li class="mega-menu"><a href="eventos.php"><div>Eventos</div></a></li>
							<li class="current"><a href="login.php"><div>Login</div></a></li>
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
				<h1>Inicio de sesión</h1>
				<ol class="breadcrumb">
					<li><a href="index.php">Inicio</a></li>
					<li class="active">Login</li>
				</ol>
			</div>

		</section>
        <!-- /Titulo Pagina================== -->

		<!-- Contenido=================== -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">

						<div class="acctitle">
						<i class="acc-closed icon-lock3"></i>
						<i class="acc-open icon-unlock"></i>
						Ingresa a tu cuenta
						</div>
						
						<div class="acc_content clearfix">
							<form id="loginAlter" name="loginAlter" action="lib/ops_login/loginValidar.php" method="post">
								<div class="col_full">
									<label for="expediente">No.de Expediente:</label>
									<input type="number" id="expediente" name="expediente" class="form-control"/>
								</div>

								<div class="col_full">
									<label for="pass">Contraseña:</label>
									<input type="password" id="pass" name="pass" class="form-control"/>
								</div>

								<div class="col_full nobottommargin">
								<input type="submit" value="Enviar" class="button button-3d nomargin btn-block">
								</div>
							</form>
						</div>
						

						<div class="acctitle">
						<i class="acc-closed icon-info-sign"></i>
						<i class="acc-open icon-ok-sign"></i>
						¿Olvidaste tu contraseña?
						</div>
						
						<div class="acc_content clearfix">
							<form id="loginAlter" name="loginAlter" action="lib/ops_login/loginValidar.php" method="post">
							<div class="col_full">
									<label for="register-form-name">Proceso:</label>
									<select class="form-control btn-block" name="proceso" onchange="showSub(this.value)">
                                   <option value="blank">Elige tu proceso</option>
                                    <?php while($dataP=$dataProceso->fetchObject()){ ?>
									     <option value="<?php echo $dataP->id_proceso; ?>">
									     <?php echo $dataP->nom_proceso; ?>
									     </option>
									     <?php } ?>
									</select>
								</div>
								
							<span id="resultadoSub"></span>
								
				            <span id="resultadoAre"></span>
								
								<div class="col_full" id="resultadoNo">
									<label for="register-form-username">No.de Expediente:</label>
									<input type="number" id="register-form-username" name="expediente" class="form-control" placeholder="Escribe tu número de expediente" />
								</div>

								<div class="col_full nobottommargin">
								<input type="submit" value="Enviar" class="button button-3d nomargin btn-block">
								</div>
							</form>
						</div>

					</div>

				</div>

			</div>

		</section>
		<!-- /Contenido================== -->

		<!-- Wrapper-Footer=================== -->
		<footer  >

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

						<div class="clear"></div>

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
	<script type="text/javascript" src="js/functions.js"></script>
	<!-- /Footer JS================ -->

</body>
</html>