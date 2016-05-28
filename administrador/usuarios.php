<?php
include '../lib/mods/validarPermisos.php';
include_once '../lib/class/Usuario.php';

$classUsuarios = new Usuario();
$dataUsuario = $classUsuarios -> showData();
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
	<title>S.W.C.D/Usuarios</title>

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
				<h1><i class="icon-line2-users"></i> Usuarios</h1>
				<!-- Menu=================== -->
				<ol class="breadcrumb">
					<li><a href="index.php">Administrador</a></li>
					<li>Usuarios</li>
				</ol>
                <!-- /Menu================== -->
			</div>

		</section>
        <!-- /Titulo Pagina================== -->
         
		<!-- Contenido=================== -->
		<section id="content">

			<div class="content-wrap-short">

				<div class="container clearfix">
                 
                   <div class="col_three_fourth"><h4>
                   <i class="icon-grid"></i> Tabla de elementos</h4></div>
                   <div class="col_one_fourthm col_last center">
                   <a href="form-usuarios.php" class="button button-rounded button-reveal button-teal button-border tright"><i class="icon-plus-sign2"></i><span>Agregar Usuario</span></a>
                   <a href="usuarios-inactivos.php" class="button button-rounded button-reveal button-red button-border tright"><i class="icon-line2-user-unfollow"></i><span>Usuarios de baja</span></a></div>
                   <div class="col_full alert sm alert-info">
				   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				   <i class="icon-info-sign"></i> El sistema solo muestra los <strong>datos más importantes</strong>, puede acceder a los datos completos del usuario al hacer click sobre el numero de usuario
                   </div>
                    <div class="col_full">
						<div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                            <thead>
                                                <tr>
                                                    <th>No. de expediente</th>
                                                    <th>Nombre</th>
                                                    <th>Proceso</th>
                                                    <th>Subdirección</th>
                                                    <th>Área</th>
                                                    <th>Nivel</th>
                                                    <th>Estado</th>
                                                    <th>Editar</th>
                                                    <th>Borrar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            
                            <?php
                            if($dataUsuario != NULL){
                            while($data=$dataUsuario->fetchObject()){   
                                
                                if($data->uc_usuario==NULL){
                                    $uc_usuario="Sistema";
                                }else{
                                $idc=$data->uc_usuario;
                                $classUsuario = new Usuario();
                                $dataUsuario = $classUsuario -> showData($idc);
                                $dataU=$dataUsuario->fetchObject();
                                $uc_usuario=$dataU->nom_usuario;
                                }
                                
                                if($data->fc_usuario==NULL){
                                    $fc_usuario="Creado con el sistema";
                                }else{
                                    $fecha = DateTime::createFromFormat('Y-m-d H:i:s', $data->fc_usuario);
                                    $ts= $fecha->getTimestamp();
                                    $fc_usuario=strftime("%d %B del %Y &nbsp;|&nbsp; %I:%M:%S %p",$ts);
                                }
                               
                                if($data->um_usuario==NULL){
                                    $um_usuario="Sin Modificaciones";
                                }else{
                                $idm=$data->um_usuario;
                                $classUsuario2 = new Usuario();
                                $dataUsuario2 = $classUsuario2 -> showData($idm);
                                $dataU2=$dataUsuario2->fetchObject();
                                $um_usuario=$dataU2->nom_usuario;
                                }
                                
                                 if($data->fm_usuario==NULL){
                                    $fm_usuario="Sin Modificaciones";
                                }else{
                                    $fecha = DateTime::createFromFormat('Y-m-d H:i:s', $data->fm_usuario);
                                    $ts= $fecha->getTimestamp();
                                    $fm_usuario=strftime("%d %B del %Y &nbsp;|&nbsp; %I:%M:%S %p",$ts);
                                }
                                
                                
                                
                            echo "<tr class='odd gradeX center'>";
                            echo "<td><button class='button button-rounded button-reveal button-blue tright popov' role='button' data-toggle='popover' data-trigger='focus'
                            title='Informacion de ". $data->nom_usuario."' data-placement='right' 
                            data-content='
               <strong> No. de Expediente:</strong>&nbsp;".  $data->no_usuario ."<br>
               <strong> E-mail:</strong>&nbsp;".  $data->email_usuario ."<br>
               <strong> Teléfono:</strong>&nbsp;".  $data->tel_usuario ."<br>
               <strong> Extención:</strong>&nbsp;".  $data->ext_usuario ."<br>
               <strong> Usuario creador :</strong>&nbsp;<br>".  $uc_usuario ."<br>
               <strong> Fecha de creación:</strong>&nbsp;<br>".  $fc_usuario ."<br>
               <strong> Usuario modificador:</strong>&nbsp;<br>".  $um_usuario ."<br>
               <strong> Fecha de modificación:</strong>&nbsp;<br>".  $fm_usuario ."<br>
                            '><i class='icon-line-search'></i><span>". $data->no_usuario  ."&nbsp;</span></button>
                            </td>"; 

                            echo "<td>" . $data->nom_usuario . "</td>";
                            echo "<td>" . $data->nom_proceso . "</td>";
                            echo "<td>" . $data->nom_subdireccion . "</td>";
                            echo "<td>" . $data->nom_area . "</td>";
                            echo "<td>" . $data->nivel_usuario . "</td>";
                            echo "<td>" . $data->status_usuario . "</td>";
                            echo "<td class='center'>
                            <form name='F-update' action='form-usuarios.php' method='post'>
                            <input type='hidden' name='id' value='".$data->id_usuario."'>
                            <input type='hidden' name='nom' value='".$data->nom_usuario."'>
                            <input type='hidden' name='pass' value='".$data->pass_usuario."'>
                            <button type='submit' class=' button button-rounded button-reveal button-amber tright'><i class='icon-line2-pencil'></i><span>Editar</span></button>
                            </form>
                            </td>";
                            echo "<td class='center'>
                            <form name='F-update' action='../lib/ops_usuario/deleteUsuario.php' method='post'>
                            <input type='hidden' name='id' value='".$data->id_usuario."'>
                            <input type='hidden' name='nom' value='".$data->nom_usuario."'>
                            <input type='hidden' name='status' value='Inactivo'>
                            <input type='hidden' name='uc_log' value='".$_SESSION['id_usuario']."'>
                            <button type='submit' class=' button button-rounded button-reveal button-red tright'><i class='icon-line2-user-unfollow'></i><span>Dar de baja</span></button>
                            </form>
                            </td>";
                            echo "</tr>"; ?>
                            <?php } } ?>
                                                         
                               </tbody>
                            </table>
                        </div>
                    </div>
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
<?php unset($_SESSION['errorOp']); unset($_SESSION['detOp']); }else{ 
    
   if($_SESSION['errorOp']=="ErrorDel"){ ?>
 <div id="mensaje" data-notify-position="top-right" 
     data-notify-type="error" 
     data-notify-msg="<i class='icon-remove'></i> La operación de <strong><?php echo $_SESSION['detOp']; ?></strong> no se completó, por favor verifica si el área no está siendo usada por un usuario , ya que no es posible borrar un área que está siendo usada"></div>
       
  <?php unset($_SESSION['errorOp']); unset($_SESSION['detOp']); }else{ ?>
  
<div id="mensaje" data-notify-position="top-right" 
     data-notify-type="info" 
     data-notify-msg="<i class='icon-ok'></i> La operación de <strong><?php echo $_SESSION['detOp']; ?></strong> fue exitosa"></div>
<?php unset($_SESSION['errorOp']); unset($_SESSION['detOp']); }}} ?>

    







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
                "order": [[ 1, "asc" ]],
                "lengthMenu": [[3,5,10,15], [3,5,10,15]],
                "oLanguage": {
                    "sLengthMenu": " _MENU_ Usuarios por p&aacute;gina"
                }
            } );
            
        } );
    </script>
     <script>
        $('.popov').popover({ html : true});
    </script> 
    <!-- /Footer JS================ -->

</body>
</html>