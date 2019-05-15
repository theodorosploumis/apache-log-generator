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
 * @param bool $keep_files
 */
function generateLogsByDates($from_date, $offset = 3600, $items_by_file = 10000) {
  $loops = $from_date + $offset;
  $suffix = 0;

  if ($offset < $items_by_file) {
    $logs = generateLogs($i, $offset);
    generateLogFile($logs);
  } else {
    for ($i = $from_date; $i <= $loops; $i++) {
      $suffix++;

      $logs = generateLogs($i, $items_by_file);
      generateLogFile($logs, $suffix);

      $i = $i + $items_by_file;
    }
  }
}
