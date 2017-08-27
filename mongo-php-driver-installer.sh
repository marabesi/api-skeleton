#!/bin/bash

wget http://pecl.php.net/get/mongo-1.2.10.tgz
tar -xzf mongo-1.2.10.tgz

sudo apt-add-repository ppa:ondrej/php -y
sudo apt-get update

sudo apt-get install php7.0-dev -y
sudo apt-get install -y nginx php7.0-fpm php7.0-cli php7.0-common php7.0-json
sudo apt-get install -y php7.0-opcache php7.0-mysql php7.0-sqlite php7.0-phpdbg php7.0-mbstring php7.0-gd
sudo apt-get install -y php7.0-imap php7.0-ldap php7.0-pgsql php7.0-pspell php7.0-recode
sudo apt-get install -y php7.0-snmp php7.0-tidy php7.0-dev php7.0-intl php7.0-gd php7.0-curl
sudo apt-get install -y php7.0-zip php7.0-xml
sudo apt-get install -y libssl-dev libcurl4-openssl-dev pkg-config libssl-dev libsslcommon2-dev

sudo apt-get install php-mongodb -y
sudo pecl install mongodb -y

echo "extension=mongo.so" >> `php --ini | grep "Loaded Configuration" | sed -e "s|.*:\s*||"`
