<?php
date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');
$fecha_actual=strftime("%Y-%m-%d");


$HOST= $_SERVER["HTTP_HOST"];
$URI=$_SERVER["REQUEST_URI"];

$URL="admin_proveedores.php";
$boolean_estatus=0;
$nombreArchivo="";
if(is_uploaded_file($_FILES["archivo"]["tmp_name"]))
{
	$nombreArchivo=$_FILES["archivo"]["name"];
	$p = pathinfo($nombreArchivo);
	
	if(strtoupper($p['extension'])=="XLSX"||strtoupper($p['extension'])=="PDF"||strtoupper($p['extension'])=="JPG"||strtoupper($p['extension'])=="PNG"){
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
			# Realizamos el login con nuestro usuario y contraseña
			if(@ftp_login($conn_id,$user,$password))
			{
				# Canviamos al directorio especificado
				if(@ftp_chdir($conn_id,$ruta))
				{
					# Subimos el fichero
					if(@ftp_put($conn_id,$_FILES["archivo"]["name"],$_FILES["archivo"]["tmp_name"],FTP_BINARY)){
						echo "<script> alert('Archivo cargado correctamente.'); </script>";
						$boolean_estatus=1;
					}else{
						$boolean_estatus=0;
						echo "<script> alert('No ha sido posible subir el fichero'); </script>";
					}
				}else{
					$boolean_estatus=0;
					echo "<script> alert('No existe el directorio especificado'); </script>";
				}
			}else{
				$boolean_estatus=0;
				echo "<script> alert('El usuario o la contraseña son incorrectos'); </script>";
			}
			# Cerramos la conexion ftp
			ftp_close($conn_id);
		}else{
			$boolean_estatus=0;
			echo "<script> alert('No ha sido posible conectar con el servidor'); </script>";
		}
		*/
		
		if(move_uploaded_file($_FILES['archivo']['tmp_name'], "Admin-Proveedores/".$_FILES["archivo"]["name"])){
			// File path
			if(isset($_SERVER['HTTPS'])){
				$protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
			}
			else{
				$protocol = 'http';
			}
			echo "<script> alert('Archivo cargado correctamente.'); </script>";
			$boolean_estatus=1;
		}else{
			$boolean_estatus=0;
			echo "<script> alert('No ha sido posible subir el fichero'); </script>";
		}
		
	}else{
	  $boolean_estatus=0;	
	  echo "<script> alert('Este tipo de archivo no esta permitido'); </script>";
	}	
}else{
   echo "<script> alert('Selecciona un archivo...'); </script>";	
}
//////////////////////FIN SE CARGA EL ARCHIVO
?>