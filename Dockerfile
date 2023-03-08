FROM webdevops/php-apache:7.3

WORKDIR /app

COPY ./ /app

COPY ./cronphp /etc/cron.d/cronphp

RUN apt update && apt install default-mysql-client -y && docker-service-enable cron
