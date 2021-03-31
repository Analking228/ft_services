FROM		alpine:3.12

#running base instalations
RUN			apk update && apk add vsftpd openssl openrc

#FTPS log dir
RUN			mkdir -p /var/log/ftp && touch /var/log/ftp/xferlog

#private certs
RUN			openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
			-keyout /etc/vsftpd/secure.pem -out /etc/vsftpd/secure.pem \
			-subj "/C=RU/ST=MosReg/L=Mitishchi/O=MyHata/OU=cjani/CN=ft_services/"

#/root dir user
RUN			echo 'root:root' | chpasswd

#setuping conf
COPY		./srcs/vsftpd.conf /etc/vsftpd/vsftpd.conf

#endians
RUN			rc default
EXPOSE		21

ENTRYPOINT	vsftpd /etc/vsftpd/vsftpd.conf