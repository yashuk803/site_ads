FROM php:7.2-fpm-stretch

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# Fix permissions
RUN usermod -u 1000 www-data \
   && groupmod -g 1000 www-data

# Install selected extensions and other stuff
RUN apt-get update \
   && apt-get -y --no-install-recommends install \
   ssmtp \
   mailutils \
   apt-utils \
   libpq-dev \
   libfreetype6-dev \
   libjpeg62-turbo-dev \
   libpng-dev \
   zip \
   unzip \
   && docker-php-ext-install pdo_mysql bcmath sockets zip \
   && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
   && docker-php-ext-install gd \
   && apt-get clean; rm -rf /var/lib/apt/lists/ */tmp/* /var/tmp/ */usr/share/doc/*

COPY --from=composer /usr/bin/composer /usr/bin/composer