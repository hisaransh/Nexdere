<?php
    session_start();
?>

<?php if(isset($_SESSION["userid"])) :?>
<!DOCTYPE html>
<html>
<head>
    <title>Choose game</title>
<head>
<body>
    <form method = "POST" name="gameplayform" action="selectgame.php"  >
    
    <p align="center">
	OFFLINE:<input type="radio" name="game" id="offline" value="offline" onclick="fun1()"><br>
    </p>
    
    <p align="center">
    ONLINE: <input type="radio" name="game" value="online" ><br>
	</p>
    <input type="submit" name="submit" value="gamewaySubmit">

    <div id="offlineinfo"> </div>

    
</body>    
</html>
<?php else :
    session_destroy();
    header("location: signin.php");
?>

<?php endif; ?>