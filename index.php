<?php

include_once __DIR__ . '/includes/generateLogFile.php';
include_once __DIR__ . '/includes/generateRealTimeLogs.php';
include_once __DIR__ . '/includes/generateLogsBySize.php';
include_once __DIR__ . '/includes/generateLogsByDates.php';

// Generate 10 log files with maximum 10000 rows per file starting from now
// php -r 'require "index.php"; generateLogsBySize(0, 10, 1000);'

// Generate date limited files
// php -r "require 'index.php'; generateLogsByDates(1558134000, 86400, 10000, 'logs', 'website-access.log', true, 'common');"
// php -r "require 'index.php'; generateLogsByDates(1558134000, 86400, 10000);"
