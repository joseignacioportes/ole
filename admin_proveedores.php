<?php
	include 'header.php';
	@$prov_id=$_GET["key"];
	@$Msj=$_GET["Msj"];
	@$id=$_GET["id"];
	
?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li class="active">Admin Proveedores</li>
						</ul><!-- /.breadcrumb -->

						
					</div>

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
													<h5 class="widget-title smaller">Admin Proveedores <span id="span_nombre_comercial"></span></h5>

													<!-- #section:custom/widget-box.tabbed -->
													<div class="widget-toolbar no-border">
														<ul class="nav nav-tabs" id="myTab">
															<li class="active" id="li_dat_per">
																<a data-toggle="tab" href="#home">Datos Personales</a>
															</li>
															<li id="li_dat_empr" class="">
																<a data-toggle="tab" href="#profile">Datos Empresa</a>
															</li>
															<li id="li_info_gene" class="" style="display:none">
																<a data-toggle="tab" href="#info_gen">Información General</a>
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
																			
																			<input type="hidden" id="prov_id">
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_per_nombres" style="display:none">*</font></span>Nombre(s):</label>
																				<div class="col-sm-9">
																					<input type="text" id="prov_dat_per_nombres"  class="col-xs-10 col-sm-8" maxlength="50">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_per_ap_pat" style="display:none">*</font></span>Apellido Paterno:</label>
																				<div class="col-sm-9">
																					<input type="text" id="prov_dat_per_ap_pat"  class="col-xs-10 col-sm-8" maxlength="50">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_per_ap_mat" style="display:none">*</font></span>Apellido Materno:</label>
																				<div class="col-sm-9">
																					<input type="text" id="prov_dat_per_ap_mat"  class="col-xs-10 col-sm-8" maxlength="50">
																				</div>
																			</div>
																			
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_per_cargo" style="display:none">*</font></span>Cargo:</label>
																				<div class="col-sm-9">
																					<input type="text" id="prov_dat_per_cargo"  class="col-xs-10 col-sm-5" maxlength="400">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_per_email" style="display:none">*</font></span>Email:</label>
																				<div class="col-sm-9">
																					<input type="text" id="prov_dat_per_email"  class="col-xs-10 col-sm-5" maxlength="100">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_per_telef_directo" style="display:none">*</font></span>Teléfono:</label>
																				<div class="col-sm-9">
																					<input type="text" id="prov_dat_per_telef_directo"  class="col-xs-10 col-sm-4">
																					<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_per_telef_directo_ext" style="display:none"></font></span>Extensión:</label>
																					<input type="text" id="prov_dat_per_telef_directo_ext"  class="col-xs-10 col-sm-2" maxlength="20">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_per_celular" style="display:none">*</font></span>Celular:</label>
																				<div class="col-sm-9">
																					<input type="text" id="prov_dat_per_celular"  class="col-xs-10 col-sm-4" maxlength="20">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_per_cont_asist" style="display:none">*</font></span>Contacto Asistente:</label>
																				<div class="col-sm-9">
																					<input type="text" id="prov_dat_per_cont_asist"  class="col-xs-10 col-sm-5" maxlength="500">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_per_mail_alter" style="display:none">*</font></span>Email Alternativo:</label>
																				<div class="col-sm-9">
																					<input type="text" id="prov_dat_per_mail_alter"  class="col-xs-10 col-sm-5" maxlength="100">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_per_foto" style="display:none">*</font></span>Foto del Proveedor:</label>
																				<div class="col-sm-9">
																					<input type="file" id="subir_imagen_foto" class="btn btn-info col-sm-8"><a href="#modal_foto" class="col-sm-4" id="ver_imagen_2" style="display:none" data-toggle="modal">Ver Imágen</a>
																					<input type="text" id="prov_dat_per_foto"  class="col-xs-10 col-sm-8" style="display:none">
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
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_emp_nomcomercial" style="display:none">*</font></span>Nombre Comercial:</label>
																				<div class="col-sm-9">
																					<input type="text" id="prov_dat_emp_nomcomercial"  class="col-xs-10 col-sm-8" maxlength="400">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_emp_calle" style="display:none">*</font></span>Calle:</label>
																				<div class="col-sm-9">
																					<input type="text" id="prov_dat_emp_calle"  class="col-xs-10 col-sm-4" maxlength="250">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_emp_num_ext" style="display:none">*</font></span>Núm. Ext:</label>
																				<div class="col-sm-9">
																					<input type="text" id="prov_dat_emp_num_ext"  class="col-xs-10 col-sm-3">
																					<label class="col-sm-3 control-label no-padding-right" for="form-field-3">Núm. Int:</label>
																					<input type="text" id="prov_dat_emp_num_int"  class="col-xs-10 col-sm-2" maxlength="50">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_emp_colonia" style="display:none">*</font></span>Colonia:</label>
																				<div class="col-sm-9">
																					<input type="text" id="prov_dat_emp_colonia"  class="col-xs-10 col-sm-4" maxlength="250">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_emp_ciudad" style="display:none">*</font></span>Ciudad:</label>
																				<div class="col-sm-9">
																					<input type="text" id="prov_dat_emp_ciudad"  class="col-xs-10 col-sm-4" maxlength="300">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_emp_estado" style="display:none">*</font></span>Estado:</label>
																				<div class="col-sm-9">
																					<input type="text" id="prov_dat_emp_estado"  class="col-xs-10 col-sm-4" maxlength="300">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_emp_pais" style="display:none">*</font></span>País:</label>
																				<div class="col-sm-9">
																					<input type="text" id="prov_dat_emp_pais"  class="col-xs-10 col-sm-4" maxlength="300">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_emp_cp" style="display:none">*</font></span>Código Postal:</label>
																				<div class="col-sm-9">
																					<input type="text" id="prov_dat_emp_cp"  class="col-xs-10 col-sm-2" maxlength="10">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_emp_telef" style="display:none">*</font></span>Teléfono:</label>
																				<div class="col-sm-9">
																					<input type="text" id="prov_dat_emp_telef"  class="col-xs-10 col-sm-4" maxlength="15">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_emp_pag_web" style="display:none">*</font></span>Página Web:</label>
																				<div class="col-sm-9">
																					<input type="text" id="prov_dat_emp_pag_web"  class="col-xs-10 col-sm-5" maxlength="500">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_emp_desc_empre" style="display:none">*</font></span>Descripción de la Empresa:</label>
																				<div class="col-sm-9">
																					<textarea type="text" id="prov_dat_emp_desc_empre"  placeholder="Descripción" class="col-xs-10 col-sm-5" maxlength="8000"></textarea>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_emp_giro" style="display:none">*</font></span>Giro:</label>
																				<div class="col-sm-9">
																					<textarea type="text" id="prov_dat_emp_giro"  placeholder="Proporcionar todos los valores posibles" class="col-xs-10 col-sm-5" maxlength="500"></textarea>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_emp_rfc" style="display:none">*</font></span>RFC:</label>
																				<div class="col-sm-9">
																					<input type="text" id="prov_dat_emp_rfc"  class="col-xs-10 col-sm-5" maxlength="15">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_emp_raz_soc" style="display:none">*</font></span>Razón Social:</label>
																				<div class="col-sm-9">
																					<input type="text" id="prov_dat_emp_raz_soc"  class="col-xs-10 col-sm-5" maxlength="500">
																				</div>
																			</div>
																			
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_emp_dir_fis" style="display:none">*</font></span>Dirección fiscal:</label>
																				<div class="col-sm-9">
																					<div class="checkbox">
																						<label>
																							<input id="radio_di_fis_1" type="radio" class="ace" name="dir_fis" onchange="cambio_dir_fis(1)">
																							<span class="lbl">Dirección físcal igual a la mencionada</span>
																						</label>
																					</div>
																					<div class="checkbox">
																						<label>
																							<input id="radio_di_fis_2" type="radio" class="ace" name="dir_fis" onchange="cambio_dir_fis(2)">
																							<span class="lbl">Dirección físcal diferente a la mencionada</span>
																						</label>
																					</div>
																					<input type="text" id="prov_dat_emp_dir_fis"  class="col-xs-10 col-sm-8" style="display:none" placeholder="Dirección físcal diferente a la mencionada" maxlength="1000">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><span><font color="red" id="font_prov_dat_emp_cont_adm" style="display:none">*</font></span>Contacto Administrativo:</label>
																				<div class="col-sm-9">
																					<input type="text" id="prov_dat_emp_cont_adm"  class="col-xs-10 col-sm-5" maxlength="1000">
																				</div>
																			</div>
																			
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_emp_num_ejec_aut" style="display:none">*</font></span>Número de ejecutivos autorizados:</label>
																				<div class="col-sm-9">
																					<input type="text" id="prov_dat_emp_num_ejec_aut"  class="col-xs-10 col-sm-3" onkeypress='return validaNumericos(event)' maxlength="11">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_emp_num_agen_solic" style="display:none">*</font></span>Número de agendas solicitadas:</label>
																				<div class="col-sm-9">
																					<input type="text" id="prov_dat_emp_num_agen_solic"  class="col-xs-10 col-sm-3" onkeypress='return validaNumericos(event)' maxlength="11">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_prov_dat_emp_logo_empr" style="display:none">*</font></span>Logo de la Empresa:</label>
																				<div class="col-sm-9">
																					<input type="file" id="subir_imagen_logo" class="btn btn-info col-sm-8"><a href="#modal_logo" class="col-sm-4" id="ver_imagen_1" style="display:none" data-toggle="modal">Ver Imágen</a>
																					<input type="text" id="prov_dat_emp_logo_empr"  class="col-xs-10 col-sm-8" style="display:none">
																				</div>
																				
																			</div>
																			<div class="clearfix form-actions">
																				<div class="col-md-offset-3 col-md-9">
																					<button class="btn btn-info" type="button" id="guardar">
																						<i class="ace-icon fa fa-check bigger-110"></i>
																						Guardar
																					</button>
																					<button type="button" class="btn btn-danger" id="cancelar" onclick="limpiarcampos()">Cancelar</button>
																				</div>
																			</div>

																			<div class="hr hr-24"></div>
																		</form>
																		
																	</div><!-- /.col -->
																</div>
															</div>
															<div id="info_gen" class="tab-pane">
																<div class="row">
																	<div class="col-sm-12">
																		<div class="well well-lg">
																			<div class="form-group">
																				<label class="col-sm-2 control-label no-padding-right" for="form-field-1" style="padding-top: 0px;">
																					
																					<ul class="breadcrumb" style="margin: 0px 0px 0 0px;">
																						<li class="infotip">
																							Servicios:
																							<a href="#">
																								<span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="More details.">i</span>
																								
																								<div class="tooltip-login">
																									<div class="head align-center">
																										<h5>
																											<font color="white">SERVICIOS</font>
																										</h5>
																									</div>
																									<div class="body">
																										<div class="col-md-12 align-left" id="info_servicios">
																										</div>
																									</div>
																								</div>
																							</a>
																						</li>
																					</ul>
																				</label>
																				<div class="col-sm-10">
																					<input type="text" class="col-xs-12 col-sm-12" name="tags" id="prov_servicios" placeholder="Presiona Enter para agregar los Servicios" />
																				</div>
																			</div>
																			<div class="form-group align-center">
																				<input type="button" class="btn btn-success" onclick="guardar_tags()" id="gritter-without-image" value="Guardar Servicios">
																			</div>
																		</div>
																	</div>
																	
																	<div class="col-xs-12 col-sm-7">
																		<form class="form-horizontal" role="form" action="file.php" method="post" enctype="multipart/form-data">
																			<div class="form-group">
																				<label class="col-sm-2 control-label no-padding-right" for="form-field-1"></label>
																				<div class="col-sm-10">
																					<input type="hidden" name="prov_id_info_gen" id="prov_id_info_gen">
																					<input type="file" name="archivo" id="archivo"  class="btn btn-info col-sm-8">
																					<input type="submit" value="Subir archivo" class="btn btn-primary"></input>
																				</div>
																			</div>
																		</form>
																	</div>
																	<div class="col-xs-12 col-sm-5" id="lista_archivos">
																		
																	</div>
																</div>
															</div>
														
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="main-card mb-3 card">
												<div class="card-body card-body table-responsive" id="tabla_proveedores">
													
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

