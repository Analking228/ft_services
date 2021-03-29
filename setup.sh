#!bin/sh

export MINIKUBE_HOME=/Users/cjani/goinfre
minikube start --vm-driver=virtualbox
eval $(minikube docker-env)
minikube addons enable metallb

# docker
docker build -t nginx_image ./srcs/nginx/
docker build -t wordpress_image ./srcs/wordpress/
docker build -t mysql_image ./srcs/mysql/
docker build -t phpmyadmin_image ./srcs/phpmyadmin/
#docker build -t ftps_image ./srcs/ftps/
#docker build -t influx_image ./srcs/influx/
#docker build -t grafana_image ./srcs/grafana/


kubectl apply -k ./srcs/
#kubectl apply -f ./srcs/ftps/ftps.yaml
#kubectl apply -f ./srcs/phpmyadmin/phpmyadmin.yaml
#kubectl apply -f ./srcs/wordpress/wordpress.yaml
#kubectl apply -f ./srcs/influx/influx.yaml
#kubectl apply -f ./srcs/grafana/grafana.yaml

minikube dashboard
