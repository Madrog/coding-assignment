FROM webdevops/php-nginx:7.1

WORKDIR /var/www/html/public

RUN curl -sL https://deb.nodesource.com/setup_10.x | bash -
RUN apt install nodejs

ADD . .

# RUN npm install
# RUN composer install --verbose
RUN apt-get update
RUN apt-get install -y mysql-client
RUN docker-php-ext-install pdo_mysql
