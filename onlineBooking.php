<?php
    session_start();
?>
<?php if(isset($_SESSION["userid"])) :?>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="css/style.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


        <style type="text/css">
            th, td {
            padding: 15px;
            text-align: left;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-dark">
          <a class="navbar-brand" href="#"  >
            <b><i>Nexdere</i></b>
          </a>
          <button  class="btn btn-primary" onclick="window.location.href='allAllocation.php'"required >Home</button>
        </nav>
        <br><br><br>
        <?php
            if(isset($_SESSION["gamename"])&& isset($_POST['onlineInfoSubmit']))
            {
                $gameid = $_POST['gameid'];
                $userid = $_SESSION['userid'];
                $gamename = $_SESSION['gamename'];
                

                $servername = "localhost";
    		    
		$username = "phpmyadmin";
		$password = "elonmusk";
                $dbname = "nexdre";

    		    $conn = new mysqli($servername,$username,$password,$dbname);

                // die if error
    		    if($conn->connect_error)
    		    {
                    die("connection error");
                    session_destroy();
                    unset($_SESSION["gamename"]);
                    unset($_SESSION["city"]);
                    unset($_SESSION["userid"]);
                    header("location: signin.php");
                }
                else
                {
                    $query = "
                        INSERT INTO allocationOnline (uid , gid ) VALUES (
                            '$userid' , '$gameid' 
                        );
                    ";
                    $result = $conn->query($query);

                    if($result)
                    {
                        echo "<div class='alert alert-dark center' role='alert'>
                        Congrats! You have succesfully booked competition"."<br/>"."</div>";
                        $query1 = "
                        SELECT DISTINCT(name) from user , allocationOnline where user.uid = allocationOnline.uid and allocationOnline.gid = '$gameid' and user.uid<>'$userid';
                        ";
                        $result1 = $conn->query($query1);
                        if($result1)
                        {
                            if ($result1->num_rows > 0) {
                                //  While rows are getting retrived from result of query
                                echo "<div class='card center2' style='width: 18rem;''>
                                            <div class='card-header'>
                                                You are playing with: 
                                                    </div>";
                                echo "<ul class='list-group list-group-flush'>";
                                while($row1 = $result1->fetch_assoc()) {
                                    echo "<li class='list-group-item'>".$row1['name']."</li>";
                                }
                                echo "</ul>
                                        </div>";
                            }
                            else{
                                echo "<br><br>";
                                echo "<div class='alert alert-dark center' role='alert'>
                                          You are first One to book  
                                                    </div>";
                            }
                        }



                    }
                    // Re-enter data on signup page
                    else{
                        unset($_SESSION["gamename"]);
                        unset($_SESSION["city"]);
                        unset($_SESSION["userid"]);
                        session_destroy();
                        header("location: signin.php");
                    }
                }
            }

        ?>
<?php else :
    session_destroy();
    unset($_SESSION["userid"]);
    unset($_POST['onlineInfoSubmit']);
    header("location: signin.php");
?>
<?php endif; ?>
