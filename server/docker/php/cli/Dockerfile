FROM php:7.0-cli-alpine

RUN apk update && \
    apk add curl && \
    curl -sS https://getcomposer.org/installer | php && \
    chmod +x composer.phar && \
    mv composer.phar /usr/local/bin/composer

CMD php
