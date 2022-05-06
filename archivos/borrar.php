<?php 


$carpetaAdjunta="imagenes/";
if (isset($_REQUEST['carpeta']))
{
    $carpetaAdjunta="".$_REQUEST['carpeta']."/";
}

//if($_SERVER['REQUEST_METHOD']=="DELETE"){
    parse_str(file_get_contents("php://input"),$datosDELETE);
    $key= $datosDELETE['key'];
		if (file_exists($carpetaAdjunta.$key)) {
			unlink($carpetaAdjunta.$key);
		} else {
			//echo "El fichero $nombre_fichero no existe";
		}
    
    echo json_encode(array("data"=>$key));
//}
?>