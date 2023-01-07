FROM php:8.1.13-bullseye

# php.ini導入
COPY conf/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/

# xdebugの処理追加
RUN apt-get update && apt-get install -y \
    git \
    vim \
    zip \
    unzip \
    autoconf gcc g++ make && \
    docker-php-ext-install pdo_mysql bcmath && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug

RUN docker-php-ext-install pdo_mysql
RUN cd /usr/bin && \
    curl -s http://getcomposer.org/installer | php && \
    ln -s /usr/bin/composer.phar /usr/bin/composer

RUN mkdir /app
WORKDIR /app

CMD ["/app/start.sh"]
