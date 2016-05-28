<?php
include '../lib/mods/validarPermisos.php';
include_once '../lib/class/Evento.php';
include_once '../lib/class/Usuario.php';


if(isset($_POST['id']))
{
  $id_evento=$_POST['id']; 
  $nomOld_evento=$_POST['nom']; 
  
$classEventos = new Evento();
$dataEvento = $classEventos -> showData();

while($eve=$dataEvento->fetchObject())
      {
          $id_evento=$eve->id_evento;
          $tit_evento=$eve->tit_evento;
          $cont_evento=$eve->cont_evento;
          $fech_evento=$eve->fech_evento;
          $uc_evento=$eve->uc_evento;
          $fc_evento=$eve->fc_evento;
          $um_evento=$eve->um_evento;
          $fm_evento=$eve->fm_evento;
      }
}else{
          $id_evento=NULL;
          $tit_evento=NULL;
          $cont_evento=NULL;
          $fech_evento=NULL;
          $uc_evento=NULL;
          $fc_evento=NULL;
          $um_evento=NULL;
          $fm_evento=NULL; 
}

?>


<!DOCTYPE html>
<html lang="es">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />
	<link rel="shortcut icon" type="image/x-icon" href="../res/images/logos/logoSWCD.ico">

	<!-- CSS=================== -->
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />
	<!-- /CSS================== -->
	
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- JS=================== -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/plugins.js"></script>
    <!-- /JS================== -->

	<!-- Titulo Pestaña=================== -->
	<title>S.W.C.D/Eventos/Formulario</title>

</head>

