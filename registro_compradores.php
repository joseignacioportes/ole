<?php
$evento_id=$_GET["key"];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Nuevo Registro</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="shortcut icon" href="images/favicon.ico">
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
		<!--<link rel="shortcut icon" href="lib/images/favicon.ico">-->
		
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
					

					<div class="page-content">

						
						<div class="row">
							<div class="col-xs-12 col-sm-12">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form">
									<div class="hr hr-24"></div>

									<div class="row">
										<div class="col-sm-12 widget-container-col">
											<div class="widget-box">
												<div class="widget-header widget-header-small">
													<!-- #section:custom/widget-box.tabbed -->
													<div class="widget-toolbar no-border">
														<ul class="nav nav-tabs" id="myTab">
															<li class="active" id="li_dat_per">
																<a data-toggle="tab" href="#home">Datos Personales</a>
															</li>
															<li id="li_dat_empr" class="">
																<a data-toggle="tab" href="#profile">Datos Empresa</a>
															</li>
														</ul>
													</div>

													<!-- /section:custom/widget-box.tabbed -->
												</div>

												<div class="widget-body">
													<div class="widget-main padding-6">
														<div class="tab-content">
															
															<div id="home" class="tab-pane in active">
																<div class="row">
																	<div class="col-xs-12">
																		<!-- PAGE CONTENT BEGINS -->
																		<form class="form-horizontal" role="form">
																			<!-- #section:elements.form -->
																			<input type="hidden" id="evento_id" value="<?php echo $evento_id; ?>">
																			<input type="hidden" id="compr_id">
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Evento:</label>
																				<div class="col-sm-5">
																					<label id="lbl_evento_id" class="control-label"></label>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_per_nombres" style="display:none">*</font></span>Nombre(s):</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_per_nombres"  class="col-xs-10 col-sm-8">
																				</div>
																			</div>
																			<div class="form-group">
																				
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_per_ap_pat" style="display:none">*</font></span>Apellido Paterno:</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_per_ap_pat"  class="col-xs-10 col-sm-8">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_per_ap_mat" style="display:none">*</font></span>Apellido Materno:</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_per_ap_mat"  class="col-xs-10 col-sm-8">
																				</div>
																			</div>
																			
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_per_cargo" style="display:none">*</font></span>Cargo:</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_per_cargo"  class="col-xs-10 col-sm-5">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_per_email" style="display:none">*</font></span>Email:</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_per_email"  class="col-xs-10 col-sm-5">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_per_telef_directo" style="display:none">*</font></span>Tel&eacute;fono:</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_per_telef_directo"  class="col-xs-10 col-sm-4">
																					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_per_telef_directo_ext" style="display:none">*</font></span>Extensi&oacute;n:</label>
																					<input type="text" id="compr_dat_per_telef_directo_ext"  class="col-xs-10 col-sm-2">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_per_celular" style="display:none">*</font></span>Celular:</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_per_celular"  class="col-xs-10 col-sm-4">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span></span>Contacto Asistente:</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_per_cont_asist"  class="col-xs-10 col-sm-5">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span></span>Email Alternativo:</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_per_mail_alter"  class="col-xs-10 col-sm-5">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><font color="red" id="font_compr_dat_per_areas" style="display:none">*</font>Indique en cuales &aacute;reas usted tiene desici&oacute;n de compras:</label>
																				<div class="col-sm-9">
																					<div class="checkbox">
																						<label>
																							<input id="check_1" type="checkbox" class="ace" >
																							<span class="lbl" style="font-size: 14px">Alimentos y Bebidas</span>
																						</label>
																					</div>
																					<div class="checkbox">
																						<label>
																							<input id="check_2" type="checkbox" class="ace">
																							<span class="lbl" style="font-size: 14px">Mobiliario</span>
																						</label>
																					</div>
																					<div class="checkbox">
																						<label>
																							<input id="check_3" type="checkbox" class="ace">
																							<span class="lbl" style="font-size: 14px">Equipos de Operaci&oacute;n</span>
																						</label>
																					</div>
																					<div class="checkbox">
																						<label>
																							<input id="check_4" type="checkbox" class="ace">
																							<span class="lbl" style="font-size: 14px">Elestr&oacute;nicos</span>
																						</label>
																					</div>
																					<div class="checkbox">
																						<label>
																							<input id="check_5" type="checkbox" class="ace">
																							<span class="lbl" style="font-size: 14px">Sistemas</span>
																						</label>
																					</div>
																					<div class="checkbox">
																						<label>
																							<input id="check_6" type="checkbox" class="ace">
																							<span class="lbl" style="font-size: 14px">Banco y decoraci&oacute;n</span>
																						</label>
																					</div>
																					<div class="checkbox">
																						<label>
																							<input id="check_7" type="checkbox" class="ace">
																							<span class="lbl" style="font-size: 14px">Mantenimiento</span>
																						</label>
																					</div>
																					<div class="checkbox">
																						<label>
																							<input id="check_8" type="checkbox" class="ace">
																							<span class="lbl" style="font-size: 14px">Recursos Humanos</span>
																						</label>
																					</div>
																					<div class="checkbox">
																						<label>
																							<input id="check_9" type="checkbox" class="ace">
																							<span class="lbl" style="font-size: 14px">Ama de llaves</span>
																						</label>
																					</div>
																					<div class="checkbox">
																						<label>
																							<input id="check_10" type="checkbox" class="ace">
																							<span class="lbl" style="font-size: 14px">Productos de Consumo y Suministro</span>
																						</label>
																					</div>
																					<div class="checkbox">
																						<label>
																							<input id="check_11" type="checkbox" class="ace">
																							<span class="lbl" style="font-size: 14px">Construcci&oacute;n</span>
																						</label>
																					</div>
																					<div class="checkbox">
																						<label>
																							<input id="check_12" type="checkbox" class="ace">
																							<span class="lbl" style="font-size: 14px">Otros</span>
																							<input type="text" id="compr_dat_per_area_otro" >
																						</label>
																					</div>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_per_foto" style="display:none">*</font></span>Subir foto:</label>
																				<div class="col-sm-9">
																					<input type="file" id="subir_imagen_foto" class="btn btn-info col-sm-8"><a href="#modal_foto" class="col-sm-4" id="ver_imagen_2" style="display:none" data-toggle="modal">Ver Im&aacute;gen</a>
																					<input type="text" id="compr_dat_per_foto"  class="col-xs-10 col-sm-8" style="display:none">
																				</div>
																			</div>
																			
																			
																			

																			<div class="clearfix form-actions">
																				<div class="col-md-offset-3 col-md-9">
																					<button class="btn btn-info" type="button" onclick="siguiente()">
																						<i class="ace-icon fa fa-check bigger-110"></i>
																						Siguiente
																					</button>

																				</div>
																			</div>

																			<div class="hr hr-24"></div>
																		</form>
																		
																	</div><!-- /.col -->
																</div>
															</div>
															
															<div id="profile" class="tab-pane">
																<div class="row">
																	<div class="col-xs-12">
																		<!-- PAGE CONTENT BEGINS -->
																		<form class="form-horizontal" role="form">
																			<!-- #section:elements.form -->
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_emp_nomcomercial" style="display:none">*</font></span>Nombre Comercial:</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_emp_nomcomercial"  class="col-xs-10 col-sm-8">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_emp_raz_soc" style="display:none">*</font></span>Raz&oacute;n Social:</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_emp_raz_soc"  class="col-xs-10 col-sm-8">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_emp_calle" style="display:none">*</font></span>Calle:</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_emp_calle"  class="col-xs-10 col-sm-4">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_emp_num_ext" style="display:none">*</font></span>N&uacute;m. Ext:</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_emp_num_ext"  class="col-xs-10 col-sm-3">
																					<label class="col-sm-3 control-label no-padding-right" for="form-field-3">N&uacute;m. Int:</label>
																					<input type="text" id="compr_dat_emp_num_int"  class="col-xs-10 col-sm-2">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_emp_colonia" style="display:none">*</font></span>Colonia:</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_emp_colonia"  class="col-xs-10 col-sm-4">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_emp_ciudad" style="display:none">*</font></span>Ciudad:</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_emp_ciudad"  class="col-xs-10 col-sm-4">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_emp_estado" style="display:none">*</font></span>Estado:</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_emp_estado"  class="col-xs-10 col-sm-4">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_emp_pais" style="display:none">*</font></span>Pa&iacute;s:</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_emp_pais"  class="col-xs-10 col-sm-4">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_emp_cp" style="display:none">*</font></span>C&oacute;digo Postal:</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_emp_cp"  class="col-xs-10 col-sm-2">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_emp_telef" style="display:none">*</font></span>Tel&eacute;fono:</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_emp_telef"  class="col-xs-10 col-sm-4">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_emp_pag_web" style="display:none">*</font></span>P&aacute;gina Web:</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_emp_pag_web"  class="col-xs-10 col-sm-5">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_emp_desc_empre" style="display:none">*</font></span>Descripci&oacute;n de la Empresa:</label>
																				<div class="col-sm-9">
																					<textarea type="text" id="compr_dat_emp_desc_empre"  placeholder="Descripci&oacute;n" class="col-xs-10 col-sm-5"></textarea>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_emp_giro" style="display:none">*</font></span>Giro:</label>
																				<div class="col-sm-9">
																					<textarea type="text" id="compr_dat_emp_giro"  placeholder="Proporcionar todos los valores posibles" class="col-xs-10 col-sm-5"></textarea>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_emp_logo_empr" style="display:none">*</font></span>Logo de la Empresa:</label>
																				<div class="col-sm-9">
																					<input type="file" id="subir_imagen_logo" class="btn btn-info col-sm-8"><a href="#modal_logo" class="col-sm-4" id="ver_imagen_1" style="display:none" data-toggle="modal">Ver Im&aacute;gen</a>
																					<input type="text" id="compr_dat_emp_logo_empr"  class="col-xs-10 col-sm-8" style="display:none">
																				</div>
																			</div>
																			<div class="clearfix form-actions">
																				<div class="col-md-offset-3 col-md-9">
																					<button class="btn btn-info" type="button" id="guardar">
																						<i class="ace-icon fa fa-check bigger-110"></i>
																						Enviar
																					</button>
																					<button type="button" class="btn btn-danger" id="cancelar" onclick="limpiarcampos()">Cancelar</button>
																				</div>
																			</div>

																			<div class="hr hr-24"></div>
																		</form>
																		
																	</div><!-- /.col -->
																</div>
															</div>
															
															
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="main-card mb-3 card">
												<div class="card-body card-body table-responsive" id="tabla_compradores">
													
												</div>
											</div>
										</div>
									</div>
									
								</form>

							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			
			<div id="modal_logo" class="modal fade" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="smaller lighter blue no-margin">Logo</h3>
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
			
			<div id="modal_foto" class="modal fade" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="smaller lighter blue no-margin">Foto</h3>
						</div>

						<div class="modal-body" id="foto_img">
							
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
		
		
		<script type="text/javascript">
			function cargo_cmb(url,async,data) {
				var json = "";
				$.ajax({
					type: "POST",
					url: url,
					data: data,
					async: async,
					dataType: "html",
					beforeSend: function(objeto) {},
					success: function(datos) {
						var tabla = '';
						var acordion = "";
						json = eval("(" + datos + ")"); //Parsear JSON
					},
					error: function(objeto, quepaso, otroobj) {
						alert("Error en la peticion:\n\n");
					}
				});
				return json;
			}
		
			eventos("<?php echo $evento_id; ?>");
			function eventos(evento_id) {
				var resultado=new Array();
				data={
					evento_id: evento_id,
					accion: "cmb_eventos"
				};
				resultado=cargo_cmb("consultas/consultas_admin_compradores.php",false, data);
				if(resultado.totalCount>0){
					$("#lbl_evento_id").html("<strong>"+resultado.data[0].evento_nombre+"</strong>");
				}
			}
			
			if($("#Perfil_Usuario").val()=="3"){
				$("#font_compr_dat_per_nombres").show();
				$("#font_compr_dat_per_ap_pat").show();
				$("#font_compr_dat_per_ap_mat").show();
				$("#font_compr_dat_per_cargo").show();
				$("#font_compr_dat_per_email").show();
				$("#font_compr_dat_per_telef_directo").show();
				$("#font_compr_dat_per_telef_directo_ext").show();
				$("#font_compr_dat_per_celular").show();
				$("#font_compr_dat_per_areas").show();
				//$("#font_compr_dat_per_cont_asist").show();
				//$("#font_compr_dat_per_mail_alter").show();
				$("#font_compr_dat_per_foto").show();

				$("#font_compr_dat_emp_nomcomercial").show();
				$("#font_compr_dat_emp_raz_soc").show();
				$("#font_compr_dat_emp_calle").show();
				$("#font_compr_dat_emp_num_ext").show();
				$("#font_compr_dat_emp_colonia").show();
				$("#font_compr_dat_emp_ciudad").show();
				$("#font_compr_dat_emp_estado").show();
				$("#font_compr_dat_emp_pais").show();
				$("#font_compr_dat_emp_cp").show();
				$("#font_compr_dat_emp_telef").show();
				$("#font_compr_dat_emp_pag_web").show();
				$("#font_compr_dat_emp_desc_empre").show();
				$("#font_compr_dat_emp_giro").show();
				$("#font_compr_dat_emp_logo_empr").show();
			}else{
				
				$("#font_compr_dat_per_nombres").show();
				$("#font_compr_dat_per_ap_pat").show();
				$("#font_compr_dat_per_ap_mat").show();
				$("#font_compr_dat_per_cargo").show();
				$("#font_compr_dat_per_email").show();
				$("#font_compr_dat_per_telef_directo").show();
				$("#font_compr_dat_per_telef_directo_ext").show();
				$("#font_compr_dat_per_celular").show();
				$("#font_compr_dat_per_areas").show();
				//$("#font_compr_dat_per_cont_asist").show();
				//$("#font_compr_dat_per_mail_alter").show();
				//$("#font_compr_dat_per_foto").show();

				$("#font_compr_dat_emp_nomcomercial").show();
				$("#font_compr_dat_emp_raz_soc").show();
				$("#font_compr_dat_emp_calle").show();
				$("#font_compr_dat_emp_num_ext").show();
				$("#font_compr_dat_emp_colonia").show();
				$("#font_compr_dat_emp_ciudad").show();
				$("#font_compr_dat_emp_estado").show();
				$("#font_compr_dat_emp_pais").show();
				$("#font_compr_dat_emp_cp").show();
				$("#font_compr_dat_emp_telef").show();
				$("#font_compr_dat_emp_pag_web").show();
				$("#font_compr_dat_emp_desc_empre").show();
				$("#font_compr_dat_emp_giro").show();
				//$("#font_compr_dat_emp_logo_empr").show();
			}

			function siguiente (){
				$("#home").removeClass("active");
				$("#li_dat_per").removeClass("active");
				
				$("#profile").addClass("active");
				$("#li_dat_empr").addClass("active");
			}
			
			$("#guardar").click(function () {	
				var Agregar = true;
				var mensaje_error = "";
				var compr_id=$("#compr_id").val();
				var evento_id=$.trim($("#evento_id").val());
				var compr_dat_per_nombres=$.trim($("#compr_dat_per_nombres").val());
				var compr_dat_per_ap_pat=$.trim($("#compr_dat_per_ap_pat").val());
				var compr_dat_per_ap_mat=$.trim($("#compr_dat_per_ap_mat").val());
				var compr_dat_per_cargo=$.trim($("#compr_dat_per_cargo").val());
				var compr_dat_per_email=$.trim($("#compr_dat_per_email").val());
				var compr_dat_per_telef_directo=$.trim($("#compr_dat_per_telef_directo").val());
				var compr_dat_per_telef_directo_ext=$.trim($("#compr_dat_per_telef_directo_ext").val());
				var compr_dat_per_celular=$.trim($("#compr_dat_per_celular").val());
				var compr_dat_per_cont_asist=$.trim($("#compr_dat_per_cont_asist").val());
				var compr_dat_per_mail_alter=$.trim($("#compr_dat_per_mail_alter").val());
				var compr_dat_per_foto=$.trim($("#compr_dat_per_foto").val());
				var compr_dat_per_area_otro=$.trim($("#compr_dat_per_area_otro").val());
				var compr_dat_emp_nomcomercial=$.trim($("#compr_dat_emp_nomcomercial").val());
				var compr_dat_emp_raz_soc=$.trim($("#compr_dat_emp_raz_soc").val());
				var compr_dat_emp_calle=$.trim($("#compr_dat_emp_calle").val());
				var compr_dat_emp_num_int=$.trim($("#compr_dat_emp_num_int").val());
				var compr_dat_emp_num_ext=$.trim($("#compr_dat_emp_num_ext").val());
				var compr_dat_emp_colonia=$.trim($("#compr_dat_emp_colonia").val());
				var compr_dat_emp_ciudad=$.trim($("#compr_dat_emp_ciudad").val());
				var compr_dat_emp_estado=$.trim($("#compr_dat_emp_estado").val());
				var compr_dat_emp_pais=$.trim($("#compr_dat_emp_pais").val());
				var compr_dat_emp_cp=$.trim($("#compr_dat_emp_cp").val());
				var compr_dat_emp_telef=$.trim($("#compr_dat_emp_telef").val());
				var compr_dat_emp_pag_web=$.trim($("#compr_dat_emp_pag_web").val());
				var compr_dat_emp_desc_empre=$.trim($("#compr_dat_emp_desc_empre").val());
				var compr_dat_emp_giro=$.trim($("#compr_dat_emp_giro").val());
				var compr_dat_emp_logo_empr=$.trim($("#compr_dat_emp_logo_empr").val());
				
				var Usuario_Sistema=$("#Usuario_Sistema").val();
				
				var strDatos=""; 
				
				
				if($("#Perfil_Usuario").val()=="3"){
					if (evento_id.length <= 0) {Agregar = false; mensaje_error += " -Selecciona el Evento \n";}
					if (compr_dat_per_nombres.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Nombre \n";}
					if (compr_dat_per_ap_pat.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Apellido Paterno \n";}
					if (compr_dat_per_ap_mat.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Apellido Materno \n";}
					if (compr_dat_per_cargo.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Cargo \n";}
					if (compr_dat_per_email.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Mail \n";}
					if (compr_dat_per_telef_directo.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Telefono\n";}
					if (compr_dat_per_telef_directo_ext.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Extension\n";}
					if (compr_dat_per_celular.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Numero de Celular \n";}
					//if (compr_dat_per_cont_asist.length <= 0) {Agregar = false; mensaje_error += " -Agrega el contacto Asistente \n";}
					//if (compr_dat_per_mail_alter.length <= 0) {Agregar = false; mensaje_error += " -Agrega Mail Alternativo \n";}
					var checkeado=false;
					if( $('#check_1').prop('checked') ) {checkeado=true; }
					if( $('#check_2').prop('checked') ) {checkeado=true; }
					if( $('#check_3').prop('checked') ) {checkeado=true; }
					if( $('#check_4').prop('checked') ) {checkeado=true; }
					if( $('#check_5').prop('checked') ) {checkeado=true; }
					if( $('#check_6').prop('checked') ) {checkeado=true; }
					if( $('#check_7').prop('checked') ) {checkeado=true; }
					if( $('#check_8').prop('checked') ) {checkeado=true; }
					if( $('#check_9').prop('checked') ) {checkeado=true; }
					if( $('#check_10').prop('checked') ) {checkeado=true;}
					if( $('#check_11').prop('checked') ) {checkeado=true;}
					if( $('#check_12').prop('checked') ) {checkeado=true;}
					if(checkeado==false){
						Agregar = false;
						mensaje_error += " -Debes Seleccionar almenos 1 Area \n";
					}
					if (compr_dat_per_foto.length <= 0) {Agregar = false; mensaje_error += " -Agrega la foto \n";}
					
					if (compr_dat_emp_nomcomercial.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Nombre Comercial \n";}
					if (compr_dat_emp_raz_soc.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Razon Social \n";}
					if (compr_dat_emp_calle.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Calle \n";}
					if (compr_dat_emp_num_ext.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Num. Exterior \n";}
					if (compr_dat_emp_colonia.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Colonia \n";}
					if (compr_dat_emp_ciudad.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Ciudad \n";}
					if (compr_dat_emp_estado.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Estado \n";}
					if (compr_dat_emp_pais.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Pais \n";}
					if (compr_dat_emp_cp.length <= 0) {Agregar = false; mensaje_error += " -Agrega el CP \n";}
					if (compr_dat_emp_telef.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Telefono en Datos Empresa\n";}
					if (compr_dat_emp_pag_web.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Pagina Web \n";}
					if (compr_dat_emp_desc_empre.length <= 0) {Agregar = false; mensaje_error += " -Agrega la descripcion de la Empresa \n";}
					if (compr_dat_emp_giro.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Giro de la Empresa \n";}
					if (compr_dat_emp_logo_empr.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Logo de la Empresa \n";}
					
					
				}else{
					if (evento_id.length <= 0) {Agregar = false; mensaje_error += " -Selecciona el Evento \n";}
					if (compr_dat_per_nombres.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Nombre \n";}
					if (compr_dat_per_ap_pat.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Apellido Paterno \n";}
					if (compr_dat_per_ap_mat.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Apellido Materno \n";}
					if (compr_dat_per_cargo.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Cargo \n";}
					if (compr_dat_per_email.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Mail \n";}
					if (compr_dat_per_telef_directo.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Telefono \n";}
					if (compr_dat_per_telef_directo_ext.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Extension\n";}
					if (compr_dat_per_celular.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Numero de Celular \n";}
					//if (compr_dat_per_cont_asist.length <= 0) {Agregar = false; mensaje_error += " -Agrega el contacto Asistente \n";}
					//if (compr_dat_per_mail_alter.length <= 0) {Agregar = false; mensaje_error += " -Agrega Mail Alternativo \n";}
					var checkeado=false;
					if( $('#check_1').prop('checked') ) {checkeado=true; }
					if( $('#check_2').prop('checked') ) {checkeado=true; }
					if( $('#check_3').prop('checked') ) {checkeado=true; }
					if( $('#check_4').prop('checked') ) {checkeado=true; }
					if( $('#check_5').prop('checked') ) {checkeado=true; }
					if( $('#check_6').prop('checked') ) {checkeado=true; }
					if( $('#check_7').prop('checked') ) {checkeado=true; }
					if( $('#check_8').prop('checked') ) {checkeado=true; }
					if( $('#check_9').prop('checked') ) {checkeado=true; }
					if( $('#check_10').prop('checked') ) {checkeado=true;}
					if( $('#check_11').prop('checked') ) {checkeado=true;}
					if( $('#check_12').prop('checked') ) {checkeado=true;}
					if(checkeado==false){
						Agregar = false;
						mensaje_error += " -Debes Seleccionar almenos 1 Area \n";
					}
					//if (compr_dat_per_foto.length <= 0) {Agregar = false; mensaje_error += " -Agrega la foto \n";}
					
					if (compr_dat_emp_nomcomercial.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Nombre Comercial \n";}
					if (compr_dat_emp_raz_soc.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Razon Social \n";}
					if (compr_dat_emp_calle.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Calle \n";}
					if (compr_dat_emp_num_ext.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Num. Exterior \n";}
					if (compr_dat_emp_colonia.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Colonia \n";}
					if (compr_dat_emp_ciudad.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Ciudad \n";}
					if (compr_dat_emp_estado.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Estado \n";}
					if (compr_dat_emp_pais.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Pais \n";}
					if (compr_dat_emp_cp.length <= 0) {Agregar = false; mensaje_error += " -Agrega el CP \n";}
					if (compr_dat_emp_telef.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Telefono en Datos Empresa\n";}
					if (compr_dat_emp_pag_web.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Pagina Web \n";}
					if (compr_dat_emp_desc_empre.length <= 0) {Agregar = false; mensaje_error += " -Agrega la descripcion de la Empresa \n";}
					if (compr_dat_emp_giro.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Giro de la Empresa \n";}
					//if (compr_dat_emp_logo_empr.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Logo de la Empresa \n";}
					
					
				}
				var valor="";
				if( $('#check_1').prop('checked') ) {valor+="1,";}
				if( $('#check_2').prop('checked') ) {valor+="2,";}
				if( $('#check_3').prop('checked') ) {valor+="3,";}
				if( $('#check_4').prop('checked') ) {valor+="4,";}
				if( $('#check_5').prop('checked') ) {valor+="5,";}
				if( $('#check_6').prop('checked') ) {valor+="6,";}
				if( $('#check_7').prop('checked') ) {valor+="7,";}
				if( $('#check_8').prop('checked') ) {valor+="8,";}
				if( $('#check_9').prop('checked') ) {valor+="9,";}
				if( $('#check_10').prop('checked') ) {valor+="10,";}
				if( $('#check_11').prop('checked') ) {valor+="11,";}
				if( $('#check_12').prop('checked') ) {valor+="12,";}
				
				if(valor!=""){
					valor=valor.slice(0, -1);
				}
				
				if (!Agregar) {
					alert(mensaje_error);			
				}
				
				if(Agregar)
				{
					strDatos += "evento_id="+evento_id;
					strDatos += "&compr_dat_per_ap_pat="+compr_dat_per_ap_pat;
					strDatos += "&compr_dat_per_ap_mat="+compr_dat_per_ap_mat;
					strDatos += "&compr_dat_per_nombres="+compr_dat_per_nombres;
					strDatos += "&compr_dat_per_cargo="+compr_dat_per_cargo;
					strDatos += "&compr_dat_per_email="+compr_dat_per_email;
					strDatos += "&compr_dat_per_telef_directo="+compr_dat_per_telef_directo;
					strDatos += "&compr_dat_per_telef_directo_ext="+compr_dat_per_telef_directo_ext;
					strDatos += "&compr_dat_per_celular="+compr_dat_per_celular;
					strDatos += "&compr_dat_per_cont_asist="+compr_dat_per_cont_asist;
					strDatos += "&compr_dat_per_mail_alter="+compr_dat_per_mail_alter;
					strDatos += "&compr_dat_per_foto="+compr_dat_per_foto;
					strDatos += "&compr_dat_per_area="+valor;
					strDatos += "&compr_dat_per_area_otro="+compr_dat_per_area_otro;
					strDatos += "&compr_dat_emp_nomcomercial="+compr_dat_emp_nomcomercial;
					strDatos += "&compr_dat_emp_raz_soc="+compr_dat_emp_raz_soc;
					strDatos += "&compr_dat_emp_ciudad="+compr_dat_emp_ciudad;
					strDatos += "&compr_dat_emp_estado="+compr_dat_emp_estado;
					strDatos += "&compr_dat_emp_calle="+compr_dat_emp_calle;
					strDatos += "&compr_dat_emp_num_int="+compr_dat_emp_num_int;
					strDatos += "&compr_dat_emp_num_ext="+compr_dat_emp_num_ext;
					strDatos += "&compr_dat_emp_colonia="+compr_dat_emp_colonia;
					strDatos += "&compr_dat_emp_cp="+compr_dat_emp_cp;
					strDatos += "&compr_dat_emp_pais="+compr_dat_emp_pais;
					strDatos += "&compr_dat_emp_telef="+compr_dat_emp_telef;
					strDatos += "&compr_dat_emp_pag_web="+compr_dat_emp_pag_web;
					strDatos += "&compr_dat_emp_desc_empre="+compr_dat_emp_desc_empre;
					strDatos += "&compr_dat_emp_giro="+compr_dat_emp_giro;
					strDatos += "&compr_dat_emp_logo_empr="+compr_dat_emp_logo_empr;
					strDatos += "&envio_correo=1";
					if(compr_id.length <= 0)
					{
						strDatos += "&compr_modifico="+Usuario_Sistema;
						strDatos += "&compr_estatus=A";					
						strDatos += "&accion=guardar_comprador";
					}
					else
					{
						strDatos += "&compr_id="+compr_id;
						strDatos += "&compr_modifico="+Usuario_Sistema;
						strDatos += "&compr_estatus=M";				
						strDatos += "&accion=editar_comprador";
					}
					
					$.ajax({
						type: "POST",
						url: "consultas/consultas_admin_compradores.php",        
						async: false,
						data: strDatos,
						dataType: "html",
						beforeSend: function (xhr) {

						},
						success: function (datos) {
							var json;
							json = eval("(" + datos + ")"); //Parsear JSON
							if(json.totalCount>0){
								limpiarcampos();
								alert("Guardado Correctamente.");	
								tabla_compradores();
							}else{
								alert(json.mensaje);
							}
							
							
						},
						error: function () {
							alert("currio un error al guardar.");
						}
					});
				}
			});
				
			var input = document.querySelector('input[id=subir_imagen_logo]');
			input.onchange = function () {
				var formData = new FormData();	
				var file = input.files[0];
				
				formData.append('file',file);
				$.ajax({
					url: 'upload.php',
					type: 'post',
					data: formData,
					contentType: false,
					processData: false,
					success: function(response) {
						if (response != 0) {
							$("#compr_dat_emp_logo_empr").val(response);
							$("#logo_img").html('<img src="'+response+'" style="width: 50%;height: 50%">');
							$("#ver_imagen_1").show();
							document.getElementById("subir_imagen_logo").value = "";
						} else {
							$("#compr_dat_emp_logo_empr").val("");
							$("#logo_img").html('');
							$("#ver_imagen_1").hide();
							document.getElementById("subir_imagen_logo").value = "";
							alert('Solo se permiten Extensiones .jpg y .png');
						}
					}
				});
				return false;
				
				
			/*	
				var file = input.files[0],
					reader = new FileReader();
	
				reader.onloadend = function () {
				//console.log(reader);  
					// Since it contains the Data URI, we should remove the prefix and keep only Base64 string
					
					//console.log(reader.result); //-> "R0lGODdhAQABAPAAAP8AAAAAACwAAAAAAQABAAACAkQBADs="
				if(reader.result.substring(0,15)=="data:image/jpeg"||reader.result.substring(0,14)=="data:image/png"){
					var b64 = reader.result.replace(/^data:.+;base64,/, '');
					$("#compr_dat_emp_logo_empr").val(b64);
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
	
			var input_foto = document.querySelector('input[id=subir_imagen_foto]');
			input_foto.onchange = function () {
			
			var formData = new FormData();	
			var file = input_foto.files[0];
			
			formData.append('file',file);
			$.ajax({
				url: 'upload.php',
				type: 'post',
				data: formData,
				contentType: false,
				processData: false,
				success: function(response) {
					if (response != 0) {
						$("#compr_dat_per_foto").val(response);
						$("#foto_img").html('<img src="'+response+'" style="width: 50%;height: 50%">');
						$("#ver_imagen_2").show();
						document.getElementById("subir_imagen_foto").value = "";
					} else {
						$("#compr_dat_per_foto").val("");
						$("#foto_img").html('');
						$("#ver_imagen_2").hide();
						document.getElementById("subir_imagen_foto").value = "";
						alert('Solo se permiten Extensiones .jpg y .png');
					}
				}
			});
			return false;	
			
		/*	
			var file = input_foto.files[0],
				reader = new FileReader();

			reader.onloadend = function () {
			//console.log(reader);  
				// Since it contains the Data URI, we should remove the prefix and keep only Base64 string
				
				//console.log(reader.result); //-> "R0lGODdhAQABAPAAAP8AAAAAACwAAAAAAQABAAACAkQBADs="
			if(reader.result.substring(0,15)=="data:image/jpeg"||reader.result.substring(0,14)=="data:image/png"){
				var b64 = reader.result.replace(/^data:.+;base64,/, '');
				$("#compr_dat_per_foto").val(b64);
				$("#foto_img").html('<img src="data:image/jpeg;base64,'+b64+'" style="width: 50%;height: 50%">');
				//console.log(b64);
				$("#ver_imagen_2").show();
				document.getElementById("subir_imagen_foto").value = "";
			}else{
				$("#ver_imagen_2").hide();
				alert("Solo se permiten Extensiones .jpg y .png");
				document.getElementById("subir_imagen_foto").value = "";
			}														
			};
			reader.readAsDataURL(file);
		*/  
		};

		</script>
		
	</body>
</html>