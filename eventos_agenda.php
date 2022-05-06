<?php
    include_once("datos/connect/Proveedor.Class.php");
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
    

    $proveedor = new Proveedor('mysql', 'eventos');
	$proveedor->connect();
	$sql="
		select 
			E.evento_nomb_corto,
			E.evento_nombre,
			E.evento_reg_compr_header,
            E.evento_reg_compr_footer,
            E.evento_pag_web,
			DATE_FORMAT(E.evento_fech_i,'%d/%m/%Y') as evento_fech_i,
			E.evento_hora_i,
			DATE_FORMAT(E.evento_fech_f,'%d/%m/%Y') as evento_fech_f,
			E.evento_hora_f,
            E.evento_hora_no_disp_i,
			E.evento_hora_no_disp_f
		from 
		  	eventos_admin E 
		where 
			E.evento_id=".$evento_id;
			
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
			}
		}
	}else{
		$Error=true;
	}

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
                    <a href="<?php echo $evento_pag_web; ?>" target="_blank" title="Click Aquí">
                    <?php if($evento_reg_compr_header!=""){?>
					<span class="profile-picture">
                        
						    <?php 
								echo $evento_reg_compr_header; 
							?>
                        
					</span>
					<?php } ?>
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

						<?php
							$proveedor = new Proveedor('mysql', 'eventos');
							$proveedor->connect();
							$sql="
								SELECT 
									distinct DATE_FORMAT(agenda_comp_fecha, '%d/%m/%Y') as agenda_comp_fecha_format,
									agenda_comp_fecha
								FROM 
									eventos_agenda_compradores 
								WHERE 
									agenda_comp_evento_id=".$evento_id."
								ORDER BY agenda_comp_fecha asc";
									
							$proveedor->execute($sql);
							if (!$proveedor->error()){
								if ($proveedor->rows($proveedor->stmt) > 0) {
									while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
										echo '<div class="row">';
										//echo '	<div class="col-xs-12 col-sm-2"></div>';
										echo '	<div class="col-xs-12 col-sm-12">';
										echo '		<div class="widget-box">';
										echo '			<div class="widget-header">';
										echo '				<h4 class="widget-title"><strong>'.rtrim(ltrim($row["agenda_comp_fecha_format"])).'</strong></h4>';
										echo '				<div class="widget-toolbar">';
										echo '					<a href="#" data-action="collapse">';
										echo '						<i class="ace-icon fa fa-chevron-up"></i>';
										echo '					</a>';
										echo '				</div>';
										echo '			</div>';
										echo '			<div class="widget-body" style="display: block;">';
										echo '				<div class="widget-main">';
										echo '					<div class="row">';
										echo '						<div class="col-xs-12">';
										$proveedor_d = new Proveedor('mysql', 'eventos');
										$proveedor_d->connect();
										$sql="
											SELECT 
												A.agenda_comp_fecha, A.agenda_comp_hora, 
												DATE_FORMAT(DATE_ADD(CAST(CONCAT(agenda_comp_fecha,' ',agenda_comp_hora) AS DATETIME), INTERVAL 15 MINUTE), '%H:%i') AS Hora_Final,
												CONCAT(rtrim(ltrim(P.prov_dat_emp_nomcomercial)),':::',rtrim(ltrim(P.prov_dat_per_nombres)),' ',rtrim(ltrim(P.prov_dat_per_ap_pat)),' ',rtrim(ltrim(P.prov_dat_per_ap_mat))) AS Proveedor,
												CONCAT(rtrim(ltrim(C.reg_compr_dat_per_nombres)),' ',rtrim(ltrim(C.reg_compr_dat_per_ap_pat)),' ',rtrim(ltrim(C.reg_compr_dat_per_ap_mat))) AS Comprador,
												C.reg_compr_dat_per_foto
												
											FROM 
												eventos_agenda_compradores A 
												LEFT JOIN eventos_proveedores P ON P.prov_id=A.agenda_comp_prov_id
												LEFT JOIN eventos_reg_compradores C ON A.agenda_comp_compr_id=C.reg_compr_id 
											WHERE 
												A.agenda_comp_evento_id=".$evento_id." and A.agenda_comp_fecha='".rtrim(ltrim($row["agenda_comp_fecha"]))."'
											ORDER BY agenda_comp_hora asc
										";
										echo '<table id="simple-table" class="table table-striped table-bordered table-hover" width="100%">';
                                        echo '    <thead>';
                                        echo '        <tr>';
										echo '			<th style="text-align:center">Hora</th>';
										echo '			<th style="text-align:center">Proveedor</th>';
										echo '			<th style="text-align:center">Comprador</th>';
                                        echo '        </tr>';
                                        echo '    </thead>';
										echo '    <tbody>';
										$proveedor_d->execute($sql);
										if (!$proveedor_d->error()){
											if ($proveedor_d->rows($proveedor_d->stmt) > 0) {
												while ($row_td = $proveedor_d->fetch_array($proveedor_d->stmt, 0)) {
													echo '        <tr>';
													echo '			<td style="text-align:center; vertical-align:middle; font-size:16px" width="20%"><strong>'.rtrim(ltrim($row_td["agenda_comp_hora"])).' - '.rtrim(ltrim($row_td["Hora_Final"])).'</strong></td>';
													echo '			<td style="text-align:left" width="40%">'.rtrim(ltrim($row_td["Proveedor"])).'</td>';
													echo '			<td style="text-align:left" width="40%">';
													if(rtrim(ltrim($row_td["reg_compr_dat_per_foto"]))!=""){
														echo '<div align="center"><img src="'.rtrim(ltrim($row_td["reg_compr_dat_per_foto"])).'" height="80px"></div>';
														echo '<br>';
													}
													echo rtrim(ltrim($row_td["Comprador"]));
													echo '			</td>';
													echo '        </tr>';
												}
											}else{
												echo '        <tr>';
												echo '			<td colspan="3" style="text-align:center; vertical-align:middle;"><strong>No existe información en la agenda.</strong></td>';
												echo '        </tr>';
											}
										}		
										echo '    </tbody>';
                                        echo '</table>';
										
										echo '						</div>';
										echo '					</div>';
										echo '				</div>';
										echo '			</div>';
										echo '		</div>';
										echo '	</div>';
										//echo '	<div class="col-xs-12 col-sm-2"></div>';
										echo '</div>';
									}
								}else{
									echo "<div align='center'><label><strong>No existe información en la agenda.</strong></label></div>";
								}
							}else{
								$Error=true;
							}
						
							
						
						?>

                        
						
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
			
			//mi_agenda();
			
			
			
		</script>

	</body>
</html>