<?php

include_once __DIR__ . '/helpers.inc';
include_once __DIR__ . '/createLogRow.php';

/**
 * @param int $items
 * @param string $export
 * @param string $log_format
 * @return array
 */
function generateLogs($from_date = 0, $items = 1, $export = 'file', $log_format = 'common') {
    $results = [];
    $logs = "";
    $separator = "\r\n";

    // Export for html
    if ($export != 'file') {
        $separator = '<br />';
    }

    for ($i = 0; $i < $items; $i++) {
      $settings['ip'] = getRandomWeightedElement($GLOBALS['request_ips']);
      $settings['port'] = getRandomWeightedElement($GLOBALS['request_ports']);
      $settings['user'] = getRandomWeightedElement($GLOBALS['request_users']);
      $settings['path'] = getRandomWeightedElement($GLOBALS['request_paths']);
      $settings['attack'] = getRandomWeightedElement($GLOBALS['attack_suffix']);
      $settings['verb'] = getRandomWeightedElement($GLOBALS['request_http_verbs']);
      $settings['status'] = getRandomWeightedElement($GLOBALS['request_http_status']);
      $settings['date'] = generateTimestampWithOffset($from_date, $i, $GLOBALS['time_format'], $GLOBALS['time_zone']);
      $settings['version'] = getRandomWeightedElement($GLOBALS['request_http_version']);
      $settings['referrer'] = getRandomWeightedElement($GLOBALS['request_paths']);
      $settings['agent'] = getRandomWeightedElement($GLOBALS['request_agents']);
      $settings['repeater'] = getRandomWeightedElement($GLOBALS['repeater']);

      for ($x = 1; $x <= $settings['repeater']; $x++) {
        $logs = $logs . createLogRow($settings, $log_format) . $separator;
      }

      $i += $settings['repeater'] - 1;
      $results['rows'] = $i;
    }

    $results['text'] = $logs;

    return $results;
}
