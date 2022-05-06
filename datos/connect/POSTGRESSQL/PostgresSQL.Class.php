<?php

include_once(dirname(__FILE__) . "/../Configuracion.Class.php");

class PostgresSQL {

    private $servidor;
    private $usuario;
    private $password;
    private $base_datos;
    private $port;
    private $domain;
    private $link;
    private $stmt;
    private $array;
    private $menssage = "";
    static $_instance;

    public function __construct() {
        $this->setConexion();
        $this->conectar();
    }

    private function setConexion() {
        $conf = new Configuracion(dirname(__FILE__) . "/../Configuracion.xml", "postgressql");
        $this->servidor = $conf->getHostDb();
        $this->base_datos = $conf->getDB();
        $this->usuario = $conf->getUserDb();
        $this->password = $conf->getPassDb();
        $this->port = $conf->getPortDb();
        $this->domain = $conf->getDomainDb();
    }

    private function __clone() {

    }

    private function conectar() {
        try {
            $this->link = pg_connect("host=" . $this->servidor . " dbname=" . $this->base_datos . " user=" . $this->usuario . " password=" . $this->password);
        } catch (ErrorException $e) {
            $this->menssage = $e->getMessage();
        }
    }

    public function execute($sql) {
        @$this->stmt = pg_query($this->link, $sql);
        return $this->stmt;
    }

    public function fetch_array($stmt, $fila) {
        if ($fila == 0) {
            @$this->array = pg_fetch_array($stmt, NULL, PGSQL_ASSOC);
        } else {
            @pg_result_seek($stmt, $fila);
            @$this->array = pg_fetch_array($stmt, NULL, PGSQL_ASSOC);
        }
        return $this->array;
    }

    public function fetch_rows($stmt, $fila) {
        if ($fila == 0) {
            @$this->array = pg_fetch_row($stmt);
        } else {
            @pg_result_seek($stmt, $fila);
            @$this->array = pg_fetch_row($stmt);
        }
        return $this->array;
    }

    public function _error() {

        
    }

    public function _errorNo() {
        //return @mysql_errno();
    }

    public function _free_result($stmt) {
        //return @mysql_free_result($stmt);
    }

    public function _rows($stmt) {
        return @pg_num_rows($stmt);
    }

    public function _close() {
        @pg_close($this->link);
    }

}

?>
