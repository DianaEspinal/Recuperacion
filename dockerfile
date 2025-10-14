FROM php:8.2-apache

# Extensiones esenciales
RUN docker-php-ext-install pdo pdo_mysql

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Servir directamente desde public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/*.conf \
  && sed -ri "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/conf-available/*.conf

# Permitir .htaccess en el nuevo DocumentRoot
RUN printf "<Directory ${APACHE_DOCUMENT_ROOT}>\nOptions Indexes FollowSymLinks\nAllowOverride All\nRequire all granted\n</Directory>\n" \
  > /etc/apache2/conf-available/z-override.conf \
  && a2enconf z-override

WORKDIR /var/www/html
EXPOSE 80
