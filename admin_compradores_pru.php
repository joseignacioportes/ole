<?php
	include 'header.php';
?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li class="active">Admin Compradores</li>
						</ul><!-- /.breadcrumb -->

						
					</div>

					<div class="page-content">
						<form method="post" action="#" enctype="multipart/form-data">
				<div class="card" style="width: 18rem;">
						<img class="card-img-top" src="images/default-avatar.png">
						<div class="card-body">
								<h5 class="card-title">Sube una foto</h5>
								<p class="card-text">Sube una imagen...</p>
								<div class="form-group">
										<label for="image">Nueva imagen</label>
										<input type="file" class="form-control-file" name="image" id="image">
								</div>
								<input type="button" class="btn btn-primary upload" value="Subir">
						</div>
				</div>
		</form>
						
						
						
						<div class="row">
							<div class="col-xs-12 col-sm-12">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form">
									<div class="hr hr-24"></div>

									<div class="row">
										<div class="col-sm-12 widget-container-col">
											<div class="widget-box">
												<div class="widget-header widget-header-small">
													<h5 class="widget-title smaller">Admin Compradores</h5>

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
																			
																			<input type="hidden" id="compr_id">
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
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_per_nombres" style="display:none">*</font></span>Nombre(s):</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_per_nombres"  class="col-xs-10 col-sm-8">
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
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_per_telef_directo" style="display:none">*</font></span>Teléfono Directo:</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_per_telef_directo"  class="col-xs-10 col-sm-4">
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
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_per_areas" style="display:none">*</font>Indique en cuales áreas usted tiene desición de compras:</label>
																				<div class="col-sm-9">
																					<div class="checkbox">
																						<label>
																							<input id="check_1" type="checkbox" class="ace" >
																							<span class="lbl">Alimentos y Bebidas</span>
																						</label>
																					</div>
																					<div class="checkbox">
																						<label>
																							<input id="check_2" type="checkbox" class="ace">
																							<span class="lbl">Mobiliario</span>
																						</label>
																					</div>
																					<div class="checkbox">
																						<label>
																							<input id="check_3" type="checkbox" class="ace">
																							<span class="lbl">Equipos de Operación</span>
																						</label>
																					</div>
																					<div class="checkbox">
																						<label>
																							<input id="check_4" type="checkbox" class="ace">
																							<span class="lbl">Elestrónicos</span>
																						</label>
																					</div>
																					<div class="checkbox">
																						<label>
																							<input id="check_5" type="checkbox" class="ace">
																							<span class="lbl">Sistemas</span>
																						</label>
																					</div>
																					<div class="checkbox">
																						<label>
																							<input id="check_6" type="checkbox" class="ace">
																							<span class="lbl">Banco y decoración</span>
																						</label>
																					</div>
																					<div class="checkbox">
																						<label>
																							<input id="check_7" type="checkbox" class="ace">
																							<span class="lbl">Mantenimiento</span>
																						</label>
																					</div>
																					<div class="checkbox">
																						<label>
																							<input id="check_8" type="checkbox" class="ace">
																							<span class="lbl">Recursos Humanos</span>
																						</label>
																					</div>
																					<div class="checkbox">
																						<label>
																							<input id="check_9" type="checkbox" class="ace">
																							<span class="lbl">Ama de llaves</span>
																						</label>
																					</div>
																					<div class="checkbox">
																						<label>
																							<input id="check_10" type="checkbox" class="ace">
																							<span class="lbl">Productos de Consumo y Suministro</span>
																						</label>
																					</div>
																					<div class="checkbox">
																						<label>
																							<input id="check_11" type="checkbox" class="ace">
																							<span class="lbl">Construcción</span>
																						</label>
																					</div>
																					<div class="checkbox">
																						<label>
																							<input id="check_12" type="checkbox" class="ace">
																							<span class="lbl">Otros</span>
																							<input type="text" id="compr_dat_per_area_otro" >
																						</label>
																					</div>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_per_foto" style="display:none">*</font></span>Subir foto:</label>
																				<div class="col-sm-9">
																					<input type="file" id="subir_imagen_foto" class="btn btn-info col-sm-8"><a href="#modal_foto" class="col-sm-4" id="ver_imagen_2" style="display:none" data-toggle="modal">Ver Imágen</a>
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
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_emp_calle" style="display:none">*</font>Calle:</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_emp_calle"  class="col-xs-10 col-sm-4">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_emp_colonia" style="display:none">*</font>Colonia:</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_emp_colonia"  class="col-xs-10 col-sm-4">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_emp_cp" style="display:none">*</font></span>Código Postal:</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_emp_cp"  class="col-xs-10 col-sm-2">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_emp_pais" style="display:none">*</font></span>País:</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_emp_pais"  class="col-xs-10 col-sm-4">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_emp_telef" style="display:none">*</font></span>Teléfono:</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_emp_telef"  class="col-xs-10 col-sm-4">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_emp_pag_web" style="display:none">*</font></span>Página Web:</label>
																				<div class="col-sm-9">
																					<input type="text" id="compr_dat_emp_pag_web"  class="col-xs-10 col-sm-5">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" id="font_compr_dat_emp_desc_empre" style="display:none">*</font></span>Descripción de la Empresa:</label>
																				<div class="col-sm-9">
																					<textarea type="text" id="compr_dat_emp_desc_empre"  placeholder="Descripción" class="col-xs-10 col-sm-5"></textarea>
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
																					<input type="file" id="subir_imagen_logo" class="btn btn-info col-sm-8"><a href="#modal_logo" class="col-sm-4" id="ver_imagen_1" style="display:none" data-toggle="modal">Ver Imágen</a>
																					<input type="text" id="compr_dat_emp_logo_empr"  class="col-xs-10 col-sm-8" style="display:none">
																				</div>
																			</div>
																			<div class="clearfix form-actions">
																				<div class="col-md-offset-3 col-md-9">
																					<button class="btn btn-info" type="button" id="guardar">
																						<i class="ace-icon fa fa-check bigger-110"></i>
																						Guardar
																					</button>
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
<script type="text/javascript">
	
	$(document).ready(function() {
			//$(".upload").on('click', function() {
			//		var formData = new FormData();
			//		var files = $('#image')[0].files[0];
			//		formData.append('file',files);
			//		$.ajax({
			//				url: 'upload.php',
			//				type: 'post',
			//				data: formData,
			//				contentType: false,
			//				processData: false,
			//				success: function(response) {
			//						if (response != 0) {
			//								$(".card-img-top").attr("src", response);
			//						} else {
			//								alert('Formato de imagen incorrecto.');
			//						}
			//				}
			//		});
			//		return false;
			//});
			
			
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
			};
	});
	
	
	if($("#Perfil_Usuario").val()=="3"){
		$("#font_compr_dat_per_ap_pat").show();
		$("#font_compr_dat_per_ap_mat").show();
		$("#font_compr_dat_per_nombres").show();
		$("#font_compr_dat_per_cargo").show();
		$("#font_compr_dat_per_email").show();
		$("#font_compr_dat_per_telef_directo").show();
		$("#font_compr_dat_per_celular").show();
		$("#font_compr_dat_per_areas").show();
		//$("#font_compr_dat_per_cont_asist").show();
		//$("#font_compr_dat_per_mail_alter").show();
		$("#font_compr_dat_per_foto").show();

		$("#font_compr_dat_emp_nomcomercial").show();
		$("#font_compr_dat_emp_ciudad").show();
		$("#font_compr_dat_emp_estado").show();
		$("#font_compr_dat_emp_calle").show();
		$("#font_compr_dat_emp_colonia").show();
		$("#font_compr_dat_emp_cp").show();
		$("#font_compr_dat_emp_pais").show();
		$("#font_compr_dat_emp_telef").show();
		$("#font_compr_dat_emp_pag_web").show();
		$("#font_compr_dat_emp_desc_empre").show();
		$("#font_compr_dat_emp_giro").show();
		$("#font_compr_dat_emp_logo_empr").show();
	}else{
		$("#font_compr_dat_per_ap_pat").show();
		$("#font_compr_dat_per_ap_mat").show();
		$("#font_compr_dat_per_nombres").show();
		$("#font_compr_dat_per_cargo").show();
		$("#font_compr_dat_per_email").show();
		//$("#font_compr_dat_per_telef_directo").show();
		//$("#font_compr_dat_per_celular").show();
		$("#font_compr_dat_per_areas").show();
		//$("#font_compr_dat_per_cont_asist").show();
		//$("#font_compr_dat_per_mail_alter").show();
		//$("#font_compr_dat_per_foto").show();

		$("#font_compr_dat_emp_nomcomercial").show();
		$("#font_compr_dat_emp_ciudad").show();
		$("#font_compr_dat_emp_estado").show();
		$("#font_compr_dat_emp_calle").show();
		$("#font_compr_dat_emp_colonia").show();
		$("#font_compr_dat_emp_cp").show();
		$("#font_compr_dat_emp_pais").show();
		$("#font_compr_dat_emp_telef").show();
		//$("#font_compr_dat_emp_pag_web").show();
		//$("#font_compr_dat_emp_desc_empre").show();
		//$("#font_compr_dat_emp_giro").show();
		//$("#font_compr_dat_emp_logo_empr").show();
	}

	function siguiente (){
		$("#home").removeClass("active");
		$("#li_dat_per").removeClass("active");
		
		$("#profile").addClass("active");
		$("#li_dat_empr").addClass("active");
	}
	
	
	
	
	
	
	
	limpiarcampos=function(){
		$("#compr_id").val("");
		$("#compr_dat_per_ap_pat").val("");
		$("#compr_dat_per_ap_mat").val("");
		$("#compr_dat_per_nombres").val("");
		$("#compr_dat_per_cargo").val("");
		$("#compr_dat_per_email").val("");
		$("#compr_dat_per_telef_directo").val("");
		$("#compr_dat_per_celular").val("");
		$("#compr_dat_per_cont_asist").val("");
		$("#compr_dat_per_mail_alter").val("");
		$("#compr_dat_per_foto").val("");
		$("#compr_dat_per_area_otro").val("");
		$("#compr_dat_emp_nomcomercial").val("");
		$("#compr_dat_emp_ciudad").val("");
		$("#compr_dat_emp_estado").val("");
		$("#compr_dat_emp_calle").val("");
		$("#compr_dat_emp_colonia").val("");
		$("#compr_dat_emp_cp").val("");
		$("#compr_dat_emp_pais").val("");
		$("#compr_dat_emp_telef").val("");
		$("#compr_dat_emp_pag_web").val("");
		$("#compr_dat_emp_desc_empre").val("");
		$("#compr_dat_emp_giro").val("");
		$("#compr_dat_emp_logo_empr").val("");
		$("#guardar").html("Guardar");
		
		document.getElementById("subir_imagen_logo").value = "";
		$("#ver_imagen_1").hide();
		$("#logo_img").html('');
		
		document.getElementById("subir_imagen_foto").value = "";
		$("#ver_imagen_2").hide();
		$("#foto_img").html('');
		
		$("#check_1").prop("checked", false);
		$("#check_2").prop("checked", false);
		$("#check_3").prop("checked", false);
		$("#check_4").prop("checked", false);
		$("#check_5").prop("checked", false);
		$("#check_6").prop("checked", false);
		$("#check_7").prop("checked", false);
		$("#check_8").prop("checked", false);
		$("#check_9").prop("checked", false);
		$("#check_10").prop("checked", false);
		$("#check_11").prop("checked", false);
		$("#check_12").prop("checked", false);
		
	}
	
	$("#guardar").click(function () {	
		var Agregar = true;
		var mensaje_error = "";
		var compr_id=$("#compr_id").val();
		var compr_dat_per_ap_pat=$.trim($("#compr_dat_per_ap_pat").val());
		var compr_dat_per_ap_mat=$.trim($("#compr_dat_per_ap_mat").val());
		var compr_dat_per_nombres=$.trim($("#compr_dat_per_nombres").val());
		var compr_dat_per_cargo=$.trim($("#compr_dat_per_cargo").val());
		var compr_dat_per_email=$.trim($("#compr_dat_per_email").val());
		var compr_dat_per_telef_directo=$.trim($("#compr_dat_per_telef_directo").val());
		var compr_dat_per_celular=$.trim($("#compr_dat_per_celular").val());
		var compr_dat_per_cont_asist=$.trim($("#compr_dat_per_cont_asist").val());
		var compr_dat_per_mail_alter=$.trim($("#compr_dat_per_mail_alter").val());
		var compr_dat_per_foto=$.trim($("#compr_dat_per_foto").val());
		var compr_dat_per_area_otro=$.trim($("#compr_dat_per_area_otro").val());
		var compr_dat_emp_nomcomercial=$.trim($("#compr_dat_emp_nomcomercial").val());
		var compr_dat_emp_ciudad=$.trim($("#compr_dat_emp_ciudad").val());
		var compr_dat_emp_estado=$.trim($("#compr_dat_emp_estado").val());
		var compr_dat_emp_calle=$.trim($("#compr_dat_emp_calle").val());
		var compr_dat_emp_colonia=$.trim($("#compr_dat_emp_colonia").val());
		var compr_dat_emp_cp=$.trim($("#compr_dat_emp_cp").val());
		var compr_dat_emp_pais=$.trim($("#compr_dat_emp_pais").val());
		var compr_dat_emp_telef=$.trim($("#compr_dat_emp_telef").val());
		var compr_dat_emp_pag_web=$.trim($("#compr_dat_emp_pag_web").val());
		var compr_dat_emp_desc_empre=$.trim($("#compr_dat_emp_desc_empre").val());
		var compr_dat_emp_giro=$.trim($("#compr_dat_emp_giro").val());
		var compr_dat_emp_logo_empr=$.trim($("#compr_dat_emp_logo_empr").val());
		
		var Usuario_Sistema=$("#Usuario_Sistema").val();
		
		var strDatos=""; 
		
		
		if($("#Perfil_Usuario").val()=="3"){
			if (compr_dat_per_ap_pat.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Apellido Paterno \n";}
			if (compr_dat_per_ap_mat.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Apellido Materno \n";}
			if (compr_dat_per_nombres.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Nombre \n";}
			if (compr_dat_per_cargo.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Cargo \n";}
			if (compr_dat_per_email.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Mail \n";}
			if (compr_dat_per_telef_directo.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Telefono directo \n";}
			if (compr_dat_per_celular.length <= 0) {Agregar = false; mensaje_error += " -Agrega el número de celular \n";}
			//if (compr_dat_per_cont_asist.length <= 0) {Agregar = false; mensaje_error += " -Agrega el contacto Asistente \n";}
			//if (compr_dat_per_mail_alter.length <= 0) {Agregar = false; mensaje_error += " -Agrega Mail Alternativo \n";}
			if (compr_dat_per_foto.length <= 0) {Agregar = false; mensaje_error += " -Agrega la foto \n";}
			
			if (compr_dat_emp_nomcomercial.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Nombre Comercial \n";}
			if (compr_dat_emp_ciudad.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Ciudad \n";}
			if (compr_dat_emp_estado.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Estado \n";}
			if (compr_dat_emp_calle.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Calle \n";}
			if (compr_dat_emp_colonia.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Colonia \n";}
			if (compr_dat_emp_cp.length <= 0) {Agregar = false; mensaje_error += " -Agrega el CP \n";}
			if (compr_dat_emp_pais.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Pais \n";}
			if (compr_dat_emp_telef.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Teléfono \n";}
			if (compr_dat_emp_pag_web.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Página Web \n";}
			if (compr_dat_emp_desc_empre.length <= 0) {Agregar = false; mensaje_error += " -Agrega la descripción de la Empresa \n";}
			if (compr_dat_emp_giro.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Giro de la Empresa \n";}
			if (compr_dat_emp_logo_empr.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Logo de la Empresa \n";}
			
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
				mensaje_error += " -Debes Seleccionar almenos 1 Área \n";
			}
		}else{
			if (compr_dat_per_ap_pat.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Apellido Paterno \n";}
			if (compr_dat_per_ap_mat.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Apellido Materno \n";}
			if (compr_dat_per_nombres.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Nombre \n";}
			if (compr_dat_per_cargo.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Cargo \n";}
			if (compr_dat_per_email.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Mail \n";}
			//if (compr_dat_per_telef_directo.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Telefono directo \n";}
			//if (compr_dat_per_celular.length <= 0) {Agregar = false; mensaje_error += " -Agrega el número de celular \n";}
			//if (compr_dat_per_cont_asist.length <= 0) {Agregar = false; mensaje_error += " -Agrega el contacto Asistente \n";}
			//if (compr_dat_per_mail_alter.length <= 0) {Agregar = false; mensaje_error += " -Agrega Mail Alternativo \n";}
			//if (compr_dat_per_foto.length <= 0) {Agregar = false; mensaje_error += " -Agrega la foto \n";}
			
			if (compr_dat_emp_nomcomercial.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Nombre Comercial \n";}
			if (compr_dat_emp_ciudad.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Ciudad \n";}
			if (compr_dat_emp_estado.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Estado \n";}
			if (compr_dat_emp_calle.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Calle \n";}
			if (compr_dat_emp_colonia.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Colonia \n";}
			if (compr_dat_emp_cp.length <= 0) {Agregar = false; mensaje_error += " -Agrega el CP \n";}
			if (compr_dat_emp_pais.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Pais \n";}
			if (compr_dat_emp_telef.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Teléfono \n";}
			//if (compr_dat_emp_pag_web.length <= 0) {Agregar = false; mensaje_error += " -Agrega la Página Web \n";}
			//if (compr_dat_emp_desc_empre.length <= 0) {Agregar = false; mensaje_error += " -Agrega la descripción de la Empresa \n";}
			//if (compr_dat_emp_giro.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Giro de la Empresa \n";}
			//if (compr_dat_emp_logo_empr.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Logo de la Empresa \n";}
			
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
				mensaje_error += " -Debes Seleccionar almenos 1 Área \n";
			}
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
			strDatos = "compr_dat_per_ap_pat="+compr_dat_per_ap_pat;
			strDatos += "&compr_dat_per_ap_mat="+compr_dat_per_ap_mat;
			strDatos += "&compr_dat_per_nombres="+compr_dat_per_nombres;
			strDatos += "&compr_dat_per_cargo="+compr_dat_per_cargo;
			strDatos += "&compr_dat_per_email="+compr_dat_per_email;
			strDatos += "&compr_dat_per_telef_directo="+compr_dat_per_telef_directo;
			strDatos += "&compr_dat_per_celular="+compr_dat_per_celular;
			strDatos += "&compr_dat_per_cont_asist="+compr_dat_per_cont_asist;
			strDatos += "&compr_dat_per_mail_alter="+compr_dat_per_mail_alter;
			strDatos += "&compr_dat_per_foto="+compr_dat_per_foto;
			strDatos += "&compr_dat_per_area="+valor;
			strDatos += "&compr_dat_per_area_otro="+compr_dat_per_area_otro;
			strDatos += "&compr_dat_emp_nomcomercial="+compr_dat_emp_nomcomercial;
			strDatos += "&compr_dat_emp_ciudad="+compr_dat_emp_ciudad;
			strDatos += "&compr_dat_emp_estado="+compr_dat_emp_estado;
			strDatos += "&compr_dat_emp_calle="+compr_dat_emp_calle;
			strDatos += "&compr_dat_emp_colonia="+compr_dat_emp_colonia;
			strDatos += "&compr_dat_emp_cp="+compr_dat_emp_cp;
			strDatos += "&compr_dat_emp_pais="+compr_dat_emp_pais;
			strDatos += "&compr_dat_emp_telef="+compr_dat_emp_telef;
			strDatos += "&compr_dat_emp_pag_web="+compr_dat_emp_pag_web;
			strDatos += "&compr_dat_emp_desc_empre="+compr_dat_emp_desc_empre;
			strDatos += "&compr_dat_emp_giro="+compr_dat_emp_giro;
			strDatos += "&compr_dat_emp_logo_empr="+compr_dat_emp_logo_empr;
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
	
	tabla_compradores();
	function tabla_compradores(){
		var tabla="";
		tabla+="	<table class='table table-bordered' id='dataTable'>";
		tabla+="		<thead>";
		tabla+="			<tr>";
		tabla+="				<th>Opciones</th>";
		tabla+="				<th>Apellido Paterno</th>";
		tabla+="				<th>Apellido Materno</th>";
		tabla+="				<th>Nombre</th>";
		tabla+="				<th>Cargo</th>";
		tabla+="				<th>Email</th>";
		tabla+="				<th>Nombre Comercial</th>";
		tabla+="				<th>Ciudad</th>";
		tabla+="				<th>Estado</th>";
		tabla+="				<th>CP</th>";
		tabla+="				<th>Pais</th>";
		tabla+="				<th>Teléfono</th>";
		tabla+="			</tr>";
		tabla+="		</thead>";
		var resultado=new Array();
		data={accion: "consultar_comprador"};
		resultado=cargo_cmb("consultas/consultas_admin_compradores.php",false, data);
		if(resultado.totalCount>0){
		tabla+="		<tbody>";
			for(var i = 0; i < resultado.totalCount; i++){
				tabla+="			<tr>";
				
				tabla+='				<td align="center">';
				tabla+='					<div class="">';
				tabla+='						<a onclick="pasarvalores('+resultado.data[i].compr_id+')" class="green" href="#noir"><i class="ace-icon fa fa-pencil bigger-130" title="Editar"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;';
				tabla+='						<a onclick="eliminar('+resultado.data[i].compr_id+')" class="red" title="Eliminar" href="#noir"><i class="ace-icon fa fa-trash-o bigger-130" title="Eliminar"></i></a>';
				tabla+='					</div>';
				tabla+='				</td>';
				tabla+="				<td>"+resultado.data[i].compr_dat_per_ap_pat+"</td>";	
				tabla+="				<td>"+resultado.data[i].compr_dat_per_ap_mat+"</td>";
				tabla+="				<td>"+resultado.data[i].compr_dat_per_nombres+"</td>";
				tabla+="				<td>"+resultado.data[i].compr_dat_per_cargo+"</td>";
				tabla+="				<td>"+resultado.data[i].compr_dat_per_email+"</td>";
				tabla+="				<td>"+resultado.data[i].compr_dat_emp_nomcomercial+"</td>";
				tabla+="				<td>"+resultado.data[i].compr_dat_emp_ciudad+"</td>";
				tabla+="				<td>"+resultado.data[i].compr_dat_emp_estado+"</td>";
				tabla+="				<td>"+resultado.data[i].compr_dat_emp_cp+"</td>";
				tabla+="				<td>"+resultado.data[i].compr_dat_emp_pais+"</td>";
				tabla+="				<td>"+resultado.data[i].compr_dat_emp_telef+"</td>";
				tabla+="			</tr>";
				
			}
		tabla+="		</tbody>";	
		}else{
			
		}
		tabla+="	</table>";
	
		
		
		$("#tabla_compradores").html(tabla);
		$('#dataTable').DataTable({
			//"dom": 'Bfrtip',
			//"buttons": [
			//	'copy', 'csv', 'excel'//, 'pdf', 'print'
			//],
			"processing": true,
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": true,
			"language": {
				"lengthMenu": "Mostrando _MENU_ registros por p&aacute;gina",
				"zeroRecords": "Sin Resultados",
				"info": "Monstrando p&aacute;gina _PAGE_ de _PAGES_ , total de registros: _MAX_",
				"infoEmpty": "Sin Resultados",
				"infoFiltered": "(Monstrando  _MAX_ del total de registros)",
				"search": "Busqueda: ",
				"paginate": {
					"first": "Primera",
					"last": "Ultima",
					"next": "Siguiente",
					"previous": "Anterior"
				}
			}
		});
	}
	
	pasarvalores=function(id) {
		limpiarcampos();
		if (id != "") {
			$("#guardar").html("Editar");
			$.ajax({
				type: "POST",
				url: "consultas/consultas_admin_compradores.php", 
				async: false,
				data: {
					compr_id: id,
					accion: "consultar_comprador"
				},
				dataType: "html",
				beforeSend: function (xhr) {

				},
				success: function (data) {
					data = eval("(" + data + ")");
					if (data.totalCount > 0) {			
						$('html,body').animate({
				scrollTop: $(".main-content").offset().top
			}, 100);
						var foto="";
						$("#compr_id").val(data.data[0].compr_id);
						$("#compr_dat_per_ap_pat").val(data.data[0].compr_dat_per_ap_pat);
						$("#compr_dat_per_ap_mat").val(data.data[0].compr_dat_per_ap_mat);
						$("#compr_dat_per_nombres").val(data.data[0].compr_dat_per_nombres);
						$("#compr_dat_per_cargo").val(data.data[0].compr_dat_per_cargo);
						$("#compr_dat_per_email").val(data.data[0].compr_dat_per_email);
						$("#compr_dat_per_telef_directo").val(data.data[0].compr_dat_per_telef_directo);
						$("#compr_dat_per_celular").val(data.data[0].compr_dat_per_celular);
						$("#compr_dat_per_cont_asist").val(data.data[0].compr_dat_per_cont_asist);
						$("#compr_dat_per_mail_alter").val(data.data[0].compr_dat_per_mail_alter);
						$("#compr_dat_per_foto").val(data.data[0].compr_dat_per_foto);
						$("#compr_dat_per_area_otro").val(data.data[0].compr_dat_per_area_otro);
						$("#compr_dat_emp_nomcomercial").val(data.data[0].compr_dat_emp_nomcomercial);
						$("#compr_dat_emp_ciudad").val(data.data[0].compr_dat_emp_ciudad);
						$("#compr_dat_emp_estado").val(data.data[0].compr_dat_emp_estado);
						$("#compr_dat_emp_calle").val(data.data[0].compr_dat_emp_calle);
						$("#compr_dat_emp_colonia").val(data.data[0].compr_dat_emp_colonia);
						$("#compr_dat_emp_cp").val(data.data[0].compr_dat_emp_cp);
						$("#compr_dat_emp_pais").val(data.data[0].compr_dat_emp_pais);
						$("#compr_dat_emp_telef").val(data.data[0].compr_dat_emp_telef);
						$("#compr_dat_emp_pag_web").val(data.data[0].compr_dat_emp_pag_web);
						$("#compr_dat_emp_desc_empre").val(data.data[0].compr_dat_emp_desc_empre);
						$("#compr_dat_emp_giro").val(data.data[0].compr_dat_emp_giro);
						$("#compr_dat_emp_logo_empr").val(data.data[0].compr_dat_emp_logo_empr);
						
						if(data.data[0].compr_dat_emp_logo_empr!=""){
							$("#ver_imagen_1").show();
							$("#logo_img").html('<img src="data:image/jpeg;base64,'+data.data[0].compr_dat_emp_logo_empr+'" style="width: 50%;height: 50%">');
						}
						
						if(data.data[0].compr_dat_per_foto!=""){
							$("#ver_imagen_2").show();
							$("#foto_img").html('<img src="data:image/jpeg;base64,'+data.data[0].compr_dat_per_foto+'" style="width: 50%;height: 50%">');
						}
						
						if(data.data[0].compr_dat_per_area!=""){
							var valor = data.data[0].compr_dat_per_area.split(",");
							for(var i=0; i<valor.length; i++){
								$("#check_"+valor[i]).prop("checked", true);
							}
							
						}
					}
				},
				error: function () {
					alert("Ocurrio un error al consultar.");
				}
			});
		}
	}
	
	eliminar=function(compr_id){
		if(compr_id!=""){
			var strDatos="";
			var Usuario_Sistema=$("#Usuario_Sistema").val();
			strDatos = "compr_id="+compr_id;
			strDatos += "&compr_modifico="+Usuario_Sistema;
			strDatos += "&compr_estatus=E";				
			strDatos += "&accion=eliminar_comprador";
			

			var bool=confirm("Esta seguro de eliminar el Registro.");
			if(bool){
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
							alert("Eliminado Correctamente.");	
							tabla_compradores();
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
	
	
var input = document.querySelector('input[id=subir_imagen_logo]');
input.onchange = function () {
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
};



</script>

