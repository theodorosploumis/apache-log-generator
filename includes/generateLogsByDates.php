<?php

include_once __DIR__ . '/generateLogs.php';
include_once __DIR__ . '/generateLogFile.php';

/**
 * @param int $from_date // Unix timestamp
 * @param int $offset // seconds
 * @param int $items_by_file
 * @param string $directory
 * @param string $name
 * @param string $log_format
 */
function generateLogsByDates($from_date = 0, $dates_offset = 86400, $items_by_file = 10000) {
  $loops = $from_date + $dates_offset;
  $suffix = 1;

  for ($i = $from_date; $i <= $loops; $items_by_file) {

    $results = generateLogs($i, $items_by_file);
    $logs = $results['text'];
    $rows = $results['rows'];

    generateLogFile($logs, $suffix);

    $i = $i + $rows;
    $suffix++;
  }
}
