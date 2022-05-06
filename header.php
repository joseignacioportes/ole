<?php
session_start();
$usr_id="";
$usr_usuario="";
$usr_nombre_completo="";
$usr_puesto="";
$usr_id_perfil="";
$perfil_nombre="";
$usr_url_foto="";


if((isset($_SESSION["usr_id"])) && (!empty($_SESSION["usr_id"]))){$usr_id=$_SESSION["usr_id"];}
if((isset($_SESSION["usr_usuario"])) && (!empty($_SESSION["usr_usuario"]))){$usr_usuario=$_SESSION["usr_usuario"];}
if((isset($_SESSION["usr_nombre_completo"])) && (!empty($_SESSION["usr_nombre_completo"]))){$usr_nombre_completo=$_SESSION["usr_nombre_completo"];}	
if((isset($_SESSION["usr_puesto"])) && (!empty($_SESSION["usr_puesto"]))){$usr_puesto=$_SESSION["usr_puesto"];}	
if((isset($_SESSION["usr_id_perfil"])) && (!empty($_SESSION["usr_id_perfil"]))){$usr_id_perfil=$_SESSION["usr_id_perfil"];}	
if((isset($_SESSION["perfil_nombre"])) && (!empty($_SESSION["perfil_nombre"]))){$perfil_nombre=$_SESSION["perfil_nombre"];}	
if((isset($_SESSION["usr_url_foto"])) && (!empty($_SESSION["usr_url_foto"]))){$usr_url_foto=$_SESSION["usr_url_foto"];}	


