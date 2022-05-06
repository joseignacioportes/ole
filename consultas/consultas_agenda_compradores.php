<?php
include_once("../datos/dtotojson/DtoToJson.Class.php");
include_once("../datos/json/JsonEncod.Class.php");
include_once("../datos/json/JsonDecod.Class.php");
include_once("../datos/connect/Proveedor.Class.php");
class consultas {
	public function __construct() {
	}
	
	public function consultar_agenda($agenda_comp_evento_id, $agenda_comp_compr_id){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$sql=" 
			select 
				(select CONCAT(rtrim(ltrim(prov_dat_emp_nomcomercial)),':::',rtrim(ltrim(prov_dat_per_nombres)),' ',rtrim(ltrim(prov_dat_per_ap_pat)),' ',rtrim(ltrim(prov_dat_per_ap_mat))) from eventos_proveedores where prov_id=eventos_agenda_compradores.agenda_comp_prov_id) as proveedor
				,DATE_FORMAT(agenda_comp_fecha,'%d/%m/%Y') as fecha,
				agenda_comp_hora as hora	 
			from eventos_agenda_compradores 
			where
			(select event_status from eventos_detalle_comp_proveed where event_admin_id=".$agenda_comp_evento_id." and event_compr_prov_id=eventos_agenda_compradores.agenda_comp_prov_id and event_tipo='P')='A'
			
		";
		
		$sql.=" 
			and agenda_comp_evento_id=".$agenda_comp_evento_id."
		";	

		$sql.=" 
			and agenda_comp_compr_id=".$agenda_comp_compr_id."
		";		
		
		$sql.=' order by agenda_comp_fecha asc, agenda_comp_hora asc';
		
		
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					$Data= array(
						"proveedor" => $row["proveedor"],
						"fecha" => rtrim(ltrim($row["fecha"])),
						"hora" => rtrim(ltrim($row["hora"]))
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
	
	
	public function consultar_agenda_prov($agenda_comp_evento_id, $agenda_comp_prov_id){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$sql=" 
			select 
				(select CONCAT(rtrim(ltrim(reg_compr_dat_per_nombres)),' ',rtrim(ltrim(reg_compr_dat_per_ap_pat)),' ',rtrim(ltrim(reg_compr_dat_per_ap_mat))) from eventos_reg_compradores where reg_compr_id=eventos_agenda_compradores.agenda_comp_compr_id and evento_id=".$agenda_comp_evento_id.") as comprador
				,DATE_FORMAT(agenda_comp_fecha,'%d/%m/%Y') as fecha,
				agenda_comp_hora as hora	 
			from eventos_agenda_compradores where 
		";
		
		$sql.=" 
			agenda_comp_evento_id=".$agenda_comp_evento_id."
		";	
		
		if($agenda_comp_prov_id!=""){
			$sql.=" 
				and agenda_comp_prov_id=".$agenda_comp_prov_id."
			";
		}
		
		$sql.=' order by agenda_comp_fecha asc, agenda_comp_hora asc';
		
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					$Data= array(
						"comprador" => $row["comprador"],
						"fecha" => rtrim(ltrim($row["fecha"])),
						"hora" => rtrim(ltrim($row["hora"]))
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
	
	
	public function guardar($agenda_comp_id, $agenda_comp_evento_id, $agenda_comp_compr_id, $agenda_comp_prov_id, $agenda_comp_fecha, $agenda_comp_hora, $agenda_comp_reg){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		$Error=false;
		$Idmaximo="";
		
		$proveedor_M = new Proveedor('mysql', 'eventos');
		$proveedor_M->connect();
		//Obtengo el Id Maximo
		$valormaximo=" select CASE when max(agenda_comp_id+1) IS NULL then 1 else (max(agenda_comp_id + 1)) end as IndiceMaximo from eventos_agenda_compradores ";
		$proveedor_M->execute($valormaximo);
		
		if (!$proveedor_M->error()){
			if ($proveedor_M->rows($proveedor_M->stmt) > 0) {
				$row_max = $proveedor_M->fetch_array($proveedor_M->stmt, 0);
				$Idmaximo=$row_max["IndiceMaximo"];
				
				$proveedor = new Proveedor('mysql', 'eventos');
				$proveedor->connect();	
				$strSQL="insert into eventos_agenda_compradores ";
				$strSQL.="( 
						   agenda_comp_evento_id,  
						   agenda_comp_compr_id, 
						   agenda_comp_prov_id, 
						   agenda_comp_fecha, 
						   agenda_comp_hora, 
						   agenda_comp_reg, 
						   agenda_comp_time_stamp
				) "; 
				$strSQL.="VALUES ";
				$strSQL.="(
							".$agenda_comp_evento_id.",  
							".$agenda_comp_compr_id.",  
							".$agenda_comp_prov_id.",  
							'".$agenda_comp_fecha."',  
							'".$agenda_comp_hora."', 
							'".$agenda_comp_reg."', 
							now()
				)"; 
				
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
			$respuesta = array("totalCount" => "1", "estatus" => "ok", "mensaje" => "Se ha registrado correctamente");
		}else{
			$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al registrar");
		}
	
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}

	public function eliminar_agenda($agenda_comp_evento_id, $agenda_comp_compr_id, $agenda_comp_prov_id){
		
		$respuesta = array();
		$Error=false;
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();	
		$strSQL="delete from eventos_agenda_compradores	 ";
		$strSQL.="where ";
		$strSQL.="agenda_comp_evento_id=".$agenda_comp_evento_id." and agenda_comp_compr_id=".$agenda_comp_compr_id." and agenda_comp_prov_id=".$agenda_comp_prov_id; 
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

@$agenda_comp_id=$_POST["agenda_comp_id"];
@$agenda_comp_evento_id=$_POST["agenda_comp_evento_id"];
@$agenda_comp_compr_id=$_POST["agenda_comp_compr_id"];
@$agenda_comp_prov_id=$_POST["agenda_comp_prov_id"];
@$agenda_comp_fecha=$_POST["agenda_comp_fecha"];
@$agenda_comp_hora=$_POST["agenda_comp_hora"];
@$agenda_comp_reg=$_POST["agenda_comp_reg"];

@$accion=$_POST["accion"];
$Consultas = new consultas();
if($accion=="consultar_agenda"){
	$perfiles=$Consultas->consultar_agenda($agenda_comp_evento_id, $agenda_comp_compr_id);
	echo $perfiles; 
}if($accion=="consultar_agenda_prov"){
	$perfiles=$Consultas->consultar_agenda_prov($agenda_comp_evento_id, $agenda_comp_prov_id);
	echo $perfiles; 
}else if($accion=="guardar"){	
	$usuarios=$Consultas->guardar($agenda_comp_id, $agenda_comp_evento_id, $agenda_comp_compr_id, $agenda_comp_prov_id, $agenda_comp_fecha, $agenda_comp_hora, $agenda_comp_reg);
	echo $usuarios;
}else if($accion=="eliminar_agenda"){	
	$usuarios=$Consultas->eliminar_agenda($agenda_comp_evento_id, $agenda_comp_compr_id, $agenda_comp_prov_id);
	echo $usuarios;
}




?>