<?php
include_once("../datos/dtotojson/DtoToJson.Class.php");
include_once("../datos/json/JsonEncod.Class.php");
include_once("../datos/json/JsonDecod.Class.php");
include_once("../datos/connect/Proveedor.Class.php");
class consultas {
	public function __construct() {
	}
	
	public function consultar_perfiles($perfil_id){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$sql=" 
			select * from eventos_perfiles where perfil_status<>'E'
		";
		
		if($perfil_id!=""){
			$sql.=" 
				and perfil_id=".$perfil_id."
			";				
		}
		
		
		
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					
					
					
					$Data= array(
						"perfil_id" => $row["perfil_id"],
						"perfil_nombre" => rtrim(ltrim($row["perfil_nombre"]))
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
	
	public function guardar_perfil($perfil_id, $perfil_nombre, $perfil_modifico, $perfil_status){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		$Error=false;
		$Idmaximo="";
		
		
		
		$repetidos = new Proveedor('mysql', 'eventos');
		$repetidos->connect();
		//Obtengo el Id Maximo
		$sql_repetidos=" select * from eventos_perfiles where rtrim(ltrim(perfil_nombre))='".$perfil_nombre."' and perfil_status<>'E' ";
		$repetidos->execute($sql_repetidos);
		
		if (!$repetidos->error()){
			if ($repetidos->rows($repetidos->stmt) == 0) {
				$proveedor_M = new Proveedor('mysql', 'eventos');
				$proveedor_M->connect();
				//Obtengo el Id Maximo
				$valormaximo=" select CASE when max(perfil_id+1) IS NULL then 1 else (max(perfil_id + 1)) end as IndiceMaximo from eventos_perfiles ";
				$proveedor_M->execute($valormaximo);
				
				if (!$proveedor_M->error()){
					if ($proveedor_M->rows($proveedor_M->stmt) > 0) {
						$row_max = $proveedor_M->fetch_array($proveedor_M->stmt, 0);
						$Idmaximo=$row_max["IndiceMaximo"];
						
						$proveedor = new Proveedor('mysql', 'eventos');
						$proveedor->connect();	
						$strSQL="insert into eventos_perfiles ";
						$strSQL.="(perfil_id, perfil_nombre,  perfil_status, perfil_modifico, perfil_time_stamp) "; 
						$strSQL.="VALUES ";
						$strSQL.="(".$Idmaximo.", '".$perfil_nombre."',  '".$perfil_status."', '".$perfil_modifico."', now())"; 
						
						
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
					$respuesta = array("totalCount" => "1","perfil_id" =>$Idmaximo, "estatus" => "ok", "mensaje" => "Se ha registrado correctamente");
				}else{
					$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al registrar");
				}
				
			}else{
				$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "El perfil ya se encuentra registrado.");
			}
		}else{
			$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al buscar repetidos.");
		}
		
		
		
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}

	public function editar_perfil($perfil_id, $perfil_nombre, $perfil_modifico, $perfil_status){
		
		$respuesta = array();
		$Error=false;
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();	
		$strSQL="update eventos_perfiles ";
		$strSQL.="set perfil_nombre='".$perfil_nombre."', perfil_status='".$perfil_status."', perfil_modifico='".$perfil_modifico."', perfil_time_stamp=now() "; 
		$strSQL.="where ";
		$strSQL.="perfil_id=".$perfil_id; 
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

	public function eliminar_perfil($perfil_id, $perfil_status, $perfil_modifico){
		
		$respuesta = array();
		$Error=false;
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();	
		$strSQL="update eventos_perfiles ";
		$strSQL.="set perfil_status='".$perfil_status."', perfil_modifico='".$perfil_modifico."', perfil_time_stamp=now() "; 
		$strSQL.="where ";
		$strSQL.="perfil_id=".$perfil_id; 
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

@$perfil_id=$_POST["perfil_id"];
@$perfil_nombre=$_POST["perfil_nombre"];
@$perfil_time_stamp=$_POST["perfil_time_stamp"];
@$perfil_modifico=$_POST["perfil_modifico"];
@$perfil_status=$_POST["perfil_status"];

@$accion=$_POST["accion"];
$Consultas = new consultas();
if($accion=="consulta_perfiles"){
	$perfiles=$Consultas->consultar_perfiles($perfil_id);
	echo $perfiles; 
}else if($accion=="guardar_perfil"){	
	$usuarios=$Consultas->guardar_perfil($perfil_id, $perfil_nombre, $perfil_modifico, $perfil_status);
	echo $usuarios;
}else if($accion=="editar_perfil"){	
	$usuarios=$Consultas->editar_perfil($perfil_id, $perfil_nombre, $perfil_modifico, $perfil_status);
	echo $usuarios;
}else if($accion=="eliminar_perfil"){	
	$usuarios=$Consultas->eliminar_perfil($perfil_id, $perfil_status, $perfil_modifico);
	echo $usuarios;
}




?>