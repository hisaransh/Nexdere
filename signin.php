<?php
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
				<input type="submit" name="submit" value="SignIn" class=" _40 input" required>
			</p>
		</fieldset>
	</form>
</body>
</html>
<?php
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$servername = "localhost";
		$username = "phpmyadmin";
		$password = "elonmusk";
		$database = "nexdre";
		// Create connection
		$conn = new mysqli($servername, $username, $password,$database);
		// Checking connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
   		}else{
   	   		$info = $_POST["phone"];
	   		$password = md5($_POST["password"]);
	   		$sql = "
	 			SELECT uid FROM user WHERE phoneno = $info and password = '$password';  
	   		";
	   		$result = $conn->query($sql);
	   		if ($result->num_rows == 1) {
				$row = $result->fetch_assoc();
				echo $_SESSION["userid"] = $row['uid'];
				header("location: gameway.php");
			}
			else{
				session_destroy();
				header("location: signin.php");
			} 
	$conn->close();
   
	}
}
?>

