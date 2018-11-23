<?php
    session_start();
?>
<?php if(isset($_SESSION["userid"])) :?>
    <html>

    <body>
        <?php
            if(isset($_SESSION["gametype"]) && isset($_SESSION["city"]) && isset($_POST['offlineInfoSubmit']))
            {
                $playerid = $_POST['play'];
                $time = $_POST['timeselected'];
                $userid = $_SESSION['userid'];
                $gametype = $_SESSION['gametype'];
                $city = $_SESSION['city'];
                $date = $_SESSION['date'];

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
                    unset($_SESSION["gametype"]);
                    unset($_SESSION["city"]);
                    unset($_SESSION["userid"]);
                    header("location: signin.php");
                }
                else
                {
                    $query = "
                        INSERT INTO allocation (uid , pid , gametype , city , date,time) VALUES (
                            '$userid' , '$playerid' , '$gametype' , '$city' , '$date' , '$time'
                        );
                    ";
                    $result = $conn->query($query);

                    if($result)
                    {
                        echo "Congrats! You have succesfully booked stadium"."<br/>";
                        $query1 = "
                            SELECT user.name from allocation , user  where
                            date='$date' and 
                            pid='$playerid' and 
                            allocation.uid<>'$userid' and 
                            user.uid=allocation.uid;
                        ";
                        $result1 = $conn->query($query1);
                        if($result1)
                        {
                            if ($result1->num_rows > 0) {
                                //  While rows are getting retrived from result of query
                                echo "<h3>Following person have also booked</h3>";
                                while($row1 = $result1->fetch_assoc()) {
                                    echo $row1['name'].$row['time']."</br>";
                                }
                            }
                            else{
                                echo "You are first One to book";
                            }
                        }



                    }
                    // Re-enter data on signup page
                    else{
                        unset($_SESSION["gametype"]);
                        unset($_SESSION["city"]);
                        unset($_SESSION["userid"]);
                        session_destroy();
                        header("location: signin.php");
                    }
                }
            }
            else if(isset($_SESSION["gametype"]) && isset($_SESSION["date"]) && isset($_POST['onlineInfoSubmit']))
            {
                
            }

        ?>
<?php else :
    session_destroy();
    unset($_SESSION["userid"]);
    unset($_POST['offlineInfoSubmit']);
    header("location: signin.php");
?>
<?php endif; ?>

