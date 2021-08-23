#!/bin/bash
#variables

ip_txt_path=/ipdata/txt/china_ip.txt;
ip_url='http://ftp.apnic.net/apnic/stats/apnic/delegated-apnic-latest';
//php_path=/usr/bin/php7.1
//script_path=/home/vagrant/Code/yiduoli_web/isipinchina-master/putip2redis.php
php_path=/usr/bin/php
script_path=/www/wwwroot/www.yiduoli.com/isipinchina-master/putip2redis.php

#mv old txt

cur_time=$(date +"%Y%m%d%H%M%S");
if [ -f ${ip_txt_path} ];then
       mv ${ip_txt_path} ${ip_txt_path}_${cur_time};
fi

#download

/usr/bin/curl ${ip_url} | grep ipv4 | grep CN | awk -F\| '{ printf("%s/%d\n", $4, 32-log($5)/log(2)) }' >${ip_txt_path}

#parse 2 redis

echo "begin parse ip\n";
${php_path} ${script_path}
