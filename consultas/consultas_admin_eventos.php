<?php
require_once("CURL.php");
include_once("../datos/dtotojson/DtoToJson.Class.php");
include_once("../datos/json/JsonEncod.Class.php");
include_once("../datos/json/JsonDecod.Class.php");
include_once("../datos/connect/Proveedor.Class.php");
class consultas {
	public function __construct() {
	}
	
	public function consultar_eventos($evento_id){
		$Data = array();
		$Data_Envia = array();
		$Data_Comp = array();
		$Data_Envia_Comp = array();
		$Data_Prov = array();
		$Data_Envia_Prov = array();
		$respuesta = array();
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$sql=" 
			select *, DATE_FORMAT(evento_fech_i, '%d/%m/%Y') as FI, DATE_FORMAT(evento_fech_f, '%d/%m/%Y') as FF from eventos_admin where evento_estatus<>'E'
		";
		
		if($evento_id!=""){
			$sql.=" 
				and evento_id=".$evento_id."
			";				
		
			$sql_comp_vend="
				select * from eventos_detalle_comp_proveed where event_status<>'E' and event_admin_id=".$evento_id."
			";
			$proveedor_comp_vend = new Proveedor('mysql', 'eventos');
			$proveedor_comp_vend->connect();
			$proveedor_comp_vend->execute($sql_comp_vend);
			if (!$proveedor_comp_vend->error()){
				if ($proveedor_comp_vend->rows($proveedor_comp_vend->stmt) > 0) {
					while ($row_com = $proveedor_comp_vend->fetch_array($proveedor_comp_vend->stmt, 0)) {
						if($row_com["event_tipo"]=="C"){
							$Data_Comp= array(
								"event_det_id" => $row_com["event_det_id"],
								"event_admin_id" => $row_com["event_admin_id"],
								"event_compr_prov_id" => $row_com["event_compr_prov_id"],
								"event_tipo" => $row_com["event_tipo"],
								"evento_enviado" => $row_com["evento_enviado"]
							);
							array_push($Data_Envia_Comp, $Data_Comp);
						}
						
						if($row_com["event_tipo"]=="P"){
							$Data_Prov= array(
								"event_det_id" => $row_com["event_det_id"],
								"event_admin_id" => $row_com["event_admin_id"],
								"event_compr_prov_id" => $row_com["event_compr_prov_id"],
								"event_tipo" => $row_com["event_tipo"],
								"evento_enviado" => $row_com["evento_enviado"]
							);
							array_push($Data_Envia_Prov, $Data_Prov);
						}
					}
				}
			}else{
				$Error=true;
			}
		}
		
		
		//echo $sql;
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					$logo=""; $info_prov_msj_variable=""; $info_prov_msj_pie_pagina=""; $form_ins_msj_variable=""; $form_ins_msj_pie_pagina="";
					if($evento_id!=""){
						$logo=$row["evento_logo"];
						$info_prov_msj_variable=$row["info_prov_msj_variable"];
						$info_prov_msj_pie_pagina=$row["info_prov_msj_pie_pagina"];
						$form_ins_msj_variable=$row["form_ins_msj_variable"];
						$form_ins_msj_pie_pagina=$row["form_ins_msj_pie_pagina"];
					}
					
					$evento_servicios="";
					if($row["evento_servicios"]!=NULL){
						$evento_servicios=rtrim(ltrim($row["evento_servicios"]));
					}
					$Data= array(
						"evento_id" => $row["evento_id"],
						"evento_nombre" => $row["evento_nombre"],
						"evento_nomb_corto" => $row["evento_nomb_corto"],
						"evento_logo" => $logo,
						"evento_desc" => $row["evento_desc"],
						"evento_sede_hotel" => $row["evento_sede_hotel"],
						"evento_ciudad" => $row["evento_ciudad"],
						"evento_fech_i" => $row["evento_fech_i"],
						"evento_hora_i" => $row["evento_hora_i"],
						"evento_fech_f" => $row["evento_fech_f"],
						"evento_hora_f" => $row["evento_hora_f"],
						"evento_pag_web" => $row["evento_pag_web"],
						"evento_contactos" => $row["evento_contactos"],
						"evento_raz_social_org" => $row["evento_raz_social_org"],
						"evento_time_stamp" => $row["evento_time_stamp"],
						"evento_modifico" => $row["evento_modifico"],
						"evento_estatus" => $row["evento_estatus"],
						"FI" => $row["FI"],
						"FF" => $row["FF"],
						"cadena_compradores" => $row["cadena_compradores"],
						"cadena_provedores" => $row["cadena_provedores"],
						"info_prov_cc" => $row["info_prov_cc"],
						"info_prov_cco" => $row["info_prov_cco"],
						"info_prov_titulo" => $row["info_prov_titulo"],
						"info_prov_msj_fijo" => $row["info_prov_msj_fijo"],
						"info_prov_msj_variable" => $info_prov_msj_variable,
						"info_prov_msj_pie_pagina" => $info_prov_msj_pie_pagina,
						"form_ins_cc" => $row["form_ins_cc"],
						"form_ins_cco" => $row["form_ins_cco"],
						"form_ins_titulo" => $row["form_ins_titulo"],
						"form_ins_msj_variable" => $form_ins_msj_variable,
						"form_ins_msj_pie_pagina" => $form_ins_msj_pie_pagina,
						"evento_hora_no_disp_i" => $row["evento_hora_no_disp_i"],
						"evento_hora_no_disp_f" => $row["evento_hora_no_disp_f"],
						"evento_servicios" => $evento_servicios
						
					);
					array_push($Data_Envia, $Data);
				}
			}
		}else{
			$Error=true;
		}
		$proveedor->close();
		
		
		$respuesta = array("totalCount" => count($Data_Envia),"data" => $Data_Envia,"totalCountComp" => count($Data_Envia_Comp),"datacomprador" => $Data_Envia_Comp,"totalCountProv" => count($Data_Envia_Prov),"dataproveedor" => $Data_Envia_Prov,"estatus" => "ok", "mensaje" => "Registros Encontrados");
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}
	
	
	public function envia_notificacion_compradores($evento_id, $cadena_notif){
		$contador=0;
		$Data = array();
		$Data_Envia = array();
		$Data_Comp = array();
		$Data_Envia_Comp = array();
		$Data_Prov = array();
		$Data_Envia_Prov = array();
		$respuesta = array();
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$sql=" 
			select 
				evento_id, 
				evento_nombre,
				evento_nomb_corto,
				info_prov_cc, 
				info_prov_cco, 
				info_prov_titulo, 
				info_prov_msj_fijo, 
				info_prov_msj_variable, 
				info_prov_msj_pie_pagina, 
				form_ins_cc, 
				form_ins_cco, 
				form_ins_titulo, 
				form_ins_msj_variable, 
				form_ins_msj_pie_pagina 
			from eventos_admin 
			where evento_id=".$evento_id."
		";
		
		$evento_nombre="";
		$evento_nomb_corto="";	
		$info_prov_cc="";
		$info_prov_cco="";
		$info_prov_titulo=""; 
		$info_prov_msj_fijo="";
		$info_prov_msj_variable=""; 
		$info_prov_msj_pie_pagina="";
		$form_ins_cc="";
		$form_ins_cco="";
		$form_ins_titulo=""; 
		$form_ins_msj_variable=""; 
		$form_ins_msj_pie_pagina="";
		
		
		//echo $sql;
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					$evento_nombre=$row["evento_nombre"]; 
					$evento_nomb_corto=$row["evento_nomb_corto"];
					$info_prov_cc=$row["info_prov_cc"];
					$info_prov_cco=$row["info_prov_cco"];
					$info_prov_titulo=$row["info_prov_titulo"]; 
					$info_prov_msj_fijo=$row["info_prov_msj_fijo"];
					$info_prov_msj_variable=$row["info_prov_msj_variable"]; 
					$info_prov_msj_pie_pagina=$row["info_prov_msj_pie_pagina"];
					$form_ins_cc=$row["form_ins_cc"];
					$form_ins_cco=$row["form_ins_cco"];
					$form_ins_titulo=$row["form_ins_titulo"]; 
					$form_ins_msj_variable=$row["form_ins_msj_variable"]; 
					$form_ins_msj_pie_pagina=$row["form_ins_msj_pie_pagina"];
					
					
					
					
					$CC="";
					$CC=$form_ins_cc;
					
					$CCO="";
					$CCO=$form_ins_cco;
					
					$Subject="";
					$Subject=$form_ins_titulo;
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
					
					
					$body="";
					$body.=$form_ins_msj_variable;
					$body.="<br><br><br>";
					$body.=$form_ins_msj_pie_pagina;
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
					
					
					$proveedordet = new Proveedor('mysql', 'eventos');
					$proveedordet->connect();
					$sql=" 
						select event_det_id, event_compr_prov_id, event_tipo 
						,compr_dat_per_email
						from 
						eventos_detalle_comp_proveed 
						left join eventos_compradores on eventos_detalle_comp_proveed.event_compr_prov_id=eventos_compradores.compr_id
						where event_det_id in(".$cadena_notif.") and event_tipo='C'
					";
					$proveedordet->execute($sql);
					if (!$proveedordet->error()){
						if ($proveedordet->rows($proveedordet->stmt) > 0) {
							while ($rowd = $proveedordet->fetch_array($proveedordet->stmt, 0)) {
								$Para=$rowd["compr_dat_per_email"];
								$obj = new CURL();
								$url = "https://bsolutionsmx.com/ole/eventos/envio_correo_externo/send_external_email.asp";                                       
								
								//Productivo
								$data = array('strPassword' => '52O37L62E', 'strSubject' => $Subject,'strTo'=>$Para,'strHTMLBody'=>$body,'strCc'=>$CC,'strBCC'=>'jose8_23@hotmail.com; mramos@bsolutionsmx.com; '.$CCO, 'event_det_id'=>$rowd["event_det_id"]);
								//Pruebas
								//$data = array('strPassword' => '52O37L62E', 'strSubject' => $Subject,'strTo'=>"jose8_23@hotmail.com; mramos@bsolutionsmx.com",'strHTMLBody'=>$body,'strCc'=>"",'strBCC'=>"", 'event_det_id'=>$rowd["event_det_id"]);
								//echo "<pre>";
								//print_r($data);
								//echo "</pre>";
								$correoASP = $obj->curlData($url,$data);
								$contador=$contador+1;
							
							}
							
							
						}
					}
					
					
					
					
					
				}
			}
		}else{
			$Error=true;
		}
		$proveedor->close();
		
		
		$respuesta = array("totalCount" => $contador, "estatus" => "ok", "mensaje" => "Enviados");
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}
	
	public function envia_notificacion_proveedores($evento_id, $cadena_notif){
		$contador=0;
		$Data = array();
		$Data_Envia = array();
		$Data_Comp = array();
		$Data_Envia_Comp = array();
		$Data_Prov = array();
		$Data_Envia_Prov = array();
		$respuesta = array();
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$sql=" 
			select 
				evento_id, 
				evento_nombre,
				evento_nomb_corto,				
				info_prov_cc, 
				info_prov_cco, 
				info_prov_titulo, 
				info_prov_msj_fijo, 
				info_prov_msj_variable, 
				info_prov_msj_pie_pagina, 
				form_ins_cc, 
				form_ins_cco, 
				form_ins_titulo, 
				form_ins_msj_variable, 
				form_ins_msj_pie_pagina 
			from eventos_admin 
			where evento_id=".$evento_id."
		";
		
		$evento_nombre="";
		$evento_nomb_corto="";	
		$info_prov_cc="";
		$info_prov_cco="";
		$info_prov_titulo=""; 
		$info_prov_msj_fijo="";
		$info_prov_msj_variable=""; 
		$info_prov_msj_pie_pagina="";
		$form_ins_cc="";
		$form_ins_cco="";
		$form_ins_titulo=""; 
		$form_ins_msj_variable=""; 
		$form_ins_msj_pie_pagina="";
		
		
		//echo $sql;
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					$evento_nombre=$row["evento_nombre"]; 
					$evento_nomb_corto=$row["evento_nomb_corto"];
					$info_prov_cc=$row["info_prov_cc"];
					$info_prov_cco=$row["info_prov_cco"];
					$info_prov_titulo=$row["info_prov_titulo"]; 
					$info_prov_msj_fijo=$row["info_prov_msj_fijo"];
					$info_prov_msj_variable=$row["info_prov_msj_variable"]; 
					$info_prov_msj_pie_pagina=$row["info_prov_msj_pie_pagina"];
					$form_ins_cc=$row["form_ins_cc"];
					$form_ins_cco=$row["form_ins_cco"];
					$form_ins_titulo=$row["form_ins_titulo"]; 
					$form_ins_msj_variable=$row["form_ins_msj_variable"]; 
					$form_ins_msj_pie_pagina=$row["form_ins_msj_pie_pagina"];
					
					
					
					
					$CC="";
					$CC=$info_prov_cc;
					
					$CCO="";
					$CCO=$info_prov_cco;
					
					$Subject="";
					$Subject=$info_prov_titulo;
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
					
					
					$body="";
					$body.=$info_prov_msj_variable;
					$body.="<br><br><br>";
					$body.=$info_prov_msj_pie_pagina;
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
					
					
					$proveedordet = new Proveedor('mysql', 'eventos');
					$proveedordet->connect();
					$sql=" 
						select event_det_id, event_compr_prov_id, event_tipo 
						,prov_dat_emp_nomcomercial, prov_dat_emp_cont_adm, prov_dat_per_email
						from 
						eventos_detalle_comp_proveed 
						left join eventos_proveedores on eventos_detalle_comp_proveed.event_compr_prov_id=eventos_proveedores.prov_id
						where event_det_id in(".$cadena_notif.") and event_tipo='P'
						
						
				
					";
					$proveedordet->execute($sql);
					if (!$proveedordet->error()){
						if ($proveedordet->rows($proveedordet->stmt) > 0) {
							while ($rowd = $proveedordet->fetch_array($proveedordet->stmt, 0)) {
								$msj_fijo=str_replace("<<EMPRESA>>", $rowd["prov_dat_emp_nomcomercial"], $info_prov_msj_fijo);
								$msj_fijo=str_replace("<<CONTACTO>>", $rowd["prov_dat_emp_cont_adm"], $msj_fijo);
								
								
								$Para=$rowd["prov_dat_per_email"];
								$obj = new CURL();
								$url = "https://bsolutionsmx.com/ole/eventos/envio_correo_externo/send_external_email.asp";                                       
								
								//Productivo
								$data = array('strPassword' => '52O37L62E', 'strSubject' => $Subject,'strTo'=>$Para,'strHTMLBody'=>$msj_fijo."<br><br>".$body,'strCc'=>$CC,'strBCC'=>'jose8_23@hotmail.com; mramos@bsolutionsmx.com; '.$CCO, 'event_det_id'=>$rowd["event_det_id"]);
								//Pruebas
								//$data = array('strPassword' => '52O37L62E', 'strSubject' => $Subject,'strTo'=>"jose8_23@hotmail.com; mramos@bsolutionsmx.com",'strHTMLBody'=>$msj_fijo."<br><br>".$body,'strCc'=>"",'strBCC'=>"", 'event_det_id'=>$rowd["event_det_id"]);
								//echo "<pre>";
								//print_r($data);
								//echo "</pre>";
								$correoASP = $obj->curlData($url,$data);
								$contador=$contador+1;
							
							}
							
							
						}
					}
					
					
					
					
					
				}
			}
		}else{
			$Error=true;
		}
		$proveedor->close();
		
		
		$respuesta = array("totalCount" => $contador, "estatus" => "ok", "mensaje" => "Enviados");
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}
	
	
	public function consultar_det_prov($evento_id, $event_tipo){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$sql=" 
			select *, 
				(select CONCAT(prov_dat_per_nombres,' ',prov_dat_per_ap_pat,' ',prov_dat_per_ap_mat) as nombre from eventos_proveedores where prov_id=eventos_detalle_comp_proveed.event_compr_prov_id limit 1) as nombre
			from eventos_detalle_comp_proveed where event_status<>'E' 
			and event_admin_id=".$evento_id." and event_tipo='".$event_tipo."'
		
		";
		
		
		//echo $sql;
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					
					$Data= array(
						"event_det_id" => $row["event_det_id"],
						"event_admin_id" => $row["event_admin_id"],
						"event_compr_prov_id" => $row["event_compr_prov_id"],
						"event_tipo" => $row["event_tipo"],
						"evento_enviado" => $row["evento_enviado"],
						"nombre" => $row["nombre"]
						
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
	
	
	public function consultar_det_compr($evento_id, $event_tipo){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$sql=" 
		
			select *, 

			(select CONCAT(compr_dat_per_nombres,' ',compr_dat_per_ap_pat,' ',compr_dat_per_ap_mat)  from eventos_compradores where compr_id=eventos_detalle_comp_proveed.event_compr_prov_id limit 1)as nombre
			from eventos_detalle_comp_proveed where event_status<>'E' 
			and event_admin_id=".$evento_id." and event_tipo='".$event_tipo."'
		
		";
		
		
		//echo $sql;
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					
					$Data= array(
						"event_det_id" => $row["event_det_id"],
						"event_admin_id" => $row["event_admin_id"],
						"event_compr_prov_id" => $row["event_compr_prov_id"],
						"event_tipo" => $row["event_tipo"],
						"evento_enviado" => $row["evento_enviado"],
						"nombre" => $row["nombre"]
						
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
	
	public function guardar_evento($evento_id, $evento_nombre, $evento_nomb_corto, $evento_logo, $evento_desc, $evento_sede_hotel, $evento_ciudad, $evento_fech_i, $evento_hora_i, $evento_fech_f, $evento_hora_f, $evento_pag_web, $evento_contactos, $evento_raz_social_org, $evento_modifico, $evento_estatus, $cadena_compradores, $cadena_provedores, $Array_Compradores, $Array_Proveedores, $evento_hora_no_disp_i, $evento_hora_no_disp_f, $evento_servicios){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		$Error=false;
		$Idmaximo="";
		
		$proveedor_M = new Proveedor('mysql', 'eventos');
		$proveedor_M->connect();
		$proveedor_M->beginTransaction();
		//Obtengo el Id Maximo
		$valormaximo=" select CASE when max(evento_id+1) IS NULL then 1 else (max(evento_id + 1)) end as IndiceMaximo from eventos_admin ";
		$proveedor_M->execute($valormaximo);
		
		if (!$proveedor_M->error()){
			if ($proveedor_M->rows($proveedor_M->stmt) > 0) {
				$row_max = $proveedor_M->fetch_array($proveedor_M->stmt, 0);
				
				
				$Idmaximo=$row_max["IndiceMaximo"];
				
				$strSQL="insert into eventos_admin ";
				$strSQL.="(
					evento_id
					,evento_nombre
					,evento_nomb_corto
					,evento_logo
					,evento_desc
					,evento_sede_hotel
					,evento_ciudad
					,evento_fech_i
					,evento_hora_i
					,evento_fech_f
					,evento_hora_f
					,evento_pag_web
					,evento_contactos
					,evento_raz_social_org
					,evento_time_stamp
					,evento_modifico
					,evento_estatus
					,cadena_compradores
					,cadena_provedores
					,evento_hora_no_disp_i
					,evento_hora_no_disp_f
					,evento_servicios
				) "; 
				$strSQL.="VALUES ";
				$strSQL.="(
					".$Idmaximo."
					,'".$evento_nombre."'
					,'".$evento_nomb_corto."'
					, '".$evento_logo."'
					, '".$evento_desc."'
					, '".$evento_sede_hotel."'
					, '".$evento_ciudad."'
					, '".$evento_fech_i."'
					, '".$evento_hora_i."'
					, '".$evento_fech_f."'
					, '".$evento_hora_f."'
					, '".$evento_pag_web."'
					, '".$evento_contactos."'
					, '".$evento_raz_social_org."'
					,now()
					, '".$evento_modifico."'
					, '".$evento_estatus."'
					, '".$cadena_compradores."'
					, '".$cadena_provedores."'}
					, '".$evento_hora_no_disp_i."'
					, '".$evento_hora_no_disp_f."'
					, '".$evento_servicios."'
					)";
				
				$proveedor_M->execute($strSQL);
				
				if (!$proveedor_M->error()){
					//Guarda Compradores
					for($i=0; $i<count($Array_Compradores); $i++){
						if($Array_Compradores[$i][2]!=""){
							$Guardar_Comp=$this->insert_detalle_evento($Idmaximo, $Array_Compradores[$i][0],  $Array_Compradores[$i][1], 'A', $Array_Compradores[$i][2], $proveedor_M);
							if($Guardar_Comp==true){$Error=true;}
						}
					}
					
					//Guarda Proveedores
					for($i=0; $i<count($Array_Proveedores); $i++){
						if($Array_Proveedores[$i][2]!=""){
							$Guardar_Prov=$this->insert_detalle_evento($Idmaximo, $Array_Proveedores[$i][0],  $Array_Proveedores[$i][1], 'A', $Array_Proveedores[$i][2], $proveedor_M);
							if($Guardar_Prov==true){$Error=true;}
						}
					}
					
					
				}else{
					$Error=true;
				}
			
			}
		}else{
			$Error=true;
		}
		
		
		
		
		
		if($Error==false){
			$proveedor_M->commit();
			$respuesta = array("totalCount" => "1","evento_id" =>$Idmaximo, "estatus" => "ok", "mensaje" => "Se ha registrado correctamente");
		}else{
			$proveedor_M->rollback();
			$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al registrar");
		}
		
		$proveedor_M->close();
		
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}

	public function insert_detalle_evento($event_admin_id, $event_compr_prov_id, $event_tipo, $event_status, $accion, $proveedor_M){
		$Error=false;
		
		$sql="
			select * from eventos_detalle_comp_proveed where event_admin_id=".$event_admin_id." and event_compr_prov_id=".$event_compr_prov_id."
		";
		$proveedor_M->execute($sql);
		if (!$proveedor_M->error()){
			if ($proveedor_M->rows($proveedor_M->stmt) > 0) {
				$row = $proveedor_M->fetch_array($proveedor_M->stmt, 0);
				$event_det_id=$row["event_det_id"];
				
				$sql="update eventos_detalle_comp_proveed
					set event_status='A'
					where event_det_id=".$event_det_id."
				";
				//echo $sql;
				$proveedor_M->execute($sql);
				
				if (!$proveedor_M->error()){
				}else{
					$Error=true;
				}
				
			}else{
				$sql="insert into eventos_detalle_comp_proveed(
					event_admin_id
					,event_compr_prov_id
					,event_tipo
					,event_status
				)values(
					".$event_admin_id."
					,".$event_compr_prov_id."
					,'".$event_tipo."'
					,'".$event_status."'
				)";
				//echo $sql;
				$proveedor_M->execute($sql);
				
				if (!$proveedor_M->error()){
				}else{
					$Error=true;
				}
			}
		}else{
			$Error=true;
		}
		
		
		
		
		
		
		
		return $Error;
		
	}
	
	public function update_detalle_evento($event_det_id, $event_status, $proveedor_M){
		$Error=false;
		if($event_det_id!=""){
			$sql="update eventos_detalle_comp_proveed
				set event_status='".$event_status."'
				where event_det_id=".$event_det_id."
			";
			//echo $sql;
			$proveedor_M->execute($sql);
			
			if (!$proveedor_M->error()){
			}else{
				$Error=true;
			}
		}else{
			$Error=true;
		}
		
		
		return $Error;
		
	}
	
	public function editar_evento($evento_id, $evento_nombre, $evento_nomb_corto, $evento_logo, $evento_desc, $evento_sede_hotel, $evento_ciudad, $evento_fech_i, $evento_hora_i, $evento_fech_f, $evento_hora_f, $evento_pag_web, $evento_contactos, $evento_raz_social_org, $evento_modifico, $evento_estatus, $cadena_compradores, $cadena_provedores, $Array_Compradores, $Array_Proveedores, $evento_hora_no_disp_i, $evento_hora_no_disp_f, $evento_servicios){	
		$respuesta = array();
		$Error=false;
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$proveedor->beginTransaction();
		$strSQL="update eventos_admin ";
		$strSQL.="set 
					evento_nombre='".$evento_nombre."'
					, evento_nomb_corto='".$evento_nomb_corto."'
					, evento_logo='".$evento_logo."'
					, evento_desc='".$evento_desc."'
					
					, evento_sede_hotel='".$evento_sede_hotel."'
					, evento_ciudad='".$evento_ciudad."'
					, evento_fech_i='".$evento_fech_i."'
					, evento_hora_i='".$evento_hora_i."'
					, evento_fech_f='".$evento_fech_f."'
					, evento_hora_f='".$evento_hora_f."'
					, evento_pag_web='".$evento_pag_web."'
					, evento_contactos='".$evento_contactos."'
					, evento_raz_social_org='".$evento_raz_social_org."'
					, evento_modifico='".$evento_modifico."'
					, evento_estatus='".$evento_estatus."'
					, cadena_compradores='".$cadena_compradores."'
					, cadena_provedores='".$cadena_provedores."'
					, evento_time_stamp=now() 
					, evento_hora_no_disp_i='".$evento_hora_no_disp_i."'
					, evento_hora_no_disp_f='".$evento_hora_no_disp_f."'
					, evento_servicios='".$evento_servicios."'
					"; 
					
		$strSQL.="where ";
		$strSQL.="evento_id=".$evento_id; 
		//echo $strSQL;
		$proveedor->execute($strSQL);
		
		if (!$proveedor->error()){
			//Guarda y Elimina Compradores
			/*
			for($i=0; $i<count($Array_Compradores); $i++){
				if($Array_Compradores[$i][2]=="Insert"){
					$Guardar_Comp=$this->insert_detalle_evento($evento_id, $Array_Compradores[$i][0],  $Array_Compradores[$i][1], 'A', $Array_Compradores[$i][2], $proveedor);
					if($Guardar_Comp==true){$Error=true;}
				}
				
				if($Array_Compradores[$i][2]=="Delete"){
					$Delete_Comp=$this->update_detalle_evento($Array_Compradores[$i][3],  'E', $proveedor);
					if($Delete_Comp==true){$Error=true;}
				}
			}
			*/
			
			//Guarda y Elimina Proveedores
			for($i=0; $i<count($Array_Proveedores); $i++){
				if($Array_Proveedores[$i][2]=="Insert"){
					$Guardar_Prov=$this->insert_detalle_evento($evento_id, $Array_Proveedores[$i][0],  $Array_Proveedores[$i][1], 'A', $Array_Proveedores[$i][2], $proveedor);
					if($Guardar_Prov==true){$Error=true;}
				}
				
				if($Array_Proveedores[$i][2]=="Delete"){
					$Delete_Prov=$this->update_detalle_evento($Array_Proveedores[$i][3],  'E', $proveedor);
					if($Delete_Prov==true){$Error=true;}
				}
			}
			
		}else{
			$Error=true;
		}
		
		
		
		
		
		if($Error==false){
			$proveedor->commit();
			$respuesta = array("totalCount" => "1", "estatus" => "ok", "mensaje" => "Se ha actualizado el registro correctamente");
		}else{
			$proveedor->rollback();
			$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al actualizar informaci?n");
		}
		$proveedor->close();
		
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}	

	public function guardar_info_prov($evento_id, $info_prov_cc, $info_prov_cco, $info_prov_titulo, $info_prov_msj_fijo, $info_prov_msj_variable, $info_prov_msj_pie_pagina, $evento_modifico, $evento_estatus){
		
		$respuesta = array();
		$Error=false;
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$proveedor->beginTransaction();
		$strSQL="update eventos_admin ";
		$strSQL.="set 
					info_prov_cc='".$info_prov_cc."'
					, info_prov_cco='".$info_prov_cco."'
					, info_prov_titulo='".$info_prov_titulo."'
					, info_prov_msj_fijo='".$info_prov_msj_fijo."'
					, info_prov_msj_variable='".$info_prov_msj_variable."'
					, info_prov_msj_pie_pagina='".$info_prov_msj_pie_pagina."'
					, evento_modifico='".$evento_modifico."'
					, evento_estatus='".$evento_estatus."'
					, evento_time_stamp=now() "; 
		$strSQL.="where ";
		$strSQL.="evento_id=".$evento_id; 
		//echo $strSQL;
		$proveedor->execute($strSQL);
		
		
		if($Error==false){
			$proveedor->commit();
			$respuesta = array("totalCount" => "1", "estatus" => "ok", "mensaje" => "Se ha actualizado el registro correctamente");
		}else{
			$proveedor->rollback();
			$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al actualizar");
		}
		$proveedor->close();
		
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}

	public function guardar_form_inscrip($evento_id, $form_ins_cc, $form_ins_cco, $form_ins_titulo, $form_ins_msj_variable, $form_ins_msj_pie_pagina, $evento_modifico, $evento_estatus){
		
		$respuesta = array();
		$Error=false;
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$proveedor->beginTransaction();
		$strSQL="update eventos_admin ";
		$strSQL.="set 
					form_ins_cc='".$form_ins_cc."'
					, form_ins_cco='".$form_ins_cco."'
					, form_ins_titulo='".$form_ins_titulo."'
					, form_ins_msj_variable='".$form_ins_msj_variable."'
					, form_ins_msj_pie_pagina='".$form_ins_msj_pie_pagina."'
					, evento_modifico='".$evento_modifico."'
					, evento_estatus='".$evento_estatus."'
					, evento_time_stamp=now() "; 
		$strSQL.="where ";
		$strSQL.="evento_id=".$evento_id; 
		//echo $strSQL;
		$proveedor->execute($strSQL);
		
		
		if($Error==false){
			$proveedor->commit();
			$respuesta = array("totalCount" => "1", "estatus" => "ok", "mensaje" => "Se ha actualizado el registro correctamente");
		}else{
			$proveedor->rollback();
			$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al actualizar");
		}
		$proveedor->close();
		
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}

	public function enviar_invitacion_compr($evento_id, $form_ins_to, $form_ins_cc, $form_ins_cco, $form_ins_titulo, $form_ins_msj_variable, $form_ins_msj_pie_pagina, $evento_modifico, $evento_estatus){
		
		$respuesta = array();
		$Error=false;
		
		$TO="";
		$TO=$form_ins_to;
		
		$CC="";
		$CC=$form_ins_cc;
		
		$CCO="";
		$CCO=$form_ins_cco;
		
		$Subject="";
		$Subject=$form_ins_titulo;
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
		
		
		$body="";
		$body.=$form_ins_msj_variable;
		$body.="<br><br><br>";
		$body.=$form_ins_msj_pie_pagina;
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
		
		if($TO!=""){
			$obj = new CURL();
			$url = "https://bsolutionsmx.com/ole/eventos/envio_correo_externo/send_external_email.asp"; 
			$data = array('strPassword' => '52O37L62E', 'strSubject' => $Subject,'strTo'=>$TO,'strHTMLBody'=>$body,'strCc'=>$CC,'strBCC'=>'jose8_23@hotmail.com; mramos@bsolutionsmx.com; '.$CCO);
			$correoASP = $obj->curlData($url,$data);
		}
		
		$respuesta = array("totalCount" => "1", "estatus" => "ok", "mensaje" => "Se ha enviado la invitación correctamente.");
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}
	
	
	public function eliminar_evento($evento_id, $evento_estatus, $evento_modifico){
		
		$respuesta = array();
		$Error=false;
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();	
		$strSQL="update eventos_admin ";
		$strSQL.="set evento_estatus='".$evento_estatus."', evento_modifico='".$evento_modifico."', evento_time_stamp=now() "; 
		$strSQL.="where ";
		$strSQL.="evento_id=".$evento_id; 
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
	

}


