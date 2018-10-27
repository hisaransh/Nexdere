<?php
    session_start();
?>

<?php if(isset($_SESSION["userid"])) :?>
<!DOCTYPE html>
<html>
<head>
    <title>Choose game</title>
    <script>
        function showdiv(){
            document.getElementById('offlineinfo').style.display ='block';
        }
        function hidediv(){
            document.getElementById('offlineinfo').style.display ='none';
        }
    </script>
<head>
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
    <input type="submit" name="gamewaysubmit" value="gamewaySubmit">
    </form>
</body>    
</html>
<?php else :
    session_destroy();
    unset($_SESSION["userid"]);
    header("location: signin.php");
?>
<?php endif; ?>
<?php
if(isset($_POST["gamewaysubmit"]))
{
        $gameselected = $_POST['game'];
        if($gameselected == "offline"){
            $_SESSION["gametype"] = $_POST["gametype"];
            $_SESSION["city"] = $_POST["city"];
            $_SESSION["date"] = $_POST["dataselected"];
            header("location: offlineInfo.php");
        }else{
            //header("location: onlineInfo.php");
        }


}
?>