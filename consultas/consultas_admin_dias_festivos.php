<?php
include_once("../datos/dtotojson/DtoToJson.Class.php");
include_once("../datos/json/JsonEncod.Class.php");
include_once("../datos/json/JsonDecod.Class.php");
include_once("../datos/connect/Proveedor.Class.php");
class consultas {
	public function __construct() {
	}
	
	public function consultar($dia_fest_id, $anio){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$sql=" 
			select *, DATE_FORMAT(dia_fest_fecha, '%d/%m/%Y') as fecha from eventos_dias_festivos where dia_fest_estatus<>'E'
		";
		
		if($dia_fest_id!=""){
			$sql.=" 
				and dia_fest_id=".$dia_fest_id."
			";				
		}
		
		if($anio!=""){
			$sql.=" 
				and DATE_FORMAT(dia_fest_fecha, '%Y')='".$anio."'
			";				
		}
		
		$sql.="order by dia_fest_fecha asc";
		
		
		//echo $sql;
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					$Data= array(
						"dia_fest_id" => $row["dia_fest_id"],
						"dia_fest_desc" => $row["dia_fest_desc"],
						"dia_fest_fecha" => $row["fecha"],
						"dia_fest_time_stamp" => $row["dia_fest_time_stamp"],
						"dia_fest_modifico" => $row["dia_fest_modifico"],
						"dia_fest_estatus" => $row["dia_fest_estatus"]
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
	
	public function cmb_anios(){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$sql=" 
			select distinct DATE_FORMAT(dia_fest_fecha, '%Y') as dia_fest_fecha  from eventos_dias_festivos order by 1 desc
		";
		

		
		
		//echo $sql;
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					$Data= array(
						"dia_fest_fecha" => $row["dia_fest_fecha"]
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
	
	
	public function guardar($dia_fest_id, $dia_fest_desc, $dia_fest_fecha, $dia_fest_modifico, $dia_fest_estatus){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		$Error=false;
		$Idmaximo="";
		
		$proveedor_M = new Proveedor('mysql', 'eventos');
		$proveedor_M->connect();
		//Obtengo el Id Maximo
		$valormaximo=" select CASE when max(dia_fest_id+1) IS NULL then 1 else (max(dia_fest_id + 1)) end as IndiceMaximo from eventos_dias_festivos ";
		$proveedor_M->execute($valormaximo);
		
		if (!$proveedor_M->error()){
			if ($proveedor_M->rows($proveedor_M->stmt) > 0) {
				$row_max = $proveedor_M->fetch_array($proveedor_M->stmt, 0);
				$Idmaximo=$row_max["IndiceMaximo"];
				
				$proveedor = new Proveedor('mysql', 'eventos');
				$proveedor->connect();	
				$strSQL="insert into eventos_dias_festivos ";
				$strSQL.="(
					dia_fest_desc
					,dia_fest_fecha
					,dia_fest_time_stamp
					,dia_fest_modifico
					,dia_fest_estatus
					
				) "; 
				$strSQL.="VALUES ";
				$strSQL.="(
					'".$dia_fest_desc."'
					, '".$dia_fest_fecha."'
					,now()
					, '".$dia_fest_modifico."'
					, '".$dia_fest_estatus."'
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
			$respuesta = array("totalCount" => "1","dia_fest_id" =>$Idmaximo, "estatus" => "ok", "mensaje" => "Se ha registrado correctamente");
		}else{
			$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al registrar");
		}
		
		
		
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}

	public function editar($dia_fest_id, $dia_fest_desc, $dia_fest_fecha, $dia_fest_modifico, $dia_fest_estatus){
		
		$respuesta = array();
		$Error=false;
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();	
		$strSQL="update eventos_dias_festivos ";
		$strSQL.="set 
					dia_fest_desc='".$dia_fest_desc."'
					, dia_fest_fecha='".$dia_fest_fecha."'
					, dia_fest_modifico='".$dia_fest_modifico."'
					, dia_fest_estatus='".$dia_fest_estatus."'
					, dia_fest_time_stamp=now() "; 
		$strSQL.="where ";
		$strSQL.="dia_fest_id=".$dia_fest_id; 
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
			$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al actualizar informaci?n");
		}
		
		
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}	

	public function eliminar($dia_fest_id, $dia_fest_estatus, $dia_fest_modifico){
		
		$respuesta = array();
		$Error=false;
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();	
		$strSQL="update eventos_dias_festivos ";
		$strSQL.="set dia_fest_estatus='".$dia_fest_estatus."', dia_fest_modifico='".$dia_fest_modifico."', dia_fest_time_stamp=now() "; 
		$strSQL.="where ";
		$strSQL.="dia_fest_id=".$dia_fest_id; 
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


@$dia_fest_id=$_POST["dia_fest_id"];
@$dia_fest_desc=$_POST["dia_fest_desc"];
@$dia_fest_fecha=$_POST["dia_fest_fecha"];
@$dia_fest_modifico=$_POST["dia_fest_modifico"];
@$dia_fest_estatus=$_POST["dia_fest_estatus"];
@$anio=$_POST["anio"];

	
if($dia_fest_fecha!=""){
	$dia_fest_fecha=$dia_fest_fecha[6].$dia_fest_fecha[7].$dia_fest_fecha[8].$dia_fest_fecha[9]."-".$dia_fest_fecha[3].$dia_fest_fecha[4]."-".$dia_fest_fecha[0].$dia_fest_fecha[1];
}

@$accion=$_POST["accion"];
$Consultas = new consultas();
if($accion=="consultar"){
	$eventos=$Consultas->consultar($dia_fest_id, $anio);
	echo $eventos; 
}else if($accion=="guardar"){	
	$eventos=$Consultas->guardar($dia_fest_id, $dia_fest_desc, $dia_fest_fecha, $dia_fest_modifico, $dia_fest_estatus);
	echo $eventos;
}else if($accion=="editar"){	
	$eventos=$Consultas->editar($dia_fest_id, $dia_fest_desc, $dia_fest_fecha, $dia_fest_modifico, $dia_fest_estatus);
	echo $eventos;
}else if($accion=="eliminar"){	
	$eventos=$Consultas->eliminar($dia_fest_id, $dia_fest_estatus, $dia_fest_modifico);
	echo $eventos;
}else if($accion=="cmb_anios"){	
	$eventos=$Consultas->cmb_anios();
	echo $eventos;
}




?>