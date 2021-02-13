FROM php:7.4-fpm-alpine3.13

# Install basic dependencies
RUN apk add --no-cache bash nodejs npm composer libzip-dev libpng-dev

RUN docker-php-ext-install pdo pdo_mysql zip gd

RUN addgroup -g 1000 -S testing && \
    adduser -u 1000 -S testing -G testing

EXPOSE 9000

CMD ["php-fpm"]

USER testing
