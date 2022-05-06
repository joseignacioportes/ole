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

							<li class="active">Usuarios</li>
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
													<h4 class="widget-title">Administración de usuarios</h4>
												</div>

												<div class="widget-body">
													<div class="widget-main">
														<div class="row">
															<input type="hidden" id="usr_id">
															<div class="col-xs-12 col-sm-6">
																<label for="form-field-8">Nombre Completo:</label>
																<input type="text" placeholder="Nombre Completo" id="usr_nombre_completo" maxlength="50" class="form-control">
															</div>
															<div class="col-xs-12 col-sm-6">
																<label for="form-field-8">Usuario:</label>
																<input type="text" placeholder="Usuario" id="usr_usuario" maxlength="25" class="form-control">
															</div>
															<div class="col-xs-12 col-sm-6">
																<label for="form-field-8">Contraseña:</label>
																<input type="password" placeholder="Contraseña" id="usr_contrasena" maxlength="25" class="form-control">
															</div>
															<div class="col-xs-12 col-sm-6">
																<label for="form-field-8">Puesto:</label>
																<input type="text" placeholder="Puesto" id="usr_puesto" maxlength="50" class="form-control">
															</div>
															<div class="col-xs-12 col-sm-6">
																<label for="form-field-8">Perfil:</label>
																<select class="form-control" id="usr_id_perfil">
																</select>
															</div>
															<div class="col-xs-12 col-sm-6">
																<label for="form-field-8">Email:</label>
																<input type="text" placeholder="Email" id="usr_email" maxlength="150" class="form-control">
															</div>
															<div class="col-xs-12 col-sm-6">
																<label for="form-field-8">Teléfono:</label>
																<input type="text" placeholder="Teléfono" id="usr_telefono" maxlength="50" class="form-control">
															</div>
															<input type="hidden" id="usr_url_foto">
															<div class="col-xs-12 col-sm-12" id="div_foto" >
																
															</div>
														</div>
														<div class="center">
															<br>
															<button type="button" class="btn btn-primary" id="guardar">Guardar</button>
															<button type="button" class="btn btn-danger" id="cancelar" onclick="limpiarcampos()">Cancelar</button>
														</div>
														
													</div>
												</div>
											</div>
										</div><!-- /.span -->
										<div class="col-lg-12">
											<div class="main-card mb-3 card">
												<div class="card-body card-body table-responsive" id="tabla_usuarios">
													
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
<script type="text/javascript">
perfiles();
	 function perfiles() {
		var resultado=new Array();
		data={accion: "consulta_perfiles"};
		resultado=cargo_cmb("consultas/consultas_perfiles.php",false, data);
		if(resultado.totalCount>0){
			$('#usr_id_perfil').append($('<option>', { value: "-1" }).text("--Perfiles--"));
			for(var i = 0; i < resultado.totalCount; i++){
				$('#usr_id_perfil').append($('<option>', { value: resultado.data[i].perfil_id }).text(resultado.data[i].perfil_nombre));
			}
		}else{
			$('#usr_id_perfil').append($('<option>', { value: "-1" }).text("--Sin Resultados--"));
		}
	}
	
	
	$("#guardar").click(function () {
			
				
		var Agregar = true;
		var mensaje_error = "";
		var usr_id=$("#usr_id").val();
		var usr_nombre_completo=$.trim($("#usr_nombre_completo").val());
		var usr_usuario=$.trim($("#usr_usuario").val());
		var usr_contrasena=$.trim($("#usr_contrasena").val());
		var usr_puesto=$.trim($("#usr_puesto").val());
		var usr_id_perfil=$.trim($("#usr_id_perfil").val());
		var usr_email=$.trim($("#usr_email").val());
		var usr_telefono=$.trim($("#usr_telefono").val());
		var usr_url_foto=$.trim($("#usr_url_foto").val());
		var Usuario_Sistema=$("#Usuario_Sistema").val();
		
		var strDatos=""; 
		
		
		
		if (usr_nombre_completo.length <= 0) {
			Agregar = false; 
			mensaje_error += " -Agrega el Nombre Completo \n";
		}
		
		if (usr_usuario.length <= 0) {
			Agregar = usr_usuario; 
			mensaje_error += " -Agrega el Usuario \n";
		}
		
		if (usr_contrasena.length <= 0) {
			Agregar = usr_usuario; 
			mensaje_error += " -Agrega la Contraseña \n";
		}
		
		if (usr_puesto.length <= 0) {
			Agregar = usr_usuario; 
			mensaje_error += " -Agrega el Puesto \n";
		}
		
		if (usr_email.length <= 0) {
			Agregar = usr_usuario; 
			mensaje_error += " -Agrega el Email \n";
		}
		
		if (usr_id_perfil=="-1") {
			Agregar = usr_usuario; 
			mensaje_error += " -Agrega el Perfil \n";
		}
		
		
		if (!Agregar) {
			alert(mensaje_error);			
		}
		
		if(Agregar)
		{
			strDatos = "usr_nombre_completo="+usr_nombre_completo;
			strDatos += "&usr_usuario="+usr_usuario;
			strDatos += "&usr_contrasena="+usr_contrasena;
			strDatos += "&usr_puesto="+usr_puesto;
			strDatos += "&usr_id_perfil="+usr_id_perfil;
			strDatos += "&usr_email="+usr_email;
			strDatos += "&usr_telefono="+usr_telefono;
			strDatos += "&usr_url_foto="+usr_url_foto
			
			if(usr_id.length <= 0)
			{
				strDatos += "&usr_modifico="+Usuario_Sistema;
				strDatos += "&usr_status=A";					
				strDatos += "&accion=guardar_usuarios";
			}
			else
			{
				strDatos += "&usr_id="+usr_id;
				strDatos += "&usr_modifico="+Usuario_Sistema;
				strDatos += "&usr_status=M";				
				strDatos += "&accion=editar_usuarios";
			}
			
			$.ajax({
				type: "POST",
				url: "consultas/consultas_usuarios.php",        
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
						tabla_usuarios();
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
	
	

	tabla_usuarios();
	function tabla_usuarios(){
			var tabla="";
			tabla+="	<table class='table table-bordered' id='dataTable'>";
			tabla+="		<thead>";
			tabla+="			<tr>";
			tabla+="				<th>Opciones</th>";
			tabla+="				<th>Foto</th>";
			tabla+="				<th>Nombre Completo</th>";
			tabla+="				<th>Usuario</th>";
			tabla+="				<th>Puesto</th>";
			tabla+="				<th>Perfil</th>";
			tabla+="				<th>Correo</th>";
			tabla+="				<th>Telefono</th>";
			tabla+="			</tr>";
			tabla+="		</thead>";
			var resultado=new Array();
			data={accion: "consulta_usuarios"};
			resultado=cargo_cmb("consultas/consultas_usuarios.php",false, data);
			if(resultado.totalCount>0){
			tabla+="		<tbody>";
				for(var i = 0; i < resultado.totalCount; i++){
					tabla+="			<tr>";
					
					tabla+='				<td align="center">';
					tabla+='					<div class="">';
					tabla+='						<a onclick="pasarvalores('+resultado.data[i].usr_id+')" class="green" href="#noir"><i class="ace-icon fa fa-pencil bigger-130" title="Editar"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;';
					tabla+='						<a onclick="eliminar('+resultado.data[i].usr_id+')" class="red" title="Eliminar" href="#noir"><i class="ace-icon fa fa-trash-o bigger-130" title="Eliminar"></i></a>';
					tabla+='					</div>';
					tabla+='				</td>';
					if(resultado.data[i].usr_url_foto!=""){
						tabla+="				<td><div class=''><div class=''><img widht='50px' height='50px' src='Fotos/"+resultado.data[i].usr_url_foto+"'></div></div></td>";
					}else{
						tabla+="				<td></td>";	
					}
					tabla+="				<td>"+resultado.data[i].usr_nombre_completo+"</td>";
					tabla+="				<td>"+resultado.data[i].usr_usuario+"</td>";
					tabla+="				<td>"+resultado.data[i].usr_puesto+"</td>";
					tabla+="				<td>"+resultado.data[i].perfil_nombre+"</td>";
					tabla+="				<td>"+resultado.data[i].usr_email+"</td>";
					tabla+="				<td>"+resultado.data[i].usr_telefono+"</td>";
					tabla+="			</tr>";
					
				}
			tabla+="		</tbody>";	
			}else{
				
			}
			tabla+="	</table>";
		
			
			
			$("#tabla_usuarios").html(tabla);
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
		$("#usr_id").val("");
		$("#usr_nombre_completo").val("");
		$("#usr_usuario").val("");
		$("#usr_contrasena").val("");
		$("#usr_puesto").val("");
		$("#usr_id_perfil").val("-1");
		$("#usr_email").val("");
		$("#usr_telefono").val("");
		$("#usr_url_foto").val("");
		$("#guardar").html("Guardar");
		$("#div_foto").html("");
	}
	
	pasarvalores=function(id) {
			limpiarcampos();
			if (id != "") {
				$("#guardar").html("Editar");	
				$.ajax({
					type: "POST",
					url: "consultas/consultas_usuarios.php", 
					async: false,
					data: {
						usr_id: id,
						accion: "consulta_usuarios"
					},
					dataType: "html",
					beforeSend: function (xhr) {

					},
					success: function (data) {
						data = eval("(" + data + ")");
						if (data.totalCount > 0) {			
							var foto="";
							$("#usr_id").val(data.data[0].usr_id);
							$("#usr_nombre_completo").val(data.data[0].usr_nombre_completo);
							$("#usr_usuario").val(data.data[0].usr_usuario);
							$("#usr_contrasena").val(data.data[0].usr_contrasena);
							$("#usr_puesto").val(data.data[0].usr_puesto);
							$("#usr_id_perfil").val(data.data[0].usr_id_perfil);
							$("#usr_email").val(data.data[0].usr_email);
							$("#usr_telefono").val(data.data[0].usr_telefono);
							$("#usr_url_foto").val(data.data[0].usr_url_foto);
							
							if(data.data[0].usr_url_foto!=""){
								foto+='<label for="form-field-8">Foto:</label>';
								foto+='<div class="space-12"></div>';
								foto+='<div>';
								foto+='	<span class="profile-picture">';
								foto+='		<img id="avatar" class="editable"  src="Fotos/'+data.data[0].usr_url_foto+'" widht="200px" height="200px">';
								foto+='	</span>';
								foto+='	<div class="space-4"></div>';
								foto+='</div>';
								
								$("#div_foto").html(foto);
							}
						
						}
					},
					error: function () {
						alert("Ocurrio un error al consultar.");
					}
				});
			}
		}
	
	eliminar=function(usr_id){
		if(usr_id!=""){
			var strDatos="";
			var Usuario_Sistema=$("#Usuario_Sistema").val();
			strDatos = "usr_id="+usr_id;
			strDatos += "&usr_modifico="+Usuario_Sistema;
			strDatos += "&usr_status=E";				
			strDatos += "&accion=eliminar_usuarios";
			

			var bool=confirm("Esta seguro de eliminar el Registro.");
			if(bool){
				$.ajax({
					type: "POST",
					url: "consultas/consultas_usuarios.php",        
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
							tabla_usuarios();
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

