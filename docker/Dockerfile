FROM php:7.4-fpm-alpine3.12 as marst

ENV WORK_DIR /app

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN set -e \
        # Install dependencies
    && apk --no-cache add --update $PHPIZE_DEPS \
    && pecl install xdebug \
    # Clean up
    && apk del --purge $PHPIZE_DEPS \
    && rm -rf /var/cache/apk/*

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

#copy xdebug conf
COPY xdebug.ini $PHP_INI_DIR/conf.d/

WORKDIR $WORK_DIR

EXPOSE 9000
CMD ["php-fpm", "--nodaemonize"]