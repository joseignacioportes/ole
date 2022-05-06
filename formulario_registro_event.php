<?php
include_once("datos/dtotojson/DtoToJson.Class.php");
include_once("datos/json/JsonEncod.Class.php");
include_once("datos/json/JsonDecod.Class.php");
include_once("datos/connect/Proveedor.Class.php");
	$evento_id=$_GET["key"];
	$evento_logo="";
	$evento_servicios="";	
	$evento_reg_compr_footer="";	
	if($evento_id!=""){
		$proveedor_servicios = new Proveedor('mysql', 'eventos');
		$proveedor_servicios->connect();
		$sql=" 
			select 
				evento_logo,
				evento_servicios,
				evento_reg_compr_footer
			from 
				eventos_admin 
			where evento_estatus<>'E' and evento_id =".$evento_id."
		";
		
		$proveedor_servicios->execute($sql);
		if (!$proveedor_servicios->error()){
			if ($proveedor_servicios->rows($proveedor_servicios->stmt) > 0) {
				while ($row = $proveedor_servicios->fetch_array($proveedor_servicios->stmt, 0)) {
					$evento_logo=$row["evento_logo"];
					$evento_servicios=$row["evento_servicios"];
					$evento_reg_compr_footer=$row["evento_reg_compr_footer"];
				}
			}
		}		
	}	
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="shortcut icon" href="images/favicon.ico">
		<title>Registro de Compradores</title>
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets_ext/css/bootstrap.css" />
		<link rel="stylesheet" href="assets_ext/css/font-awesome.css" />
		<!--Libreria iconos menu -->
		<!-- page specific plugin styles -->
		
		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets_ext/css/jquery-ui.custom.css" />
		<link rel="stylesheet" href="assets_ext/css/jquery.gritter.css" />
		<!-- text fonts -->
		<link rel="stylesheet" href="assets_ext/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets_ext/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets_ext/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets_ext/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets_ext/js/ace-extra.js"></script>
		
		<!-- FavIcon -->
		<link rel="shortcut icon" href="dist/img/ole.ico">
		
		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries 
		<link rel="stylesheet" href="assets_ext/css/jquery-ui.custom.css" />
		<link rel="stylesheet" href="assets_ext/css/chosen.css" />
		<link rel="stylesheet" href="assets_ext/css/datepicker.css" />
		<link rel="stylesheet" href="assets_ext/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="assets_ext/css/daterangepicker.css" />
		<link rel="stylesheet" href="assets_ext/css/bootstrap-datetimepicker.css" />
		<link rel="stylesheet" href="assets_ext/css/colorpicker.css" />
		-->
		
		<!--[if lte IE 8]>
		<script src="assets_ext/js/html5shiv.js"></script>
		<script src="assets_ext/js/respond.js"></script>
		<![endif]-->
		<style>
			.fc-agendaWeek-view tr {
					height: 28px;
			}

			.fc-agendaDay-view tr {
					height: 28px;
			}
		
			label span {
				font-size: 1rem;
			}

			label.error {
					color: red;
					font-size: 1rem;
					display: block;
					margin-top: 5px;
					position: absolute;
					z-index: 4;
					padding-left: 3px;
					top: 54px;
			}

			input.error, textarea.error {
					border: 1px dashed red;
					font-weight: 300;
					color: red;
			}
			
			.modal-dialog {
					position: relative;
					width: auto;
					margin: 10px;
			}

			@media (min-width: 768px)
			.modal-dialog {
					width: 600px;
					margin: 30px auto;
			}

			.modal.fade .modal-dialog {
					-webkit-transition: -webkit-transform .3s ease-out;
					-o-transition: -o-transform .3s ease-out;
					transition: transform .3s ease-out;
					-webkit-transform: translate(0,-25%);
					-ms-transform: translate(0,-25%);
					-o-transform: translate(0,-25%);
					transform: translate(0,-25%);
			}

			.modal.in .modal-dialog {
					-webkit-transform: translate(0,0);
					-ms-transform: translate(0,0);
					-o-transform: translate(0,0);
					transform: translate(0,0);
			}

			.skin-blue .modalchs .modal-dialog.modal-xl {
					max-width: 1200px;
					width: 100%;
					margin: 30px auto;
			}
			
			
			
			ul.acoat li {
				display: inline-block;
				margin: 0 .7em;
			}
			
			/*Vista Agenda, Circulo de colores*/
			ul.acoat {
					padding-left: 0;
					text-align: center;
					padding: .5em;
			}
			ul.acoat li span {
					border-radius: 50%;
					display: inline-block;
					vertical-align: middle;
					margin: 3px;
			}
			/*Fin Vista Agenda, Circulo de colores*/
		</style>
	</head>
	
	<body class="no-skin">
		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<div class="main-content">
				<div class="main-content-inner">
					
					<!-- page-header -->
					<div class="row">
						<div class="col-xs-12 col-sm-12" align="center">
							<img class="img-responsive" width="20%" src="<?php echo $evento_logo; ?>">
						</div>
					</div>
					
					<div class="page-content">
						<div class="page-header" align="center">
							<h1><b>FORMULARIO DE REGISTRO</b></h1>
						</div>
					</div>
					<!-- /.page-header -->


						<div class="row">
							<div class="col-xs-12 col-sm-12">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form">
									<div class="row">
										<div class="col-xs-12 col-sm-12">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title" id="titulo_encabezado">DATOS  DEL COMPRADOR</h4>
													<div class="widget-toolbar">
														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>
													</div>
												</div>
												<div class="widget-body">
													<div class="widget-main">
														<div class="row">
															<div class="col-xs-12">
																<!-- PAGE CONTENT BEGINS -->
																<div class="form-horizontal" role="form">
																	<input type="hidden" value="<?php echo $evento_id; ?>" id="evento_id">
																	<div class="form-group">
																		<div class="col-xs-12 col-sm-4">
																			<label><span style="color:red">*</span> Apellido Paterno:</label>
																			<input type="text" class="form-control col-xs-12 col-sm-12" id="reg_compr_dat_per_ap_pat" maxlength="80">
																		</div>
																		<div class="col-xs-12 col-sm-4">
																			<label><span style="color:red">*</span> Apellido Materno:</label>
																			<input type="text" class="form-control col-xs-12 col-sm-12" id="reg_compr_dat_per_ap_mat" maxlength="80">
																		</div>
																		<div class="col-xs-12 col-sm-4">
																			<label><span style="color:red">*</span> Nombre(s):</label>
																			<input type="text" class="form-control col-xs-12 col-sm-12" id="reg_compr_dat_per_nombres" maxlength="80">
																		</div>
																	</div>
																	<div class="form-group">
																		<div class="col-xs-12 col-sm-6">
																			<label><span style="color:red">*</span> Cargo:</label>
																			<input type="text" class="form-control col-xs-12 col-sm-12" id="reg_compr_dat_per_cargo" maxlength="200">
																		</div>
																		<div class="col-xs-12 col-sm-3">
																			<label><span style="color:red">*</span> Celular:</label>
																			<input type="text" class="form-control col-xs-12 col-sm-12" id="reg_compr_dat_per_celular" maxlength="20">
																		</div>
																		<div class="col-xs-12 col-sm-3">
																			<label><span style="color:red">*</span> Correo Electr&oacute;nico:</label>
																			<input type="text" class="form-control col-xs-12 col-sm-12" id="reg_compr_dat_per_email" maxlength="80">
																		</div>
																	</div>	
																	<div class="form-group">
																		<div class="col-xs-12 col-sm-8">
																			<label></span> Foto (para uso en la agenda del evento):</label>
																			<br>
																			<input type="file" id="subir_imagen_logo" class="btn btn-info col-sm-8"><a href="#modal_logo" class="col-sm-4" id="ver_imagen_1" style="display:none" data-toggle="modal">Ver Imágen</a>
																			<input type="text" id="reg_compr_dat_per_foto"  class="col-xs-10 col-sm-8" style="display:none">
																		</div>
																	</div>
																	
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									
									
											<div class="col-xs-12 col-sm-12">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">DATOS DE LA EMPRESA</h4>
													<div class="widget-toolbar">
														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>
													</div>
												</div>
												<div class="widget-body">
													<div class="widget-main">
														<div class="row">
															<div class="col-xs-12">
																<!-- PAGE CONTENT BEGINS -->
																<div class="form-horizontal" role="form">
																	<div class="form-group">
																		<div class="col-xs-12 col-sm-4">
																			<label><span style="color:red">*</span> Nombre Empresa:</label>
																			<input type="text" class="form-control col-xs-12 col-sm-12" id="reg_compr_dat_emp_raz_soc" maxlength="200">
																		</div>
																		<div class="col-xs-12 col-sm-4">
																			<label><span style="color:red"></span> Año en que se estableció la empresa:</label>
																			<input type="text" class="form-control col-xs-12 col-sm-12" id="reg_compr_dat_emp_anio_est" maxlength="10">
																		</div>
																		<div class="col-xs-12 col-sm-4">
																			<label><span style="color:red"></span> Cantidad de establecimientos:</label>
																			<input type="text" class="form-control col-xs-12 col-sm-12" id="reg_compr_dat_emp_cant_estblmts" maxlength="20">
																		</div>
																	</div>
																	<div class="form-group">
																		<div class="col-xs-12 col-sm-6">
																			<label><span style="color:red">*</span> ¿Su empresa pertenece alguno de estos giros?</label>
																			<br>
																			<div class="col-xs-12 col-sm-12">
																				<input type="hidden" id="reg_compr_dat_emp_giro">
																				<input  type="checkbox" class="ace" id="reg_compr_dat_emp_giro_1" value="Plantas Industriales" name="orderBoxGiros[]" onchange="pasarcheckgiros()">
																				<span class="lbl">Plantas Industriales</span><br>
																				<input  type="checkbox" class="ace" id="reg_compr_dat_emp_giro_9" value="Corporativos" name="orderBoxGiros[]" onchange="pasarcheckgiros()">
																				<span class="lbl">Corporativos</span><br>
																				<input  type="checkbox" class="ace" id="reg_compr_dat_emp_giro_2" value="HoReCa" name="orderBoxGiros[]" onchange="pasarcheckgiros()">
																				<span class="lbl">HoReCa</span><br>
																				<input  type="checkbox" class="ace" id="reg_compr_dat_emp_giro_10" value="Canal Retail" name="orderBoxGiros[]" onchange="pasarcheckgiros()">
																				<span class="lbl">Canal Retail</span><br>
																				<input  type="checkbox" class="ace" id="reg_compr_dat_emp_giro_3" value="Salud" name="orderBoxGiros[]" onchange="pasarcheckgiros()">
																				<span class="lbl">Salud</span><br>
																				<input  type="checkbox" class="ace" id="reg_compr_dat_emp_giro_4" value="Entretenimiento" name="orderBoxGiros[]" onchange="pasarcheckgiros()">
																				<span class="lbl">Entretenimiento</span><br>
																				<input  type="checkbox" class="ace" id="reg_compr_dat_emp_giro_6" value="Desarrolladores Industriales" name="orderBoxGiros[]" onchange="pasarcheckgiros()">
																				<span class="lbl">Desarrolladores Industriales</span><br>
																				<input  type="checkbox" class="ace" id="reg_compr_dat_emp_giro_11" value="Otros" name="orderBoxGiros[]" onchange="pasarcheckgiros()">
																				<span class="lbl">Otros</span>
																			</div>
																		</div>
																		<div class="col-xs-12 col-sm-6">
																			<label><span style="color:red"></span> ¿Cu&aacute;les?</label>
																			<input type="text" class="form-control col-xs-12 col-sm-12" id="reg_compr_dat_emp_giro_otro" maxlength="180">
																		</div>
																	</div>
																	<div class="form-group">
																		<div class="col-xs-12 col-sm-4">
																			<label><span style="color:red">*</span> Calle:</label>
																			<input type="text" class="form-control col-xs-12 col-sm-12" id="reg_compr_dat_emp_calle" maxlength="250">
																		</div>
																		<div class="col-xs-12 col-sm-4">
																			<label><span style="color:red">*</span> N&uacute;mero Exterior:</label>
																			<input type="text" class="form-control col-xs-12 col-sm-12" id="reg_compr_dat_emp_num_ext" maxlength="50">
																		</div>
																		<div class="col-xs-12 col-sm-4">
																			<label><span style="color:red"></span> Número Interior</label>
																			<input type="text" class="form-control col-xs-12 col-sm-12" id="reg_compr_dat_emp_num_int" maxlength="50">
																		</div>
																	</div>
																	<div class="form-group">
																		<div class="col-xs-12 col-sm-4">
																			<label><span style="color:red">*</span> Colonia:</label>
																			<input type="text" class="form-control col-xs-12 col-sm-12" id="reg_compr_dat_emp_colonia" maxlength="250">
																		</div>
																		<div class="col-xs-12 col-sm-4">
																			<label><span style="color:red"></span> C&oacute;digo Postal:</label>
																			<input type="text" class="form-control col-xs-12 col-sm-12" id="reg_compr_dat_emp_cp" maxlength="10">
																		</div>
																	</div>
																	<div class="form-group">
																		<div class="col-xs-12 col-sm-4">
																			<label><span style="color:red">*</span> Ciudad</label>
																			<input type="text" class="form-control col-xs-12 col-sm-12" id="reg_compr_dat_emp_ciudad" maxlength="120">
																		</div>
																		<div class="col-xs-12 col-sm-4">
																			<label><span style="color:red">*</span> Estado:</label>
																			<input type="text" class="form-control col-xs-12 col-sm-12" id="reg_compr_dat_emp_estado" maxlength="80">
																		</div>
																		<div class="col-xs-12 col-sm-4">
																			<label><span style="color:red"></span> Pa&iacute;s:</label>
																			<input type="text" class="form-control col-xs-12 col-sm-12" id="reg_compr_dat_emp_pais" maxlength="80">
																		</div>
																	</div>
																	<div class="form-group">
																		<div class="col-xs-12 col-sm-4">
																			<label><span style="color:red">*</span> Tel&eacute;fono(s)</label>
																			<input type="text" class="form-control col-xs-12 col-sm-12" id="reg_compr_dat_emp_telef_directo" maxlength="20">
																		</div>
																		<div class="col-xs-12 col-sm-2">
																			<label><span style="color:red"></span> Extensi&oacute;n:</label>
																			<input type="text" class="form-control col-xs-12 col-sm-12" id="reg_compr_dat_emp_telef_directo_ext" maxlength="50">
																		</div>
																		<div class="col-xs-12 col-sm-6">
																			<label><span style="color:red"></span> Pa&iacute;gina web:</label>
																			<input type="text" class="form-control col-xs-12 col-sm-12" id="reg_compr_dat_emp_pag_web" maxlength="500">
																		</div>
																	</div>
																	<div class="form-group">
																		<div class="col-xs-12 col-sm-4">
																			<label><span style="color:red"></span> Nombre asistente</label>
																			<input type="text" class="form-control col-xs-12 col-sm-12" id="reg_compr_dat_emp_asistente" maxlength="150">
																		</div>
																		<div class="col-xs-12 col-sm-4">
																			<label><span style="color:red"></span> Describa brevemente el proceso de compra de su &aacute;rea:</label>
																			<textarea class="form-control col-xs-12 col-sm-12" id="reg_compr_dat_emp_proc_comp"></textarea>
																		</div>
																		<div class="col-xs-12 col-sm-4">
																			<label><span style="color:red"></span> ¿Cu&aacute;l es su objetivo de asistir al Evento?</label>
																			<textarea class="form-control col-xs-12 col-sm-12" id="reg_compr_obj_asistir"></textarea>
																		</div>
																	</div>
																	<div class="form-group">
																		<div class="col-xs-12 col-sm-6">
																				<label><span style="color:red">*</span> Indique cual es su nivel de decisión de compra:</label>
																				<br>
																				<div class="col-xs-12 col-sm-12">	
																					<input name="desicion" id="reg_compr_dat_per_nivel_des_com_1" type="radio" class="ace">
																					<span class="lbl">Total</span><br>
																					<input name="desicion" id="reg_compr_dat_per_nivel_des_com_2" type="radio" class="ace">
																					<span class="lbl">Parcial</span><br>
																					<input name="desicion" id="reg_compr_dat_per_nivel_des_com_3" type="radio" class="ace">
																					<span class="lbl">No decice</span>
																				</div>
																		 </div>
																	 </div>
																	
																	
																	<div class="form-group">
																		<div class="col-xs-12 col-sm-12">
																			<label><span style="color:red">*</span> De estas l&iacute;neas de producto, ¿Cuáles le interesar&iacute;a contactar en el evento?</label>
																			<br>
																			<div class="col-xs-12 col-sm-12">
																				<input type="hidden" id="reg_compr_lineas_ints">
																				<?php
																					if($evento_servicios!=""){
																						$evento_servicios = explode(",", $evento_servicios);
																						for($i=0; $i<count($evento_servicios); $i++){
																							echo '
																								<input  type="checkbox" class="ace" id="reg_compr_lineas_ints_'.($i+1).'" value="'.rtrim(ltrim($evento_servicios[$i])).'" name="orderBoxLineasProd[]" onchange="pasarchelineasprod()">
																								<span class="lbl">'.rtrim(ltrim($evento_servicios[$i])).'</span><br>
																							';	
																						}
																					}
																				?>
																				
																				
																			</div>
																		</div>
																	</div>
																	<div class="form-group">
																		<div class="col-xs-12 col-sm-5">
																			<label><span style="color:red"></span> Si hay alguna empresa que desea que invitemos  o un servicio en especial, háganoslo saber</label>
																			<input type="text" class="form-control col-xs-12 col-sm-12" id="reg_compr_invt_empr_serv" maxlength="8000">
																		</div>
																		<div class="col-xs-12 col-sm-4">
																			<label><span style="color:red"></span> ¿Participó en un encuentro de negocios?</label>
																			<br>
																			<div class="col-xs-12 col-sm-12">	
																				<input name="participo" id="reg_compr_partpn_ant_1" type="radio" class="ace">
																				<span class="lbl">Si</span><br>
																				<input name="participo" id="reg_compr_partpn_ant_2" type="radio" class="ace">
																				<span class="lbl">No</span>
																			</div>
																		</div>
																		<div class="col-xs-12 col-sm-3">
																			<label><span style="color:red"></span> ¿Cuál?</label>
																			<input type="text" class="form-control col-xs-12 col-sm-12" id="reg_compr_partpn_ant_evento" maxlength="150">
																		</div>
																	</div>
																	<div class="form-group">
																		<div class="col-xs-12 col-sm-12">
																			<label><span style="color:red">*</span>&nbsp;<input name="certifico" id="reg_compr_cert_inf" type="checkbox">&nbsp;Certifico que la información provista es correcta y me gustaría ser invitado a participar en el evento</label>
																		</div>
																	</div>
																	<div class="form-group" align="center">
																		<div class="col-xs-12 col-sm-12">
																			<label style="display:none" id="lbl_guardando_info">Guardando Información ...</label>
																			<input type="button"  class="btn btn-lg btn-success" onclick="enviar()" value="Enviar" id="enviar_re">
																		</div>
																	</div>
																	
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									
									</div>
									
								</form>

							</div><!-- /.col -->
						</div><!-- /.row -->
						<div class="row">
							<div class="col-xs-12 col-sm-12" align="center">
								<?php echo $evento_reg_compr_footer;?>
							</div>
						</div>
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			
			<div id="modal_logo" class="modal fade" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="smaller lighter blue no-margin">Foto</h3>
						</div>
						<div class="modal-body" id="logo_img">
						</div>
						<div class="modal-footer">
							<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
								<i class="ace-icon fa fa-times"></i>
								Cerrar
							</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div>
				
			
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets_ext/js/jquery.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
		<script type="text/javascript">
		 window.jQuery || document.write("<script src='assets_ext/js/jquery1x.js'>"+"<"+"/script>");
		</script>
		<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets_ext/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="assets_ext/js/bootstrap.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets_ext/js/excanvas.js"></script>
		<![endif]-->
		<script src="assets_ext/js/jquery-ui.custom.js"></script>
		<script src="assets_ext/js/jquery.ui.touch-punch.js"></script>
		<script src="assets_ext/js/jquery.easypiechart.js"></script>
		<script src="assets_ext/js/jquery.sparkline.js"></script>
		
		<script src="assets_ext/js/chosen.jquery.js"></script>
		<script src="assets_ext/js/fuelux/fuelux.spinner.js"></script>
		<!--
		<script src="assets_ext/js/date-time/bootstrap-datepicker.js"></script>
		<script src="assets_ext/js/date-time/bootstrap-timepicker.js"></script>
		-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
		
		<!--
		<script src="assets_ext/js/date-time/daterangepicker.js"></script>
		<script src="assets_ext/js/date-time/bootstrap-datetimepicker.js"></script>
		-->
		<!--Graficos
		<script src="assets_ext/js/flot/jquery.flot.js"></script>
		<script src="assets_ext/js/flot/jquery.flot.pie.js"></script>
		<script src="assets_ext/js/flot/jquery.flot.resize.js"></script>
		Graficos-->
		
		<script src="assets_ext/js/dataTables/jquery.dataTables.js"></script>
		<script src="assets_ext/js/dataTables/jquery.dataTables.bootstrap.js"></script>
		<script src="assets_ext/js/dataTables/extensions/TableTools/js/dataTables.tableTools.js"></script>
		<script src="assets_ext/js/dataTables/extensions/ColVis/js/dataTables.colVis.js"></script>

		
		
		<!-- ace scripts -->
		<script src="assets_ext/js/ace/elements.scroller.js"></script>
		<script src="assets_ext/js/ace/elements.colorpicker.js"></script>
		<script src="assets_ext/js/ace/elements.fileinput.js"></script>
		<script src="assets_ext/js/ace/elements.typeahead.js"></script>
		<script src="assets_ext/js/ace/elements.wysiwyg.js"></script>
		<script src="assets_ext/js/ace/elements.spinner.js"></script>
		<script src="assets_ext/js/ace/elements.treeview.js"></script>
		<script src="assets_ext/js/ace/elements.wizard.js"></script>
		<script src="assets_ext/js/ace/elements.aside.js"></script>
		<script src="assets_ext/js/ace/ace.js"></script>
		<script src="assets_ext/js/ace/ace.ajax-content.js"></script>
		<script src="assets_ext/js/ace/ace.touch-drag.js"></script>
		<script src="assets_ext/js/ace/ace.sidebar.js"></script>
		<script src="assets_ext/js/ace/ace.sidebar-scroll-1.js"></script>
		<script src="assets_ext/js/ace/ace.submenu-hover.js"></script>
		<script src="assets_ext/js/ace/ace.widget-box.js"></script>
		<script src="assets_ext/js/ace/ace.settings.js"></script>
		<script src="assets_ext/js/ace/ace.settings-rtl.js"></script>
		<script src="assets_ext/js/ace/ace.settings-skin.js"></script>
		<script src="assets_ext/js/ace/ace.widget-on-reload.js"></script>
		<script src="assets_ext/js/ace/ace.searchbox-autocomplete.js"></script>
		

		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="assets_ext/css/ace.onpage-help.css" />
		<link rel="stylesheet" href="docs/assets_ext/js/themes/sunburst.css" />

		<script type="text/javascript"> ace.vars['base'] = '..'; </script>
		<script src="assets_ext/js/ace/elements.onpage-help.js"></script>
		<script src="assets_ext/js/ace/ace.onpage-help.js"></script>
		<script src="docs/assets_ext/js/rainbow.js"></script>
		<script src="docs/assets_ext/js/language/generic.js"></script>
		<script src="docs/assets_ext/js/language/html.js"></script>
		<script src="docs/assets_ext/js/language/css.js"></script>
		<script src="docs/assets_ext/js/language/javascript.js"></script>
		
		<script>
			pasarchelineasprod=function()
			{   
					var checkboxValues = "";
					$('input[name="orderBoxLineasProd[]"]:checked').each(function() { checkboxValues += $(this).val() + ","; });
					checkboxValues = checkboxValues.substring(0, checkboxValues.length-1);
					$("#reg_compr_lineas_ints").val(checkboxValues);
			}
			
			pasarcheckgiros=function()
			{   
					var checkboxValues = "";
					$('input[name="orderBoxGiros[]"]:checked').each(function() { checkboxValues += $(this).val() + ","; });
					checkboxValues = checkboxValues.substring(0, checkboxValues.length-1);
					$("#reg_compr_dat_emp_giro").val(checkboxValues);
			}
		
		
			enviar=function(){
				var Agregar = true;
				var mensaje_error = "";
				var evento_id=$.trim($("#evento_id").val());
				var reg_compr_dat_per_ap_pat=$.trim($("#reg_compr_dat_per_ap_pat").val());
				var reg_compr_dat_per_ap_mat=$.trim($("#reg_compr_dat_per_ap_mat").val());
				var reg_compr_dat_per_nombres=$.trim($("#reg_compr_dat_per_nombres").val());
				var reg_compr_dat_per_cargo=$.trim($("#reg_compr_dat_per_cargo").val());
				var reg_compr_dat_per_celular=$.trim($("#reg_compr_dat_per_celular").val());
				var reg_compr_dat_per_email=$.trim($("#reg_compr_dat_per_email").val());
				var reg_compr_dat_per_foto=$.trim($("#reg_compr_dat_per_foto").val());
				var reg_compr_dat_per_nivel_des_com=""; 
				if($("#reg_compr_dat_per_nivel_des_com_1").is(':checked')){
					reg_compr_dat_per_nivel_des_com="Total";
				}
				
				if($("#reg_compr_dat_per_nivel_des_com_2").is(':checked')){
					reg_compr_dat_per_nivel_des_com="Parcial";
				}
				
				if($("#reg_compr_dat_per_nivel_des_com_3").is(':checked')){
					reg_compr_dat_per_nivel_des_com="No decide";
				}
				var reg_compr_dat_emp_raz_soc=$.trim($("#reg_compr_dat_emp_raz_soc").val());
				var reg_compr_dat_emp_anio_est=$.trim($("#reg_compr_dat_emp_anio_est").val());
				var reg_compr_dat_emp_cant_estblmts=$.trim($("#reg_compr_dat_emp_cant_estblmts").val());
				var reg_compr_dat_emp_giro=$.trim($("#reg_compr_dat_emp_giro").val());
				var reg_compr_dat_emp_giro_otro=$.trim($("#reg_compr_dat_emp_giro_otro").val());
				var reg_compr_dat_emp_calle=$.trim($("#reg_compr_dat_emp_calle").val());
				var reg_compr_dat_emp_num_ext=$.trim($("#reg_compr_dat_emp_num_ext").val());
				var reg_compr_dat_emp_num_int=$.trim($("#reg_compr_dat_emp_num_int").val());
				var reg_compr_dat_emp_colonia=$.trim($("#reg_compr_dat_emp_colonia").val());
				var reg_compr_dat_emp_cp=$.trim($("#reg_compr_dat_emp_cp").val());
				var reg_compr_dat_emp_ciudad=$.trim($("#reg_compr_dat_emp_ciudad").val());
				var reg_compr_dat_emp_estado=$.trim($("#reg_compr_dat_emp_estado").val());
				var reg_compr_dat_emp_pais=$.trim($("#reg_compr_dat_emp_pais").val());
				var reg_compr_dat_emp_telef_directo=$.trim($("#reg_compr_dat_emp_telef_directo").val());
				var reg_compr_dat_emp_telef_directo_ext=$.trim($("#reg_compr_dat_emp_telef_directo_ext").val());
				var reg_compr_dat_emp_pag_web=$.trim($("#reg_compr_dat_emp_pag_web").val());
				var reg_compr_dat_emp_asistente=$.trim($("#reg_compr_dat_emp_asistente").val());
				var reg_compr_dat_emp_proc_comp=$.trim($("#reg_compr_dat_emp_proc_comp").val());
				var reg_compr_obj_asistir=$.trim($("#reg_compr_obj_asistir").val());
				var reg_compr_lineas_ints=$.trim($("#reg_compr_lineas_ints").val());
				var reg_compr_invt_empr_serv=$.trim($("#reg_compr_invt_empr_serv").val());
				var reg_compr_partpn_ant=""; 
				if($("#reg_compr_partpn_ant_1").is(':checked')){
					reg_compr_partpn_ant="Si";
				}
				if($("#reg_compr_partpn_ant_2").is(':checked')){
					reg_compr_partpn_ant="No";
				}
				var reg_compr_partpn_ant_evento=$.trim($("#reg_compr_partpn_ant_evento").val());
				var reg_compr_cert_inf=0;
				if($("#reg_compr_cert_inf").is(':checked')){
					reg_compr_cert_inf="1";
				}
				var reg_compr_modifico="comprador";
				var strDatos={}; 
				
				if (reg_compr_dat_per_ap_pat.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Agrega el apellido paterno \n";
				}
				
				if (reg_compr_dat_per_ap_mat.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Agrega el apellido materno \n";
				}
				
				if (reg_compr_dat_per_nombres.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Agrega el nombre \n";
				}
				
				if (reg_compr_dat_per_cargo.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Agrega el cargo \n";
				}
				
				if (reg_compr_dat_per_celular.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Agrega el número de celular \n";
				}
				
				if (reg_compr_dat_per_email.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Agrega el correo \n";
				}
				
				if(reg_compr_dat_emp_giro.length <= 0){
					Agregar = false; 
					mensaje_error += " -Selecciona al menos un giro \n";
				}
				
				if (reg_compr_dat_emp_raz_soc.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Agrega el nombre de la empresa \n";
				}
				
				if (reg_compr_dat_emp_calle.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Agrega la calle \n";
				}
				
				if (reg_compr_dat_emp_num_ext.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Agrega el número exterior \n";
				}
				
				
				if (reg_compr_dat_emp_colonia.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Agrega la colonia \n";
				}
				
				if (reg_compr_dat_emp_ciudad.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Agrega la ciudad \n";
				}
				
				if (reg_compr_dat_emp_estado.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Agrega el estado \n";
				}
				
				if(reg_compr_dat_per_nivel_des_com.length <= 0){
					Agregar = false; 
					mensaje_error += " -Selecciona el nivel de decisión de compra \n";
				}
				
				if (reg_compr_dat_emp_telef_directo.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Agrega el telefono \n";
				}
				
				if (reg_compr_lineas_ints.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Selecciona al menos una línea de producto \n";
				}
				
				if (reg_compr_cert_inf=="0") {
					Agregar = false; 
					mensaje_error += " -Selecciona la última opción en donde certificas que la información provista es correcta y te gustaría ser invitado a participar en el evento \n";
				}
				
				
				if (!Agregar) {
					alert("Los siguientes campos son obligatorios: \n"+mensaje_error);			
				}
				
				if(Agregar)
				{
					
					if(evento_id!=""){
						strDatos.evento_id=evento_id;
						strDatos.reg_compr_dat_per_ap_pat=reg_compr_dat_per_ap_pat;
						strDatos.reg_compr_dat_per_ap_mat=reg_compr_dat_per_ap_mat;
						strDatos.reg_compr_dat_per_nombres=reg_compr_dat_per_nombres;
						strDatos.reg_compr_dat_per_cargo=reg_compr_dat_per_cargo;
						strDatos.reg_compr_dat_per_celular=reg_compr_dat_per_celular;
						strDatos.reg_compr_dat_per_email=reg_compr_dat_per_email;
						strDatos.reg_compr_dat_per_foto=reg_compr_dat_per_foto;
						strDatos.reg_compr_dat_per_nivel_des_com=reg_compr_dat_per_nivel_des_com;
						strDatos.reg_compr_dat_emp_raz_soc=reg_compr_dat_emp_raz_soc;
						strDatos.reg_compr_dat_emp_anio_est=reg_compr_dat_emp_anio_est;
						strDatos.reg_compr_dat_emp_cant_estblmts=reg_compr_dat_emp_cant_estblmts;
						strDatos.reg_compr_dat_emp_giro=reg_compr_dat_emp_giro;
						strDatos.reg_compr_dat_emp_giro_otro=reg_compr_dat_emp_giro_otro;
						strDatos.reg_compr_dat_emp_calle=reg_compr_dat_emp_calle;
						strDatos.reg_compr_dat_emp_num_ext=reg_compr_dat_emp_num_ext;
						strDatos.reg_compr_dat_emp_num_int=reg_compr_dat_emp_num_int;
						strDatos.reg_compr_dat_emp_colonia=reg_compr_dat_emp_colonia;
						strDatos.reg_compr_dat_emp_cp=reg_compr_dat_emp_cp;
						strDatos.reg_compr_dat_emp_ciudad=reg_compr_dat_emp_ciudad;
						strDatos.reg_compr_dat_emp_estado=reg_compr_dat_emp_estado;
						strDatos.reg_compr_dat_emp_pais=reg_compr_dat_emp_pais;
						strDatos.reg_compr_dat_emp_telef_directo=reg_compr_dat_emp_telef_directo;
						strDatos.reg_compr_dat_emp_telef_directo_ext=reg_compr_dat_emp_telef_directo_ext;
						strDatos.reg_compr_dat_emp_pag_web=reg_compr_dat_emp_pag_web;
						strDatos.reg_compr_dat_emp_asistente=reg_compr_dat_emp_asistente;
						strDatos.reg_compr_dat_emp_proc_comp=reg_compr_dat_emp_proc_comp;
						strDatos.reg_compr_obj_asistir=reg_compr_obj_asistir;
						strDatos.reg_compr_lineas_ints=reg_compr_lineas_ints;
						strDatos.reg_compr_invt_empr_serv=reg_compr_invt_empr_serv;
						strDatos.reg_compr_partpn_ant=reg_compr_partpn_ant;
						strDatos.reg_compr_partpn_ant_evento=reg_compr_partpn_ant_evento;
						strDatos.reg_compr_cert_inf=reg_compr_cert_inf;
						strDatos.reg_compr_modifico=reg_compr_modifico;
						strDatos.reg_compr_estatus="A";
						strDatos.accion="guardar";
						strDatos.envio_mail="2";
						
						
						$.ajax({
							type: "POST",
							url: "consultas/consultas_reg_compradores.php",        
							async: true,
							data: strDatos,
							dataType: "html",
							beforeSend: function (xhr) {
								$("#enviar_re").hide();
								$("#lbl_guardando_info").show();
							},
							success: function (datos) {
								var json;
								json = eval("(" + datos + ")"); //Parsear JSON
								$("#lbl_guardando_info").hide();
								$("#enviar_re").show();
								if(json.totalCount>0){
										$('html,body').animate({
											scrollTop: $("#titulo_encabezado").position().top }, { duration: 'slow', easing: 'swing'
										});
									//alert("Se ha guardado correctamente, verifica tu correo electrónico");
									$(location).attr('href','registro_concluido.html');
									//location.reload();
								}else{
									alert(json.mensaje);
								}
							},
							error: function () {
								$("#lbl_guardando_info").hide();
								$("#enviar_re").show();
								alert("Ocurrio un error al guardar, intentalo mas tarde.");
							}
						});
						
					}else{
						alert("Ocurrio un error, favor de comunicarse con el administrador");
					}
				}
				
			}
		
		var input = document.querySelector('input[id=subir_imagen_logo]');
		input.onchange = function () {
			var formData = new FormData();	
			var file = input.files[0];
			
			formData.append('file',file);
			$.ajax({
				url: 'formulario_registros/upload.php',
				type: 'post',
				data: formData,
				contentType: false,
				processData: false,
				success: function(response) {
					if (response != 0) {
						
						$("#reg_compr_dat_per_foto").val(response);
						$("#logo_img").html('<img src="'+response+'" style="width: 50%;height: 50%">');
						$("#ver_imagen_1").show();
						document.getElementById("subir_imagen_logo").value = "";
					} else {
						$("#reg_compr_dat_per_foto").val("");
						$("#logo_img").html('');
						$("#ver_imagen_1").hide();
						document.getElementById("subir_imagen_logo").value = "";
						alert('Solo se permiten Extensiones .jpg y .png');
					}
				}
			});
			return false;	
		/*	Guardar en formato base64	
			var file = input.files[0],
				reader = new FileReader();
		
			reader.onloadend = function () {
			//console.log(reader);  
				// Since it contains the Data URI, we should remove the prefix and keep only Base64 string
				
				//console.log(reader.result); //-> "R0lGODdhAQABAPAAAP8AAAAAACwAAAAAAQABAAACAkQBADs="
			if(reader.result.substring(0,15)=="data:image/jpeg"||reader.result.substring(0,14)=="data:image/png"){
				var b64 = reader.result.replace(/^data:.+;base64,/, '');
				$("#evento_logo").val(b64);
				$("#logo_img").html('<img src="data:image/jpeg;base64,'+b64+'" style="width: 50%;height: 50%">');
				//console.log(b64);
				$("#ver_imagen_1").show();
				document.getElementById("subir_imagen_logo").value = "";
			}else{
				$("#ver_imagen_1").hide();
				alert("Solo se permiten Extensiones .jpg y .png");
				document.getElementById("subir_imagen_logo").value = "";
			}														
			};
			reader.readAsDataURL(file);
		*/
		};
		</script>
	</body>
</html>