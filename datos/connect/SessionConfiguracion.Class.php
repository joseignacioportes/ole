<?php  

class SessionConfiguracion{
 /*
  *Se declaran los atributos para la clase de configuracion
  */
 private $_domain="";    
 private $_userdb="root";    
 private $_passdb="root";    
 private $_hostdb="localhost";    
 private $_db="test";     
 private $_port="3306";
 
 /*
  *Se declara una variable estatica lo cual asegura que el objeto solo se creara solo una ves
  */
 static $_instance;     
 
 /*
  *se declara el constructor de forma privada
  */
 private function __construct(){       
  $this->_domain=$_SESSION['SesionDM'];       
  $this->_userdb=$_SESSION['SesionUS'];       
  $this->_passdb=$_SESSION['SesionPS'];       
  $this->_hostdb=$_SESSION['SesionIP'];       
  $this->_db=$_SESSION['SesionBD'];    
  $this->_port=$_SESSION['SessionPort'];
 }     
 /*
  *el metodo __clone no se utilizara por el momento
  */
 private function __clone(){ }     
 
 /*
  *este metodo crea el objeto de la clase configuracion
  */
 public static function getInstance(){       
  if(!(self::$_instance instanceof self)){          
   self::$_instance=new self();       
  }       
  return self::$_instance;    
 }     
 
 /*
  * regresa el valor de el usuario de la base de datos
  */
 public function getUserDB(){       
  $var=$this->_userdb;       
  return $var;    
 }     
 /*
  * regresa la direccion del servidor de base de datos
  */
 public function getHostDB(){       
  $var=$this->_hostdb;       
  return $var;    
 }     
 /*
  * regresa el password de la base de datos
  */
 public function getPassDB(){       
  $var=$this->_passdb;       
  return $var;    
 }     
 /*
  * regresa el nombre de la base de datos
  */
 public function getDB(){       
  $var=$this->_db;       
  return $var;    
 }  
 /*
  * regresa el puerto de base de datos
  */
 public function getPort(){
  $var =$this->_port;
  return $var;
 }
 /*
  * regresa el dominio si es que existe para ingresar a la base de datos
  */
 public function getDomain(){
  $var =$this->_domain;
  return $var;
 }
 
}
?>
