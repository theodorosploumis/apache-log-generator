<?php

include_once __DIR__ . '/generateLogs.php';

/**
 * @param string $logs
 * @param string $suffix
 * @param string $directory
 * @param string $name
 * @param bool $gz
 * @param bool $unlink
 */
function generateLogFile($logs, $suffix, $directory = 'logs', $name = 'website-access.log', $gz = false, $unlink = false) {
  if(!is_dir($directory)){
    mkdir($directory, 0755, true);
  }
  $filename = $directory . '/' . $name . '.' . $suffix;
  createFile($logs, $filename, $gz, $unlink);
}
