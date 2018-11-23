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
	 <script>
		function validate()
		{
			var userName = document.forms["signupform"]["name"].value; 
			var phoneno = document.forms["signupform"]["phone"].value;
			var password1 = document.forms["signupform"]["password"].value;
			var password2 = document.forms["signupform"]["password2"].value;
			var error = "";
			var length = password1.length;
            if(length<8)
            {
                error = "Length of password shoud be greater then 8";
				document.getElementById('forerror').innerHTML = error;
				return false;
            }
			if(password1 != password2)
			{
				error = "Password and confirm password are not same";
				document.getElementById('forerror').innerHTML = error;
				return false;
			}
			
			length = userName.length;
            //Name field should not be empty
            if(userName == ""){                      
                error = "Name feild is Necessary";
				document.getElementById('forerror').innerHTML = error;
                return false;
            }
            //Name feild should not contain numbers
            for(var i = 0;i<length;i++)
            {
                if(userName[i] == " "){
                    continue;
                }
                else if(userName[i] >=0 && userName[i] <=9)
                {
                    error = "Name feild can't contain numbers";
					document.getElementById('forerror').innerHTML = error;
                    return false;
                }
            }

			length = phoneno.length;
			if(length!=10)
			{
				error = "Enter valid phone no of 10 digits";
				document.getElementById('forerror').innerHTML = error;
				return false;
			}
			for(var i = 0;i<length;i++)
            {
                if(phoneno[i]>=0 && phoneno[i]<=9){
                    continue;
                }
                else{
                    error = "Phone Number should be in numbers";
                    return false;
                }
            }			
			return true;
		}
	 </script>
</head>
<body class="body bg-image">
	<form  method="POST" action = "registeringOnDatabase.php"  name="signupform" onsubmit="return validate()"  class=" _80 mar0">
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
				<label for="confirmpassword">Confirm Password:</label><br>
				<input type="password" name="password2" class="_40 input" required>
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
		<div id='forerror'> </div>
</body>
</html>
