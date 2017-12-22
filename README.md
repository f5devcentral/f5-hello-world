# <img align="center" src="img/sno.svg" width="70">&nbsp;&nbsp;adct
[![Build Status](https://img.shields.io/travis/ArtiomL/adct.svg)](https://travis-ci.org/ArtiomL/adct)
[![Releases](https://img.shields.io/github/release/ArtiomL/adct.svg)](https://github.com/ArtiomL/adct/releases)
[![Commits](https://img.shields.io/github/commits-since/ArtiomL/adct/v1.0.3.svg?label=commits%20since)](https://github.com/ArtiomL/adct/commits/master)
[![Maintenance](https://img.shields.io/maintenance/yes/2017.svg)](https://github.com/ArtiomL/adct/graphs/code-frequency)
[![Issues](https://img.shields.io/github/issues/ArtiomL/adct.svg)](https://github.com/ArtiomL/adct/issues)
[![Docker Hub](https://img.shields.io/docker/pulls/artioml/adct.svg)](https://hub.docker.com/r/artioml/adct/)
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

### Main Site
```shell
docker run -dit -p 80:8080 -p 443:8443 artioml/adct
```

### WebSocket Echo
```shell
docker run -dit -p 4433:4433 artioml/adct:ws
```
