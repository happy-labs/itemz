from ubuntu:16.04
MAINTAINER eranga bandara(erangaeb@gmail.com)

# install apache
RUN apt-get update -y
RUN apt-get install -y apache2

# install php
RUN apt-get install -y php7.0 libapache2-mod-php7.0 php7.0-cli php7.0-common php7.0-mbstring php7.0-gd php7.0-intl php7.0-xml php7.0-mysql php7.0-mcrypt php7.0-zip

# db conf
ENV DB_HOST dev.localhost
ENV DB_USER root
ENV DB_PASS root

# conetent
RUN rm -rf /var/www/html/*
ADD . /var/www/html

VOLUME ["/var/www/html"]

EXPOSE 80
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
