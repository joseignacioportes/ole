<?php
    include_once("datos/connect/Proveedor.Class.php");
    $prov_id=$_GET["key"];
	$evento_id=$_GET["evento"];


    $evento_reg_compr_header="";
    $evento_nombre="";
    $evento_reg_compr_footer="";
    $evento_pag_web="";
	$evento_fech_i="";
	$evento_hora_i="";
	$evento_fech_f="";
    $evento_hora_f="";
	$evento_hora_no_disp_i="";
	$evento_hora_no_disp_f="";
	
    $nombre_completo="";
    $prov_dat_per_nombres="";
    $prov_dat_per_ap_pat="";
    $prov_dat_per_ap_mat="";
    $prov_dat_per_cargo="";
    $prov_dat_per_celular="";
    $prov_dat_per_email="";
    $prov_dat_per_foto="dist/img/sinimagen.jpg";
    $prov_dat_emp_nomcomercial="";

    $proveedor = new Proveedor('mysql', 'eventos');
	$proveedor->connect();
	$sql="
		select 
			P.prov_id,
		  	E.evento_nomb_corto,
			E.evento_nombre,
			E.evento_reg_compr_header,
            E.evento_reg_compr_footer,
            E.evento_pag_web,
			DATE_FORMAT(E.evento_fech_i,'%d/%m/%Y') as evento_fech_i,
			E.evento_hora_i,
			DATE_FORMAT(E.evento_fech_f,'%d/%m/%Y') as evento_fech_f,
			E.evento_hora_f,
            
			P.prov_dat_per_ap_pat,
            P.prov_dat_per_ap_mat,
            P.prov_dat_per_nombres,
            P.prov_dat_per_cargo,
            P.prov_dat_per_celular,
            P.prov_dat_per_email,
            P.prov_dat_per_foto,
			UPPER(P.prov_dat_emp_nomcomercial) AS prov_dat_emp_nomcomercial,
			
			E.evento_hora_no_disp_i,
			E.evento_hora_no_disp_f
		from 
		  	eventos_proveedores P
		left join 
		  	eventos_admin E on ".$evento_id."=E.evento_id
		where 
		  	P.prov_estatus<>'E' and P.prov_id=".$prov_id;
	
	$proveedor->execute($sql);
	if (!$proveedor->error()){
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$evento_nombre=rtrim(ltrim($row["evento_nombre"]));
                $evento_reg_compr_header=str_replace("<img", '<img height="70px" ', rtrim(ltrim($row["evento_reg_compr_header"])));
                $evento_reg_compr_footer=rtrim(ltrim($row["evento_reg_compr_footer"]));
                $evento_pag_web=rtrim(ltrim($row["evento_pag_web"]));
				$evento_fech_i=rtrim(ltrim($row["evento_fech_i"]));
				$evento_hora_i=rtrim(ltrim($row["evento_hora_i"]));
				$evento_fech_f=rtrim(ltrim($row["evento_fech_f"]));
				$evento_hora_f=rtrim(ltrim($row["evento_hora_f"]));
				
				
				if(rtrim(ltrim($row["evento_hora_no_disp_i"]))!=NULL){
					$evento_hora_no_disp_i=rtrim(ltrim($row["evento_hora_no_disp_i"]));	
				}
				
				if(rtrim(ltrim($row["evento_hora_no_disp_f"]))!=NULL){
					$evento_hora_no_disp_f=rtrim(ltrim($row["evento_hora_no_disp_f"]));	
				}
                $nombre_completo=rtrim(ltrim($row["prov_dat_per_nombres"]))." ".rtrim(ltrim($row["prov_dat_per_ap_pat"]))." ".rtrim(ltrim($row["prov_dat_per_ap_mat"]));
                $prov_dat_per_nombres=rtrim(ltrim($row["prov_dat_per_nombres"]));
                $prov_dat_per_ap_pat=rtrim(ltrim($row["prov_dat_per_ap_pat"]));
                $prov_dat_per_ap_mat=rtrim(ltrim($row["prov_dat_per_ap_mat"]));
                

                $prov_dat_per_cargo=rtrim(ltrim($row["prov_dat_per_cargo"]));
                $prov_dat_per_celular=rtrim(ltrim($row["prov_dat_per_celular"]));
                $prov_dat_per_email=rtrim(ltrim($row["prov_dat_per_email"]));

                if(rtrim(ltrim($row["prov_dat_per_foto"]))!=NULL){
                    $prov_dat_per_foto=rtrim(ltrim($row["prov_dat_per_foto"]));
                }
				$prov_dat_emp_nomcomercial=rtrim(ltrim($row["prov_dat_emp_nomcomercial"]));
            }
		}
	}else{
		$Error=true;
	}
	$proveedor->close();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>AGENDA</title>
		<meta name="description" content="3 styles with inline editable feature" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<!-- bootstrap & fontawesome -->
		<link rel="shortcut icon" href="assets/images/leonardodevinci.jpg">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/font-awesome.css" />


		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.js"></script>
		<![endif]-->
		
		<style>			
			.navbar {
					margin: 0;
					padding-left: 0;
					padding-right: 0;
					border-width: 0;
					border-radius: 0;
					-webkit-box-shadow: none;
					box-shadow: none;
					min-height: 45px;
					background: #555252;
			}
			
			.no-skin .navbar .navbar-toggle {
					background-color: #555252;
			}
			
			toggle:hover {
					background-color: #555252;
					border-color: rgba(255, 255, 255, 0.1);
			}
			
			toggle {
					background-color: #555252;
			}
			
			.label-info, .label.label-info, .badge.badge-info, .badge-info {
					background-color: #555252;
			}
			
			.label-info.arrowed-in:before {
					border-color: #555252 #555252 #555252 transparent;
					-moz-border-right-colors: #3a87ad;
			}
			
			.label-info, .label.label-info, .badge.badge-info, .badge-info {
					background-color: #555252;
			}
			
			.label-info {
					background-color: #555252;
			}
			
			.label-info.arrowed-in:before {
					border-color: #555252 #555252 #555252 transparent;
					-moz-border-right-colors: #3a87ad;
			}
			
			.label-info.arrowed-in-right:after {
					border-color: #555252 transparent #555252 #555252;
					-moz-border-left-colors: #3a87ad;
			}
			
			.label-info {
					background-color: #555252;
			}
			
			.profile-user-info-striped .profile-info-name {
					color: #555252;
					background-color: #EDF3F4;
					border-top: 1px solid #F7FBFF;
					font-weight: bold;
			}
		
			.widget-color-grey > .widget-header {
					border-color: #343232;
					background: #555252;
			}
		</style>
	</head>

	<body class="no-skin login-page">
		<!-- #section:basics/navbar.layout -->
		<div class="widget-box widget-color-grey">
				<!-- #section:custom/widget-box.header.options -->
				<div class="widget-header widget-header-large align-center">
                    <a href="<?php echo $evento_pag_web; ?>" target="_blank">
                    <span class="profile-picture">
                        
						    <?php echo $evento_reg_compr_header; ?>
                        
					</span>
                    </a>
				</div>
		</div>
		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class="main-content-inner">

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">

						<div class="row">
							
                            <div class="col-xs-12 col-sm-12">
                                <div class="widget-box">
                                    <div class="widget-header align-center">
                                        <h4 class="widget-title">AGENDA PROVEEDOR <?php echo $prov_dat_emp_nomcomercial;?></h4>
                                    </div>
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <div class="">
                                                <div class="hr dotted"></div>
                                                <div class="row">
                                                    <div id="user-profile-1" class="user-profile row">
                                                        <div class="col-xs-12 col-sm-5 center">
                                                            <div>
                                                                <span><strong>MI FOTO</strong></span>
                                                            </div>
                                                            <div>
                                                                <!-- #section:pages/profile.picture -->
                                                                <span class="profile-picture">
                                                                    <img width="140px" height="140px" id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo $prov_dat_per_foto; ?>" />
                                                                </span>

                                                                <!-- /section:pages/profile.picture -->
                                                                <div class="space-4"></div>

                                                                <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                                                                    <div class="inline position-relative">
                                                                        <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                                                                            <span class="white" style="font-size:12px"><strong><?php echo $nombre_completo; ?></strong></span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="space-6"></div>

                                                            
                                                        </div>

                                                        <div class="col-xs-12 col-sm-7">
                                                            <table id="simple-table" class="table table-striped table-bordered table-hover" width="100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th colspan="2" style="text-align:center">Datos Personales</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    <tr>
                                                                        <td width="35%" style="text-align:right">
                                                                            <span style="color:red">*</span>
                                                                            <b>Nombre:</b>
                                                                        </td>
                                                                        <td width="65%">
                                                                            <?php echo $prov_dat_per_nombres; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="35%" style="text-align:right">
                                                                            <span style="color:red">*</span>
                                                                            <b>Ap. Paterno:</b>
                                                                        </td>
                                                                        <td width="65%">
                                                                            <?php echo $prov_dat_per_ap_pat; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="35%" style="text-align:right">
                                                                            <span style="color:red">*</span>
                                                                            <b>Ap. Materno:</b>
                                                                        </td>
                                                                        <td width="65%">
                                                                            <?php echo $prov_dat_per_ap_mat; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="35%" style="text-align:right">
                                                                            <span style="color:red">*</span>
                                                                            <b>Cargo:</b>
                                                                        </td>
                                                                        <td width="65%">
                                                                            <?php echo $prov_dat_per_cargo; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="35%" style="text-align:right">
                                                                            <span style="color:red">*</span>
                                                                            <b>Celular:</b>
                                                                        </td>
                                                                        <td width="65px">
                                                                            <?php echo $prov_dat_per_celular; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="35%" style="text-align:right">
                                                                            <b>Correo electrónico:</b>
                                                                        </td>
                                                                        <td width="65px">
                                                                            <?php echo $prov_dat_per_email; ?>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            
                                                            
                                                            
                                                        
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- PAGE CONTENT ENDS -->
                                            </div><!-- /.col -->                    

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
						</div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-7">
                                <div class="widget-box">
                                    <div class="widget-header">
                                        <h4 class="widget-title">COMPRADORES</h4>

                                        <div class="widget-toolbar">
                                            <a href="#" data-action="collapse">
                                                <i class="ace-icon fa fa-chevron-up"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="widget-body" style="display: block;">
                                        <div class="widget-main">
                                            <div class="row">
                                                <div class="col-xs-12" id="tbl_proveedores_agenda">
                                                    
                                                </div><!-- /.span -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="col-xs-12 col-sm-5">
                                <div class="widget-box">
                                    <div class="widget-header">
                                        <h4 class="widget-title">MI AGENDA</h4>

                                        <div class="widget-toolbar">
                                            <a href="#" data-action="collapse">
                                                <i class="ace-icon fa fa-chevron-up"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="widget-body" style="display: block;">
                                        <div class="widget-main">
                                            <div class="row">
                                                <div class="col-xs-12" id="tbl_mi_agenda">
                                                    
                                                </div><!-- /.span -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
				
			
			<span class="bigger-120">
				<div class="widget-header widget-header-large align-center">
					
						<?php echo $evento_reg_compr_footer; ?>
					
				</div>
			</span>
					
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
		<script type="text/javascript">
		 window.jQuery || document.write("<script src='assets/js/jquery1x.js'>"+"<"+"/script>");
		</script>
		<![endif]-->
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.js"></script>
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
		
		<!-- InputMask -->
		<script src="assets/clock/input-mask/jquery.inputmask.js" type="text/javascript"></script>
		<script src="assets/clock/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
		<script src="assets/clock/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>


		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
		<!--Clock-->
		<script type="text/javascript" src="clock/jquery-clock-timepicker.min.js"></script>
				
		<script src="assets/js/fuelux/fuelux.spinner.js"></script>
		<script src="assets/js/bootstrap-editable.min.js"></script>
		<script src="assets/js/ace-editable.min.js"></script>
        <script src="assets/js/ace/ace.js"></script>
        <script src="assets/js/ace/ace.widget-box.js"></script>
        <script src="assets/js/ace/ace.settings.js"></script>
		<script src="assets/js/ace/ace.settings-rtl.js"></script>
		<script src="assets/js/ace/ace.settings-skin.js"></script>
		<script src="assets/js/ace/ace.widget-on-reload.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			const evento_fech_i="<?php echo $evento_fech_i; ?>";
			const evento_hora_i="<?php echo $evento_hora_i; ?>";
			const evento_fech_f="<?php echo $evento_fech_f; ?>";
			const evento_hora_f="<?php echo $evento_hora_f; ?>";
			const evento_hora_no_disp_i="<?php echo $evento_hora_no_disp_i; ?>";
			const evento_hora_no_disp_f="<?php echo $evento_hora_no_disp_f; ?>";
			
			compradores_agenda(<?php echo $evento_id; ?>);
			mi_agenda();
			
			function compradores_agenda(evento_id){
				
				$.ajax({
					type: "POST",
					url: "consultas/consultas_reg_compradores.php",        
					async: false,
					data: {
						evento_id:evento_id,
						prov_id:<?php echo $prov_id; ?>,
						accion: "consultar_compradores_agenda"
					},
					dataType: "html",
					beforeSend: function (xhr) {
					},
					success: function (datos) {
						var json;
						json = eval("(" + datos + ")"); //Parsear JSON
						var table="";
						table='<br><table class="table table-striped table-bordered table-hover">';
						table+=' 	<thead>';
						table+=' 		<tr>';
						table+=' 			<th style="align:center" align="center">Foto</th>';
                        table+=' 			<th style="align:center" align="center">Comprador</th>';
						table+=' 			<th style="align:center" align="center">Empresa</th>';
						table+=' 			<th style="align:center" align="center">Contacto</th>';
                        table+=' 		</tr>';
						table+=' 	</thead>';
						table+='	<tbody>';
						if (json.totalCount > 0) {
							for(var i=0; i<json.totalCount; i++){
								table+='<tr>';
								table+='	<td align="center">';
                                if(json.data[i].reg_compr_dat_per_foto!=""){
                                    table+='    <a href="'+json.data[i].reg_compr_dat_emp_pag_web+'" target="_blank">';
								    table+='        <img src="'+json.data[i].reg_compr_dat_per_foto+'" height="80px">';
                                    table+='    </a>';
                                }else{
									table+='    <a href="'+json.data[i].reg_compr_dat_emp_pag_web+'" target="_blank">';
								    table+='        <img src="dist/img/sinimagen.jpg" height="80px">';
                                    table+='    </a>';
								}
                                table+='	</td>';
                                table+='	<td>';
								table+=         json.data[i].Comprador;
								table+='	</td>';
								table+='	<td>';
								table+=         json.data[i].reg_compr_dat_emp_raz_soc;
								table+='	</td>';
								table+='	<td>';
								//table+='		<span><strong>Persona a Cargo:</strong></span>'+json.data[i].reg_compr_dat_per_cargo;
								//table+='		<br>';
								table+='		<span><strong>Celular:</strong></span>'+json.data[i].reg_compr_dat_per_celular;
								table+='		<br>';
								table+='		<span><strong>Email:</strong></span>'+json.data[i].reg_compr_dat_per_email;
								table+='	</td>';
                                table+='</tr>';
								table+='<tr>';
								
								table+='	<td colspan="5">';
								if(json.data[i].agenda_registrada=="0"){
									table+='        <div class="form-group">';
									table+='        	<div class="col-sm-4">';
									table+='        		<label class="control-label no-padding-right" for="form-field-1"><span><font color="red">*</font></span>Selecciona la fecha:</label>';
									table+='				<input type="text" id="calendar_fech_'+i+'" placeholder="dd/mm/aaaa" name="'+i+'_'+json.data[i].reg_compr_id+'" class="col-xs-12 col-sm-12 fecha_datetime" autocomplete="off" onKeyUp="this.value=formateafecha(this.value)" readonly>';
									table+='        	</div>';
									table+='        	<div class="col-sm-4">';
									table+='        		<label class="control-label no-padding-right" for="form-field-1"><span><font color="red">*</font></span>Selecciona la hora:</label>';
									table+='				<select id="select_hora_'+i+'" class="col-xs-12 col-sm-12">';
									table+='				</select>';
									table+='        	</div>';
									//table+='        	<div class="col-sm-2">';
									//table+='        		<label class="control-label no-padding-right" for="form-field-1"><br><br></label>';
									//table+='				<button class="btn btn-danger" type="button" id="Limpiar">Limpiar</button>';
									//table+='        	</div>';
									table+='        	<div class="col-sm-2">';
									table+='        		<label class="control-label no-padding-left" for="form-field-1"><br><br></label>';
									table+='				<button class="btn btn-info" type="button" id="Guardar" onclick="guardar('+json.data[i].reg_compr_id+','+i+')">Guardar</button>';
									table+='        	</div>';
									table+='        </div>';
								}else{
									table+='        <div class="form-group">';
									table+='        	<div class="col-sm-12 align-center">';
									table+='				<button class="btn btn-danger" type="button" onclick="Cancelar_Cita('+json.data[i].reg_compr_id+')">Cancelar Cita</button>';
									table+='        	</div>';
									table+='        </div>';
								}
								table+='	</td>';
								table+='</tr>';
								
							}
						}else{
							table+='<tr>';
							table+='	<td colspan="5">';
							table+='		No Existe Información';
							table+='	</td>';
							table+='</tr>';
						}
						table+='	</tbody>';
						$("#tbl_proveedores_agenda").html(table);
						
						$(function() {
							$(".fecha_datetime").datepicker({
							  defaultDate: evento_fech_i,
							  changeMonth: true,
							  minDate: evento_fech_i,
							  maxDate: evento_fech_f,
							  changeYear: true,
							  numberOfMonths: 1,
							  dateFormat: 'dd/mm/yy',
							  onClose: function( selectedDate ) {
								var fecha=selectedDate.substring(6, 10)+"-"+selectedDate.substring(3, 5)+"-"+selectedDate.substring(0, 2);
								var name_control=this.name.split("_");
								var array_horarios=[];
								//Consulta disponibilidad
								$.ajax({
									type: "POST",
									url: "consultas/consultas_reg_compradores.php",        
									async: false,
									data: {
										evento_id: "<?php echo $evento_id; ?>",
										agenda_comp_fecha: fecha,
										agenda_comp_compr_id: name_control[1],
										agenda_comp_prov_id: "<?php echo $prov_id; ?>",
										accion: "consultar_horarios"
									},
									dataType: "html",
									beforeSend: function (xhr) {

									},
									success: function (datos) {
										var json;
										json = eval("(" + datos + ")"); //Parsear JSON
										if(json.totalCount>0){
											for(var i=0; i<json.totalCount; i++){
												array_horarios[i]=json.data[i]['agenda_comp_hora'];
											}
										}
									},
									error: function () {
										alert("Ocurrio un error al cancelar.");
									}
								});
								//Carga cmb horarios
								cargo_horarios(selectedDate, name_control[0], array_horarios);
							  }
							});
						});
						
						
						
						
					},
					error: function () {
						alert("Ocurrio un error al consultar.");
					}
				});
			}
			
			function mi_agenda(){
				$.ajax({
					type: "POST",
					url: "consultas/consultas_agenda_compradores.php",        
					async: false,
					data: {
						agenda_comp_evento_id:<?php echo $evento_id; ?>,
						agenda_comp_prov_id:<?php echo $prov_id; ?>,
						accion: "consultar_agenda_prov"
					},
					dataType: "html",
					beforeSend: function (xhr) {
					},
					success: function (datos) {
						var json;
						json = eval("(" + datos + ")"); //Parsear JSON
						var table="";
						table='<br><table class="table table-striped table-bordered table-hover">';
						table+=' 	<thead>';
						table+=' 		<tr>';
						table+=' 			<th style="align:center" align="center">Comprador</th>';
                        table+=' 			<th style="align:center" align="center">Fecha</th>';
                        table+=' 			<th style="align:center" align="center">Hora</th>';
						table+=' 		</tr>';
						table+=' 	</thead>';
						table+='	<tbody>';
						if (json.totalCount > 0) {
							for(var i=0; i<json.totalCount; i++){
								table+='<tr>';
								table+='	<td>';
								table+=         json.data[i].comprador;
								table+='	</td>';
                                table+='	<td>';
								table+=         json.data[i].fecha;
								table+='	</td>';
								table+='	<td>';
								table+=         json.data[i].hora;
								table+='	</td>';
								table+='</tr>';
							}
						}else{
							table+='<tr>';
							table+='	<td colspan="3">';
							table+='		No Existe Información';
							table+='	</td>';
							table+='</tr>';
						}
						table+='	</tbody>';
						$("#tbl_mi_agenda").html(table);
						
						
					},
					error: function () {
						alert("Ocurrio un error al consultar.");
					}
				});
			}
			
			
			cargo_horarios=function(fecha, posicion, array_horarios){
				$('#select_hora_'+posicion).empty();
				if(evento_hora_i!=""&&evento_hora_f!=""){
					var hora_i=parseInt(evento_hora_i[0]+''+evento_hora_i[1]);
					var hora_f=parseInt(evento_hora_f[0]+''+evento_hora_f[1]);
					var hora_no_disp_i="";
					var hora_no_disp_f="";
					if(evento_hora_no_disp_i!=""&&evento_hora_no_disp_f!=""){
						hora_no_disp_i=parseInt(evento_hora_no_disp_i[0]+''+evento_hora_no_disp_i[1]+''+evento_hora_no_disp_i[3]+''+evento_hora_no_disp_i[4]);
						hora_no_disp_f=parseInt(evento_hora_no_disp_f[0]+''+evento_hora_no_disp_f[1]+''+evento_hora_no_disp_f[3]+''+evento_hora_no_disp_f[4]);
						//alert(hora_no_disp_i+"-"+hora_no_disp_f);
					}
						
					$('#select_hora_'+posicion).append($('<option>', {value: "" }).text("--Horarios--"));
					for(i=hora_i; i<hora_f; i++){
						var hora_select="";
						var hora_select_2="";
						if(i<10){
							hora_select="0"+i+":"+"00";
							hora_select_2="0"+i+""+"00";
							hora_select_2=parseInt(hora_select_2);
						}else{
							hora_select=i+":"+"00";
							hora_select_2=i+""+"00";
							hora_select_2=parseInt(hora_select_2);
						}
						
						var no_muestro_h=0;
						if(hora_no_disp_i!=""&&hora_no_disp_f!=""){
							if((hora_select_2>=hora_no_disp_i&&hora_select_2<=hora_no_disp_f)&&(hora_select_2>=hora_no_disp_i&&hora_select_2<hora_no_disp_f)){
								no_muestro_h=1;	
							}	
						}
						
						
						for(var m=0; m<array_horarios.length; m++){
							if(array_horarios[m]==hora_select){
								no_muestro_h=1;
							}
						}
						
						if(no_muestro_h==0){
							$('#select_hora_'+posicion).append($('<option>', {value: hora_select }).text(hora_select));
						}
						var cont_min=0;
						for(e=1; e<=59; e++){
							cont_min=cont_min+1;
							if(cont_min==15){
								if(i<10){
									hora_select="0"+i+":"+e;
									hora_select_2="0"+i+""+e;
									hora_select_2=parseInt(hora_select_2);
								}else{
									hora_select=i+":"+e;
									hora_select_2=i+""+e;
									hora_select_2=parseInt(hora_select_2);
								}
								
								var no_muestro_h_2=0;	
								if(hora_no_disp_i!=""&&hora_no_disp_f!=""){
									//console.log(hora_no_disp_i+">="+hora_select_2+"&&"+hora_select_2+"<="+hora_no_disp_f);
									if((hora_select_2>=hora_no_disp_i&&hora_select_2<=hora_no_disp_f)&&(hora_select_2>=hora_no_disp_i&&hora_select_2<hora_no_disp_f)){
										no_muestro_h_2=1;	
									}	
								}
								
								for(var n=0; n<array_horarios.length; n++){
									if(array_horarios[n]==hora_select){
										no_muestro_h_2=1;
									}
								}
								
								if(no_muestro_h_2==0){	
									$('#select_hora_'+posicion).append($('<option>', {value: hora_select }).text(hora_select));
								}
								cont_min=0;
							}
						}
					}
				}
			}
			
			guardar=function(reg_compr_id, posicion){
				var Agregar = true;
                var mensaje_error = "";
				var fecha=$.trim($("#calendar_fech_"+posicion).val());
                var hora=$("#select_hora_"+posicion).val();
				
				var strDatos={}; 
				if (fecha.length <= 0) {
                    Agregar = false; 
                    mensaje_error += " -Selecciona la Fecha \n";
                }

                if (hora.length =="") {
                    Agregar = false; 
                    mensaje_error += " -Selecciona la hora \n";
                }
                
                if (!Agregar) {
                    alert(mensaje_error);			
                }
			
                if(Agregar){
					var bool=confirm("Esta seguro de guardar esta agenda.");
					if(bool){
						fecha=fecha[6]+''+fecha[7]+fecha[8]+''+fecha[9]+'-'+fecha[3]+''+fecha[4]+'-'+fecha[0]+''+fecha[1];
						strDatos.agenda_comp_evento_id=<?php echo $evento_id; ?>;
						strDatos.agenda_comp_compr_id=reg_compr_id;
						strDatos.agenda_comp_prov_id=<?php echo $prov_id; ?>;
						strDatos.agenda_comp_fecha=fecha;
						strDatos.agenda_comp_hora=hora;
						strDatos.agenda_comp_reg="Proveedor";
						strDatos.accion="guardar";
						
						
						$.ajax({
							type: "POST",
							url: "consultas/consultas_agenda_compradores.php",        
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
									location.reload();
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
		
			
			Cancelar_Cita=function(reg_compr_id){
				var strDatos={}; 
				if(reg_compr_id!=""){
					var bool=confirm("Esta seguro de cancelar esta cita.");
					if(bool){
						strDatos.agenda_comp_evento_id=<?php echo $evento_id; ?>;
						strDatos.agenda_comp_compr_id=reg_compr_id;
						strDatos.agenda_comp_prov_id=<?php echo $prov_id; ?>;
						strDatos.accion="eliminar_agenda";
						
						
						$.ajax({
							type: "POST",
							url: "consultas/consultas_agenda_compradores.php",        
							async: false,
							data: strDatos,
							dataType: "html",
							beforeSend: function (xhr) {

							},
							success: function (datos) {
								var json;
								json = eval("(" + datos + ")"); //Parsear JSON
								if(json.totalCount>0){
									alert("Cancelado Correctamente.");	
									location.reload();
								}else{
									alert(json.mensaje);
								}
								
								
							},
							error: function () {
								alert("Ocurrio un error al cancelar.");
							}
						});
						
					}
				}else{
					alert("Ocurrio un error, comunicate con el administrador.");
				}				
				
			}
		
			
		</script>

	</body>
</html>