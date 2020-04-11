FROM ubuntu:18.04

RUN apt-get update

RUN apt-get install -y nginx php7.2-fpm php7.2-cli php7.2-common php7.2-json
RUN apt-get install -y php7.2-opcache php7.2-mysql php7.2-sqlite php7.2-phpdbg php7.2-mbstring php7.2-gd
RUN apt-get install -y php7.2-imap php7.2-ldap php7.2-pgsql php7.2-pspell php7.2-recode
RUN apt-get install -y php7.2-snmp php7.2-tidy php7.2-dev php7.2-intl php7.2-gd php7.2-curl
RUN apt-get install -y php7.2-zip php7.2-xml
RUN apt-get install -y libssl-dev libcurl4-openssl-dev pkg-config libssl-dev
RUN apt-get install -y git
RUN apt-get install php-mongodb
RUN pecl install mongodb
RUN apt-get install snmp

ENV nginx_vhost /etc/nginx/sites-available/default
ENV php_conf /etc/php/7.2/fpm/php.ini
ENV nginx_conf /etc/nginx/nginx.conf

COPY default ${nginx_vhost}

RUN sed -i -e 's/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/g' ${php_conf} && \
    echo "\ndaemon off;" >> ${nginx_conf}

RUN sed -i -e 's/display_errors = Off/display_errors = On/g' ${php_conf}

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
