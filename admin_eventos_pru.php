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

							<li class="active">Admin Eventos</li>
						</ul><!-- /.breadcrumb -->

						
					</div>

					<div class="page-content">

						
						<div class="row">
							<div class="col-xs-12 col-sm-12">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form">
									<div class="hr hr-24"></div>

									<div class="row">
										<div class="col-xs-12 col-sm-12">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Admin Eventos</h4>
												</div>

												<div class="widget-body">
													<div class="widget-main">
														<div class="row">
															<div class="col-xs-12 col-sm-12">
																<div class="row">
																	<div class="col-xs-12">
																		<!-- PAGE CONTENT BEGINS -->
																		<form class="form-horizontal" role="form">
																			<div class="col-md-2">
																				<div class="form-group" id="Carrusel_Fotos">	
																					
																				</div>
																				<div class="form-group" id="divFoto">
																	
																				</div>
																				
																			</div>
																		
																			<!-- #section:elements.form -->
																			<div class="form-group">
																				<input type="hidden" id="evento_id"  class="col-xs-10 col-sm-8">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red">*</font></span>Nombre del Evento:</label>
																				<div class="col-sm-9">
																					<input type="text" id="evento_nombre"  class="col-xs-10 col-sm-8">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red">*</font></span>Logo:</label>
																				<div class="col-sm-9">
																					<input type="text" id="evento_logo"  class="col-xs-10 col-sm-8">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red">*</font></span>Descripción:</label>
																				<div class="col-sm-9">
																					<textarea type="text" id="evento_desc" class="col-xs-10 col-sm-8"></textarea>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red">*</font></span>Sede (hotel):</label>
																				<div class="col-sm-9">
																					<input type="text" id="evento_sede_hotel"  class="col-xs-10 col-sm-12" placeholder="Proporcionar todos los valores posibles"> 
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red">*</font></span>Ciudad:</label>
																				<div class="col-sm-9">
																					<input type="text" id="evento_ciudad"  class="col-xs-10 col-sm-8">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red">*</font></span>Fecha Inicial:</label>
																				<div class="col-sm-9">
																					<input type="text" id="evento_fech_i" placeholder="dd/mm/aaaa" name="start" class="col-xs-10 col-sm-4" autocomplete="off" onKeyUp="this.value=formateafecha(this.value)">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red">*</font></span>Fecha Final:</label>
																				<div class="col-sm-9">
																					<input type="text" id="evento_fech_f" placeholder="dd/mm/aaaa" name="start" class="col-xs-10 col-sm-4" autocomplete="off" onKeyUp="this.value=formateafecha(this.value)">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red">*</font></span>Página Web:</label>
																				<div class="col-sm-9">
																					<input type="text" id="evento_pag_web"  class="col-xs-10 col-sm-4">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Contactos:</label>
																				<div class="col-sm-9">
																					<input type="text" id="evento_contactos"  class="col-xs-10 col-sm-12" placeholder="(ventas, reclutamiento, administración y dirección 0 nombre, teléfono e email)">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red">*</font></span>Razón Social del Organizador:</label>
																				<div class="col-sm-9">
																					<input type="text" id="evento_raz_social_org"  class="col-xs-10 col-sm-12">
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
											</div><!-- /.span -->
											<div class="col-lg-12">
												<div class="main-card mb-3 card">
													<div class="card-body card-body table-responsive" id="tabla_eventos">
														
													</div>
												</div>
												
												
											</div>
										</div><!-- /.row -->
									</div>
									
								</form>

							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

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
		
		<!--[if lte IE 8]>
		  <script src="../assets/js/excanvas.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.js"></script>
		<script src="assets/js/chosen.jquery.js"></script>
		<script src="assets/js/fuelux/fuelux.spinner.js"></script>
		
		
		<script src="assets/js/jquery.knob.js"></script>
		<script src="assets/js/jquery.autosize.js"></script>
		<script src="assets/js/jquery.inputlimiter.1.3.1.js"></script>
		<script src="assets/js/jquery.maskedinput.js"></script>
		<script src="assets/js/bootstrap-tag.js"></script>
		<link rel="stylesheet" href="assets/librerias_calendario/ui-1.11.2/jquery-ui.css">
		<script src="assets/librerias_calendario/ui-1.11.2/jquery-ui.js"></script>
		<!-- File Input -->
		<script src="assets/fileinput/fileinput.js"></script>
		<script src="assets/fileinput/fileinput_locale_es.js"></script>
