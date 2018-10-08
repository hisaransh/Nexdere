<!DOCTYPE html>
<html>
<head>
	<title>NexDeer</title>
	<meta name = "viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
	<title></title>
	<!-- <link rel="stylesheet" href="css/bootstrap.min.cs --><!-- s"> -->
	<link rel="stylesheet" href="css/style.css">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 -->
</head>
<body>
	<form method="POST" action = "<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"  class=" _80 mar0 ">
		<fieldset class="_80 mar0 fieldset">
			<legend align="center">
				Sign In:
			</legend>
			<p align="center">
				<label for="name/phone">Email/Phone :</label><br>
				<input type="text" name="email/phone" class=" _40 input" required>
			</p>
			<p align="center">
				<label for="password">Password :</label><br>
				<input type="password" name="password" class=" _40 input" required>
			</p>
		</fieldset>
	</form>
</body>
</html>
