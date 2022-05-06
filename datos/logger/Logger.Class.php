<?php

class Logger {

    private $name;
    private $file;
    private $path = "/../../logs/";

    public function __construct($path = "", $name = "") {
        if ($path != "")
            $this->path = $path;
			
        $this->name = $name;

        if ($this->name != "") {
            $this->name = date("Ymd") . "_" . $this->name;
        } else {
            $this->name = date("Ymd");
        }
    }

    public function w_onError($text) {
        @$this->file = fopen(dirname(__FILE__) . $this->path . $this->name . "_log.txt", "a+");
        @fwrite($this->file, date("Y-m-d G:i:s") . " -->" . $text . "\n");
        @fclose($this->file);
    }

    public function __destruct() {
        
    }

}

?>
