<?php

/**
 * @param int $offset
 * @return false|string
 */
function generateTimestamp($offset) {
    date_default_timezone_set($GLOBALS['timezone']);
    $date = date("Y-m-d\TH:i:s", strtotime("+$offset sec"));

    return $date;
}

/**
 * @param array $array
 * @return mixed
 */
function randomArrayValue($array) {
    return $array[array_rand($array)];
}

/**
 * @param $filename
 * @param $text
 * @return bool|int
 */
function appendToFile($filename, $text) {
    $file = file_put_contents($filename, $text.PHP_EOL , FILE_APPEND | LOCK_EX);
    return $file;
}

/**
 * @param string $source
 * @param int $level
 * @return bool|string
 */
function gzCompressFile($source, $level = 9){
    $destination = $source . '.gz';
    $mode = 'wb' . $level;
    $error = false;
    if ($fp_out = gzopen($destination, $mode)) {
        if ($fp_in = fopen($source,'rb')) {
            while (!feof($fp_in))
                gzwrite($fp_out, fread($fp_in, 1024 * 512));
            fclose($fp_in);
        } else {
            $error = true;
        }
        gzclose($fp_out);
    } else {
        $error = true;
    }
    if ($error) {
        return false;
    }
    else {
        return $destination;
    }
}
