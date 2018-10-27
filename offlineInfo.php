<?php
    session_start();
?>
<?php if(isset($_SESSION["userid"])) :?>

<html>

<body>
    <?php
        if(isset($_SESSION["gametype"]) && isset($_SESSION["city"]) ){
            $game =  $_SESSION["gametype"]; 
            $city =  $_SESSION["city"] ;

            $servername = "localhost";
		    $username = "phpmyadmin";
		    $password = "elonmusk";
            $dbname = "nexdre";

		    $conn = new mysqli($servername,$username,$password,$dbname);

		    if($conn->connect_error)
		    {
                die("connection error");
                session_destroy();
                unset($_SESSION["gametype"]);
                unset($_SESSION["city"]);
                header("location: signin.php");
            }
            else{
                echo $city;
                echo $game;
                $query = "
                    SELECT * from playground where city='$city' and gametype='$game';       
                ";
                echo "<form name='offlineinfo' method='post' action='flag.php' ";
                $result = $conn->query($query);
                echo "<div>";
                echo "<table>";
                echo "<tr>";
                echo "<td>"."Name"."</td>";
                echo "<td>"."Choose"."</td>";
                echo "</tr>";
                 if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>"."<input type='radio' name='play' value='$row[pid]' >"."</td>";
                        echo "</tr>";
                    }
                }
                echo "</table>";
                echo "</div>";
                echo "<input type='submit' name='offlineInfoSubmit' >";
                echo "</form>";


        }
    }
        else{
            unset($_SESSION["gametype"]);
            unset($_SESSION["city"]);
            unset($_SESSION["userid"]);
            header("location: signin.php");
        }
    ?>

</body>

</html>





<?php else :
    session_destroy();
    unset($_SESSION["userid"]);
    header("location: signin.php");
?>
<?php endif; ?>

