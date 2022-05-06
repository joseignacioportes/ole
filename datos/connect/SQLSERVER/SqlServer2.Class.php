<?php
include_once(dirname(__FILE__)."/../Configuracion.Class.php");

class SqlServer{

 private $servidor;
 private $usuario;
 private $password;
 private $base_datos;
 private $port;
 private $domain;
 private $link;
 private $stmt;
 private $array;
 private $menssage="";

 static $_instance;

 public function __construct($name){
  $this->setConexion($name);
  $this->conectar();
 }

 private function setConexion($name){
  $conf = new Configuracion(dirname(__FILE__)."/../Configuracion.xml","sqlserver",$name);
  $this->servidor=$conf->getHostDb();
  $this->base_datos=$conf->getDB();
  $this->usuario=$conf->getUserDb();
  $this->password=$conf->getPassDb();
  $this->port=$conf->getPortDb();
  $this->domain=$conf->getDomainDb();
 }

 private function __clone(){ }

 private function conectar(){
  try{
  @$this->link = mssql_connect($this->servidor, $this->usuario, $this->password);
  @mssql_select_db($this->base_datos,$this->link);
  //@mssql_query("SET NAMES 'utf8'");
  }catch (ErrorException $e){
    $this->menssage=$e->getMessage();
  }

 }

 public function execute($sql){
  @$this->stmt=mssql_query($sql,$this->link);
  
  return $this->stmt;
 }

 public function fetch_array($stmt,$fila){
  if($fila==0){
   @$this->array=mssql_fetch_array($stmt);
  }else{
   @mssql_data_seek($stmt,$fila);
   @$this->array=mssql_fetch_array($stmt);
  }
  return $this->array;
 }

 public function fetch_rows($stmt,$fila){
  if($fila==0){
   @$this->array=mssql_fetch_row($stmt);
  }else{
   @mssql_data_seek($stmt,$fila);
   @$this->array=mssql_fetch_row($stmt);
  }
  return $this->array;
 }

 public function _error(){
 // return mssql_get_last_message();
  return false;
 }

 public function _errorNo(){
   //
 }
 public function _free_result($stmt){
  return @mssql_free_result($stmt);
 }

 public function _rows($stmt){
  return @mssql_num_rows($stmt);
 }

 public function _close(){
  @mssql_close($this->link);
 }

 public function lastID(){
  //
 }

 public function _autocommit($sql){
   @mssql_query($sql);
 }

 public function isConnected($connnect){
  return !is_null($connnect);
 }

// public function _bitacora($CveAccion,$Observaciones){ }
//
// public function _fecha(){ }
}
/*
function mssql_insert_id() {
	$id = false;
	$res = mssql_query('SELECT @@identity AS id');
	if ($row = mssql_fetch_row($res)) {
		$id = trim($row[0]);
	}
	mssql_free_result($res);
	return $id;
}*/

?>
