<?php

include_once 'settings.php';
include_once 'includes/apacheLogGenerator.inc';

//$time_format = 'Y-m-d\TH:i:s';
//global $time_format;

// Generate gz log files
generateLogFiles('10000', '1', 'logs', 'website-combined-access.log', 'combined', false, false);
generateLogFiles('10000', '1', 'logs', 'website-common-access.log', 'common', false, false);
