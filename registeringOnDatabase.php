
<?php
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$servername = "localhost";
		$username = "phpmyadmin";
		$password = "elonmusk";
        $dbname = "nexdre";

		$conn = new mysqli($servername,$username,$password,$dbname);

		if($conn->connect_error)
		{
            die("connection error\n");
		}
<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $servername = "localhost";
        $username = "";
        $password = "";
        $dbname = "nexdre";

        $conn = new mysqli($servername,$username,$password,$dbname);

        if($conn->connect_error)
        {
            die("connection error");
            header("location: signin.php");
        }
        else{

            $name = $_REQUEST['name'];
            $password = md5($_REQUEST['password']);
            $email = $_REQUEST['email'];
            $dob = $_REQUEST['dob'];
            $gender = $_REQUEST['gender'];
            $phoneno = $_REQUEST['phone'];
            
            $query = "
                INSERT INTO user (name,email,phoneno,password,gender,dob)
                VALUES ('$name','$email','$phoneno','$password','$gender','$dob');
                ";
                         
            $result = $conn->query($query);
            if($result)
            {
                header("location: index.php");
            }else{
                header("location: signup.php");
            }
        }
    $conn->close();
    }
    ?>  
 

	    else{
            $name = $_REQUEST['name'];
            $password = md5($_REQUEST['password']);
            $email = $_REQUEST['email'];
            $dob = $_REQUEST['dob'];
            $gender = $_REQUEST['gender'];
            $phoneno = $_REQUEST['phone'];
            
            $query = "
                INSERT INTO user (name,email,phoneno,password,gender,dob)
                VALUES ('$name','$email','$phoneno','$password','$gender','$dob');
                ";
                         
            $result = $conn->query($query);
            if($result)
            {
                echo "true";
                //header("location: index.php");
            }else{
                echo "false";
                //header("location: signup.php");
            }
        }
	$conn->close();
    }
	?>	
 