<!DOCTYPE html>
<html>
<head>
	<title>
		Nexdre:Add tournament
	</title>
	<meta name = "viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.cs --><!-- s">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
</head>
<body class="body">
	<div class="card">
	  <h5 class="card-header center">Welcome to the Nexdere World</h5>
	  <div class="card-body">
	  	<h5 class="card-title center">Please Fill up the Details</h5>
	<form name="addtournament" action = "<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method='post' class="mar0">

		<fieldset class="_40 center2  ">
					<legend align ="center" class=" ">
						<i><b>ADD Tournament :</b></i>
					</legend>
					<div class="input-group mb-3 center ">
					 	<div class="input-group-prepend">
					    	<span class="input-group-text" id="inputGroup-sizing-default"> Game Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					    	</span>
					  	</div>
					  	<br>
			<select name="addgamename" required>
			<option value='CSGO' >CSGO</option>
			<option value='CALL OF DUTY'>CALL OF DUTY</option>
			<option value='FIFA'>FIFA</option>
			<option value='PUBG'> PUBG </option>
		</select>
		
					</div>
				
		<br>

		<div class="input-group mb-3 center ">
					 	<div class="input-group-prepend">
					    	<span class="input-group-text" id="inputGroup-sizing-default"> Competition Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					    	</span>
					  	</div>
					  	<input type="text" name="competitionName" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
					</div>
					
		<div class="input-group mb-3 center ">
					 	<div class="input-group-prepend">
					    	<span class="input-group-text" id="inputGroup-sizing-default"> Competition Date: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					    	</span>
					  	</div>
					  	<input type="date" min=<?php echo date('Y-m-d'); ?>  name="competitionDate" class="form-control" aria-label="Sizing example input" aria-describedby=" inputGroup-sizing-default" required>
					</div>
		
		<div class="input-group mb-3 center ">
					 	<div class="input-group-prepend">
					    	<span class="input-group-text" id="inputGroup-sizing-default"> Competition Time: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					    	</span>
					  	</div>
					  	<input type="time" name="competitionTime" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
					</div>
		<button type="submit" class="btn btn-primary" name="addcompetitionSubmit" value = "Add Competition" required>Add Competition</button>
		</fieldset>	
	</form>
</div>
</div>
</body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>

	<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $servername = "localhost";
        $username = "phpmyadmin";
        $password = "elonmusk";
        $dbname = "nexdre";

        $conn = new mysqli($servername,$username,$password,$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $competitionName = $_POST['competitionName'];
        $competitionDate = $_POST['competitionDate'];
        $competitionTime = $_POST['competitionTime'];
        $gamename = $_POST['addgamename'];
        $sql = "insert into onlineMode( gameName, competitionName, time, date)
            values('$gamename','$competitionName','$competitionTime','$competitionDate');
        ";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        mysqli_close($conn);
    
    }

?>















