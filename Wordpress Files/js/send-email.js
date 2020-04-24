var nodemailer = require('nodemailer');

var transporter = nodemailer.createTransport({
	service: 'gmail',
	auth: {
		user: 'saintleoresnotify@gmail.com',
		pass: 'ThisIsATestPassw0rd!'
	}
});

var mailOptions = {
	
	from: 'saintleoresnotify@gmail.com',
	to: 'maxwell.kizewski@email.saintleo.edu',
	subject: 'HELLO WORLD!',
	text: 'HELLO WORLD AGAIN!'

};

transporter.sendMail(mailOptions, function(error, info){
	if (error){
		console.log('ERROR');
	} else {
		console.log('EMAIL SENT: ' + info.response);
	}
});