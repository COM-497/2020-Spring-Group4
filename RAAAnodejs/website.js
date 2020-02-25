var express = require('express');
var app = express();

var router = express.Router();
  
var path = __dirname + '/views/visualize/assets/js/';
  
app.use('/',router);
  
router.get('/',function(req, res){ res.sendFile(path + 'RAAA.html'); });

app.use('*', function(req, res) { res.send('Error 404: Not Found!'); });
app.listen(3000, function() { console.log('Example app listening on Port 3000!'); });