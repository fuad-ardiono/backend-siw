FROM php:7.4.7-fpm-alpine

ARG user
ARG uid

# Install system dependencies
RUN apk update && apk add \
	autoconf \
    git \
    curl \
    libpng-dev \
    bzip2-dev \
    icu-dev \
    libxml2-dev \
    oniguruma-dev \
    postgresql-dev \
    libxslt-dev \
    libzip-dev \
    zip \
    unzip

# Install PHP extensions
RUN docker-php-ext-install bcmath bz2 calendar iconv intl mbstring json mysqli pdo_mysql pdo_pgsql pgsql soap \
 xsl zip

RUN apk add gcc libc-dev build-base

RUN pecl install redis && docker-php-ext-enable redis

RUN pecl install xdebug && docker-php-ext-enable xdebug

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN adduser \
    --disabled-password \
    --gecos "" \
    --home "/home/$user" \
    --g 82,0 \
    --no-create-home \
    --uid "$uid" \
    "$user"

RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www

USER $user
