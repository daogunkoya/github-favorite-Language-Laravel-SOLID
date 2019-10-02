FROM alpine:3.9

MAINTAINER Latheesan Kanesamoorthy <latheesan.kanesamoorthy@mvfglobal.com>

RUN apk add \
        --no-cache \
        --update \
        apache2 \
        composer \
        nano \
        bash \
        curl \
        php7 \
        php7-apache2 \
        php7-curl \
        php7-dom \
        php7-mbstring \
        php7-pdo_mysql \
        php7-session \
        php7-sockets \
        php7-tokenizer \
        php7-xml \
        php7-xmlwriter \
        php7-fileinfo \
        php7-ctype \
        php7-gd \
        php7-simplexml \
        php7-xmlreader \
        php7-zip \
    && mkdir -p /run/apache2 \
    && ln -sf /dev/stdout /var/log/apache2/access.log \
    && ln -sf /dev/stderr /var/log/apache2/error.log

WORKDIR /app

COPY ./src/composer.* ./
COPY ./docker/apache2.conf /etc/apache2/conf.d/apache2.conf
COPY ./docker/php.ini /etc/php7/conf.d/99_custom.ini
COPY ./docker/web.sh /run/web.sh

RUN composer global require hirak/prestissimo && \
    composer install -n --no-autoloader --no-scripts --no-progress --no-suggest && \
    chmod 755 /run/web.sh

COPY src .
COPY .git/HEAD /GIT_BRANCH_INFO

RUN composer dump-autoload -o -n && \
    chown -R apache:apache /app/storage

EXPOSE 80