<script type="text/javascript">

	$(function() {
		$( "#evento_fech_i" ).datepicker({
		  defaultDate: "+0d",
		  changeMonth: true,
		  changeYear: true,
		  numberOfMonths: 1,
		  dateFormat: 'dd/mm/yy',
		  onClose: function( selectedDate ) {
				$("#evento_fech_f").datepicker( "option", "minDate", selectedDate );
		  }
		});

		$("#evento_fech_f").datepicker({
		  defaultDate: "+0d",
		  changeMonth: true,
		  changeYear: true,
		  numberOfMonths: 1,
		  dateFormat: 'dd/mm/yy',
		  onClose: function( selectedDate ) {
				$("#v").datepicker( "option", "maxDate", selectedDate );
		  }
		});
	});

	$("#guardar").click(function () {		
		var Agregar = true;
		var mensaje_error = "";
		var evento_id=$("#evento_id").val();
		var evento_nombre=$.trim($("#evento_nombre").val());
		var evento_logo=$.trim($("#evento_logo").val());
		var evento_desc=$.trim($("#evento_desc").val());
		var evento_sede_hotel=$.trim($("#evento_sede_hotel").val());
		var evento_ciudad=$.trim($("#evento_ciudad").val());
		var evento_fech_i=$.trim($("#evento_fech_i").val());
		var evento_fech_f=$.trim($("#evento_fech_f").val());
		var evento_pag_web=$.trim($("#evento_pag_web").val());
		var evento_contactos=$.trim($("#evento_contactos").val());
		var evento_raz_social_org=$.trim($("#evento_raz_social_org").val());
		
		var Usuario_Sistema=$("#Usuario_Sistema").val();
		
		var strDatos=""; 
		
		
		
		if (evento_nombre.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Nombre del evento \n";}
		if (evento_logo.length <= 0) {Agregar = false; mensaje_error += " -Agrega el logo \n";}
		if (evento_desc.length <= 0) {Agregar = false; mensaje_error += " -Agrega la descripción \n";}
		if (evento_sede_hotel.length <= 0) {Agregar = false; mensaje_error += " -Agrega la sede \n";}
		if (evento_ciudad.length <= 0) {Agregar = false; mensaje_error += " -Agrega la ciudad \n";}
		if (evento_fech_i.length <= 0) {Agregar = false; mensaje_error += " -Agrega la fecha inicial \n";}
		if (evento_fech_f.length <= 0) {Agregar = false; mensaje_error += " -Agrega la fecha final \n";}
		if (evento_pag_web.length <= 0) {Agregar = false; mensaje_error += " -Agrega la página web del evento \n";}
		//if (evento_contactos.length <= 0) {Agregar = false; mensaje_error += " -Agrega los contactos \n";}
		if (evento_raz_social_org.length <= 0) {Agregar = false; mensaje_error += " -Agrega la razón social \n";}
		
		
		
		if (!Agregar) {
			alert(mensaje_error);			
		}
		
		if(Agregar)
		{
			strDatos = "evento_nombre="+evento_nombre;
			strDatos += "&evento_logo="+evento_logo;
			strDatos += "&evento_desc="+evento_desc;
			strDatos += "&evento_sede_hotel="+evento_sede_hotel;
			strDatos += "&evento_ciudad="+evento_ciudad;
			strDatos += "&evento_fech_i="+evento_fech_i;
			strDatos += "&evento_fech_f="+evento_fech_f;
			strDatos += "&evento_pag_web="+evento_pag_web;
			strDatos += "&evento_contactos="+evento_contactos;
			strDatos += "&evento_raz_social_org="+evento_raz_social_org;
			if(evento_id.length <= 0)
			{
				strDatos += "&evento_modifico="+Usuario_Sistema;
				strDatos += "&evento_estatus=A";					
				strDatos += "&accion=guardar_evento";
			}
			else
			{
				strDatos += "&evento_id="+evento_id;
				strDatos += "&evento_modifico="+Usuario_Sistema;
				strDatos += "&evento_estatus=M";				
				strDatos += "&accion=editar_evento";
			}
			
			$.ajax({
				type: "POST",
				url: "consultas/consultas_admin_eventos.php",        
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
						tabla_eventos();
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
	
	limpiarcampos=function(){
		$("#evento_id").val("");
		$("#evento_nombre").val("");
		$("#evento_logo").val("");
		$("#evento_desc").val("");
		$("#evento_sede_hotel").val("");
		$("#evento_ciudad").val("");
		$("#evento_fech_i").val("");
		$("#evento_fech_f").val("");
		$("#evento_pag_web").val("");
		$("#evento_contactos").val("");
		$("#evento_raz_social_org").val("");
		$("#guardar").html("Guardar");
		
	}

	tabla_eventos();
	function tabla_eventos(){
		var tabla="";
		tabla+="	<table class='table table-bordered' id='dataTable'>";
		tabla+="		<thead>";
		tabla+="			<tr>";
		tabla+="				<th>Opciones</th>";
		tabla+="				<th>Nombre Evento</th>";
		tabla+="				<th>Descripción</th>";
		tabla+="				<th>Sede</th>";
		tabla+="				<th>Ciudad</th>";
		tabla+="				<th>Fech I</th>";
		tabla+="				<th>Fech F</th>";
		tabla+="				<th>Página Web</th>";
		tabla+="			</tr>";
		tabla+="		</thead>";
		var resultado=new Array();
		data={accion: "consultar_eventos"};
		resultado=cargo_cmb("consultas/consultas_admin_eventos.php",false, data);
		if(resultado.totalCount>0){
		tabla+="		<tbody>";
			for(var i = 0; i < resultado.totalCount; i++){
				tabla+="			<tr>";
				
				tabla+='				<td align="center">';
				tabla+='					<div class="">';
				tabla+='						<a onclick="pasarvalores('+resultado.data[i].evento_id+')" class="green" href="#noir"><i class="ace-icon fa fa-pencil bigger-130" title="Editar"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;';
				tabla+='						<a onclick="eliminar('+resultado.data[i].evento_id+')" class="red" title="Eliminar" href="#noir"><i class="ace-icon fa fa-trash-o bigger-130" title="Eliminar"></i></a>';
				tabla+='					</div>';
				tabla+='				</td>';
				tabla+="				<td>"+resultado.data[i].evento_nombre+"</td>";	
				tabla+="				<td>"+resultado.data[i].evento_desc+"</td>";
				tabla+="				<td>"+resultado.data[i].evento_sede_hotel+"</td>";
				tabla+="				<td>"+resultado.data[i].evento_ciudad+"</td>";
				tabla+="				<td>"+resultado.data[i].FI+"</td>";
				tabla+="				<td>"+resultado.data[i].FF+"</td>";
				tabla+="				<td>"+resultado.data[i].evento_pag_web+"</td>";
				tabla+="			</tr>";
				
			}
		tabla+="		</tbody>";	
		}else{
			
		}
		tabla+="	</table>";
	
		
		
		$("#tabla_eventos").html(tabla);
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
				url: "consultas/consultas_admin_eventos.php", 
				async: false,
				data: {
					evento_id: id,
					accion: "consultar_eventos"
				},
				dataType: "html",
				beforeSend: function (xhr) {

				},
				success: function (data) {
					data = eval("(" + data + ")");
					if (data.totalCount > 0) {			
						var foto="";
						$("#evento_id").val(data.data[0].evento_id);
						$("#evento_nombre").val(data.data[0].evento_nombre);
						$("#evento_logo").val(data.data[0].evento_logo);
						$("#evento_desc").val(data.data[0].evento_desc);
						$("#evento_sede_hotel").val(data.data[0].evento_sede_hotel);
						$("#evento_ciudad").val(data.data[0].evento_ciudad);
						$("#evento_fech_i").val(data.data[0].FI);
						$("#evento_fech_f").val(data.data[0].FF);
						$("#evento_pag_web").val(data.data[0].evento_pag_web);
						$("#evento_contactos").val(data.data[0].evento_contactos);
						$("#evento_raz_social_org").val(data.data[0].evento_raz_social_org);
					}
				},
				error: function () {
					alert("Ocurrio un error al consultar.");
				}
			});
		}
	}
	
	eliminar=function(evento_id){
		if(evento_id!=""){
			var strDatos="";
			var Usuario_Sistema=$("#Usuario_Sistema").val();
			strDatos = "evento_id="+evento_id;
			strDatos += "&evento_modifico="+Usuario_Sistema;
			strDatos += "&evento_estatus=E";				
			strDatos += "&accion=eliminar_evento";
			

			var bool=confirm("Esta seguro de eliminar el Registro.");
			if(bool){
				$.ajax({
					type: "POST",
					url: "consultas/consultas_admin_eventos.php",        
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
							tabla_eventos();
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

	Img_Activo();
	function Img_Activo(){
		var Adjuntos="";
		Adjuntos='<label for="attach-1" class="control-label" id="documentos_adjuntos_FILELabel" style="font-size: 11px;">Imagen (240x160px)</label>';			  
        Adjuntos+='<input id="documentos_adjuntos_FILE" name="imagenes[]" type="file" multiple="multiple" class="file-loading">';
		Adjuntos+='<input type="hidden" id="Url_Foto_Activo">';
		
		$("#divFoto").html(Adjuntos);
		$("#divFoto_lista").html("");
		carga_arch_multiples("documentos_adjuntos_FILE", "divFoto", "divFoto_lista","Url_Foto_Activo","Archivos/Admin-Eventos",false,true,"", "Imagen (240x160px)");
  }
	
	//Funciones Para  Cargar Multiples archivos
function carga_arch_multiples(name_upload, div_control, div_lista, url_hidden, url_upload, vista_imagen, Show_upload, tipo_archivo, nombre_label){
	
	var array_extension= [];
	if(tipo_archivo==""){
		array_extension=["jpg", "png", "bmp", "gif", "pdf", "docx", "doc", "xls", "xlsx", "ppt","pptx" ];
	}else{
		array_extension=[tipo_archivo];
	}
	var Todos="";
	//inicializar el file upload
	$('#'+name_upload).fileinput({
		uploadUrl: "Archivos/upload.php?carpeta="+url_upload+"",
		uploadAsync: true,
		showUpload: Show_upload,
		showRemove: false,
		showZoom: false,
		showPreview: vista_imagen,
		previewFileType: "text",
		minFileCount: 1,
		maxFileCount: 1,
		allowedFileExtensions: array_extension,
		browseClass: "btn chs",
		//validateInitialCount: true,
		language: 'es',
		initialPreviewAsData: true, // defaults markup
		initialPreviewFileType: 'image' // image is the default and can be overridden in config below
	});
	//Cargar Archivo
	$('#'+name_upload).on('fileuploaded', function (event, data, previewId, index) {
		
		var arch=$('#'+url_hidden).val();
		
		var form = data.form, files = data.files, extra = data.extra,
		response = data.response, reader = data.reader;
		if(arch.length>0){
			Todos="si";
			arch=arch+"---"+response.initialPreviewConfig[0].caption;
			$('#'+url_hidden).val(arch);
			//Muestra en un div el listado de los archivos Adjuntos
			mostrar_archivos_lista(arch, div_lista, url_upload, Todos, url_hidden,"");

			
		}else{
			Todos="no";
			$('#'+url_hidden).val(response.initialPreviewConfig[0].caption);
			mostrar_archivos_lista(response.initialPreviewConfig[0].caption, div_lista, url_upload, Todos, url_hidden,"");
		
		}
		
		//Limpia Control Multiple
		var valor_hidden="";
		var valor_hidden=$("#"+url_hidden).val();
		
		var Adjuntos="";
		Adjuntos='<label for="attach-1" class="control-label"  style="font-size: 11px;">'+nombre_label+'</label>';			  
		Adjuntos+='<input id="'+name_upload+'" name="imagenes[]" type="file" multiple="multiple" class="file-loading">';
		Adjuntos+='<input type="hidden" id="'+url_hidden+'" value="'+valor_hidden+'">';
			
		$("#"+div_control).html(Adjuntos);
		carga_arch_multiples(name_upload, div_control, div_lista, url_hidden, url_upload, vista_imagen, Show_upload, tipo_archivo, nombre_label);
		///////////////////////////////////////////
		
		
		var Pre=previewId.split("-");
		
		//Al subir un archivo en automatico se borra su contenedor
		$("#"+Pre[0]+"-"+Pre[1]+"-init_"+Pre[2]).remove();
		$("#"+Pre[0]+"-"+Pre[1]+"-"+Pre[2]).remove();
		$(".form-control file-caption").html("");
		
	});
	
	
    $('#'+name_upload).on("filepredelete", function(event, data, previewId, index) {
		var abort = true;
		if (confirm("Esta Seguro de eliminar el archivo")) {
			
			var valor=$('#'+url_hidden).val();
			if(valor.length>0){
				//Partimoa nustra cadena 
				var arreglo = valor.split("---");
				//Recorremos la cadena convertida en array
				
				var resultado_cadena="";
				for(var i=0; i<arreglo.length;i++){
					if(arreglo.length>1){
						if(arreglo[i]!=data){
							resultado_cadena=arreglo[i]+"---"+resultado_cadena;
						}
					}else{
						$('#'+url_hidden).val("");
						$('#'+div_lista).html("");
					}
				}
				
				if(resultado_cadena!=""){
					resultado_cadena=resultado_cadena.substring(0, resultado_cadena.length-3)
					$('#'+url_hidden).val(resultado_cadena);
					//Muestra en un div el listado de los archivos Adjuntos
					//mostrar_archivos_lista(resultado_cadena, div_lista, url_upload, "si", url_hidden);
				}
			}else{
				$('#'+url_hidden).val("");
				$('#'+div_lista).html("");
			}
			abort = false;
		
			if($('#'+url_hidden).val()!=""){
				var encontrado = $('#'+url_hidden).val().indexOf("---");
				if(encontrado!=-1){
					mostrar_archivos_lista($('#'+url_hidden).val(), div_lista, url_upload, "si", url_hidden,"");
				}else{
					mostrar_archivos_lista($('#'+url_hidden).val(), div_lista, url_upload, "no", url_hidden,"");
				}
			}else{
				$('#'+div_lista).html("");
			}
		}
		return abort;
	});
	
}
</script>

