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
										<div class="col-sm-12 widget-container-col">
											<div class="widget-box">
												<div class="widget-header widget-header-small">
													<h5 class="widget-title smaller"><span id="span_nombre_evento"></span></h5>

													<!-- #section:custom/widget-box.tabbed -->
													<div class="widget-toolbar no-border">
														<ul class="nav nav-tabs" id="myTab">
															<li class="active" id="li_dat_gen">
																<a data-toggle="tab" href="#dat_gen">Datos Generales</a>
															</li>
															<li id="li_comunicados" class="" style="display:none">
																<a data-toggle="tab" href="#comunicados">Comunicados</a>-
															</li>
															<li id="li_compradores" class="" onclick="mostrar_compradores_registrados()">
																<a data-toggle="tab" href="#compradores">Compradores Registrados</a>
															</li>
															<li id="li_proveedores" class="">
																<a data-toggle="tab" href="#proveedores">Proveedores Confirmados</a>
															</li>
														</ul>
													</div>
													<!-- /section:custom/widget-box.tabbed -->
												</div>

												<div class="widget-body">
													<div class="widget-main padding-6">
														<div class="tab-content">
															<div id="dat_gen" class="tab-pane in active">
																<div class="row">
																	<div class="col-xs-12">
																		<!-- PAGE CONTENT BEGINS -->
																		<form class="form-horizontal" role="form">
																			
																			
																			
																			<!-- #section:elements.form -->
																			<div class="form-group">
																				<input type="hidden" id="evento_id"  class="col-xs-10 col-sm-8">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red">*</font></span>Nombre del Evento:</label>
																				<div class="col-sm-9">
																					<input type="text" id="evento_nombre"  class="col-xs-10 col-sm-8">
																				</div>
																			</div>
																			<div class="form-group">
																				<input type="hidden" id="evento_id"  class="col-xs-10 col-sm-8">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red">*</font></span>Nombre Corto:</label>
																				<div class="col-sm-9">
																					<input type="text" id="evento_nomb_corto"  class="col-xs-10 col-sm-8">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Logo:</label>
																				<div class="col-sm-9">
																					<input type="file" id="subir_imagen_logo" class="btn btn-info col-sm-8"><a href="#modal_logo" class="col-sm-4" id="ver_imagen_1" style="display:none" data-toggle="modal">Ver Imágen</a>
																					<input type="text" id="evento_logo"  class="col-xs-10 col-sm-8" style="display:none">
																				</div>
																					
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red">*</font></span>Descripción:</label>
																				<div class="col-sm-9">
																					<textarea type="text" id="evento_desc" class="col-xs-10 col-sm-8"></textarea>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="padding-top: 0px;">
																					<ul class="breadcrumb" style="margin: 0px 0px 0 0px;">
																						<li class="infotip">
																							<label class="control-label no-padding-right" for="form-field-1">
																								<span>
																									<font color="red"></font>
																								</span>
																								Servicios:
																							</label>
																							<a href="#">
																								<span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="More details.">i</span>
																								
																								<div class="tooltip-login">
																									<div class="head align-center">
																										<h5>
																											<font color="white">SERVICIOS</font>
																										</h5>
																									</div>
																									<div class="body">
																										<div class="col-md-12 align-left" id="info_servicios">
																										</div>
																									</div>
																								</div>
																							</a>
																						</li>
																					</ul>
																				</label>
																				<div class="col-sm-9">
																					<input type="text" class="col-xs-12 col-sm-12" name="tags" id="evento_servicios" placeholder="Presiona Enter para agregar los Servicios" />
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
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red">*</font></span>Hora Inicial:</label>
																				<div class="col-sm-6">
																					<input type="text" id="evento_hora_i"  class="time standard col-xs-10 col-sm-4 hora" autocomplete="off" maxlength="5">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red">*</font></span>Fecha Final:</label>
																				<div class="col-sm-9">
																					<input type="text" id="evento_fech_f" placeholder="dd/mm/aaaa" name="start" class="col-xs-10 col-sm-4" autocomplete="off" onKeyUp="this.value=formateafecha(this.value)">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" maxlength="5">*</font></span>Hora Final:</label>
																				<div class="col-sm-6">
																					<input type="text" id="evento_hora_f"  class="time standard col-xs-10 col-sm-4 hora" autocomplete="off" maxlength="5">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" maxlength="5"></font></span>Hora no Disponible Inicial:</label>
																				<div class="col-sm-6">
																					<input type="text" id="evento_hora_no_disp_i"  class="time standard col-xs-10 col-sm-4 hora" autocomplete="off" maxlength="5">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red" maxlength="5"></font></span>Hora no Disponible Final:</label>
																				<div class="col-sm-6">
																					<input type="text" id="evento_hora_no_disp_f"  class="time standard col-xs-10 col-sm-4 hora" autocomplete="off" maxlength="5">
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Página Web:</label>
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
																			<div class="form-group">
																				<label class="col-sm-3 control-label no-padding-right" for="form-field-1"><span><font color="red"></font></span>Link registro para compradores: </label>&nbsp;&nbsp;&nbsp;
																				<label class="col-sm-0 control-label no-padding-right" for="form-field-1" id="liga_externa"></label>
																				
																			</div>
																			<div class="hr hr-24"></div>
																		</form>
																		
																	</div><!-- /.col -->
																</div>
															</div>
															
															<div id="comunicados" class="tab-pane">
																<div class="row">
																	<div class="col-xs-12">
																		<!-- PAGE CONTENT BEGINS -->
																		<input type="hidden" id="cadena_compradores">
																		<form class="form-horizontal" role="form">
																			<div class="form-group">
																				<div class="col-sm-12">
																					<!-- #section:elements.tab.position -->
																					<div class="tabbable">
																						<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab3">
																							<li class="active">
																								<a data-toggle="tab" href="#Info_Proveedores">
																									<i class="menu-icon fa fa-envelope bigger-110"></i>
																									Mensaje Proveedores
																								</a>
																							</li>

																							<li>
																								<a data-toggle="tab" href="#Format_Inscripcion">
																									<i class="menu-icon fa fa-envelope bigger-110"></i>
																									Invitación a registro de compradores
																								</a>
																							</li>
																						</ul>

																						<div class="tab-content">
																							<div id="Info_Proveedores" class="tab-pane in active">
																								<div class="widget-body">
																									<div class="widget-main">
																										<div class="row">
																											<div class="col-xs-12 col-sm-6">
																												<label for="form-field-8">CC:</label>
																												<input type="text" placeholder="CC" id="info_prov_cc" class="form-control">
																											</div>
																											<div class="col-xs-12 col-sm-6">
																												<label for="form-field-8">CCO:</label>
																												<input type="text" placeholder="CCO" id="info_prov_cco" class="form-control" value="atorres@olemx.com; compradores.vip@mantenimiento-b2b.com">
																											</div>
																											<div class="col-xs-12 col-sm-12">
																												<label for="form-field-8"><span><font color="red">*</font></span>Título:</label>
																												<input type="text" placeholder="Título" id="info_prov_titulo" class="form-control" >
																											</div>
																											<div class="col-xs-12 col-sm-12">
																												<label for="form-field-8"><span><font color="red">*</font></span>Mensaje Fijo:</label>
																												<textarea placeholder="Mensaje" id="info_prov_msj_fijo" class="form-control" disabled></textarea>
																											</div>
																											<div class="col-xs-12 col-sm-12">
																												<br><br>
																											</div>
																											<div class="col-xs-12 col-sm-12">
																												<label for="form-field-8"><span><font color="red">*</font></span>Mensaje Variable:</label>
																												<textarea  id="info_prov_msj_variable" class="form-control">
																												</textarea>
																											</div>
																											<div class="col-xs-12 col-sm-12">
																												<br><br>
																											</div>
																											<div class="col-xs-12 col-sm-12">
																												<label for="form-field-8"><span><font color="red">*</font></span>Pie de Página:</label>
																												<textarea id="info_prov_msj_pie_pagina" class="form-control">
																												</textarea>
																											</div>
																										</div>
																										<div class="center">
																											<br>
																											<button type="button" class="btn btn-success" id="guardar_info_prov">Guardar</button>
																											<button type="button" class="btn btn-danger" onclick="limpiarcampos()">Cancelar</button>
																										</div>
																										
																									</div>
																								</div>
																							</div>

																							<div id="Format_Inscripcion" class="tab-pane">
																								<div class="widget-body">
																									<div class="widget-main">
																										<div class="row">
																											<div class="col-xs-12 col-sm-6">
																												<label for="form-field-8"><span><font color="red">*</font></span>Para:</label>
																												<input type="text" placeholder="CC" id="form_ins_to" class="form-control">
																											</div>
																											<div class="col-xs-12 col-sm-6">
																												<label for="form-field-8">CC:</label>
																												<input type="text" placeholder="CC" id="form_ins_cc" class="form-control">
																											</div>
																											<div class="col-xs-12 col-sm-6">
																												<label for="form-field-8">CCO:</label>
																												<input type="text" placeholder="CCO" id="form_ins_cco" class="form-control" value="">
																											</div>
																											<div class="col-xs-12 col-sm-12">
																												<label for="form-field-8"><span><font color="red">*</font></span>Título:</label>
																												<input type="text" placeholder="Título" id="form_ins_titulo" class="form-control" >
																											</div>
																											<div class="col-xs-12 col-sm-12">
																												<br><br>
																											</div>
																											<div class="col-xs-12 col-sm-12">
																												<label for="form-field-8"><span><font color="red">*</font></span>Mensaje:</label>
																												<textarea  id="form_ins_msj_variable" class="form-control">
																												</textarea>
																											</div>
																											<div class="col-xs-12 col-sm-12">
																												<br><br>
																											</div>
																											<div class="col-xs-12 col-sm-12">
																												<label for="form-field-8"><span><font color="red">*</font></span>Pie de mensaje:</label>
																												<textarea id="form_ins_msj_pie_pagina" class="form-control">
																												</textarea>
																											</div>
																										</div>
																										<div class="center">
																											<br>
																											<button type="button" class="btn btn-success" id="guardar_form_inscr">Enviar</button>
																											<button type="button" class="btn btn-danger" onclick="limpiarcampos()">Cancelar</button>
																										</div>													
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>

																					<!-- /section:elements.tab.position -->
																				</div><!-- /.col -->
																			</div>
																			
																		</form>
																		
																	</div><!-- /.col -->
																</div>
															</div>
																													
															<div id="compradores" class="tab-pane">
																<div class="row">
																	<div class="col-xs-12">
																		<div class="card-body card-body table-responsive" id="tabla_compradores_registrados">
													
																		</div>
																		<!-- PAGE CONTENT BEGINS -->
																		<input type="hidden" id="cadena_compradores">
																		<form class="form-horizontal" role="form" style="display:none">
																			<div class="col-xs-12" align="center">
																				<button  type="button" class="btn btn-sm btn-primary" data-dismiss="modal" data-toggle="modal" href="#modal_agregar_compradores">Agregar</button>
																			</div>	
																			<div class="col-xs-12">
																				
																				
																				<div id="modal_agregar_compradores" class="modal fade" tabindex="-1">
																					<div class="modal-dialog">
																						<div class="modal-content">
																							<div class="modal-header">
																								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																								<h3 class="smaller lighter blue no-margin">Agregar Compradores</h3>
																							</div>

																							<div class="modal-body">
																								<form class="form-horizontal" role="form">
																									<div class="form-group">
																										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Selecciona un comprador:</label>
																										<div class="col-sm-8">
																											<select class="form-control" id="cmb_compradores">
																											</select>
																											
																										</div>
																										<div class="col-sm-12" align="center">
																											<br>
																											<button type="button" class="btn btn-sm btn-success" onclick="agregar_compradores()">Agregar</button>
																										</div>	
																									</div>
																								</form>
																							</div>

																							<div class="modal-footer">
																								<button data-bb-handler="danger" type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cerrar</button>
																							</div>
																						</div><!-- /.modal-content -->
																					</div><!-- /.modal-dialog -->
																				</div>
																				
																				
																				
																				
																				
																			
																				<div class="form-group">
																					<div class="col-sm-3"></div>
																					<div class="col-sm-6" id="check_compradores" >
																					
																					</div>
																					<div class="col-sm-3"></div>
																					<div class="col-sm-12" align="center">Es Importante que al agregar un comprador es necesario guardar o editar el formulario.</div>
																				</div>
																			</div>
																		</form>
																		
																	</div><!-- /.col -->
																</div>
															</div>
															
															<div id="proveedores" class="tab-pane">
																<div class="row">
																	<div class="col-xs-12">
																		<!-- PAGE CONTENT BEGINS -->
																		<input type="hidden" id="cadena_provedores">
																		<form class="form-horizontal" role="form">
																			<div class="col-xs-12" align="center">
																				<button  type="button" class="btn btn-sm btn-primary" data-dismiss="modal" data-toggle="modal" href="#modal_agregar_proveedores">Agregar</button>
																			</div>	
																			<div class="col-xs-12">
																				
																				
																				<div id="modal_agregar_proveedores" class="modal fade" tabindex="-1">
																					<div class="modal-dialog">
																						<div class="modal-content">
																							<div class="modal-header">
																								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																								<h3 class="smaller lighter blue no-margin">Agregar Proveedores</h3>
																							</div>

																							<div class="modal-body">
																								<form class="form-horizontal" role="form">
																									<div class="form-group">
																										<label class="col-sm-4 control-label no-padding-right" for="form-field-1">Selecciona un proveedor:</label>
																										<div class="col-sm-8">
																											<select class="form-control" id="cmb_proveedores">
																											</select>
																											
																										</div>
																										<div class="col-sm-12" align="center">
																											<br>
																											<button type="button" class="btn btn-sm btn-success" onclick="agregar_proveedores()">Agregar</button>
																										</div>	
																									</div>
																								</form>
																							</div>

																							<div class="modal-footer">
																								<button data-bb-handler="danger" type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cerrar</button>
																							</div>
																						</div><!-- /.modal-content -->
																					</div><!-- /.modal-dialog -->
																				</div>
																				
																				<div class="form-group">
																					<div class="col-sm-3"></div>
																					<div class="col-sm-6" id="check_provedores" >
																					
																					</div>
																					<div class="col-sm-3"></div>
																					<div class="col-sm-12" align="center">Es Importante que al agregar un proveedor es necesario guardar o editar el formulario.</div>
																				</div>
																			</div>
																		</form>
																	</div><!-- /.col -->
																</div>
															</div>
															
														
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="clearfix form-actions" align="center">
												<button class="btn btn-info" type="button" id="guardar">
													<i class="ace-icon fa fa-check bigger-110"></i>
													Guardar
												</button>
												<button type="button" class="btn btn-danger" id="cancelar" onclick="limpiarcampos()">Cancelar</button>

										</div>
										<div class="col-lg-12">
											<div class="main-card mb-3 card">
												<div class="card-body card-body table-responsive" id="tabla_eventos">
													
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
			
			<div id="modal_info_proveedores" class="modal fade" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="smaller lighter blue no-margin">Enviar Notificación a Proveedores</h3>
						</div>

						<div class="modal-body">
							<form class="form-horizontal" role="form">
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Enviar á:</label>
									<input type="hidden" id="hdd_evento_id_proveed">
									<input type="hidden" id="cadena_envia_proveedores">
									<div class="col-sm-9" id="enviar_proveedores">
										
										
									</div>
									<div class="col-sm-12" id="gif1" align="center" style="display:none">
										<img src="images/spinner.gif" alt="cargando.." height="80" width="80"><br>
										<label>Enviando Notificaciones</label>
									</div>
								</div>
								
							</form>
						</div>

						<div class="modal-footer">
							<button data-bb-handler="success" type="button" class="btn btn-sm btn-success" onclick="enviar_notifi_proveedor()"><i class="ace-icon fa fa-check" ></i>Enviar</button>
							<button data-bb-handler="danger" type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cerrar</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div>
			
			<div id="modal_form_inscripcion" class="modal fade" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="smaller lighter blue no-margin">Enviar Notificación a Compradores</h3>
						</div>

						<div class="modal-body">
							<form class="form-horizontal" role="form">
								<div class="form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Enviar á:</label>
									<input type="hidden" id="hdd_evento_id_comp">
									<input type="hidden" id="cadena_envia_compradores">
									<div class="col-sm-9" id="enviar_compradores">
										
									</div>
									<div class="col-sm-12" id="gif2" align="center" style="display:none">
										<img src="images/spinner.gif" alt="cargando.." height="80" width="80"><br>
										<label>Enviando Notificaciones</label>
									</div>
								</div>
								
							</form>
						</div>
						<div class="modal-footer">
							<button data-bb-handler="success" type="button" class="btn btn-sm btn-success" onclick="enviar_notifi_comprador()"><i class="ace-icon fa fa-check"></i>Enviar</button>
							<button data-bb-handler="danger" type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cerrar</button>
						</div>
						
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div>
			
			<div id="modal_agenda_eventos" class="modal fade" tabindex="-1">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="smaller lighter blue no-margin" id="title_modal_evento"></h3>
						</div>

						<div class="modal-body">
							<form class="form-horizontal" role="form">
								<div class="form-group" id="agenda_eventos">
									
								</div>
								
							</form>
						</div>

						<div class="modal-footer">
							<button data-bb-handler="danger" type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cerrar</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div>
