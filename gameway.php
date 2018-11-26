<?php
    // Staring the session
    session_start();
?>
<!-- if session variable is set  -->
<?php if(isset($_SESSION["userid"])) :?>
    <!DOCTYPE html>
    <html>
        <head>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <link rel="stylesheet" href="css/style.css">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

            <title>Choose game</title>
            <script>

                // Javascript function to show the offline div when offline radio is selected
                function showdiv(){
                    document.getElementById('offlineinfo').style.display ='block';
                    document.getElementById('onlineinfo').style.display ='none';
                }

                // Javascript function to hide the offline div when online radio is selected
                function hidediv(){
                    document.getElementById('offlineinfo').style.display ='none';
                    document.getElementById('onlineinfo').style.display ='block';
                }
                
            </script>
        </head>
    <body>


        <form method = "POST" name="gameplayform" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"  >
        
        <p align="center">
        OFFLINE:<input type="radio" name="game" id="offline" value="offline" onclick="showdiv()"><br>
        </p>
        
        <p align="center">
        ONLINE: <input type="radio" name="game" value="online" onclick="hidediv()"><br>
        </p>

        <div id="offlineinfo" style="display:none;">

            <h3>City :
                <select name="city">
                    <option>Delhi</option>
                    <option>Noida</option>
                    <option>Gurgaon</option>
                </select>
            </h3>
            <h3>GameType :
                <select name="gametype">
                    <option>Cricket</option>
                    <option>Football</option>
                    <option>Golf</option>
                </select>
            </h3>
            <h3>
            Select Date : <input type="date" name="dateselected" id="datefield" min=<?php
                        echo date('Y-m-d');
                            ?> />
            </h3>
        </div>

       <!--  options for online game -->

        <!--  options for online game -->

        <div id="onlineinfo" style="display:none;" align="center">
            
            <div>
                <input type="radio" name="gamename" value="PUBG">
                <img src="img/test1.png">
            </div>
            <div>
                <input type="radio" name="gamename" value="CSGO">
                <img src="img/test1.png">
            </div>
            <div>
                <input type="radio" name="gamename" value="FIFA">
                <img src="img/test1.png">
            </div>
            <div>
                <input type="radio" name="gamename" value="CALL OF DUTY">
                <img src="img/test1.png">
            </div>
        <input type="submit" name="gamewaysubmit" value="gamewaySubmit">
        </form>
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

<?php
    // if gameway form is submitted then
    if(isset($_POST["gamewaysubmit"]))
    {
            // Retriving values
            $gameselected = $_POST['game'];
            if($gameselected == "offline"){
                // Saving all the value to session variable for future references
                $_SESSION["gametype"] = $_POST["gametype"];
                $_SESSION["city"] = $_POST["city"];
                $_SESSION["date"] = $_POST["dateselected"];

                //navigating to offlineInfo.php
                header("location: offlineInfo.php");
            }
            else if ($gameselected == "online") {
                // Saving all the value to session variable for future references
                $_SESSION["gamename"] = $_POST["gamename"];

                //navigating to onlineInfo.php
                header("location: onlineInfo.php");
            }

            
    }
?>






