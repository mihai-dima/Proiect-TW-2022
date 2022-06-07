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
                <input type="text" class="input-field" placeholder="User Id" required> 
                <input type="password" class="input-field" placeholder="Enter Password" required> 
                <input type="checkbox" class="chech-box"><span>Remember Password</span>
                <button type="submit" name="login_submit" id="login_btn" class="submit-btn" onclick="log()">Log in</button>
            </form>
            <form id="register" class="input-group" action="../includes/register.php" method="post">
                <input type="text" class="input-field" placeholder="User Id" required> 
                <input type="email" class="input-field" placeholder="Email Id" required> 
                <input type="password" class="input-field" placeholder="Enter Password" required>
                <input type="password" class="input-field" placeholder="Confirm Password" required> 
                <input type="checkbox" class="chech-box"><span>I agree to the terms & conditions</span>
                <button type="submit" name="register_submit" id="register_btn" class="submit-btn" onclick="reg()">Register</button>
            </form>
    </div>
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
        function reg()
        {
           location.href="../Main/autographCollector.php";
        }
        function log()
        {
            location.href="../Main/autographCollector.php";
        }
    </script>
</body>
</html>

