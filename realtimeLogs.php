<?php

include_once 'settings.php';
include_once 'includes/apacheLogGenerator.inc';

// Generate log entries in real time
header("Content-type: text/plain");

generateRealTimeLogs($sleep = 1, $log_items = 10000, $directory = 'logs', $name = 'website-access.log', $keep_files = false);
