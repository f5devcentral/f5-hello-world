# f5-hello-world - Dockerfile
# https://github.com/f5devcentral/f5-hello-world
# Artiom Lichtenstein, Hitesh Patel

FROM debian:stable-slim

LABEL maintainer="Artiom Lichtenstein, Hitesh Patel" version="1.0.6"

# Core dependencies
RUN apt-get update && \
	apt-get install -y apache2 php7.0 && \
	apt-get autoclean -y && \
	apt-get autoremove -y && \
	apt-get clean -y && \
	rm -rf /var/lib/apt/lists/*

# hello-world
COPY /hw /var/www/hw/
RUN ln -s /var/www/hw/ /var/www/hw/secure

# apache2
COPY /etc/hw-http*.conf /etc/apache2/sites-available/
COPY /etc/hw.conf /etc/apache2/
COPY /etc/apache2.conf /etc/apache2/apache2.conf.append
RUN cat /etc/apache2/apache2.conf.append | tee -a /etc/apache2/apache2.conf
RUN htpasswd -cb /etc/apache2/.htpasswd user user
RUN a2dissite 000-default.conf
RUN a2enmod ssl headers
RUN sed -i 's/Listen 80/Listen 8080/g' /etc/apache2/ports.conf
RUN sed -i 's/Listen 443/Listen 8443/g' /etc/apache2/ports.conf
RUN a2ensite hw-http.conf hw-https.conf

# System account
RUN useradd -r -u 1001 user
RUN chown -RL user: /etc/ssl/private/ /var/log/apache2/ /var/run/apache2/

# Expose ports
EXPOSE 8080 8443

# UID to use when running the image and for CMD
USER 1001

# Environment Variables
ENV APACHE_HTTPD "exec /usr/sbin/apache2" 
# Run
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
