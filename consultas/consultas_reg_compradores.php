<?php
require_once("CURL.php");
include_once("../datos/dtotojson/DtoToJson.Class.php");
include_once("../datos/json/JsonEncod.Class.php");
include_once("../datos/json/JsonDecod.Class.php");
include_once("../datos/connect/Proveedor.Class.php");
class consultas {
	public function __construct() {
	}
	
	public function consultar($reg_compr_id, $evento_id){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$sql=" 
			select * from eventos_reg_compradores where reg_compr_estatus<>'E'
		";
		
		if($reg_compr_id!=""){
			$sql.=" 
				and reg_compr_id=".$reg_compr_id."
			";				
		}
		
		if($evento_id!=""){
			$sql.=" 
				and evento_id=".$evento_id."
			";				
		}
		
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					$Data= array(
						"reg_compr_id"=>rtrim(ltrim($row["reg_compr_id"])),
						"evento_id"=>rtrim(ltrim($row["evento_id"])),
						"reg_compr_dat_per_ap_pat"=>rtrim(ltrim($row["reg_compr_dat_per_ap_pat"])),
						"reg_compr_dat_per_ap_mat"=>rtrim(ltrim($row["reg_compr_dat_per_ap_mat"])),
						"reg_compr_dat_per_nombres"=>rtrim(ltrim($row["reg_compr_dat_per_nombres"])),
						"reg_compr_dat_per_cargo"=>rtrim(ltrim($row["reg_compr_dat_per_cargo"])),
						"reg_compr_dat_per_celular"=>rtrim(ltrim($row["reg_compr_dat_per_celular"])),
						"reg_compr_dat_per_email"=>rtrim(ltrim($row["reg_compr_dat_per_email"])),
						"reg_compr_dat_per_foto"=>rtrim(ltrim($row["reg_compr_dat_per_foto"])),
						"reg_compr_dat_per_nivel_des_com"=>rtrim(ltrim($row["reg_compr_dat_per_nivel_des_com"])),
						"reg_compr_dat_emp_raz_soc"=>rtrim(ltrim($row["reg_compr_dat_emp_raz_soc"])),
						"reg_compr_dat_emp_anio_est"=>rtrim(ltrim($row["reg_compr_dat_emp_anio_est"])),
						"reg_compr_dat_emp_cant_estblmts"=>rtrim(ltrim($row["reg_compr_dat_emp_cant_estblmts"])),
						"reg_compr_dat_emp_giro"=>rtrim(ltrim($row["reg_compr_dat_emp_giro"])),
						"reg_compr_dat_emp_giro_otro"=>rtrim(ltrim($row["reg_compr_dat_emp_giro_otro"])),
						"reg_compr_dat_emp_calle"=>rtrim(ltrim($row["reg_compr_dat_emp_calle"])),
						"reg_compr_dat_emp_num_ext"=>rtrim(ltrim($row["reg_compr_dat_emp_num_ext"])),
						"reg_compr_dat_emp_num_int"=>rtrim(ltrim($row["reg_compr_dat_emp_num_int"])),
						"reg_compr_dat_emp_colonia"=>rtrim(ltrim($row["reg_compr_dat_emp_colonia"])),
						"reg_compr_dat_emp_cp"=>rtrim(ltrim($row["reg_compr_dat_emp_cp"])),
						"reg_compr_dat_emp_ciudad"=>rtrim(ltrim($row["reg_compr_dat_emp_ciudad"])),
						"reg_compr_dat_emp_estado"=>rtrim(ltrim($row["reg_compr_dat_emp_estado"])),
						"reg_compr_dat_emp_pais"=>rtrim(ltrim($row["reg_compr_dat_emp_pais"])),
						"reg_compr_dat_emp_telef_directo"=>rtrim(ltrim($row["reg_compr_dat_emp_telef_directo"])),
						"reg_compr_dat_emp_telef_directo_ext"=>rtrim(ltrim($row["reg_compr_dat_emp_telef_directo_ext"])),
						"reg_compr_dat_emp_pag_web"=>rtrim(ltrim($row["reg_compr_dat_emp_pag_web"])),
						"reg_compr_dat_emp_asistente"=>rtrim(ltrim($row["reg_compr_dat_emp_asistente"])),
						"reg_compr_dat_emp_proc_comp"=>rtrim(ltrim($row["reg_compr_dat_emp_proc_comp"])),
						"reg_compr_obj_asistir"=>rtrim(ltrim($row["reg_compr_obj_asistir"])),
						"reg_compr_lineas_ints"=>rtrim(ltrim($row["reg_compr_lineas_ints"])),
						"reg_compr_invt_empr_serv"=>rtrim(ltrim($row["reg_compr_invt_empr_serv"])),
						"reg_compr_partpn_ant"=>rtrim(ltrim($row["reg_compr_partpn_ant"])),
						"reg_compr_partpn_ant_evento"=>rtrim(ltrim($row["reg_compr_partpn_ant_evento"])),
						"reg_compr_cert_inf"=>rtrim(ltrim($row["reg_compr_cert_inf"])),
						"reg_compr_estatus"=>rtrim(ltrim($row["reg_compr_estatus"])),
						"reg_compr_status"=>rtrim(ltrim($row["reg_compr_status"])),
						"reg_compr_time_stamp"=>rtrim(ltrim($row["reg_compr_time_stamp"])),
						"reg_compr_modifico"=>rtrim(ltrim($row["reg_compr_modifico"]))
					);
					array_push($Data_Envia, $Data);
				}
			}
		}else{
			$Error=true;
		}
		$proveedor->close();
		
		$respuesta = array("totalCount" => count($Data_Envia),"data" => $Data_Envia,"estatus" => "ok", "mensaje" => "Registros Encontrados");
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}
	
	public function guardar($evento_id, $reg_compr_dat_per_ap_pat, $reg_compr_dat_per_ap_mat, $reg_compr_dat_per_nombres, $reg_compr_dat_per_cargo, $reg_compr_dat_per_celular, $reg_compr_dat_per_email, $reg_compr_dat_per_foto, $reg_compr_dat_per_nivel_des_com, $reg_compr_dat_emp_raz_soc, $reg_compr_dat_emp_anio_est, $reg_compr_dat_emp_cant_estblmts, $reg_compr_dat_emp_giro, $reg_compr_dat_emp_giro_otro, $reg_compr_dat_emp_calle, $reg_compr_dat_emp_num_ext, $reg_compr_dat_emp_num_int, $reg_compr_dat_emp_colonia, $reg_compr_dat_emp_cp, $reg_compr_dat_emp_ciudad, $reg_compr_dat_emp_estado, $reg_compr_dat_emp_pais, $reg_compr_dat_emp_telef_directo, $reg_compr_dat_emp_telef_directo_ext, $reg_compr_dat_emp_pag_web, $reg_compr_dat_emp_asistente, $reg_compr_dat_emp_proc_comp, $reg_compr_obj_asistir, $reg_compr_lineas_ints, $reg_compr_invt_empr_serv, $reg_compr_partpn_ant, $reg_compr_partpn_ant_evento, $reg_compr_cert_inf, $reg_compr_estatus, $reg_compr_status, $reg_compr_modifico, $envio_mail){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		$Error=false;
		$Idmaximo="";
		
		$repetidos = new Proveedor('mysql', 'eventos');
		$repetidos->connect();
		//Obtengo el Id Maximo
		$sql_repetidos=" select * from eventos_reg_compradores where rtrim(ltrim(reg_compr_dat_per_ap_pat))='".$reg_compr_dat_per_ap_pat."' and rtrim(ltrim(reg_compr_dat_per_ap_mat))='".$reg_compr_dat_per_ap_mat."' and rtrim(ltrim(reg_compr_dat_per_nombres))='".$reg_compr_dat_per_nombres."' and rtrim(ltrim(evento_id))=".$evento_id." and reg_compr_estatus<>'E' ";
		$repetidos->execute($sql_repetidos);
		
		if (!$repetidos->error()){
			if ($repetidos->rows($repetidos->stmt) == 0) {
				$proveedor_M = new Proveedor('mysql', 'eventos');
				$proveedor_M->connect();
				//Obtengo el Id Maximo
				$valormaximo=" select CASE when max(reg_compr_id+1) IS NULL then 1 else (max(reg_compr_id + 1)) end as IndiceMaximo from eventos_reg_compradores ";
				$proveedor_M->execute($valormaximo);
				
				if (!$proveedor_M->error()){
					if ($proveedor_M->rows($proveedor_M->stmt) > 0) {
						$row_max = $proveedor_M->fetch_array($proveedor_M->stmt, 0);
						$Idmaximo=$row_max["IndiceMaximo"];
						
						$proveedor = new Proveedor('mysql', 'eventos');
						$proveedor->connect();	
						$strSQL="insert into eventos_reg_compradores ";
						$strSQL.="(
												reg_compr_id
												,evento_id
												,reg_compr_dat_per_ap_pat
												,reg_compr_dat_per_ap_mat
												,reg_compr_dat_per_nombres
												,reg_compr_dat_per_cargo
												,reg_compr_dat_per_celular
												,reg_compr_dat_per_email
												,reg_compr_dat_per_foto
												,reg_compr_dat_per_nivel_des_com
												,reg_compr_dat_emp_raz_soc
												,reg_compr_dat_emp_anio_est
												,reg_compr_dat_emp_cant_estblmts
												,reg_compr_dat_emp_giro
												,reg_compr_dat_emp_giro_otro
												,reg_compr_dat_emp_calle
												,reg_compr_dat_emp_num_ext
												,reg_compr_dat_emp_num_int
												,reg_compr_dat_emp_colonia
												,reg_compr_dat_emp_cp
												,reg_compr_dat_emp_ciudad
												,reg_compr_dat_emp_estado
												,reg_compr_dat_emp_pais
												,reg_compr_dat_emp_telef_directo
												,reg_compr_dat_emp_telef_directo_ext
												,reg_compr_dat_emp_pag_web
												,reg_compr_dat_emp_asistente
												,reg_compr_dat_emp_proc_comp
												,reg_compr_obj_asistir
												,reg_compr_lineas_ints
												,reg_compr_invt_empr_serv
												,reg_compr_partpn_ant
												,reg_compr_partpn_ant_evento
												,reg_compr_cert_inf
												,reg_compr_estatus
												,reg_compr_status
												,reg_compr_time_stamp
												,reg_compr_modifico
											) "; 
						$strSQL.="VALUES ";
						$strSQL.="(
												".$Idmaximo."
												,".$evento_id."
												,'".$reg_compr_dat_per_ap_pat."'
												,'".$reg_compr_dat_per_ap_mat."'
												,'".$reg_compr_dat_per_nombres."'
												,'".$reg_compr_dat_per_cargo."'
												,'".$reg_compr_dat_per_celular."'
												,'".$reg_compr_dat_per_email."'
												,'".$reg_compr_dat_per_foto."'
												,'".$reg_compr_dat_per_nivel_des_com."'
												,'".$reg_compr_dat_emp_raz_soc."'
												,'".$reg_compr_dat_emp_anio_est."'
												,'".$reg_compr_dat_emp_cant_estblmts."'
												,'".$reg_compr_dat_emp_giro."'
												,'".$reg_compr_dat_emp_giro_otro."'
												,'".$reg_compr_dat_emp_calle."'
												,'".$reg_compr_dat_emp_num_ext."'
												,'".$reg_compr_dat_emp_num_int."'
												,'".$reg_compr_dat_emp_colonia."'
												,'".$reg_compr_dat_emp_cp."'
												,'".$reg_compr_dat_emp_ciudad."'
												,'".$reg_compr_dat_emp_estado."'
												,'".$reg_compr_dat_emp_pais."'
												,'".$reg_compr_dat_emp_telef_directo."'
												,'".$reg_compr_dat_emp_telef_directo_ext."'
												,'".$reg_compr_dat_emp_pag_web."'
												,'".$reg_compr_dat_emp_asistente."'
												,'".$reg_compr_dat_emp_proc_comp."'
												,'".$reg_compr_obj_asistir."'
												,'".$reg_compr_lineas_ints."'
												,'".$reg_compr_invt_empr_serv."'
												,'".$reg_compr_partpn_ant."'
												,'".$reg_compr_partpn_ant_evento."'
												,".$reg_compr_cert_inf."
												,'A'
												,'A'
												,now()
												,'".$reg_compr_modifico."'
											)"; 
						$proveedor->execute($strSQL);
						
						if (!$proveedor->error()){
							//Envia correo desde pagina web
							if($envio_mail=="1"){
								//Envia Email
								$proveedor_evento = new Proveedor('mysql', 'eventos');
								$proveedor_evento->connect();
								$sql_evento=" 
									select * from eventos_admin where evento_estatus<>'E' and evento_id=".$evento_id."
								";
								
								$proveedor_evento->execute($sql_evento);
								if (!$proveedor_evento->error()){
									if ($proveedor_evento->rows($proveedor_evento->stmt) > 0) {
										while ($row_evento = $proveedor_evento->fetch_array($proveedor_evento->stmt, 0)) {
											$this->envia_email_evento($row_evento["evento_nombre_corto"], $Idmaximo, $reg_compr_dat_per_nombres.' '.$reg_compr_dat_per_ap_pat.' '.$reg_compr_dat_per_ap_mat, $row_evento["evento_nombre"], $evento_id, $reg_compr_dat_emp_raz_soc, $row_evento["evento_reg_compr_footer"], $reg_compr_dat_per_email);
										}
									}
								}
								//Fin Envia Email								
							}
							//Envia correo desde liga externa
							if($envio_mail=="2"){
								//Sigues aqui
							}
						}else{
							$Error=true;
						}
						
						$proveedor->close();
					
					}
				}else{
					$Error=true;
				}
				
				$proveedor_M->close();
				
				
				
				if($Error==false){
					
					$respuesta = array("totalCount" => "1","id" =>$Idmaximo, "estatus" => "ok", "mensaje" => "Se ha registrado correctamente");
				}else{
					$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al registrar");
				}
				
			}else{
				$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ya te encuentras registrado para este evento.");
			}
		}else{
			$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al buscar repetidos.");
		}
		
		
		
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}
	
	public function envia_email_evento($evento_nombre_corto, $reg_compr_id, $nombre_completo_comprador, $evento_nombre, $evento_id, $reg_compr_dat_emp_raz_soc, $reg_compr_footer, $email){
		$Subject=$evento_nombre_corto.": Registro de Comprador ID: ".$reg_compr_id;
		$Subject=str_replace("á", "a|", $Subject);
		$Subject=str_replace("Á", "A|", $Subject);
		$Subject=str_replace("é", "e|", $Subject);
		$Subject=str_replace("É", "E|", $Subject);
		$Subject=str_replace("í", "i|", $Subject);
		$Subject=str_replace("Í", "I|", $Subject);
		$Subject=str_replace("ó", "o|", $Subject);
		$Subject=str_replace("Ó", "O|", $Subject);
		$Subject=str_replace("ú", "u|", $Subject);
		$Subject=str_replace("Ú", "U|", $Subject);
		$Subject=str_replace("ñ", "n|", $Subject);
		$Subject=str_replace("Ñ", "N|", $Subject);
	
	
		$body='<font face="arial" size="2.5">Hola '.$nombre_completo_comprador.',</font><br><br>';
		$body.='<font face="arial" size="2.5">Agradecemos su registro al evento '.$evento_nombre.'</font><br>';
		$body.='<font face="arial" size="2.5">Evento ID: '.$evento_id.'</font><br>';
		$body.='<font face="arial" size="2.5">Empresa: '.$reg_compr_dat_emp_raz_soc.'</font><br><br>';
		$body.='<font face="arial" size="2.5"><a href="https://bsolutionsmx.com/ole/eventos/formularios_registro/vista_form_eventos.php?key='.$reg_compr_id.'">Ver detalle del registro</a></font><br><br>';
		$body.='<font face="arial" size="2.5">Próximamente estará recibiendo por este mismo medio información y contenido del evento.</font><br><br>';
		$body.='<font face="arial" size="2.5">Cualquier duda estamos a sus órdenes</font><br><br>';
		$body.='<font face="arial" size="2.5">'.$reg_compr_footer.'</font><br>';
		$body.='<br><br><br><font face="arial" size="1"><i>* Este es un envío automatizado, no es necesario responder este correo.</i></font>';
		$body=str_replace("á", "a|", $body);
		$body=str_replace("Á", "A|", $body);
		$body=str_replace("é", "e|", $body);
		$body=str_replace("É", "E|", $body);
		$body=str_replace("í", "i|", $body);
		$body=str_replace("Í", "I|", $body);
		$body=str_replace("ó", "o|", $body);
		$body=str_replace("Ó", "O|", $body);
		$body=str_replace("ú", "u|", $body);
		$body=str_replace("Ú", "U|", $body);
		$body=str_replace("ñ", "n|", $body);
		$body=str_replace("Ñ", "N|", $body);
		
		//echo $body;
		$obj = new CURL();
		$url = "https://bsolutionsmx.com/ole/eventos/envio_correo_externo/send_external_email.asp";                                       
		$data = array('strPassword' => '52O37L62E', 'strSubject' => $Subject,'strTo'=>$email,'strHTMLBody'=>$body,'strCc'=>'compradores.vip@mantenimiento-b2b.com;','strBCC'=>'mramos@bsolutionsmx.com; jose8_23@hotmail.com;');
		$correoASP = $obj->curlData($url,$data);
		$json = '{"estatus":"ok"}';
	
	}
	
	
	public function editar($reg_compr_id, $evento_id, $reg_compr_dat_per_ap_pat, $reg_compr_dat_per_ap_mat, $reg_compr_dat_per_nombres, $reg_compr_dat_per_cargo, $reg_compr_dat_per_celular, $reg_compr_dat_per_email, $reg_compr_dat_per_foto, $reg_compr_dat_per_nivel_des_com, $reg_compr_dat_emp_raz_soc, $reg_compr_dat_emp_anio_est, $reg_compr_dat_emp_cant_estblmts, $reg_compr_dat_emp_giro, $reg_compr_dat_emp_giro_otro, $reg_compr_dat_emp_calle, $reg_compr_dat_emp_num_ext, $reg_compr_dat_emp_num_int, $reg_compr_dat_emp_colonia, $reg_compr_dat_emp_cp, $reg_compr_dat_emp_ciudad, $reg_compr_dat_emp_estado, $reg_compr_dat_emp_pais, $reg_compr_dat_emp_telef_directo, $reg_compr_dat_emp_telef_directo_ext, $reg_compr_dat_emp_pag_web, $reg_compr_dat_emp_asistente, $reg_compr_dat_emp_proc_comp, $reg_compr_obj_asistir, $reg_compr_lineas_ints, $reg_compr_invt_empr_serv, $reg_compr_partpn_ant, $reg_compr_partpn_ant_evento, $reg_compr_cert_inf, $reg_compr_estatus, $reg_compr_status, $reg_compr_modifico){
		
		$respuesta = array();
		$Error=false;
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();	
		$strSQL="update eventos_reg_compradores ";
		$strSQL.="set 
								,reg_compr_dat_per_ap_pat='".$reg_compr_dat_per_ap_pat."'
								,reg_compr_dat_per_ap_mat='".$reg_compr_dat_per_ap_mat."'
								,reg_compr_dat_per_nombres='".$reg_compr_dat_per_nombres."'
								,reg_compr_dat_per_cargo='".$reg_compr_dat_per_cargo."'
								,reg_compr_dat_per_celular='".$reg_compr_dat_per_celular."'
								,reg_compr_dat_per_email='".$reg_compr_dat_per_email."'
								,reg_compr_dat_per_foto='".$reg_compr_dat_per_foto."'
								,reg_compr_dat_per_nivel_des_com='".$reg_compr_dat_per_nivel_des_com."'
								,reg_compr_dat_emp_raz_soc='".$reg_compr_dat_emp_raz_soc."'
								,reg_compr_dat_emp_anio_est='".$reg_compr_dat_emp_anio_est."'
								,reg_compr_dat_emp_cant_estblmts='".$reg_compr_dat_emp_cant_estblmts."'
								,reg_compr_dat_emp_giro='".$reg_compr_dat_emp_giro."'
								,reg_compr_dat_emp_giro_otro='".$reg_compr_dat_emp_giro_otro."'
								,reg_compr_dat_emp_calle='".$reg_compr_dat_emp_calle."'
								,reg_compr_dat_emp_num_ext='".$reg_compr_dat_emp_num_ext."'
								,reg_compr_dat_emp_num_int='".$reg_compr_dat_emp_num_int."'
								,reg_compr_dat_emp_colonia='".$reg_compr_dat_emp_colonia."'
								,reg_compr_dat_emp_cp='".$reg_compr_dat_emp_cp."'
								,reg_compr_dat_emp_ciudad='".$reg_compr_dat_emp_ciudad."'
								,reg_compr_dat_emp_estado='".$reg_compr_dat_emp_estado."'
								,reg_compr_dat_emp_pais='".$reg_compr_dat_emp_pais."'
								,reg_compr_dat_emp_telef_directo='".$reg_compr_dat_emp_telef_directo."'
								,reg_compr_dat_emp_telef_directo_ext='".$reg_compr_dat_emp_telef_directo_ext."'
								,reg_compr_dat_emp_pag_web='".$reg_compr_dat_emp_pag_web."'
								,reg_compr_dat_emp_asistente='".$reg_compr_dat_emp_asistente."'
								,reg_compr_dat_emp_proc_comp='".$reg_compr_dat_emp_proc_comp."'
								,reg_compr_obj_asistir='".$reg_compr_obj_asistir."'
								,reg_compr_lineas_ints='".$reg_compr_lineas_ints."'
								,reg_compr_invt_empr_serv='".$reg_compr_invt_empr_serv."'
								,reg_compr_partpn_ant='".$reg_compr_partpn_ant."'
								,reg_compr_partpn_ant_evento='".$reg_compr_partpn_ant_evento."'
								,reg_compr_cert_inf='".$reg_compr_cert_inf."'
								,reg_compr_estatus='M'
								,reg_compr_time_stamp=now()
								,reg_compr_modifico='".$reg_compr_modifico."'
							"; 
		$strSQL.="where ";
		$strSQL.="reg_compr_id=".$reg_compr_id; 
		//echo $strSQL;
		$proveedor->execute($strSQL);
		
		if (!$proveedor->error()){
		}else{
			$Error=true;
		}
		
		$proveedor->close();
		
		
		
		if($Error==false){
			$respuesta = array("totalCount" => "1", "estatus" => "ok", "mensaje" => "Se ha actualizado el registro correctamente");
		}else{
			$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al actualizar información");
		}
		
		
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}

	public function eliminar($reg_compr_id, $reg_compr_estatus, $reg_compr_modifico){
		
		$respuesta = array();
		$Error=false;
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();	
		$strSQL="update eventos_reg_compradores ";
		$strSQL.="set reg_compr_estatus='".$reg_compr_estatus."', reg_compr_modifico='".$reg_compr_modifico."', reg_compr_time_stamp=now() "; 
		$strSQL.="where ";
		$strSQL.="reg_compr_id=".$reg_compr_id; 
		//echo $strSQL;
		$proveedor->execute($strSQL);
		
		if (!$proveedor->error()){
		}else{
			$Error=true;
		}
		
		$proveedor->close();
		
		
		
		if($Error==false){
			$respuesta = array("totalCount" => "1", "estatus" => "ok", "mensaje" => "Se ha eliminado correctamente");
		}else{
			$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al eliminar");
		}
		
		
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}
	
	public function bloquear_desbloquear($reg_compr_id, $reg_compr_status, $reg_compr_modifico){
		
		$respuesta = array();
		$Error=false;
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();	
		$strSQL="update eventos_reg_compradores ";
		$strSQL.="set reg_compr_status='".$reg_compr_status."', reg_compr_modifico='".$reg_compr_modifico."', reg_compr_time_stamp=now() "; 
		$strSQL.="where ";
		$strSQL.="reg_compr_id=".$reg_compr_id; 
		//echo $strSQL;
		$proveedor->execute($strSQL);
		
		if (!$proveedor->error()){
		}else{
			$Error=true;
		}
		
		$proveedor->close();
		
		if($Error==false){
			$respuesta = array("totalCount" => "1", "estatus" => "ok", "mensaje" => $reg_compr_status." correctamente");
		}else{
			$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al cambiar estatus");
		}
		
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}

	public function enviar_agenda_comprador($reg_compr_id){
		$json = "";

		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$sql="
			select 
				C.reg_compr_id,
			  	E.evento_nomb_corto,
				E.evento_nombre,
				E.evento_reg_compr_footer,
				C.reg_compr_dat_per_nombres,
				C.reg_compr_dat_per_ap_pat,
				C.reg_compr_dat_per_ap_mat,
				C.reg_compr_dat_per_email
			from 
			  	eventos_reg_compradores C
			left join 
			  	eventos_admin E on C.evento_id=E.evento_id
			where 
			  	C.reg_compr_estatus<>'E' and C.reg_compr_id=".$reg_compr_id;
		
				
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				$evento_nomb_corto="";
				$nombre_comprador="";
				$evento_nombre="";
				$reg_compr_dat_per_email="";
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					$evento_nomb_corto=rtrim(ltrim($row["evento_nomb_corto"]));
					$nombre_comprador=rtrim(ltrim($row["reg_compr_dat_per_nombres"]))." ".rtrim(ltrim($row["reg_compr_dat_per_ap_pat"]))." ".rtrim(ltrim($row["reg_compr_dat_per_ap_mat"]));
					$evento_nombre=rtrim(ltrim($row["evento_nombre"]));
					$reg_compr_dat_per_email=rtrim(ltrim($row["reg_compr_dat_per_email"]));
					$evento_reg_compr_footer=rtrim(ltrim($row["evento_reg_compr_footer"]));
				}

				$Subject=$evento_nomb_corto.": Mi Agenda del Evento";
				$Subject=str_replace("á", "a|", $Subject);
				$Subject=str_replace("Á", "A|", $Subject);
				$Subject=str_replace("é", "e|", $Subject);
				$Subject=str_replace("É", "E|", $Subject);
				$Subject=str_replace("í", "i|", $Subject);
				$Subject=str_replace("Í", "I|", $Subject);
				$Subject=str_replace("ó", "o|", $Subject);
				$Subject=str_replace("Ó", "O|", $Subject);
				$Subject=str_replace("ú", "u|", $Subject);
				$Subject=str_replace("Ú", "U|", $Subject);
				$Subject=str_replace("ñ", "n|", $Subject);
				$Subject=str_replace("Ñ", "N|", $Subject);

				$body= '<font face="arial" size="2.5">Hola '.$nombre_comprador.',</font><br><br>';
				$body.= '<font face="arial" size="2.5">Una vez más te damos la bienvenida al evento '.$evento_nombre.' y agradecemos tu participación.</font><br>';
				$body.= '<font face="arial" size="2.5">Hemos capturado los datos de tu empresa en nuestro sistema de agendas Olé Matchmakers, para lo cual te explicaremos el procedimiento.</font><br>';
				$body.= '<font face="arial" size="2.5">Por favor dá clic en este <a href="https://bsolutionsmx.com/ole/eventos/agenda_compradores_registrados.php?key='.$reg_compr_id.'">link</a> e inicia la experiencia para gestionar tus reuniones. <u>Guárdalo y no borres este correo</u>.</font><br><br>';
				$body.= '<font face="arial" size="2.5"><b>Procedimiento para agendar:</b></font><br>';
				$body.= '<font face="arial" size="2.5">1. Revisión y edición de datos personales: Revisa que sean correctos, si deseas corregirlos hazlo directamente en el sistema y al finalizar siempre oprime el botón “Guardar toda la información”.</font><br>';
				$body.= '<font face="arial" size="2.5">2. En la parte inferior encontrarás dos secciones: Lista de Proveedores / Servicios (lado izquierdo) y Agenda (lado derecho).</font><br>';
				$body.= '<font face="arial" size="2.5">3. Para agendar una cita, ubica el comprador en la lista de Proveedores / Servicios, selecciona fecha y hora. El sistema te indicará únicamente los horarios disponibles entre ambos. Dá clic en “Guardar” y listo.</font><br>';
				$body.= '<font face="arial" size="2.5">4. Si deseas cancelar, darás clic en “Cancelar cita ”.</font><br>';
				$body.= '<font face="arial" size="2.5">5. Mi Agenda: Cada vez que hagas una reunión se guardará en el sistema y se adicionará a tu agenda ubicada en la sección derecha.</font><br>';
				$body.= '<font face="arial" size="2.5">6. Es muy importante que agendes lo antes posible para reservar tu horario que se acomode con tus actividades.</font><br>';
				$body.= '<font face="arial" size="2.5">7. Para revisar tu agenda o solicitar nuevas citas, sólo debes ingresar a tu link personalizado, asi de fácil.</font><br><br>';
				$body.= '<font face="arial" size="2.5">Cualquier duda o comentario, estamos a tus órdenes.</font><br><br>';
				$body.= '<font face="arial" size="2.5">¡Buena suerte!</font><br><br><br>';
				$body.= $evento_reg_compr_footer;
				$body.= '<br><br>';
				$body.= '<font face="arial" size="1"><i>* Este es un envío automatizado, no es necesario responder este correo.</i></font>';
				
				$body=str_replace("á", "a|", $body);
				$body=str_replace("Á", "A|", $body);
				$body=str_replace("é", "e|", $body);
				$body=str_replace("É", "E|", $body);
				$body=str_replace("í", "i|", $body);
				$body=str_replace("Í", "I|", $body);
				$body=str_replace("ó", "o|", $body);
				$body=str_replace("Ó", "O|", $body);
				$body=str_replace("ú", "u|", $body);
				$body=str_replace("Ú", "U|", $body);
				$body=str_replace("ñ", "n|", $body);
				$body=str_replace("Ñ", "N|", $body);
				
				if($reg_compr_dat_per_email!=""){
					$obj = new CURL();
					$url = "https://bsolutionsmx.com/ole/eventos/envio_correo_externo/send_external_email.asp";                                       
					$data = array('strPassword' => '52O37L62E', 'strSubject' => $Subject,'strTo'=>$reg_compr_dat_per_email,'strHTMLBody'=>$body,'strCc'=>'','strBCC'=>'mramos@bsolutionsmx.com;jose8_23@hotmail.com');
					$correoASP = $obj->curlData($url,$data);
					$json = '{"mensaje":"enviado correctamente"}';
					
					$proveedor_ev = new Proveedor('mysql', 'eventos');
					$proveedor_ev->connect();
					$sql="update eventos_reg_compradores set reg_compr_status='Activo / Agenda Enviada' where reg_compr_id=".$reg_compr_id;
					$proveedor_ev->execute($sql);
					$proveedor_ev->close();
				}else{
					$json='{"mensaje": "error, correo inválido"}';		
				}
			}else{
				$json = '{"mensaje":"error no se encontro información"}';	
			}
		}else{
			$json = '{"mensaje":"error al consultar"}';
		}

		$proveedor->close();
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($json);
	}
	
	public function enviar_agenda_proveedor($prov_id, $evento_id){
		$json = "";

		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$sql="
			select 
				P.prov_id,
			  	E.evento_nomb_corto,
				E.evento_nombre,
				E.evento_reg_compr_footer,
				P.prov_dat_per_nombres,
				P.prov_dat_per_ap_pat,
				P.prov_dat_per_ap_mat,
				P.prov_dat_per_email
			from 
			  	eventos_proveedores P
			left join 
			  	eventos_admin E on ".$evento_id."=E.evento_id
			where 
			  	P.prov_estatus<>'E' and P.prov_id=".$prov_id;
		
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				$evento_nomb_corto="";
				$nombre_proveedor="";
				$evento_nombre="";
				$prov_dat_per_email="";
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					$evento_nomb_corto=rtrim(ltrim($row["evento_nomb_corto"]));
					$nombre_proveedor=rtrim(ltrim($row["prov_dat_per_nombres"]))." ".rtrim(ltrim($row["prov_dat_per_ap_pat"]))." ".rtrim(ltrim($row["prov_dat_per_ap_mat"]));
					$evento_nombre=rtrim(ltrim($row["evento_nombre"]));
					$prov_dat_per_email=rtrim(ltrim($row["prov_dat_per_email"]));
					$evento_reg_compr_footer=rtrim(ltrim($row["evento_reg_compr_footer"]));
				}

				$Subject=$evento_nomb_corto.": Mi Agenda del Evento";
				$Subject=str_replace("á", "a|", $Subject);
				$Subject=str_replace("Á", "A|", $Subject);
				$Subject=str_replace("é", "e|", $Subject);
				$Subject=str_replace("É", "E|", $Subject);
				$Subject=str_replace("í", "i|", $Subject);
				$Subject=str_replace("Í", "I|", $Subject);
				$Subject=str_replace("ó", "o|", $Subject);
				$Subject=str_replace("Ó", "O|", $Subject);
				$Subject=str_replace("ú", "u|", $Subject);
				$Subject=str_replace("Ú", "U|", $Subject);
				$Subject=str_replace("ñ", "n|", $Subject);
				$Subject=str_replace("Ñ", "N|", $Subject);

				$body= '<font face="arial" size="2.5">Hola '.$nombre_proveedor.',</font><br><br>';
				$body.= '<font face="arial" size="2.5">Una vez más te damos la bienvenida al evento '.$evento_nombre.' y agradecemos tu participación.</font><br>';
				$body.= '<font face="arial" size="2.5">Hemos capturado los datos de tu empresa en nuestro sistema de agendas Olé Matchmakers, para lo cual te explicaremos el procedimiento.</font><br>';
				$body.= '<font face="arial" size="2.5">Por favor dá clic en este <a href="https://bsolutionsmx.com/ole/eventos/agenda_proveedores_registrados.php?key='.$prov_id.'&evento='.$evento_id.'">link</a> e inicia la experiencia para gestionar tus reuniones. <u>Guárdalo y no borres este correo</u>.</font><br><br>';
				$body.= '<font face="arial" size="2.5"><b>Procedimiento para agendar:</b></font><br>';
				$body.= '<font face="arial" size="2.5">1. Revisión de datos personales: Revisa que sean correctos, si deseas corregirlos contáctanos.</font><br>';
				$body.= '<font face="arial" size="2.5">2. En la parte inferior encontrarás dos secciones: Lista de compradores (lado izquierdo) y Agenda (lado derecho).</font><br>';
				$body.= '<font face="arial" size="2.5">3. Para agendar una cita, ubica el comprador en la lista de compradores con el que deseas hacer una reunión, selecciona fecha y hora. El sistema te indicará únicamente los horarios disponibles entre ambos. Dá clic en “Guardar” y listo.</font><br>';
				$body.= '<font face="arial" size="2.5">4. Si deseas cancelar, darás clic en “Cancelar cita”.</font><br>';
				$body.= '<font face="arial" size="2.5">5. Mi Agenda: Cada vez que hagas una reunión se guardará en el sistema y se adicionará a tu agenda ubicada en la sección derecha.</font><br>';
				$body.= '<font face="arial" size="2.5">6. Es muy importante que agendes lo antes posible para reservar tu horario que se acomode con tus actividades.</font><br><br>';
				$body.= '<font face="arial" size="2.5">Cualquier duda o comentario, estamos a tus órdenes.</font><br><br>';
				$body.= '<font face="arial" size="2.5">¡Buena suerte!</font><br><br><br>';
				$body.= $evento_reg_compr_footer;
				$body.= '<br><br>';
				$body.= '<font face="arial" size="1"><i>* Este es un envío automatizado, no es necesario responder este correo.</i></font>';
				
				$body=str_replace("á", "a|", $body);
				$body=str_replace("Á", "A|", $body);
				$body=str_replace("é", "e|", $body);
				$body=str_replace("É", "E|", $body);
				$body=str_replace("í", "i|", $body);
				$body=str_replace("Í", "I|", $body);
				$body=str_replace("ó", "o|", $body);
				$body=str_replace("Ó", "O|", $body);
				$body=str_replace("ú", "u|", $body);
				$body=str_replace("Ú", "U|", $body);
				$body=str_replace("ñ", "n|", $body);
				$body=str_replace("Ñ", "N|", $body);
				
				if($prov_dat_per_email!=""){
					$obj = new CURL();
					$url = "https://bsolutionsmx.com/ole/eventos/envio_correo_externo/send_external_email.asp";                                       
					//Peoductivo
					$data = array('strPassword' => '52O37L62E', 'strSubject' => $Subject,'strTo'=>$prov_dat_per_email,'strHTMLBody'=>$body,'strCc'=>'','strBCC'=>'mramos@bsolutionsmx.com;jose8_23@hotmail.com');
					//Pruebas
					//$data = array('strPassword' => '52O37L62E', 'strSubject' => $Subject,'strTo'=>"jose8_23@hotmail.com",'strHTMLBody'=>$body,'strCc'=>'','strBCC'=>'');
					$correoASP = $obj->curlData($url,$data);
					$json = '{"mensaje":"enviado correctamente"}';
				}else{
					$json='{"mensaje": "error, correo inválido"}';		
				}
			}else{
				$json = '{"mensaje":"error no se encontro información"}';	
			}
		}else{
			$json = '{"mensaje":"error al consultar"}';
		}

		$proveedor->close();
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($json);
	}
	
	

	public function datos_agenda_comprador($reg_compr_id){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();

		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$sql="
			select 
				C.reg_compr_id,
			  	E.evento_nomb_corto,
				E.evento_nombre,
				E.evento_reg_compr_footer,
				C.reg_compr_dat_per_nombres,
				C.reg_compr_dat_per_ap_pat,
				C.reg_compr_dat_per_ap_mat,
				C.reg_compr_dat_per_email
			from 
			  	eventos_reg_compradores C
			left join 
			  	eventos_admin E on C.evento_id=E.evento_id
			where 
			  	C.reg_compr_estatus<>'E' and C.reg_compr_id=".$reg_compr_id;
		
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					$Data= array(
						"reg_compr_id"=>rtrim(ltrim($row["reg_compr_id"])),
						"evento_nomb_corto"=>rtrim(ltrim($row["evento_nomb_corto"])),
						"evento_nombre"=>rtrim(ltrim($row["evento_nombre"])),
						"evento_reg_compr_footer"=>rtrim(ltrim($row["evento_reg_compr_footer"])),
						"reg_compr_dat_per_nombres"=>rtrim(ltrim($row["reg_compr_dat_per_nombres"])),
						"reg_compr_dat_per_ap_pat"=>rtrim(ltrim($row["reg_compr_dat_per_ap_pat"])),
						"reg_compr_dat_per_ap_mat"=>rtrim(ltrim($row["reg_compr_dat_per_ap_mat"])),
						"reg_compr_dat_per_email"=>rtrim(ltrim($row["reg_compr_dat_per_email"]))
					);
					array_push($Data_Envia, $Data);
				}
			}
		}else{
			$Error=true;
		}
		$proveedor->close();
				  
		$respuesta = array("totalCount" => count($Data_Envia),"data" => $Data_Envia,"estatus" => "ok", "mensaje" => "Registros Encontrados");
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}

	public function editar_datos_gen_comprador_agenda($reg_compr_id, $reg_compr_dat_per_nombres, $reg_compr_dat_per_ap_pat, $reg_compr_dat_per_ap_mat, $reg_compr_dat_per_cargo, $reg_compr_dat_per_celular, $reg_compr_dat_emp_raz_soc, $reg_compr_dat_emp_telef_directo, $reg_compr_dat_emp_telef_directo_ext, $reg_compr_dat_emp_pag_web){		
		$respuesta = array();
		$Error=false;
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();	
		$strSQL="update eventos_reg_compradores ";
		$strSQL.="set 
					reg_compr_dat_per_ap_pat='".$reg_compr_dat_per_ap_pat."'
					,reg_compr_dat_per_ap_mat='".$reg_compr_dat_per_ap_mat."'
					,reg_compr_dat_per_nombres='".$reg_compr_dat_per_nombres."'
					,reg_compr_dat_per_cargo='".$reg_compr_dat_per_cargo."'
					,reg_compr_dat_per_celular='".$reg_compr_dat_per_celular."'
					,reg_compr_dat_emp_raz_soc='".$reg_compr_dat_emp_raz_soc."'
					,reg_compr_dat_emp_telef_directo='".$reg_compr_dat_emp_telef_directo."'
					,reg_compr_dat_emp_telef_directo_ext='".$reg_compr_dat_emp_telef_directo_ext."'
					,reg_compr_dat_emp_pag_web='".$reg_compr_dat_emp_pag_web."'
					,reg_compr_estatus='M'
					,reg_compr_time_stamp=now()
					,reg_compr_modifico='comprador'
				"; 
		$strSQL.="where ";
		$strSQL.="reg_compr_id=".$reg_compr_id;
		//echo $strSQL;
		$proveedor->execute($strSQL);
		
		if (!$proveedor->error()){
		}else{
			$Error=true;
		}
		
		$proveedor->close();
		
		if($Error==false){
			$respuesta = array("totalCount" => "1", "estatus" => "ok", "mensaje" => "Se ha actualizado el registro correctamente");
		}else{
			$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al actualizar información");
		}
		
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}

	public function consultar_proveedores_agenda($evento_id, $reg_compr_id){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$sql="
			select 
				D.event_det_id,
				P.prov_id,
				P.prov_dat_per_nombres,
				P.prov_dat_per_ap_pat,
				P.prov_dat_per_ap_mat,
				P.prov_dat_emp_nomcomercial,
				P.prov_dat_emp_logo_empr,
				P.prov_servicios,
				P.prov_dat_emp_pag_web,
				(select count(*) from eventos_agenda_compradores ac where P.prov_id=ac.agenda_comp_prov_id and ac.agenda_comp_evento_id=".$evento_id." and ac.agenda_comp_compr_id=".$reg_compr_id.") as agenda_registrada
			from 
				eventos_detalle_comp_proveed D
				left join eventos_proveedores P on D.event_compr_prov_id=P.prov_id
			where 
				event_status<>'E' and event_tipo='P' and event_admin_id=".$evento_id;
		
		
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					$Proveedor=rtrim(ltrim($row["prov_dat_emp_nomcomercial"])).":::".rtrim(ltrim($row["prov_dat_per_nombres"]))." ".rtrim(ltrim($row["prov_dat_per_ap_pat"]))." ".rtrim(ltrim($row["prov_dat_per_ap_mat"]));
					$Servcios="";
					if(rtrim(ltrim($row["prov_servicios"]))!=NULL){
						$Servcios.="-".str_replace(", ", "<br>-", rtrim(ltrim($row["prov_servicios"])));
					}

					$Data= array(
						"event_det_id"=>rtrim(ltrim($row["event_det_id"])),
						"prov_id"=>rtrim(ltrim($row["prov_id"])),
						"Proveedor"=>$Proveedor,
						"prov_dat_emp_logo_empr"=>rtrim(ltrim($row["prov_dat_emp_logo_empr"])),
						"prov_dat_emp_pag_web"=>rtrim(ltrim($row["prov_dat_emp_pag_web"])),
						"agenda_registrada"=>rtrim(ltrim($row["agenda_registrada"])),
						"prov_servicios"=>$Servcios
					);
					array_push($Data_Envia, $Data);
				}
			}
		}else{
			$Error=true;
		}
		$proveedor->close();
		
		$respuesta = array("totalCount" => count($Data_Envia),"data" => $Data_Envia,"estatus" => "ok", "mensaje" => "Registros Encontrados");
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}
	
	public function consultar_compradores_agenda($evento_id, $prov_id){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$sql="
			select 
				C.reg_compr_id ,
				C.reg_compr_dat_per_nombres,
				C.reg_compr_dat_per_ap_pat,
				C.reg_compr_dat_per_ap_mat,
				C.reg_compr_dat_per_foto,
				C.reg_compr_dat_emp_pag_web,
				C.reg_compr_dat_emp_raz_soc,
				C.reg_compr_dat_per_celular,
				C.reg_compr_dat_per_email,
				(select agenda_comp_prov_id from eventos_agenda_compradores ac where C.reg_compr_id =ac.agenda_comp_compr_id and ac.agenda_comp_evento_id=".$evento_id." Limit 1) as prov_id,
				(select count(*) from eventos_agenda_compradores ac where C.reg_compr_id =ac.agenda_comp_compr_id and ac.agenda_comp_evento_id=".$evento_id." and ac.agenda_comp_prov_id=".$prov_id.") as agenda_registrada
			from 
				eventos_reg_compradores C
			where 
				reg_compr_status<>'E' and evento_id=".$evento_id;
		
		
		
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					$Comprador=rtrim(ltrim($row["reg_compr_dat_per_nombres"]))." ".rtrim(ltrim($row["reg_compr_dat_per_ap_pat"]))." ".rtrim(ltrim($row["reg_compr_dat_per_ap_mat"]));

					$Data= array(
						"reg_compr_id"=>rtrim(ltrim($row["reg_compr_id"])),
						"prov_id"=>$row["prov_id"],
						"Comprador"=>$Comprador,
						"reg_compr_dat_per_foto"=>rtrim(ltrim($row["reg_compr_dat_per_foto"])),
						"reg_compr_dat_emp_pag_web"=>rtrim(ltrim($row["reg_compr_dat_emp_pag_web"])),
						"reg_compr_dat_emp_raz_soc"=>rtrim(ltrim($row["reg_compr_dat_emp_raz_soc"])),
						"reg_compr_dat_per_celular"=>rtrim(ltrim($row["reg_compr_dat_per_celular"])),
						"reg_compr_dat_per_email"=>rtrim(ltrim($row["reg_compr_dat_per_email"])),
						"agenda_registrada"=>rtrim(ltrim($row["agenda_registrada"]))
					);
					array_push($Data_Envia, $Data);
				}
			}
		}else{
			$Error=true;
		}
		$proveedor->close();
		
		$respuesta = array("totalCount" => count($Data_Envia),"data" => $Data_Envia,"estatus" => "ok", "mensaje" => "Registros Encontrados");
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}
	
	public function consultar_horarios($evento_id, $agenda_comp_fecha, $agenda_comp_compr_id, $agenda_comp_prov_id){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$sql="
			SELECT DISTINCT(agenda_comp_hora) FROM (
				SELECT 
					agenda_comp_hora 
				FROM 
					eventos_agenda_compradores C
				WHERE 
					agenda_comp_evento_id=".$evento_id." and agenda_comp_prov_id=".$agenda_comp_prov_id." and agenda_comp_fecha='".$agenda_comp_fecha."'
					and 
					(select event_status from eventos_detalle_comp_proveed where event_admin_id=".$evento_id." and event_compr_prov_id=C.agenda_comp_prov_id and event_tipo='P')='A'
				UNION
				SELECT 
					agenda_comp_hora 
				FROM 
					eventos_agenda_compradores C
				WHERE 
					agenda_comp_evento_id=".$evento_id." and agenda_comp_compr_id=".$agenda_comp_compr_id." and agenda_comp_fecha='".$agenda_comp_fecha."'
					and 
					(select event_status from eventos_detalle_comp_proveed where event_admin_id=".$evento_id." and event_compr_prov_id=C.agenda_comp_prov_id and event_tipo='P')='A'	
			) agenda_comp_hora
		";
		//echo "<pre>";
		//echo $sql;
		//echo "</pre>";
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
		
					$Data= array(
						"agenda_comp_hora"=>rtrim(ltrim($row["agenda_comp_hora"]))
					);
					array_push($Data_Envia, $Data);
				}
			}
		}else{
			$Error=true;
		}
		$proveedor->close();
		
		$respuesta = array("totalCount" => count($Data_Envia),"data" => $Data_Envia,"estatus" => "ok", "mensaje" => "Registros Encontrados");
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}


}

