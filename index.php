<?php
session_start();
include_once 'lib/class/Usuario.php';
include('lib/class/Evento.php');

$classEventos = new Evento();
$dataEvento = $classEventos -> notiData();

$classUsuarioTot = new Usuario();
$dataUsuario = $classUsuarioTot -> showData();

$classUsuarioAds = new Usuario();
$dataUsuarioAD = $classUsuarioAds -> showData("Administrador");

$classUsuario = new Usuario();
$dataUsuario = $classUsuario -> showData();
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
	<!-- /CSS================== -->
	
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- JS=================== -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/plugins.js"></script>
    <!-- /JS================== -->
	
	
	<!-- Titulo Pestaña=================== -->
	<title>Registro Publico de la Propiedad y del comercio</title>

</head>

<body class="stretched" data-loader="4" data-loader-color="#999">

	<!-- Wrapper=================== -->
	<div id="wrapper" class="clearfix">

		<section id="slider" class="slider-parallax full-screen with-header force-full-screen clearfix">

			<div class="full-screen force-full-screen" style="background: url('res/images/index_main.jpg') center center no-repeat; background-size: cover;">

				<div class="container clearfix">
					<div class="emphasis-title vertical-middle center">
						<h1 >Bienvenido al <strong>RPPC</strong></h1>
					</div>
				</div>

			</div>

		</section>

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
							<li class="current"><a href="index.php"><div>Inicio</div></a></li>
							<li class="mega-menu"><a href="documentos.php"><div>Documentos</div></a></li>
							<li class="mega-menu"><a href="noticias.php"><div>Noticias</div></a></li>
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

		<div class="clear"></div>
		

		
		<!-- Wrapper-Footer=================== -->
		<footer id="footer" class="dark">
		<!-- Semi-Footer=================== -->
			<div class="container">
				<div class="footer-widgets-wrap clearfix">
					<div class="col_one_third">
                         <div class="widget subscribe-widget clearfix">
                         
                            <h2 class="underlined">Panel de Contacto</h2>
                             <h5><strong>Busca y contacta</strong> a los miembros registrados en el sistema, además puedes <strong>pulsar en la dirección de correo electrónico</strong> de cualquiera de los miembros para <strong>enviar un email</strong> al usuario seleccionado. </h5>
						</div>
                         
                         <div class="widget clearfix" style="margin-bottom: -20px;">
							<div class="row">
								<div class="col-md-6 bottommargin-sm">
									
									<div class="counter counter-small">
									<?php 
                                        if($dataUsuario!=NULL){
                                        $usTot=$dataUsuario->rowCount();
                                        }else{
                                            $usTot=0;
                                        } 
                                        ?>
									<span data-from="0" data-to="<?php echo $usTot?>" data-refresh-interval="80" data-speed="2000" data-comma="true"></span></div>
									<h5 class="nobottommargin">Usuarios Totales</h5>
								
								</div>

								<div class="col-md-6 bottommargin-sm">
									
									<div class="counter counter-small">
									<?php 
                                        if($dataUsuarioAD!=NULL){
                                        $usAdsTot=$dataUsuarioAD->rowCount();
                                        }else{
                                            $usAdsTot=0;
                                        }
                                        ?>
									<span data-from="0" data-to="<?php echo $usAdsTot?>" data-refresh-interval="50" data-speed="2000" data-comma="true"></span></div>
									<h5 class="nobottommargin">Administradores</h5>
								
								</div>

							</div>
						</div>
						

						<div class="widget clearfix" style="margin-bottom: -20px;">
							<div class="row">
								<div class="col-md-6 clearfix bottommargin-sm">
									
									<a href="https://www.facebook.com/pages/Registro-P%C3%BAblico-de-la-Propiedad-y-del-Comercio/204363919592832" target="_blank" class="social-icon si-borderless si-facebook" style="margin-right: 10px;">
										<i class="icon-facebook"></i>
										<i class="icon-facebook"></i>
									</a>
									
									<a href="https://www.facebook.com/pages/Registro-P%C3%BAblico-de-la-Propiedad-y-del-Comercio/204363919592832" target="_blank">
									<small style="display: block; margin-top: 3px;"><strong>Ir al sitio</strong><br>de Facebook</small></a>
								
								</div>
								<div class="col-md-6 clearfix">
									
									<a href="http://rppc.queretaro.gob.mx/rppcweb/portal/" target="_blank" class="social-icon si-borderless si-itunes" style="margin-right: 10px;">
										<i class="icon-desktop"></i>
										<i class="icon-desktop"></i>
									</a>
									
									<a href="http://rppc.queretaro.gob.mx/rppcweb/portal/" target="_blank" ><small style="display: block; margin-top: 3px;"><strong>Ir al sitio</strong><br>del RPPC</small></a>
								
								</div>
							</div>
						</div>
					</div>

                
                
					<div class="col_two_third col_last">
						<div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Puesto</th>
                                                    <th>E-mail</th>
                                                    <th>Extensión</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                            <?php
                            if($dataUsuario!=NULL){
                            while($data=$dataUsuario->fetchObject()){
                            echo "<tr class='odd gradeX'>";
                            echo "<td>" . $data->nom_usuario . "</td>";
                            echo "<td>" . $data->nom_proceso . "</td>";
                            echo "<td>" . $data->email_usuario . "</td>";
                            echo "<td>" . $data->ext_usuario . "</td>";
                            echo "</tr>"; ?>
                            <?php } }else{
                                
                            }  ?>
                                                         
                               </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
	<script src="js/dataTables/jquery.dataTablesUser.js"></script>
    
    <script src="js/dataTables/dataTables.bootstrap.js"></script>
        
        
       <script>
        $(document).ready(function() {
            $('#dataTables-example2').dataTable( {
                "lengthMenu": [[3, 5, 10], [3, 5, 10]],
                "oLanguage": {
                    "sLengthMenu": " _MENU_ Usuarios por p&aacute;gina"
                }
            } );
            
        } );
    </script>
    
    
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
    <!-- /Footer JS================ -->

</body>
</html>




