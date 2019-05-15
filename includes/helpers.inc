<?php
include_once __DIR__ . '/../settings.php';

/**
 * @param int $offset (sec)
 * @param int $format
 * @param int $time_zone
 * @return false|string
 */
function generateTimestampWithOffset($offset, $format, $time_zone) {
    date_default_timezone_set($time_zone);
    $date = date($format, strtotime("+$offset sec"));

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
 * Utility function for getting random values with weighting.
 *
 * Pass in an associative array, such as array('A'=>5, 'B'=>45, 'C'=>50)
 * An array like this means that "A" has a 5% chance of being selected, "B" 45%, and "C" 50%.
 *
 * The return value is the array key, A, B, or C in this case.
 * Note that the values assigned do not have to be percentages.
 * The values are simply relative to each other.
 * Also note that weights should be integers.
 *
 * @param array $weightedValues
 * @return int|string
 */
function getRandomWeightedElement(array $weightedValues) {
    $rand = mt_rand(1, (int) array_sum($weightedValues));

    foreach ($weightedValues as $key => $value) {
        $rand -= $value;
        if ($rand <= 0) {
            return $key;
        }
    }
}

/**
 * @param array $array
 * @return string
 */
function arrayToString($array) {
    $value = "";

    foreach($array as $k => $v) {
        $value = $value . $v;
    }

    return $value;
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
 * @param string $data
 * @param string $filename
 * @param bool $gz
 * @param bool $unlink
 */
function createFile($data, $filename, $gz = true, $unlink = true) {
    appendToFile($filename, $data);

    if ($gz) {
        gzCompressFile($filename);
    }

    if ($unlink) {
        unlink($filename);
    }
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

/**
 * Disable apache2 output buffering/compression
 */
function disable_ob() {
    // Turn off output buffering
    ini_set('output_buffering', 'off');
    // Turn off PHP output compression
    ini_set('zlib.output_compression', false);
    // Implicitly flush the buffer(s)
    ini_set('implicit_flush', true);
    ob_implicit_flush(true);
    // Clear, and turn off output buffering
    while (ob_get_level() > 0) {
        // Get the current level
        $level = ob_get_level();
        // End the buffering
        ob_end_clean();
        // If the current level has not changed, abort
        if (ob_get_level() == $level) break;
    }
    // Disable apache output buffering/compression
    if (function_exists('apache_setenv')) {
        apache_setenv('no-gzip', '1');
        apache_setenv('dont-vary', '1');
    }
}
