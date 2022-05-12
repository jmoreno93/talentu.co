FROM php:7.3
RUN apt-get update && apt-get install -y libxml2-dev
RUN docker-php-ext-install mysqli pdo pdo_mysql soap xml
WORKDIR /var/www/html/
############ Copy application source ##############
COPY [".", "/var/www/html"]  
RUN curl -sS https://getcomposer.org/installer | php -- \
--install-dir=/usr/bin --filename=composer && chmod +x /usr/bin/composer 
RUN composer install
EXPOSE 3000
CMD ["/var/www/html/run.sh"]


