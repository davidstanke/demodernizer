FROM php:7.2-apache

# Enable mod_rewrite for CodeIgniter-style routing
RUN a2enmod rewrite

# Copy the application files to the container
COPY . /var/www/html/

# Ensure permissions for SQLite file or session storage if needed
RUN chown -R www-data:www-data /var/www/html/

EXPOSE 80

CMD ["apache2-foreground"]
