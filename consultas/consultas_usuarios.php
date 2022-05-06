<?php
include_once("../datos/dtotojson/DtoToJson.Class.php");
include_once("../datos/json/JsonEncod.Class.php");
include_once("../datos/json/JsonDecod.Class.php");
include_once("../datos/connect/Proveedor.Class.php");
class consultas {
	public function __construct() {
	}
	
	public function consulta_usuarios($usr_id){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$sql=" 
			select *,(select perfil_nombre from eventos_perfiles where eventos_usuarios.usr_id_perfil=eventos_perfiles.perfil_id) as perfil_nombre from eventos_usuarios where usr_status<>'E'
		";
		
		if($usr_id!=""){
			$sql.=" 
				and usr_id=".$usr_id."
			";				
		}
		
		
		
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					
					$Data= array(
						"usr_id" => $row["usr_id"],
						"usr_nombre_completo" => rtrim(ltrim($row["usr_nombre_completo"])),
						"usr_usuario" => rtrim(ltrim($row["usr_usuario"])),
						"usr_contrasena" => rtrim(ltrim($row["usr_contrasena"])),
						"usr_puesto" => rtrim(ltrim($row["usr_puesto"])),
						"usr_id_perfil" => rtrim(ltrim($row["usr_id_perfil"])),
						"usr_email" => rtrim(ltrim($row["usr_email"])),
						"usr_telefono" => rtrim(ltrim($row["usr_telefono"])),
						"usr_time_stamp" => rtrim(ltrim($row["usr_time_stamp"])),
						"usr_status" => rtrim(ltrim($row["usr_status"])),
						"perfil_nombre" => rtrim(ltrim($row["perfil_nombre"])),
						"usr_url_foto" => rtrim(ltrim($row["usr_url_foto"]))
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
	
	public function guardar_usuarios($usr_id, $usr_nombre_completo, $usr_usuario, $usr_contrasena, $usr_puesto, $usr_id_perfil, $usr_email, $usr_telefono, $usr_modifico, $usr_time_stamp, $usr_status, $usr_url_foto ){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		$Error=false;
		$Idmaximo="";
		
		
		
		$repetidos = new Proveedor('mysql', 'eventos');
		$repetidos->connect();
		//Obtengo el Id Maximo
		$sql_repetidos=" select * from eventos_usuarios where rtrim(ltrim(usr_usuario))='".$usr_usuario."' and usr_status<>'E' ";
		$repetidos->execute($sql_repetidos);
		
		if (!$repetidos->error()){
			if ($repetidos->rows($repetidos->stmt) == 0) {
				$proveedor_M = new Proveedor('mysql', 'eventos');
				$proveedor_M->connect();
				//Obtengo el Id Maximo
				$valormaximo=" select CASE when max(usr_id+1) IS NULL then 1 else (max(usr_id + 1)) end as IndiceMaximo from eventos_usuarios ";
				$proveedor_M->execute($valormaximo);
				
				if (!$proveedor_M->error()){
					if ($proveedor_M->rows($proveedor_M->stmt) > 0) {
						$row_max = $proveedor_M->fetch_array($proveedor_M->stmt, 0);
						$Idmaximo=$row_max["IndiceMaximo"];
						
						$proveedor = new Proveedor('mysql', 'eventos');
						$proveedor->connect();	
						$strSQL="insert into eventos_usuarios ";
						$strSQL.="(usr_id, usr_nombre_completo,  usr_usuario, usr_contrasena, usr_puesto, usr_id_perfil, usr_email, usr_telefono, usr_modifico, usr_time_stamp, usr_status, usr_url_foto) "; 
						$strSQL.="VALUES ";
						$strSQL.="(".$Idmaximo.", '".$usr_nombre_completo."',  '".$usr_usuario."', '".$usr_contrasena."', '".$usr_puesto."', ".$usr_id_perfil.", '".$usr_email."', '".$usr_telefono."', '".$usr_modifico."',now(), '".$usr_status."', '".$usr_url_foto."')"; 
						
						
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
					$respuesta = array("totalCount" => "1","usr_id" =>$Idmaximo, "estatus" => "ok", "mensaje" => "Se ha registrado correctamente");
				}else{
					$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al registrar");
				}
				
			}else{
				$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "El usuario ya se encuentra registrado.");
			}
		}else{
			$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al buscar repetidos.");
		}
		
		
		
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}

	public function editar_usuarios($usr_id, $usr_nombre_completo, $usr_usuario, $usr_contrasena, $usr_puesto, $usr_id_perfil, $usr_email, $usr_telefono, $usr_modifico, $usr_time_stamp, $usr_status, $usr_url_foto){
		
		$respuesta = array();
		$Error=false;
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();	
		$strSQL="update eventos_usuarios ";
		$strSQL.="set usr_nombre_completo='".$usr_nombre_completo."', 
									usr_usuario='".$usr_usuario."', 
									usr_contrasena='".$usr_contrasena."', 
									usr_puesto='".$usr_puesto."', 
									usr_id_perfil=".$usr_id_perfil.", 
									usr_email='".$usr_email."', 
									usr_telefono='".$usr_telefono."', 
									usr_modifico='".$usr_modifico."', 
									usr_time_stamp=now(), 
									usr_status='".$usr_status."', 
									usr_url_foto='".$usr_url_foto."' 
							"; 
		$strSQL.="where ";
		$strSQL.="usr_id=".$usr_id; 
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

	public function eliminar_usuarios($usr_id, $usr_status, $usr_modifico){
		
		$respuesta = array();
		$Error=false;
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();	
		$strSQL="update eventos_usuarios ";
		$strSQL.="set usr_status='".$usr_status."', usr_modifico='".$usr_modifico."', usr_time_stamp=now() "; 
		$strSQL.="where ";
		$strSQL.="usr_id=".$usr_id; 
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


@$usr_id=$_POST["usr_id"];
@$usr_nombre_completo=$_POST["usr_nombre_completo"];
@$usr_usuario=$_POST["usr_usuario"];
@$usr_contrasena=$_POST["usr_contrasena"];
@$usr_puesto=$_POST["usr_puesto"];
@$usr_id_perfil=$_POST["usr_id_perfil"];
@$usr_email=$_POST["usr_email"];
@$usr_telefono=$_POST["usr_telefono"];
@$usr_modifico=$_POST["usr_modifico"];
@$usr_time_stamp=$_POST["usr_time_stamp"];
@$usr_status=$_POST["usr_status"];
@$usr_url_foto=$_POST["usr_url_foto"];


@$accion=$_POST["accion"];
$Consultas = new consultas();
if($accion=="consulta_usuarios"){
	$usuarios=$Consultas->consulta_usuarios($usr_id);
	echo $usuarios; 
}else if($accion=="guardar_usuarios"){	
	$usuarios=$Consultas->guardar_usuarios($usr_id, $usr_nombre_completo, $usr_usuario, $usr_contrasena, $usr_puesto, $usr_id_perfil, $usr_email, $usr_telefono, $usr_modifico, $usr_time_stamp, $usr_status, $usr_url_foto );
	echo $usuarios;
}else if($accion=="editar_usuarios"){	
	$usuarios=$Consultas->editar_usuarios($usr_id, $usr_nombre_completo, $usr_usuario, $usr_contrasena, $usr_puesto, $usr_id_perfil, $usr_email, $usr_telefono, $usr_modifico, $usr_time_stamp, $usr_status, $usr_url_foto);
	echo $usuarios;
}else if($accion=="eliminar_usuarios"){	
	$usuarios=$Consultas->eliminar_usuarios($usr_id, $usr_status, $usr_modifico);
	echo $usuarios;
}




?>