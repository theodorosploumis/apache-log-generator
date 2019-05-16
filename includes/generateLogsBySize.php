<?php

include_once __DIR__ . '/generateLogs.php';
include_once __DIR__ . '/generateLogFile.php';

/**
 * @param int $file_number
 * @param int $items_by_file
 */
function generateLogsBySize($from_date = 0, $file_number = 10, $items_by_file = 100) {
  $suffix = 1;
  $loops = $items_by_file * $file_number;

  if ($from_date == 0) {
    $from_date = time();
  }

  for ($i = 1; $i < $loops; $i++) {
    $log = generateLogs($i + $from_date, $items_by_file);
    generateLogFile($log['text'], $suffix);

    $i = $i + $items_by_file;
    $suffix = $suffix + 1;
  }
}
