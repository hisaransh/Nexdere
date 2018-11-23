<?php
    session_start();
?>
<?php if(isset($_SESSION["userid"])) :?>
    <html>

    <body>
        <?php
            if(isset($_SESSION["gamename"]) && isset($_SESSION["date"]) && isset($_POST['onlineInfoSubmit']))
            {
                $gameid = $_POST['gameid'];
                $time = $_POST['timeselected'];
                $userid = $_SESSION['userid'];
                $gamename = $_SESSION['gamename'];
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
                    unset($_SESSION["gamename"]);
                    unset($_SESSION["city"]);
                    unset($_SESSION["userid"]);
                    header("location: signin.php");
                }
                else
                {
                    $query = "
                        INSERT INTO allocationOnline (uid , gid , gamename , city , date) VALUES (
                            '$userid' , '$gameid' , '$gamename' , '$city' , '$date' 
                        );
                    ";
                    $result = $conn->query($query);

                    if($result)
                    {
                        echo "Congrats! You have succesfully booked competition"."<br/>";
                        $query1 = "
                            SELECT name from user ,allocationOnline where date = '$date' and gid='$gameid' and uid<>'$userid';
                        ";
                        $result1 = $conn->query($query1);
                        if($result1)
                        {
                            if ($result1->num_rows > 0) {
                                //  While rows are getting retrived from result of query
                                echo "You are playing with:  \n"
                                while($row1 = $result1->fetch_assoc()) {
                                    echo $row1['name']"</br>";
                                }
                            }
                            else{
                                echo "You are first One to book";
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

