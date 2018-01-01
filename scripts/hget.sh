#!/bin/bash
# f5-hello-world - hget: HTTP/S Client Simulator
# https://github.com/f5devcentral/f5-hello-world
# Artiom Lichtenstein
# v1.5, 16/10/2017

trap "echo; echo 'Exiting...'; rm -f scr_cURL_HGET.cookies; exit" SIGINT

if [ -z "$1" ]; then
	echo; echo "Usage: ./hget http|s://{HOST_NAME | IP_ADDRESS}[:PORT][/URI] [INTERVAL]"; echo
	exit
fi

int_TRANS_NUM=1
str_BASE_URI="/uri"
str_FILE="index.php"
str_URL="$1"
str_SLASHES="${1//[^\/]}"

if [ -z "$2" ]; then set -- $1 1; fi

while true; do
	if [ ${#str_SLASHES} -le 2 ]; then
		str_URL="$1$str_BASE_URI$(( ($RANDOM % 9) + 1 ))/"
		if [ $(($RANDOM % 3)) = 0 ]; then
			str_URL=$str_URL$str_FILE
		fi
	fi
	clear
	echo
	echo $(tput sgr0)$(tput bold)Transaction Number: $(tput setaf 2)$(tput bold)$int_TRANS_NUM $(tput sgr0)$(tput bold)to: $(tput setaf 6)$str_URL$(tput sgr0)
	curl -A hget_v1.4 -G $str_URL -k -v -s -b scr_cURL_HGET.cookies -c scr_cURL_HGET.cookies -o /dev/null
	int_TRANS_NUM=$((int_TRANS_NUM+1))
	sleep $2
done
