<?php

include_once __DIR__ . '/includes/generateLogFile.php';
include_once __DIR__ . '/includes/generateRealTimeLogs.php';
include_once __DIR__ . '/includes/generateLogsByDates.php';

// Generate gz log files
// generateLogFiles('10000', '1', 'logs', 'common1.log', 'common', true, false);

// Generate date limited files
// generateLogsByDates(1558137601, 86400, 10000, 'logs', 'website-access.log', true, 'common');
// generateLogsByDates(1558137601, 86400, 10000);
