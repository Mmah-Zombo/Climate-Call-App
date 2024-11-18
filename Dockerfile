FROM richarvey/nginx-php-fpm:1.7.2

COPY . .
# Copy the deployment scripts
COPY scripts/ /scripts/

# Ensure the deploy script is executable
RUN chmod +x /scripts/00-laravel-deploy.sh

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

# Set the entrypoint to your deploy script
ENTRYPOINT ["/bin/sh", "/scripts/00-laravel-deploy.sh"]

CMD ["/start.sh"]