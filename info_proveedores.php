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

							<li class="active">Info Proveedores</li>
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
													<h4 class="widget-title">Email Proveedores</h4>
												</div>

												<div class="widget-body">
													<div class="widget-main">
														<div class="row">
															<div class="col-xs-12 col-sm-6">
																<label for="form-field-8">CC:</label>
																<input type="text" placeholder="CC" id="string_cc" class="form-control">
															</div>
															<div class="col-xs-12 col-sm-6">
																<label for="form-field-8">CCO:</label>
																<input type="text" placeholder="CCO" id="string_cco" class="form-control" value="lruiz@olemx.com; atorres@olemx.com">
															</div>
															<div class="col-xs-12 col-sm-12">
																<label for="form-field-8">Título:</label>
																<input type="text" placeholder="Título" id="string_titulo" class="form-control" >
															</div>
															<div class="col-xs-12 col-sm-12">
																<label for="form-field-8">Mensaje Fijo:</label>
																<textarea placeholder="Mensaje" id="string_msj_fijo" class="form-control"></textarea>
															</div>
															<div class="col-xs-12 col-sm-12">
																<br><br>
															</div>
															<div class="col-xs-12 col-sm-12">
																<label for="form-field-8">Mensaje Variable:</label>
																<textarea  id="string_msj_variable" class="form-control">
																</textarea>
															</div>
															<div class="col-xs-12 col-sm-12">
																<br><br>
															</div>
															<div class="col-xs-12 col-sm-12">
																<label for="form-field-8">Pie de Página:</label>
																<textarea id="string_msj_pie_pagina" class="form-control">
																</textarea>
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
		<script language="JavaScript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
	CKEDITOR.replace('string_msj_variable');
	CKEDITOR.replace('string_msj_pie_pagina');
	



</script>

