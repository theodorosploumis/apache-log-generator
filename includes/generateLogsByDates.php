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
function generateLogsByDates($from_date = 0, $dates_offset = 86400, $items_by_file = 10000, $export = 'file', $log_format = 'common') {
  $loops = $from_date + $dates_offset;
  $files = round($dates_offset/$items_by_file, 0, PHP_ROUND_HALF_UP);
  $suffix = 1;

  for ($i = 0; $i <= $files; $i++) {

    $results = generateLogs($i + $from_date, $items_by_file, $export, $log_format);
    $logs = $results['text'];
    $rows = $results['rows'];

    generateLogFile($logs, $suffix);

    $from_date = $from_date + $rows;
    $suffix++;
  }
}
