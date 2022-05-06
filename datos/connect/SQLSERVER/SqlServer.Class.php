<?php
include_once(dirname(__FILE__)."/../Configuracion.Class.php");
include_once(dirname(__FILE__) . "/../Exception/ExceptionBD.Class.php");
include_once(dirname(__FILE__) . "/../../logger/Logger.Class.php");

class SqlServer{
 private $conectar;
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
  $this->base_datos=$conf->getDB();
  $this->servidor=$conf->getHostDb();
  $this->usuario=$conf->getUserDb();
  $this->password=$conf->getPassDb();
  $this->port=$conf->getPortDb();
  $this->domain=$conf->getDomainDb();
 }

 private function __clone(){ 
 }

	/*
	private function conectar() {
		$connectionInfo = array( "Database"=>"SIGA", "UID"=>"sa", "PWD"=>"Hos2017");
		$this->link = sqlsrv_connect("CHSGESTAF\SQLEXPRESS", $connectionInfo);
		if($this->link) {
			 echo "Conexión establecida.<br />";
		}else{
			 echo "Conexión no se pudo establecer.<br />";
			 die( print_r( sqlsrv_errors(), true));
		}
		
		$sql = "SELECT Id_Area,Nom_Area,Icono,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_catareas ";
		$stmt = sqlsrv_query($this->link,$sql);
		if(sqlsrv_fetch($stmt) ===false)
		{
			echo "couldn't fetch data"; 
		}
		$name = sqlsrv_get_field($stmt,1);
		echo $name;
    }
	
	public function execute($sql){	
	  @$this->stmt=sqlsrv_query($this->link, $sql);  
	  return $this->stmt;
	}

	 public function fetch_array($stmt,$fila){
	  if($fila==0){
	   @$this->array=sqlsrv_fetch_array($stmt);
	  }else{
	   @$this->array=sqlsrv_fetch_array($stmt);
	  }
	  return $this->array;
	 }

	 public function fetch_rows($stmt,$fila){
	  if($fila==0){
	   @$this->array=sqlsrv_fetch_array($stmt);
	  }else{
	   @$this->array=sqlsrv_fetch_array($stmt);
	  }
	  return $this->array;
	 }

	 public function _error(){
		return @sqlsrv_errors($this->link);
	 }

	 public function _errorNo(){
	   //
	 }
	 public function _free_result($stmt){
	  return @sqlsrv_free_stmt($stmt);
	 }

	 public function _rows($stmt){ 
	  $row_count = sqlsrv_num_rows( $stmt );
	  
	  if ($row_count === false)
	  {
		echo "Error in retrieveing row count.";
	  }
	     	
	  return $row_count;
	 }

	 public function _close(){
	  @sqlsrv_close($this->link);
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
	*/
	
	private function conectar(){
	
	try
		{
		$this->link = new PDO('sqlsrv:server=' . trim($this->servidor) .';DATABASE=' . (string)$this->base_datos . ';', trim($this->usuario), trim($this->password));
		$this->link->query("SET NAMES  \'UTF8\'");
		$this->link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );   

		}catch(PDOException $e){
			$log = new Logger();
            $text = "Codigo->" . $e->getCode() . " Error -> " . $e->getMessage() . " trace-> " . $e->getTraceAsString() . "\n";
            $log->w_onError($text);
			echo $e->getMessage();
			
			die();
		}
	}

 
	public function execute($sql) {
		try
		{
			$this->stmt = $this->link->query($sql);
		}
		catch (PDOException $e)
		{	
			$this->link->errorCode(); 
			$log = new Logger();
            $text = "Codigo->" . $e->getCode() . " Error -> " . $e->getMessage() . " trace-> " . $e->getTraceAsString() ." Query-> " . $sql. "\n";
            $log->w_onError($text);
			//echo $e->getMessage();		
		}	
		return $this->stmt;
    }

    public function fetch_array($stmt, $fila) {
		return $stmt->fetch($fila);
    }

    public function _error() {
        $error = $this->link->errorInfo();
		if ($error[0]!="0000000000") {
            return true;
        }
        else {
			return false;
		}
    }

    public function _errorNo() {
        return $this->link->errorCode();
    }

    public function _rows($stmt) {
		//echo @sqlsrv_num_rows($stmt);
		//echo $stmt->fetchColumn();
		//echo $this->link->rowCount();
		//print "rowCount() Standart: ".$stmt->rowCount()."<br>";
		$valor=0;
		if ($stmt->rowCount()=="-1") {//Devuelve un -1 cuando encuentra resultados
			$valor=1;	
		}else{
			$valor=0;//Devuelve un 0 cuando no se encontraron registros
		}
		return $valor;
		//return count($this->stmt);
		
	}

    public function _close() {
        $this->link = null;
    }

    public function lastID() {
        return $this->link->lastInsertId();
    }
	
	public function beginTransaction() {
        return $this->link->beginTransaction();
    }
	
	public function commit() {
        return $this->link->commit();
    }
	
	public function rollback() {
        return $this->link->rollback();
    }

    public function isConnected($connnect) {
        return !is_null($connnect);
    }
	
	public function _free_result($stmt){
	  return @sqlsrv_free_stmt($stmt);
	}
	
	
	
}

	
?>
