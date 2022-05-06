<?php

class Encode_JSON {

    function convert($params, $result = null) {
        switch (gettype($params)) {
            case 'array':
                $tmp = array();
                foreach ($params as $key => $value) {
                    if (($value = Encode_JSON::encode($value)) !== '')
                        array_push($tmp, Encode_JSON::encode(strval($key)) . ':' . $value);
                };
                $result = '{' . implode(',', $tmp) . '}';
                break;
            case 'boolean':
                $result = $params ? 'true' : 'false';
                break;
            case 'double':
            case 'float':
            case 'integer':
                $result = $result !== null ? strftime('%Y-%m-%dT%H:%M:%S', $params) : strval($params);
                break;
            case 'NULL':
                $result = 'null';
                break;
            case 'string':
                $i = create_function('&$e, $p, $l', 'return intval(substr($e, $p, $l));');
                if (preg_match('/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}T[0-9]{2}:[0-9]{2}:[0-9]{2}$/', $params))
                    $result = mktime($i($params, 11, 2), $i($params, 14, 2), $i($params, 17, 2), $i($params, 5, 2), $i($params, 9, 2), $i($params, 0, 4));
                break;
            case 'object':
                $tmp = array();
                if (is_object($result)) {
                    foreach ($params as $key => $value)
                        $result->$key = $value;
                } else {
                    $result = get_object_vars($params);
                    foreach ($result as $key => $value) {
                        if (($value = Encode_JSON::encode($value)) !== '')
                            array_push($tmp, Encode_JSON::encode($key) . ':' . $value);
                    };
                    $result = '{' . implode(',', $tmp) . '}';
                }
                break;
        }
        return $result;
    }

    function decode($encode, $stdClass = false) {
        $pos = 0;
        $slen = is_string($encode) ? strlen($encode) : null;
        if ($slen !== null) {
            $error = error_reporting(0);
            set_error_handler(array('Encode_JSON', '__exit'));
            $result = Encode_JSON::__decode($encode, $pos, $slen, $stdClass);
            error_reporting($error);
            restore_error_handler();
        }
        else
            $result = null;
        return $result;
    }

    function encode($decode) {
        $result = '';
        switch (gettype($decode)) {
            case 'array':
                if (!count($decode) || array_keys($decode) === range(0, count($decode) - 1)) {
                    $keys = array();
                    foreach ($decode as $value) {
                        if (($value = Encode_JSON::encode($value)) !== '')
                            array_push($keys, $value);
                    }
                    $result = '[' . implode(',', $keys) . ']';
                }
                else
                    $result = Encode_JSON::convert($decode);
                break;
            case 'string':
                $replacement = Encode_JSON::__getStaticReplacement();
                $result = '"' . str_replace($replacement['find'], $replacement['replace'], $decode) . '"';
                break;
            default:
                if (!is_callable($decode))
                    $result = Encode_JSON::convert($decode);
                break;
        }
        return $result;
    }

    function __getStaticReplacement() {
        static $replacement = array('find' => array(), 'replace' => array());
        if ($replacement['find'] == array()) {
            foreach (array_merge(range(0, 7), array(11), range(14, 31)) as $v) {
                $replacement['find'][] = chr($v);
                $replacement['replace'][] = "\\u00" . sprintf("%02x", $v);
            }
            $replacement['find'] = array_merge(array(chr(0x5c), chr(0x2F), chr(0x22), chr(0x0d), chr(0x0c), chr(0x0a), chr(0x09), chr(0x08)), $replacement['find']);
            $replacement['replace'] = array_merge(array('\\\\', '\\/', '\\"', '\r', '\f', '\n', '\t', '\b'), $replacement['replace']);
        }
        return $replacement;
    }

    function __decode(&$encode, &$pos, &$slen, &$stdClass) {
        switch ($encode{$pos}) {
            case 't':
                $result = true;
                $pos += 4;
                break;
            case 'f':
                $result = false;
                $pos += 5;
                break;
            case 'n':
                $result = null;
                $pos += 4;
                break;
            case '[':
                $result = array();
                ++$pos;
                while ($encode{$pos} !== ']') {
                    array_push($result, Encode_JSON::__decode($encode, $pos, $slen, $stdClass));
                    if ($encode{$pos} === ',')
                        ++$pos;
                }
                ++$pos;
                break;
            case '{':
                $result = $stdClass ? new stdClass : array();
                ++$pos;
                while ($encode{$pos} !== '}') {
                    $tmp = Encode_JSON::__decodeString($encode, $pos);
                    ++$pos;
                    if ($stdClass)
                        $result->$tmp = Encode_JSON::__decode($encode, $pos, $slen, $stdClass);
                    else
                        $result[$tmp] = Encode_JSON::__decode($encode, $pos, $slen, $stdClass);
                    if ($encode{$pos} === ',')
                        ++$pos;
                }
                ++$pos;
                break;
            case '"':
                switch ($encode{++$pos}) {
                    case '"':
                        $result = "";
                        break;
                    default:
                        $result = Encode_JSON::__decodeString($encode, $pos);
                        break;
                }
                ++$pos;
                break;
            default:
                $tmp = '';
                preg_replace('/^(\-)?([0-9]+)(\.[0-9]+)?([eE]\+[0-9]+)?/e', '$tmp = "\\1\\2\\3\\4"', substr($encode, $pos));
                if ($tmp !== '') {
                    $pos += strlen($tmp);
                    $nint = intval($tmp);
                    $nfloat = floatval($tmp);
                    $result = $nfloat == $nint ? $nint : $nfloat;
                }
                break;
        }
        return $result;
    }

    function __decodeString(&$encode, &$pos) {
        $replacement = Encode_JSON::__getStaticReplacement();
        $endString = Encode_JSON::__endString($encode, $pos, $pos);
        $result = str_replace($replacement['replace'], $replacement['find'], substr($encode, $pos, $endString));
        $pos += $endString;
        return $result;
    }

    function __endString(&$encode, $position, &$pos) {
        do {
            $position = strpos($encode, '"', $position + 1);
        } while ($position !== false && Encode_JSON::__slashedChar($encode, $position - 1));
        if ($position === false)
            trigger_error('', E_USER_WARNING);
        return $position - $pos;
    }

    function __exit($str, $a, $b) {
        exit($a . 'FATAL: Encode_JSON decode method failure [malicious or incorrect JSON string]');
    }

    function __slashedChar(&$encode, $position) {
        $pos = 0;
        while ($encode{$position--} === '\\')
            $pos++;
        return $pos % 2;
    }

}

?>
