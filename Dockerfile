FROM	alpine:3.12

RUN     apk update && apk upgrade
RUN     apk add nginx openssl openssh supervisor

COPY    ./srcs/nginx-localhost /etc/nginx/conf.d/default.conf
COPY	./srcs/supervisor.conf /etc/supervisord.conf

RUN		openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
		-keyout /etc/ssl/private/secure.key -out /etc/ssl/certs/secure.crt \
		-subj "/C=RU/ST=MosReg/L=Mitishchi/O=MyHata/OU=cjani/CN=ft_sever/"

COPY    ./srcs/start_server.sh /tmp/
RUN     chmod +x /tmp/start_server.sh
RUN		mkdir -p /run/nginx
EXPOSE  80 443
CMD     ["/tmp/start_server.sh"]