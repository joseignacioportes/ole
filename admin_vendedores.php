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

							<li class="active">Admin Vendedores</li>
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
												<h5 class="widget-title smaller">Admin Vendedores</h5>

												<!-- #section:custom/widget-box.tabbed -->
												<div class="widget-toolbar no-border">
													<ul class="nav nav-tabs" id="myTab">
														<li class="active">
															<a data-toggle="tab" href="#home">Datos Personales</a>
														</li>

														<li>
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
																		
																		
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Apellido Paterno:</label>
																			<div class="col-sm-9">
																				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-8">
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Apellido Materno:</label>
																			<div class="col-sm-9">
																				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-8">
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nombre(s):</label>
																			<div class="col-sm-9">
																				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-8">
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Cargo:</label>
																			<div class="col-sm-9">
																				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-5">
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Email:</label>
																			<div class="col-sm-9">
																				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-5">
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Teléfono Directo:</label>
																			<div class="col-sm-9">
																				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-4">
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Celular:</label>
																			<div class="col-sm-9">
																				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-4">
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Contacto Asistente:</label>
																			<div class="col-sm-9">
																				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-5">
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Email Alternativo:</label>
																			<div class="col-sm-9">
																				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-5">
																			</div>
																		</div>

																		<div class="clearfix form-actions">
																			<div class="col-md-offset-3 col-md-9">
																				<button class="btn btn-info" type="button">
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
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nombre Comercial:</label>
																			<div class="col-sm-9">
																				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-8">
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Dirección:</label>
																			<div class="col-sm-9">
																				<input type="text" id="form-field-1" placeholder="calle, número interior, colonia, ciudad, estado, país, CP" class="col-xs-10 col-sm-12">
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Teléfono:</label>
																			<div class="col-sm-9">
																				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-4">
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Página Web:</label>
																			<div class="col-sm-9">
																				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-5">
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Giro:</label>
																			<div class="col-sm-9">
																				<textarea type="text" id="form-field-1"  placeholder="Proporcionar todos los valores posibles" class="col-xs-10 col-sm-5"></textarea>
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">RFC:</label>
																			<div class="col-sm-9">
																				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-5">
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Razón Social:</label>
																			<div class="col-sm-9">
																				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-5">
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Contacto Administrativo:</label>
																			<div class="col-sm-9">
																				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-5">
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Teléfono Directo:</label>
																			<div class="col-sm-9">
																				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-4">
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">E-Mail:</label>
																			<div class="col-sm-9">
																				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-4">
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Dirección fiscal distinta a la anterior:</label>
																			<div class="col-sm-9">
																				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-8">
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Número de ejecutivos autorizados:</label>
																			<div class="col-sm-9">
																				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-3">
																			</div>
																		</div>
																		<div class="form-group">
																			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Número de agendas solicitadas:</label>
																			<div class="col-sm-9">
																				<input type="text" id="form-field-1"  class="col-xs-10 col-sm-3">
																			</div>
																		</div>
																		<div class="clearfix form-actions">
																			<div class="col-md-offset-3 col-md-9">
																				<button class="btn btn-info" type="button">
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


