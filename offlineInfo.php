<?php
    // Staring the session
    session_start();
?>
<!-- if session variable is set  -->
<?php if(isset($_SESSION["userid"])) :?>
    <html>

    <body>
        <?php
            // Only if on gameway.php if this variables were set
            if(isset($_SESSION["gametype"]) && isset($_SESSION["city"]) ){
                //  Saving value to local variables
                echo $game =  $_SESSION["gametype"]; 
                echo $city =  $_SESSION["city"] ;
                
                //  Creating a connection
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
                else{
                    // Query in sql to select playgrounds from playground table and showing to user
                    $query = "
                        SELECT * from playground where city='$city' and gametype='$game';       
                    ";

                    // Creating a form
                    echo "<form name='offlineinfo' method='post' action='booking.php' ";
                    $result = $conn->query($query);
                    echo "<div>";
                    // Creating table and showing the result in table
                    echo "<table border='1'>";
                    echo "<tr>";
                    echo "<td>"."Name"."</td>";
                    echo "<td>"."Choose"."</td>";
                    echo "<td>"."Street"."</td>";
                    echo "</tr>";

                    // If number of rows retrived are grater then zero
                    if ($result->num_rows > 0) {
                        //  While rows are getting retrived from result of query
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td>"."<input type='radio' name='play' value='$row[pid]' >"."</td>";
                            echo "<td>".$row['Street']."</td>";
                            echo "</tr>";
                        }
                    }
                    echo "</table>";
                    echo "</div>";
                    echo "</br>";
                    echo "Select Time to Play ";
                    echo "<input type='time' name='timeselected' min='4:00' max='18:00'>";
                    echo "<p></p>";
                    echo "<input type='submit' name='offlineInfoSubmit' value='Book' >";
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
    unset($_SESSION["gametype"]);
    unset($_SESSION["city"]);
    header("location: signin.php");
?>
<?php endif; ?>

