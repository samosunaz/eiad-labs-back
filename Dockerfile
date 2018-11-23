FROM php:7.1-cli

RUN apt-get update && \
    apt-get install -y git zip unzip && \
    php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer && \
    apt-get -y autoremove && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN docker-php-ext-install pdo pdo_mysql
RUN mkdir /usr/src/app
WORKDIR /usr/src/app

COPY . .
RUN composer install
EXPOSE 5000
CMD bash -c "php -S 0.0.0.0:5000 -t public"
