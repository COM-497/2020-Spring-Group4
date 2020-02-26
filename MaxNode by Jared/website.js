var express = require('express'),
	path = require('path'),
	app = express();

// Express Middleware for serving static files
app.use(express.static(path.join(__dirname, 'public')));

app.get('/', function(req, res) {
	res.redirect('index.html');
});

app.listen(3000);