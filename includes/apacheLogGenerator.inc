<?php

include_once 'includes/helpers.inc';

/**
 * @param $settings
 * @param string $log_format
 * @return string
 */
function createLogRow($settings, $log_format = 'common') {
    $ip = $settings['ip'];
    $port = $settings['port'];
    $user = $settings['user'];
    $path = $settings['path'];
    $attack = $settings['attack'];
    $verb = $settings['verb'];
    $status = $settings['status'];
    $date = $settings['date'];
    $http = $settings['version'];
    $referrer = $settings['referrer'];
    $agent = $settings['agent'];
    $blob = rand(1, 90000);

    $log = "";

    switch ($log_format) {
        case 'common':
            $user = "-";
            $log = $ip ." - ". $user ." [". $date ." +0200] ". "\"" . $verb ." ". $path.$attack . " " .$http. "\" " . $status ." ". $blob;
            break;
        case 'combined':
            $user = "-";
            $log = $ip ." - ". $user ." [". $date ." +0200] ". "\"" . $verb ." ". $path.$attack . " " .$http. "\" " . $status ." ". $blob ." \"". $referrer ."\" \"" . $agent ."\"";
            break;
        case 'custom':
            $log = $date ." ". $user ." ". $ip ." \"". $verb ." ". $port ." ". $path.$attack . " " .$http. "\" " . $status ." ". $blob;
            break;
    }

    return $log;
}

/**
 * @param int $items
 * @param string $export
 * @param string $log_format
 * @return string
 */
function generateLogs($items = 1, $export = 'file', $log_format = 'common') {
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
        $settings['date'] = generateTimestamp($i, $GLOBALS['time_format'], $GLOBALS['time_zone']);
        $settings['version'] = getRandomWeightedElement($GLOBALS['request_http_version']);
        $settings['referrer'] = getRandomWeightedElement($GLOBALS['request_paths']);
        $settings['agent'] = getRandomWeightedElement($GLOBALS['request_agents']);

        $logs = $logs . createLogRow($settings, $log_format) . $separator;
    }

    return $logs;
}

/**
 * @param int $log_items
 * @param int $files_number
 * @param string $directory
 * @param string $name
 * @param string $log_format
 * @param bool $gz
 * @param bool $unlink
 */
function generateLogFiles($log_items = 10000, $files_number = 10, $directory = 'logs', $name = 'website-access.log', $log_format = 'common', $gz = false, $unlink = false) {
    if(!is_dir($directory)){
        mkdir($directory, 0755, true);
    }

    for ($i = 1; $i <= $files_number; $i++) {
        $logs = generateLogs($log_items, 'file', $log_format);
        $filename = $directory . '/' . $name . '.' . $i;

        createFile($logs, $filename, $gz, $unlink);
    }
}

/**
 * @param int $sleep
 * @param int $log_items
 * @param string $directory
 * @param string $name
 * @param string $log_format
 * @param bool $keep_files
 */
function generateRealTimeLogs($sleep = 1, $log_items = 500, $directory = 'logs', $name = 'website-access.log', $keep_files = true, $log_format = 'common') {
    if(!is_dir($directory)){
        mkdir($directory, 0755, true);
    }
    
    $logs = [];
    $suffix = 1;

    // Command to run every 1 seconds
    for ($i = 0; true; $i++) {
        sleep($sleep);
        $log = generateLogs(1, 'file', $log_format);

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