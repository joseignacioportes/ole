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

							<li class="active">Proveedores Servicios</li>
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
													<h4 class="widget-title">Proveedores Servicios</h4>
												</div>

												<div class="widget-body">
													<div class="widget-main">
														<div class="row">
															<input type="hidden" id="prov_serv_id">
															<div class="col-xs-12 col-sm-12">
																<label for="form-field-8">Descripción:</label>
																<input type="text" id="prov_serv_desc" maxlength="1000" class="form-control">
															</div>
															
														</div>
														<div class="center">
															<br>
															<button type="button" class="btn btn-primary" id="guardar">Guardar</button>
															<button class="btn btn-danger" id="cancelar" onclick="limpiarcampos()">Cancelar</button>
																			
														</div>
														
													</div>
												</div>
											</div>
										</div><!-- /.span -->
										<div class="col-lg-12">
											<div class="main-card mb-3 card">
												<div class="card-body card-body table-responsive" id="tabla_servicios">
													
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
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
		

<script type="text/javascript">
		
		$("#guardar").click(function () {
			
				
			var Agregar = true;
			var mensaje_error = "";
			var prov_serv_id=$("#prov_serv_id").val();
			var prov_serv_desc=$.trim($("#prov_serv_desc").val());
			
			
			var strDatos=""; 
			
			
			
			if (prov_serv_desc.length <= 0) {
				Agregar = false; 
				mensaje_error += " -Agrega la descripción ";
			}
			
			if (!Agregar) {
				alert(mensaje_error);			
			}
			
			if(Agregar)
			{
				strDatos += "prov_serv_desc="+prov_serv_desc;
				
				if(prov_serv_id.length <= 0)
				{
					strDatos += "&prov_serv_status=A";					
					strDatos += "&accion=guardar";
				}
				else
				{
					strDatos += "&prov_serv_id="+prov_serv_id;
					strDatos += "&prov_serv_status=M";				
					strDatos += "&accion=editar";
				}
				
				$.ajax({
					type: "POST",
					url: "consultas/consultas_admin_prov_serv.php",        
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
							tabla_servicios();
						}else{
							alert(json.mensaje);
						}
						
						
					},
					error: function () {
						alert("Ocurrio un error al guardar.");
					}
				});
			}
		});
	
	

	tabla_servicios();
	function tabla_servicios(){
			var tabla="";
			tabla+="	<table class='table table-bordered' id='dataTable' style='width:100%'>";
			tabla+="		<thead>";
			tabla+="			<tr>";
			tabla+="				<th>Acciones</th>";
			tabla+="				<th>Descripción</th>";
			tabla+="			</tr>";
			tabla+="		</thead>";
			var resultado=new Array();
			data={accion: "consultar"};
			resultado=cargo_cmb("consultas/consultas_admin_prov_serv.php",false, data);
			if(resultado.totalCount>0){
			tabla+="		<tbody>";
				for(var i = 0; i < resultado.totalCount; i++){
					tabla+="			<tr>";
					tabla+='				<td>';
					tabla+='					<div class="">';
					tabla+='						<a onclick="pasarvalores('+resultado.data[i].prov_serv_id+')" class="green" href="#noir"><i class="ace-icon fa fa-pencil bigger-130" title="Editar"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;';
					tabla+='						<a onclick="eliminar('+resultado.data[i].prov_serv_id+')" class="red" title="Eliminar" href="#noir"><i class="ace-icon fa fa-trash-o bigger-130" title="Eliminar"></i></a>';
					tabla+='					</div>';
					tabla+='				</td>';
					tabla+="				<td>"+resultado.data[i].prov_serv_desc+"</td>";
					tabla+="			</tr>";
					
				}
			tabla+="		</tbody>";	
			}else{
				
			}
			tabla+="	</table>";
		
			
			$("#tabla_servicios").html(tabla);
			$('#dataTable').DataTable({
				"lengthMenu": [
			   		[ 1000, 100000 ],
			   		[ '1000 Filas', 'Todos' ]
			   	],
			   	dom: 'Bfrtip',
				buttons: [
					{
                		extend: 'excel',
                		title: 'Proveedores Servicios'
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
	
	limpiarcampos=function(){
		$("#prov_serv_id").val("");
		$("#prov_serv_desc").val("");
		$("#guardar").html("Guardar");
	}
	
	pasarvalores=function(id) {
		limpiarcampos();
		if (id != "") {
			$.ajax({
				type: "POST",
				url: "consultas/consultas_admin_prov_serv.php", 
				async: false,
				data: {
					prov_serv_id: id,
					accion: "consultar"
				},
				dataType: "html",
				beforeSend: function (xhr) {
				},
				success: function (data) {
					data = eval("(" + data + ")");
					if (data.totalCount > 0) {			
						$("#prov_serv_id").val(data.data[0].prov_serv_id);
						$("#prov_serv_desc").val(data.data[0].prov_serv_desc);
						$("#guardar").html("Editar");
					}
				},
				error: function () {
					alert("Ocurrio un error al consultar.");
				}
			});
		}
	}
	
	eliminar=function(prov_serv_id){
		if(prov_serv_id!=""){
			var strDatos="";
			strDatos = "prov_serv_id="+prov_serv_id;
			strDatos += "&prov_serv_status=E";				
			strDatos += "&accion=eliminar";
			

			var bool=confirm("Esta seguro de eliminar el Registro.");
			if(bool){
				$.ajax({
					type: "POST",
					url: "consultas/consultas_admin_prov_serv.php",        
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
							tabla_servicios();
						}else{
							alert(json.mensaje);
						}
						
						
					},
					error: function () {
						alert("Ocurrio un error al guardar.");
					}
				});
			}
		}
		
	}


</script>

