FROM existenz/webstack:7.2

# Copy over the code if we want to ship this container
# Don't forget to add the right chown and chmod commands below in the RUN command!
# COPY . /www

COPY dev/docker/configs/php/* /etc/php7/conf.d/

RUN apk -U --no-cache add \
    php7 \
    php7-curl \
    php7-ctype \
    php7-dom \
    php7-json \
    php7-mbstring \
    php7-pdo_mysql \
    php7-pdo_sqlite \
    php7-session \
    php7-tokenizer \
    php7-xdebug \
    php7-xml

EXPOSE 80
