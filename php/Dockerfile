FROM php:8.0-fpm-alpine

# cp default prod config 
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
#RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini" 

#install extensions
RUN docker-php-ext-install mysqli