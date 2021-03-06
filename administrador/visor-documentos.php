<?php
include '../lib/mods/validarPermisos.php';
include_once '../lib/class/Documento.php';
include_once '../lib/class/Usuario.php';
include_once '../lib/class/Seccion.php';

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
    <title>S.W.C.D/Menú de documentos/Detalles-Repositorio/Visor</title>

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
				<h1><i class="icon-line2-docs"></i> Documentos</h1>
				<!-- Menu=================== -->
				<ol class="breadcrumb">
					<li><a href="index.php">Administrador</a></li>
					<li><a href="menu-documentos.php">Menú de documentos</a></li>
					<li><a href="detalle-documentos.php">Detalles-Repositorio</a></li>
					<li>Visor</li>
					
					
				</ol>
                <!-- /Menu================== -->
			</div>

		</section>
        <!-- /Titulo Pagina================== -->
         
		<!-- Contenido=================== -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="col_full nobottommargin">


						<h3><I class="icon-search3"></I> Visor de documentos</h3>
                            
							    <div class="alert sm alert-info">
						          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						          <i class="icon-info-sign"></i> Usted podrá crear una <strong>versión PDF</strong> de este reporte con el <strong>botón al final</strong> de esta pagina
						        </div>

							<div class="col_half">
								<label for="nom_documento">Nombre del documento:</label>
								<input type="text" class="form-control center" name="nom_documento" id="nom_documento"
							    value="<?php echo $nom_documento; ?>" readonly/>
							</div>
							
							<div class="col_half col_last">
								<label for="ver_documento">Version del documento:</label>
								<input type="number" class="form-control center" name="ver_documento" 
                                 min="<?php echo $ver_documento; ?>" max="<?php echo $ver_documento; ?>" 
							    value="<?php echo $ver_documento; ?>" readonly/>
							</div>
							
							<div class="col_full">
								<label for="mod_documento">Caracteristicas del documento:</label>
                            <textarea type="text" class="form-control" name="mod_documento" style="resize:vertical" maxlength="50000" minlength="10" readonly><?php echo $mod_documento; ?></textarea>
							</div>
							
							<div class="col_half">
								<label for="sec_documento">Sección del documento:</label>
								<input type="text" class="form-control center" name="sec_documento" 
                                <?php while($sec=$dataSeccion->fetchObject()){ 
                                    if($sec!=NULL){
                                    if($sec->id_seccion == $sec_documento){  ?>
							    value="<?php echo $sec->nom_seccion; ?>" readonly/>
							    <?php } } } ?>
							</div>
						
							<div class="col_half col_last">
								<label for="path_documento">Ubicación del documento:</label>
								<input type="text" class="form-control center" name="path_simple" 
								<?php if($id_documento!=NULL){ ?> 
							   value="<?php echo str_replace('mods/Secciones/', '', $path_documento); ?>"
							    <?php }else{ ?>
							   value="<?php echo str_replace('mods/Secciones/'.$sec_doc, $sec_doc, $pathOld_doc); ?>"
							<?php } ?> required readonly/>
							</div>
							
							<div class="col_half">
									<label for="uc">Usuario Creador:</label>
									<input class="form-control center" name="uc"
									<?php if($id_documento!=NULL){ 
                                    if($uc_documento==NULL){
                                    $uc_documento="Sistema";
                                    }else{
                                    $idc=$uc_documento;
                                    $classUsuario = new Usuario();
                                    $dataUsuario = $classUsuario -> showData($idc);
                                    $dataU=$dataUsuario->fetchObject();
                                    $uc_documento=$dataU->nom_usuario;
                                    }?> 
							        value="<?php echo $uc_documento; ?>"
							        <?php }  ?>
							        readonly/>
								</div>
								
								<div class="col_half col_last">
									<label for="fc">Fecha de creación:</label>
									<input class="form-control center" name="fc"
                                     <?php if($id_documento!=NULL){ 
                                     if($fc_documento==NULL){
                                    $fc_documento="N/D";
                                    } } ?> 
							        value="<?php echo $fc_documento; ?>"
							        readonly/>
								</div>
								
								<div class="col_half">
									<label for="um">Usuario modificador:</label>
									<input class="form-control center" name="um"
                                    <?php if($id_documento!=NULL){ 
                                    if($um_documento==NULL){
                                    $um_documento="N/D";
                                    }else{
                                    $idm=$um_documento;
                                    $classUsuario2 = new Usuario();
                                    $dataUsuario2 = $classUsuario2 -> showData($idm);
                                    $dataU2=$dataUsuario2->fetchObject();
                                    $um_documento=$dataU2->nom_usuario;
                                    }?> 
							        value="<?php echo $um_documento; ?>"
							        <?php }  ?>
							        readonly/>
								</div>

								<div class="col_half col_last">
									<label for="fm">Fecha de modificación:</label>
									<input class="form-control center" name="fm"
                                    <?php if($id_documento!=NULL){ 
                                     if($fm_documento==NULL){
                                    $fm_documento="N/D";
                                    } } ?> 
							        value="<?php echo $fm_documento; ?>"
							        readonly/>
								</div>
							
				           
							<div class="clear"></div>
                   
                   <div class="col_full">
                   <form name="createPDF" class="center" action="mods/doc-pdf.php" method="post">
                   <input type="hidden" name="id" value="<?php echo $id_documento; ?>">
                   <button type="submit" class="button button-rounded button-reveal button-red button-border tright"><i class="icon-acrobat"></i><span>Crear PDF</span></button>
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