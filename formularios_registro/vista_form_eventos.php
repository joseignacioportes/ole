<?php
	@$key=$_GET["key"];
	
	require_once ('../consultas/consultas_reg_compradores.php');
	;

	$consultas=  new consultas();
	$List=$consultas->consultar($key, "");
	$List=json_decode($List);
	$List=(array) $List;

	
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="shortcut icon" href="../images/favicon.ico">
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../assets_ext/css/bootstrap.css" />
		<link rel="stylesheet" href="../assets_ext/css/font-awesome.css" />
		<!--Libreria iconos menu -->
		<!-- page specific plugin styles -->
		
		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="../assets_ext/css/jquery-ui.custom.css" />
		<link rel="stylesheet" href="../assets_ext/css/jquery.gritter.css" />
		<!-- text fonts -->
		<link rel="stylesheet" href="../assets_ext/css/ace-fonts.css" />
		<link rel="shortcut icon" href="../dist/img/ole.ico">
		<!-- ace styles -->
		<link rel="stylesheet" href="../assets_ext/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets_ext/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets_ext/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="../assets_ext/js/ace-extra.js"></script>
		
		<!-- FavIcon -->
		<!--<link rel="shortcut icon" href="../lib/images/favicon.ico">-->
		
		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries 
		<link rel="stylesheet" href="../assets_ext/css/jquery-ui.custom.css" />
		<link rel="stylesheet" href="../assets_ext/css/chosen.css" />
		<link rel="stylesheet" href="../assets_ext/css/datepicker.css" />
		<link rel="stylesheet" href="../assets_ext/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="../assets_ext/css/daterangepicker.css" />
		<link rel="stylesheet" href="../assets_ext/css/bootstrap-datetimepicker.css" />
		<link rel="stylesheet" href="../assets_ext/css/colorpicker.css" />
		-->
		
		<!--[if lte IE 8]>
		<script src="../assets_ext/js/html5shiv.js"></script>
		<script src="../assets_ext/js/respond.js"></script>
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
							<div class="row">
								<div class="">
									<div class="widget-box">
										<div class="widget-body">
											<div class="widget-main">
													<div class="tab-content">
																<div id="home" class="tab-pane in active">
																	<div class="row">
																		<div class="col-xs-12">
																			<!-- PAGE CONTENT BEGINS -->
																			<div class="form-horizontal" role="form">
																				<table id="simple-table" class="table table-striped table-bordered table-hover">
																					<tbody>
																						<tr>
																							<td align="right" width="40%">
																								<strong>Foto:</strong>
																							</td>
																							<td width="60%">
																								<?php 
																									if($List['data'][0]->{'reg_compr_dat_per_foto'}!=""){
																								?>
																									<span class="profile-picture">
																										<img id="avatar" class="editable img-responsive editable-click editable-empty" alt="Alex's Avatar" src="../<?php echo $List['data'][0]->{'reg_compr_dat_per_foto'};?>" width="200px">
																									</span>
																								<?php
																									}
																								?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>Nombre Completo:</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_dat_per_nombres'}." ".$List['data'][0]->{'reg_compr_dat_per_ap_pat'}." ".$List['data'][0]->{'reg_compr_dat_per_ap_mat'}; ?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>Cargo:</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_dat_per_cargo'}; ?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>Celular:</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_dat_per_celular'}; ?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>Correo Electrónico:</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_dat_per_email'}; ?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>Nnivel de Decisión de Compra:</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_dat_per_nivel_des_com'}; ?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>Empresa:</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_dat_emp_raz_soc'}; ?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>Año en que se estableció la empresa:</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_dat_emp_anio_est'}; ?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>Cantidad de establecimientos:</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_dat_emp_cant_estblmts'}; ?>	
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>¿Su empresa pertenece alguno de estos giros?</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_dat_emp_giro'}; ?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>¿Cuáles?</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_dat_emp_giro_otro'}; ?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>Calle:</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_dat_emp_calle'}; ?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>Número Exterior:</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_dat_emp_num_ext'}; ?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>Número Interior:</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_dat_emp_num_int'}; ?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>Colonia:</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_dat_emp_colonia'}; ?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>C.P:</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_dat_emp_cp'}; ?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>Ciudad:</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_dat_emp_ciudad'}; ?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>Estado:</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_dat_emp_estado'}; ?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>País:</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_dat_emp_pais'}; ?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>Télefono(s):</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_dat_emp_telef_directo'}; ?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>Extensión:</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_dat_emp_telef_directo_ext'}; ?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>Página Web:</strong>
																							</td>
																							<td>
																								<?php 
																									echo $List['data'][0]->{'reg_compr_dat_emp_pag_web'};
																									
																								?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>Nombre Asistente:</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_dat_emp_asistente'}; ?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>Describa brevemente el proceso de compra de su área:</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_dat_emp_proc_comp'}; ?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>¿Cuál es su objetivo de asistir al Evento?</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_obj_asistir'}; ?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>De estas líneas de producto, ¿Cuáles le interesaría contactar en el evento?</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_lineas_ints'}; ?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>Si hay alguna empresa que desea que invitemos  o un servicio en especial, háganoslo saber:</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_invt_empr_serv'}; ?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>¿Participó en un encuentro de negocios?</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_partpn_ant'}; ?>
																							</td>
																						</tr>
																						<tr>
																							<td align="right">
																								<strong>¿Cuál?</strong>
																							</td>
																							<td>
																								<?php echo $List['data'][0]->{'reg_compr_partpn_ant_evento'}; ?>
																							</td>
																						</tr>
																					</tbody>
																				</table>
																				
																				

																				<div class="hr hr-24"></div>
																			</div>
																			
																		</div><!-- /.col -->
																	</div>
																</div>
															</div>
												<!-- /section:elements.tooltip -->
											</div>
										</div>
									</div>
								</div><!-- /.col -->
							</div><!-- /.row -->
					
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			
				
			
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='../assets_ext/js/jquery.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
		<script type="text/javascript">
		 window.jQuery || document.write("<script src='../assets_ext/js/jquery1x.js'>"+"<"+"/script>");
		</script>
		<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='../assets_ext/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="../assets_ext/js/bootstrap.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="../assets_ext/js/excanvas.js"></script>
		<![endif]-->
		<script src="../assets_ext/js/jquery-ui.custom.js"></script>
		<script src="../assets_ext/js/jquery.ui.touch-punch.js"></script>
		<script src="../assets_ext/js/jquery.easypiechart.js"></script>
		<script src="../assets_ext/js/jquery.sparkline.js"></script>
		
		<script src="../assets_ext/js/chosen.jquery.js"></script>
		<script src="../assets_ext/js/fuelux/fuelux.spinner.js"></script>
		<!--
		<script src="../assets_ext/js/date-time/bootstrap-datepicker.js"></script>
		<script src="../assets_ext/js/date-time/bootstrap-timepicker.js"></script>
		-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
		
		<!--
		<script src="../assets_ext/js/date-time/daterangepicker.js"></script>
		<script src="../assets_ext/js/date-time/bootstrap-datetimepicker.js"></script>
		-->
		<!--Graficos
		<script src="../assets_ext/js/flot/jquery.flot.js"></script>
		<script src="../assets_ext/js/flot/jquery.flot.pie.js"></script>
		<script src="../assets_ext/js/flot/jquery.flot.resize.js"></script>
		Graficos-->
		
		<script src="../assets_ext/js/dataTables/jquery.dataTables.js"></script>
		<script src="../assets_ext/js/dataTables/jquery.dataTables.bootstrap.js"></script>
		<script src="../assets_ext/js/dataTables/extensions/TableTools/js/dataTables.tableTools.js"></script>
		<script src="../assets_ext/js/dataTables/extensions/ColVis/js/dataTables.colVis.js"></script>

		
		
		<!-- ace scripts -->
		<script src="../assets_ext/js/ace/elements.scroller.js"></script>
		<script src="../assets_ext/js/ace/elements.colorpicker.js"></script>
		<script src="../assets_ext/js/ace/elements.fileinput.js"></script>
		<script src="../assets_ext/js/ace/elements.typeahead.js"></script>
		<script src="../assets_ext/js/ace/elements.wysiwyg.js"></script>
		<script src="../assets_ext/js/ace/elements.spinner.js"></script>
		<script src="../assets_ext/js/ace/elements.treeview.js"></script>
		<script src="../assets_ext/js/ace/elements.wizard.js"></script>
		<script src="../assets_ext/js/ace/elements.aside.js"></script>
		<script src="../assets_ext/js/ace/ace.js"></script>
		<script src="../assets_ext/js/ace/ace.ajax-content.js"></script>
		<script src="../assets_ext/js/ace/ace.touch-drag.js"></script>
		<script src="../assets_ext/js/ace/ace.sidebar.js"></script>
		<script src="../assets_ext/js/ace/ace.sidebar-scroll-1.js"></script>
		<script src="../assets_ext/js/ace/ace.submenu-hover.js"></script>
		<script src="../assets_ext/js/ace/ace.widget-box.js"></script>
		<script src="../assets_ext/js/ace/ace.settings.js"></script>
		<script src="../assets_ext/js/ace/ace.settings-rtl.js"></script>
		<script src="../assets_ext/js/ace/ace.settings-skin.js"></script>
		<script src="../assets_ext/js/ace/ace.widget-on-reload.js"></script>
		<script src="../assets_ext/js/ace/ace.searchbox-autocomplete.js"></script>
		

		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="../assets_ext/css/ace.onpage-help.css" />
		<link rel="stylesheet" href="../docs/assets_ext/js/themes/sunburst.css" />

		<script type="text/javascript"> ace.vars['base'] = '..'; </script>
		<script src="../assets_ext/js/ace/elements.onpage-help.js"></script>
		<script src="../assets_ext/js/ace/ace.onpage-help.js"></script>
		<script src="../docs/assets_ext/js/rainbow.js"></script>
		<script src="../docs/assets_ext/js/language/generic.js"></script>
		<script src="../docs/assets_ext/js/language/html.js"></script>
		<script src="../docs/assets_ext/js/language/css.js"></script>
		<script src="../docs/assets_ext/js/language/javascript.js"></script>
		
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
				
				if (reg_compr_dat_emp_telef_directo.length <= 0) {
					Agregar = false; 
					mensaje_error += " -Agrega el telefono \n";
				}
				
				if (reg_compr_cert_inf=="0") {
					Agregar = false; 
					mensaje_error += " -Selecciona la última opción en donde certificas que la información provista es correcta y te gustaría ser invitado a participar en el evento \n";
				}
				
				
				if (!Agregar) {
					alert(mensaje_error);			
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
						strDatos.envio_mail="1";
						
						
						$.ajax({
							type: "POST",
							url: "../consultas/consultas_reg_compradores.php",        
							async: false,
							data: strDatos,
							dataType: "html",
							beforeSend: function (xhr) {

							},
							success: function (datos) {
								var json;
								json = eval("(" + datos + ")"); //Parsear JSON
								if(json.totalCount>0){
									alert("Guardado Correctamente.");	
								}else{
									alert(json.mensaje);
								}
							},
							error: function () {
								alert("Ocurrio un error al guardar.");
							}
						});
						
					}else{
						alert("Ocurrio un error, favor de comunicarse con el administrador");
					}
				}
				
			}
		
		</script>
	</body>
</html>