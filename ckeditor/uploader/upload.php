<?php
// Upload script for CKEditor.
// Use at your own risk, no warranty provided. Be careful about who is able to access this file
// The upload folder shouldn't be able to upload any kind of script, just in case.
// If you're not sure, hire a professional that takes care of adjusting the server configuration as well as this script for you.
// (I am not such professional)

// Step 1: change the true for whatever condition you use in your environment to verify that the user
// is logged in and is allowed to use the script
if ( true ) {
	echo("You're not allowed to upload files");
	die(0);
}

// Step 2: Put here the full absolute path of the folder where you want to save the files:
// You must set the proper permissions on that folder (I think that it's 644, but don't trust me on this one)
// ALWAYS put the final slash (/)
$basePath = "httpdocs/ole/eventos/ckeditor/files";

// Step 3: Put here the Url that should be used for the upload folder (it the URL to access the folder that you have set in $basePath
// you can use a relative url "/images/", or a path including the host "http://example.com/images/"
// ALWAYS put the final slash (/)
$baseUrl = "/files/";

// Done. Now test it!



// No need to modify anything below this line
//----------------------------------------------------

// ------------------------
// Input parameters: optional means that you can ignore it, and required means that you
// must use it to provide the data back to CKEditor.
// ------------------------

// Optional: instance name (might be used to adjust the server folders for example)
$CKEditor = $_GET['CKEditor'] ;

// Required: Function number as indicated by CKEditor.
$funcNum = $_GET['CKEditorFuncNum'] ;

// Optional: To provide localized messages
$langCode = $_GET['langCode'] ;

// ------------------------
// Data processing
// ------------------------

// The returned url of the uploaded file
$url = '' ;

// Optional message to show to the user (file renamed, invalid file, not authenticated...)
$message = '';

/*
if (isset($_FILES['upload'])) {
    $name = $_FILES['upload']['name'];
	move_uploaded_file($_FILES["upload"]["tmp_name"], $basePath . $name);
    $url = $baseUrl . $name ;
}
else
{
    $message = 'No file has been sent';
}
*/


$nombreArchivo="";
if(is_uploaded_file($_FILES["upload"]["tmp_name"]))
{
	$nombreArchivo=$_FILES["upload"]["name"];
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
		$ruta="httpdocs\ole\eventos\ckeditor\files";
	
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
					if(@ftp_put($conn_id,$nombreArchivo,$_FILES["upload"]["tmp_name"],FTP_BINARY)){
						$url= "/ckeditor/files/".$nombreArchivo;
					}else{
						$message =  "No ha sido posible subir el fichero";
					}
				}else{
					$message =  "No existe el directorio especificado";
				}
			}else{
				$message =  "El usuario o la contraseña son incorrectos";
			}
			# Cerramos la conexion ftp
			ftp_close($conn_id);
		}else{
			$message =  "No ha sido posible conectar con el servidor";
		}
		*/
		
		if(move_uploaded_file($_FILES['upload']['tmp_name'], "../files/".$nombreArchivo)){
			// File path
			if(isset($_SERVER['HTTPS'])){
				$protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
			}
			else{
				$protocol = 'http';
			}
			$url= "/ckeditor/files/".$nombreArchivo;
		}else{
			$message =  "No ha sido posible subir el fichero";
		}
		
	}else{		
	  $message =  "Este tipo de archivo no esta permitido";
	}
}else
{
    $message = 'No file has been sent';
}




// ------------------------
// Write output
// ------------------------
// We are in an iframe, so we must talk to the object in window.parent
echo "<script type='text/javascript'> window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message')</script>";

?>