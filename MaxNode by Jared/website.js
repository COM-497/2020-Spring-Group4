var express = require('express'),
	path = require('path'),
	nodemailer = require('nodemailer');
	app = express();

// Data Nodemailer --------------->

app.use(express.urlencoded({extended:false}));
app.use(express.json());

app.post('/location', (req, res) => {

	console.log('INCOMING DATA: ', req.body)
	
	const output = `<h4>A MESSAGE FROM THE</h4><h2>Resident Assistant Accessibility Application</h2>
	<p>A Resident Assistant has checked in for duty at ${req.body.location}:</p>
	<h3>Resident Assistant: <i>userName</i></h3>
	<h3>Location: <i>${req.body.location}</i></h3>
	<h3>Time: <i>dateTimeEST</i></h3>
	<p>For further information or questions, please contact <i>userName</i> directly.</p>
	<br><p>Have a wonderful evening!</p>`;
	
	var transporter = nodemailer.createTransport({
	service: 'gmail',
	auth: {
		user: 'saintleoresnotify@gmail.com',
		pass: 'ThisIsATestPassw0rd!' // MUST BE HIDDEN
	}
});

var mailOptions = {
	
	from: '"Resident Assistant Accessibility Application" <saintleoresnotify@gmail.com>',
	to: 'maxwell.kizewski@email.saintleo.edu',
	subject: `Duty Check-In for ${req.body.location}`,
	html: output

};

transporter.sendMail(mailOptions, function(error, info){
	if (error){
		console.log('ERROR: UNABLE TO COMMUNICATE WITH SERVER | smtp.gmail.com');
	} else {
		console.log('EMAIL SENT: ' + info.response);
	}
});
});

// ---------------------------->


// Express Middleware for serving static files
app.use(express.static(path.join(__dirname, 'public')));

app.get('/', function(req, res) {
	res.redirect('index.html');
});

app.listen(3000); 