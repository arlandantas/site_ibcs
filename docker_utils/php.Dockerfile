FROM php:7.2-apache

# Set working directory
WORKDIR /app

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libgmp-dev \
    cron \
    procps

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl gmp mysqli
RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
RUN docker-php-ext-install gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN service cron start
RUN update-rc.d cron enable

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
RUN sed -i 's/post_max_size \= .M/post_max_size \= 200M/g' "$PHP_INI_DIR/php.ini" && \
    sed -i 's/upload_max_filesize \= .M/upload_max_filesize \= 200M/g' "$PHP_INI_DIR/php.ini"

RUN a2enmod rewrite proxy_http

# RUN apt-get -y update \
#     && apt-get install -y libicu-dev \ ### <-- Added space here
#     && docker-php-ext-configure intl \
#     && docker-php-ext-install intl