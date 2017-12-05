# adct:ws - Dockerfile
# https://github.com/ArtiomL/adct
# Artiom Lichtenstein
# v1.0.4, 05/12/2017

FROM alpine

LABEL maintainer="Artiom Lichtenstein" version="1.0.4"

# Core dependencies
RUN apk add --update --no-cache nodejs && \
	rm -rf /var/cache/apk/*

# adct:ws
COPY / /opt/ws/
WORKDIR /opt/ws/
RUN npm install websocket --save

# Expose ports
EXPOSE 4433

# Run
CMD ["/usr/bin/node", "server.js", "4433"]
