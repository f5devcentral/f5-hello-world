# f5-hello-world:ws - Dockerfile
# https://github.com/f5devcentral/f5-hello-world
# Artiom Lichtenstein, Hitesh Patel

FROM alpine

LABEL maintainer="Artiom Lichtenstein, Hitesh Patel" version="1.0.6"

# Core dependencies
RUN apk add --update --no-cache nodejs && \
	rm -rf /var/cache/apk/*

# hello-world:ws
COPY / /opt/hw/ws/
WORKDIR /opt/hw/ws/
RUN npm install websocket --save

# Expose ports
EXPOSE 4433

# UID to use when running the image and for CMD
USER 1001

# Run
CMD ["/usr/bin/node", "server.js", "4433"]
