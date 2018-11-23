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
	

	<script>
		function validate()
		{
			var userName = document.forms["signupform"]["name"].value; 
			var phoneno = document.forms["signupform"]["phone"].value;
			var password1 = document.forms["signupform"]["password"].value;
			var password2 = document.forms["signupform"]["password2"].value;
			var error = ""; 
            
			var length = userName.length;
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
                    error = "<strong>Name feild can't contain numbers</strong>";
					document.getElementById('forerror').innerHTML = error;
					document.getElementById('forerror').classList.remove("none");
                    return false;
                }
            }

            // validation of password
            length = password1.length;
            if(length<8)
            {
                error = "<strong>Length of password shoud be greater then 8</strong>";
				document.getElementById('forerror').innerHTML = error;
				document.getElementById('forerror').classList.remove("none");
				return false;
            }
			if(password1 != password2)
			{
				error = "<strong>Password and confirm password are not same</strong>";
				document.getElementById('forerror').innerHTML = error;
				document.getElementById('forerror').classList.remove("none");
				return false;
			}

			//validation of phone
			length = phoneno.length;
			if(length!=10)
			{
				error = "<strong> Enter valid phone no of 10 digits </strong>";
				document.getElementById('forerror').innerHTML = error;
				document.getElementById('forerror').classList.remove("none");
				return false;
			}
			for(var i = 0;i<length;i++)
            {
                if(phoneno[i]>=0 && phoneno[i]<=9){
                    continue;
                }
                else{
                    error = "<strong>Phone Number should be in numbers</strong>";
                    document.getElementById('forerror').innerHTML = error;
					document.getElementById('forerror').classList.remove("none");
                    return false;
                }
            }			
			return true;
		}
	 </script>
</head>

<body class="body">

	<div class="card">
	  <h5 class="card-header center">Welcome to the Nexdere World</h5>
	  <div class="card-body">
	  	<div class="right">
	  		<span><b><i>Already registered..?</i></b></span><br>
	  		<a href="signin.php " class="btn btn-primary right">Sign in -></a>
	  	</div>
	    <h5 class="card-title center">Sign-Up</h5>
	    	<form  method="POST" action = "registeringOnDatabase.php"  name="signupform" onsubmit="return validate()"  class="mar0">
				<fieldset class="_40 center2  ">
					<legend align ="center" class=" ">
						<i><b>Registration Form :</b></i>
					</legend>
					<div class="input-group mb-3 center ">
					 	<div class="input-group-prepend">
					    	<span class="input-group-text" id="inputGroup-sizing-default"> Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					    	</span>
					  	</div>
					  	<input type="email" name="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
					  	required>
					</div>
					<div class="input-group mb-3 center ">
					 	<div class="input-group-prepend">
					    	<span class="input-group-text" id="inputGroup-sizing-default"> Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					    	</span>
					  	</div>
					  	<input type="text" name="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
					</div>
					<div class="input-group mb-3 center ">
					 	<div class="input-group-prepend">
					    	<span class="input-group-text" id="inputGroup-sizing-default"> Password:&nbsp;&nbsp;&nbsp;
					    	</span>
					  	</div>
					  	<input type="Password" name="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
					</div>
					<div class="input-group mb-3 center ">
					 	<div class="input-group-prepend">
					    	<span class="input-group-text" id="inputGroup-sizing-default"> Re-Password:
					    	</span>
					  	</div>
					  	<input type="Password" name="password2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
					</div>
					<div class="input-group mb-3 center ">
					 	<div class="input-group-prepend">
					    	<span class="input-group-text" id="inputGroup-sizing-default"> Phone No:
					    	</span>
					  	</div>
					  	<input type="Phone" name="phone" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
					</div>

					<div class="input-group mb-3 center ">
					 	<div class="input-group-prepend">
					    	<span class="input-group-text" id="inputGroup-sizing-default"> DOB: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					    	</span>
					  	</div>
					  	<input type="date" name="dob" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" max=<?php
                        echo date('Y-m-d');
                            ?> required> 
					</div>

					<div class="input-group-prepend">
					    <span class="input-group-text" id="inputGroup-sizing-default"> Gender:
					    </span>

					</div>    
					<div class="form-check form-check-inline" style="left : 10px;">
		  				<input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
		 			 	<label class="form-check-label" for="inlineRadio1">Male</label>
					</div>
					<div class="form-check form-check-inline" style="left:10px;">
		  				<input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
		  				<label class="form-check-label" for="inlineRadio2">Female</label>
					</div>
					<br>	
					<br>
					<div class="alert alert-warning alert-dismissible fade show none" role="alert" id="forerror">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="" >
						<button type="submit" class="btn btn-primary" name="submit" value = "SignUp" required>Sign up</button>
					</div>
				</fieldset>	
			</form>
	  </div>
	</div>

</body>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
