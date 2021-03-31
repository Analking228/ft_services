FROM alpine:3.12

RUN apk --no-cache update && apk upgrade 
RUN apk add --no-cache vim bash wget gnupg openrc \
ca-certificates supervisor

# alpine-pkg-glibc
RUN wget -q -O /etc/apk/keys/sgerrand.rsa.pub https://alpine-pkgs.sgerrand.com/sgerrand.rsa.pub
RUN wget https://github.com/sgerrand/alpine-pkg-glibc/releases/download/2.28-r0/glibc-2.28-r0.apk
RUN apk add glibc-2.28-r0.apk

# download influxdb
RUN wget https://dl.influxdata.com/influxdb/releases/influxdb-1.8.4-static_linux_amd64.tar.gz
RUN tar xvfz influxdb-1.8.4-static_linux_amd64.tar.gz

# download telegraf
RUN wget https://dl.influxdata.com/telegraf/releases/telegraf-1.17.3_linux_amd64.tar.gz
RUN tar xf telegraf-1.17.3_linux_amd64.tar.gz

# making dir for supervisor, copy config for supervisor
RUN mkdir /etc/supervisor.d
COPY srcs/supervisor.ini /etc/supervisor.d/

# mkdir for influxdb, replace downloaded influxdb and remove archive
RUN mkdir /var/lib/influxdb
RUN mv /influxdb-1.8.4-1 /etc/influxdb
RUN rm -rf influxdb-1.8.4-static_linux_amd64.tar.gz

# move telegraf and remove archive for telegraf
RUN cp -r /telegraf-1.17.3/* /
RUN rm -rf /telegraf-1.17.3/ telegraf-1.17.3_linux_amd64.tar.gz

#создание конфига для получения 
# метрик дисковой системы с помещением данных в InfluxDB
RUN ./usr/bin/telegraf -sample-config --input-filter docker \
--output-filter influxdb > /etc/telegraf/telegraf.conf

VOLUME /var/lib/influxdb
ENTRYPOINT /usr/bin/supervisord