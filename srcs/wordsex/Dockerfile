FROM	alpine:3.12

#running base installations
RUN		apk update && apk upgrade
RUN		apk add nginx supervisor php7 php7-fpm php7-json php7-mysqli openrc
RUN		rc-update add php-fpm7 default

#dowloading and setuping wordpress packages
RUN		wget https://wordpress.org/latest.tar.gz
RUN		tar -xf latest.tar.gz
RUN		rm -rf latest.tar.gz
RUN		mv wordpress /var/www/wordpress

#coping srcs files
COPY	/srcs/supervisord.conf /etc/supervisord.conf
COPY	/srcs/default.conf /etc/nginx/conf.d/default.conf
COPY	/srcs/wp-config.php /var/www/wordpress/

#adding user for nginx
RUN		adduser -D -g 'www' www
RUN		mkdir /www
RUN		chown -R www:www /var/lib/nginx
RUN		chown -R www:www /www

#making working dirs
RUN		mkdir -p /run/nginx
RUN		mkdir -p /var/run/php

EXPOSE	5050

CMD		["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]