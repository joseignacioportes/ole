<?php
include_once("../datos/dtotojson/DtoToJson.Class.php");
include_once("../datos/json/JsonEncod.Class.php");
include_once("../datos/json/JsonDecod.Class.php");
include_once("../datos/connect/Proveedor.Class.php");
class consultas {
	public function __construct() {
	}
	
	public function consultar_proveedores($prov_id){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$sql=" 
			select * from eventos_proveedores where prov_estatus<>'E'
		";
		
		if($prov_id!=""){
			$sql.=" 
				and prov_id=".$prov_id."
			";				
		}
		
		
		
		//echo $sql;
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					$prov_servicios="";
					if($row["prov_servicios"]!=NULL){
						$prov_servicios=$row["prov_servicios"];
					}

					$logo=$row["prov_dat_emp_logo_empr"];
					$foto=$row["prov_dat_per_foto"];
					$Data= array(
						"prov_id" => $row["prov_id"],
						"prov_dat_per_ap_pat" => $row["prov_dat_per_ap_pat"],
						"prov_dat_per_ap_mat" => $row["prov_dat_per_ap_mat"],
						"prov_dat_per_nombres" => $row["prov_dat_per_nombres"],
						"prov_dat_per_cargo" => $row["prov_dat_per_cargo"],
						"prov_dat_per_email" => $row["prov_dat_per_email"],
						"prov_dat_per_telef_directo" => $row["prov_dat_per_telef_directo"],
						"prov_dat_per_telef_directo_ext" => $row["prov_dat_per_telef_directo_ext"],
						"prov_dat_per_celular" => $row["prov_dat_per_celular"],
						"prov_dat_per_cont_asist" => $row["prov_dat_per_cont_asist"],
						"prov_dat_per_mail_alter" => $row["prov_dat_per_mail_alter"],
						"prov_dat_per_foto" => $foto,
						"prov_dat_emp_nomcomercial" => $row["prov_dat_emp_nomcomercial"],
						"prov_dat_emp_ciudad" => $row["prov_dat_emp_ciudad"],
						"prov_dat_emp_estado" => $row["prov_dat_emp_estado"],
						"prov_dat_emp_calle" => $row["prov_dat_emp_calle"],
						"prov_dat_emp_num_int" => $row["prov_dat_emp_num_int"],
						"prov_dat_emp_num_ext" => $row["prov_dat_emp_num_ext"],
						"prov_dat_emp_colonia" => $row["prov_dat_emp_colonia"],
						"prov_dat_emp_cp" => $row["prov_dat_emp_cp"],
						"prov_dat_emp_pais" => $row["prov_dat_emp_pais"],
						"prov_dat_emp_telef" => $row["prov_dat_emp_telef"],
						"prov_dat_emp_pag_web" => $row["prov_dat_emp_pag_web"],
						"prov_dat_emp_desc_empre" => $row["prov_dat_emp_desc_empre"],
						"prov_dat_emp_giro" => $row["prov_dat_emp_giro"],
						"prov_dat_emp_rfc" => $row["prov_dat_emp_rfc"],
						"prov_dat_emp_raz_soc" => $row["prov_dat_emp_raz_soc"],
						"prov_dat_emp_cont_adm" => $row["prov_dat_emp_cont_adm"],
						"prov_dat_emp_telef_di" => $row["prov_dat_emp_telef_di"],
						"prov_dat_emp_mail" => $row["prov_dat_emp_mail"],
						"prov_dat_emp_dir_fis" => $row["prov_dat_emp_dir_fis"],
						"prov_dat_emp_dir_fis_tipo" => $row["prov_dat_emp_dir_fis_tipo"],
						"prov_dat_emp_num_ejec_aut" => $row["prov_dat_emp_num_ejec_aut"],
						"prov_dat_emp_num_agen_solic" => $row["prov_dat_emp_num_agen_solic"],
						"prov_dat_emp_logo_empr" => $logo,
						"prov_time_stamp" => $row["prov_time_stamp"],
						"prov_modifico" => $row["prov_modifico"],
						"prov_estatus" => $row["prov_estatus"],
						"prov_servicios" => $prov_servicios
					
					);
					array_push($Data_Envia, $Data);
				}
			}
		}else{
			$Error=true;
		}
		$proveedor->close();
		
		$respuesta = array("totalCount" => count($Data_Envia),"data" => $Data_Envia, "estatus" => "ok", "mensaje" => "Registros Encontrados");
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}
	
	public function consultar_proveedores_cmb($prov_id){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();
		$sql=" 
			select prov_id, prov_dat_per_ap_pat, prov_dat_per_ap_mat, prov_dat_per_nombres, prov_dat_emp_nomcomercial from eventos_proveedores where prov_estatus<>'E'
		";
		
		if($prov_id!=""){
			$sql.=" 
				and prov_id=".$prov_id."
			";				
		}
		
		
		
		//echo $sql;
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					
					$Data= array(
						"prov_id" => $row["prov_id"],
						"prov_dat_per_ap_pat" => $row["prov_dat_per_ap_pat"],
						"prov_dat_per_ap_mat" => $row["prov_dat_per_ap_mat"],
						"prov_dat_per_nombres" => $row["prov_dat_per_nombres"],
						"prov_dat_emp_nomcomercial" => $row["prov_dat_emp_nomcomercial"]
					
					);
					array_push($Data_Envia, $Data);
				}
			}
		}else{
			$Error=true;
		}
		$proveedor->close();
		
		$respuesta = array("totalCount" => count($Data_Envia),"data" => $Data_Envia, "estatus" => "ok", "mensaje" => "Registros Encontrados");
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}
	
	
	public function guardar_proveedor($prov_id, $prov_dat_per_ap_pat, $prov_dat_per_ap_mat, $prov_dat_per_nombres, $prov_dat_per_cargo, $prov_dat_per_email, $prov_dat_per_telef_directo, $prov_dat_per_telef_directo_ext, $prov_dat_per_celular, $prov_dat_per_cont_asist, $prov_dat_per_mail_alter, $prov_dat_per_foto, $prov_dat_emp_nomcomercial, $prov_dat_emp_ciudad, $prov_dat_emp_estado, $prov_dat_emp_calle, $prov_dat_emp_num_int, $prov_dat_emp_num_ext, $prov_dat_emp_colonia, $prov_dat_emp_cp, $prov_dat_emp_pais, $prov_dat_emp_telef, $prov_dat_emp_pag_web, $prov_dat_emp_desc_empre, $prov_dat_emp_giro, $prov_dat_emp_rfc, $prov_dat_emp_raz_soc, $prov_dat_emp_cont_adm, $prov_dat_emp_telef_di, $prov_dat_emp_mail, $prov_dat_emp_dir_fis, $prov_dat_emp_dir_fis_tipo, $prov_dat_emp_num_ejec_aut, $prov_dat_emp_num_agen_solic, $prov_dat_emp_logo_empr, $prov_modifico, $prov_estatus){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		$Error=false;
		$Idmaximo="";
		
		$proveedor_M = new Proveedor('mysql', 'eventos');
		$proveedor_M->connect();
		//Obtengo el Id Maximo
		$valormaximo=" select CASE when max(prov_id+1) IS NULL then 1 else (max(prov_id + 1)) end as IndiceMaximo from eventos_proveedores ";
		$proveedor_M->execute($valormaximo);
		
		if (!$proveedor_M->error()){
			if ($proveedor_M->rows($proveedor_M->stmt) > 0) {
				$row_max = $proveedor_M->fetch_array($proveedor_M->stmt, 0);
				$Idmaximo=$row_max["IndiceMaximo"];
				
				$proveedor = new Proveedor('mysql', 'eventos');
				$proveedor->connect();	
				$strSQL="insert into eventos_proveedores ";
				$strSQL.="(
					prov_dat_per_ap_pat
					,prov_dat_per_ap_mat
					,prov_dat_per_nombres
					,prov_dat_per_cargo
					,prov_dat_per_email
					,prov_dat_per_telef_directo
					,prov_dat_per_telef_directo_ext
					,prov_dat_per_celular
					,prov_dat_per_cont_asist
					,prov_dat_per_mail_alter
					,prov_dat_per_foto
					,prov_dat_emp_nomcomercial
					,prov_dat_emp_ciudad
					,prov_dat_emp_estado
					,prov_dat_emp_calle
					,prov_dat_emp_num_int
					,prov_dat_emp_num_ext
					,prov_dat_emp_colonia
					,prov_dat_emp_cp
					,prov_dat_emp_pais
					,prov_dat_emp_telef
					,prov_dat_emp_pag_web
					,prov_dat_emp_desc_empre
					,prov_dat_emp_giro
					,prov_dat_emp_rfc
					,prov_dat_emp_raz_soc
					,prov_dat_emp_cont_adm
					,prov_dat_emp_dir_fis
					,prov_dat_emp_dir_fis_tipo
					,prov_dat_emp_num_ejec_aut
					,prov_dat_emp_num_agen_solic
					,prov_dat_emp_logo_empr
					,prov_time_stamp
					,prov_modifico
					,prov_estatus
				) "; 
				$strSQL.="VALUES ";
				$strSQL.="(
					'".$prov_dat_per_ap_pat."'
					, '".$prov_dat_per_ap_mat."'
					, '".$prov_dat_per_nombres."'
					, '".$prov_dat_per_cargo."'
					, '".$prov_dat_per_email."'
					, '".$prov_dat_per_telef_directo."'
					, '".$prov_dat_per_telef_directo_ext."'
					, '".$prov_dat_per_celular."'
					, '".$prov_dat_per_cont_asist."'
					, '".$prov_dat_per_mail_alter."'
					, '".$prov_dat_per_foto."'
					, '".$prov_dat_emp_nomcomercial."'
					, '".$prov_dat_emp_ciudad."'
					, '".$prov_dat_emp_estado."'
					, '".$prov_dat_emp_calle."'
					, '".$prov_dat_emp_num_int."'
					, '".$prov_dat_emp_num_ext."'
					, '".$prov_dat_emp_colonia."'
					, '".$prov_dat_emp_cp."'
					, '".$prov_dat_emp_pais."'
					, '".$prov_dat_emp_telef."'
					, '".$prov_dat_emp_pag_web."'
					, '".$prov_dat_emp_desc_empre."'
					, '".$prov_dat_emp_giro."'
					, '".$prov_dat_emp_rfc."'
					, '".$prov_dat_emp_raz_soc."'
					, '".$prov_dat_emp_cont_adm."'
					, '".$prov_dat_emp_dir_fis."'
					, '".$prov_dat_emp_dir_fis_tipo."'
					, '".$prov_dat_emp_num_ejec_aut."'
					, '".$prov_dat_emp_num_agen_solic."'
					, '".$prov_dat_emp_logo_empr."'
					,now()
					, '".$prov_modifico."'
					, '".$prov_estatus."'
					)"; 
				
				//echo "<pre>";
				//echo $strSQL;
				//echo "</pre>";
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
			$respuesta = array("totalCount" => "1","prov_id" =>$Idmaximo, "estatus" => "ok", "mensaje" => "Se ha registrado correctamente");
		}else{
			$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al registrar");
		}
		
		
		
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}

	public function editar_proveedor($prov_id, $prov_dat_per_ap_pat, $prov_dat_per_ap_mat, $prov_dat_per_nombres, $prov_dat_per_cargo, $prov_dat_per_email, $prov_dat_per_telef_directo, $prov_dat_per_telef_directo_ext, $prov_dat_per_celular, $prov_dat_per_cont_asist, $prov_dat_per_mail_alter, $prov_dat_per_foto, $prov_dat_emp_nomcomercial, $prov_dat_emp_ciudad, $prov_dat_emp_estado, $prov_dat_emp_calle, $prov_dat_emp_num_int, $prov_dat_emp_num_ext, $prov_dat_emp_colonia, $prov_dat_emp_cp, $prov_dat_emp_pais, $prov_dat_emp_telef, $prov_dat_emp_pag_web, $prov_dat_emp_desc_empre, $prov_dat_emp_giro, $prov_dat_emp_rfc, $prov_dat_emp_raz_soc, $prov_dat_emp_cont_adm, $prov_dat_emp_telef_di, $prov_dat_emp_mail, $prov_dat_emp_dir_fis, $prov_dat_emp_dir_fis_tipo, $prov_dat_emp_num_ejec_aut, $prov_dat_emp_num_agen_solic, $prov_dat_emp_logo_empr, $prov_modifico, $prov_estatus){
		
		$respuesta = array();
		$Error=false;
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();	
		$strSQL="update eventos_proveedores ";
		$strSQL.="set 
					prov_dat_per_ap_pat='".$prov_dat_per_ap_pat."'
					,prov_dat_per_ap_mat='".$prov_dat_per_ap_mat."'
					,prov_dat_per_nombres='".$prov_dat_per_nombres."'
					,prov_dat_per_cargo='".$prov_dat_per_cargo."'
					,prov_dat_per_email='".$prov_dat_per_email."'
					,prov_dat_per_telef_directo='".$prov_dat_per_telef_directo."'
					,prov_dat_per_telef_directo_ext='".$prov_dat_per_telef_directo_ext."'
					,prov_dat_per_celular='".$prov_dat_per_celular."'
					,prov_dat_per_cont_asist='".$prov_dat_per_cont_asist."'
					,prov_dat_per_mail_alter='".$prov_dat_per_mail_alter."'
					,prov_dat_per_foto='".$prov_dat_per_foto."'
					,prov_dat_emp_nomcomercial='".$prov_dat_emp_nomcomercial."'
					,prov_dat_emp_ciudad='".$prov_dat_emp_ciudad."'
					,prov_dat_emp_estado='".$prov_dat_emp_estado."'
					,prov_dat_emp_calle='".$prov_dat_emp_calle."'
					,prov_dat_emp_num_int='".$prov_dat_emp_num_int."'
					,prov_dat_emp_num_ext='".$prov_dat_emp_num_ext."'
					,prov_dat_emp_colonia='".$prov_dat_emp_colonia."'
					,prov_dat_emp_cp='".$prov_dat_emp_cp."'
					,prov_dat_emp_pais='".$prov_dat_emp_pais."'
					,prov_dat_emp_telef='".$prov_dat_emp_telef."'
					,prov_dat_emp_pag_web='".$prov_dat_emp_pag_web."'
					,prov_dat_emp_desc_empre='".$prov_dat_emp_desc_empre."'
					,prov_dat_emp_giro='".$prov_dat_emp_giro."'
					,prov_dat_emp_rfc='".$prov_dat_emp_rfc."'
					,prov_dat_emp_raz_soc='".$prov_dat_emp_raz_soc."'
					,prov_dat_emp_cont_adm='".$prov_dat_emp_cont_adm."'
					,prov_dat_emp_dir_fis='".$prov_dat_emp_dir_fis."'
					,prov_dat_emp_dir_fis_tipo='".$prov_dat_emp_dir_fis_tipo."'
					,prov_dat_emp_num_ejec_aut='".$prov_dat_emp_num_ejec_aut."'
					,prov_dat_emp_num_agen_solic='".$prov_dat_emp_num_agen_solic."'
					,prov_dat_emp_logo_empr='".$prov_dat_emp_logo_empr."'
					,prov_time_stamp=now()
					,prov_modifico='".$prov_modifico."'
					,prov_estatus='".$prov_estatus."'";
		
		$strSQL.=" where ";
		$strSQL.=" prov_id=".$prov_id; 
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
			$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al actualizar informaci?n");
		}
		
		
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}

	public function guardar_hastag_servicios($prov_id, $prov_servicios){
		
		$respuesta = array();
		$Error=false;
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();	
		$strSQL="update eventos_proveedores ";
		$strSQL.="set 
					prov_servicios='".$prov_servicios."'
				 ";	
		
		$strSQL.=" where ";
		$strSQL.=" prov_id=".$prov_id; 
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
			$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al actualizar");
		}
		
		
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}

	public function eliminar_proveedor($prov_id, $prov_estatus, $prov_modifico){
		
		$respuesta = array();
		$Error=false;
		
		$proveedor = new Proveedor('mysql', 'eventos');
		$proveedor->connect();	
		$strSQL="update eventos_proveedores ";
		$strSQL.="set prov_estatus='".$prov_estatus."', prov_modifico='".$prov_modifico."', prov_time_stamp=now() "; 
		$strSQL.="where ";
		$strSQL.="prov_id=".$prov_id; 
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
	
	public function listar_archivos($prov_id){
		$respuesta = array();
		$Archivos="";
		
		
		if($prov_id!=""){
			$path="Archivos/Admin-Proveedores";
			$dir = opendir("../Archivos/Admin-Proveedores");
			// Leo todos los ficheros de la carpeta
			while ($elemento = readdir($dir)){
				// Tratamos los elementos . y .. que tienen todas las carpetas
				if( $elemento != "." && $elemento != ".."){
					
					$elemento_p = explode("-_-", $elemento);
					
					if(count($elemento_p)>0){
						if($elemento_p[0]==$prov_id){
							$nombre_ruta="";
							
							for($i=1;$i<count($elemento_p);$i++){
								if((count($elemento_p)-1)==$i){
									
									$nombre_ruta.=$elemento_p[$i];
								}else{
									$nombre_ruta.=$elemento_p[$i]."_";
								}
							}
							if($nombre_ruta!=""){
								// Muestro el fichero
								
								
								$extension="";
								$extension=explode(".", $nombre_ruta);
								if($extension!=""){
									if($extension[1]=="pdf"||$extension[1]=="PDF"){
										$Archivos.='<img src="./images/pdf.gif" border="0">&nbsp;<a href="'.$path.'/'.$elemento.'" target="_blank">'.$extension[0].'</a> <a onclick="borrararchivo('.$prov_id.',\''.$elemento.'\')" class="red" title="Eliminar" href="#noir"><i class="ace-icon fa fa-trash-o bigger-130" title="Eliminar"></i></a><br><br>';
									}else{
										if($extension[1]=="jpg"||$extension[1]=="JPG"){
											$Archivos.='<img src="./images/icon_jpg.png" border="0" widt="10px">&nbsp;<a href="'.$path.'/'.$elemento.'" target="_blank">'.$extension[0].'</a> <a onclick="borrararchivo('.$prov_id.',\''.$elemento.'\')" class="red" title="Eliminar" href="#noir"><i class="ace-icon fa fa-trash-o bigger-130" title="Eliminar"></i></a><br><br>';
										}else{
											if($extension[1]=="png"||$extension[1]=="PNG"){
												$Archivos.='<img src="./images/png.png" border="0" widt="10px">&nbsp;<a href="'.$path.'/'.$elemento.'" target="_blank">'.$extension[0].'</a> <a onclick="borrararchivo('.$prov_id.',\''.$elemento.'\')" class="red" title="Eliminar" href="#noir"><i class="ace-icon fa fa-trash-o bigger-130" title="Eliminar"></i></a><br><br>';
											}else{
												if($extension[1]=="doc"||$extension[1]=="DOC"||$extension[1]=="docx"||$extension[1]=="DOCX"){
													$Archivos.='<img src="./images/word.png" border="0" widt="10px">&nbsp;<a href="'.$path.'/'.$elemento.'" target="_blank">'.$extension[0].'</a> <a onclick="borrararchivo('.$prov_id.',\''.$elemento.'\')" class="red" title="Eliminar" href="#noir"><i class="ace-icon fa fa-trash-o bigger-130" title="Eliminar"></i></a><br><br>';
												}else{
													if($extension[1]=="xlsx"||$extension[1]=="XLSX"||$extension[1]=="xls"||$extension[1]=="xls"){
														$Archivos.='<img src="./images/xls.png" border="0" widt="10px">&nbsp;<a href="'.$path.'/'.$elemento.'" target="_blank">'.$extension[0].'</a> <a onclick="borrararchivo('.$prov_id.',\''.$elemento.'\')" class="red" title="Eliminar" href="#noir"><i class="ace-icon fa fa-trash-o bigger-130" title="Eliminar"></i></a><br><br>';
													}else{
														$Archivos.='<a href="'.$path.'/'.$elemento.'" target="_blank">'.$extension[0].'</a> <a onclick="borrararchivo('.$prov_id.',\''.$elemento.'\')" class="red" title="Eliminar" href="#noir"><i class="ace-icon fa fa-trash-o bigger-130" title="Eliminar"></i></a><br>';	
													}
												}
											}
										}
									}
								}
							}
						}	
					}
				}
			}
		}
		if($Archivos!=""){
			$respuesta = array("totalCount"=>1,"Archivos" => $Archivos);
		}else{
			$respuesta = array("totalCount"=>0,"Archivos" => $Archivos);
		}
		
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}

	public function borrar_archivo($Archivo){
		$respuesta = array();
		$Error=false;
		/*
		$Ruta_Archivo="httpdocs/ole/eventos/archivos/Admin-Proveedores/".$Archivo;
		$ftp_server = "bsolutionsmx.com";
    	$conn_id = ftp_connect($ftp_server);
    	$ftp_user_name = "bsolutio";
    	$ftp_user_pass = "7?Vg<7@:}9d7<q";
    	$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
		
		
		if (ftp_delete($conn_id, $Ruta_Archivo)) {
		  //echo "$file se ha eliminado satisfactoriamente\n";
		} else {
		 $Error=true;
		 //echo "No se pudo eliminar $file\n";
		}

		// cerrar la conexi?n ftp
		ftp_close($conn_id);
		*/
		
		if (unlink("../archivos/Admin-Proveedores/".$Archivo)){
			//echo "$file se ha eliminado satisfactoriamente\n";
		}else{
			$Error=true;
			//echo "No se pudo eliminar $file\n";
		}
		
		if($Error==false){
			$respuesta = array("totalCount"=>1,"Mensaje" => "Eliminado Correctamente");
		}else{
			$respuesta = array("totalCount"=>0,"Mensaje" => "Ocurrio un error al Eliminar");
		}
		
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
		
	}
}


