<?php
 session_start();
 $db = mysqli_connect("localhost" , "root" , "" , "myproject" );
 
if (isset($_POST['register_btn'])){
     $username = mysql_real_escape_string($_POST['username']);
     $email = mysql_real_escape_string($_POST['email']);
     $password = mysql_real_escape_string($_POST['password']);
     $password2 = mysql_real_escape_string($_POST['password2']);

     if($password == $password2) {
         $password =  md5($password);
          $sql = "INSERT INTO users(username,email,password)VALUES('$username','$email','$password')";
         mysqli_query($db, $sql);
         $_SESSION['message'] ="your now logged in";
         $_SESSION['username'] =$username;
         header("location:home.php");
     }     
 else {
     
     $_SESSION['message'] ="password does not match";    
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
        <form method="post" action="register.php">
            <table><br>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" class="textInput"></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" class="textInput"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" class="textInput"></td>
                </tr> 
                <tr>
                    <td>Conform Password:</td>
                    <td><input type="password" name="password2" class="textInput"></td>
                </tr> 
                <tr>
                    <td></td>
                    <td><input type="submit" name="register_btn" value="Register"></td>
                </tr> 
            </table>
        </form>
    </body>
</html>