<body class="stretched side-panel-left" data-loader="4" data-loader-color="#999">
	<div class="body-overlay"></div>
	    <div id="side-panel">
		    <div id="side-panel-trigger-close" class="side-panel-trigger">
		    <a href="#"><i class="icon-line-cross"></i></a></div>
                <div class="side-panel-wrap dark">
                    <div class="widget clearfix">
                    
                <!-- Logo Menu=================== -->
				<a href="index.php">
				<img src="../res/images/logos/logoSWCD.png" alt="Logo RPPC">
				</a>
				<!-- /Logo Menu================== -->
				
				
				<!-- Menu=================== -->
				<nav class="nav-tree nobottommargin">
				<div class="divider divider-center"><i class="icon-code"></i></div>
					<ul class="left">
						<li><a href="documentos.php">Documentos</a>
							<ul>
								<li><a href="menu-documentos.php"><i class="icon-line-menu"></i>Menú de documentos</a></li>
								<li><a href="explorador-documentos.php"><i class="icon-plus-sign"></i>Agregar / Explorar</a></li>
								<li><a href="version-documentos.php"><i class="icon-line-outbox"></i>Nueva versión</a></li>
								<li><a href="editor-documentos.php"><i class="icon-edit-sign"></i>Editar / Eliminar</a></li>
							</ul>
						</li>
						<li><a href="#">Secciones</a>
							<ul>
								<li><a href="secciones.php"><i class="icon-search3"></i>Ver / Editar /Eliminar</a></li>
								<li><a href="form-secciones.php"><i class="icon-plus-sign"></i>Ingresar nuevo</a></li>
							</ul>
						</li>
						<li><a href="#">Usuarios</a>
							<ul>
								<li><a href="usuarios.php"><i class="icon-search3"></i>Ver / Editar /Eliminar</a></li>
								<li><a href="form-usuarios.php"><i class="icon-plus-sign"></i>Ingresar nuevo</a></li>
								<li><a href="usuarios-inactivos.php"><i class="icon-line2-user-unfollow"></i>Usuarios inactivos</a></li>
							</ul>
						</li>
						<li><a href="#">Procesos</a>
							<ul>
								<li><a href="procesos.php"><i class="icon-search3"></i>Ver / Editar /Eliminar</a></li>
								<li><a href="form-procesos.php"><i class="icon-plus-sign"></i>Ingresar nuevo</a></li>
							</ul>
						</li>
						<li><a href="">Subdir/Direcciones</a>
							<ul>
								<li><a href="subdirecciones.php"><i class="icon-search3"></i>Ver / Editar /Eliminar</a></li>
								<li><a href="form-subdirecciones.php"><i class="icon-plus-sign"></i>Ingresar nuevo</a></li>
								<li><a href="subdirecciones.php"><i class="icon-share"></i>Relaciones</a></li>
							</ul>
						</li>
						<li><a href="#">Áreas</a>
							<ul>
								<li><a href="areas.php"><i class="icon-search3"></i>Ver / Editar /Eliminar</a></li>
								<li><a href="form-areas.php"><i class="icon-plus-sign"></i>Ingresar nuevo</a></li>
								<li><a href="areas.php"><i class="icon-share"></i>Relaciones</a></li>
							</ul>
						</li>
						<li><a href="#">Eventos</a>
							<ul>
								<li><a href="eventos.php"><i class="icon-search3"></i>Ver / Editar /Eliminar</a></li>
								<li><a href="form-eventos.php"><i class="icon-plus-sign"></i>Ingresar nuevo</a></li>
							</ul>
						</li>
						<li><a href="#">Noticias</a>
							<ul>
								<li><a href="noticias.php"><i class="icon-search3"></i>Ver / Editar /Eliminar</a></li>
								<li><a href="form-noticias.php"><i class="icon-plus-sign"></i>Ingresar nuevo</a></li>
							</ul>
						</li>
						<li><a href="#">Bitacora</a>
							<ul>
								<li><a href="logs.php"><i class="icon-search3"></i>Ver</a></li>
							</ul>
						</li>
					</ul>
				</nav>
				<!-- /Menu================== -->
				
				<!-- Datos Menu=================== -->
				<div class="divider divider-center"><i class="icon-code"></i></div>
				<h5 class="left"><i class="icon-user">
				</i> <?php echo $_SESSION['nom_usuario'];?></h5>
				<div id="horafecha"></div>
				<h5 class="left"><i class="icon-key">
				</i> <?php echo $_SESSION['nivel_usuario']; ?></h5>
				<!-- /Datos Menu================== -->
				
				<!-- Botones-Menu=================== -->
				<div class="divider divider-center"><i class="icon-code"></i></div>
				<a href="../index.php" class="button button-border  btn-block"><span><i class="icon-undo"></i>Sitio de usuario</span></a>
				<form name="logout" method="POST" action="../login.php">
				    <input type="hidden" name="logout" value="SI">
                    <button type="submit" class="button button-border  btn-block">
                    <i class='icon-line2-user-unfollow'></i>Cerrar sesion</button>
				</form>
				<!-- /Botones-Menu================== -->

			</div>

		</div>

	</div>

	<!-- Wrapper=================== -->
	<div id="wrapper" class="clearfix">

		<!-- Header=================== -->
		<header id="header" class="full-header dark">

			<div id="header-wrap">

				<div class="container clearfix">
				
				<div id="primary-menu-trigger" class="standard-logo side-panel-trigger">
				<i class="icon-reorder"></i></div>
				
					<!-- Logo=================== -->
					<div id="logo">
						<a href="index.php" class="standard-logo side-panel-trigger">
						<img src="../res/images/logos/logoSWCD.png" alt="Logo RPPC">
						</a>
						<a href="index.php" class="side-panel-trigger retina-logo" >
						<img src="../res/images/logos/logoSWCD@2x.png" alt="Logo RPPC">
						</a>
					</div>
					<!-- /Logo================== -->
				</div>

			</div>

		</header>
		<!-- /Header================== -->

		<!-- Titulo Pagina=================== -->
		<section id="page-title" class="page-title-mini">

			<div class="container clearfix">
				<h1><i class="icon-calendar3"></i> Eventos</h1>
				<!-- Menu=================== -->
				<ol class="breadcrumb">
					<li><a href="index.php">Administrador</a></li>
					<li><a href="eventos.php">Eventos</a></li>
					<li>Formulario</li>
				</ol>
                <!-- /Menu================== -->
			</div>

		</section>
        <!-- /Titulo Pagina================== -->
         
		<!-- Contenido=================== -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="col_two_third nobottommargin">


						<h3><I class="icon-line-clipboard"></I> Formulario de eventos</h3>
						
						<?php if($id_evento!=NULL){ ?> 
							    <p><i class="icon-edit cinfo"></i> Ingresa los datos necesarios para la edición del evento</p>
							    <div class="alert sm alert-warning">
						          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						          <i class="icon-warning-sign"></i> El sistema tomara tus datos para reconocerte como el <strong>último editor</strong> del evento
						        </div>
							    <?php }else{ ?>
							    <p><i class="icon-edit cinfo"></i> Ingresa los datos necesarios para el registro del nuevo evento</p>
							    <div class="alert sm alert-info">
						          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						          <i class="icon-info-sign"></i> El sistema tomara tus datos para reconocerte como el <strong>creador</strong> de este nuevo evento
						        </div>
							    <?php } ?>
						<form id="register-form" name="addData" class="nobottommargin" 
                        action="../lib/ops_evento/UpAddEvento.php" method="post">

							<div class="col_half">
								<label for="tit_evento">Título del evento:</label>
								<input type="text" class="form-control" name="tit_evento" maxlength="99" 
								<?php if($id_evento!=NULL){ ?> 
							    value="<?php echo $tit_evento; ?>"
							    <?php }else{ ?>
							value="" placeholder="Ingresa el título del evento"
							<?php } ?> required/>
							</div>
							
							<div class="col_half col_last">
								<label for="fech_evento">Fecha del evento:</label>
								<input type="datetime-local" class="form-control" name="fech_evento" 
								<?php if($id_evento!=NULL){ ?> 
							    value="<?php echo strftime('%Y-%m-%dT%H:%M:%S', strtotime($fech_evento)); ?>"
							    <?php }else{ ?>
							    value=""
							    <?php } ?> required/>
							</div>
							
							<div class="col_full">
								<label for="cont_evento">Escribe los datos del evento:</label>
								<?php if($id_evento!=NULL){ ?> 
                            <textarea type="text" class="form-control" name="cont_evento" style="resize:vertical" maxlength="50000" minlength="10" required><?php echo $cont_evento; ?></textarea>
							    <?php }else{ ?>
							<textarea type="text" class="form-control" name="cont_evento" style="resize:vertical" maxlength="50000" minlength="10" required></textarea>
							<?php } ?>
							</div>
							
							<?php if($id_evento!=NULL){ ?> 
							<input type="hidden" name="id_evento" 
							value="<?php echo $id_evento; ?>"/>
							<?php }?>
							
							<?php if($id_evento!=NULL){ ?> 
							<input type="hidden" name="nomOld_evento" 
							value="<?php echo $nomOld_evento; ?>"/>
							<?php }?>
							
							<input type="hidden" name="uc_evento" 
							<?php if($id_evento!=NULL){ ?> 
							value="<?php echo $uc_evento; ?>"
							<?php }else{ ?>
							value="<?php echo $_SESSION['id_usuario']; ?>"
							<?php } ?>/>
							
							<input type="hidden" name="fc_evento" 
							<?php if($id_evento!=NULL){ ?> 
							value="<?php echo $fc_evento; ?>"
							<?php }else{ ?>
							id="horafechaval" 
							<?php } ?>/>
							
							<input type="hidden" name="um_evento" 
							<?php if($id_evento!=NULL){ ?> 
							value="<?php echo $_SESSION['id_usuario']; ?>"
							<?php }else{ ?>
							value="NULL"
							<?php } ?>/>
							
							<input type="hidden" name="fm_evento" 
							<?php if($id_evento!=NULL){ ?> 
							id="horafechaval" 
							<?php }else{ ?>
							value="NULL"
							<?php } ?>/>

							<div class="clear"></div>

							<div class="col_full nobottommargin">
								<button type="submit" class="button button-blue button-rounded button-reveal tright"><i class="icon-checkmark"></i><span>Enviar</span></button>
							</div>

						</form>

					</div>
					
					
					<div class="col_one_third col_last nobottommargin">

						<div class="well well-lg nobottommargin">
							<form name="showData" class="nobottommargin" 
                            action="#" method="post">

								<h3 class="center alert alert-info"><i class="icon-info-sign"></i> Otros datos que <i class="icon-info-sign"></i> recopilara el registro </h3>

								<div class="col_full">
									<label for="uc">Usuario Creador:</label>
									<input class="form-control center" name="uc"
									<?php if($id_evento!=NULL){ 
                                    if($uc_evento==NULL){
                                    $uc_evento="Sistema";
                                    }else{
                                    $idc=$uc_evento;
                                    $classUsuario = new Usuario();
                                    $dataUsuario = $classUsuario -> showData($idc);
                                    $dataU=$dataUsuario->fetchObject();
                                    $uc_evento=$dataU->nom_usuario;
                                    }?> 
							        value="<?php echo $uc_evento; ?>"
							        <?php }else{ ?>
							        value="<?php echo $_SESSION['nom_usuario']; ?>"
							        <?php } ?>
							        readonly/>
								</div>

								<div class="col_full">
									<label for="fc">Fecha de creación:</label>
									<input class="form-control center" name="fc"
                                    <?php if($id_evento!=NULL){ 
                                     if($fc_evento==NULL){
                                    $fc_evento="Creado con el sistema";
                                    }?> 
							        value="<?php echo $fc_evento; ?>"
							        <?php }else{ ?>
							        id="horafechaval2" 
							        <?php } ?>
							        readonly/>
								</div>
								
								<div class="col_full">
									<label for="um">Usuario modificador:</label>
									<input class="form-control center" name="um"
                                    <?php if($id_evento!=NULL){ ?> 
							        value="<?php echo $_SESSION['nom_usuario']; ?>"
							        <?php }else{ ?>
							        value="N/D"
							        <?php } ?>
							        readonly/>
								</div>

								<div class="col_full">
									<label for="fm">Fecha de modificación:</label>
									<input class="form-control center" name="fm"
                                    <?php if($id_evento!=NULL){ ?> 
							        id="horafechaval2" 
							        <?php }else{ ?>
							        value="N/D"
							        <?php } ?>
							        readonly/>
								</div>

							</form>
						</div>

					</div>
					

				</div>

			</div>


		</section>
        <!-- /Contenido================== -->


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
						<div class="fright clearfix"></div>

						<div class="clear"></div>

						<i class="icon-email3"></i> <a href="mailto:mtrejog@queretaro.gob.mx">mtrejog@queretaro.gob.mx</a> <span class="middot">&middot;</span> <i class="icon-phone-sign"></i> <a href="tel:+4222271800">442-227-18-00</a> <span class="middot">&middot;</span> <i class="icon-user"></i> ext. 2112.
					</div>

				</div>

			</div>
			<!-- /Footer================== -->

	</div>
	<!-- /Wrapper================== -->


	<!-- Ir arriba================== -->
	<div id="gotoTop" class="icon-angle-up"></div>
    <!-- /Ir arriba================= -->
    
    
	<!-- Footer JS================= -->
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
    <script type="text/javascript" src="js/mods/horas.js"></script>
    <!-- /Footer JS================ -->

</body>
</html>