<?php
	include 'footer.php';
?>
<!-- page specific plugin scripts -->
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
		
		<!-- InputMask -->
		<script src="assets/clock/input-mask/jquery.inputmask.js" type="text/javascript"></script>
		<script src="assets/clock/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
		<script src="assets/clock/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>


		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
		<!--Clock-->
		<script type="text/javascript" src="clock/jquery-clock-timepicker.min.js"></script>
				
		<!-- File Input -->
		<script src="assets/fileinput/fileinput.js"></script>
		<script src="assets/fileinput/fileinput_locale_es.js"></script>
		<script language="JavaScript" src="ckeditor/ckeditor.js"></script>
		
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>



		<script src="assets/js/dataTables/jquery.dataTables.js"></script>
		<script src="assets/js/dataTables/jquery.dataTables.bootstrap.js"></script>
		<script src="assets/js/dataTables/extensions/TableTools/js/dataTables.tableTools.js"></script>
		<script src="assets/js/dataTables/extensions/ColVis/js/dataTables.colVis.js"></script>		
		<script src="assets/js/bootstrap-tag.js"></script>
		
		<script>
		
  // Replace the textarea id with a CKEditor
  CKEDITOR.replace('info_prov_msj_variable');
	CKEDITOR.replace('info_prov_msj_pie_pagina');
	
	CKEDITOR.replace('form_ins_msj_variable');
	CKEDITOR.replace('form_ins_msj_pie_pagina');
			
