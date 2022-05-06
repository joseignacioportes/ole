<?php
include_once(dirname(__FILE__)."/../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../datos/json/JsonDecod.Class.php");
class borrar_archivo {
	public function __construct() {
	}

	public function delete_file($url){
		$jsonDto="";
		if (file_exists($url) ) {
			//    Added by muhammad.begawala
			//    '@' will stop displaying "Resource Unavailable" error because of file is open some where.
			//    'unlink($url) !== true' will check if file is deleted successfully.
			//  Throwing exception so that we can handle error easily instead of displaying to users.
			if( @unlink($url) !== true ){
				$jsonDto=array("totalCount"=>"0","text"=>"Ocurrio un error al eliminar el registro");
			}else{
				$jsonDto=array("totalCount"=>"1","text"=>"El archivo ha sido eliminado.");
			}
		}else{
			$jsonDto=array("totalCount"=>"0","text"=>"El archivo no existe");
		}
		
		return json_encode($jsonDto);
	}
}

@$url=$_POST["url"];
@$accion=$_POST["accion"];

$borrar_archivo = new borrar_archivo();

if( ($accion=="borrar_archivo") ){
	$Borrar_arch="";
	$Borrar_arch=$borrar_archivo->delete_file($url);
	echo $Borrar_arch;
}	
?>