FROM	alpine:3.12

RUN		apk add mysql mysql-client vim openrc

COPY	srcs/start.sh ./
COPY	srcs/wordpress.sql ./
COPY	srcs/my.cnf ./etc/mysql/

VOLUME	["/var/lib"]

EXPOSE	3306

RUN		chmod 777 ./start.sh

ENTRYPOINT ./start.sh