<?php
    session_start();
?>
<?php if(isset($_SESSION["userid"])) :?>
    <html>

    <body>
        <?php
            if(isset($_SESSION["gametype"]) && isset($_SESSION["city"]) && isset($_POST['offlineInfoSubmit']))
            {
                
            }
            if(isset($_SESSION["gametype"]) && isset($_SESSION["date"]) && isset($_POST['onlineInfoSubmit']))
            {
                
            }

        ?>
<?php else :
    session_destroy();
    unset($_SESSION["userid"]);
    unset($_POST['offlineInfoSubmit']);
    header("location: signin.php");
?>
<?php endif; ?>