@$evento_id=$_POST["evento_id"];
@$evento_nombre=$_POST["evento_nombre"];
@$evento_nomb_corto=$_POST["evento_nomb_corto"];
@$evento_logo=$_POST["evento_logo"];
@$evento_desc=$_POST["evento_desc"];
@$evento_sede_hotel=$_POST["evento_sede_hotel"];
@$evento_ciudad=$_POST["evento_ciudad"];
@$evento_fech_i=$_POST["evento_fech_i"];
@$evento_hora_i=$_POST["evento_hora_i"];
@$evento_fech_f=$_POST["evento_fech_f"];
@$evento_hora_f=$_POST["evento_hora_f"];
@$evento_pag_web=$_POST["evento_pag_web"];
@$evento_contactos=$_POST["evento_contactos"];
@$evento_raz_social_org=$_POST["evento_raz_social_org"];
@$evento_modifico=$_POST["evento_modifico"];
@$evento_estatus=$_POST["evento_estatus"];
@$cadena_compradores=$_POST["cadena_compradores"];
@$cadena_provedores=$_POST["cadena_provedores"];
@$Array_Compradores=$_POST["Array_Compradores"];
@$Array_Proveedores=$_POST["Array_Proveedores"];
@$evento_hora_no_disp_i=$_POST["evento_hora_no_disp_i"];
@$evento_hora_no_disp_f=$_POST["evento_hora_no_disp_f"];
@$evento_servicios=$_POST["evento_servicios"];

