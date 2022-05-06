<?php 
/*
 Agrega todo el contenido de un paquete en el archivo que lo solicite basado en el pakege de java
*/
 class Package{
    	
 private $importFilePath=null; 
 private $basePath="."; 
 private $classPath=null; 
 
 
 private static $_con; 
   	
 public function __construct($paquete){
   $this->param($paquete); 
   $this->_dir($this->classPath);
 }

private function _dir($classPath){
 //echo "File:".$classPath."<br>";
 if(is_dir($classPath)){
 	if($dir = opendir($classPath)){
 	  while( ($file =  readdir($dir)) !== false ){
 	  	if( ($file==".") || ($file=="..") ){}
 	  	else {
 	  	 if( (filetype($classPath.$file)) == "dir" ){
 	  	  $this->_dir($classPath.$file."/");	
 	  	 } else {
 	  	  if(substr($file, (strlen($file)-1), strlen($file))!="~"){
                        if(substr($file, (strlen($file)-4),strlen($file))==".php"){
                         if($file!="index.php")   
 	  	  	 include_once($classPath.$file);
                        } 
 	  	  }	   			 
 	  	 } 	 
 	  	}		
 	  }		 
 	}
 }else{
  include_once($classPath);
 }
}  

private function param($paquete) { 
 $this->classPath = $paquete; 
}
}
?>
