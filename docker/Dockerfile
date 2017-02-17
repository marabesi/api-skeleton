FROM ubuntu:16.04

RUN apt-get update

RUN apt-get install -y nginx php7.0-fpm php7.0-cli php7.0-common php7.0-json
RUN apt-get install -y php7.0-opcache php7.0-mysql php7.0-sqlite php7.0-phpdbg php7.0-mbstring php7.0-gd
RUN apt-get install -y php7.0-imap php7.0-ldap php7.0-pgsql php7.0-pspell php7.0-recode
RUN apt-get install -y php7.0-snmp php7.0-tidy php7.0-dev php7.0-intl php7.0-gd php7.0-curl
RUN apt-get install -y php7.0-zip php7.0-xml
RUN apt-get install -y libssl-dev libcurl4-openssl-dev pkg-config libssl-dev libsslcommon2-dev
RUN apt-get install -y mongodb git
RUN apt-get install php-mongodb
RUN pecl install mongodb

ENV nginx_vhost /etc/nginx/sites-available/default
ENV php_conf /etc/php/7.0/fpm/php.ini
ENV nginx_conf /etc/nginx/nginx.conf
ENV mongodb_conf /etc/mongodb.conf

COPY default ${nginx_vhost}

RUN sed -i -e 's/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/g' ${php_conf} && \
    echo "\ndaemon off;" >> ${nginx_conf}

RUN sed -i -e 's/display_errors = Off/display_errors = On/g' ${php_conf}

RUN sed -i -e 's/bind_ip = 127.0.0.1/bind_ip = 0.0.0.0/g' ${mongodb_conf}

RUN sed -i -e 's/#port = 27017/port = 27017/g' ${mongodb_conf}

RUN mkdir -p /run/php && \
    mkdir -p /var/www/html && \
    chown -R www-data:www-data /var/www/html && \
    chown -R www-data:www-data /run/php && \
    mkdir -p /data/db && \
    chown `id -u` /data/db

VOLUME ["/etc/nginx/sites-enabled", "/etc/nginx/certs", "/etc/nginx/conf.d", "/var/log/nginx", "/var/www/html"]

COPY start.sh /start.sh

RUN chmod +x /start.sh

CMD ["./start.sh"]

EXPOSE 80 443 27017