@$prov_id=$_POST["prov_id"];
@$prov_dat_per_ap_pat=$_POST["prov_dat_per_ap_pat"];
@$prov_dat_per_ap_mat=$_POST["prov_dat_per_ap_mat"];
@$prov_dat_per_nombres=$_POST["prov_dat_per_nombres"];
@$prov_dat_per_cargo=$_POST["prov_dat_per_cargo"];
@$prov_dat_per_email=$_POST["prov_dat_per_email"];
@$prov_dat_per_telef_directo=$_POST["prov_dat_per_telef_directo"];
@$prov_dat_per_telef_directo_ext=$_POST["prov_dat_per_telef_directo_ext"];
@$prov_dat_per_celular=$_POST["prov_dat_per_celular"];
@$prov_dat_per_cont_asist=$_POST["prov_dat_per_cont_asist"];
@$prov_dat_per_mail_alter=$_POST["prov_dat_per_mail_alter"];
@$prov_dat_per_foto=$_POST["prov_dat_per_foto"];
@$prov_dat_emp_nomcomercial=$_POST["prov_dat_emp_nomcomercial"];
@$prov_dat_emp_ciudad=$_POST["prov_dat_emp_ciudad"];
@$prov_dat_emp_estado=$_POST["prov_dat_emp_estado"];
@$prov_dat_emp_calle=$_POST["prov_dat_emp_calle"];
@$prov_dat_emp_num_int=$_POST["prov_dat_emp_num_int"];
@$prov_dat_emp_num_ext=$_POST["prov_dat_emp_num_ext"];
@$prov_dat_emp_colonia=$_POST["prov_dat_emp_colonia"];
@$prov_dat_emp_cp=$_POST["prov_dat_emp_cp"];
@$prov_dat_emp_pais=$_POST["prov_dat_emp_pais"];
@$prov_dat_emp_telef=$_POST["prov_dat_emp_telef"];
@$prov_dat_emp_pag_web=$_POST["prov_dat_emp_pag_web"];
@$prov_dat_emp_desc_empre=$_POST["prov_dat_emp_desc_empre"];
@$prov_dat_emp_giro=$_POST["prov_dat_emp_giro"];
@$prov_dat_emp_rfc=$_POST["prov_dat_emp_rfc"];
@$prov_dat_emp_raz_soc=$_POST["prov_dat_emp_raz_soc"];
@$prov_dat_emp_cont_adm=$_POST["prov_dat_emp_cont_adm"];
@$prov_dat_emp_telef_di=$_POST["prov_dat_emp_telef_di"];
@$prov_dat_emp_mail=$_POST["prov_dat_emp_mail"];
@$prov_dat_emp_dir_fis=$_POST["prov_dat_emp_dir_fis"];
@$prov_dat_emp_dir_fis_tipo=$_POST["prov_dat_emp_dir_fis_tipo"];
@$prov_dat_emp_num_ejec_aut=$_POST["prov_dat_emp_num_ejec_aut"];
@$prov_dat_emp_num_agen_solic=$_POST["prov_dat_emp_num_agen_solic"];
@$prov_dat_emp_logo_empr=$_POST["prov_dat_emp_logo_empr"];
@$prov_modifico=$_POST["prov_modifico"];
@$prov_estatus=$_POST["prov_estatus"];
@$prov_servicios=$_POST["prov_servicios"];
@$Archivo=$_POST["Archivo"];


