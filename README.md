# <img align="center" src="hw/img/sno.svg" width="70">&nbsp;&nbsp;hello, world
[![Build Status](https://img.shields.io/travis/f5devcentral/f5-hello-world.svg)](https://travis-ci.org/f5devcentral/f5-hello-world)
[![Releases](https://img.shields.io/github/release/f5devcentral/f5-hello-world.svg)](https://github.com/f5devcentral/f5-hello-world/releases)
[![Commits](https://img.shields.io/github/commits-since/f5devcentral/f5-hello-world/v1.0.5.svg?label=commits%20since)](https://github.com/f5devcentral/f5-hello-world/commits/master)
[![Maintenance](https://img.shields.io/maintenance/yes/2018.svg)](https://github.com/f5devcentral/f5-hello-world/graphs/code-frequency)
[![Issues](https://img.shields.io/github/issues/f5devcentral/f5-hello-world.svg)](https://github.com/f5devcentral/f5-hello-world/issues)
[![Docker Hub](https://img.shields.io/docker/pulls/f5devcentral/f5-hello-world.svg)](https://hub.docker.com/r/f5devcentral/f5-hello-world/)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](/LICENSE)

&nbsp;&nbsp;

## Table of Contents
- [Description](#description)
- [Installation](#installation)
	- [Main Site](#main-site)
	- [WebSocket Echo](#websocket-echo)
- [Service Tree](#service-tree)
- [Customizations](#customizations)
- [License](LICENSE)

&nbsp;&nbsp;

## Description

A small web app container for testing Application Delivery Controllers in lab environments.

&nbsp;&nbsp;

## Installation

#### Main Site
```shell
docker run -dit -p 80:8080 -p 443:8443 f5devcentral/f5-hello-world
```

Add a custom node name to the page title:

```shell
docker run -dit -p 80:8080 -p 443:8443 -e NODE='Jon' f5devcentral/f5-hello-world
```

#### WebSocket Echo (`/ws/`)
```shell
docker run -dit -p 4433:4433 f5devcentral/f5-hello-world:ws
```

&nbsp;&nbsp;

## Service Tree
```
/
├── secure/
│   └── Basic Authentication (user:user)
├── uri[0-9]*/
│   └── Alias for DocumentRoot (/var/www/hw/)
└── ws/
    └── WebSocket Echo
```

&nbsp;&nbsp;

## Customizations

If you would like to add custom CSS or JavaScript you can do so by mounting
the `css/custom.css` and/or the `js/custom.js` file(s) into the container instance;
for example:

```shell
docker run -dit -p 80:8080 -p 443:8443 \
 -v /path/to/your/custom.css:/var/www/hw/css/custom.css \
 -v /path/to/your/custom.js:/var/www/hw/js/custom.js \
 f5devcentral/f5-hello-world
```
