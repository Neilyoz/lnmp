FROM php:7.4-fpm-alpine3.11

# 创建时区连接
ENV TimeZone=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TimeZone /etc/localtime && echo $TimeZone > /etc/timezone

# /usr/local/etc/php

# 修改源
RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.aliyun.com/g' /etc/apk/repositories

RUN apk update
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install pdo_mysql
RUN apk add --no-cache freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev && \
    docker-php-ext-configure gd --with-jpeg --with-freetype &&\
    docker-php-ext-install gd &&\
    apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev

# RUN php -r 'var_export(gd_info());'
RUN docker-php-ext-install opcache

RUN docker-php-ext-install mysqli

# 设置工作目录
RUN set -eux; \
    [ ! -d /data/wwwroot ]; \
    mkdir -p /data/wwwroot; \
    chown www-data:www-data /data/wwwroot; \
    chmod 777 /data/wwwroot

# 安装REDIS扩展
RUN apk add --update --no-cache autoconf g++ make
RUN pecl update-channels
RUN pecl install redis
RUN docker-php-ext-enable redis

# 安装 zip 扩展
RUN apk add --no-cache libzip libzip-dev
RUN docker-php-ext-configure zip && docker-php-ext-install zip

# composer
ENV COMPOSER_HOME /root/composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV PATH $COMPOSER_HOMT/vendor/bin:$PATH
RUN composer config -g repo.packagist composer https://packagist.phpcomposer.com

RUN apk del --no-cache autoconf g++ make
RUN rm -rf /var/cache/apk/*

RUN php -m

WORKDIR /data/wwwroot

LABEL Author="Neilyoz"
LABEL Version="2020.05"
LABEL Description="PHP 7.4.5 开发环境镜像. "