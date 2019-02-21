<?php

include_once 'includes/helpers.inc';

/**
 * @param array $settings
 * @return string
 */
function createLogRow($settings) {
    $ip = $settings['ip'];
    $port = $settings['port'];
    $user = $settings['user'];
    $path = $settings['path'];
    $attack = $settings['attack'];
    $verb = $settings['verb'];
    $status = $settings['status'];
    $date = $settings['date'];
    $http = $settings['version'];
    $blob = rand(0, 90000);

    $log = $date ." ". $user ." ". $ip ." \"". $verb ." ". $port ." ". $path.$attack . " " .$http. "\" " . $status ." ". $blob;

    return $log;
}

/**
 * @param int $items
 * @param string $export
 * @return string
 */
function generateLogs($items = 1, $export = 'file') {
    $logs = "";
    $separator = "\r\n";

    // Export for html
    if ($export != 'file') {
        $separator = '<br />';
    }

    for ($i = 1; $i <= $items; $i++) {
        $settings['ip'] = randomArrayValue($GLOBALS['request_ips']);
        $settings['port'] = randomArrayValue($GLOBALS['request_ports']);
        $settings['user'] = randomArrayValue($GLOBALS['request_users']);
        $settings['path'] = randomArrayValue($GLOBALS['request_paths']);
        $settings['attack'] = randomArrayValue($GLOBALS['attack_suffix']);
        $settings['verb'] = randomArrayValue($GLOBALS['request_http_verbs']);
        $settings['status'] = randomArrayValue($GLOBALS['request_http_status']);
        $settings['date'] = generateTimestamp($i);
        $settings['version'] = randomArrayValue($GLOBALS['request_http_version']);

        $logs = $logs . createLogRow($settings) . $separator;
    }

    return $logs;
}

/**
 * @param int $log_items
 * @param int $files_number
 * @param string $directory
 * @param string $name
 */
function generateLogFiles($log_items = 10000, $files_number = 10, $directory = 'logs', $name = 'website-access.log') {
    if(!is_dir($directory)){
        mkdir($directory, 0755, true);
    }

    for ($i = 1; $i <= $files_number; $i++) {
        $logs = generateLogs($log_items, 'file');
        $filename = $directory . '/' . $name . '.' . $i;
        appendToFile($filename, $logs);
        gzCompressFile($filename);
    }
}
