<?php 
abstract class ProveedorBd{

	protected $resource; 											
	
	public abstract function connect(); 
	
	public abstract function errorNo();							
	
	public abstract function error();
	
	public abstract	function execute($sql);			
        
        public abstract function fetch_field($stmt, $fila=0);
        
        public abstract function fetch_object($stmt, $fila=0);
        
        public abstract function fetch_chatobject ($stmt);

        public abstract function fetch_array($stmt,$fila);

	public abstract function fetch_rows($stmt,$fila);
	
	public abstract function lastID();
	
	public abstract function free_result($stmt);
	
	public abstract function rows($stmt);
	
	public abstract function close();
	
	public abstract function autocommit($sql);
	public abstract function getfechaActual();
	
	public abstract function beginTransaction();
	
	public abstract function commit();
	
	public abstract function rollback();

	
//	public abstract function bitacora($CveAccion,$Observaciones);

	public abstract function isConnected();							
						
}
?>
