<?php

include_once __DIR__ . '/generateLogs.php';

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
