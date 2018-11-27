<?php
    // Staring the session
    session_start();
?>
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
        <div class="navbar navbar-dark bg-dark">
            <div class="navbar-brand"  >
                <b><i>Nexdere</i></b>
            </div>
            <button  class="btn btn-primary" onclick="window.location.href='allAllocation.php'"required >Home</button>
        </div>
        
        <div>

            <form method = "POST" name="gameplayform" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>">

                <!-- selection of oFFline / oNNline -->
                <div class="card center2" style="width: 18rem;">
                    <div class="card-header">
                     Game Type
                    </div>
                     <ul class="list-group list-group-flush">
                        <li class="list-group-item"><input type="radio" name="game" id="offline" value="offline" onclick="showdiv()"> OFFLINE </li>
                        <li class="list-group-item"><input type="radio" name="game" id="online" value="online" onclick="hidediv()"> ONLINE </li>
                    </ul>
                </div>
            
                <!-- oFFline game selection options -->

                <div class="none" id="offlineinfo">
                    <table  align="center" >
                        <tr>
                            <td>
                                <h3>City :</h3>
                            </td>
                            <td>
                                <select name="city" class="btn btn-secondary dropdown-toggle" style="width:200px;">
                                    <div class="dropdown-menu">
                                        <option class="dropdown-item" value="Delhi">Delhi</option>
                                        <option class="dropdown-item" value="Noida">Noida</option>
                                        <option class="dropdown-item" value="Gurgaon">Gurgaon</option>
                                    </div>
                                </select>
                            </td>
                            
                        </tr>

                        <tr>
                            <td>
                                <h3>GameType :</h3>
                            </td>
                            <td>
                                <select name="gametype" class="btn btn-secondary dropdown-toggle" style="width: 200px;">
                                    <div class="dropdown-menu">
                                        <option class="dropdown-item" value="Cricket">Cricket</option>
                                        <option class="dropdown-item" value="Football">Football</option>
                                        <option class="dropdown-item" value="Golf">Golf</option>
                                    </div>
                                </select>
                            </td>       
                        </tr>
                        
                        <tr>
                            <td>
                                <h3>Select Date :</h3>
                            </td>
                            <td>
                                <input type="date" name="dateselected" class="btn btn-secondary"   id="datefield" min=<?php
                                            echo date('Y-m-d');
                                                ?>  style="width: 200px;"/>
                            </td>
                            
                        </tr>
                        <<tr>
                            <td>
                                <div >

                                    <input type="submit" name="gamewaysubmit" value="gamewaySubmit" class="btn btn-primary">

                                </div>
                            </td>
                        </tr>
                    </table>
                </div>


                <!-- oNNline game selection options -->

                <div id="onlineinfo" style="display:none;" class="center2" >
            
                    <div class="card center2 left" style="width: 18rem;">
                        <ul class="list-group list-group-flush"> 
                            <li class="list-group-item">
                                <input type="radio" name="gamename" value="PUBG">
                                <img src="img/pubg2.jpg" width="200px" height="150px">
                            </li>
                        </ul>
                    </div>   
                    <div class="card center2 " style="width: 18rem;">
                        <ul class="list-group list-group-flush"> 
                            <li class="list-group-item">
                                <input type="radio" name="gamename" value="FIFA">
                                <img src="img/fifa.jpeg" width="200px" height="150px" >
                            </li>
                        </ul>
                    </div>   
                    <div class="card center2 left" style="width: 18rem;">
                        <ul class="list-group list-group-flush"> 
                            <li class="list-group-item">
                                <input type="radio" name="gamename" value="CALL OF DUTY">
                                <img src="img/callduty.jpg" width="200px" height="150px" >
                            </li>
                        </ul>
                    </div>   
                    <div class="card center2 " style="width: 18rem;">
                        <ul class="list-group list-group-flush"> 
                            <li class="list-group-item">
                                <input type="radio" name="gamename" value="CSGO">
                                <img src="img/csgoonline.jpeg" width="200px" height="150px" >
                            </li>
                        </ul>
                    </div>
                    <br>
                    <br>

                    <div class="center2" >

                        <input type="submit" name="gamewaysubmit" value="gamewaySubmit" class="btn btn-primary">

                    </div>

                </div>
                

            </form>


        </div>



    </body>   

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
