<?php

include_once(dirname(__FILE__) . "/../Configuracion.Class.php");
include_once(dirname(__FILE__) . "/../Exception/ExceptionBD.Class.php");
include_once(dirname(__FILE__) . "/../../logger/Logger.Class.php");

class Mysql {
    private $servidor;
    private $usuario;
    private $password;
    private $base_datos;
    private $port;
    private $domain;
    private $link;
    private $stmt;

    public function __construct($name) {
        $this->setConexion($name);
        $this->conectar();
    }

    private function setConexion($name) {
        $conf = new Configuracion(dirname(__FILE__) . "/../Configuracion.xml", "mysql", $name);
        $this->servidor = $conf->getHostDb();
        $this->base_datos = $conf->getDB();
        $this->usuario = $conf->getUserDb();
        $this->password = $conf->getPassDb();
        $this->port = $conf->getPortDb();
        $this->domain = $conf->getDomainDb();
    }

    private function conectar() {
        try {
            $this->link = new PDO('mysql:host=' . trim($this->servidor) . ';port=' . trim($this->port) . ';dbname=' . trim($this->base_datos) . ';', trim($this->usuario), trim($this->password));
			$this->link->query("SET CHARACTER SET UTF8");
		} catch (PDOException $e) {
            print_r($e);
            $log = new Logger();
            $text = "Codigo->" . $e->getCode() . " Error -> " . $e->getMessage() . " trace-> " . $e->getTraceAsString() . "\n";
            $log->w_onError($text);
        }
    }

    public function execute($sql) {
        $this->stmt = $this->link->query($sql);
        return $this->stmt;
    }

    public function fetch_array($stmt, $fila) {
        return $stmt->fetch();
    }

    public function _error() {
        $error = $this->link->errorInfo();
        if ($error[0] = !"00000") {
            return $error[2];
        }
        return FALSE;
    }

    public function _errorNo() {
        return $this->link->errorCode();
    }

    public function _rows($stmt) {
        return $stmt->rowCount();
    }

    public function _close() {
        $this->link = null;
    }

    public function lastID() {
        return $this->link->SCOPE_IDENTITY() ;
    }

    public function isConnected($connnect) {
        return !is_null($connnect);
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

}
    