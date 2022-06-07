<?php
    include_once '../includes/connDB.php';
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Autograph collector</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>
 <body>
<div class="hero">
   <div class="form-box">
             <div class="button-box">
             
                 <div id="btn" ></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
             </div>
             <div class="social-icons">
                <img src="../Home/logo.png">
            </div>
            
            <form id="login" class="input-group" action="../includes/login.php" method="post">
                <input type="text" class="input-field" name="email" placeholder="Email" required> 
                <input type="password" class="input-field" name="passwd" placeholder="Enter Password"> 
                <input type="checkbox" class="chech-box"><span>Remember Password</span>
                <button type="submit" name="login_submit" id="login_btn" class="submit-btn">Log in</button>
            </form>
            <form id="register" class="input-group" action="../includes/register.php" method="post">
            <?php
                if(isset($_GET['registererror']))
                    if($_GET['registererror'] == "emptyfileds")
                        echo '<p>You have empty fields!</p>';
            ?>
                <input type="text" class="input-field" name="name" placeholder="Full Name" required> 
                <input type="email" class="input-field" name="email" placeholder="Email"> 
                <input type="password" class="input-field" name="passwd" placeholder="Enter Password" required>
                <input type="password" class="input-field" name="confirmPasswd" placeholder="Confirm Password" required> 
                <!-- <input type="checkbox" class="chech-box"><span>I agree to the terms & conditions</span> -->
                <button type="submit" name="register_submit" id="register_btn" class="submit-btn">Register</button>
            </form>
    </div>
    <script>
        var x=document.getElementById("login");
        var y=document.getElementById("register");
        var z=document.getElementById("btn");
        function register()
        {
            x.style.left="-400px";
            y.style.left="50px";
            z.style.left="110px";
        }
        function login()
        {
            x.style.left="50px";
            y.style.left="450px";
            z.style.left="0";
        }
    </script>

    <?php
        if(isset($_GET['registererror']))
        {
            echo '<script> register(); </script>';
        }
    ?>
</div>
</body>
</html>