$prov_id=str_replace("'", " ", $prov_id);
$prov_dat_per_ap_pat=str_replace("'", " ", $prov_dat_per_ap_pat);
$prov_dat_per_ap_mat=str_replace("'", " ", $prov_dat_per_ap_mat);
$prov_dat_per_nombres=str_replace("'", " ", $prov_dat_per_nombres);
$prov_dat_per_cargo=str_replace("'", " ", $prov_dat_per_cargo);
$prov_dat_per_email=str_replace("'", " ", $prov_dat_per_email);
$prov_dat_per_telef_directo=str_replace("'", " ", $prov_dat_per_telef_directo);
$prov_dat_per_telef_directo_ext=str_replace("'", " ", $prov_dat_per_telef_directo_ext);
$prov_dat_per_celular=str_replace("'", " ", $prov_dat_per_celular);
$prov_dat_per_cont_asist=str_replace("'", " ", $prov_dat_per_cont_asist);
$prov_dat_per_mail_alter=str_replace("'", " ", $prov_dat_per_mail_alter);
//$prov_dat_per_foto=str_replace("'", " ", $prov_dat_per_foto);
$prov_dat_emp_nomcomercial=str_replace("'", " ", $prov_dat_emp_nomcomercial);
$prov_dat_emp_ciudad=str_replace("'", " ", $prov_dat_emp_ciudad);
$prov_dat_emp_estado=str_replace("'", " ", $prov_dat_emp_estado);
$prov_dat_emp_calle=str_replace("'", " ", $prov_dat_emp_calle);
$prov_dat_emp_num_int=str_replace("'", " ", $prov_dat_emp_num_int);
$prov_dat_emp_num_ext=str_replace("'", " ", $prov_dat_emp_num_ext);
$prov_dat_emp_colonia=str_replace("'", " ", $prov_dat_emp_colonia);
$prov_dat_emp_cp=str_replace("'", " ", $prov_dat_emp_cp);
$prov_dat_emp_pais=str_replace("'", " ", $prov_dat_emp_pais);
$prov_dat_emp_telef=str_replace("'", " ", $prov_dat_emp_telef);
$prov_dat_emp_pag_web=str_replace("'", " ", $prov_dat_emp_pag_web);
$prov_dat_emp_desc_empre=str_replace("'", " ", $prov_dat_emp_desc_empre);
$prov_dat_emp_giro=str_replace("'", " ", $prov_dat_emp_giro);
$prov_dat_emp_rfc=str_replace("'", " ", $prov_dat_emp_rfc);
$prov_dat_emp_raz_soc=str_replace("'", " ", $prov_dat_emp_raz_soc);
$prov_dat_emp_cont_adm=str_replace("'", " ", $prov_dat_emp_cont_adm);
$prov_dat_emp_telef_di=str_replace("'", " ", $prov_dat_emp_telef_di);
$prov_dat_emp_mail=str_replace("'", " ", $prov_dat_emp_mail);
$prov_dat_emp_dir_fis=str_replace("'", " ", $prov_dat_emp_dir_fis);
$prov_dat_emp_dir_fis_tipo=str_replace("'", " ", $prov_dat_emp_dir_fis_tipo);
$prov_dat_emp_num_ejec_aut=str_replace("'", " ", $prov_dat_emp_num_ejec_aut);
$prov_dat_emp_num_agen_solic=str_replace("'", " ", $prov_dat_emp_num_agen_solic);
//$prov_dat_emp_logo_empr=str_replace("'", " ", $prov_dat_emp_logo_empr);
$prov_modifico=str_replace("'", " ", $prov_modifico);



