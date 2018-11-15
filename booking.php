<?php
    session_start();
?>
<?php if(isset($_SESSION["userid"])) :?>
    <html>

    <body>
        <?php
            if(isset($_SESSION["gametype"]) && isset($_SESSION["city"]) && isset($_POST['offlineInfoSubmit']))
            {
                echo $playerid = $_POST['play'];
                echo $userid = $_SESSION['userid'];
                echo $gametype = $_SESSION['gametype'];
                echo $city = $_SESSION['city'];
                echo $date = $_SESSION['date'];

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
                        INSERT INTO allocation (uid , pid , gametype , city , date) VALUES (
                            '$userid' , '$playerid' , '$gametype' , '$city' , '$date'
                        );
                    ";
                    $result = $conn->query($query);

                    if($result)
                    {
                        echo "done";
                    }
                    // Re-enter data on signup page
                    else{
                        echo "not done";
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

