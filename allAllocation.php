<?php
    // Staring the session
    session_start();
?>
<!-- if session variable is set  -->
<?php if(isset($_SESSION["userid"])) :?>
<!DOCTYPE html>
<html>
<head>
    <title> Nexdere : Details </title>
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
            table{
                border :1px solid black;
            }
        </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
          <a class="navbar-brand" href="#"  >
            <b><i>Nexdere</i></b>
          </a>
        <div class="dropdown" style = "margin-right: 60px;">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Book/LogOut
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" style="margin-left:20px;" href="gameway.php">Book</a>
                <a class="dropdown-item" style="margin-left:20px;" href="logout.php">LogOut</a>
            </div>
        </div>
        

    </nav>
    <br><br><br>

    <img src="img/title.png" align="right" style = 'margin-right: 100px; border-collapse: all;'>

    <?php
        $servername = "localhost";
        
        $username = "phpmyadmin";
        $password = "elonmusk";
        $dbname = "nexdre";
        $userid = $_SESSION['userid'];
        $conn = new mysqli($servername,$username,$password,$dbname);

        // die if error
        if($conn->connect_error)
        {
            die("connection error");
            unset($_SESSION["userid"]);
            session_destroy();
            header("location: signin.php");
        }
        else{
            $query = "
            SELECT name,email,phoneno,gender,dob from user where uid = '$userid';
            ";

            echo "<div style='margin-left:20px;'>
                    <h1>Details</h1>";
            $result = $conn->query($query);
            if ($result->num_rows == 1) {
                //  While rows are getting retrived from result of query
                $row = $result->fetch_assoc();
                echo "<h4> Name : </h4>".$row['name']."</br>";
                echo "<h4> Email : </h4>".$row['email']."</br>";
                echo "<h4> Phone Number : </h4>".$row['phoneno']."</br>";
                echo "<h4> Date Of Birth : </h4>".$row['dob']."</br>";
                echo "<br>";
                }
            }
            echo "</div>";

            //Printing Offline allocations
            $offlinequery = "
            Select name , allocation.city , playground.gametype , street,time,date from playground,allocation where allocation.pid = playground.pid and allocation.uid = '$userid' ORDER BY date;
            ";
            $resultoffline = $conn->query($offlinequery);
            echo "
            <div class='alert alert-primary' role='alert'>
                            <center><strong>Your playground bookings Are</strong></center>
                            </div><br>";
            if ($resultoffline->num_rows > 0) {
                //  While rows are getting retrived from result of query
                echo "<table class='center2'>";
                    echo "<tr>";
                    echo "<td>"."Ground Name"."</td>";
                    echo "<td>"."City"."</td>";
                    echo "<td>"."Game type"."</td>";
                    echo "<td>"."Address"."</td>";
                    echo "<td>"."Date"."</td>";
                    echo "<td>"."Time"."</td>";
                    echo "</tr>";

                while($rowoffline = $resultoffline->fetch_assoc())
                {
                    echo "<tr>";
                    echo "<td>".$rowoffline['name']."</td>";
                    echo "<td>".$rowoffline['city']."</td>";
                    echo "<td>".$rowoffline['gametype']."</td>";
                    echo "<td>".$rowoffline['street']."</td>";
                    echo "<td>".$rowoffline['date']."</td>";
                    echo "<td>".$rowoffline['time']."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else{
                echo "
                <div class='alert alert-danger' role='alert'>
                            <center><strong>No playground Booking till date</strong></center>
                            </div><br>";
            }

            $onlinequery = "
                SELECT gameName , competitionName, date,time 
                FROM onlineMode,allocationOnline 
                WHERE allocationOnline.gid = onlineMode.gid AND allocationOnline.uid = '$userid'
                ORDER BY date;
            ";
            $resultonline = $conn->query($onlinequery);

            //Printing Online allocations
            echo "<br>";
            echo "
            <div class='alert alert-primary' role='alert'>
                            <center><strong>Your online competitions are</strong></center>
                            </div><br>";
            if ($resultonline->num_rows > 0) {
                //  While rows are getting retrived from result of query
                
                echo "<table class='center2'>";
                    echo "<tr>";
                    echo "<td>"."Game Name"."</td>";
                    echo "<td>"."Competition Name"."</td>";
                    echo "<td>"."Date"."</td>";
                    echo "<td>"."Time"."</td>";
                    echo "</tr>";

                while($rowonline = $resultonline->fetch_assoc())
                {
                    echo "<tr>";
                    echo "<td>".$rowonline['gameName']."</td>";
                    echo "<td>".$rowonline['competitionName']."</td>";
                    echo "<td>".$rowonline['date']."</td>";
                    echo "<td>".$rowonline['time']."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }else{
                echo "<div class='alert alert-danger' role='alert'>
                            <center><strong>No Competition participated till date</strong></center>
                            </div><br>";
            }


            
    ?>
<body>
    
</body>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>



<?php else :
    // If session variable is not set then navigate back to signin.php
    unset($_SESSION["userid"]);
    session_destroy();
    header("location: signin.php");
?>
<?php endif; ?>


