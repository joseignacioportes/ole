<?php

include_once(dirname(__FILE__) . "/../Configuracion.Class.php");

class Interbase {

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

    public function __construct() {
        $this->setConexion();
        $this->conectar();
    }

    private function setConexion() {
        $conf = new Configuracion(dirname(__FILE__) . "/../Configuracion.xml", "INTERBASE");
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
            $this->link = ibase_connect($this->servidor . ":" . $this->base_datos, $this->usuario, $this->password);
        } catch (Exception $e) {
            $this->menssage = $e->getMessage();
        }
    }

    public function execute($sql) {
        $this->stmt = ibase_query($this->link,$sql);
        return $this->stmt;
    }

    public function _error() {
        
    }

    public function _errorNo() {
        
    }

    public function _rows($stmt) {
        return @ibase_num_fields($stmt);
    }

    public function _close() {
        @ibase_close($this->link);
    }

}

?>