@$info_prov_cc=$_POST["info_prov_cc"];
@$info_prov_cco=$_POST["info_prov_cco"];
@$info_prov_titulo=$_POST["info_prov_titulo"];
@$info_prov_msj_fijo=$_POST["info_prov_msj_fijo"];
@$info_prov_msj_variable=$_POST["info_prov_msj_variable"];
@$info_prov_msj_pie_pagina=$_POST["info_prov_msj_pie_pagina"];

@$form_ins_to=$_POST["form_ins_to"];
@$form_ins_cc=$_POST["form_ins_cc"];
@$form_ins_cco=$_POST["form_ins_cco"];
@$form_ins_titulo=$_POST["form_ins_titulo"];
@$form_ins_msj_variable=$_POST["form_ins_msj_variable"];
@$form_ins_msj_pie_pagina=$_POST["form_ins_msj_pie_pagina"];

@$cadena_notif=$_POST["cadena_notif"];

@$event_tipo=$_POST["event_tipo"];

if($evento_fech_i!=""){
	$evento_fech_i=$evento_fech_i[6].$evento_fech_i[7].$evento_fech_i[8].$evento_fech_i[9]."-".$evento_fech_i[3].$evento_fech_i[4]."-".$evento_fech_i[0].$evento_fech_i[1];
}
	
