<?php
date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');
$fecha_actual=strftime("%Y-%m-%d");
/*
if (($_FILES["file"]["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/png")
    || ($_FILES["file"]["type"] == "image/gif")) {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], "archivos/Imagenes/".$_FILES['file']['name'])) {
      //more code here...
        echo "archivos/Imagenes/".$_FILES['file']['name'];
    } else {
        echo 0;
    }
} else {
    echo 0;
}
*/



$boolean_estatus=0;
$nombreArchivo="";
if(is_uploaded_file($_FILES["file"]["tmp_name"]))
{
	$nombreArchivo=$_FILES["file"]["name"];
	$p = pathinfo($nombreArchivo);
	
	$ArchivoNombre=date("Y-m-d H-i-s").$p['filename'];
    $newFileName  = $ArchivoNombre.".".$p['extension'];
    $nombreArchivo=$newFileName;//asignar el nuevo nombre
	$nombreArchivo=str_replace("á", "a", $nombreArchivo);
	$nombreArchivo=str_replace("Á", "A", $nombreArchivo);
	$nombreArchivo=str_replace("é", "e", $nombreArchivo);
	$nombreArchivo=str_replace("É", "E", $nombreArchivo);
	$nombreArchivo=str_replace("í", "i", $nombreArchivo);
	$nombreArchivo=str_replace("Í", "I", $nombreArchivo);
	$nombreArchivo=str_replace("ó", "o", $nombreArchivo);
	$nombreArchivo=str_replace("Ó", "O", $nombreArchivo);
	$nombreArchivo=str_replace("ú", "u", $nombreArchivo);
	$nombreArchivo=str_replace("Ú", "U", $nombreArchivo);
	$nombreArchivo=str_replace("ñ", "n", $nombreArchivo);
	$nombreArchivo=str_replace("Ñ", "N", $nombreArchivo);
	
	
	if(strtoupper($p['extension'])=="PJPEG"||strtoupper($p['extension'])=="GIF"||strtoupper($p['extension'])=="JPG"||strtoupper($p['extension'])=="PNG"){
		/*
		# Definimos las variables
		$host="bsolutionsmx.com";
		$port=21;
		$user="bsolutio";
		$password="7?Vg<7@:}9d7<q";
		$ruta="httpdocs\ole\eventos\archivos\Imagenes";
	
		# Realizamos la conexion con el servidor
		$conn_id=@ftp_connect($host,$port);
		if($conn_id)
		{
			# Realizamos el login con nuestro usuario y contrase?a
			if(@ftp_login($conn_id,$user,$password))
			{
				# Canviamos al directorio especificado
				if(@ftp_chdir($conn_id,$ruta)){
					# Subimos el fichero
					if(@ftp_put($conn_id,$nombreArchivo,$_FILES["file"]["tmp_name"],FTP_BINARY)){
						echo "archivos/Imagenes/".$nombreArchivo;
					}else{
						echo 0;
						//echo "No ha sido posible subir el fichero";
					}
				}else{
					echo 0;
					//echo "No existe el directorio especificado";
				}
			}else{
				echo 0;
				//echo "El usuario o la contraseña son incorrectos";
			}
			# Cerramos la conexion ftp
			ftp_close($conn_id);
		}else{
			echo 0;
			//echo "No ha sido posible conectar con el servidor";
		}
		*/
		
		
		if(move_uploaded_file($_FILES['file']['tmp_name'], "archivos/imagenes/".$nombreArchivo)){
			// File path
			if(isset($_SERVER['HTTPS'])){
				$protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
			}
			else{
				$protocol = 'http';
			}
			echo "archivos/Imagenes/".$nombreArchivo;
		}else{
			echo 0;
			//echo "No ha sido posible subir el fichero";
		}
	}else{
	  echo 0;		
	  //echo "Este tipo de archivo no esta permitido";
	}	
}else{
	echo 0;
	//echo "Selecciona un archivo";
}



?>