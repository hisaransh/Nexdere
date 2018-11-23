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
	<link rel="stylesheet" href="css/bootstrap.min.cs --><!-- s">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
<body>
	<div class="card _80 mar0">
	<h5 class="card-header center">Welcome to the Nexdere World</h5>
	<div class="card-body">
	  	<div class="right">
	  		<span><b><i>Not registered..?</i></b></span><br>
	  		<a href="signup.php " class="btn btn-primary right">Sign up -></a>
	  	</div>
	    
	    	<form method="POST" action = "<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"  class="mar0 ">
				<fieldset class="_40 center2  ">
					<legend align ="center" class=" ">
						<i><b>Sign-In to Nexdere:</b></i>
					</legend>
					<div class="input-group mb-3 center ">
					 	<div class="input-group-prepend">
					    	<span class="input-group-text" id="inputGroup-sizing-default"> Phone No:
					    	</span>
					  	</div>
					  	<input type="Phone" name="phone" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
					</div>
					<div class="input-group mb-3 center ">
					 	<div class="input-group-prepend">
					    	<span class="input-group-text" id="inputGroup-sizing-default"> Password:
					    	</span>
					  	</div>
					  	<input type="password" name="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
					</div>

					<div class="" >
						<button type="submit" class="btn btn-primary" name="submit" value = "Signin" required>Sign in</button>
					</div>
				</fieldset>	
			</form>
	    </div>
	</div>
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

