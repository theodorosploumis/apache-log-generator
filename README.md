# Apache2 access log generator
A simple php file that can generate fake apache2 access log files.

### Usage
You can add your own `settings.php`.

```
// Generate gz log files
php -f generateLogFile.php
```
This will generate by default 10 log files of 10,000 rows each (~1.1MB) 
on folder 'logs' as also as the equivalent .gz files.


### License
[MIT](LICENSE) 2019
