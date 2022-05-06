<?php
include_once("../datos/dtotojson/DtoToJson.Class.php");
include_once("../datos/json/JsonEncod.Class.php");
include_once("../datos/json/JsonDecod.Class.php");
include_once("../datos/connect/Proveedor.Class.php");
class consultas {
	public function __construct() {
	}
	
	public function consultar_comprador($compr_id){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$sql=" 
			select 
				* 
				,(SELECT 	evento_nombre FROM eventos_admin WHERE  eventos_admin.evento_id=eventos_compradores.evento_id) as Nombre_Evento
			from eventos_compradores where compr_estatus<>'E'
		";
		
		if($compr_id!=""){
			$sql.=" 
				and compr_id=".$compr_id."
			";				
		}
		
		
		//echo $sql;
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					
					
					$logo=$row["compr_dat_emp_logo_empr"];
					$foto=$row["compr_dat_per_foto"];
					$Data= array(
						"compr_id" => $row["compr_id"],
						"compr_dat_per_ap_pat" => $row["compr_dat_per_ap_pat"],
						"compr_dat_per_ap_mat" => $row["compr_dat_per_ap_mat"],
						"compr_dat_per_nombres" => $row["compr_dat_per_nombres"],
						"compr_dat_per_cargo" => $row["compr_dat_per_cargo"],
						"compr_dat_per_email" => $row["compr_dat_per_email"],
						"compr_dat_per_telef_directo" => $row["compr_dat_per_telef_directo"],
						"compr_dat_per_telef_directo_ext" => $row["compr_dat_per_telef_directo_ext"],
						"compr_dat_per_celular" => $row["compr_dat_per_celular"],
						"compr_dat_per_cont_asist" => $row["compr_dat_per_cont_asist"],
						"compr_dat_per_mail_alter" => $row["compr_dat_per_mail_alter"],
						"compr_dat_per_foto" => $foto,
						"compr_dat_per_area" => $row["compr_dat_per_area"],
						"compr_dat_per_area_otro" => $row["compr_dat_per_area_otro"],
						"compr_dat_emp_nomcomercial" => $row["compr_dat_emp_nomcomercial"],
						"compr_dat_emp_raz_soc" => $row["compr_dat_emp_raz_soc"],
						"compr_dat_emp_ciudad" => $row["compr_dat_emp_ciudad"],
						"compr_dat_emp_estado" => $row["compr_dat_emp_estado"],
						"compr_dat_emp_calle" => $row["compr_dat_emp_calle"],
						"compr_dat_emp_num_int" => $row["compr_dat_emp_num_int"],
						"compr_dat_emp_num_ext" => $row["compr_dat_emp_num_ext"],
						"compr_dat_emp_colonia" => $row["compr_dat_emp_colonia"],
						"compr_dat_emp_cp" => $row["compr_dat_emp_cp"],
						"compr_dat_emp_pais" => $row["compr_dat_emp_pais"],
						"compr_dat_emp_telef" => $row["compr_dat_emp_telef"],
						"compr_dat_emp_pag_web" => $row["compr_dat_emp_pag_web"],
						"compr_dat_emp_desc_empre" => $row["compr_dat_emp_desc_empre"],
						"compr_dat_emp_giro" => $row["compr_dat_emp_giro"],
						"compr_dat_emp_logo_empr" => $logo,
						"compr_time_stamp" => $row["compr_time_stamp"],
						"compr_modifico" => $row["compr_modifico"],
						"compr_estatus" => $row["compr_estatus"],
						"evento_id" => $row["evento_id"],
						"Nombre_Evento" => $row["Nombre_Evento"]
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
	
	public function consultar_comprador_cmb($compr_id){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$sql=" 
			select  compr_id, compr_dat_per_ap_pat, compr_dat_per_ap_mat, compr_dat_per_nombres, compr_dat_emp_nomcomercial from eventos_compradores where compr_estatus<>'E'
		";
		
		if($compr_id!=""){
			$sql.=" 
				and compr_id=".$compr_id."
			";				
		}
		
		
		//echo $sql;
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					
				
					$Data= array(
						"compr_id" => $row["compr_id"],
						"compr_dat_per_ap_pat" => $row["compr_dat_per_ap_pat"],
						"compr_dat_per_ap_mat" => $row["compr_dat_per_ap_mat"],
						"compr_dat_per_nombres" => $row["compr_dat_per_nombres"],
						//"compr_dat_per_cargo" => $row["compr_dat_per_cargo"],
						//"compr_dat_per_email" => $row["compr_dat_per_email"],
						//"compr_dat_per_telef_directo" => $row["compr_dat_per_telef_directo"],
						//"compr_dat_per_celular" => $row["compr_dat_per_celular"],
						//"compr_dat_per_cont_asist" => $row["compr_dat_per_cont_asist"],
						//"compr_dat_per_mail_alter" => $row["compr_dat_per_mail_alter"],
						//"compr_dat_per_foto" => $foto,
						//"compr_dat_per_area" => $row["compr_dat_per_area"],
						//"compr_dat_per_area_otro" => $row["compr_dat_per_area_otro"],
						"compr_dat_emp_nomcomercial" => $row["compr_dat_emp_nomcomercial"],
						//"compr_dat_emp_ciudad" => $row["compr_dat_emp_ciudad"],
						//"compr_dat_emp_estado" => $row["compr_dat_emp_estado"],
						//"compr_dat_emp_calle" => $row["compr_dat_emp_calle"],
						//"compr_dat_emp_colonia" => $row["compr_dat_emp_colonia"],
						//"compr_dat_emp_cp" => $row["compr_dat_emp_cp"],
						//"compr_dat_emp_pais" => $row["compr_dat_emp_pais"],
						//"compr_dat_emp_telef" => $row["compr_dat_emp_telef"],
						//"compr_dat_emp_pag_web" => $row["compr_dat_emp_pag_web"],
						//"compr_dat_emp_desc_empre" => $row["compr_dat_emp_desc_empre"],
						//"compr_dat_emp_giro" => $row["compr_dat_emp_giro"],
						//"compr_dat_emp_logo_empr" => $logo,
						//"compr_time_stamp" => $row["compr_time_stamp"],
						//"compr_modifico" => $row["compr_modifico"],
						//"compr_estatus" => $row["compr_estatus"]
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
	
	public function guardar_comprador($compr_id, $compr_dat_per_ap_pat, $compr_dat_per_ap_mat, $compr_dat_per_nombres, $compr_dat_per_cargo, $compr_dat_per_email, $compr_dat_per_telef_directo, $compr_dat_per_telef_directo_ext, $compr_dat_per_celular, $compr_dat_per_cont_asist, $compr_dat_per_mail_alter, $compr_dat_per_foto, $compr_dat_per_area, $compr_dat_per_area_otro, $compr_dat_emp_nomcomercial, $compr_dat_emp_raz_soc, $compr_dat_emp_ciudad, $compr_dat_emp_estado, $compr_dat_emp_calle, $compr_dat_emp_num_int, $compr_dat_emp_num_ext, $compr_dat_emp_colonia, $compr_dat_emp_cp, $compr_dat_emp_pais, $compr_dat_emp_telef, $compr_dat_emp_pag_web, $compr_dat_emp_desc_empre, $compr_dat_emp_giro, $compr_dat_emp_logo_empr, $compr_modifico, $compr_estatus, $evento_id){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		$Error=false;
		$Idmaximo="";
		
		$proveedor_M = new Proveedor('mysql', 'eventos');
		$proveedor_M->connect();
		//Obtengo el Id Maximo
		$valormaximo=" select CASE when max(compr_id+1) IS NULL then 1 else (max(compr_id + 1)) end as IndiceMaximo from eventos_compradores ";
		$proveedor_M->execute($valormaximo);
		
		if (!$proveedor_M->error()){
			if ($proveedor_M->rows($proveedor_M->stmt) > 0) {
				$row_max = $proveedor_M->fetch_array($proveedor_M->stmt, 0);
				$Idmaximo=$row_max["IndiceMaximo"];
				
				
				
				$proveedor = new Proveedor('mysql', 'eventos');
				$proveedor->connect();	
				$strSQL="insert into eventos_compradores ";
				$strSQL.="(
					compr_dat_per_ap_pat
					,compr_dat_per_ap_mat
					,compr_dat_per_nombres
					,compr_dat_per_cargo
					,compr_dat_per_email
					,compr_dat_per_telef_directo
					,compr_dat_per_telef_directo_ext
					,compr_dat_per_celular
					,compr_dat_per_cont_asist
					,compr_dat_per_mail_alter
					,compr_dat_per_foto
					,compr_dat_per_area
					,compr_dat_per_area_otro
					,compr_dat_emp_nomcomercial
					,compr_dat_emp_raz_soc
					,compr_dat_emp_ciudad
					,compr_dat_emp_estado
					,compr_dat_emp_calle
					,compr_dat_emp_num_int
					,compr_dat_emp_num_ext
					,compr_dat_emp_colonia
					,compr_dat_emp_cp
					,compr_dat_emp_pais
					,compr_dat_emp_telef
					,compr_dat_emp_pag_web
					,compr_dat_emp_desc_empre
					,compr_dat_emp_giro
					,compr_dat_emp_logo_empr
					,compr_time_stamp
					,compr_modifico
					,compr_estatus
					,evento_id
				) "; 
				$strSQL.="VALUES ";
				$strSQL.="(
					'".$compr_dat_per_ap_pat."'
					, '".$compr_dat_per_ap_mat."'
					, '".$compr_dat_per_nombres."'
					, '".$compr_dat_per_cargo."'
					, '".$compr_dat_per_email."'
					, '".$compr_dat_per_telef_directo."'
					, '".$compr_dat_per_telef_directo_ext."'
					, '".$compr_dat_per_celular."'
					, '".$compr_dat_per_cont_asist."'
					, '".$compr_dat_per_mail_alter."'
					, '".$compr_dat_per_foto."'
					, '".$compr_dat_per_area."'
					, '".$compr_dat_per_area_otro."'
					, '".$compr_dat_emp_nomcomercial."'
					, '".$compr_dat_emp_raz_soc."'
					, '".$compr_dat_emp_ciudad."'
					, '".$compr_dat_emp_estado."'
					, '".$compr_dat_emp_calle."'
					, '".$compr_dat_emp_num_int."'
					, '".$compr_dat_emp_num_ext."'
					, '".$compr_dat_emp_colonia."'
					, '".$compr_dat_emp_cp."'
					, '".$compr_dat_emp_pais."'
					, '".$compr_dat_emp_telef."'
					, '".$compr_dat_emp_pag_web."'
					, '".$compr_dat_emp_desc_empre."'
					, '".$compr_dat_emp_giro."'
					, '".$compr_dat_emp_logo_empr."'
					,now()
					, '".$compr_modifico."'
					, '".$compr_estatus."'
					, ".$evento_id."
					)"; 
				
				//echo "<pre>";
				//echo $strSQL;
				//echo "</pre>";
				$proveedor->execute($strSQL);
				
				if (!$proveedor->error()){
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
			$respuesta = array("totalCount" => "1","evento_id" =>$Idmaximo, "estatus" => "ok", "mensaje" => "Se ha registrado correctamente");
		}else{
			$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al registrar");
		}
		
		
		
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}

	public function editar_comprador($compr_id, $compr_dat_per_ap_pat, $compr_dat_per_ap_mat, $compr_dat_per_nombres, $compr_dat_per_cargo, $compr_dat_per_email, $compr_dat_per_telef_directo, $compr_dat_per_telef_directo_ext, $compr_dat_per_celular, $compr_dat_per_cont_asist, $compr_dat_per_mail_alter, $compr_dat_per_foto, $compr_dat_per_area, $compr_dat_per_area_otro, $compr_dat_emp_nomcomercial, $compr_dat_emp_raz_soc, $compr_dat_emp_ciudad, $compr_dat_emp_estado, $compr_dat_emp_calle, $compr_dat_emp_num_int, $compr_dat_emp_num_ext, $compr_dat_emp_colonia, $compr_dat_emp_cp, $compr_dat_emp_pais, $compr_dat_emp_telef, $compr_dat_emp_pag_web, $compr_dat_emp_desc_empre, $compr_dat_emp_giro, $compr_dat_emp_logo_empr, $compr_modifico, $compr_estatus, $evento_id){
		
		$respuesta = array();
		$Error=false;
		
		
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();	
		$strSQL="update eventos_compradores ";
		$strSQL.="set 
					compr_dat_per_ap_pat='".$compr_dat_per_ap_pat."'
					, compr_dat_per_ap_mat='".$compr_dat_per_ap_mat."'
					, compr_dat_per_nombres='".$compr_dat_per_nombres."'
					
					, compr_dat_per_cargo='".$compr_dat_per_cargo."'
					, compr_dat_per_email='".$compr_dat_per_email."'
					, compr_dat_per_telef_directo='".$compr_dat_per_telef_directo."'
					, compr_dat_per_telef_directo_ext='".$compr_dat_per_telef_directo_ext."'
					, compr_dat_per_celular='".$compr_dat_per_celular."'
					, compr_dat_per_cont_asist='".$compr_dat_per_cont_asist."'
					, compr_dat_per_mail_alter='".$compr_dat_per_mail_alter."'
					, compr_dat_per_foto='".$compr_dat_per_foto."'
					, compr_dat_per_area='".$compr_dat_per_area."'
					, compr_dat_per_area_otro='".$compr_dat_per_area_otro."'
					, compr_dat_emp_nomcomercial='".$compr_dat_emp_nomcomercial."'
					, compr_dat_emp_raz_soc='".$compr_dat_emp_raz_soc."'
					, compr_dat_emp_ciudad='".$compr_dat_emp_ciudad."'
					, compr_dat_emp_estado='".$compr_dat_emp_estado."'
					, compr_dat_emp_calle='".$compr_dat_emp_calle."'
					, compr_dat_emp_num_int='".$compr_dat_emp_num_int."'
					, compr_dat_emp_num_ext='".$compr_dat_emp_num_ext."'
					, compr_dat_emp_colonia='".$compr_dat_emp_colonia."'
					, compr_dat_emp_cp='".$compr_dat_emp_cp."'
					, compr_dat_emp_pais='".$compr_dat_emp_pais."'
					, compr_dat_emp_telef='".$compr_dat_emp_telef."'
					, compr_dat_emp_pag_web='".$compr_dat_emp_pag_web."'
					, compr_dat_emp_desc_empre='".$compr_dat_emp_desc_empre."'
					, compr_dat_emp_giro='".$compr_dat_emp_giro."'
					, compr_dat_emp_logo_empr='".$compr_dat_emp_logo_empr."'
					, compr_modifico='".$compr_modifico."'
					, compr_estatus='".$compr_estatus."'
					, evento_id=".$evento_id."
					, compr_time_stamp=now() "; 
		$strSQL.="where ";
		$strSQL.=" compr_id=".$compr_id; 
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

	public function eliminar_comprador($compr_id, $compr_estatus, $compr_modifico){
		
		$respuesta = array();
		$Error=false;
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();	
		$strSQL="update eventos_compradores ";
		$strSQL.="set compr_estatus='".$compr_estatus."', compr_modifico='".$compr_modifico."', compr_time_stamp=now() "; 
		$strSQL.="where ";
		$strSQL.="compr_id=".$compr_id; 
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
	
	public function cmb_eventos($evento_id){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$sql=" 
			SELECT 	evento_id, evento_nombre FROM eventos_admin WHERE evento_estatus<>'E' 
		";
		
		if($evento_id!=""){
			$sql.="and evento_id=".$evento_id;
		}
		
		
		
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					
					$Data= array(
						"evento_id" => $row["evento_id"],
						"evento_nombre" => $row["evento_nombre"]
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


@$compr_id=$_POST["compr_id"];
@$compr_dat_per_ap_pat=$_POST["compr_dat_per_ap_pat"];
@$compr_dat_per_ap_mat=$_POST["compr_dat_per_ap_mat"];
@$compr_dat_per_nombres=$_POST["compr_dat_per_nombres"];
@$compr_dat_per_cargo=$_POST["compr_dat_per_cargo"];
@$compr_dat_per_email=$_POST["compr_dat_per_email"];
@$compr_dat_per_telef_directo=$_POST["compr_dat_per_telef_directo"];
@$compr_dat_per_telef_directo_ext=$_POST["compr_dat_per_telef_directo_ext"];
@$compr_dat_per_celular=$_POST["compr_dat_per_celular"];
@$compr_dat_per_cont_asist=$_POST["compr_dat_per_cont_asist"];
@$compr_dat_per_mail_alter=$_POST["compr_dat_per_mail_alter"];
@$compr_dat_per_foto=$_POST["compr_dat_per_foto"];
@$compr_dat_per_area=$_POST["compr_dat_per_area"];
@$compr_dat_per_area_otro=$_POST["compr_dat_per_area_otro"];
@$compr_dat_emp_nomcomercial=$_POST["compr_dat_emp_nomcomercial"];
@$compr_dat_emp_raz_soc=$_POST["compr_dat_emp_raz_soc"];
@$compr_dat_emp_ciudad=$_POST["compr_dat_emp_ciudad"];
@$compr_dat_emp_estado=$_POST["compr_dat_emp_estado"];
@$compr_dat_emp_calle=$_POST["compr_dat_emp_calle"];
@$compr_dat_emp_num_int=$_POST["compr_dat_emp_num_int"];
@$compr_dat_emp_num_ext=$_POST["compr_dat_emp_num_ext"];
@$compr_dat_emp_colonia=$_POST["compr_dat_emp_colonia"];
@$compr_dat_emp_cp=$_POST["compr_dat_emp_cp"];
@$compr_dat_emp_pais=$_POST["compr_dat_emp_pais"];
@$compr_dat_emp_telef=$_POST["compr_dat_emp_telef"];
@$compr_dat_emp_pag_web=$_POST["compr_dat_emp_pag_web"];
@$compr_dat_emp_desc_empre=$_POST["compr_dat_emp_desc_empre"];
@$compr_dat_emp_giro=$_POST["compr_dat_emp_giro"];
@$compr_dat_emp_logo_empr=$_POST["compr_dat_emp_logo_empr"];
@$compr_modifico=$_POST["compr_modifico"];
@$compr_estatus=$_POST["compr_estatus"];
@$evento_id=$_POST["evento_id"];






@$accion=$_POST["accion"];
$Consultas = new consultas();
if($accion=="consultar_comprador"){
	$comp=$Consultas->consultar_comprador($compr_id);
	echo $comp; 
}else if($accion=="guardar_comprador"){	
	$comp=$Consultas->guardar_comprador($compr_id, $compr_dat_per_ap_pat, $compr_dat_per_ap_mat, $compr_dat_per_nombres, $compr_dat_per_cargo, $compr_dat_per_email, $compr_dat_per_telef_directo, $compr_dat_per_telef_directo_ext, $compr_dat_per_celular, $compr_dat_per_cont_asist, $compr_dat_per_mail_alter, $compr_dat_per_foto, $compr_dat_per_area, $compr_dat_per_area_otro, $compr_dat_emp_nomcomercial, $compr_dat_emp_raz_soc, $compr_dat_emp_ciudad, $compr_dat_emp_estado, $compr_dat_emp_calle, $compr_dat_emp_num_int, $compr_dat_emp_num_ext, $compr_dat_emp_colonia, $compr_dat_emp_cp, $compr_dat_emp_pais, $compr_dat_emp_telef, $compr_dat_emp_pag_web, $compr_dat_emp_desc_empre, $compr_dat_emp_giro, $compr_dat_emp_logo_empr, $compr_modifico, $compr_estatus, $evento_id);
	echo $comp;
}else if($accion=="editar_comprador"){	
	$comp=$Consultas->editar_comprador($compr_id, $compr_dat_per_ap_pat, $compr_dat_per_ap_mat, $compr_dat_per_nombres, $compr_dat_per_cargo, $compr_dat_per_email, $compr_dat_per_telef_directo, $compr_dat_per_telef_directo_ext, $compr_dat_per_celular, $compr_dat_per_cont_asist, $compr_dat_per_mail_alter, $compr_dat_per_foto, $compr_dat_per_area, $compr_dat_per_area_otro, $compr_dat_emp_nomcomercial, $compr_dat_emp_raz_soc, $compr_dat_emp_ciudad, $compr_dat_emp_estado, $compr_dat_emp_calle, $compr_dat_emp_num_int, $compr_dat_emp_num_ext, $compr_dat_emp_colonia, $compr_dat_emp_cp, $compr_dat_emp_pais, $compr_dat_emp_telef, $compr_dat_emp_pag_web, $compr_dat_emp_desc_empre, $compr_dat_emp_giro, $compr_dat_emp_logo_empr, $compr_modifico, $compr_estatus, $evento_id);
	echo $comp;
}else if($accion=="eliminar_comprador"){	
	$comp=$Consultas->eliminar_comprador($compr_id, $compr_estatus, $compr_modifico);
	echo $comp;
}else if($accion=="consultar_comprador_cmb"){	
	$comp=$Consultas->consultar_comprador_cmb($compr_id);
	echo $comp;
}else if($accion=="cmb_eventos"){	
	$comp=$Consultas->cmb_eventos($evento_id);
	echo $comp;
}




?>