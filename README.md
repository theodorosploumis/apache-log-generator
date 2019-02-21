# Apache2 access log generator
A simple php file that can generate fake apache2 access log files.

### Usage
You can add your own `settings.php`.

```
// Generate log files (see generateLogFiles.php example)
php -f generateLogFiles.php
```
This will generate by default 10 log files of 10,000 rows each (~1.1MB) 
on folder 'logs' as also as the equivalent .gz files.

### Log formats

See [apache2 mod_log_config](http://httpd.apache.org/docs/current/mod/mod_log_config.html) for more details.

```
LogFormat "%v:%p %h %l %u %t \"%r\" %>s %O \"%{Referer}i\" \"%{User-Agent}i\"" vhost_combined
LogFormat "%h %l %u %t \"%r\" %>s %O \"%{Referer}i\" \"%{User-Agent}i\"" combined
LogFormat "%h %l %u %t \"%r\" %>s %O" common
LogFormat "%{Referer}i -> %U" referer
LogFormat "%{User-agent}i" agent
```

### Visualize logs examples
A) [request-log-analyzer](https://github.com/wvanbergen/request-log-analyzer) 
 
```
request-log-analyzer --apache-format combined logs/combined-generated-logs.log.1
```

B) [goaccess](https://goaccess.io)

```
goaccess goaccess --log-format=COMBINED -o myreport.html --real-time-html -f logs/combined-generated-logs.log.1
```

### License
[MIT](LICENSE) 2019
