<?php

include_once(dirname(__FILE__) . "/../json/JsonEncod.Class.php");

class DtoToJson {

    private $dtos;
    private $array;

    public function __construct($dtos) {
        $this->dtos = $dtos;
    }

    public function toJson($text = "") {
        $i = 1;
        $json = "{\"totalCount\":\"" . count($this->dtos) . "\",\"text\":\"" . $text . "\",\"data\":[";
        foreach ($this->dtos as $dto) {
            $jsonDto = new Encode_JSON();
            $json.=$jsonDto->encode($dto->toString());
            $json.= ",";
        }
        $json = substr($json, 0, (strlen($json) - 1));
        $json.="]}";
        return $json;
    }

    public function to2Json($json2, $text = "", $type = "OK") {
        $i = 1;
        $json = "{\"totalCount\":\"" . count($this->dtos) . "\",\"type\":\"" . $type . "\",\"text\":\"" . $text . "\",\"data\":[";
        foreach ($this->dtos as $dto) {
            $jsonDto = new Encode_JSON();
            $json.=$jsonDto->encode($dto->toString());
            $json.= ",";
        }
        $json = substr($json, 0, (strlen($json) - 1));
        $json.="],\"data2\":[";

        foreach ($json2 as $dto) {
            $jsonDto = new Encode_JSON();
            $json.=$jsonDto->encode($dto->toString());
            $json.= ",";
        }
        $json = substr($json, 0, (strlen($json) - 1));
        $json.="]}";
        return $json;
    }

    public function to3Json($json2, $json3, $text = "") {
        $i = 1;
        $json = "{\"totalCount\":\"" . count($this->dtos) . "\",\"text\":\"" . $text . "\",\"data\":[";
        foreach ($this->dtos as $dto) {
            $jsonDto = new Encode_JSON();
            $json.=$jsonDto->encode($dto->toString());
            $json.= ",";
        }
        $json = substr($json, 0, (strlen($json) - 1));
        $json.="],\"data2\":[";

        if ($json2 != "") {
            foreach ($json2 as $dto) {
                $jsonDto = new Encode_JSON();
                $json.=$jsonDto->encode($dto->toString());
                $json.= ",";
            }
        }
        if ($json2 != "") {
            $json = substr($json, 0, (strlen($json) - 1));
        }
        $json.="],\"data3\":[";
        foreach ($json3 as $dto) {
            $jsonDto = new Encode_JSON();
            $json.=$jsonDto->encode($dto->toString());
            $json.= ",";
        }
        $json = substr($json, 0, (strlen($json) - 1));
        $json.="]}";
        return $json;
    }

    public function toJsonPaginado($pagina, $total) {
        $i = 1;
        $json = "{\"totalCount\":\"" . $total . "\",\"pagina\":\"" . $pagina . "\",\"data\":[";
        foreach ($this->dtos as $dto) {
            $jsonDto = new Encode_JSON();
            $json.=$jsonDto->encode($dto->toString());
            $json.= ",";
        }
        $json = substr($json, 0, (strlen($json) - 1));
        $json.="]}";
        return $json;
    }

}

?>