if ((isset($_SESSION["usr_id"]))) {
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>OLE Matchmaker</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		
		<!-- File Input -->
    <link rel="stylesheet" href="assets/fileinput/fileinput.css">
		
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/fullcalendar.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		<link rel="shortcut icon" href="dist/img/ole.ico">
		<style>
			.infotip {
					position: relative;
			}
					
						.infotip a:hover .tooltip-login {
					display: block;
			}
			.infotip a .tooltip-login {
					width: 380px;
					position: absolute;
					right: -48px;
					top: 50px;
					z-index: 9999;
					border-radius: 8px;
					box-shadow: 2px 4px 8px rgb(0 0 0 / 35%);
					background: #fff;
					display: none;
					padding-bottom: 1em;
			}

			.infotip a .tooltip-login .head {
					background: #2e486d;
					padding: 1rem;
					border-radius: 8px 8px 0 0;
			}

			.infotip a .tooltip-login .body {
					padding: 1em .5em 2em .5em;
			}
		</style>
	</head>

	<body class="skin-1">
		<input type="hidden" id="Perfil_Usuario" value="<?php echo $usr_id_perfil; ?>">
		<input type="hidden" id="Usuario_Sistema" value="<?php echo $usr_usuario; ?>">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="Inicio.php" class="navbar-brand">
					
							<img src="logo.png" alt="logo" height="30px">
					
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="grey dropdown-modal" style="display:none">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-tasks"></i>
								<span class="badge badge-grey">4</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-check"></i>
									4 Tasks to complete
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Software Update</span>
													<span class="pull-right">65%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:65%" class="progress-bar"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Hardware Upgrade</span>
													<span class="pull-right">35%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:35%" class="progress-bar progress-bar-danger"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Unit Testing</span>
													<span class="pull-right">15%</span>
												</div>

												<div class="progress progress-mini">
													<div style="width:15%" class="progress-bar progress-bar-warning"></div>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">Bug Fixes</span>
													<span class="pull-right">90%</span>
												</div>

												<div class="progress progress-mini progress-striped active">
													<div style="width:90%" class="progress-bar progress-bar-success"></div>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See tasks with details
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="purple dropdown-modal" style="display:none">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									8 Notifications
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
														New Comments
													</span>
													<span class="pull-right badge badge-info">+12</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<i class="btn btn-xs btn-primary fa fa-user"></i>
												Bob just signed up as an editor ...
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
														New Orders
													</span>
													<span class="pull-right badge badge-success">+8</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
														Followers
													</span>
													<span class="pull-right badge badge-info">+11</span>
												</div>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See all notifications
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="green dropdown-modal" style="display:none">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">5</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									5 Messages
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#" class="clearfix">
												<img src="assets/images/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Alex:</span>
														Ciao sociis natoque penatibus et auctor ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>a moment ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="assets/images/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Susan:</span>
														Vestibulum id ligula porta felis euismod ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>20 minutes ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="assets/images/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Bob:</span>
														Nullam quis risus eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>3:15 pm</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="assets/images/avatars/avatar2.png" class="msg-photo" alt="Kate's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Kate:</span>
														Ciao sociis natoque eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>1:33 pm</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#" class="clearfix">
												<img src="assets/images/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Fred:</span>
														Vestibulum id penatibus et auctor  ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>10:09 am</span>
													</span>
												</span>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="inbox.html">
										See all messages
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<?php 
									if($usr_url_foto!=""){
										echo '<img class="nav-user-photo" src="Fotos/'.$usr_url_foto.'" />';
									}else{
										echo '<img class="nav-user-photo" src="assets/images/avatars/user.jpg" />';
									}
								?>
								
								<span class="user-info">
									<small>Bienvenido,</small>
									<?php echo $usr_nombre_completo; ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li style="display:none">
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li style="display:none">
									<a href="#">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="index.php">
										<i class="ace-icon fa fa-power-off"></i>
										Salir
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="active">
						<a href="Inicio.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Inicio </span>
						</a>

						<b class="arrow"></b>
					</li>

					
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text">
								Admin. de Usuarios
							</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						

						<b class="arrow"></b>

						<ul class="submenu">
							

							<li class="">
								<a href="usuarios.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Usuarios
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="perfiles.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Perfiles
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-book"></i>
							<span class="menu-text">
								Admin. Catálogos
							</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="cat_proveedores_servicios.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Proveedores Servicios
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="admin_eventos.php">
							<i class="menu-icon fa fa-check-square-o"></i>
							<span class="menu-text"> Admin Eventos </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="admin_calendario.php">
							<i class="menu-icon fa fa-calendar"></i>

							<span class="menu-text">
								Dias Festivos

								<span class="badge badge-transparent tooltip-error" title="2 Important Events" style="display:none">
									<i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>
								</span>
							</span>
						</a>

						<b class="arrow"></b>
					</li>
					<!--
					<li class="">
						<a href="admin_form_registro.php">
							<i class="menu-icon fa fa-edit"></i>

							<span class="menu-text">
								Admin Form. Registro

								<span class="badge badge-transparent tooltip-error" title="2 Important Events" style="display:none">
									<i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>
								</span>
							</span>
						</a>

						<b class="arrow"></b>
					</li>
					-->
					<li class="" style="display:none">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-envelope"></i>
							<span class="menu-text">
								Admin Comunicados
							</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						

						<b class="arrow"></b>

						<ul class="submenu">
							

							<li class="">
								<a href="info_proveedores.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Info Proveedores
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="formato_inscripcion.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Formato de Inscripción
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>
					
					<li class="">
						<a href="admin_compradores.php">
							<i class="menu-icon fa fa-user"></i>

							<span class="menu-text">
								Admin Compradores

								<span class="badge badge-transparent tooltip-error" title="2 Important Events" style="display:none">
									<i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>
								</span>
							</span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="admin_proveedores.php">
							<i class="menu-icon fa fa-briefcase"></i>

							<span class="menu-text">
								Admin Proveedores

								<span class="badge badge-transparent tooltip-error" title="2 Important Events" style="display:none">
									<i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>
								</span>
							</span>
						</a>

						<b class="arrow"></b>
					</li>
			
					
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>
			
<?php 
}
else
{
	header('Location:index.php');
}
?>	