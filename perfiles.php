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

							<li class="active">Perfiles</li>
						</ul><!-- /.breadcrumb -->

						
					</div>

					<div class="page-content">

						
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form">
									
						



									<div class="hr hr-24"></div>

									<div class="row">
										<div class="col-xs-12 col-sm-12">
											<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Administración de perfiles</h4>
												</div>

												<div class="widget-body">
													<div class="widget-main">
														<div class="row">
															<input type="hidden" id="perfil_id">
															<div class="col-xs-12 col-sm-6">
																<label for="form-field-8">Nombre Perfil:</label>
																<input type="text" placeholder="Perfil" id="perfil_nombre" maxlength="20" class="form-control">
															</div>
															
														</div>
														<div class="center">
															<br>
															<button type="button" class="btn btn-primary" id="guardar">Guardar</button>
														</div>
														
													</div>
												</div>
											</div>
										</div><!-- /.span -->
										<div class="col-lg-12">
											<div class="main-card mb-3 card">
												<div class="card-body card-body table-responsive" id="tabla_perfiles">
													
												</div>
											</div>
										</div>
									</div><!-- /.row -->
									
									
									
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
<script type="text/javascript">$("#guardar").click(function () {
			
				
			var Agregar = true;
			var mensaje_error = "";
			var perfil_id=$("#perfil_id").val();
			var perfil_nombre=$.trim($("#perfil_nombre").val());
			var Usuario_Sistema=$("#Usuario_Sistema").val();
			
			var strDatos=""; 
			
			
			
			if (perfil_nombre.length <= 0) {
				Agregar = false; 
				mensaje_error += " -Agrega el perfil ";
			}
			
			if (!Agregar) {
				alert(mensaje_error);			
			}
			
			if(Agregar)
			{
				strDatos += "perfil_nombre="+perfil_nombre;
				
				if(perfil_id.length <= 0)
				{
					strDatos += "&perfil_modifico="+Usuario_Sistema;
					strDatos += "&perfil_status=A";					
					strDatos += "&accion=guardar_perfil";
				}
				else
				{
					strDatos += "&perfil_id="+perfil_id;
					strDatos += "&perfil_modifico="+Usuario_Sistema;
					strDatos += "&perfil_status=M";				
					strDatos += "&accion=editar_perfil";
				}
				
				$.ajax({
					type: "POST",
					url: "consultas/consultas_perfiles.php",        
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
							tabla_perfiles();
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
	
	

	tabla_perfiles();
	function tabla_perfiles(){
			var tabla="";
			tabla+="	<table class='table table-bordered' id='dataTable'>";
			tabla+="		<thead>";
			tabla+="			<tr>";
			tabla+="				<th>Opciones</th>";
			tabla+="				<th>Perfil</th>";
			tabla+="			</tr>";
			tabla+="		</thead>";
			var resultado=new Array();
			data={accion: "consulta_perfiles"};
			resultado=cargo_cmb("consultas/consultas_perfiles.php",false, data);
			if(resultado.totalCount>0){
			tabla+="		<tbody>";
				for(var i = 0; i < resultado.totalCount; i++){
					tabla+="			<tr>";
					tabla+='				<td>';
					tabla+='					<div class="">';
					tabla+='						<a onclick="pasarvalores('+resultado.data[i].perfil_id+')" class="green" href="#noir"><i class="ace-icon fa fa-pencil bigger-130" title="Editar"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;';
					tabla+='						<a onclick="eliminar('+resultado.data[i].perfil_id+')" class="red" title="Eliminar" href="#noir"><i class="ace-icon fa fa-trash-o bigger-130" title="Eliminar"></i></a>';
					tabla+='					</div>';
					tabla+='				</td>';
					tabla+="				<td>"+resultado.data[i].perfil_nombre+"</td>";
					tabla+="			</tr>";
					
				}
			tabla+="		</tbody>";	
			}else{
				
			}
			tabla+="	</table>";
		
			
			

			
			
			
			$("#tabla_perfiles").html(tabla);
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
	
	limpiarcampos=function(){
		$("#perfil_id").val("");
		$("#perfil_nombre").val("");
	}
	
	pasarvalores=function(id) {
			limpiarcampos();
			if (id != "") {
				$.ajax({
					type: "POST",
					url: "consultas/consultas_perfiles.php", 
					async: false,
					data: {
						perfil_id: id,
						accion: "consulta_perfiles"
					},
					dataType: "html",
					beforeSend: function (xhr) {

					},
					success: function (data) {
						data = eval("(" + data + ")");
						if (data.totalCount > 0) {			
							$("#perfil_id").val(data.data[0].perfil_id);
							$("#perfil_nombre").val(data.data[0].perfil_nombre);
						}
					},
					error: function () {
						alert("Ocurrio un error al consultar.");
					}
				});
			}
		}
	
	eliminar=function(perfil_id){
		if(perfil_id!=""){
			var strDatos="";
			var Usuario_Sistema=$("#Usuario_Sistema").val();
			strDatos = "perfil_id="+perfil_id;
			strDatos += "&perfil_modifico="+Usuario_Sistema;
			strDatos += "&perfil_status=E";				
			strDatos += "&accion=eliminar_perfil";
			

			var bool=confirm("Esta seguro de eliminar el Registro.");
			if(bool){
				$.ajax({
					type: "POST",
					url: "consultas/consultas_perfiles.php",        
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
							tabla_perfiles();
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

