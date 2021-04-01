FROM		alpine:3.7

#running base instalations
RUN			apk update && apk add vsftpd openssl openrc

#FTPS log dir
RUN			mkdir -p /var/log/ftp && touch /var/log/ftp/xferlog

#private certs
RUN			openssl req -x509 -nodes -days 365 -newkey rsa:1024 \
			-keyout /etc/vsftpd/secure.key -out /etc/vsftpd/secure.crt \
			-subj "/C=RU/ST=MosReg/L=Mitishchi/O=MyHata/OU=cjani/CN=ft_services/"

#/root dir user
RUN			echo 'root:root' | chpasswd
RUN			chown -R root:root /root
RUN			chmod -R 777 root

#setuping conf
COPY		./srcs/vsftpd.conf /etc/vsftpd/vsftpd.conf
COPY		./srcs/start.sh /start.sh

#endians
RUN			rc default
VOLUME		/root
EXPOSE		21 10100

CMD sh /start.sh