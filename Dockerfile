FROM php:8.2-apache


# Paquetes necesarios para instalar extensiones
RUN apt-get update && apt-get install -y \
    libxml2-dev \
    unzip \
  && docker-php-ext-install soap pdo_mysql \
  && a2enmod rewrite headers \
  && rm -rf /var/lib/apt/lists/*


# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer


# Directorio de trabajo
WORKDIR /var/www


# Copiar Composer manifests al contenedor (evita mounts raros)
COPY composer.json /var/www/composer.json


# (Opcional) Ajustes de PHP recomendados para desarrollo
RUN { \
    echo "display_errors=On"; \
    echo "error_reporting=E_ALL"; \
    echo "default_charset=UTF-8"; \
  } > /usr/local/etc/php/conf.d/ut7.ini