@$reg_compr_id=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_id"])));																	
@$evento_id=rtrim(ltrim(str_replace("'","",$_POST["evento_id"])));
@$reg_compr_dat_per_ap_pat=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_dat_per_ap_pat"])));
@$reg_compr_dat_per_ap_mat=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_dat_per_ap_mat"])));
@$reg_compr_dat_per_nombres=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_dat_per_nombres"])));
@$reg_compr_dat_per_cargo=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_dat_per_cargo"])));
@$reg_compr_dat_per_celular=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_dat_per_celular"])));
@$reg_compr_dat_per_email=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_dat_per_email"])));
@$reg_compr_dat_per_foto=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_dat_per_foto"])));
@$reg_compr_dat_per_nivel_des_com=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_dat_per_nivel_des_com"])));
@$reg_compr_dat_emp_raz_soc=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_dat_emp_raz_soc"])));
@$reg_compr_dat_emp_anio_est=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_dat_emp_anio_est"])));
@$reg_compr_dat_emp_cant_estblmts=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_dat_emp_cant_estblmts"])));
@$reg_compr_dat_emp_giro=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_dat_emp_giro"])));
@$reg_compr_dat_emp_giro_otro=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_dat_emp_giro_otro"])));
@$reg_compr_dat_emp_calle=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_dat_emp_calle"])));
@$reg_compr_dat_emp_num_ext=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_dat_emp_num_ext"])));
@$reg_compr_dat_emp_num_int=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_dat_emp_num_int"])));
@$reg_compr_dat_emp_colonia=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_dat_emp_colonia"])));
@$reg_compr_dat_emp_cp=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_dat_emp_cp"])));
@$reg_compr_dat_emp_ciudad=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_dat_emp_ciudad"])));
@$reg_compr_dat_emp_estado=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_dat_emp_estado"])));
@$reg_compr_dat_emp_pais=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_dat_emp_pais"])));
@$reg_compr_dat_emp_telef_directo=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_dat_emp_telef_directo"])));
@$reg_compr_dat_emp_telef_directo_ext=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_dat_emp_telef_directo_ext"])));
@$reg_compr_dat_emp_pag_web=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_dat_emp_pag_web"])));
@$reg_compr_dat_emp_asistente=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_dat_emp_asistente"])));
@$reg_compr_dat_emp_proc_comp=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_dat_emp_proc_comp"])));
@$reg_compr_obj_asistir=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_obj_asistir"])));
@$reg_compr_lineas_ints=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_lineas_ints"])));
@$reg_compr_invt_empr_serv=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_invt_empr_serv"])));
@$reg_compr_partpn_ant=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_partpn_ant"])));
@$reg_compr_partpn_ant_evento=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_partpn_ant_evento"])));
@$reg_compr_cert_inf=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_cert_inf"])));
@$reg_compr_estatus=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_estatus"])));
@$reg_compr_status=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_status"])));
@$reg_compr_modifico=rtrim(ltrim(str_replace("'","",$_POST["reg_compr_modifico"])));
@$envio_mail=rtrim(ltrim(str_replace("'","",$_POST["envio_mail"])));

