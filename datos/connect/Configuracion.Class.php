<?php

class Configuracion {

    private $url;
    private $gestor;
    private $name;
    private $xml;
    private $text = "";
    private $menssage = "";

    public function __construct($url, $gestor, $name) {
        $this->url = $url;
        $this->gestor = strtoupper($gestor);
        $this->name = strtoupper($name);
        $this->getXml();
    }

    public function getUserDb() {
        try {
            $var = $this->xml->{$this->gestor}->{$this->name}->user;
            return $var;
        } catch (Exception $e) {
            $this->menssage = $e->getMessage();
            $this->imprime();
        }
    }

    public function getPassDb() {
        try {
            $var = $this->xml->{$this->gestor}->{$this->name}->password;
            return $var;
        } catch (Exception $e) {
            $this->menssage = $e->getMessage();
            $this->imprime();
        }
    }

    public function getHostDb() {
        try {
            $var = $this->xml->{$this->gestor}->{$this->name}->host;
            return $var;
        } catch (Exception $e) {
            $this->menssage = $e->getMessage();
            $this->imprime();
        }
    }

    public function getDB() {
        try {
            $var = $this->xml->{$this->gestor}->{$this->name}->db;
            return $var;
        } catch (Exception $e) {
            $this->menssage = $e->getMessage();
            $this->imprime();
        }
    }

    public function getPortDb() {
        try {
            $var = $this->xml->{$this->gestor}->{$this->name}->port;
            if ($var == ".") {
               $var = "";
            }
            return $var;
        } catch (Exception $e) {
            $this->menssage = $e->getMessage();
            $this->imprime();
        }
    }

    public function getDomainDb() {
        try {
            $var = $this->xml->{$this->gestor}->{$this->name}->domain;
            if ($var == ".") {
                $var = "";
            }
            return $var;
        } catch (Exception $e) {
            $this->menssage = $e->getMessage();
            $this->imprime();
        }
    }

    private function getXml() {
        try {
            $this->openXml();
            $this->xml = simplexml_load_string($this->text);
            if (!is_object($this->xml)) {
                $this->menssage = ('Error en la lectura del XML de configuracion');
                $this->imprime();
            }
        } catch (ErrorException $e) {
            $this->menssage = $e->getMessage();
            $this->imprime();
        }
    }

    private function openXml() {
        $this->text = file_get_contents($this->url);
    }

    private function imprime() {
        echo $this->menssage;
    }

}

?>
