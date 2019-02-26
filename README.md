# Apache2 access log generator
A simple php file that can generate fake apache2 access log files.

### Usage
You can add your own `settings.php`.

```
git clone git@github.com:theodorosploumis/apache-log-generator.git
cd apache-log-generator

// Generate log files (see generateLogFiles.php example)
php -f generateLogFiles.php
```
This will generate by default 10 log files of 10,000 rows each (~1.1MB) 
on folder 'logs' as also as the equivalent .gz files.

---

### Log formats

See [apache2 mod_log_config](http://httpd.apache.org/docs/current/mod/mod_log_config.html) for more details.

```
LogFormat "%v:%p %h %l %u %t \"%r\" %>s %O \"%{Referer}i\" \"%{User-Agent}i\"" vhost_combined
LogFormat "%h %l %u %t \"%r\" %>s %O \"%{Referer}i\" \"%{User-Agent}i\"" combined
LogFormat "%h %l %u %t \"%r\" %>s %O" common
LogFormat "%{Referer}i -> %U" referer
LogFormat "%{User-agent}i" agent
```

---

### Log analyzers for security problems

- [scalp](https://github.com/BalloonPlanet/apache-scalp)
```
python scalp/scalp.py -l logs/combined-generated-logs.log.1 --html --output ~/scalp/export
```

- [lorg](https://github.com/jensvoid/lorg)
```
./lorg -d phpids -i combined logs/combined-generated-logs.log.1
```

- [ryanermita/apache-logs-analyzer](https://github.com/ryanermita/apache-logs-analyzer)
```
python src/parse_logs.py -c get_sql_injections -F logs/combined-access.log
```

- [logswan](https://www.logswan.org/)
```
logswan -g logs/combined-access.log
```

- [matsuu/kataribe](https://github.com/matsuu/kataribe)
```
cat logs/combined-access.log | ./kataribe
```

- [retep007/webserver-log](https://github.com/retep007/webserver-log)
```
# Example of one file apache logs at webserver_log.conf settings file

---
reporting:
  - Std:
      verbose: false
xss_level: Intelligent
services:
  - Apache:
      path: logs/combined-generated-logs.log.1

```

```
// Add your settings at secutity-log.yaml
./webserver_log -c webserver_log.conf
```

- [nekhbet/WebForensik](https://github.com/nekhbet/WebForensik)
```
// For a more current version please check "lorg" tool above
./webforensik.php -o html -i combined logs/combined-generated-logs.log.1
```

- [flrnull/http-logs-analyzer](https://github.com/flrnull/http-logs-analyzer)
```
http-logs-analyzer -f logs/combined-generated-logs.log.1
```

- [kzon/http-access-log-parser](https://github.com/kzon/http-access-log-parser)
```
php parser.php logs/combined-generated-logs.log.1
```

- [pinguinens/AnalyzeMyAccessLog](https://github.com/pinguinens/AnalyzeMyAccessLog)
```
php parser.php logs/combined-generated-logs.log.1
```

- [LagrangianPoint/Apache-Access-Log-Analyzer](https://github.com/LagrangianPoint/Apache-Access-Log-Analyzer)
```
python access-log-analizer.py
```

- [EventLogAnalyzer](https://www.manageengine.com/products/eventlog/)

---

### Visualize logs examples
- [request-log-analyzer](https://github.com/wvanbergen/request-log-analyzer) 
```
request-log-analyzer --apache-format combined logs/combined-generated-logs.log.1
```

- [goaccess](https://goaccess.io)
```
goaccess --log-format=COMBINED -o myreport.html \
         --real-time-html -f logs/combined-generated-logs.log.1
```

- [antirez/visitors](https://github.com/antirez/visitors)
```
// See examples at http://www.hping.org/visitors
./visitors -f myreport.html logs/combined-generated-logs.log.1
```

- [cavo789/apache_logreader](https://github.com/cavo789/apache_logreader)

- [kbence/logan](https://github.com/kbence/logan)
```
logan 
```

- [webalizer](http://www.webalizer.org)
```
webalizer -c clf logs/combined-generated-logs.log.1
```

- [https://github.com/pbek/loganalyzer](https://github.com/pbek/loganalyzer)

- [rory/apache-log-parser](https://github.com/rory/apache-log-parser)


---

### License
[MIT](LICENSE) 2019
