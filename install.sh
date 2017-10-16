#!/bin/bash
# adct - install.sh
# https://github.com/ArtiomL/adct
# Artiom Lichtenstein
# v1.0.1, 16/10/2017

sudo apt-get update
sudo apt-get -y install apache2 git php7.0
curl -sL https://deb.nodesource.com/setup_6.x | sudo -E bash -
sudo apt-get install -y nodejs
sudo git clone https://github.com/ArtiomL/adct.git /var/www/adct
sudo cp /var/www/adct/etc/adct*.conf /etc/apache2/sites-available/
cat /var/www/adct/etc/apache2.conf | sudo tee -a /etc/apache2/apache2.conf > /dev/null
sudo a2dissite 000-default.conf
sudo a2enmod ssl headers
sudo sed -i '/Listen 80/a Listen 81' /etc/apache2/ports.conf
sudo a2ensite adct.conf adct-ssl.conf
sudo systemctl reload apache2
cd /var/www/adct/ws
sudo npm install websocket --save
sudo chmod 646 ws-echo.log
nohup node server.js 4433 > ws-echo.log &
