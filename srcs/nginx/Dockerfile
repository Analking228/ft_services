FROM	alpine:3.12

#running base installations
RUN		apk update && apk upgrade
RUN		apk add nginx sudo openssl openssh supervisor openrc

#copying my files to srcs
COPY	/srcs/default.conf /etc/nginx/conf.d/default.conf
COPY	/srcs/supervisord.conf /etc/supervisord.conf
COPY	/srcs/index.html /var/www/index.html

#making private SSL protocols
RUN		openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
		-keyout /etc/ssl/private/secure.key -out /etc/ssl/certs/secure.crt \
		-subj "/C=RU/ST=MosReg/L=Mitishchi/O=MyHata/OU=cjani/CN=ft_services/"

#adding user fot nginx
RUN		adduser -D -g 'www' www
RUN		mkdir /www
RUN		chown -R www:www /var/lib/nginx
RUN		chown -R www:www /www

#create user for ssh
RUN		mkdir -p /etc/sudoers.d
RUN		touch /etc/sudoers.d/wheel
RUN		adduser -D cjani \
		&& echo 'cjani:cjani' | chpasswd \
		&& addgroup cjani wheel \
		&& echo '%wheel ALL=(ALL) ALL' > /etc/sudoers.d/wheel \
		&& /usr/bin/ssh-keygen -A

#nginx working dir
RUN		mkdir -p /run/nginx

EXPOSE	80 443
CMD		["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
