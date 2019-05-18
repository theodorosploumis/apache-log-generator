<?php

include_once __DIR__ . '/includes/generateLogFile.php';
include_once __DIR__ . '/includes/generateRealTimeLogs.php';
include_once __DIR__ . '/includes/generateLogsByDates.php';

// Generate date limited files
// php -r "require 'index.php'; generateLogsByDates(1558134000, 86400, 10000, 'logs', 'website-access.log', true, 'common');"
// php -r "require 'index.php'; generateLogsByDates(1558134000, 86400, 10000);"
