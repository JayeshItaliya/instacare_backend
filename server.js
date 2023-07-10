const socket = require('socket.io');
const express = require('express');
const app = express();
const server = require('http').createServer(app);
const port = process.env.PORT || 5014;

app.get('/', function(req, res) {
  	res.send('hello');
});

const io = socket(3000, {
  	cors: {
	    origin: "*",
	    methods: ["GET", "POST"],
	    credentials: true
  	}
});

io.attach(server, {
  	pingInterval: 10000,
  	pingTimeout: 5000,
  	cookie: false,
});

io.on('connection', function (socket) {
  	console.log('connection established')

  	socket.on('sender-send-message', ( payload ) => {
  		console.log('sender payload', payload)
	    socket.broadcast.emit('receiver-broadcast-message', payload);
  	});

  	socket.on('receiver-has-sender-message', ( payload ) => {
  		console.log('receiver-has-sender-message', payload)
	    socket.broadcast.emit('broadcast-read-message', payload);
  	});
});


server.listen(port, function () {
  	console.log('Server listening at port %d', port);
});
