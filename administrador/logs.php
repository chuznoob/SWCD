<?php
include '../lib/mods/validarPermisos.php';
include_once '../lib/class/Log.php';
include_once '../lib/class/Usuario.php';


$types = [
    ["Todos","Todos"],
    ["Usuario","Usuarios"],
    ["Documento","Documentos"],
    ["Sección","Secciones"],
    ["Proceso","Procesos"],
    ["Subdirección","Subdirecciones"],
    ["Área","Áreas "],
    ["Relación","Relaciones"],
    ["Log","Depuración de bitácora"],
    ["Noticia","Noticias"],
    ["Evento","Eventos"],
    ["Login","Inicios de sesión"]];

$classLogs = new Log();

if(isset($_POST['type'])){
$type=$_POST['type'];
if($type=="Todos"){
$dataLog = $classLogs -> showData();   
}else{
$dataLog = $classLogs -> showData($type);    
}}else{
$type="Todos";
$dataLog = $classLogs -> showData();   
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
	<title>S.W.C.D/Bitácora</title>

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
				<h1><i class="icon-eye-open"></i> Bitácora</h1>
				<!-- Menu=================== -->
				<ol class="breadcrumb">
					<li><a href="index.php">Administrador</a></li>
					<li>Bitácora</li>
				</ol>
                <!-- /Menu================== -->
			</div>

		</section>
        <!-- /Titulo Pagina================== -->
         
		<!-- Contenido=================== -->
		<section id="content">

			<div class="content-wrap-short">

				<div class="container clearfix">
                 
                   <div class="col_three_fourthm"><h4>
                   <i class="icon-grid"></i> Tabla de elementos</h4></div>
                   <div class="col_one_fourthm col_last center">
                   <form name="createPDF" action="mods/log-pdf.php" method="post">
                   <input type="hidden" name="tipo" value="<?php echo $type; ?>">
                   <button type="submit" class="button button-rounded button-reveal button-red button-border tright"><i class="icon-acrobat"></i><span>Crear PDF</span></button>
                   </form>
                   </div>
                   
                   <div class="col_two_fifthm">
                   <form class="m" name="filter" action="" method="post">
                   <select name="type" class="form-control" onchange="this.form.submit()">
                     <?php foreach ($types as list($tipo, $nombre)) { ?>
                     <option value="<?php echo $tipo; ?>" 
                     <?php if(isset($_POST['type'])){if($tipo==$type){ echo "selected";}} ?>><?php echo $nombre; ?></option>
                     <?php } ?>
                    </select>
                    </form>
                    </div>
                    
                   <div class="col_three_fifthm col_last alert sm alert-info">
				   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon-info-sign"></i> Elige un <strong>tipo de acción</strong> o visualizalas   <strong>todas</strong> con el seleccionador a la <strong>izquierda</strong> de este mensaje 
                   </div>
                   
                    <div class="col_full">
						<div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                            <thead>
                                                <tr>
                                                    <th>Acción</th>
                                                    <th>Tipo</th>
                                                    <th>Usuario que realizo la acción</th>
                                                    <th>Fecha / Hora de realización</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                            <?php
                            if($dataLog!=null){ 
                            while($data=$dataLog->fetchObject()){
                                
                                $idc=$data->uc_log;
                                $classUsuario = new Usuario();
                                $dataUsuario = $classUsuario -> showData($idc);
                                $dataU=$dataUsuario->fetchObject();
                                $uc_log=$dataU->nom_usuario;
                                
                                $fecha = DateTime::createFromFormat('Y-m-d H:i:s', $data->fc_log);
                                $ts= $fecha->getTimestamp();
                                
                            echo "<tr class='odd gradeX'>";
                            echo "<td>" . $data->accion_log . "</td>";
                            echo "<td>" . $data->tipo_log . "</td>";
                            echo "<td>" . $uc_log . "</td>";
                            echo "<td>" . $data->fc_log."<br>(". strftime("%d %B del %Y &nbsp;|&nbsp; %I:%M:%S %p",$ts).")</td>";
                            echo "</tr>"; ?>
                            <?php }}?>                   
                               </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
                   
                   <div class="col_three_fourthm"></div>
                   <div class="col_one_fourthm col_last center">
                   <a href="../lib/ops_log/deleteLog.php" class="button button-rounded button-reveal button-black button-border tright"><i class="icon-trash"></i><span>Depuración de bitácora</span></a>
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
	<!-- Trigger the modal with a button -->

	
	<?php if(isset($_SESSION['errorOp'])){ ?>
<script type="text/javascript">
	jQuery(window).load( function(){
		SEMICOLON.widget.notifications( jQuery('#mensaje') );
	});
</script>

<?php if($_SESSION['errorOp']=="Error"){ ?>
 <div id="mensaje" data-notify-position="top-right" 
     data-notify-type="error" 
     data-notify-msg="<i class='icon-remove'></i> La operación de <strong><?php echo $_SESSION['detOp']; ?></strong> no se completó, por favor verifica los datos e intentalo de nuevo"></div>
<?php unset($_SESSION['errorOp']); unset($_SESSION['detOp']); }else{ ?>
  
<div id="mensaje" data-notify-position="top-right" 
     data-notify-type="info" 
     data-notify-msg="<i class='icon-ok'></i> La operación de <strong><?php echo $_SESSION['detOp']; ?></strong> fue exitosa"></div>
<?php unset($_SESSION['errorOp']); unset($_SESSION['detOp']); }} ?>



	<!-- Ir arriba================== -->
	<div id="gotoTop" class="icon-angle-up"></div>
    <!-- /Ir arriba================= -->
    
    
 
    
	<!-- Footer JS================= -->
	<script src="js/dataTables/jquery.dataTables.js"></script>
    <script src="js/dataTables/dataTables.bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
    <script type="text/javascript" src="js/mods/horas.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#dataTables-example2').dataTable( {
                "order": [[ 3, "desc" ]],
                "lengthMenu": [[3,5,10,15], [3,5,10,15]],
                "oLanguage": {
                    "sLengthMenu": " _MENU_ Acciones por p&aacute;gina"
                }
                
            } );
            
        } );
    </script>
    <!-- /Footer JS================ -->

</body>
</html>