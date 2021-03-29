FROM	alpine:3.12

#running base installations
RUN		apk update && apk upgrade
RUN		apk add vim nginx php7-common php7-iconv php7-json php7-gd php7-curl php7-xml \
		php7-mysqli php7-imap php7-cgi fcgi php7-pdo php7-pdo_mysql php7-soap php7-xmlrpc \
		php7-posix php7-mcrypt php7-gettext php7-ldap php7-ctype php7-dom bash nginx openrc \
		php-fpm openssl supervisor php7-session

#dowloading and setuping myadmin packages
RUN		wget http://files.directadmin.com/services/all/phpMyAdmin/phpMyAdmin-5.0.2-all-languages.tar.gz
RUN		tar zxvf phpMyAdmin-5.0.2-all-languages.tar.gz
RUN		rm phpMyAdmin-5.0.2-all-languages.tar.gz
RUN		mv phpMyAdmin-5.0.2-all-languages /var/www/phpmyadmin
RUN		chmod -R 777 /var/www/phpmyadmin

#coping srcs files
COPY	/srcs/supervisord.conf /etc/supervisord.conf
COPY	/srcs/config.inc.php /var/www/phpmyadmin/
COPY	/srcs/php-localhost /etc/nginx/conf.d/

#creating nginx working directories
RUN		mkdir /run/nginx
RUN		mkdir /var/run/php

#add user for nginx
RUN		adduser -D -g 'www' www
RUN		mkdir /www
RUN		chown -R www:www /var/lib/nginx
RUN		chown -R www:www /www

EXPOSE	5000
CMD		["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]