# adct - Dockerfile
# https://github.com/ArtiomL/adct
# Artiom Lichtenstein
# v1.0.2, 04/11/2017

FROM debian:stable-slim

# Core dependencies
RUN apt-get update && \
	apt-get install -y apache2 curl git gnupg php7.0 && \
	curl -sL https://deb.nodesource.com/setup_6.x | bash - && \
	apt-get install -y nodejs && \
	git clone https://github.com/ArtiomL/adct.git /var/www/adct && \
	apt-get remove -y --purge curl git gnupg && \
	apt-get autoclean -y && \
	apt-get autoremove -y && \
	apt-get clean -y && \
	rm -rf /var/lib/apt/lists/*

# adct
RUN cp /var/www/adct/etc/adct*.conf /etc/apache2/sites-available/
RUN cat /var/www/adct/etc/apache2.conf | tee -a /etc/apache2/apache2.conf > /dev/null
RUN htpasswd -cb /etc/apache2/.htpasswd user user
RUN a2dissite 000-default.conf
RUN a2enmod ssl headers
RUN sed -i '/Listen 80/a Listen 81' /etc/apache2/ports.conf
RUN a2ensite adct.conf adct-ssl.conf
# WebSocket echo
WORKDIR /var/www/adct/ws
RUN npm install websocket --save
RUN chmod 646 ws-echo.log

# Expose ports
EXPOSE 80 81 443 4433

# Run
CMD [ "/bin/bash", "-c", "/etc/init.d/apache2 restart; node server.js 4433 > ws-echo.log" ]
