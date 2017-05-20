#!/usr/bin/env python
# psock - Simple Socket Ping
# https://github.com/ArtiomL/adct
# Artiom Lichtenstein
# v1.0.0, 20/05/2017

import socket
import sys
import time

intBufSize = 4096

def funLog(strMessage):
	print('%s %s' % (time.strftime('%b %d %X'), strMessage))

objSocket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

objSocket.bind(('', int(sys.argv[1])))
objSocket.listen(5)

funLog('TCP server listening on port %s...' % sys.argv[1])

while True:
	objConn, tupCAddr = objSocket.accept()
	funLog('Connection from: %s:%d' % (tupCAddr[0], tupCAddr[1]))
	while True:
		strData = objConn.recv(intBufSize)
		if not strData: break
		funLog('Data: ' + strData.rstrip())
		objConn.send('ACK: ' + strData)
	objConn.close()
	funLog('Connection closed')
