FROM php:8.1.12-fpm

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get upgrade -y && apt-get install -y \
    build-essential \
    libpq-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install pdo pdo_pgsql pgsql

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN useradd -G www-data,root -u 2000 -d /home/app app
RUN mkdir -p /home/app/.composer && \
    chown -R app:app /home/app

# Copy existing application directory permissions
COPY . /var/www
RUN chown -R app:app /var/www
USER app

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD bash -c "composer install && php artisan key:generate && php-fpm"
