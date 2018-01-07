# <img align="center" src="img/sno.svg" width="70">&nbsp;&nbsp;hello, world
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

#### WebSocket Echo
```shell
docker run -dit -p 4433:4433 f5devcentral/f5-hello-world:ws
```
