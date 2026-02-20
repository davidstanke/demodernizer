FROM php:5.6-apache

RUN a2enmod rewrite

# Enable .htaccess overrides
RUN echo '<Directory "/var/www/html">' > /etc/apache2/conf-available/override.conf \
    && echo '    AllowOverride All' >> /etc/apache2/conf-available/override.conf \
    && echo '</Directory>' >> /etc/apache2/conf-available/override.conf \
    && a2enconf override

COPY src/ /var/www/html/

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80