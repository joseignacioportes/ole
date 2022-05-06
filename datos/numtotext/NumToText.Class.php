<?php

class NumToText {

    private $matuni = array();
    private $matunisub = array();
    private $matdec = array();
    private $matsub = array();
    private $matmil = array();

    public function __construct() {
        //
    }

    public function toText($num, $fem = false, $decimal = true) {

        $this->matuni[2] = "dos";
        $this->matuni[3] = "tres";
        $this->matuni[4] = "cuatro";
        $this->matuni[5] = "cinco";
        $this->matuni[6] = "seis";
        $this->matuni[7] = "siete";
        $this->matuni[8] = "ocho";
        $this->matuni[9] = "nueve";
        $this->matuni[10] = "diez";
        $this->matuni[11] = "once";
        $this->matuni[12] = "doce";
        $this->matuni[13] = "trece";
        $this->matuni[14] = "catorce";
        $this->matuni[15] = "quince";
        $this->matuni[16] = "dieciseis";
        $this->matuni[17] = "diecisiete";
        $this->matuni[18] = "dieciocho";
        $this->matuni[19] = "diecinueve";
        $this->matuni[20] = "veinte";
        $this->matunisub[2] = "dos";
        $this->matunisub[3] = "tres";
        $this->matunisub[4] = "cuatro";
        $this->matunisub[5] = "quin";
        $this->matunisub[6] = "seis";
        $this->matunisub[7] = "sete";
        $this->matunisub[8] = "ocho";
        $this->matunisub[9] = "nove";

        $this->matdec[2] = "veint";
        $this->matdec[3] = "treinta";
        $this->matdec[4] = "cuarenta";
        $this->matdec[5] = "cincuenta";
        $this->matdec[6] = "sesenta";
        $this->matdec[7] = "setenta";
        $this->matdec[8] = "ochenta";
        $this->matdec[9] = "noventa";
        $this->matsub[3] = 'mill';
        $this->matsub[5] = 'bill';
        $this->matsub[7] = 'mill';
        $this->matsub[9] = 'trill';
        $this->matsub[11] = 'mill';
        $this->matsub[13] = 'bill';
        $this->matsub[15] = 'mill';
        $this->matmil[4] = 'millones';
        $this->matmil[6] = 'billones';
        $this->matmil[7] = 'de billones';
        $this->matmil[8] = 'millones de billones';
        $this->matmil[10] = 'trillones';
        $this->matmil[11] = 'de trillones';
        $this->matmil[12] = 'millones de trillones';
        $this->matmil[13] = 'de trillones';
        $this->matmil[14] = 'billones de trillones';
        $this->matmil[15] = 'de billones de trillones';
        $this->matmil[16] = 'millones de billones de trillones';


        if ($decimal == true) {
            $float = explode('.', $num);
            $num = $float[0];
        }

        $num = trim((string) @$num);
        if ($num[0] == '-') {
            $neg = 'menos ';
            $num = substr($num, 1);
        }else
            $neg = '';

        while ($num[0] == '0')
            $num = substr($num, 1);
        if ($num[0] < '1' or $num[0] > 9)
            $num = '0' . $num;

        $zeros = true;
        $punt = false;
        $ent = '';
        $fra = '';

        for ($index = 0; $index < strlen($num); $index++) {
            $no = $num[$index];
            if (!(strpos(".,'''", $no) === false)) {
                if ($punt)
                    break;
                else {
                    $punt = true;
                    continue;
                }
            } else if (!(strpos('0123456789', $no) === false)) {
                if ($punt) {
                    if ($no != '0')
                        $zeros = false;
                    $fra .= $no;
                }else
                    $ent .= $no;
            }else
                break;
        }

        $ent = '     ' . $ent;
        if ($decimal and $fra and !$zeros) {
            $fin = ' coma';
            for ($no = 0; $no < strlen($fra); $no++) {
                if (($s = $fra[$no]) == '0')
                    $fin .= ' cero';
                elseif ($s == '1')
                    $fin .= $fem ? ' una' : ' un';
                else
                    $fin .= ' ' . $matuni[$s];
            }
        }else
            $fin = '';

        if ((int) $ent === 0)
            return 'Cero ' . $fin;

        $tex = '';
        $sub = 0;
        $mils = 0;
        $neutro = false;


        while (($num = substr($ent, -3)) != '   ') {
            $ent = substr($ent, 0, -3);
            if (++$sub < 3 and $fem) {
                $this->matuni[1] = 'una';
                $subcent = 'as';
            } else {
                $this->matuni[1] = $neutro ? 'un' : 'uno';
                $subcent = 'os';
            }
            $t = '';
            $n2 = substr($num, 1);
            if ($n2 == '00') {
                
            } elseif ($n2 < 21)
                $t = ' ' . $this->matuni[(int) $n2];
            elseif ($n2 < 30) {
                $n3 = $num[2];
                if ($n3 != 0)
                    $t = 'i' . $this->matuni[$n3];
                $n2 = $num[1];
                $t = ' ' . $this->matdec[$n2] . $t;
            }else {
                $n3 = $num[2];
                if ($n3 != 0)
                    $t = ' y ' . $this->matuni[$n3];
                $n2 = $num[1];
                $t = ' ' . $this->matdec[$n2] . $t;
            }
            $n = $num[0];
            if ($n == 1) {
                $t = ' ciento' . $t;
            } elseif ($n == 5) {
                $t = ' ' . $this->matunisub[$n] . 'ient' . $subcent . $t;
            } elseif ($n != 0) {
                $t = ' ' . $this->matunisub[$n] . 'cient' . $subcent . $t;
            }
            if ($sub == 1) {
                
            } elseif (!isset($this->matsub[$sub])) {
                if ($num == 1) {
                    $t = 'un mil';
                } elseif ($num > 1) {
                    $t .= ' mil';
                }
            } elseif ($num == 1) {
                $t .= ' ' . $this->matsub[$sub] . '?n';
            } elseif ($num > 1) {
                $t .= ' ' . $this->matsub[$sub] . 'ones';
            }
            if ($num == '000')
                $mils++;
            elseif ($mils != 0) {
                if (isset($this->matmil[$sub]))
                    $t .= ' ' . $this->matmil[$sub];
                $mils = 0;
            }
            $neutro = true;
            $tex = $t . $tex;
        }

        $tex = $neg . $tex . $fin;
        $end_num = ucfirst($tex) . ' pesos ' . $float[1] . '/100 M.N.';
        return strtoupper($end_num);
    }

}
?>