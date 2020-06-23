FROM ubuntu:20.04
ENV DEBIAN_FRONTEND nointreactive
ENV LANG es_CL.utf-8
RUN apt-get update -y \
    && apt-get install -yq locales tzdata \
    && localedef -i es_CL -c -f UTF-8 -A /usr/share/locale/locale.alias es_CL.UTF-8 \
    && apt-get install -yq \
    curl \
    unzip \
    git-all \
    php7.4 \
    php7.4-gd \
    php7.4-zip \
    php7.4-bcmath \
    php7.4-mbstring \
    php7.4-mysql \
    php-tokenizer \
    libapache2-mod-php7.4 \
    composer \
    nodejs \
    npm \
    && rm -rf /var/lib/apt/lists/* \
    && a2enmod rewrite
WORKDIR /var/www
EXPOSE 80
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
