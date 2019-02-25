<?php

include_once 'settings.php';
include_once 'includes/apacheLogGenerator.inc';

//$time_format = 'Y-m-d\TH:i:s';
//global $time_format;

// Generate gz log files
generateLogFiles('10000', '1', 'logs', 'combined1.log', 'combined', true, false);
generateLogFiles('10000', '1', 'logs', 'common1.log', 'common', true, false);
