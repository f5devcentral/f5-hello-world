# <img align="center" src="img/tux.png" height="72">&nbsp;&nbsp;adct
[![Releases](https://img.shields.io/github/release/ArtiomL/adct.svg)](https://github.com/ArtiomL/adct/releases)
[![Commits](https://img.shields.io/github/commits-since/ArtiomL/adct/v1.0.3.svg?label=commits%20since)](https://github.com/ArtiomL/adct/commits/master)
[![Maintenance](https://img.shields.io/maintenance/yes/2017.svg)](https://github.com/ArtiomL/adct/graphs/code-frequency)
[![Issues](https://img.shields.io/github/issues/ArtiomL/adct.svg)](https://github.com/ArtiomL/adct/issues)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](/LICENSE)

&nbsp;&nbsp;

## Table of Contents
- [Description](#description)
- [Installation](#installation)
- [License](LICENSE)

&nbsp;&nbsp;

## Description

A small web app for testing Application Delivery Controllers in lab environments.

&nbsp;&nbsp;

## Installation
```shell
sudo apt-get update
sudo apt-get -y install apache2 curl git net-tools php7.0
curl -sL https://deb.nodesource.com/setup_6.x | sudo -E bash -
sudo apt-get install -y nodejs
sudo git clone https://github.com/ArtiomL/adct.git /var/www/adct
sudo cp /var/www/adct/etc/adct*.conf /etc/apache2/sites-available/
sudo a2dissite 000-default.conf
sudo a2enmod ssl headers
sudo sed -i '/Listen 80/a Listen 81' /etc/apache2/ports.conf
sudo a2ensite adct.conf adct-ssl.conf
sudo systemctl reload apache2
cd /var/www/adct/ws
sudo npm install websocket --save
sudo chmod 646 ws-echo.log
nohup node server.js 4433 > ws-echo.log &
```
