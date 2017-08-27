#!/bin/bash

wget http://pecl.php.net/get/mongo-1.2.10.tgz
tar -xzf mongo-1.2.10.tgz

sudo apt-add-repository ppa:ondrej/php -y
sudo apt-get update

sudo apt-get install php7.0-dev -y

sudo apt-get install php-pear -y

sudo apt-get install php-mongodb -y
sudo pecl install mongodb -y
