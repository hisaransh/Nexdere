<?php
    // Staring the session
    session_start();
?>
<!-- if session variable is set  -->
<?php if(isset($_SESSION["userid"])) :?>
    <!DOCTYPE html>
    <html>
        <head>
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
            Select Date : <input type="date" name="dataselected" />
            </h3>
        </div>

       <!--  options for online game -->

       <div id="onlineinfo" style="display:none;">

            <h3>GameType :
                <select name="gametype">
                    <option>CS_GO</option>
                    <option>PUB-G</option>
                    <option>MARIO</option>
                </select>
            </h3>
            <h3>
            Select Date : <input type="date" name="dataselected" />
            </h3>
        </div>
        <input type="submit" name="gamewaysubmit" value="gamewaySubmit">
        </form>
    </body>    
    </html>
<?php else :
    // If session variable is not set then navigate back to signin.php
    session_destroy();
    unset($_SESSION["userid"]);
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
                $_SESSION["date"] = $_POST["dataselected"];

                //navigating to offlineInfo.php
                header("location: offlineInfo.php");
            }
            else if (($gameselected == "online") {
                // Saving all the value to session variable for future references
                $_SESSION["gametype"] = $_POST["gametype"];
                $_SESSION["date"] = $_POST["dataselected"];

                //navigating to offlineInfo.php
                header("location: onlineInfo.php");
            }
            else{
                // Use this online way
                //header("location: onlineInfo.php");
            }

            
    }
?>