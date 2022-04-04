FROM php:8.0-fpm

WORKDIR /app

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    default-mysql-client \
    libzip-dev \
    locales \
    zip \
    vim \
    unzip \
    git \
    curl

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql zip exif pcntl

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for lumen application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

#supervisor configuration
RUN mkdir -p /var/log/supervisor

# Copy existing application directory contents
COPY ./app /var/www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

# Run composer install
RUN composer install

# Change current user to www
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000

CMD ["php-fpm"]
