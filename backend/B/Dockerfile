FROM php:8.1.13-bullseye

# php.ini導入
COPY conf/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/

RUN apt-get update && apt-get install -y \
    git \
    vim \
    zip \
    unzip \
    autoconf \
    gcc \
    g++ \
    make \
    curl \
    gnupg \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*
# 下記は、Dockerのイメージサイズを小さくする効果がある
# RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# node.js関連の導入
# https://deb.nodesource.com/setup_〇〇.xで、ダウンロードするnode.jsのバージョンを指定する
RUN curl -fsSL https://deb.nodesource.com/setup_19.x | bash -
RUN apt-get install -y nodejs
RUN npm install npm@latest -g

# xdebugの処理追加
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN docker-php-ext-install bcmath pdo_mysql
RUN cd /usr/bin \
    && curl -s http://getcomposer.org/installer | php \
    && ln -s /usr/bin/composer.phar /usr/bin/composer

RUN mkdir /app
WORKDIR /app

# start.shにcomposerインストールとマイグレーション、サーバーの立ち上げを行うコマンド格納されている
CMD ["/app/start.sh"]
