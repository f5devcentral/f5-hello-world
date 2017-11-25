# adct - Dockerfile
# https://github.com/ArtiomL/adct
# Artiom Lichtenstein
# v1.0.3, 25/11/2017

FROM debian:stable-slim

LABEL maintainer="Artiom Lichtenstein" version="1.0.3"

# Core dependencies
RUN apt-get update && \
	apt-get install -y apache2 git php7.0 && \
	git clone https://github.com/ArtiomL/adct.git /var/www/adct && \
	apt-get remove -y --purge git && \
	apt-get autoclean -y && \
	apt-get autoremove -y && \
	apt-get clean -y && \
	rm -rf /var/lib/apt/lists/*

# adct
RUN cp /var/www/adct/etc/adct*.conf /etc/apache2/sites-available/
RUN cat /var/www/adct/etc/apache2.conf | tee -a /etc/apache2/apache2.conf
RUN htpasswd -cb /etc/apache2/.htpasswd user user
RUN a2dissite 000-default.conf
RUN a2enmod ssl headers
RUN sed -i '/Listen 80/a Listen 81' /etc/apache2/ports.conf
RUN a2ensite adct.conf adct-ssl.conf

# Expose ports
EXPOSE 80 81 443

# Run
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
