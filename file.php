<?php
date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');
$fecha_actual=strftime("%Y-%m-%d");

$prov_id_info_gen=$_POST['prov_id_info_gen'];

$URL="admin_proveedores.php?key=".$prov_id_info_gen;
$boolean_estatus=0;
$nombreArchivo="";
if(is_uploaded_file($_FILES["archivo"]["tmp_name"]))
{
	$nombreArchivo=$_FILES["archivo"]["name"];
	$p = pathinfo($nombreArchivo);
	
	$ArchivoNombre= $prov_id_info_gen."-_-".date("Y-m-d").$p['filename'];
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
	$nombreArchivo=str_replace("Ñ", "N|", $nombreArchivo);
	
	
	if(strtoupper($p['extension'])=="DOCX"||strtoupper($p['extension'])=="DOC"||strtoupper($p['extension'])=="XLS"||strtoupper($p['extension'])=="XLSX"||strtoupper($p['extension'])=="PDF"||strtoupper($p['extension'])=="JPG"||strtoupper($p['extension'])=="PNG"){
		/*
		# Definimos las variables
		$host="bsolutionsmx.com";
		$port=21;
		$user="bsolutio";
		$password="7?Vg<7@:}9d7<q";
		$ruta="httpdocs\ole\eventos\archivos\Admin-Proveedores";
	
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
					if(@ftp_put($conn_id,$nombreArchivo,$_FILES["archivo"]["tmp_name"],FTP_BINARY)){
						header('Location:'.$URL."&Msj=Archivo cargado correctamente");
						$boolean_estatus=1;
					}else{
						$boolean_estatus=0;
						header('Location:'.$URL."&Msj=No ha sido posible subir el fichero");
					}
				}else{
					$boolean_estatus=0;
					header('Location:'.$URL."&Msj=No existe el directorio especificado");
				}
			}else{
				$boolean_estatus=0;
				header('Location:'.$URL."&Msj=El usuario o la contrase?a son incorrectos");
			}
			# Cerramos la conexion ftp
			ftp_close($conn_id);
		}else{
			$boolean_estatus=0;
			header('Location:'.$URL."&Msj=No ha sido posible conectar con el servidor");
		}
		*/
		if(move_uploaded_file($_FILES['archivo']['tmp_name'], "archivos/Admin-Proveedores/".$nombreArchivo)){
			// File path
			if(isset($_SERVER['HTTPS'])){
				$protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
			}
			else{
				$protocol = 'http';
			}
			header('Location:'.$URL."&Msj=Archivo cargado correctamente");
			$boolean_estatus=1;
		}else{
			$boolean_estatus=0;
			header('Location:'.$URL."&Msj=No ha sido posible subir el fichero");
		}
		
		
	}else{
	  $boolean_estatus=0;	
		header('Location:'.$URL."&Msj=Este tipo de archivo no esta permitido");
	}	
}else{
	header('Location:'.$URL."&Msj=Selecciona un archivo");
}
//////////////////////FIN SE CARGA EL ARCHIVO
?>