FROM alpine:3.12

RUN apk update && apk add vsftpd openssl openrc

RUN		mkdir -p /var/log/ftp && touch /var/log/ftp/xferlog

RUN		openssl req -x509 -nodes -days 365 -newkey rsa:1024 \
		-keyout /etc/vsftpd/secure.pem -out /etc/vsftpd/secure.pem \
		-subj "/C=RU/ST=MosReg/L=Mitishchi/O=MyHata/OU=cjani/CN=ft_sever/"

RUN     echo 'root:root' | chpasswd
COPY    ./srcs/vsftpd.conf /etc/vsftpd/vsftpd.conf
RUN     rc default
EXPOSE	21

ENTRYPOINT	vsftpd /etc/vsftpd/vsftpd.conf