<?php
    // Staring the session
    session_start();
?>
<!-- if session variable is set  -->
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
        </nav>
        <br>
        <br>
        <br>
        <?php
            // Only if on gameway.php if this variables were set
            if(isset($_SESSION["gametype"]) && isset($_SESSION["city"]) ){
                //  Saving value to local variables
                $game =  $_SESSION["gametype"]; 
                $city =  $_SESSION["city"] ;
                
                //  Creating a connection
                $servername = "localhost";
    		    $username = "root";
    		    $password = "your_password";
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
                    echo "<table align='center'>";
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
                    echo "<div class='center'>";
                    echo "Select Time to Play ";
                    echo "<input type='time' name='timeselected' min='4:00' max='18:00'>";
                    echo "</div>";
                    echo "<p></p>";
                    echo "<div class='center'>";
                    echo "<input type='submit' class='btn btn-primary' name='offlineInfoSubmit' value='Book' >";
                    echo "</div>";
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

