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
<body class="body bg-image">
	<form  method="POST" action = "registeringOnDatabase.php"  class=" _80 mar0">
		<fieldset class="_80 mar0 fieldset">
			<legend align ="center" class="white ">
				<i><b>Registration Form :</b></i>
			</legend>
			<p align="center" class="white">
				<label for="email" class="label" >Email:</label><br>
				<input type="email" name="email" class="_40 input" required>
			</p>

			<p align="center" class="white">
				<label for="password">Password:</label><br>
				<input type="password" name="password" class="_40 input" required>
			</p>

			<p align="center" class="white">
				<label for="name">Name:</label><br>
				<input type="text" name="name" class="_40 input" required>
			</p>
			<p align="center" class="white">
				<label for="gender">Gender:</label><br><br>
				Male: <input type="radio" name="gender" value = "male">
				Female:<input type="radio" name="gender" value = "female">
			</p>
			<p align="center" class="white">
				<label for="dob">DateOfBirth:</label><br>
				<input type="date" name="dob" class="_40 input" max=<?php
                        echo date('Y-m-d');
                            ?> required>
			</p>

			<p align="center" class="white">
				<label for="phone">Phone No:</label><br>
				<input type="tel" name="phone" class="_40 input" required>
			</p>
			<p align="center" class="">
				<input type="submit" name="submit" value = "SignUp" class=" _30 input submit" required>
			</p>
		</fieldset>
	</form>
</body>
</html>
