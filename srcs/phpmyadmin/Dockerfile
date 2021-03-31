FROM	alpine:3.12

#running base installations
RUN		apk add openrc openssl supervisor nginx php7 php7-fpm php7-iconv \
		php7-json php7-mbstring php7-mysqli php7-phar php7-session php7-xml
RUN		rc-update add php-fpm7 default

#dowloading and setuping myadmin packages
RUN		wget https://www.phpmyadmin.net/downloads/phpMyAdmin-latest-english.tar.xz
RUN		mkdir -p /var/www/phpmyadmin /var/www/phpmyadmin/tmp
RUN		tar -xvf phpMyAdmin-latest-english.tar.xz --strip-components 1 -C /var/www/phpmyadmin
RUN		rm -f phpMyAdmin-latest-english.tar.xz
RUN		chmod 777 /var/www/phpmyadmin/tmp

#coping srcs files
COPY	/srcs/supervisord.conf /etc/supervisord.conf
COPY	/srcs/config.inc.php /var/www/phpmyadmin/
COPY	/srcs/default.conf /etc/nginx/conf.d/default.conf

#creating working dirs
RUN		mkdir /run/nginx
RUN		mkdir /var/run/php

#add user for nginx
RUN		adduser -D -g 'www' www
RUN		mkdir /www
RUN		chown -R www:www /var/lib/nginx
RUN		chown -R www:www /www

EXPOSE	5000
CMD		["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]