<?php
	include 'footer.php';
?>

<!-- page specific plugin scripts -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="assets/js/dataTables.buttons.min.js"></script>
		<script src="assets/js/buttons.flash.min.js"></script>
		<script src="assets/js/buttons.html5.min.js"></script>
		<script src="assets/js/buttons.print.min.js"></script>
		<script src="assets/js/buttons.colVis.min.js"></script>
		<script src="assets/js/dataTables.select.min.js"></script>
		
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>

		<script src="assets/js/dataTables/jquery.dataTables.js"></script>
		<script src="assets/js/dataTables/jquery.dataTables.bootstrap.js"></script>
		<script src="assets/js/dataTables/extensions/TableTools/js/dataTables.tableTools.js"></script>
		<script src="assets/js/dataTables/extensions/ColVis/js/dataTables.colVis.js"></script>
		<script src="assets/js/bootstrap-tag.js"></script>
<script type="text/javascript">
	const array_servicios=[];
	
	carga_serv=function() {
		
		$.ajax({
			type: "POST",
			url: "consultas/consultas_admin_prov_serv.php", 
			async: false,
			data: {
				accion: "consultar"
			},
			dataType: "html",
			beforeSend: function (xhr) {
			},
			success: function (data) {
				data = eval("(" + data + ")");
				if (data.totalCount > 0) {		
					var servicios="";	
					for(var i=0; i<data.totalCount; i++ ){
						array_servicios[i]=data.data[i].prov_serv_desc;
						servicios+="-"+data.data[i].prov_serv_desc+"<br>";
					}

					$("#info_servicios").html(servicios);
				}
			},
			error: function () {
				alert("Ocurrio un error al consultar.");
			}
		});
		
	}
	carga_serv();
	
	
	
	var tag_input = $('#prov_servicios');
	try{
		tag_input.tag(
		  	{
				placeholder:tag_input.attr('placeholder'),
				source: array_servicios
			}
		)
	}catch(e) {
		//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
		tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
		//$('#form-field-tags').autosize({append: "\n"});
	}

	guardar_tags=function(){
		var prov_servicios=$.trim($("#prov_servicios").val());
		var prov_id=$("#prov_id").val();
		if(prov_id!=""){
			
				$.ajax({
					type: "POST",
					url: "consultas/consultas_admin_proveedores.php",        
					async: false,
					data: {
						accion: "guardar_hastag_servicios",
						prov_id: prov_id,
						prov_servicios: prov_servicios
					},
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
						alert("currio un error al guardar.");
					}
				});
			
		}else{
			alert("Ocurrio un error, recarga la página y vuelve a intentarlo.");
		}
	}


	if($("#Perfil_Usuario").val()=="4"){
		$("#font_prov_dat_per_nombres").show();
		$("#font_prov_dat_per_ap_pat").show();
		$("#font_prov_dat_per_ap_mat").show();
		$("#font_prov_dat_per_cargo").show();
		$("#font_prov_dat_per_email").show();
		$("#font_prov_dat_per_telef_directo").show();
		$("#font_prov_dat_per_telef_directo_ext").show();
		$("#font_prov_dat_per_celular").show();
		$("#font_prov_dat_per_cont_asist").hide();
		$("#font_prov_dat_per_mail_alter").hide();
		$("#font_prov_dat_per_foto").hide();

		$("#font_prov_dat_emp_nomcomercial").show();
		$("#font_prov_dat_emp_calle").show();
		$("#font_prov_dat_emp_num_ext").show();
		$("#font_prov_dat_emp_colonia").show();
		$("#font_prov_dat_emp_ciudad").show();
		$("#font_prov_dat_emp_estado").show();
		$("#font_prov_dat_emp_pais").show();
		$("#font_prov_dat_emp_cp").show();
		$("#font_prov_dat_emp_telef").show();
		$("#font_prov_dat_emp_pag_web").show();
		$("#font_prov_dat_emp_desc_empre").show();
		$("#font_prov_dat_emp_giro").show();
		$("#font_prov_dat_emp_rfc").show();
		$("#font_prov_dat_emp_raz_soc").show();
		$("#font_prov_dat_emp_dir_fis").show();;//Direccion Fiscal
		$("#font_prov_dat_emp_cont_adm").hide();
		$("#font_prov_dat_emp_num_ejec_aut").hide();
		$("#font_prov_dat_emp_num_agen_solic").hide();
		$("#font_prov_dat_emp_logo_empr").hide();
	}else{
		$("#font_prov_dat_per_nombres").show();
		$("#font_prov_dat_per_ap_pat").show();
		$("#font_prov_dat_per_ap_mat").show();
		$("#font_prov_dat_per_cargo").show();
		$("#font_prov_dat_per_email").show();
		$("#font_prov_dat_per_telef_directo").show();
		$("#font_prov_dat_per_telef_directo_ext").show();
		$("#font_prov_dat_per_celular").show();
		//$("#font_prov_dat_per_cont_asist").show();
		//$("#font_prov_dat_per_mail_alter").show();
		//$("#font_prov_dat_per_foto").show();

		$("#font_prov_dat_emp_nomcomercial").show();
		$("#font_prov_dat_emp_calle").show();
		$("#font_prov_dat_emp_num_ext").show();
		$("#font_prov_dat_emp_colonia").show();
		$("#font_prov_dat_emp_ciudad").show();
		$("#font_prov_dat_emp_estado").show();
		$("#font_prov_dat_emp_pais").show();
		$("#font_prov_dat_emp_cp").show();
		$("#font_prov_dat_emp_telef").show();
		$("#font_prov_dat_emp_pag_web").show();
		$("#font_prov_dat_emp_desc_empre").show();
		$("#font_prov_dat_emp_giro").show();
		$("#font_prov_dat_emp_rfc").show();
		$("#font_prov_dat_emp_raz_soc").show();
		$("#font_prov_dat_emp_dir_fis").show();;//Direccion Fiscal
		//$("#font_prov_dat_emp_cont_adm").show();
		//$("#font_prov_dat_emp_num_ejec_aut").show();
		//$("#font_prov_dat_emp_num_agen_solic").show();
		//$("#font_prov_dat_emp_logo_empr").show();
		
	}
	
	function validaNumericos(event) {
			if(event.charCode >= 48 && event.charCode <= 57){
				return true;
			 }
			 return false;        
	}
	
	function cambio_dir_fis(val){
		if(val==2){
			$("#prov_dat_emp_dir_fis").show();
		}else{
			$("#prov_dat_emp_dir_fis").hide();
		}
	}
	
	function siguiente (){
		$("#home").removeClass("active");
		$("#li_dat_per").removeClass("active");
		
		$("#profile").addClass("active");
		$("#li_dat_empr").addClass("active");
	}
	
	limpiarcampos=function(){
		$("#span_nombre_comercial").html("");
		$("#li_info_gene").hide();
		$("#info_gene").hide();
		
		$("#prov_id").val("");
		$("#prov_id_info_gen").val("");
		$("#prov_dat_per_ap_pat").val("");
		$("#prov_dat_per_ap_mat").val("");
		$("#prov_dat_per_nombres").val("");
		$("#prov_dat_per_cargo").val("");
		$("#prov_dat_per_email").val("");
		$("#prov_dat_per_telef_directo").val("");
		$("#prov_dat_per_telef_directo_ext").val("");
		$("#prov_dat_per_celular").val("");
		$("#prov_dat_per_cont_asist").val("");
		$("#prov_dat_per_mail_alter").val("");
		$("#prov_dat_per_foto").val("");
		$("#prov_dat_emp_nomcomercial").val("");
		$("#prov_dat_emp_ciudad").val("");
		$("#prov_dat_emp_estado").val("");
		$("#prov_dat_emp_calle").val("");
		$("#prov_dat_emp_num_int").val("");
		$("#prov_dat_emp_num_ext").val("");
		$("#prov_dat_emp_colonia").val("");
		$("#prov_dat_emp_cp").val("");
		$("#prov_dat_emp_pais").val("");
		$("#prov_dat_emp_telef").val("");
		$("#prov_dat_emp_pag_web").val("");
		$("#prov_dat_emp_desc_empre").val("");
		$("#prov_dat_emp_giro").val("");
		$("#prov_dat_emp_rfc").val("");
		$("#prov_dat_emp_raz_soc").val("");
		$("#prov_dat_emp_cont_adm").val("");
		$("#prov_dat_emp_telef_di").val("");
		$("#prov_dat_emp_mail").val("");
		$("#prov_dat_emp_dir_fis").val("");
		$("#prov_dat_emp_num_ejec_aut").val("");
		$("#prov_dat_emp_num_agen_solic").val("");
		$("#prov_dat_emp_logo_empr").val("");
		$("#lista_archivos").html("");
		$("#guardar").html("Guardar");
		
		$("#radio_di_fis_1").prop("checked", false);
		$("#radio_di_fis_2").prop("checked", false);
		$("#prov_dat_emp_dir_fis").hide();
		document.getElementById("subir_imagen_logo").value = "";
		$("#ver_imagen_1").hide();
		$("#logo_img").html('');
		
		document.getElementById("subir_imagen_foto").value = "";
		$("#ver_imagen_2").hide();
		$("#foto_img").html('');

		$("#prov_servicios").val("");
		var $tag_obj_r = $('#prov_servicios').data('tag');
		$tag_obj_r.clear();
		//$('#prov_servicios').siblings('.tag').remove();
		
		
		
	}
	
	tabla_proveedores();
	function tabla_proveedores(){
		var tabla="";
		tabla+="	<table class='table table-bordered' id='dataTable'>";
		tabla+="		<thead>";
		tabla+="			<tr>";
		tabla+="				<th>Opciones</th>";
		tabla+="				<th>Nombre Comercial</th>";
		tabla+="				<th>Nombre</th>";
		tabla+="				<th>Apellido Paterno</th>";
		tabla+="				<th>Apellido Materno</th>";
		tabla+="				<th>Cargo</th>";
		tabla+="				<th>Ciudad</th>";
		tabla+="				<th>Pais</th>";
		tabla+="				<th>Teléfono</th>";
		tabla+="				<th>Email</th>";
		tabla+="				<th>Num. Ejecutivos Autorizados</th>";
		tabla+="				<th>Num. Agendas Solicitadas</th>";
		
		
		
		tabla+="			</tr>";
		tabla+="		</thead>";
		var resultado=new Array();
		data={accion: "consultar_proveedores"};
		resultado=cargo_cmb("consultas/consultas_admin_proveedores.php",false, data);
		if(resultado.totalCount>0){
		tabla+="		<tbody>";
			for(var i = 0; i < resultado.totalCount; i++){
				tabla+="			<tr>";
				
				tabla+='				<td align="center">';
				tabla+='					<div class="">';
				tabla+='						<a onclick="pasarvalores('+resultado.data[i].prov_id+')" class="green" href="#noir"><i class="ace-icon fa fa-pencil bigger-130" title="Editar"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;';
				tabla+='						<a onclick="eliminar('+resultado.data[i].prov_id+')" class="red" title="Eliminar" href="#noir"><i class="ace-icon fa fa-trash-o bigger-130" title="Eliminar"></i></a>';
				tabla+='					</div>';
				tabla+='				</td>';
				tabla+="				<td>"+resultado.data[i].prov_dat_emp_nomcomercial+"</td>";
				tabla+="				<td>"+resultado.data[i].prov_dat_per_nombres+"</td>";
				tabla+="				<td>"+resultado.data[i].prov_dat_per_ap_pat+"</td>";	
				tabla+="				<td>"+resultado.data[i].prov_dat_per_ap_mat+"</td>";
				tabla+="				<td>"+resultado.data[i].prov_dat_per_cargo+"</td>";
				tabla+="				<td>"+resultado.data[i].prov_dat_emp_ciudad+"</td>";
				tabla+="				<td>"+resultado.data[i].prov_dat_emp_pais+"</td>";
				tabla+="				<td>"+resultado.data[i].prov_dat_emp_telef+"</td>";
				tabla+="				<td>"+resultado.data[i].prov_dat_per_email+"</td>";
				tabla+="				<td>"+resultado.data[i].prov_dat_emp_num_ejec_aut+"</td>";
				tabla+="				<td>"+resultado.data[i].prov_dat_emp_num_agen_solic+"</td>";
				tabla+="			</tr>";
				
			}
		tabla+="		</tbody>";	
		}else{
			
		}
		tabla+="	</table>";
	
		
		
		$("#tabla_proveedores").html(tabla);
		$('#dataTable').DataTable({
				"lengthMenu": [
			   	[ 1000, 100000 ],
			   	[ '1000 Filas', 'Todos' ]
			   ],
			   dom: 'Bfrtip',
				 buttons: [
						{
                extend: 'excel',
                title: 'Proveedores'
            }
				 ],
			   "scrollY": 600,
			   "scrollX": true,
			   "processing": true,
			   //"serverSide": true,
			   "language": {
					"lengthMenu": "Mostrando _MENU_ registros por p&aacute;gina",
					"zeroRecords": "Sin Resultados",
					"info": "Mostrando p&aacute;gina _PAGE_ de _PAGES_ , total de registros: _MAX_",
					"infoEmpty": "Sin Resultados",
					"infoFiltered": "(Mostrando  _MAX_ del total de registros)",
					"search": "Busqueda: ",
					"paginate": {
						"first": "Primera",
						"last": "Ultima",
						"next": "Siguiente",
						"previous": "Anterior"
					}
				}
			});
			$(".dt-buttons").attr("align", "center");
			$(".buttons-excel").addClass("btn btn-success");
	}
	
	
	$("#guardar").click(function () {
		var Agregar = true;
		var mensaje_error = "";
		var prov_id=$("#prov_id").val();
		var prov_dat_per_nombres=$.trim($("#prov_dat_per_nombres").val());
		var prov_dat_per_ap_pat=$.trim($("#prov_dat_per_ap_pat").val());
		var prov_dat_per_ap_mat=$.trim($("#prov_dat_per_ap_mat").val());
		var prov_dat_per_cargo=$.trim($("#prov_dat_per_cargo").val());
		var prov_dat_per_email=$.trim($("#prov_dat_per_email").val());
		var prov_dat_per_telef_directo=$.trim($("#prov_dat_per_telef_directo").val());
		var prov_dat_per_telef_directo_ext=$.trim($("#prov_dat_per_telef_directo_ext").val());
		var prov_dat_per_celular=$.trim($("#prov_dat_per_celular").val());
		var prov_dat_per_cont_asist=$.trim($("#prov_dat_per_cont_asist").val());
		var prov_dat_per_mail_alter=$.trim($("#prov_dat_per_mail_alter").val());
		var prov_dat_per_foto=$.trim($("#prov_dat_per_foto").val());
		
		
		var prov_dat_emp_nomcomercial=$.trim($("#prov_dat_emp_nomcomercial").val());
		var prov_dat_emp_calle=$.trim($("#prov_dat_emp_calle").val());
		var prov_dat_emp_num_int=$.trim($("#prov_dat_emp_num_int").val());
		var prov_dat_emp_num_ext=$.trim($("#prov_dat_emp_num_ext").val());
		var prov_dat_emp_colonia=$.trim($("#prov_dat_emp_colonia").val());
		var prov_dat_emp_ciudad=$.trim($("#prov_dat_emp_ciudad").val());
		var prov_dat_emp_estado=$.trim($("#prov_dat_emp_estado").val());
		var prov_dat_emp_pais=$.trim($("#prov_dat_emp_pais").val());
		var prov_dat_emp_cp=$.trim($("#prov_dat_emp_cp").val());
		var prov_dat_emp_telef=$.trim($("#prov_dat_emp_telef").val());
		var prov_dat_emp_pag_web=$.trim($("#prov_dat_emp_pag_web").val());
		var prov_dat_emp_desc_empre=$.trim($("#prov_dat_emp_desc_empre").val());
		var prov_dat_emp_giro=$.trim($("#prov_dat_emp_giro").val());
		var prov_dat_emp_rfc=$.trim($("#prov_dat_emp_rfc").val());
		var prov_dat_emp_raz_soc=$.trim($("#prov_dat_emp_raz_soc").val());
		var prov_dat_emp_dir_fis=$.trim($("#prov_dat_emp_dir_fis").val());
		var prov_dat_emp_dir_fis_tipo=''
		var prov_dat_emp_cont_adm=$.trim($("#prov_dat_emp_cont_adm").val());
		var prov_dat_emp_num_ejec_aut=$.trim($("#prov_dat_emp_num_ejec_aut").val());
		var prov_dat_emp_num_agen_solic=$.trim($("#prov_dat_emp_num_agen_solic").val());
		var prov_dat_emp_logo_empr=$.trim($("#prov_dat_emp_logo_empr").val());
		
		var Usuario_Sistema=$("#Usuario_Sistema").val();
		
		var strDatos=""; 
		if( $('#radio_di_fis_1').prop('checked') ) {prov_dat_emp_dir_fis_tipo='1'; }
		if( $('#radio_di_fis_2').prop('checked') ) {prov_dat_emp_dir_fis_tipo='2'; }
		
		
		
		if($("#Perfil_Usuario").val()=="4"){
			if (prov_dat_per_nombres.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Nombre \n";}
			if (prov_dat_per_ap_pat.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Apellido Paterno \n";}
			if (prov_dat_per_ap_mat.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Apellido Materno \n";}
			if (prov_dat_per_cargo.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Cargo \n";}
			if (prov_dat_per_email.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Mail \n";}
			if (prov_dat_per_telef_directo.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Teléfono \n";}
			//if (prov_dat_per_telef_directo_ext.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Extensión \n";}
			if (prov_dat_per_celular.length <= 0) {Agregar = false; mensaje_error += " -Agrega el número de celular \n";}
			//if (prov_dat_per_cont_asist.length <= 0) {Agregar = false; mensaje_error += " -Agrega el contacto Asistente \n";}
			//if (prov_dat_per_mail_alter.length <= 0) {Agregar = false; mensaje_error += " -Agrega Mail Alternativo \n";}
			//if (prov_dat_per_foto.length <= 0) {Agregar = false; mensaje_error += " -Agrega la foto \n";}
			
			
			if (prov_dat_emp_nomcomercial.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Nombre Comercial \n";}
			if (prov_dat_emp_calle.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Calle \n";}
			if (prov_dat_emp_num_ext.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Núm. Exterior \n";}
			if (prov_dat_emp_colonia.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Colonia \n";}
			if (prov_dat_emp_ciudad.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Ciudad \n";}
			if (prov_dat_emp_estado.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Estado \n";}
			if (prov_dat_emp_pais.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Pais \n";}
			if (prov_dat_emp_cp.length <= 0) {Agregar = false; mensaje_error += " -Agrega el CP \n";}
			if (prov_dat_emp_telef.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Teléfono \n";}
			if (prov_dat_emp_pag_web.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Página Web \n";}
			if (prov_dat_emp_desc_empre.length <= 0) {Agregar = false; mensaje_error += " -Agrega la descripción de la Empresa \n";}
			if (prov_dat_emp_giro.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Giro de la Empresa \n";}
			if (prov_dat_emp_rfc.length <= 0) {Agregar = false; mensaje_error += " -Agrega el RFC \n";}
			if (prov_dat_emp_raz_soc.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Razón Social \n";}
			if (prov_dat_emp_dir_fis_tipo.length <= 0) {Agregar = false; mensaje_error += " -Selecciona el tipo de dirección Físcal \n";}else{if(prov_dat_emp_dir_fis_tipo=="2"&&prov_dat_emp_dir_fis.length<=0){Agregar = false; mensaje_error += " -Agrega la dirección físcal diferente a la mencionada \n";}}
			//if (prov_dat_emp_cont_adm.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Contacto Administrativo de la Empresa \n";}
			//if (prov_dat_emp_num_ejec_aut.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Num., de Ejecutivos \n";}
			//if (prov_dat_emp_num_agen_solic.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Núm., de Agendas \n";}
			//if (prov_dat_emp_logo_empr.length <= 0) {Agregar = false; mensaje_error += " -Agrega el logo de la Empresa \n";}
		}else{
			if (prov_dat_per_nombres.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Nombre \n";}
			if (prov_dat_per_ap_pat.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Apellido Paterno \n";}
			if (prov_dat_per_ap_mat.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Apellido Materno \n";}
			if (prov_dat_per_cargo.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Cargo \n";}
			if (prov_dat_per_email.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Mail \n";}
			if (prov_dat_per_telef_directo.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Teléfono \n";}
			//if (prov_dat_per_telef_directo_ext.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Extensión \n";}
			if (prov_dat_per_celular.length <= 0) {Agregar = false; mensaje_error += " -Agrega el número de celular \n";}
			//if (prov_dat_per_cont_asist.length <= 0) {Agregar = false; mensaje_error += " -Agrega el contacto Asistente \n";}
			//if (prov_dat_per_mail_alter.length <= 0) {Agregar = false; mensaje_error += " -Agrega Mail Alternativo \n";}
			//if (prov_dat_per_foto.length <= 0) {Agregar = false; mensaje_error += " -Agrega la foto \n";}
			
			
			
			if (prov_dat_emp_nomcomercial.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Nombre Comercial \n";}
			if (prov_dat_emp_calle.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Calle \n";}
			if (prov_dat_emp_num_ext.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Núm. Exterior \n";}
			if (prov_dat_emp_colonia.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Colonia \n";}
			if (prov_dat_emp_ciudad.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Ciudad \n";}
			if (prov_dat_emp_estado.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Estado \n";}
			if (prov_dat_emp_pais.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Pais \n";}
			if (prov_dat_emp_cp.length <= 0) {Agregar = false; mensaje_error += " -Agrega el CP \n";}
			if (prov_dat_emp_telef.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Teléfono \n";}
			if (prov_dat_emp_pag_web.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Página Web \n";}
			if (prov_dat_emp_desc_empre.length <= 0) {Agregar = false; mensaje_error += " -Agrega la descripción de la Empresa \n";}
			if (prov_dat_emp_giro.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Giro de la Empresa \n";}
			if (prov_dat_emp_rfc.length <= 0) {Agregar = false; mensaje_error += " -Agrega el RFC \n";}
			if (prov_dat_emp_raz_soc.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Razón Social \n";}
			if (prov_dat_emp_dir_fis_tipo.length <= 0) {Agregar = false; mensaje_error += " -Selecciona el tipo de dirección Físcal \n";}else{if(prov_dat_emp_dir_fis_tipo=="2"&&prov_dat_emp_dir_fis.length<=0){Agregar = false; mensaje_error += " -Agrega la dirección físcal diferente a la mencionada \n";}}
			
			//if (prov_dat_emp_cont_adm.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Contacto Administrativo de la Empresa \n";}
			//if (prov_dat_emp_num_ejec_aut.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Num., de Ejecutivos \n";}
			//if (prov_dat_emp_num_agen_solic.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Núm., de Agendas \n";}
			//if (prov_dat_emp_logo_empr.length <= 0) {Agregar = false; mensaje_error += " -Agrega el logo de la Empresa \n";}
		}
		if (!Agregar) {
			alert(mensaje_error);			
		}
		
		if(Agregar)
		{
			strDatos = "prov_dat_per_ap_pat="+prov_dat_per_ap_pat;
			strDatos += "&prov_dat_per_ap_mat="+prov_dat_per_ap_mat;
			strDatos += "&prov_dat_per_nombres="+prov_dat_per_nombres;
			strDatos += "&prov_dat_per_cargo="+prov_dat_per_cargo;
			strDatos += "&prov_dat_per_email="+prov_dat_per_email;
			strDatos += "&prov_dat_per_telef_directo="+prov_dat_per_telef_directo;
			strDatos += "&prov_dat_per_telef_directo_ext="+prov_dat_per_telef_directo_ext;
			strDatos += "&prov_dat_per_celular="+prov_dat_per_celular;
			strDatos += "&prov_dat_per_cont_asist="+prov_dat_per_cont_asist;
			strDatos += "&prov_dat_per_mail_alter="+prov_dat_per_mail_alter;
			strDatos += "&prov_dat_per_foto="+prov_dat_per_foto;
			strDatos += "&prov_dat_emp_nomcomercial="+prov_dat_emp_nomcomercial;
			strDatos += "&prov_dat_emp_ciudad="+prov_dat_emp_ciudad;
			strDatos += "&prov_dat_emp_estado="+prov_dat_emp_estado;
			strDatos += "&prov_dat_emp_calle="+prov_dat_emp_calle;
			strDatos += "&prov_dat_emp_num_int="+prov_dat_emp_num_int;
			strDatos += "&prov_dat_emp_num_ext="+prov_dat_emp_num_ext;
			strDatos += "&prov_dat_emp_colonia="+prov_dat_emp_colonia;
			strDatos += "&prov_dat_emp_cp="+prov_dat_emp_cp;
			strDatos += "&prov_dat_emp_pais="+prov_dat_emp_pais;
			strDatos += "&prov_dat_emp_telef="+prov_dat_emp_telef;
			strDatos += "&prov_dat_emp_pag_web="+prov_dat_emp_pag_web;
			strDatos += "&prov_dat_emp_desc_empre="+prov_dat_emp_desc_empre;
			strDatos += "&prov_dat_emp_giro="+prov_dat_emp_giro;
			strDatos += "&prov_dat_emp_rfc="+prov_dat_emp_rfc;
			strDatos += "&prov_dat_emp_raz_soc="+prov_dat_emp_raz_soc;
			strDatos += "&prov_dat_emp_cont_adm="+prov_dat_emp_cont_adm;
			
			strDatos += "&prov_dat_emp_dir_fis="+prov_dat_emp_dir_fis;
			strDatos += "&prov_dat_emp_dir_fis_tipo="+prov_dat_emp_dir_fis_tipo;
			strDatos += "&prov_dat_emp_num_ejec_aut="+prov_dat_emp_num_ejec_aut;
			strDatos += "&prov_dat_emp_num_agen_solic="+prov_dat_emp_num_agen_solic;
			strDatos += "&prov_dat_emp_logo_empr="+prov_dat_emp_logo_empr;
			if(prov_id.length <= 0)
			{
				strDatos += "&prov_modifico="+Usuario_Sistema;
				strDatos += "&prov_estatus=A";					
				strDatos += "&accion=guardar_proveedor";
			}
			else
			{
				strDatos += "&prov_id="+prov_id;
				strDatos += "&prov_modifico="+Usuario_Sistema;
				strDatos += "&prov_estatus=M";				
				strDatos += "&accion=editar_proveedor";
			}
			
			$.ajax({
				type: "POST",
				url: "consultas/consultas_admin_proveedores.php",        
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
						tabla_proveedores();
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
	
	pasarvalores=function(id) {
		limpiarcampos();
		if (id != "") {
			$("#guardar").html("Editar");
			$.ajax({
				type: "POST",
				url: "consultas/consultas_admin_proveedores.php", 
				async: false,
				data: {
					prov_id: id,
					accion: "consultar_proveedores"
				},
				dataType: "html",
				beforeSend: function (xhr) {

				},
				success: function (data) {
					data = eval("(" + data + ")");
					if (data.totalCount > 0) {		
						$("#li_info_gene").show();
						$("#info_gene").show();
		$('html,body').animate({
				scrollTop: $(".main-content").offset().top
			}, 100);
					
						var foto="";
						$("#prov_id").val(data.data[0].prov_id);
						$("#prov_id_info_gen").val(data.data[0].prov_id);
						$("#prov_dat_per_ap_pat").val(data.data[0].prov_dat_per_ap_pat);
						$("#prov_dat_per_ap_mat").val(data.data[0].prov_dat_per_ap_mat);
						$("#prov_dat_per_nombres").val(data.data[0].prov_dat_per_nombres);
						$("#prov_dat_per_cargo").val(data.data[0].prov_dat_per_cargo);
						$("#prov_dat_per_email").val(data.data[0].prov_dat_per_email);
						$("#prov_dat_per_telef_directo").val(data.data[0].prov_dat_per_telef_directo);
						$("#prov_dat_per_telef_directo_ext").val(data.data[0].prov_dat_per_telef_directo_ext);
						$("#prov_dat_per_celular").val(data.data[0].prov_dat_per_celular);
						$("#prov_dat_per_cont_asist").val(data.data[0].prov_dat_per_cont_asist);
						$("#prov_dat_per_mail_alter").val(data.data[0].prov_dat_per_mail_alter);
						$("#prov_dat_per_foto").val(data.data[0].prov_dat_per_foto);
						$("#prov_dat_emp_nomcomercial").val(data.data[0].prov_dat_emp_nomcomercial);
						$("#span_nombre_comercial").html(" ("+data.data[0].prov_dat_emp_nomcomercial+")");
						$("#prov_dat_emp_ciudad").val(data.data[0].prov_dat_emp_ciudad);
						$("#prov_dat_emp_estado").val(data.data[0].prov_dat_emp_estado);
						$("#prov_dat_emp_calle").val(data.data[0].prov_dat_emp_calle);
						$("#prov_dat_emp_num_int").val(data.data[0].prov_dat_emp_num_int);
						$("#prov_dat_emp_num_ext").val(data.data[0].prov_dat_emp_num_ext);
						$("#prov_dat_emp_colonia").val(data.data[0].prov_dat_emp_colonia);
						$("#prov_dat_emp_cp").val(data.data[0].prov_dat_emp_cp);
						$("#prov_dat_emp_pais").val(data.data[0].prov_dat_emp_pais);
						$("#prov_dat_emp_telef").val(data.data[0].prov_dat_emp_telef);
						$("#prov_dat_emp_pag_web").val(data.data[0].prov_dat_emp_pag_web);
						$("#prov_dat_emp_desc_empre").val(data.data[0].prov_dat_emp_desc_empre);
						$("#prov_dat_emp_giro").val(data.data[0].prov_dat_emp_giro);
						$("#prov_dat_emp_rfc").val(data.data[0].prov_dat_emp_rfc);
						$("#prov_dat_emp_raz_soc").val(data.data[0].prov_dat_emp_raz_soc);
						$("#prov_dat_emp_cont_adm").val(data.data[0].prov_dat_emp_cont_adm);
						$("#prov_dat_emp_telef_di").val(data.data[0].prov_dat_emp_telef_di);
						$("#prov_dat_emp_mail").val(data.data[0].prov_dat_emp_mail);
						$("#prov_dat_emp_dir_fis").val(data.data[0].prov_dat_emp_dir_fis);
						
						
						if(data.data[0].prov_dat_emp_dir_fis_tipo==1){
							$("#radio_di_fis_1").prop("checked", true);
							$("#prov_dat_emp_dir_fis").hide();
						}
						
						if(data.data[0].prov_dat_emp_dir_fis_tipo==2){
							$("#radio_di_fis_2").prop("checked", true);
							$("#prov_dat_emp_dir_fis").show();
						}
						
						
						$("#prov_dat_emp_num_ejec_aut").val(data.data[0].prov_dat_emp_num_ejec_aut);
						$("#prov_dat_emp_num_agen_solic").val(data.data[0].prov_dat_emp_num_agen_solic);
						$("#prov_dat_emp_logo_empr").val(data.data[0].prov_dat_emp_logo_empr);
						
						if(data.data[0].prov_dat_emp_logo_empr!=""){
							$("#ver_imagen_1").show();
							$("#logo_img").html('<img src="'+data.data[0].prov_dat_emp_logo_empr+'" style="width: 50%;height: 50%">');
						}
						
						if(data.data[0].prov_dat_per_foto!=""){
							$("#ver_imagen_2").show();
							$("#foto_img").html('<img src="'+data.data[0].prov_dat_per_foto+'" style="width: 50%;height: 50%">');
						}
						listar_archivos(id);

						if(data.data[0].prov_servicios!=""){
							var $tag_obj = $('#prov_servicios').data('tag');
							var res = data.data[0].prov_servicios.split(",");
							for(var i=0; i<res.length; i++){
								//alert(res[i]);
								$tag_obj.add($.trim(res[i]));
							}
							$("#prov_servicios").val(data.data[0].prov_servicios);
						}
						

					}
				},
				error: function () {
					alert("Ocurrio un error al consultar.");
				}
			});
		}
	}
	
	
	eliminar=function(prov_id){
		if(prov_id!=""){
			var strDatos="";
			var Usuario_Sistema=$("#Usuario_Sistema").val();
			strDatos = "prov_id="+prov_id;
			strDatos += "&prov_modifico="+Usuario_Sistema;
			strDatos += "&prov_estatus=E";				
			strDatos += "&accion=eliminar_proveedor";
			

			var bool=confirm("Esta seguro de eliminar el Registro.");
			if(bool){
				$.ajax({
					type: "POST",
					url: "consultas/consultas_admin_proveedores.php",        
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
							alert("Eliminado Correctamente.");	
							tabla_proveedores();
						}else{
							alert(json.mensaje);
						}
						
						
					},
					error: function () {
						alert("ocurrio un error al eliminar.");
					}
				});
			}
		}
		
	}

	
	function listar_archivos(id){
		$.ajax({
			type: "POST",
			url: "consultas/consultas_admin_proveedores.php", 
			async: false,
			data: {
				prov_id: id,
				accion: "listar_archivos"
			},
			dataType: "html",
			beforeSend: function (xhr) {

			},
			success: function (data) {
				data = eval("(" + data + ")");
				$("#lista_archivos").html(data.Archivos);
				
			},
			error: function () {
				alert("Ocurrio un error al consultar.");
			}
		});
	}
	
	
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
				$("#prov_dat_emp_logo_empr").val(response);
				$("#logo_img").html('<img src="'+response+'" style="width: 50%;height: 50%">');
				$("#ver_imagen_1").show();
				document.getElementById("subir_imagen_logo").value = "";
			} else {
				$("#prov_dat_emp_logo_empr").val("");
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
		$("#prov_dat_emp_logo_empr").val(b64);
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
				$("#prov_dat_per_foto").val(response);
				$("#foto_img").html('<img src="'+response+'" style="width: 50%;height: 50%">');
				$("#ver_imagen_2").show();
				document.getElementById("subir_imagen_foto").value = "";
			} else {
				$("#prov_dat_per_foto").val("");
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
		$("#prov_dat_per_foto").val(b64);
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

function borrararchivo(id, Archivo){
	var bool=confirm("Esta seguro de eliminar el Archivo.");
	if(bool){
		$.ajax({
				type: "POST",
				url: "consultas/consultas_admin_proveedores.php", 
				async: false,
				data: {
					Archivo:Archivo,
					accion: "borrar_archivo"
				},
				dataType: "html",
				beforeSend: function (xhr) {

				},
				success: function (data) {
					data = eval("(" + data + ")");
					if(data.totalCount>0){
						listar_archivos(id);
						
						alert("Se elimino Correctamente");
					}else{
						alert("Ocurrio un error al eliminar");
					}
					
				},
				error: function () {
					alert("Ocurrio un error al consultar.");
				}
			});
	}
}

if("<?php echo $prov_id;?>"!=""){
	alert("<?php echo $Msj;?>");
	pasarvalores("<?php echo $prov_id;?>");
	
	$("#home").removeClass("active");
	$("#li_dat_per").removeClass("active");
	
	$("#info_gen").addClass("active");
	$("#li_info_gene").addClass("active");
}

//Se abre cuando se pasan valores desde admin_eventos.php
if("<?php echo $id;?>"!=""){
	pasarvalores("<?php echo $id;?>");
}



</script>