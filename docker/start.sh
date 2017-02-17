#!/bin/sh

/usr/bin/mongod && /etc/init.d/mongodb start & /etc/init.d/php7.0-fpm start

/etc/init.d/nginx start