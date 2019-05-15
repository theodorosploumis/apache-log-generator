<?php

include_once __DIR__ . '/helpers.inc';

/**
 * @param $settings
 * @param string $log_format // common, combined, custom
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
