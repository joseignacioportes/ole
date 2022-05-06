<?php
include_once("../datos/dtotojson/DtoToJson.Class.php");
include_once("../datos/json/JsonEncod.Class.php");
include_once("../datos/json/JsonDecod.Class.php");
include_once("../datos/connect/Proveedor.Class.php");
class consultas {
	public function __construct() {
	}
	
	public function consultar($prov_serv_id){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$sql=" 
			select * from eventos_proveedores_servicios where prov_serv_status<>'E'
		";
		
		if($prov_serv_id!=""){
			$sql.=" 
				and prov_serv_id=".$prov_serv_id."
			";
		}
		
		
		
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					$Data= array(
						"prov_serv_id" => $row["prov_serv_id"],
						"prov_serv_desc" => rtrim(ltrim($row["prov_serv_desc"]))
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
	
	public function guardar($prov_serv_desc, $prov_serv_status){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		$Error=false;
		$Idmaximo="";
		$prov_serv_desc = str_replace(",", "/", $prov_serv_desc);
		
		
		$repetidos = new Proveedor('mysql', 'eventos');
		$repetidos->connect();
		//Obtengo el Id Maximo
		$sql_repetidos=" select * from eventos_proveedores_servicios where rtrim(ltrim(prov_serv_desc))='".$prov_serv_desc."' and prov_serv_status<>'E' ";
		$repetidos->execute($sql_repetidos);
		
		if (!$repetidos->error()){
			if ($repetidos->rows($repetidos->stmt) == 0) {
				$proveedor_M = new Proveedor('mysql', 'eventos');
				$proveedor_M->connect();
				//Obtengo el Id Maximo
				$valormaximo=" select CASE when max(prov_serv_id+1) IS NULL then 1 else (max(prov_serv_id + 1)) end as IndiceMaximo from eventos_proveedores_servicios ";
				$proveedor_M->execute($valormaximo);
				
				if (!$proveedor_M->error()){
					if ($proveedor_M->rows($proveedor_M->stmt) > 0) {
						$row_max = $proveedor_M->fetch_array($proveedor_M->stmt, 0);
						$Idmaximo=$row_max["IndiceMaximo"];
						
						$proveedor = new Proveedor('mysql', 'eventos');
						$proveedor->connect();	
						$strSQL="insert into eventos_proveedores_servicios ";
						$strSQL.="(prov_serv_id, prov_serv_desc,  prov_serv_status, prov_serv_timestamp) "; 
						$strSQL.="VALUES ";
						$strSQL.="(".$Idmaximo.", '".$prov_serv_desc."',  '".$prov_serv_status."', now())"; 
						
						
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
					$respuesta = array("totalCount" => "1","id" =>$Idmaximo, "estatus" => "ok", "mensaje" => "Se ha registrado correctamente");
				}else{
					$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al registrar");
				}
				
			}else{
				$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "La descripción ya se encuentra registrada.");
			}
		}else{
			$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al buscar repetidos.");
		}
		
		
		
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}

	public function editar($prov_serv_id, $prov_serv_desc, $prov_serv_status){
		
		$respuesta = array();
		$Error=false;
		$prov_serv_desc = str_replace(",", "/", $prov_serv_desc);
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();	
		$strSQL="update eventos_proveedores_servicios ";
		$strSQL.="set prov_serv_desc='".$prov_serv_desc."', prov_serv_status='".$prov_serv_status."', prov_serv_timestamp=now() "; 
		$strSQL.="where ";
		$strSQL.="prov_serv_id=".$prov_serv_id; 
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

	public function eliminar($prov_serv_id, $prov_serv_status){
		
		$respuesta = array();
		$Error=false;
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();	
		$strSQL="update eventos_proveedores_servicios ";
		$strSQL.="set prov_serv_status='".$prov_serv_status."',  prov_serv_timestamp=now() "; 
		$strSQL.="where ";
		$strSQL.="prov_serv_id=".$prov_serv_id; 
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

@$prov_serv_id=$_POST["prov_serv_id"];
@$prov_serv_desc=$_POST["prov_serv_desc"];
@$prov_serv_status=$_POST["prov_serv_status"];
@$prov_serv_timestamp=$_POST["prov_serv_timestamp"];

@$accion=$_POST["accion"];
$Consultas = new consultas();
if($accion=="consultar"){
	$acc=$Consultas->consultar($prov_serv_id);
	echo $acc; 
}else if($accion=="guardar"){	
	$acc=$Consultas->guardar($prov_serv_desc, $prov_serv_status);
	echo $acc;
}else if($accion=="editar"){	
	$acc=$Consultas->editar($prov_serv_id, $prov_serv_desc, $prov_serv_status);
	echo $acc;
}else if($accion=="eliminar"){	
	$acc=$Consultas->eliminar($prov_serv_id, $prov_serv_status);
	echo $acc;
}
?>