<?php
    require_once '../includes/connDB.php';
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
                <img src="../Home/logo.png" alt="logo">
            </div>
            
            <form id="login" class="input-group" action="../includes/login.php" method="post">
                <?php
                    if(isset($_GET['loginerror']))
                        if($_GET['loginerror'] == "emptyfileds")
                            echo '<p class="error">You have empty fields!</p>';
                        elseif($_GET['loginerror'] == "invalidemailformat")
                            echo '<p class="error">You typed an invalid email format!</p>';
                        elseif($_GET['loginerror'] == "wrongpassword")
                            echo '<p class="error">Wrong password';
                        elseif($_GET['loginerror'] == "nouser")
                            echo '<p class="error">User with this email do not exists</p>';
                        elseif($_GET['loginerror'] == "sqlerror")
                            echo '<p class="error">Error to database. Please try again</p>';
                ?>
                <input type="email" class="input-field" name="email" placeholder="Email" required> 
                <input type="password" class="input-field" name="passwd" placeholder="Password" required> 
                <button type="submit" name="login_submit" id="login_btn" class="submit-btn">Log in</button>
            </form>

            <form id="register" class="input-group" action="../includes/register.php" method="post">
                <?php
                    if(isset($_GET['registererror']))
                        if($_GET['registererror'] == "emptyfileds")
                            echo '<p class="error">You have empty fields!</p>';
                        elseif($_GET['registererror'] == "incorectnameformat")
                            echo '<p class="error">Name must have only letters!</p>';
                        elseif($_GET['registererror'] == "invalidemailformat")
                            echo '<p class="error">You typed an invalid email format!</p>';
                        elseif($_GET['registererror'] == "inccorectpasswordformat")
                            echo '<p class="error">Password do not respect respect the restrictions!</p>';
                        elseif($_GET['registererror'] == "passwordconfirmation")
                            echo '<p class="error">Password are not the same!</p>';
                        elseif($_GET['registererror'] == "sqlerror")
                            echo '<p class="error">Error to database. Please try again</p>';
                ?>
                <input type="text" class="input-field" name="name" placeholder="Full Name" required>
                <input type="email" class="input-field" name="email" placeholder="Email" required> 
                <input type="password" class="input-field" name="passwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password" required>
                <input type="password" class="input-field" name="confirmPasswd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Confirm Password" required> 
                <p> Password must have at least 8 characters: 1 upper letter, 1 lower letter and 1 number </p>
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