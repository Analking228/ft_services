FROM		alpine:3.12

#running base installations
RUN			apk add mysql mysql-client openrc

#copying src files
COPY		srcs/start.sh ./
COPY		srcs/wordpress.sql ./
COPY		srcs/my.cnf ./etc/mysql/

#setting volume dirs
VOLUME		["/var/lib"]
VOLUME		["sys/fs/cgroup"]

#endians
EXPOSE		3306
ENTRYPOINT	./start.sh