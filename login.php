<?php
 session_start();
 $db = mysqli_connect("localhost" , "root" , "" , "myproject" );
if (isset($_POST['login_btn'])){
     $username = mysql_real_escape_string($_POST['username']);
     $password = mysql_real_escape_string($_POST['password']);
     $password = md5($password);
     $sql = "SELECT * FROM users WHERE username ='$username' AND password ='$password'";
     $result = mysqli_query($db ,$sql);
     if (mysqli_num_rows($result) == 1) {
        $_SESSION['message'] = "your now logged in";
         $_SESSION['username'] =$username;
          header("location:home.php");
     }
     else
     {
         $_SESSION['message'] = "username/password does not match";
     }
}
 ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Register login and logout</title>
        <link rel="stylesheet" type="text/css" href="style.css">
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
        <form method="post" action="login.php">
            <table><br>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" class="textInput"></td>
                </tr>
                
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" class="textInput"></td>
                </tr> 
              
                <tr>
                    <td></td>
                    <td><input type="submit" name="login_btn" value="Login"></td>
                </tr> 
            </table>
        </form>
    </body>
</html>
