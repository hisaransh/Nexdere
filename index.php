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
	<form  method="POST" action = "<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"  class=" _80 mar0">
		<fieldset class="_80 mar0 fieldset">
			<legend align ="center">
				Registration Form :
			</legend>
			<p align="center" class="">
				<label for="email" >Email:</label><br>
				<input type="email" name="email" class="_40 input" required>
			</p>

			<p align="center" class="">
				<label for="password">Password:</label><br>
				<input type="password" name="password" class="_40 input" required>
			</p>

			<p align="center" class="">
				<label for="name">Name:</label><br>
				<input type="text" name="name" class="_40 input" required>
			</p>
			<p align="center" class="">
				<label for="gender">Gender:</label><br>
				Male: <input type="radio" name="gender" value = "male">
				Female:<input type="radio" name="gender" value = "female">
			</p>
			<p align="center" class="">
				<label for="dob">DateOfBirth:</label><br>
				<input type="date" name="dob" class="_40 input" required>
			</p>

			<p align="center" class="">
				<label for="phone">Phone No:</label><br>
				<input type="tel" name="phone" class="_40 input" required>
			</p>
			<p align="center" class="">
				<input type="submit" name="submit" value = "submit" required>
			</p>
		</fieldset>
	</form>
</body>
</html>


<!-- <?php
	
	$servername = "localhost";
	$uname = "root";
	$password = "your_password";


	$conn = new mysqli($servername,$uname,$password);


	if($conn->connect_error)
	{
		die("connection error \r\n");
	}
	else{
		echo "connection established <br>";
		mysqli_select_db($conn,"jiit");
	}


	
	$sql1 = "select * from student;";

	$result = $conn->query($sql1);
	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			echo "id : ".$row['id'];
			echo "name : ".$row['name'];
			echo "branch : ".$row['branch'];
			echo " <br>";
		}
	}

	
	// if($conn->multi_query($sql))
	// {
	// 	echo "multi query executed";
	// }

	if($_SERVER['REQUEST_METHOD']=='POST'){

		$name = test_input($_POST["name"]);
		echo $name;
	}

	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$conn->close();

	?>	
  -->