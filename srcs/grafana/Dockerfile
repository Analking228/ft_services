FROM		alpine:3.12

RUN			apk add ca-certificates

#downloading and installing additional lib
RUN			wget -q -O /etc/apk/keys/sgerrand.rsa.pub \
			https://alpine-pkgs.sgerrand.com/sgerrand.rsa.pub \
			&& wget https://github.com/sgerrand/alpine-pkg-glibc/releases/download/2.28-r0/glibc-2.28-r0.apk \
			&& apk add glibc-2.28-r0.apk

#downloading adn installing grafana
RUN			wget https://dl.grafana.com/oss/release/grafana-7.1.5.linux-amd64.tar.gz \
			&& tar -zxvf grafana-7.1.5.linux-amd64.tar.gz \
			&& rm -rf grafana-7.1.5.linux-amd64.tar.gz \
			&& mv /grafana-7.1.5 /grafana

#copying grafana database files with settings and dashboards
COPY		./srcs/grafana.db /grafana/data/

EXPOSE		3000
WORKDIR		/grafana/bin/
ENTRYPOINT	./grafana-server