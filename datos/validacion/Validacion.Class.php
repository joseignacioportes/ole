<?php

class Validacion {

    public function num($min = 0, $max = 11, $num)
    {
        $patron = "/^\d[0-9]{" . $min . "," . $max . "}$/";

        return preg_match($patron, (int) $num);
    }

    public function text($min = 0, $max = 500, $text)
    {
        $patron = "/^[a-zA-Z.\s]{" . $min . "," . $max . "}$/";

        return preg_match($patron, (string) $text);
    }

    public function textNum($min = 0, $max = 500, $text)
    {
        $patron = "/^[0-9a-zA-Z]{" . $min . "," . $max . "}$/";

        return preg_match($patron, (string) $text);
    }

    public function date($text)
    {
        $patron = "/^(0[1-9]|1[0-9]|2[0-9]|3[0-1])\/(0[1-9]|1[0-2])\/\d{4}$/";

        return preg_match($patron, (string) $text);
    }

    public function dateTime($text)
    {
        $patron = "/^(0[1-9]|1[0-9]|2[0-9]|3[0-1])\/(0[1-9]|1[0-2])\/\d{4}\ (0[0-9]|1[0-9]|2[0-4])\:(0[0-9]|1[0-9]|2[0-9]|3[0-9]|4[0-9]|5[0-9])\:(0[0-9]|1[0-9]|2[0-9]|3[0-9]|4[0-9]|5[0-9])$/";

        return preg_match($patron, (string) $text);
    }

    public function dateMysql($text)
    {
        $patron = "/^\d{4}\-(0[1-9]|1[0-2])\-(0[1-9]|1[0-9]|2[0-9]|3[0-1])$/";

        return preg_match($patron, (string) $text);
    }

    public function dateTimeMysql($text)
    {
        $patron = "/^\d{4}\-(0[1-9]|1[0-2])\-(0[1-9]|1[0-9]|2[0-9]|3[0-1])\ (0[0-9]|1[0-9]|2[0-4])\:(0[0-9]|1[0-9]|2[0-9]|3[0-9]|4[0-9]|5[0-9])\:(0[0-9]|1[0-9]|2[0-9]|3[0-9]|4[0-9]|5[0-9])$/";

        return preg_match($patron, (string) $text);
    }

    /*public function rfc($text)
    {
        $patron = "/[A-Z]{3,4}[ \-]?[0-9]{2}((0{1}[1-9]{1})|(1{1}[0-2]{1}))((0{1}[1-9]{1})|([1-2]{1}[0-9]{1})|(3{1}[0-1]{1}))[ \-]?[A-Z0-9]{3}$/";

        return preg_match($patron, (string) $text);
    }*/
    
    public function rfc($text){
        $patron = "/^[A-Z]{4}([0-9]{2})(1[0-2]|0[1-9])([0-3][0-9])(([A-Z0-9]{3})?)$/";
        return preg_match($patron, (string) $text);
    }

    public function curp($text)
    {
        $patron = "/[a-zA-Z]{1}[aeiouAEIOU]{1}[a-zA-Z]{2}\d{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}[AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE]{2}[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$/";

        return preg_match($patron, (string) $text);
    }

    public function telefono($text)
    {
        $patron = "/^(?:\([1-9]\d{2}\)\ ?|[1-9]\d{2}(?:\-?|\ ?))[1-9]\d{2}[- ]?\d{4}$/";

        return preg_match($patron, (string) $text);
    }

    public function email($text)
    {
        $patron = "/^(([A-Za-z0-9]+_+)|([A-Za-z0-9]+\-+)|([A-Za-z0-9]+\.+)|([A-Za-z0-9]+\++))*[A-Za-z0-9]+@((\w+\-+)|(\w+\.))*\w{1,63}\.[a-zA-Z]{2,6}$/";
//        $patron = "/[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/";

        return preg_match($patron, (string) $text);
    }

    public function normalToMysql($text)
    {

        if ($this->date($text)) {
            $fecha = explode("/", $text);

            return $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];
        } else if ($this->dateTime($text)) {
            $fechaHora = explode(" ", $text);
            $fecha = explode("/", $fechaHora[0]);

            return $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0] . " " . $fechaHora[1];
        }
    }

    public function mysqlToNormal($text)
    {

        if ($this->dateMysql($text)) {

            $fecha = explode("-", $text);

            return $fecha[2] . "/" . $fecha[1] . "/" . $fecha[0];
        } else if ($this->dateTimeMysql($text)) {

            $fechaHora = explode(" ", $text);
            $fecha = explode("-", $fechaHora[0]);

            return $fecha[2] . "/" . $fecha[1] . "/" . $fecha[0] . " " . $fechaHora[1];
        }
    }

    public function datoTipoRequerido($valor){
        if (is_null($valor)){
            return false;
        }elseif (is_string($valor) && trim($valor) === ''){
            return false;
        }elseif(($valor) <= '0'){
            return false; 
        }elseif (is_array($valor) && count($valor) < 1){
            return false;
        }
        return true;
    }
    /**
     * valida que la la longitud de un string dado estre entre el rango especificado en el parametro $min  y $max
     * @param $min
     * @param $max
     * @param $value
     * @return bool
     */
    public function between($min, $max, $value)
    {
        $countValue = strlen($value);

        if ($countValue < $min || $countValue > $max) return false;

        return true;


    }


}