@$accion=$_POST["accion"];
$Consultas = new consultas();
if($accion=="consultar_proveedores"){
	$comp=$Consultas->consultar_proveedores($prov_id);
	echo $comp; 
}else if($accion=="guardar_proveedor"){	
	$comp=$Consultas->guardar_proveedor($prov_id, $prov_dat_per_ap_pat, $prov_dat_per_ap_mat, $prov_dat_per_nombres, $prov_dat_per_cargo, $prov_dat_per_email, $prov_dat_per_telef_directo, $prov_dat_per_telef_directo_ext, $prov_dat_per_celular, $prov_dat_per_cont_asist, $prov_dat_per_mail_alter, $prov_dat_per_foto, $prov_dat_emp_nomcomercial, $prov_dat_emp_ciudad, $prov_dat_emp_estado, $prov_dat_emp_calle, $prov_dat_emp_num_int, $prov_dat_emp_num_ext, $prov_dat_emp_colonia, $prov_dat_emp_cp, $prov_dat_emp_pais, $prov_dat_emp_telef, $prov_dat_emp_pag_web, $prov_dat_emp_desc_empre, $prov_dat_emp_giro, $prov_dat_emp_rfc, $prov_dat_emp_raz_soc, $prov_dat_emp_cont_adm, $prov_dat_emp_telef_di, $prov_dat_emp_mail, $prov_dat_emp_dir_fis, $prov_dat_emp_dir_fis_tipo, $prov_dat_emp_num_ejec_aut, $prov_dat_emp_num_agen_solic, $prov_dat_emp_logo_empr, $prov_modifico, $prov_estatus);
	echo $comp;
}else if($accion=="editar_proveedor"){	
	$comp=$Consultas->editar_proveedor($prov_id, $prov_dat_per_ap_pat, $prov_dat_per_ap_mat, $prov_dat_per_nombres, $prov_dat_per_cargo, $prov_dat_per_email, $prov_dat_per_telef_directo, $prov_dat_per_telef_directo_ext, $prov_dat_per_celular, $prov_dat_per_cont_asist, $prov_dat_per_mail_alter, $prov_dat_per_foto, $prov_dat_emp_nomcomercial, $prov_dat_emp_ciudad, $prov_dat_emp_estado, $prov_dat_emp_calle, $prov_dat_emp_num_int, $prov_dat_emp_num_ext, $prov_dat_emp_colonia, $prov_dat_emp_cp, $prov_dat_emp_pais, $prov_dat_emp_telef, $prov_dat_emp_pag_web, $prov_dat_emp_desc_empre, $prov_dat_emp_giro, $prov_dat_emp_rfc, $prov_dat_emp_raz_soc, $prov_dat_emp_cont_adm, $prov_dat_emp_telef_di, $prov_dat_emp_mail, $prov_dat_emp_dir_fis, $prov_dat_emp_dir_fis_tipo, $prov_dat_emp_num_ejec_aut, $prov_dat_emp_num_agen_solic, $prov_dat_emp_logo_empr, $prov_modifico, $prov_estatus);
	echo $comp;
}else if($accion=="eliminar_proveedor"){	
	$comp=$Consultas->eliminar_proveedor($prov_id, $prov_estatus, $prov_modifico);
	echo $comp;
}else if($accion=="listar_archivos"){
	$comp=$Consultas->listar_archivos($prov_id);
	echo $comp; 
}else if($accion=="borrar_archivo"){
	$comp=$Consultas->borrar_archivo($Archivo);
	echo $comp; 
}else if($accion=="consultar_proveedores_cmb"){
	$comp=$Consultas->consultar_proveedores_cmb($prov_id);
	echo $comp; 
}else if($accion=="guardar_hastag_servicios"){
	$comp=$Consultas->guardar_hastag_servicios($prov_id, $prov_servicios);
	echo $comp; 
}




?>