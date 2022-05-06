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

							<li class="active">Dias Festivos</li>
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
													<h4 class="widget-title">Admin Dias Festivos</h4>
												</div>

												<div class="widget-body">
													<div class="widget-main">
														<div class="row">
															<input type="hidden" id="dia_fest_id">
															<div class="col-xs-12 col-sm-6">
																<label for="form-field-8">Descripción:</label>
																<input type="text" placeholder="Descripción" id="dia_fest_desc" maxlength="500" class="form-control">
															</div>
															<div class="col-xs-12 col-sm-6">
																<label for="form-field-8">Fecha:</label>
																<input type="text" placeholder="dd/mm/aaaa" id="dia_fest_fecha" maxlength="25" class="form-control"  autocomplete="off" onKeyUp="this.value=formateafecha(this.value)">
															</div>
															
														</div>
														<div class="center">
															<br>
															<button type="button" class="btn btn-primary" id="guardar">Guardar</button>
															<button type="button" class="btn btn-danger" id="cancelar" onclick="limpiarcampos()">Cancelar</button>
														</div>
														
													</div>
												</div>
											</div><!-- /.span -->
											
											<div class="col-xs-12 col-sm-4 center"></div>
											<div class="col-xs-12 col-sm-3 center">
												<br>
												<label for="form-field-8">Año:</label>
												<select class="form-control" id="cmb_anios">
												</select>
												<br>
											</div>
											<div class="col-xs-12 col-sm-4"></div>
											<div class="col-lg-12">
												<div class="main-card mb-3 card">
													<div class="card-body card-body table-responsive" id="tabla_dias_festivos">
														
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
		$( "#dia_fest_fecha" ).datepicker({
		  defaultDate: "+0d",
		  changeMonth: true,
		  changeYear: true,
		  numberOfMonths: 1,
		  dateFormat: 'dd/mm/yy',
		  onClose: function( selectedDate ) {
				//$("#evento_fech_f").datepicker( "option", "minDate", selectedDate );
		  }
		});
	});
	
	

	
	
	cmb_anios();
	function cmb_anios() {
		var resultado=new Array();
		data={accion: "cmb_anios"};
		resultado=cargo_cmb("consultas/consultas_admin_dias_festivos.php",false, data);
		if(resultado.totalCount>0){
			for(var i = 0; i < resultado.totalCount; i++){
				$('#cmb_anios').append($('<option>', { value: resultado.data[i].dia_fest_fecha }).text(resultado.data[i].dia_fest_fecha));
			}
		}else{
			$('#cmb_anios').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	$("#cmb_anios" ).change(function() {
		tabla_dias_festivos();
	});
	
	$("#guardar").click(function () {
		var Agregar = true;
		var mensaje_error = "";
		var dia_fest_id=$("#dia_fest_id").val();
		var dia_fest_desc=$.trim($("#dia_fest_desc").val());
		var dia_fest_fecha=$.trim($("#dia_fest_fecha").val());
		
		var Usuario_Sistema=$("#Usuario_Sistema").val();
		
		var strDatos=""; 
		
		
		
		if (dia_fest_desc.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega la descripción del día festivo \n";
		}
		
		if (dia_fest_fecha.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega la Fecha \n";
		}
		
		
		if (!Agregar) {
			alert(mensaje_error);			
		}
		
		if(Agregar)
		{
			strDatos = "dia_fest_desc="+dia_fest_desc;
			strDatos += "&dia_fest_fecha="+dia_fest_fecha;
		
			
			if(dia_fest_id.length <= 0)
			{
				strDatos += "&dia_fest_modifico="+Usuario_Sistema;
				strDatos += "&dia_fest_estatus=A";					
				strDatos += "&accion=guardar";
			}
			else
			{
				strDatos += "&dia_fest_id="+dia_fest_id;
				strDatos += "&dia_fest_modifico="+Usuario_Sistema;
				strDatos += "&dia_fest_estatus=M";				
				strDatos += "&accion=editar";
			}
			
			$.ajax({
				type: "POST",
				url: "consultas/consultas_admin_dias_festivos.php",        
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
						tabla_dias_festivos();
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
	
	tabla_dias_festivos();
	function tabla_dias_festivos(){
			var anio=$("#cmb_anios").val();
		
			var tabla="";
			tabla+="	<table class='table table-bordered' id='dataTable'>";
			tabla+="		<thead>";
			tabla+="			<tr>";
			tabla+="				<th>Opciones</th>";
			tabla+="				<th>Dias Festivos</th>";
			tabla+="				<th>Fecha</th>";
			tabla+="			</tr>";
			tabla+="		</thead>";
			var resultado=new Array();
			data={accion: "consultar", anio: anio};
			resultado=cargo_cmb("consultas/consultas_admin_dias_festivos.php",false, data);
			if(resultado.totalCount>0){
			tabla+="		<tbody>";
				for(var i = 0; i < resultado.totalCount; i++){
					tabla+="			<tr>";
					
					tabla+='				<td align="center">';
					tabla+='					<div class="">';
					tabla+='						<a onclick="pasarvalores('+resultado.data[i].dia_fest_id+')" class="green" href="#noir"><i class="ace-icon fa fa-pencil bigger-130" title="Editar"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;';
					tabla+='						<a onclick="eliminar('+resultado.data[i].dia_fest_id+')" class="red" title="Eliminar" href="#noir"><i class="ace-icon fa fa-trash-o bigger-130" title="Eliminar"></i></a>';
					tabla+='					</div>';
					tabla+='				</td>';
					tabla+="				<td>"+resultado.data[i].dia_fest_desc+"</td>";
					tabla+="				<td>"+resultado.data[i].dia_fest_fecha+"</td>";
					tabla+="			</tr>";
					
				}
			tabla+="		</tbody>";	
			}else{
				
			}
			tabla+="	</table>";
		
			
			
			$("#tabla_dias_festivos").html(tabla);
			/*
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
			*/
		}
	
	limpiarcampos=function(){
		$("#dia_fest_id").val("");
		$("#dia_fest_desc").val("");
		$("#dia_fest_fecha").val("");
		$("#guardar").html("Guardar");
	}
	
	pasarvalores=function(id) {
			limpiarcampos();
			if (id != "") {
				$("#guardar").html("Editar");	
				$.ajax({
					type: "POST",
					url: "consultas/consultas_admin_dias_festivos.php", 
					async: false,
					data: {
						dia_fest_id: id,
						accion: "consultar"
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
							$("#dia_fest_id").val(data.data[0].dia_fest_id);
							$("#dia_fest_desc").val(data.data[0].dia_fest_desc);
							$("#dia_fest_fecha").val(data.data[0].dia_fest_fecha);
						}
					},
					error: function () {
						alert("Ocurrio un error al consultar.");
					}
				});
			}
		}
	
	eliminar=function(dia_fest_id){
		if(dia_fest_id!=""){
			var strDatos="";
			var Usuario_Sistema=$("#Usuario_Sistema").val();
			strDatos = "dia_fest_id="+dia_fest_id;
			strDatos += "&dia_fest_modifico="+Usuario_Sistema;
			strDatos += "&dia_fest_estatus=E";				
			strDatos += "&accion=eliminar";
			

			var bool=confirm("Esta seguro de eliminar el Registro.");
			if(bool){
				$.ajax({
					type: "POST",
					url: "consultas/consultas_admin_dias_festivos.php",        
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
							tabla_dias_festivos();
						}else{
							alert(json.mensaje);
						}
						
					},
					error: function () {
						alert("currio un error al guardar.");
					}
				});
			}
		}
		
	}

</script>

