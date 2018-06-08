<html>
<head>
	<title>%TITLE%</title>
</head>
<body>
	<div>
		<h2>Contact Form</h2>
	</div>
	<div style="color: #FF0000; font-size: 15px;"><strong>%ERRORS%</strong></div>
	<form action="" method="POST">
		<p>Name</p> <input type="text" name="name" required>
		<p>Email</p> <input type="text" name="email" required>
		<p><select name="subject" required>
		  <option disabled>Please select subject</option>
		  <option value="Error in site">Error in site</option>
		  <option value="Content">Content</option>
		  <option value="Something else">Something else</option>
		</select>
		<p>Message</p><textarea name="message" rows="6" cols="25" required></textarea><br />
		<input type=submit value="Send">
	</form>
</body>
</html>
