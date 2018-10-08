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
$password = "start";
$username = "root";
$database = "nexdre";
// Create connection
$conn = new mysqli($servername, $username, $password,$database);
//checking connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
   }
   echo "Connected successfully";
	   $info = $_POST["email/phone"];
	   $password = md5($_POST["password"]);
	   echo $info;
	   $sql = "
	 		SELECT * FROM user WHERE (phoneno = $info)and password = '$password';  
	   ";
	   $result = $conn->query($sql);
	   if ($result->num_rows > 0) {
		// output data of each row
		echo "if entered";
		while($row = $result->fetch_assoc()) {
			echo"while working";
			echo "uid: " . $row["uid"]. " - Name: " . $row["name"]. "gender" . $row["gender"]."dob". $row["dob"]. "<br>";
		}
	} else {
		echo "0 results";
	}
	$conn->close();
   
  
}
?>
