<?php
include_once("../datos/dtotojson/DtoToJson.Class.php");
include_once("../datos/json/JsonEncod.Class.php");
include_once("../datos/json/JsonDecod.Class.php");
include_once("../datos/connect/Proveedor.Class.php");
include_once("CURL.php");
class consultas {
	public function __construct() {
	}
	
	
	

	public function login($usr_usuario, $usr_contrasena){
		$json = '{"estatus":"fail"}';
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$sql=" 
			SELECT *, (select perfil_nombre from eventos_perfiles where eventos_usuarios.usr_id_perfil=eventos_perfiles.perfil_id) as perfil_nombre FROM eventos_usuarios  where usr_usuario='".$usr_usuario."' and usr_contrasena='".$usr_contrasena."'
		";
		
		//echo $sql;
		
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
					$row = $proveedor->fetch_array($proveedor->stmt, 0);
				
					session_start();	
					$_SESSION['usr_id']=$row["usr_id"];
					$_SESSION['usr_usuario']=$row["usr_usuario"];
					$_SESSION['usr_nombre_completo']=$row["usr_nombre_completo"];
					$_SESSION['usr_puesto']=$row["usr_puesto"];
					$_SESSION['usr_id_perfil']=$row["usr_id_perfil"];
					$_SESSION['perfil_nombre']=$row["perfil_nombre"];
					$_SESSION['usr_url_foto']=$row["usr_url_foto"];
					
					
					$json = '{"estatus":"ok","location":"Inicio.php"}';
					
					
			}
		}else{
			$Error=true;
		}
		$proveedor->close();
		
		echo $json;
		//$respuesta = array("totalCount" => count($Data_Envia),"data" => $Data_Envia,"estatus" => "ok", "mensaje" => "Registros Encontrados");
		//$jsonDto = new Encode_JSON();
		//return $jsonDto->encode($respuesta);
	}
	
	public function envio_mail($usr_email){
		$json = '{"estatus":"fail"}';
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$sql=" 
			SELECT * FROM eventos_usuarios where usr_email='".$usr_email."' and usr_status<>'E'
		";
		
		
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
					$row = $proveedor->fetch_array($proveedor->stmt, 0);
					
					$Subject="Recuperar contraseña ID: ".$row["usr_id"];
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
					
					$body='<div width="100%" align="center"><font face="arial" size="3"><b><img src="https://bsolutionsmx.com/ole/eventos/logo_login.png" style="text-decoration:none" width="100px"><!-- </img> --></b></font></div><br><br>';
					$body.='<font face="arial" size="2.5">Hola '.$row["usr_nombre_completo"].', tu contraseña es: <strong>'.$row["usr_contrasena"].'</strong></font><br><br>';
					$body.='<br><br><br><font face="arial" size="1"><i>* Estee es un envío automatizado, no es necesario responder este correo.</i></font>';
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
					
					
					$obj = new CURL();
					$url = "https://bsolutionsmx.com/ole/eventos/envio_correo_externo/send_external_email.asp";                                       
					$data = array('strPassword' => '52O37L62E', 'strSubject' => $Subject,'strTo'=>rtrim(ltrim($row["usr_email"])).";",'strHTMLBody'=>$body,'strCc'=>'','strBCC'=>'');
					$correoASP = $obj->curlData($url,$data);	
					
					
					$json = '{"estatus":"ok"}';
					
					
			}
		}else{
			$Error=true;
		}
		$proveedor->close();
		
		echo $json;
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

@$accion=$_POST["accion"];
$Consultas = new consultas();
if($accion=="login"){
	$empleados=$Consultas->login($usr_usuario, $usr_contrasena);
	echo $empleados; 
}else if($accion=="envio_mail"){
	$empleados=$Consultas->envio_mail($usr_email);
	echo $empleados; 
}




?>