<?php

include_once(dirname(__FILE__) . "/ProveedorBd.Class.php");
include_once(dirname(__FILE__) . "/MYSQL/Mysql.Class.php");
include_once(dirname(__FILE__) . "/POSTGRESSQL/PostgresSQL.Class.php");
include_once(dirname(__FILE__) . "/INTERBASE/Interbase.Class.php");
include_once(dirname(__FILE__) . "/SQLSERVER/SqlServer.Class.php");

class Proveedor extends ProveedorBd {

    public $stmt;
    private $gestor = "";
    private $menssage = "";
    private $name = "";

    public function __construct() {
        if ((count(func_get_args()) > 0)) {
            if ((count(func_get_args()) > 0) && (count(func_get_args()) < 3)) {
                if (trim(strtoupper(func_get_arg(0))) != "") {
                    $this->gestor = strtoupper(func_get_arg(0));
                }
                $this->name = strtoupper(func_get_arg(1));
            } else {
                $this->menssage = "La clase solo admite un valor como identificador de gestor de base de datos, verifique porfavor los parametros";
                $this->imprime();
            }
        }
    }

    private function param($param) {
        foreach ($param as $tag => $value) {
            (($tag == "gestor") && ($value != "")) ? $this->setgestor($value) : "";
            (($tag == "name") && ($value != "")) ? $this->setname($value) : "";
        }
    }

    private function setgestor($gestor) {
        $this->gestor = $gestor;
    }

    private function setname($name) {
        $this->name = $name;
    }

    public function connect() {
        switch ($this->gestor) {
            case "MYSQL":
                if (trim($this->name) != "") {
                    $this->resource = new Mysql($this->name);

                    return $this->resource;
                } else {
                    $this->menssage = "No ingresaste el nombre de tu conexion";
                    $this->imprime();
                }
                break;
            case "ORACLE":
                if (trim($this->name) != "") {
                    $this->menssage = "El provedor no tiene configurada la conexion con oracle";
                    $this->imprime();
                } else {
                    $this->menssage = "No ingresaste el nombre de tu conexion";
                    $this->imprime();
                }
                break;
            case "POSTGRESSQL":
                if (trim($this->name) != "") {
                    $this->resource = new PostgresSQL();

                    return $this->resource;
                } else {
                    $this->menssage = "No ingresaste el nombre de tu conexion";
                    $this->imprime();
                }
                break;
            case "SQLSERVER":
                if (trim($this->name) != "") {
                    $this->resource = new SqlServer($this->name);

                    return $this->resource;
                } else {
                    $this->menssage = "No ingresaste el nombre de tu conexion";
                    $this->imprime();
                }
                break;
            case "INTERBASE":
                if (trim($this->name) != "") {
                    $this->resource = new Interbase();

                    return $this->resource;
                } else {
                    $this->menssage = "No ingresaste el nombre de tu conexion";
                    $this->imprime();
                }
                break;
        }
    }

    public function errorNo() {
        return $this->resource->_errorNo();
    }

    public function error() {
        return $this->resource->_error();
    }

    public function execute($sql) {
		$this->stmt = $this->resource->execute($sql);
    }

    public function isConnected() {
        return @$this->resource->isConnected($this->resource);
    }

    public function fetch_array($stmt, $fila) {
        return $this->resource->fetch_array($stmt, $fila);
    }

    public function fetch_field($stmt, $fila = 0) {
        return $this->resource->fetch_field($stmt, $fila);
    }

    public function fetch_object($stmt, $fila = 0) {
        return $this->resource->fetch_object($stmt, $fila);
    }

    public function fetch_chatobject($stmt) {
        return $this->resource->fetch_chatobject($stmt);
    }

    public function fetch_rows($stmt, $fila) {
        return $this->resource->fetch_rows($stmt, $fila);
    }

    public function lastID() {
        return $this->resource->lastID();
    }
	
	public function beginTransaction() {
        return $this->resource->beginTransaction();
    }
	
	public function commit() {
        return $this->resource->commit();
    }
	
	public function rollback() {
        return $this->resource->rollback();
    }

    public function free_result($stmt) {
        return $this->resource->_free_result($stmt);
    }

    public function rows($stmt) {
        return $this->resource->_rows($stmt);
    }

    public function close() {
        @$this->resource->_close();
    }

    public function autocommit($sql) {
        @$this->resource->_autocommit($sql);
    }

    public function getfechaActual() {
        $this->execute("SELECT NOW()");
        $fechaActual = $this->fetch_rows($this->stmt, 0);
        $fechaActual = $fechaActual[0];
        return $fechaActual;
    }

//    public function bitacora($CveAccion, $Observaciones) {
//        return $this->resource->_bitacora($CveAccion, $Observaciones);
//    }

    public function imprime() {
        echo $this->menssage;
    }

}

?>
