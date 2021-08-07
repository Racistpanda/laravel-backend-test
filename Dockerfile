FROM php:7.4-fpm

#ARG user
#ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

##xdebug
RUN pecl install xdebug-3.0.1 \
    && docker-php-ext-enable xdebug

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY php/php.ini /usr/local/etc/php/
COPY run.sh /var/

# Create system user to run Composer and Artisan Commands
#RUN useradd -G www-data,root -u $uid -d /home/$user $user
#RUN mkdir -p /home/$user/.composer && \
#    chown -R $user:$user /home/$user

#RUN [ `ls -1A . | wc -l` -eq 0 ] && echo ""  || mkdir /var/www \      
#	cd /var/www \        
#	git clone https://github.com/Racistpanda/test-laravel-backend.git

# Set working directory
WORKDIR /var/www

#USER $user