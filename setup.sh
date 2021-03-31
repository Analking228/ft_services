#!bin/sh

 #changing env and starting the Kube
export MINIKUBE_HOME=/Users/cjani/goinfre
minikube start --vm-driver=virtualbox || exit 1
eval $(minikube docker-env)
minikube addons enable metallb

# docker
docker build -t nginx_image ./srcs/nginx/
docker build -t wordpress_image ./srcs/wordpress/
docker build -t mysql_image ./srcs/mysql/
docker build -t phpmyadmin_image ./srcs/phpmyadmin/
docker build -t ftps_image ./srcs/ftps/
docker build -t influx_image ./srcs/influx/
docker build -t grafana_image ./srcs/grafana/

#applying yaml files
kubectl apply -k ./srcs/

#setuping a dashboard
minikube dashboard
