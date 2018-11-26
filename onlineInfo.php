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
        <br><br><br>
        <?php
            // Only if on gameway.php if this variables were set
            if(isset($_SESSION["gamename"])){
                //  Saving vslue to local variables
                $game =  $_SESSION["gamename"]; 
                
                 //  Creating a connection
                $servername = 'localhost';
                $username = 'root';
                $password = 'your_password';
                $dbname = "nexdre";

                $conn = new mysqli($servername,$username,$password,$dbname);

                // die if error
                if($conn->connect_error)
                {
                    die("connection error");
                    session_destroy();
                    unset($_SESSION["gamename"]);
                    unset($_SESSION["date"]);
                    unset($_SESSION["userid"]);
                    header("location: signin.php");
                }
                else{
                    // Query in sql to select events from Event table and showing to user
            
                    $query = "SELECT * from onlineMode where gameName = '$game';";

                    // Creating a form
                    echo "<form name='onlineinfo' method='post' action='onlineBooking.php' ";
                    $result = $conn->query($query);
                    echo "<div>";
                    // Creating table and showing the result in table
                    echo "<table align='center'>";
                    echo "<tr>";
                    echo "<td>"."Name"."</td>";
                    echo "<td>"."Choose"."</td>";
                    echo "<td>"."Competition Name"."</td>";
                    echo "<td>"."Date"."</td>";
                    echo "<td>"."Time"."</td>";
                    echo "</tr>";

                    // If number of rows retrived are grater then zero
                    if ($result->num_rows > 0) {
                        //  While rows are getting retrived from result of query
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$row['gameName']."</td>";

                            echo "<td>"."<input type='radio' name='gameid' value='$row[gid]' >"."</td>";
                            echo "<td>".$row['competitionName']."</td>";
                            echo "<td>".$row['date']."</td>";
                            echo "<td>".$row['time']."</td>";
                            echo "</tr>";
                            
                        }
                    }
                    echo "</table>";
                    echo "</div>";
                    echo "<br>";
                    echo "<div class='center'>";
                    echo "<input type='submit' class='btn btn-secondary'style='width:100px' name='onlineInfoSubmit' value='Book' >";
                    echo "</div>";
                    echo "</form>";
            }
        }
            else{
                unset($_SESSION["gamename"]);
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
    unset($_SESSION["gamename"]);
    unset($_SESSION["city"]);
    header("location: signin.php");
?>
<?php endif; ?>
