<?php 
ini_set('upload_max_filesize', '10M');
ini_set('post_max_size', '10M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 300);

//obtener el nombre aleatorio para la imagen
function mt_rand_str ($l, $c = 'abcdefghijklmnopqrstuvwxyz1234567890') 
{
    for ($s = '', $cl = strlen($c)-1, $i = 0; $i < $l; $s .= $c[mt_rand(0, $cl)], ++$i);
    return $s;
}

$carpetaAdjunta="imagenes/";
if (isset($_REQUEST['carpeta']))
{
    $carpetaAdjunta="".$_REQUEST['carpeta']."/";
}

$maxFileCount="";
if (isset($_REQUEST['maxFileCount']))
{
    $maxFileCount="".$_REQUEST['maxFileCount'];
}

// Contar envían por el plugin
$Imagenes =count(isset($_FILES['imagenes']['name'])?$_FILES['imagenes']['name']:0);
$infoImagenesSubidas = array();
for($i = 0; $i < $Imagenes; $i++) {
	// El nombre y nombre temporal del archivo que vamos para adjuntar
	
    
    $nombreArchivo=isset($_FILES['imagenes']['name'][$i])?$_FILES['imagenes']['name'][$i]:null;
	$nombreTemporal=isset($_FILES['imagenes']['tmp_name'][$i])?$_FILES['imagenes']['tmp_name'][$i]:null;
	
    //asignar un nombre nuevo
    $p = pathinfo($nombreArchivo);
    $ArchivoNombre= date("Y-m-d")."_".mt_rand_str(10);
    $newFileName  = $ArchivoNombre.".".$p['extension'];
    $nombreArchivo=$newFileName;//asignar el nuevo nombre

	$rutaArchivo=$carpetaAdjunta.$nombreArchivo;
	
	move_uploaded_file($nombreTemporal,$rutaArchivo);
	
	if(strtoupper($p['extension'])=="PDF"||strtoupper($p['extension'])=="XLS"||strtoupper($p['extension'])=="XLSX"||strtoupper($p['extension'])=="DOC"||strtoupper($p['extension'])=="DOCX"||strtoupper($p['extension'])=="PPT"||strtoupper($p['extension'])=="PPTX"){
		$infoImagenesSubidas[$i]=array("type"=>"pdf","size"=>"8000","caption"=>"$nombreArchivo","url"=>"Archivos/borrar.php","key"=>$nombreArchivo);//elimina automaticamente de imagenes
		if (isset($_REQUEST['carpeta']))
		{
		$infoImagenesSubidas[$i]=array("type"=>"pdf","size"=>"8000","caption"=>"$nombreArchivo","url"=>"Archivos/borrar.php?carpeta=".$_REQUEST['carpeta']."","key"=>$nombreArchivo);// se le pasa el nombre de la carpeta de donde va eliminar
		}
	}

	if(strtoupper($p['extension'])=="JPG"||strtoupper($p['extension'])=="PNG"||strtoupper($p['extension'])=="GIF"||strtoupper($p['extension'])=="BMP"||strtoupper($p['extension'])=="XML"){
		$infoImagenesSubidas[$i]=array("caption"=>"$nombreArchivo","url"=>"Archivos/borrar.php","key"=>$nombreArchivo);//elimina automaticamente de imagenes
		if (isset($_REQUEST['carpeta']))
		{
		$infoImagenesSubidas[$i]=array("caption"=>"$nombreArchivo","url"=>"Archivos/borrar.php?carpeta=".$_REQUEST['carpeta']."","key"=>$nombreArchivo);// se le pasa el nombre de la carpeta de donde va eliminar
		}
	}	
	$ImagenesSubidas[$i]=$rutaArchivo;
}
$arr = array("maxFileCount"=>$maxFileCount,"validateInitialCount"=>true, "file_id"=>0,"initialPreviewConfig"=>$infoImagenesSubidas,
			 "initialPreview"=>$ImagenesSubidas);
echo json_encode($arr);
?>