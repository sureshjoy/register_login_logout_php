<?php
 session_start();
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Register login and logout</title>
        
    </head>
    <body>
        <div class= "header">
            <h1>Register login and logout </h1>
             <?php
            if(isset($_SESSION['message']))
            {
                echo "<div id='error_msg'>".$_SESSION['message']."</div>";
                unset($_SESSION['message']);
            }
            ?>
        </div>
        <h1>HOME</h1>
        <DIV><h4>WELCOME <?php echo $_SESSION['username']; ?></h4></DIV>
        <div><a href="logout.php">Logout</a></div>
    </body>
</html>
