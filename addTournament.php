<!DOCTYPE html>
<html>
<head>
	<title>
		Nexdre:Add tournament
	</title>
</head>
<body>
	<h2> Please Fill up the Details </h2>
	<form name="addtournament" action = "<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method='post'>
		<label for="gamename">Game Name</label>
		<select name="addgamename" required>
			<option value='CSGO' >CSGO</option>
			<option value='CALL OF DUTY'>CALL OF DUTY</option>
			<option value='FIFA'>FIFA</option>
			<option value='PUBG'> PUBG </option>
		</select>
		<br>
		<label for="competitionName">Competition Name</label>
		<input type='text' name='competitionName'>
		<br>
		<label for="competitionDate">Date</label>
		<input type='date' min=<?php echo date('Y-m-d'); ?> name='competitionDate' required >
		<br>
		<label for="competitionTime">Date</label>
		<input type='time' name='competitionTime'>
		<input type='submit' name='addcompetitionSubmit'>
	</form>
</body>
</html>

<?php
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$competitionName = $_POST['competitionName'];
		$competitionDate = $_POST['competitionDate'];
		$competitionTime = $_POST['competitionTime'];
		$gamename = $_POST['addgamename'];
	}

?>















