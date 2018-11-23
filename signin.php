<?php
	/*
		On every page where session is used it is to be started using 
		session_start
		Here after sign in session has to be start
	*/

	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>NexDere</title>
	<meta name = "viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
	<title></title>
	<link rel="stylesheet" href="css/style.css">
	</head>
<body>
	<form method="POST" action = "<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"  class=" _80 mar0 ">
		<fieldset class="_80 mar0 fieldset">
			<legend align="center">
				Sign In:
			</legend>
			<p align="center">
				<label for="phone">Phone :</label><br>
				<input type="text" name="phone" class=" _40 input" required>
			</p>
			<p align="center">
				<label for="password">Password :</label><br>
				<input type="password" name="password" class=" _40 input" required>
			</p>
			<p align="center">
				<input type="submit" name="submitsignin" value="SignIn" class=" _40 input" required>
			</p>
		</fieldset>
	</form>
	<button type="button" onclick="location.href='signup.php'">signup</button>
</body>
</html>
<?php

	//	If signin Form is submitted then go to if statement

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		
		$servername = "localhost";
		$username = "phpmyadmin";
		$password = "elonmusk";
		$database = "nexdre";
		
		// Creating connection
		
		$conn = new mysqli($servername, $username, $password,$database);
		
		// Checking connection
		
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
   		}else{

			//Retriving information entered in form
				  
			$info = $_POST["phone"];
	   		$password = md5($_POST["password"]);
			   
			// Query in sql to know if user with same information exist
			$sql = "
	 			SELECT uid FROM user WHERE phoneno = $info and password = '$password';  
	   		";
			$result = $conn->query($sql);
			
			// If found 1 person
	   		if ($result->num_rows == 1) {
				
				//Fetching Results
				$row = $result->fetch_assoc();

				// Saving the UNIQUE userid of user in session variable for future references
				$_SESSION["userid"] = $row['uid'];
				
				// Heading to gameway.php

				header("location: gameway.php");
			}
			// If no person found
			else{
				/*
					For usign session_destroy session must be started on top pf page
				*/

				// Destroying the session ad navigation back to signin.php
				//unsset($_POST['submitsignin']);
				session_destroy();
				header("location: signin.php");
			} 
	$conn->close();
   
	}
}
?>

