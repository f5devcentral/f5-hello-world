#!/usr/bin/env node
/*
	adct - WebSocket Echo Server
	https://github.com/ArtiomL/adct
	Artiom Lichtenstein
	v1.0.1, 28/05/2017
*/

'use strict';

// Log level
var intLogLevel = 2;
var strLogID = '[-v1.0.1-170528-]';

function funLog(intMesLevel, strMessage, strMethod, objError) {
	if (intLogLevel >= intMesLevel) {
		console[strMethod !== undefined ? strMethod : 'log'](strLogID, strMessage, objError !== undefined ? objError : '');
	}
}

process.title = 'ws-echo.js';

// Import the Node.js modules
var funWebSockSrv = require('websocket').server;
var objHTTP = require('http');

// WebSocket server port
var intWSPort = Number(process.argv.slice(2)[0]);

// List of currently connected clients
var arrClients = [];

// HTTP server
var objHSrv = objHTTP.createServer(function() {
	// Will be used for WS server
});

objHSrv.listen(intWSPort, function() {
	funLog(1, (new Date()) + ' Server is listening on port ' + intWSPort);
});

// WebSocket server (tied to the HTTP server)
var objWebSockSrv = new funWebSockSrv({
	httpServer: objHSrv
});

// WebSocket connection callback
objWebSockSrv.on('request', function(objRequest) {
	funLog(2, (new Date()) + ' Connection Origin: ' + objRequest.origin);
	var objConn = objRequest.accept('echo', objRequest.origin);
	// Client index for connection removal
	var intCIndex = arrClients.push(objConn) - 1;
	funLog(1, (new Date()) + ' Accepted connection from ' + objConn.remoteAddress + ':' + objConn.socket._peername.port);

	objConn.on('message', function(objMessage) {
		if (objMessage.type === 'utf8') {
			funLog(2, (new Date()) + ' Received message from ' + objConn.remoteAddress + ':\n' + objMessage.utf8Data);
			// Broadcast the message to all connected clients
			for (var i = 0; i < arrClients.length; i++) {
				arrClients[i].sendUTF(objMessage.utf8Data);
			}
		}
	});

	objConn.on('close', function() {
		funLog(1, (new Date()) + ' Client ' + objConn.remoteAddress + " disconnected.");
		// Remove from the list of connected clients
		arrClients.splice(intCIndex, 1);
	});

});