</script>
<script type="text/javascript">
	const array_servicios=[];
	
	carga_serv=function() {
		
		$.ajax({
			type: "POST",
			url: "consultas/consultas_admin_prov_serv.php", 
			async: false,
			data: {
				accion: "consultar"
			},
			dataType: "html",
			beforeSend: function (xhr) {
			},
			success: function (data) {
				data = eval("(" + data + ")");
				if (data.totalCount > 0) {		
					var servicios="";	
					for(var i=0; i<data.totalCount; i++ ){
						array_servicios[i]=data.data[i].prov_serv_desc;
						servicios+="-"+data.data[i].prov_serv_desc+"<br>";
					}

					$("#info_servicios").html(servicios);
				}
			},
			error: function () {
				alert("Ocurrio un error al consultar.");
			}
		});
		
	}
	carga_serv();
	
	var tag_input = $('#evento_servicios');
	try{
		tag_input.tag(
		  	{
				placeholder:tag_input.attr('placeholder'),
				source: array_servicios
			}
		)
	}catch(e) {
		//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
		tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
		//$('#form-field-tags').autosize({append: "\n"});
	}


	//$('.standard').clockTimePicker();
	$(".hora").inputmask("hh:mm", {"placeholder": "hh:mm"});

	var Array_Compradores=[];
	var Array_Proveedores=[];
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
		var evento_nomb_corto=$.trim($("#evento_nomb_corto").val());
		var evento_logo=$.trim($("#evento_logo").val());
		var evento_desc=$.trim($("#evento_desc").val());
		var evento_sede_hotel=$.trim($("#evento_sede_hotel").val());
		var evento_ciudad=$.trim($("#evento_ciudad").val());
		var evento_fech_i=$.trim($("#evento_fech_i").val());
		var evento_hora_i=$.trim($("#evento_hora_i").val());
		var evento_fech_f=$.trim($("#evento_fech_f").val());
		var evento_hora_f=$.trim($("#evento_hora_f").val());
		var evento_pag_web=$.trim($("#evento_pag_web").val());
		var evento_contactos=$.trim($("#evento_contactos").val());
		var evento_raz_social_org=$.trim($("#evento_raz_social_org").val());
		var cadena_compradores=$("#cadena_compradores").val();
		var cadena_provedores=$("#cadena_provedores").val();
		var evento_hora_no_disp_i=$.trim($("#evento_hora_no_disp_i").val());
		var evento_hora_no_disp_f=$.trim($("#evento_hora_no_disp_f").val());
		var evento_servicios=$.trim($("#evento_servicios").val());
		/*
		for(var i=0; i<Array_Compradores.length; i++){
			if($("#check_comp_"+Array_Compradores[i][0]).prop('checked')){
				Array_Compradores[i][1]="C";
				if(Array_Compradores[i][3]==""){
					Array_Compradores[i][2]="Insert";
				}else{
					Array_Compradores[i][2]="";
				}
			}else{
				Array_Compradores[i][1]="C";
				if(Array_Compradores[i][3]!=""){
					Array_Compradores[i][2]="Delete";
				}else{
					Array_Compradores[i][2]="";
				}
			}
		}
		*/
		for(var j=0; j<Array_Proveedores.length; j++){
			if($("#check_prov_"+Array_Proveedores[j][0]).prop('checked')){
				Array_Proveedores[j][1]="P";
				if(Array_Proveedores[j][3]==""){
					Array_Proveedores[j][2]="Insert";
				}else{
					Array_Proveedores[j][2]="";
				}
			}else{
				Array_Proveedores[j][1]="P";
				if(Array_Proveedores[j][3]!=""){
					Array_Proveedores[j][2]="Delete";
				}else{
					Array_Proveedores[j][2]="";
				}
			}
		}
		
		//console.log(Array_Compradores);
		//console.log(Array_Proveedores);
		
		var Usuario_Sistema=$("#Usuario_Sistema").val();
		
		var strDatos=""; 
		
		
		
		if (evento_nombre.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Nombre del Evento \n";}
		if (evento_nomb_corto.length <= 0) {Agregar = false; mensaje_error += " -Agrega el Nombre Corto del Evento \n";}
		//if (evento_logo.length <= 0) {Agregar = false; mensaje_error += " -Agrega el logo \n";}
		if (evento_desc.length <= 0) {Agregar = false; mensaje_error += " -Agrega la descripción \n";}
		if (evento_sede_hotel.length <= 0) {Agregar = false; mensaje_error += " -Agrega la sede \n";}
		if (evento_ciudad.length <= 0) {Agregar = false; mensaje_error += " -Agrega la ciudad \n";}
		if (evento_fech_i.length <= 0) {Agregar = false; mensaje_error += " -Agrega la fecha inicial \n";}
		if (evento_hora_i.length <= 0) {Agregar = false; mensaje_error += " -Agrega la hora inicial \n";}
		if (evento_fech_f.length <= 0) {Agregar = false; mensaje_error += " -Agrega la fecha final \n";}
		if (evento_hora_f.length <= 0) {Agregar = false; mensaje_error += " -Agrega la hora final \n";}
		//if (evento_pag_web.length <= 0) {Agregar = false; mensaje_error += " -Agrega la página web del evento \n";}
		//if (evento_contactos.length <= 0) {Agregar = false; mensaje_error += " -Agrega los contactos \n";}
		if (evento_raz_social_org.length <= 0) {Agregar = false; mensaje_error += " -Agrega la razón social \n";}
		
		
		
		if (!Agregar) {
			alert(mensaje_error);			
		}
		
		if(Agregar)
		{
			
			if(evento_id.length <= 0)
			{
				strDatos={
					evento_nombre:evento_nombre,
					evento_nomb_corto:evento_nomb_corto,
					evento_logo:evento_logo,
					evento_desc:evento_desc,
					evento_sede_hotel:evento_sede_hotel,
					evento_ciudad:evento_ciudad,
					evento_fech_i:evento_fech_i,
					evento_hora_i:evento_hora_i,
					evento_fech_f:evento_fech_f,
					evento_hora_f:evento_hora_f,
					evento_hora_no_disp_i:evento_hora_no_disp_i,
					evento_hora_no_disp_f:evento_hora_no_disp_f,
					evento_pag_web:evento_pag_web,
					evento_contactos:evento_contactos,
					evento_raz_social_org:evento_raz_social_org,
					evento_servicios: evento_servicios,
					cadena_compradores:cadena_compradores,
					cadena_provedores:cadena_provedores,
					evento_modifico:Usuario_Sistema,
					evento_estatus:"A",
					//Array_Compradores:Array_Compradores,
					Array_Proveedores:Array_Proveedores,
					accion:"guardar_evento"
				};
				
			}
			else
			{
				strDatos={
					evento_id:evento_id,
					evento_nombre:evento_nombre,
					evento_nomb_corto:evento_nomb_corto,
					evento_logo:evento_logo,
					evento_desc:evento_desc,
					evento_sede_hotel:evento_sede_hotel,
					evento_ciudad:evento_ciudad,
					evento_fech_i:evento_fech_i,
					evento_hora_i:evento_hora_i,
					evento_fech_f:evento_fech_f,
					evento_hora_f:evento_hora_f,
					evento_hora_no_disp_i:evento_hora_no_disp_i,
					evento_hora_no_disp_f:evento_hora_no_disp_f,
					evento_pag_web:evento_pag_web,
					evento_contactos:evento_contactos,
					evento_raz_social_org:evento_raz_social_org,
					evento_servicios: evento_servicios,
					cadena_compradores:cadena_compradores,
					cadena_provedores:cadena_provedores,
					evento_modifico:Usuario_Sistema,
					evento_estatus:"M",
					//Array_Compradores:Array_Compradores,
					Array_Proveedores:Array_Proveedores,
					accion:"editar_evento"
				};
				
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
					alert("Ocurrio un error al guardar.");
				}
			});
			
		}
	});
	
	$("#guardar_info_prov").click(function () {	
		var Agregar = true;
		var mensaje_error = "";
		var evento_id=$("#evento_id").val();
		var info_prov_cc=$.trim($("#info_prov_cc").val());
		var info_prov_cco=$.trim($("#info_prov_cco").val());
		var info_prov_titulo=$.trim($("#info_prov_titulo").val());
		var info_prov_msj_fijo=$.trim($("#info_prov_msj_fijo").val());
		var info_prov_msj_variable=CKEDITOR.instances.info_prov_msj_variable.getData();
		var info_prov_msj_pie_pagina=CKEDITOR.instances.info_prov_msj_pie_pagina.getData();
		
		
		var Usuario_Sistema=$("#Usuario_Sistema").val();
		
		var strDatos=""; 
		
		
		
		//if (info_prov_cc.length <= 0) {Agregar = false; mensaje_error += " -Agrega \n";}
		//if (info_prov_cco.length <= 0) {Agregar = false; mensaje_error += " -Agrega \n";}
		if (info_prov_titulo.length <= 0) {Agregar = false; mensaje_error += " -Agrega el título del mensaje \n";}
		if (info_prov_msj_fijo.length <= 0) {Agregar = false; mensaje_error += " -Agrega el mensaje fijo \n";}
		if (info_prov_msj_variable.length <= 0) {Agregar = false; mensaje_error += " -Agrega el mensaje variable \n";}
		if (info_prov_msj_pie_pagina.length <= 0) {Agregar = false; mensaje_error += " -Agrega el pie de página \n";}
		
		
		
		
		if (!Agregar) {
			alert(mensaje_error);			
		}
		
		if(Agregar)
		{
			
			if(evento_id.length > 0)
			{
				strDatos={
					evento_id:evento_id,
					info_prov_cc:info_prov_cc,
					info_prov_cco:info_prov_cco,
					info_prov_titulo:info_prov_titulo,
					info_prov_msj_fijo:info_prov_msj_fijo,
					info_prov_msj_variable:info_prov_msj_variable,
					info_prov_msj_pie_pagina:info_prov_msj_pie_pagina,
					evento_modifico:Usuario_Sistema,
					evento_estatus:"M",
					accion:"guardar_info_prov"
				};
				
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
						alert("Se ha guardao correctamente.");	
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
	
	$("#guardar_form_inscr").click(function () {
		var Agregar = true;
		var mensaje_error = "";
		var evento_id=$("#evento_id").val();
		var form_ins_to=$.trim($("#form_ins_to").val());
		var form_ins_cc=$.trim($("#form_ins_cc").val());
		var form_ins_cco=$.trim($("#form_ins_cco").val());
		var form_ins_titulo=$.trim($("#form_ins_titulo").val());
		var form_ins_msj_variable=CKEDITOR.instances.form_ins_msj_variable.getData();
		var form_ins_msj_pie_pagina=CKEDITOR.instances.form_ins_msj_pie_pagina.getData();
		
		
		var Usuario_Sistema=$("#Usuario_Sistema").val();
		
		var strDatos=""; 
		
		
		if (form_ins_to.length <= 0) {Agregar = false; mensaje_error += " -Agrega el correo a enviar\n";}
		//if (form_ins_cc.length <= 0) {Agregar = false; mensaje_error += " -Agrega \n";}
		//if (form_ins_cco.length <= 0) {Agregar = false; mensaje_error += " -Agrega \n";}
		if (form_ins_titulo.length <= 0) {Agregar = false; mensaje_error += " -Agrega el título del mensaje \n";}
		if (form_ins_msj_variable.length <= 0) {Agregar = false; mensaje_error += " -Agrega el mensaje \n";}
		if (form_ins_msj_pie_pagina.length <= 0) {Agregar = false; mensaje_error += " -Agrega el pie del mensaje \n";}
		
		
		
		
		if (!Agregar) {
			alert(mensaje_error);			
		}
		
		if(Agregar)
		{
			
			if(evento_id.length > 0)
			{
				strDatos={
					evento_id:evento_id,
					form_ins_to:form_ins_to,
					form_ins_cc:form_ins_cc,
					form_ins_cco:form_ins_cco,
					form_ins_titulo:form_ins_titulo,
					form_ins_msj_variable:form_ins_msj_variable,
					form_ins_msj_pie_pagina:form_ins_msj_pie_pagina,
					evento_modifico:Usuario_Sistema,
					evento_estatus:"M",
					accion:"enviar_invitacion_compr"
					//accion:"guardar_form_inscrip"
				};
				
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
						location.reload();
						limpiarcampos();
						alert("Se ha enviado correctamente.");	
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
		$("#liga_externa").html("");
		$("#span_nombre_evento").html("");
		check_compradores();
		//for(var i=0; i<Array_Compradores.length; i++){
		//	Array_Compradores[i][1]="";
		//	Array_Compradores[i][2]="";
		//	Array_Compradores[i][3]="";
		//}
		check_proveedores();
		//for(var i=0; i<Array_Proveedores.length; i++){
		//	Array_Proveedores[i][1]="";
		//	Array_Proveedores[i][2]="";
		//	Array_Proveedores[i][3]="";
		//}
		
		$("#evento_id").val("");
		$("#evento_nombre").val("");
		$("#evento_nomb_corto").val("");
		$("#evento_logo").val("");
		$("#evento_desc").val("");
		$("#evento_sede_hotel").val("");
		$("#evento_ciudad").val("");
		$("#evento_fech_i").val("");
		$("#evento_hora_i").val("");
		$("#evento_fech_f").val("");
		$("#evento_hora_f").val("");
		$("#evento_hora_no_disp_i").val("");
		$("#evento_hora_no_disp_f").val("");
		$("#evento_pag_web").val("");
		$("#evento_contactos").val("");
		$("#evento_raz_social_org").val("");
		$("#evento_servicios").val("");
		var $tag_obj_1 = $('#evento_servicios').data('tag');
		$tag_obj_1.clear();
		var $tag_obj_2 = $('#evento_servicios').data('tag');
		$tag_obj_2.clear();
		//$('#evento_servicios').siblings('.tag').remove();
		$("#guardar").html("Guardar");
		$("#guardar").show();
		$("#cancelar").show();
		
		
		document.getElementById("subir_imagen_logo").value = "";
		$("#ver_imagen_1").hide();
		$("#logo_img").html('');
		
		$("#cadena_compradores").val("");
		$("#cadena_provedores").val("");
		$(".classcompradores").prop("checked",false);
		$(".classproveedores").prop("checked",false);
		
		$("#li_comunicados").hide();
		
		
		
		$("#li_dat_gen").show();
		$("#li_dat_gen").addClass("active");
		$("#li_comunicados").removeClass("active");
		$("#li_compradores").removeClass("active");
		$("#li_proveedores").show();
		$("#li_proveedores").removeClass("active");
		
		$("#dat_gen").addClass("active");
		$("#comunicados").removeClass("active");
		$("#compradores").removeClass("active");
		$("#proveedores").removeClass("active");
		
		
		$("#info_prov_cc").val("");
		$("#info_prov_cco").val("atorres@olemx.com; compradores.vip@mantenimiento-b2b.com");
		$("#info_prov_titulo").val("");
		$("#info_prov_msj_fijo").val("");
		//CKEDITOR.instances['info_prov_msj_variable'].setData('');//$("#info_prov_msj_variable").val("");
		//CKEDITOR.instances['info_prov_msj_pie_pagina'].setData('');//$("#info_prov_msj_pie_pagina").val("");
		
		$("#form_ins_cc").val("");
		$("#form_ins_cco").val("");
		$("#form_ins_titulo").val("");
		//CKEDITOR.instances['form_ins_msj_variable'].setData('');//$("#form_ins_msj_variable").val("");
		//CKEDITOR.instances['form_ins_msj_pie_pagina'].setData('');//$("#form_ins_msj_pie_pagina").val("");
	}

	tabla_eventos();
	check_compradores();
	check_proveedores();
	function tabla_eventos(){
		var tabla="";
		tabla+="	<table class='table table-bordered' id='dataTable'>";
		tabla+="		<thead>";
		tabla+="			<tr>";
		tabla+="				<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Acciones&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>";
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
				tabla+='						<a onclick="pasarvalores('+resultado.data[i].evento_id+')" class="green" href="#noir"><i class="ace-icon fa fa-pencil bigger-130" title="Editar"></i></a>&nbsp;&nbsp;';
				tabla+='						<a onclick="mostrar_comunicados('+resultado.data[i].evento_id+')" class="blue" href="#noir"><i class="ace-icon fa fa-bullhorn" title="Comunicados"></i></a>&nbsp;&nbsp;';
				tabla+='						<a onclick="mostrar_popup_prov('+resultado.data[i].evento_id+')" data-toggle="modal" class="blue" href="#modal_info_proveedores"><i class="ace-icon fa fa-envelope" title="Invitar Proveedores"></i></a>&nbsp;&nbsp;';
				tabla+='						<a style="display:none" onclick="mostrar_popup_comp('+resultado.data[i].evento_id+')" data-toggle="modal" class="orange" href="#modal_form_inscripcion"><i class="ace-icon fa fa-envelope" title="Invitar Compradores"></i></a>';
				tabla+='						<a onclick="agenda_eventos('+resultado.data[i].evento_id+', \''+resultado.data[i].evento_nombre+'\')" class="green" title="Ver Agenda" data-toggle="modal" href="#modal_agenda_eventos"><i class="ace-icon fa fa-calendar" title="Ver Agenda"></i></a>&nbsp;&nbsp;';
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
				"lengthMenu": [
			   	[ 1000, 100000 ],
			   	[ '1000 Filas', 'Todos' ]
			   ],
			   dom: 'Bfrtip',
				 buttons: [
						{
                extend: 'excel',
                title: 'Eventos'
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
	
	pasarvalores=function(id) {
		
		limpiarcampos();
		if (id != "") {
			$("#liga_externa").html(' <a href="https://bsolutionsmx.com/ole/eventos/formulario_registro_event.php?key='+id+'" target="_blank">https://bsolutionsmx.com/ole/eventos/formulario_registro_event.php?key='+id+'</a>');
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
						$('html,body').animate({
							scrollTop: $(".main-content").offset().top
						}, 100);
						var foto="";
						$("#span_nombre_evento").html("Evento: "+data.data[0].evento_nombre);
						$("#evento_id").val(data.data[0].evento_id);
						$("#evento_nombre").val(data.data[0].evento_nombre);
						$("#evento_nomb_corto").val(data.data[0].evento_nomb_corto);
						$("#evento_logo").val(data.data[0].evento_logo);
						$("#evento_desc").val(data.data[0].evento_desc);
						$("#evento_sede_hotel").val(data.data[0].evento_sede_hotel);
						$("#evento_ciudad").val(data.data[0].evento_ciudad);
						$("#evento_fech_i").val(data.data[0].FI);
						$("#evento_hora_i").val(data.data[0].evento_hora_i);
						$("#evento_fech_f").val(data.data[0].FF);
						$("#evento_hora_f").val(data.data[0].evento_hora_f);
						$("#evento_hora_no_disp_i").val(data.data[0].evento_hora_no_disp_i);
						$("#evento_hora_no_disp_f").val(data.data[0].evento_hora_no_disp_f);
						$("#evento_pag_web").val(data.data[0].evento_pag_web);
						$("#evento_contactos").val(data.data[0].evento_contactos);
						$("#evento_raz_social_org").val(data.data[0].evento_raz_social_org);
						$("#cadena_compradores").val(data.data[0].cadena_compradores);
						$("#cadena_provedores").val(data.data[0].cadena_provedores);
						if(data.data[0].evento_logo!=""){
							$("#ver_imagen_1").show();
							//console.log(data.data[0].evento_logo);
							$("#logo_img").html('<img src="'+data.data[0].evento_logo+'" style="width: 50%;height: 50%">');
						}
						/*
						if(data.totalCountComp>0){
							for(var m=0; m<data.totalCountComp; m++){
								$("#check_comp_"+data.datacomprador[m].event_compr_prov_id).prop("checked", true);
								$("#div_check_com"+data.datacomprador[m].event_compr_prov_id).show();
								for(var i=0; i<Array_Compradores.length; i++){
									if(data.datacomprador[m].event_compr_prov_id==Array_Compradores[i][0]){
										Array_Compradores[i][1]="C";
										Array_Compradores[i][2]="";
										Array_Compradores[i][3]=data.datacomprador[m].event_det_id;
									}
								}
							}
						}
						*/
						if(data.totalCountProv>0){
							for(var m=0; m<data.totalCountProv; m++){
								$("#check_prov_"+data.dataproveedor[m].event_compr_prov_id).prop("checked", true);
								$("#div_check_prov"+data.dataproveedor[m].event_compr_prov_id).show();
								for(var i=0; i<Array_Proveedores.length; i++){
									if(data.dataproveedor[m].event_compr_prov_id==Array_Proveedores[i][0]){
										Array_Proveedores[i][1]="P";
										Array_Proveedores[i][2]="";
										Array_Proveedores[i][3]=data.dataproveedor[m].event_det_id;
									}
								}
							}
						}
						
						
						$("#info_prov_cc").val(data.data[0].info_prov_cc);
						if(data.data[0].info_prov_cco!=null){
						$("#info_prov_cco").val(data.data[0].info_prov_cco);
						}
						$("#info_prov_titulo").val(data.data[0].info_prov_titulo);
						$("#info_prov_msj_fijo").val(data.data[0].info_prov_msj_fijo);
						
						if($("#info_prov_msj_fijo").val()==""){
							$("#info_prov_msj_fijo").val("<<EMPRESA>>\n<<CONTACTO>>");
						}
						
						CKEDITOR.instances['info_prov_msj_variable'].setData(data.data[0].info_prov_msj_variable);//$("#info_prov_msj_variable").val(data.data[0].info_prov_msj_variable);
						CKEDITOR.instances['info_prov_msj_pie_pagina'].setData(data.data[0].info_prov_msj_pie_pagina);//$("#info_prov_msj_pie_pagina").val(data.data[0].info_prov_msj_pie_pagina);
						
						//$("#form_ins_cc").val(data.data[0].form_ins_cc);
						//if(data.data[0].form_ins_cco!=null){
						//$("#form_ins_cco").val(data.data[0].form_ins_cco);
						//}
						$("#form_ins_titulo").val("Invitación para el registro del evento "+data.data[0].evento_nombre);
						var msj_variable='<font face="arial" size="2.5">Hola <strong>Comprador</strong></font><br><br>';
						msj_variable+= '<font face="arial" size="2.5">Te invitamos a registrarte al evento '+data.data[0].evento_nombre+' a través del siguiente <a href="https://bsolutionsmx.com/ole/eventos/formulario_registro_event.php?key='+id+'">link</a>.</font><br>';
						msj_variable+= '<font face="arial" size="2.5">Es muy importante que te registres lo antes posible para que puedas reservar tu horario que se acomode con tus actividades.</font><br><br>';
						CKEDITOR.instances['form_ins_msj_variable'].setData(msj_variable);//$("#form_ins_msj_variable").val(data.data[0].form_ins_msj_variable);
						CKEDITOR.instances['form_ins_msj_pie_pagina'].setData('<br><br><font face="arial" size="1"><i>* Este es un envío automatizado, no es necesario responder este correo.</i></font>');//$("#form_ins_msj_pie_pagina").val(data.data[0].form_ins_msj_pie_pagina);
						
						if(data.data[0].evento_servicios!=""){
							var $tag_obj = $('#evento_servicios').data('tag');
							var res = data.data[0].evento_servicios.split(",");
							for(var i=0; i<res.length; i++){
								//alert(res[i]);
								$tag_obj.add($.trim(res[i]));
							}
							$("#evento_servicios").val(data.data[0].evento_servicios);
						}
						//console.log(Array_Compradores);
						//console.log(Array_Proveedores);
						
						
						
					}
				},
				error: function () {
					alert("Ocurrio un error al consultar.");
				}
			});
		}
	}
	
	mostrar_comunicados=function(id){
		pasarvalores(id);
		
		$("#li_dat_gen").hide();
		$("#li_dat_gen").removeClass("active");
		$("#li_compradores").removeClass("active");
		$("#li_proveedores").hide();
		$("#li_proveedores").removeClass("active");
		
		$("#dat_gen").removeClass("active");
		$("#compradores").removeClass("active");
		$("#proveedores").removeClass("active");
		
		$("#li_comunicados").show();
		$("#comunicados").addClass("active");
		$("#li_comunicados").addClass("active");
		
		$("#guardar").hide();
		$("#cancelar").hide();
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
	
	eliminar_comprador=function(reg_compr_id){
		if(reg_compr_id!=""){
			var strDatos="";
			var Usuario_Sistema=$("#Usuario_Sistema").val();
			strDatos = "reg_compr_id="+reg_compr_id;
			strDatos += "&reg_compr_modifico="+Usuario_Sistema;
			strDatos += "&reg_compr_estatus=E";				
			strDatos += "&accion=eliminar";
			

			var bool=confirm("Esta seguro de eliminar el Registro.");
			if(bool){
				$.ajax({
					type: "POST",
					url: "consultas/consultas_reg_compradores.php",        
					async: false,
					data: strDatos,
					dataType: "html",
					beforeSend: function (xhr) {

					},
					success: function (datos) {
						var json;
						json = eval("(" + datos + ")"); //Parsear JSON
						if(json.totalCount>0){
							mostrar_compradores_registrados();
							alert("Eliminado Correctamente.");	
						}else{
							alert(json.mensaje);
						}
					},
					error: function () {
						alert("Ocurrio un error al eliminar.");
					}
				});
			}
		}
		
	}
	
	activar_bloquear=function(reg_compr_id, estatus){
	
		if(reg_compr_id!=""){
			var estat="";
			var strDatos="";
			var Usuario_Sistema=$("#Usuario_Sistema").val();
			var mensaje="";
			if(estatus==0){
				estat="Bloqueado";
				mensaje="Bloquear";
			}
			
			if(estatus==1){
				estat="Activo";
				mensaje="Activar";
			}
			
			strDatos = "reg_compr_id="+reg_compr_id;
			strDatos += "&reg_compr_modifico="+Usuario_Sistema;
			strDatos += "&reg_compr_status="+estat;				
			strDatos += "&accion=bloquear_desbloquear";
			

			var bool=confirm("Esta seguro de "+mensaje+" el Registro.");
			if(bool){
				$.ajax({
					type: "POST",
					url: "consultas/consultas_reg_compradores.php",        
					async: false,
					data: strDatos,
					dataType: "html",
					beforeSend: function (xhr) {

					},
					success: function (datos) {
						var json;
						json = eval("(" + datos + ")"); //Parsear JSON
						if(json.totalCount>0){
							mostrar_compradores_registrados();
							alert(json.mensaje);	
						}else{
							alert(json.mensaje);
						}
					},
					error: function () {
						alert("Ocurrio un error al eliminar.");
					}
				});
			}
		}
		
	}

	enviar_agenda_comprador=function(reg_compr_id){
		if(reg_compr_id!=""){
			var bool=confirm("Esta seguro de enviar la agenda al comprador.");
			if(bool){
				$.ajax({
					type: "POST",
					url: "consultas/consultas_reg_compradores.php",        
					async: false,
					data: {
						accion:"enviar_agenda_comprador",
						reg_compr_id: reg_compr_id
					},
					dataType: "json",
					beforeSend: function (xhr) {

					},
					success: function (datos) {
						var json;
						json = eval("(" + datos + ")"); //Parsear JSON
						mostrar_compradores_registrados();
						alert(json.mensaje);
					},
					error: function () {
						alert("Ocurrio un error al enviar.");
					}
				});
			}
		}else{
			alert("Ocurrio un error, no existe el id del comprador");
		}
	}
	
	enviar_agenda_proveedor=function(prov_id){
		if(prov_id!=""){
			var bool=confirm("Esta seguro de enviar la agenda al proveedor.");
			if(bool){
				$.ajax({
					type: "POST",
					url: "consultas/consultas_reg_compradores.php",        
					async: false,
					data: {
						accion:"enviar_agenda_proveedor",
						prov_id: prov_id,
						evento_id: $("#evento_id").val()
					},
					dataType: "json",
					beforeSend: function (xhr) {

					},
					success: function (datos) {
						var json;
						json = eval("(" + datos + ")"); //Parsear JSON
						alert(json.mensaje);
					},
					error: function () {
						alert("Ocurrio un error al enviar.");
					}
				});
			}
		}else{
			alert("Ocurrio un error, no existe el id del proveedor");
		}
	}
	
	function check_compradores(){
		$('#cmb_compradores').children('option').remove();
		Array_Compradores=[];
		$.ajax({
			type: "POST",
			url: "consultas/consultas_admin_compradores.php",        
			async: false,
			data: {accion: "consultar_comprador_cmb"},
			dataType: "html",
			beforeSend: function (xhr) {

			},
			success: function (datos) {
				var json;
				json = eval("(" + datos + ")"); //Parsear JSON
				if(json.totalCount>0){
					var lista="";
					$('#cmb_compradores').append($('<option selected value="">', { value: "-1" }).text(""));
					for(var i=0; i<json.totalCount; i++){
						var array=[];
						Array_Compradores[i]=[json.data[i].compr_id,'','',''];
						lista+='<div id="div_check_com'+json.data[i].compr_id+'" style="display:none">';
						lista+='<div class="checkbox" style="display:none">';
						lista+='	<label>';
						lista+='		<input value="'+json.data[i].compr_id+'" id="check_comp_'+json.data[i].compr_id+'" type="checkbox" class="ace classcompradores" name="orderBoxComp[]" onchange="pasarcheckcomp()">';
						lista+='		<span class="lbl"> </span>';
						lista+='	</label>';
						lista+='</div>';
						lista+='<label class="lbl" id="lbl_comp_'+json.data[i].compr_id+'" >';
						lista+='	<a onclick="quitar_comprador('+json.data[i].compr_id+')" class="red" title="Eliminar" href="#noir"><i class="ace-icon fa fa-trash-o bigger-130" title="Eliminar"></i></a> ';
						lista+='	<a href="./admin_compradores.php?id='+json.data[i].compr_id+'" target="_blank" title="Ir a Compradores">'+json.data[i].compr_dat_per_nombres+' '+json.data[i].compr_dat_per_ap_pat+' '+json.data[i].compr_dat_per_ap_mat+' ('+json.data[i].compr_dat_emp_nomcomercial+')</a>';
						lista+='</label></br>';
						lista+='</div>';
						$('#cmb_compradores').append($('<option>', { value: json.data[i].compr_id }).text(json.data[i].compr_dat_per_nombres+' '+json.data[i].compr_dat_per_ap_pat+' '+json.data[i].compr_dat_per_ap_mat+' ('+json.data[i].compr_dat_emp_nomcomercial+')'));
					}
					$("#check_compradores").html(lista);
					
					//console.log(Array_Compradores);
					
				}else{
					alert("No existen compradores");
				}
				
				
			},
			error: function () {
				alert("currio un error al guardar.");
			}
		});
	}
	function agregar_compradores(){
		var cmb_compradores=$("#cmb_compradores").val();
		if(cmb_compradores!=""){
			$("#check_comp_"+cmb_compradores).prop("checked", true);
			$("#div_check_com"+cmb_compradores).show();
			$("#modal_agregar_compradores").modal("hide");
			
		}else{
			alert("Selecciona una opción");
		}
	}
	
	function quitar_comprador(id){
		$("#check_comp_"+id).prop("checked", false);
		$("#div_check_com"+id).hide();
	}
	
	function check_proveedores(){
		$('#cmb_proveedores').children('option').remove();
		Array_Proveedores=[];
		$.ajax({
			type: "POST",
			url: "consultas/consultas_admin_proveedores.php",        
			async: false,
			data: {accion: "consultar_proveedores_cmb"},
			dataType: "html",
			beforeSend: function (xhr) {

			},
			success: function (datos) {
				var json;
				json = eval("(" + datos + ")"); //Parsear JSON
				if(json.totalCount>0){
					var lista="";
					$('#cmb_proveedores').append($('<option selected value="">', { value: "-1" }).text(""));
					for(var i=0; i<json.totalCount; i++){
						Array_Proveedores[i]=[json.data[i].prov_id,'','',''];
						lista+='<div id="div_check_prov'+json.data[i].prov_id+'" style="display:none">';
						lista+='<div class="checkbox" style="display:none">';
						lista+='	<label>';
						lista+='		<input value="'+json.data[i].prov_id+'" id="check_prov_'+json.data[i].prov_id+'" type="checkbox" class="ace classproveedores" name="orderBoxProv[]" onchange="pasarcheckprov()">';
						lista+='		<span class="lbl"></span>';
						lista+='	</label>';
						lista+='</div>';
						lista+='<label class="lbl" id="lbl_prov_'+json.data[i].prov_id+'" >';
						lista+='	<a onclick="quitar_proveedor('+json.data[i].prov_id+')" class="red" title="Eliminar" href="#noir"><i class="ace-icon fa fa-trash-o bigger-130" title="Eliminar"></i></a> &nbsp;';
						lista+='	<a onclick="enviar_agenda_proveedor('+json.data[i].prov_id+')" class="blue" title="Eliminar" href="#noir"><i class="ace-icon fa fa-calendar" title="Enviar Agenda al Proveedor" style="font-size:18px"></i></a> &nbsp;';
						lista+='	<a href="./admin_proveedores.php?id='+json.data[i].prov_id+'" target="_blank" title="Ir a Proveedores">'+json.data[i].prov_dat_emp_nomcomercial+'</a>';
						
						lista+='</label></br>';
						lista+='</div>';
						$('#cmb_proveedores').append($('<option>', { value: json.data[i].prov_id }).text(json.data[i].prov_dat_emp_nomcomercial+':::'+json.data[i].prov_dat_per_nombres+' '+json.data[i].prov_dat_per_ap_pat+' '+json.data[i].prov_dat_per_ap_mat));
					}
					$("#check_provedores").html(lista);
					
				}else{
					alert("No existen compradores");
				}
				
				
			},
			error: function () {
				alert("currio un error al guardar.");
			}
		});
	}
	
	function agregar_proveedores(){
		var cmb_proveedores=$("#cmb_proveedores").val();
		if(cmb_proveedores!=""){
			$("#check_prov_"+cmb_proveedores).prop("checked", true);
			$("#div_check_prov"+cmb_proveedores).show();
			$("#modal_agregar_proveedores").modal("hide");
			
		}else{
			alert("Selecciona una opción");
		}
	}
	
	function quitar_proveedor(id){
		$("#check_prov_"+id).prop("checked", false);
		$("#div_check_prov"+id).hide();
	}
	
	pasarcheckcomp=function(){
        var checkboxValues = "";
        $('input[name="orderBoxComp[]"]:checked').each(function() { checkboxValues += $(this).val() + ","; });
        checkboxValues = checkboxValues.substring(0, checkboxValues.length-1);
        $("#cadena_compradores").val(checkboxValues);
    }
	
	pasarcheckprov=function()
    {   
        var checkboxValues = "";
        $('input[name="orderBoxProv[]"]:checked').each(function() { checkboxValues += $(this).val() + ","; });
        checkboxValues = checkboxValues.substring(0, checkboxValues.length-1);
        $("#cadena_provedores").val(checkboxValues);
    }
	
	mostrar_popup_prov=function(id) {
		$("#hdd_evento_id_proveed").val("");
		$("#cadena_envia_proveedores").val("");
		$("#enviar_proveedores").html("");
		if (id != "") {
			listcheckprov(id);
		}
	}
	
	agenda_eventos=function(id, evento) {
		$("#title_modal_evento").html("Agenda Evento: "+evento);
		$("#agenda_eventos").html("");
		if (id != "") {
			var iframe='<iframe width="100%" height="615" src="eventos_agenda.php?evento='+id+'" frameborder="0" allowfullscreen></iframe> ';	
			$("#agenda_eventos").html(iframe);	
			//$.ajax({
			//  type: "GET", 
			//  url : "eventos_agenda.php",
			//  data: {
			//	evento: id
			//  },
			//  success : function (data) { 
			//	$("#agenda_eventos").html(data); 
			//  }
			//});
		}
	}
	
	listcheckprov=function(id){
		$.ajax({
			type: "POST",
			url: "consultas/consultas_admin_eventos.php", 
			async: false,
			data: {
				evento_id: id,
				event_tipo: "p",
				accion: "consultar_det_prov"
			},
			dataType: "html",
			beforeSend: function (xhr) {

			},
			success: function (data) {
				data = eval("(" + data + ")");
				if (data.totalCount > 0) {
					$("#hdd_evento_id_proveed").val(id);
					var enviar="";
					
					for(var m=0; m<data.totalCount; m++){
						enviar+='<div class="checkbox">';
						enviar+='	<label>	';
						enviar+='		<input value="'+data.data[m]["event_det_id"]+'" name="orderBoxProveedor[]" id="check_envi_prov_'+data.data[m]["event_det_id"] +'" type="checkbox" onchange="pasarcheckproveedor()" class="ace">';		
						enviar+='		<span class="lbl"> '+data.data[m]["nombre"] +'</span>	';
						if(data.data[m]["evento_enviado"]==1){
							enviar+='		<span class="lbl" style="color: green;"> (Enviado)</span>	';
						}else{
							enviar+='		<span class="lbl" style="color: red;"> (No Enviado)</span>	';
						}
						enviar+='	</label>';
						enviar+='</div>';
					}
					$("#enviar_proveedores").html(enviar);
					
				}else{
					$("#enviar_proveedores").html("<div align='center'><label>No Existe Información para Enviar</label></div>");
				}
			},
			error: function () {
				alert("Ocurrio un error al consultar.");
			}
		});
	}
	
	mostrar_popup_comp=function(id) {
		$("#hdd_evento_id_comp").val("");
		$("#cadena_envia_compradores").val("");
		$("#enviar_compradores").html("");
		if (id != "") {
			listcheckcomp(id);
		}
	}
	
	listcheckcomp=function(id){
		$.ajax({
			type: "POST",
			url: "consultas/consultas_admin_eventos.php", 
			async: false,
			data: {
				evento_id: id,
				event_tipo: "C",
				accion: "consultar_det_compr"
			},
			dataType: "html",
			beforeSend: function (xhr) {

			},
			success: function (data) {
				data = eval("(" + data + ")");
				if (data.totalCount > 0) {
					$("#hdd_evento_id_comp").val(id);
					var enviar="";
					
					for(var m=0; m<data.totalCount; m++){
						enviar+='<div class="checkbox">';
						enviar+='	<label>	';
						enviar+='		<input value="'+data.data[m]["event_det_id"] +'" id="check_envi_compr_'+data.data[m]["event_det_id"] +'" name="orderBoxCompradores[]" type="checkbox" onchange="pasarcheckcompradores()" class="ace">';		
						enviar+='		<span class="lbl"> '+data.data[m]["nombre"] +'</span>	';
						if(data.data[m]["evento_enviado"]==1){
							enviar+='		<span class="lbl" style="color: green;"> (Enviado)</span>	';
						}else{
							enviar+='		<span class="lbl" style="color: red;"> (No Enviado)</span>	';
						}
						enviar+='	</label>';
						enviar+='</div>';
					}
					$("#enviar_compradores").html(enviar);
					
				}else{
					$("#enviar_compradores").html("<div align='center'><label>No Existe Información para Enviar</label></div>");
				}
			},
			error: function () {
				alert("Ocurrio un error al consultar.");
			}
		});
	}
	
	pasarcheckproveedor=function()
    {	
        var checkboxValues = "";
        $('input[name="orderBoxProveedor[]"]:checked').each(function() { checkboxValues += $(this).val() + ","; });
        checkboxValues = checkboxValues.substring(0, checkboxValues.length-1);
        $("#cadena_envia_proveedores").val(checkboxValues);
    }
	
	pasarcheckcompradores=function()
    {
        var checkboxValues = "";
        $('input[name="orderBoxCompradores[]"]:checked').each(function() { checkboxValues += $(this).val() + ","; });
        checkboxValues = checkboxValues.substring(0, checkboxValues.length-1);
        $("#cadena_envia_compradores").val(checkboxValues);
    }
	
	enviar_notifi_proveedor=function(){
		var cadena_envia_proveedores=$("#cadena_envia_proveedores").val();
		var evento_id=$("#hdd_evento_id_proveed").val();
		if(cadena_envia_proveedores!=""){
			
			var bool=confirm("Esta seguro de enviar la notificación.");
			if(bool){	
				$.ajax({
					type: "POST",
					url: "consultas/consultas_admin_eventos.php",        
					async: true,
					data: {
						evento_id:evento_id,
						cadena_notif:cadena_envia_proveedores,
						accion:"envia_notificacion_proveedores"
					} ,
					dataType: "html",
					beforeSend: function (xhr) {
						$("#gif1").show();
					},
					success: function (datos) {
						var json;
						json = eval("(" + datos + ")"); //Parsear JSON
						if(json.totalCount>0){
							$("#gif1").hide();
						}else{
							$("#gif1").hide();
						}
						$("#cadena_envia_proveedores").val("");
						listcheckprov(evento_id);
					},
					error: function () {
						alert("ocurrio un error al enviar.");
						$("#gif1").hide();
					}
				});
			}
		}
		else{
			alert("Selecciona los proveedores");
		}
	}
	
	enviar_notifi_comprador=function(){
		var cadena_envia_compradores=$("#cadena_envia_compradores").val();
		var evento_id=$("#hdd_evento_id_comp").val();
		if(cadena_envia_compradores!=""){
			var bool=confirm("Esta seguro de enviar la notificación.");
			if(bool){
				$.ajax({
					type: "POST",
					url: "consultas/consultas_admin_eventos.php",        
					async: true,
					data: {
						evento_id:evento_id,
						cadena_notif:cadena_envia_compradores,
						accion:"envia_notificacion_compradores"
					} ,
					dataType: "html",
					beforeSend: function (xhr) {
						$("#gif2").show();
					},
					success: function (datos) {
						var json;
						json = eval("(" + datos + ")"); //Parsear JSON
						if(json.totalCount>0){
							$("#gif2").hide();
						}else{
							$("#gif2").hide();
						}
						$("#cadena_envia_compradores").val("");
						listcheckcomp(evento_id);
					},
					error: function () {
						alert("ocurrio un error al enviar.");
						$("#gif2").hide();
					}
				});
			}
		}else{
			alert("Selecciona los compradores");
		}
	}
	
	mostrar_compradores_registrados=function(){
		$("#tabla_compradores_registrados").html("");
		if($("#evento_id").val()!=""){
			var tabla="";
			tabla+="	<table class='table table-bordered'  cellspacing='0' id='dataTableCompradores' style='overflow-x:auto; width:100%'  >";
			tabla+="		<thead>";
			tabla+="			<tr>";
			tabla+="				<th style='width:20%'>Acciones</th>";
			tabla+="				<th style='width:20%'>Estatus</th>";
			tabla+="				<th style='width:20%'>Nombre Completo</th>";
			tabla+="				<th style='width:20%'>Correo</th>";
			tabla+="				<th style='width:10%'>Teléfono</th>";
			tabla+="				<th style='width:20%'>Razón Social</th>";
			tabla+="				<th style='width:10%'>Fech/Hora Registro</th>";
			tabla+="			</tr>";
			tabla+="		</thead>";
			var resultado=new Array();
			data={
					evento_id: $("#evento_id").val(),
					accion: "consultar"
			};
			resultado=cargo_cmb("consultas/consultas_reg_compradores.php",false, data);
			if(resultado.totalCount>0){
			tabla+="		<tbody>";
				for(var i = 0; i < resultado.totalCount; i++){
					tabla+="			<tr>";
					tabla+='				<td align="center" style="width:20%">';
					tabla+='					<div class="">';
					tabla+='						<a class="green" href="formularios_registro/vista_form_eventos.php?key='+resultado.data[i].reg_compr_id+'" target="_blank"><i class="ace-icon glyphicon glyphicon-list" title="Ver registro del comprador"></i></a>&nbsp;&nbsp;';
					tabla+='						<a onclick="eliminar_comprador('+resultado.data[i].reg_compr_id+')" class="red" title="Eliminar Comprador Registrado" href="#noir"><i class="ace-icon fa fa-trash-o bigger-130" title="Eliminar Comprador Registrado"></i></a>&nbsp;&nbsp;';
					if(resultado.data[i].reg_compr_status[0]=="A"){
						tabla+='						<a onclick="activar_bloquear('+resultado.data[i].reg_compr_id+', 0)" class="red" title="Bloquear Comprador Registrado" href="#noir"><i class="ace-icon fa fa-lock bigger-130" title="Bloquear Comprador Registrado"></i></a>&nbsp;&nbsp;';
						tabla+='						<a onclick="enviar_agenda_comprador('+resultado.data[i].reg_compr_id+')" class="yellow" href="#noir"><i class="ace-icon fa fa-calendar" title="Enviar Agenda al Comprador"></i></a>&nbsp;&nbsp;';
					}
					
					if(resultado.data[i].reg_compr_status[0]=="B"){
						tabla+='						<a onclick="activar_bloquear('+resultado.data[i].reg_compr_id+', 1)" class="blue" title="Activar Comprador Registrado" href="#noir"><i class="ace-icon fa fa-unlock bigger-130" title="Activar Comprador Registrado"></i></a>&nbsp;&nbsp;';
					}
					tabla+='					</div>';
					tabla+='				</td>';
					tabla+="				<td style='width:20%'>";
					if(resultado.data[i].reg_compr_status[0]=="A"){
						tabla+=					"Activo";
					}
					if(resultado.data[i].reg_compr_status[0]=="B"){
						tabla+=					"Bloqueado";
					}
					
					tabla+="				</td>";
					tabla+="				<td style='width:20%'>"+resultado.data[i].reg_compr_dat_per_nombres+" "+resultado.data[i].reg_compr_dat_per_ap_pat+" "+resultado.data[i].reg_compr_dat_per_ap_mat+"</td>";	
					tabla+="				<td style='width:20%'>"+resultado.data[i].reg_compr_dat_per_email+"</td>";
					tabla+="				<td style='width:10%'>"+resultado.data[i].reg_compr_dat_per_celular+"</td>";
					tabla+="				<td style='width:20%'>"+resultado.data[i].reg_compr_dat_emp_raz_soc+"</td>";
					tabla+="				<td style='width:10%'>"+resultado.data[i].reg_compr_time_stamp+"</td>";
					tabla+="			</tr>";
					
				}
			tabla+="		</tbody>";	
			}
			tabla+="	</table>";
		
			setTimeout(function(){
				$("#tabla_compradores_registrados").html(tabla);
				$('#dataTableCompradores').DataTable({
						
						"lengthMenu": [
							[ 1000, 100000 ],
							[ '1000 Filas', 'Todos' ]
						 ],
						 dom: 'Bfrtip',
						 buttons: [
								{
										extend: 'excel',
										title: 'Compradores Registrados'
								}
						 ],
						 "scrollY": 300,
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
				}, 100);	
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//Img_Activo();
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



var input = document.querySelector('input[id=subir_imagen_logo]');
input.onchange = function () {
	var formData = new FormData();	
	var file = input.files[0];
	
	formData.append('file',file);
	$.ajax({
		url: 'upload.php',
		type: 'post',
		data: formData,
		contentType: false,
		processData: false,
		success: function(response) {
			if (response != 0) {
				$("#evento_logo").val(response);
				$("#logo_img").html('<img src="'+response+'" style="width: 50%;height: 50%">');
				$("#ver_imagen_1").show();
				document.getElementById("subir_imagen_logo").value = "";
			} else {
				$("#evento_logo").val("");
				$("#logo_img").html('');
				$("#ver_imagen_1").hide();
				document.getElementById("subir_imagen_logo").value = "";
				alert('Solo se permiten Extensiones .jpg y .png');
			}
		}
	});
	return false;	
/*	Guardar en formato base64	
  var file = input.files[0],
    reader = new FileReader();

  reader.onloadend = function () {
	//console.log(reader);  
    // Since it contains the Data URI, we should remove the prefix and keep only Base64 string
    
    //console.log(reader.result); //-> "R0lGODdhAQABAPAAAP8AAAAAACwAAAAAAQABAAACAkQBADs="
	if(reader.result.substring(0,15)=="data:image/jpeg"||reader.result.substring(0,14)=="data:image/png"){
		var b64 = reader.result.replace(/^data:.+;base64,/, '');
		$("#evento_logo").val(b64);
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
*/
};
</script>