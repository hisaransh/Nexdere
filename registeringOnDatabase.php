<?php
    /*
        If form on sign on sign up page is submitted
    */
	if($_SERVER['REQUEST_METHOD'] == "POST"){
        // Creating a connection
		$servername = "localhost";
		$username = "phpmyadmin";
		$password = "elonmusk";
        $dbname = "nexdre";

		$conn = new mysqli($servername,$username,$password,$dbname);
        
        //  If connection error then die to signin.php
        
		if($conn->connect_error)
		{
            die("connection error");
            header("location: signin.php");
        }
	    else{
           
            // Retriving all values from signin Form and also encrypting password using md5
           
            $name = $_REQUEST['name'];
            $password = md5($_REQUEST['password']);
            $email = $_REQUEST['email'];
            $dob = $_REQUEST['dob'];
            $gender = $_REQUEST['gender'];
            $phoneno = $_REQUEST['phone'];
            
            // Query in sql to enter data into user table

            $query = "
                INSERT INTO user (name,email,phoneno,password,gender,dob)
                VALUES ('$name','$email','$phoneno','$password','$gender','$dob');
                ";
                         
            $result = $conn->query($query);

            // If query run succesfull then go to sign in page 

            if($result)
            {
                header("location: signin.php");
            }
            // Re-enter data on signup page
            else{
                header("location: signup.php");
            }
        }

    // Closing the connection
    
    $conn->close();
    }
?>	
 