@$agenda_comp_fecha=rtrim(ltrim(str_replace("'","",$_POST["agenda_comp_fecha"])));
@$agenda_comp_compr_id=rtrim(ltrim(str_replace("'","",$_POST["agenda_comp_compr_id"])));
@$agenda_comp_prov_id=rtrim(ltrim(str_replace("'","",$_POST["agenda_comp_prov_id"])));

@$prov_id=rtrim(ltrim(str_replace("'","",$_POST["prov_id"])));

@$accion=$_POST["accion"];
$Consultas = new consultas();
if($accion=="consultar"){
	$acc=$Consultas->consultar($reg_compr_id, $evento_id);
	echo $acc; 
}else if($accion=="guardar"){	
	$acc=$Consultas->guardar($evento_id, $reg_compr_dat_per_ap_pat, $reg_compr_dat_per_ap_mat, $reg_compr_dat_per_nombres, $reg_compr_dat_per_cargo, $reg_compr_dat_per_celular, $reg_compr_dat_per_email, $reg_compr_dat_per_foto, $reg_compr_dat_per_nivel_des_com, $reg_compr_dat_emp_raz_soc, $reg_compr_dat_emp_anio_est, $reg_compr_dat_emp_cant_estblmts, $reg_compr_dat_emp_giro, $reg_compr_dat_emp_giro_otro, $reg_compr_dat_emp_calle, $reg_compr_dat_emp_num_ext, $reg_compr_dat_emp_num_int, $reg_compr_dat_emp_colonia, $reg_compr_dat_emp_cp, $reg_compr_dat_emp_ciudad, $reg_compr_dat_emp_estado, $reg_compr_dat_emp_pais, $reg_compr_dat_emp_telef_directo, $reg_compr_dat_emp_telef_directo_ext, $reg_compr_dat_emp_pag_web, $reg_compr_dat_emp_asistente, $reg_compr_dat_emp_proc_comp, $reg_compr_obj_asistir, $reg_compr_lineas_ints, $reg_compr_invt_empr_serv, $reg_compr_partpn_ant, $reg_compr_partpn_ant_evento, $reg_compr_cert_inf, $reg_compr_estatus, $reg_compr_status, $reg_compr_modifico, $envio_mail);
	echo $acc;
}else if($accion=="editar"){	
	$acc=$Consultas->editar($reg_compr_id, $evento_id, $reg_compr_dat_per_ap_pat, $reg_compr_dat_per_ap_mat, $reg_compr_dat_per_nombres, $reg_compr_dat_per_cargo, $reg_compr_dat_per_celular, $reg_compr_dat_per_email, $reg_compr_dat_per_foto, $reg_compr_dat_per_nivel_des_com, $reg_compr_dat_emp_raz_soc, $reg_compr_dat_emp_anio_est, $reg_compr_dat_emp_cant_estblmts, $reg_compr_dat_emp_giro, $reg_compr_dat_emp_giro_otro, $reg_compr_dat_emp_calle, $reg_compr_dat_emp_num_ext, $reg_compr_dat_emp_num_int, $reg_compr_dat_emp_colonia, $reg_compr_dat_emp_cp, $reg_compr_dat_emp_ciudad, $reg_compr_dat_emp_estado, $reg_compr_dat_emp_pais, $reg_compr_dat_emp_telef_directo, $reg_compr_dat_emp_telef_directo_ext, $reg_compr_dat_emp_pag_web, $reg_compr_dat_emp_asistente, $reg_compr_dat_emp_proc_comp, $reg_compr_obj_asistir, $reg_compr_lineas_ints, $reg_compr_invt_empr_serv, $reg_compr_partpn_ant, $reg_compr_partpn_ant_evento, $reg_compr_cert_inf, $reg_compr_estatus, $reg_compr_modifico);
	echo $acc;
}else if($accion=="eliminar"){	
	$acc=$Consultas->eliminar($reg_compr_id, $reg_compr_estatus, $reg_compr_modifico);
	echo $acc;
}else if($accion=="bloquear_desbloquear"){	
	$acc=$Consultas->bloquear_desbloquear($reg_compr_id, $reg_compr_status, $reg_compr_modifico);
	echo $acc;
}else if($accion=="enviar_agenda_comprador"){	
	$acc=$Consultas->enviar_agenda_comprador($reg_compr_id);
	echo $acc;
}else if($accion=="enviar_agenda_proveedor"){	
	$acc=$Consultas->enviar_agenda_proveedor($prov_id, $evento_id);
	echo $acc;
}else if($accion=="datos_agenda_comprador"){	
	$acc=$Consultas->datos_agenda_comprador($reg_compr_id);
	echo $acc;
}else if($accion=="editar_datos_gen_comprador_agenda"){	
	$acc=$Consultas->editar_datos_gen_comprador_agenda($reg_compr_id, $reg_compr_dat_per_nombres, $reg_compr_dat_per_ap_pat, $reg_compr_dat_per_ap_mat, $reg_compr_dat_per_cargo, $reg_compr_dat_per_celular, $reg_compr_dat_emp_raz_soc, $reg_compr_dat_emp_telef_directo, $reg_compr_dat_emp_telef_directo_ext, $reg_compr_dat_emp_pag_web);
	echo $acc;
}else if($accion=="consultar_proveedores_agenda"){	
	$acc=$Consultas->consultar_proveedores_agenda($evento_id, $reg_compr_id);
	echo $acc;
}else if($accion=="consultar_compradores_agenda"){	
	$acc=$Consultas->consultar_compradores_agenda($evento_id, $prov_id);
	echo $acc;
}else if($accion=="consultar_horarios"){	
	$acc=$Consultas->consultar_horarios($evento_id, $agenda_comp_fecha, $agenda_comp_compr_id, $agenda_comp_prov_id);
	echo $acc;
}
?>