if($evento_fech_f!=""){
	$evento_fech_f=$evento_fech_f[6].$evento_fech_f[7].$evento_fech_f[8].$evento_fech_f[9]."-".$evento_fech_f[3].$evento_fech_f[4]."-".$evento_fech_f[0].$evento_fech_f[1];
}

@$accion=$_POST["accion"];
$Consultas = new consultas();
if($accion=="consultar_eventos"){
	$eventos=$Consultas->consultar_eventos($evento_id);
	echo $eventos; 
}else if($accion=="guardar_evento"){	
	$eventos=$Consultas->guardar_evento($evento_id, $evento_nombre, $evento_nomb_corto, $evento_logo, $evento_desc, $evento_sede_hotel, $evento_ciudad, $evento_fech_i, $evento_hora_i, $evento_fech_f, $evento_hora_f, $evento_pag_web, $evento_contactos, $evento_raz_social_org, $evento_modifico, $evento_estatus, $cadena_compradores, $cadena_provedores, $Array_Compradores, $Array_Proveedores, $evento_hora_no_disp_i, $evento_hora_no_disp_f, $evento_servicios);
	echo $eventos;
}else if($accion=="editar_evento"){	
	$eventos=$Consultas->editar_evento($evento_id, $evento_nombre, $evento_nomb_corto, $evento_logo, $evento_desc, $evento_sede_hotel, $evento_ciudad, $evento_fech_i, $evento_hora_i, $evento_fech_f, $evento_hora_f, $evento_pag_web, $evento_contactos, $evento_raz_social_org, $evento_modifico, $evento_estatus, $cadena_compradores, $cadena_provedores, $Array_Compradores, $Array_Proveedores, $evento_hora_no_disp_i, $evento_hora_no_disp_f, $evento_servicios);
	echo $eventos;
}else if($accion=="eliminar_evento"){	
	$eventos=$Consultas->eliminar_evento($evento_id, $evento_estatus, $evento_modifico);
	echo $eventos;
}else if($accion=="guardar_info_prov"){	
	$eventos=$Consultas->guardar_info_prov($evento_id, $info_prov_cc, $info_prov_cco, $info_prov_titulo, $info_prov_msj_fijo, $info_prov_msj_variable, $info_prov_msj_pie_pagina, $evento_modifico, $evento_estatus);
	echo $eventos;
}else if($accion=="guardar_form_inscrip"){	
	$eventos=$Consultas->guardar_form_inscrip($evento_id, $form_ins_cc, $form_ins_cco, $form_ins_titulo, $form_ins_msj_variable, $form_ins_msj_pie_pagina, $evento_modifico, $evento_estatus);
	echo $eventos;
}else if($accion=="enviar_invitacion_compr"){	
	$eventos=$Consultas->enviar_invitacion_compr($evento_id, $form_ins_to, $form_ins_cc, $form_ins_cco, $form_ins_titulo, $form_ins_msj_variable, $form_ins_msj_pie_pagina, $evento_modifico, $evento_estatus);
	echo $eventos;
}else if($accion=="consultar_det_prov"){	
	$eventos=$Consultas->consultar_det_prov($evento_id,  $event_tipo);
	echo $eventos;
}else if($accion=="consultar_det_compr"){	
	$eventos=$Consultas->consultar_det_compr($evento_id,  $event_tipo);
	echo $eventos;
}else if($accion=="envia_notificacion_compradores"){	
	$eventos=$Consultas->envia_notificacion_compradores($evento_id, $cadena_notif);
	echo $eventos;
}else if($accion=="envia_notificacion_proveedores"){	
	$eventos=$Consultas->envia_notificacion_proveedores($evento_id, $cadena_notif);
	echo $eventos;
}