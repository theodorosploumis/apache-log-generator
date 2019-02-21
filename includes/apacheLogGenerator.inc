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
        $settings['ip'] = getRandomWeightedElement($GLOBALS['request_ips']);
        $settings['port'] = getRandomWeightedElement($GLOBALS['request_ports']);
        $settings['user'] = getRandomWeightedElement($GLOBALS['request_users']);
        $settings['path'] = getRandomWeightedElement($GLOBALS['request_paths']);
        $settings['attack'] = getRandomWeightedElement($GLOBALS['attack_suffix']);
        $settings['verb'] = getRandomWeightedElement($GLOBALS['request_http_verbs']);
        $settings['status'] = getRandomWeightedElement($GLOBALS['request_http_status']);
        $settings['date'] = generateTimestamp($i);
        $settings['version'] = getRandomWeightedElement($GLOBALS['request_http_version']);

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

        createFile($logs, $filename);
    }
}

/**
 * @param int $sleep
 * @param int $log_items
 * @param string $directory
 * @param string $name
 * @param bool $keep_files
 */
function generateRealTimeLogs($sleep = 1, $log_items = 500, $directory = 'logs', $name = 'website-access.log', $keep_files = true) {
    if(!is_dir($directory)){
        mkdir($directory, 0755, true);
    }
    
    $logs = [];
    $suffix = 1;

    // Command to run every 1 seconds
    for ($i = 0; true; $i++) {
        sleep($sleep);
        $log = generateLogs(1, 'file');

        // Append item to the $logs array
        $logs[] = $log;
        $count = count($logs);

        createFile(arrayToString($logs), $name);

        // If we have $log_items and we keep them add them to a file
        if ($count > $log_items && $keep_files) {
            $filename = $directory . '/' . $name . '.' . $suffix;
            createFile(arrayToString($logs), $filename);

            $logs = [];
            $suffix = $suffix + 1;
        }
    }
}